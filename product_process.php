<?php

require_once("globals.php");
require_once("db.php");
require_once("models/Message.php");
require_once("models/Product.php");
require_once("dao/UserDao.php");
require_once("dao/ProductDao.php");

$message = new Message($BASE_URL);
$userDao = new UserDao($conn, $BASE_URL);
$productDao = new ProductDao($conn, $BASE_URL);

//Verificar se o usuario esta autenticado
$userData = $userDao->verifyToken();

$type = filter_input(INPUT_POST, "type");

if ($type === "create") {
    $product_name = filter_input(INPUT_POST, "product_name", FILTER_SANITIZE_SPECIAL_CHARS);
    $unit = filter_input(INPUT_POST, "category", FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_FLOAT);
    $unit = filter_input(INPUT_POST, "unit", FILTER_SANITIZE_SPECIAL_CHARS);
    $sold_off = filter_input(INPUT_POST, "sold_off");
    $date_start = filter_input(INPUT_POST, "date_start");
    $date_end = filter_input(INPUT_POST, "date_end");
    $province = filter_input(INPUT_POST, "province", FILTER_SANITIZE_SPECIAL_CHARS);
    $city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS);
    $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);

    $product = new Product();

    $product->product_name = $product_name;
    $product->category = $category;
    $product->price = $price;
    $product->unit = $unit;
    $product->sold_off = $sold_off;
    $product->date_start = $date_start;
    $product->date_end = $date_end;
    $product->province = $province;
    $product->city = $city;
    $product->description = $description;
    $product->users_id = $userData->id;


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

            $product = new Product();

            $imageName = $product->generateImageName();

            imagejpeg($imageFile, "./img/products/" . $imageName, 100);

            $product->image = $imageName;
        }
    } else {
        $message->setMessage("Tipo inválido de imagem, envie jpg ou png!", "error", "editprofile.php");
    }

    $productDao->create($product);
    // print_r($product);

} else if ($type === "update") {

    $product_name = filter_input(INPUT_POST, "product_name", FILTER_SANITIZE_SPECIAL_CHARS);
    $category = filter_input(INPUT_POST, "category", FILTER_SANITIZE_SPECIAL_CHARS);
    $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_FLOAT);
    $unit = filter_input(INPUT_POST, "unit", FILTER_SANITIZE_SPECIAL_CHARS);
    $sold_off = filter_input(INPUT_POST, "sold_off");
    $date_start = filter_input(INPUT_POST, "date_start");
    $date_end = filter_input(INPUT_POST, "date_end");
    $province = filter_input(INPUT_POST, "province", FILTER_SANITIZE_SPECIAL_CHARS);
    $city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_SPECIAL_CHARS);
    $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_SPECIAL_CHARS);
    $id = filter_input(INPUT_POST, "id");

    $productData = $productDao->findById($id);

    // Verificar se o filme exsite
    if ($productData) {

        if ($productData->users_id === $userData->id) {
            $productData->product_name = $product_name;
            $productData->price = $price;
            $productData->sold_off = $sold_off;
            $productData->date_start = $date_start;
            $productData->date_end = $date_end;
            $productData->city = $city;
            $productData->description = $description;

            //Verificar se existe um valor na base de dados, para evitar alterão por um valornull
            if (empty($productData->category)) {
                $productData->category = $category;
            }

            if (empty($productData->province)) {
                $productData->province = $province;
            }

            if (empty($productData->unit)) {
                $productData->unit = $unit;
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

                    $product = new Product();

                    $imageName = $product->generateImageName();

                    imagejpeg($imageFile, "./img/products/" . $imageName, 100);

                    $productData->image = $imageName;
                }
            } else {
                $message->setMessage("Tipo inválido de imagem, envie jpg ou png!", "error", "editprofile.php");
            }

            $productDao->update($productData);
        }
    }
} else if ($type === "delete") {

    $id = filter_input(INPUT_POST, "id");
    $product = $productDao->findById($id);

    //Verificar se o producto pertence ao usuario
    if ($product) {
        if ($product->users_id === $userData->id) {
            $productDao->destroy($product->id);
        } else {
            $message->setMessage("Erro, tente novamente mais tarde!", "error", "back");
        }
    } else {
        $message->setMessage("Este producto não existe!", "error", "back");
    }
} else {
    $message->setMessage("Informações inválidas!", "error", "index.php");
}
