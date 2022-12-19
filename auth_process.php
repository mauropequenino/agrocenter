<?php

    require_once("globals.php");
    require_once("db.php");
    require_once("models/Message.php");
    require_once("models/User.php");
    require_once("dao/UserDao.php");

    $message = new Message($BASE_URL);
    $userDao = new UserDao($conn, $BASE_URL);

    
    // Obter o tipo de formulario
    $type = filter_input(INPUT_POST,"type");

    if($type === "signup") {
        
            $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $province = filter_input(INPUT_POST, "province", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
            $password = filter_input(INPUT_POST, "password");
            $confirmPassword = filter_input(INPUT_POST, "password_confirmation");    

            
            //Verificar se as senhas sao iguais
            if($password === $confirmPassword) {

                //vericar se o email fai registado
                if($userDao->findByEmail($email) === false) {

                    //verificar se o usuario ja foi registafo
                    if($userDao->findByUsername($username) === false) {

                        $user = new User();

                        //Criar um token para o usuario
                        $userToken = $user->generateToken();

                        //Gerar hash para o password
                        $finalPassword = $user->generatePassword($password);

                        //Criar usuario
                        $user->name = $name;
                        $user->username = $username;
                        $user->province = $province;
                        $user->city = $city;
                        $user->email = $email;
                        $user->password = $finalPassword;
                        $user->token = $userToken;

                        $auth = true;

                        $userDao->create($user, $auth);

                    } else {
                        $message->setMessage("Já existe um usuário com o mesmo nome", "error","back");    
                    }

                } else {
                    $message->setMessage("Este email já está registado, tente outro email", "error","back");
                }

            } else {
                $message->setMessage("As senhas devem ser iguias", "error", "back");
            }   
    }