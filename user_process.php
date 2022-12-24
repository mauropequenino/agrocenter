<?php

    require_once("globals.php");
    require_once("db.php");
    require_once("models/Message.php");
    require_once("models/User.php");
    require_once("dao/UserDao.php");

    $message = new Message($BASE_URL);
    $userDao = new UserDAO($conn, $BASE_URL); 


    $type = filter_input(INPUT_POST, "type");

    if($type === "update") {

        //Obter os dados do usuario
        $userData = $userDao->verifyToken();

        //Receber os dados do POST
        $name = filter_input(INPUT_POST, "name");
        $nuit = filter_input(INPUT_POST, "nuit");
        $province = filter_input(INPUT_POST, "province");
        $city = filter_input(INPUT_POST, "city");
        $phone_number = filter_input(INPUT_POST, "phone_number");
        $bio = filter_input(INPUT_POST,"bio");

        //Criar um novo objecto do usuario
        $user = new User();

        $userData->name = $name;
        $userData->nuit = $nuit;
        $userData->province = $province;
        $userData->city = $city;
        $userData->phone_number = $phone_number;
        $userData->bio = $bio;

        $userDao->update($userData);

    } else {
        $message->setMessage("Informacoes invalidas!", "error", "back");
    }

