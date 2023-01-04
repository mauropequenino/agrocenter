<?php

require_once("globals.php");
require_once("db.php");
require_once("models/Message.php");
require_once("models/User.php");
require_once("dao/UserDao.php");

$message = new Message($BASE_URL);
$userDao = new UserDAO($conn, $BASE_URL);


$type = filter_input(INPUT_POST, "type");

if ($type === "update") {

    //Obter os dados do usuario
    $userData = $userDao->verifyToken();

    //Receber os dados do POST
    $name = filter_input(INPUT_POST, "name");
    $nuit = filter_input(INPUT_POST, "nuit");
    $province = filter_input(INPUT_POST, "province");
    $city = filter_input(INPUT_POST, "city");
    $phone_number = filter_input(INPUT_POST, "phone_number");
    $bio = filter_input(INPUT_POST, "bio");

    //Criar um novo objecto do usuario
    $user = new User();

    $userData->name = $name;
    $userData->nuit = $nuit;
    $userData->city = $city;
    $userData->phone_number = $phone_number;
    $userData->bio = $bio;

    //Verificar se existe um valor na base de dados, para evitar alterão por um null
    if (empty($userData->province)) {
        $userData->province = $province;
    }

    //Uplaod de imagem
    if (isset($_FILES["image"]) && !empty($_FILES["image"]["tmp_name"])) {

        $image = $_FILES["image"];
        $imageTypes = ["image/jpeg", "image/jpg", "image/png"];
        $jpgArray = ["image/jpeg", "image/jpg"];

        //Verificar a extensão da imagem
        if (in_array($image["type"], $imageTypes)) {

            // Verificar se ẽ jpg ou png
            if (in_array($image, $jpgArray)) {
                $imageFile = imagecreatefromjpeg($image["tmp_name"]);
            } else {
                $imageFile = imagecreatefrompng($image["tmp_name"]);
            }

            $imageName = $user->generateImageName();

            imagejpeg($imageFile, "./img/users/" . $imageName, 100);

            $userData->image = $imageName;
        }
    } else {
        $message->setMessage("Tipo inválido de imagem, envie jpg ou png!", "error", "editprofile.php");
    }

    $userDao->update($userData);

} else if ($type === "changeEmail") {

    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

    //vericar se o email fai registado
    if ($userDao->findByEmail($email) === false) {

        //Obter os dados do usuario
        $userData = $userDao->verifyToken();
        $id = $userData->id;

        $user = new User();
        $user->email = $email;
        $user->id = $id;

        $userDao->changeEmail($user);
    } else {
        $message->setMessage("Este email já está registado!", "error","back");
    }

} else if ($type === "changePassword") {

    $current_password = filter_input(INPUT_POST, "current_password");
    $new_password = filter_input(INPUT_POST, "new_password");
    $confirm_password = filter_input(INPUT_POST, "confirm_password");

    //Obter os dados do usuario
    $userData = $userDao->verifyToken();
    $hash = $userData->password;
    $id = $userData->id;

    $user = new User();

    if ($user->verifyPassword($current_password, $hash)) {
        if ($new_password === $confirm_password) {

            $finalPassword = $user->generatePassword($new_password);

            $user->password = $finalPassword;
            $user->id = $id;

            $userDao->changePassword($user);
        } else {
            $message->setMessage("A nova palavra-passe e palavra-passe de confirmação não correspondem!", "error", "back");
        }
    } else {
        $message->setMessage("Por favor, digite a sua palavra-passe actual!", "error", "back");
    }
} else {
    $message->setMessage("Informacoes invalidas!", "error", "back");
}
