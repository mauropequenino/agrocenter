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
    if(empty($userData->province)) {
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
} else {
    $message->setMessage("Informacoes invalidas!", "error", "back");
}
