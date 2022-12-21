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
            $user->phoneNumber = $data["phone_number"];
            $user->password = $data["password"];
            $user->image = $data["image"];
            $user->token = $data["token"];

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

        public function update(User $user){

        }

        public function verifyToken($protected = false){
            if(!empty($_SESSION["token"])) {

                //Obter o token da session
                $token = $_SESSION["token"];

                //Verificar o token
                $user = $this->findByToken($token);

                if($user) {
                    return $user;
                }else if($protected) {
                    //Redicionar para o perfil do página
                    $this->message->setMessage("Faca a autenticação para acessar está página", "error", "index.php");
                }

            } else {
                return false;
            }
        }

        public function setTokenToSession($token, $redirect = true){
            //Guarfar token na session
            $_SESSION["token"] = $token;

            if($redirect) {
                //Redicionar para o perfil do usuario
                $this->message->setMessage("Seja bem-vindo ao AgroCenter", "success", "editprofile.php");
            }
        }

        public function authenticateUser($email, $password){

        }

        public function findByEmail($email){
            if($email != ""){
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
            }
        }

        public function findId($id){

        }

        public function findByToken($token){
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
            }
        }

        public function destroyToekn(){

        }

        public function changePassword(User $user){

        }
    }
