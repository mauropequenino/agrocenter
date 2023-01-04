<?php

    require_once("models/User.php");
    require_once("models/Message.php");

    class UserDao implements UserDaoInterface 
    {
        private $conn;
        private $url;
        private $message;


        public function __construct(PDO $conn, $url) 
        {
            $this->conn = $conn;
            $this->url = $url;
            $this->message  = new Message($url);
        }

        public function buildUser($data) 
        {
            $user = new User();
            
            $user->id = $data["id"];
            $user->name = $data["name"];
            $user->nuit = $data["nuit"];
            $user->username = $data["username"];
            $user->province = $data["province"];
            $user->city = $data["city"];
            $user->email = $data["email"];
            $user->phone_number = $data["phone_number"];
            $user->password = $data["password"];
            $user->image = $data["image"];
            $user->token = $data["token"];
            $user->bio = $data["bio"];

            return $user;
        }

        public function create(User $user, $authUser = false)
        {
            $stmt = $this->conn->prepare("INSERT INTO users
            (
                name, username, province, city, email, password, token
            ) VALUES (
                :name, :username, :province, :city, :email, :password, :token
            )");
            
            $stmt->bindParam(":name", $user->name);
            $stmt->bindParam(":username", $user->username);
            $stmt->bindParam(":province", $user->province);
            $stmt->bindParam(":city", $user->city);
            $stmt->bindParam(":email",$user->email);
            $stmt->bindParam(":password", $user->password);
            $stmt->bindParam(":token", $user->token);

            $stmt->execute();

            if($authUser)
            {
                $this->setTokenToSession($user->token);
            }
            
        }

        public function update(User $user) {
            $stmt = $this->conn->prepare("UPDATE users SET 
                name = :name,
                nuit = :nuit,
                province = :province, 
                city = :city,
                phone_number = :phone_number,
                image = :image,
                token = :token,
                bio = :bio   

                WHERE id = :id;
            ");

            $stmt->bindParam(":name", $user->name);
            $stmt->bindParam(":nuit", $user->nuit);
            $stmt->bindParam(":province", $user->province);
            $stmt->bindParam(":city", $user->city);
            $stmt->bindParam(":phone_number",$user->phone_number);
            $stmt->bindParam(":image", $user->image);
            $stmt->bindParam(":token", $user->token);
            $stmt->bindParam(":bio", $user->bio);
            $stmt->bindParam("id", $user->id);

            $stmt->execute();

            //Redicionar para o perfil do usuario
            $this->message->setMessage("Dados actualizados com sucesso!", "success", "editprofile.php");
        }

        public function verifyToken($protected = false) {
            if(!empty($_SESSION["token"])) {

                //Obter o token da session
                $token = $_SESSION["token"];

                //Verificar o token
                $user = $this->findByToken($token);

                if($user) {
                    return $user;

                }else if($protected) {
                    //Redicionar para o perfil do página
                    $this->message->setMessage("Faça autenticação para acessar está página!", "error", "index.php");
                }

            } else if($protected) {
                $this->message->setMessage("Faça a autenticação para acessar está página!", "error", "index.php"); 
            }
        }

        public function setTokenToSession($token, $redirect = true) {
            //Guardar token na session
            $_SESSION["token"] = $token;

            if($redirect) {
                //Redicionar para o perfil do usuario
                $this->message->setMessage("Seja bem-vindo ao AgroCenter", "success", "editprofile.php");
            }
        }

        public function authenticateUser($email, $password) {
            $user = $this->findByEmail($email);

            if($user) {
                //verificar se as senhas sao iguais
                if(password_verify($password, $user->password)) {

                    //Gerar uma token para criar a session
                    $token = $user->generateToken();
                    $this->setTokenToSession($token, false);

                    //Actualizar o token do usuario
                    $user->token = $token;
                    $this->update($user, false);

                    return true;
                }
            } else {
                return false;
            }
        }

        public function findByEmail($email) {
            if($email != "") {
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");

                $stmt->bindParam(":email", $email);
                $stmt->execute();

                if($stmt->rowCount() > 0) {
                    $data = $stmt->fetch();
                    $user = $this->buildUser($data);
                    return $user;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        public function findByUsername($username) {
            if($username != ""){
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE username = :username");

                $stmt->bindParam(":username", $username);
                $stmt->execute();

                if($stmt->rowCount() > 0) {
                    $data = $stmt->fetch();
                    $user = $this->buildUser($data);
                    return $user;
                } else {
                    return false;
                }
            }else {
                return false;
            }
        }

        public function findId($id){

        }

        public function findByToken($token) {
            if($token != "") {
                $stmt = $this->conn->prepare("SELECT * FROM users WHERE token = :token");
                $stmt->bindParam(":token", $token);
                $stmt->execute();

                if($stmt->rowCount() > 0){
                    $data = $stmt->fetch();
                    $user = $this->buildUser($data);

                    return $user;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }

        public function destroyToekn() {
            //remove o token da session
            $_SESSION["token"] = "";

            //Redicionar e mostrar a messagem de sucesso
            $this->message->setMessage("Volte sempre!", "success", "index.php");
        }

        public function changeEmail(User $user) {
            $stmt = $this->conn->prepare("UPDATE users SET 
                email = :email
                WHERE id = :id;
            ");

            $stmt->bindParam(":email", $user->email);
            $stmt->bindParam(":id", $user->id);

            $stmt->execute();

            //Redirecionar e mostrar a messagem de sucesso
            $this->message->setMessage("Seu email foi alterado com sucesso!", "success", "credentials.php");
        }

        public function changePassword(User $user){
            $stmt = $this->conn->prepare("UPDATE users SET 
                password = :password
                WHERE id = :id;
            ");

            $stmt->bindParam(":password", $user->password);
            $stmt->bindParam(":id", $user->id);

            $stmt->execute();

            //Redirecionar e mostrar a messagem de sucesso
            $this->message->setMessage("Palavra-passe alterada com sucesso!", "success", "credentials.php");
        }
    }
