<?php

    require_once("globals.php");
    require_once("db.php");
    require_once("models/Message.php");
    require_once("dao/UserDao.php");

    $message = new Message($BASE_URL);
    $flassMessage = $message->getMessage();

    if(!empty($flassMessage["msg"])) {
        $message->clearMessage();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroCenter</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= $BASE_URL ?>/css/style.css">
    <!----font awesome---->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
</head>
<body>
    <!--- header section inicio -->
    <header id="header">
        <!-- Navegation inicio -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow custom-navbar">
            <div class="container container-fluid">
                <div class="navbar-header">
                    <a href="/index.html" class="navbar-brand float-end logo">
                        <i class="fas fa-leaf"></i>
                        <span>AgroCenter</span>
                    </a>
                    <button class="navbar-toggler float-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" area-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="nav navbar-nav ms-auto custom-ul">
                        <li class="nav-item custom-li">
                            <a href="#" aria-current="page" class="nav-link ">Página inicial</a>
                        </li>
                        <li class="nav-item custom-li">
                            <a href="#" aria-current="page" class="nav-link ">Sobre</a>
                        </li>
                    </ul>
                    <div class="col-6 text-end menu">
                        <a href="<?= $BASE_URL ?>login.html" class="btn btn-outline-success me-2">Entar</a>
                        <a href="<?= $BASE_URL ?>signup.php"  class="btn btn-success">Registar</a>
                    </div>
                </div>

            </div>
        </nav>
        <!-- Navegation fim -->
        <?php if(!empty($flassMessage["msg"])): ?>
            <div class="msg-container">
                <p class="msg <?= $flassMessage["type"] ?>"><?= $flassMessage["msg"] ?></p>
            </div>

        <?php endif ?>
