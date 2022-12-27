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

    $userDao = new UserDao($conn, $BASE_URL);
    $userData = $userDao->verifyToken(true);

    if($userData->image == "") {
        $userData->image = "user.png";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrocenter</title>
     <!-- CSS only -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
     <link rel="stylesheet" href="<?= $BASE_URL ?>css/style.css">
     <!----font awesome---->
     <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">

     <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-success">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="<?= $BASE_URL ?>index.php" class="navbar-brand float-end logo logo-dash">
                        <i class="fas fa-leaf"></i>
                        <!-- <span>AgroCenter</span> -->
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="sidebar-menu">
                        <li class="nav-item">
                            <a href="<?= $BASE_URL ?>index.php" class="nav-link align-middle px-0">
                              <i class="fas fa-home"></i><span class="ms-1 d-none d-sm-inline">Página inicial</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= $BASE_URL ?>dashboard.php" class="nav-link px-0 align-middle">
                              <i class="fas fa-table"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                    <hr>
                    <div class="dropdown pb-4">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= $BASE_URL ?>img/users/<?= $userData->image ?>" alt="hugenerd" width="30" height="30" class="rounded-circle">
                            <span class="d-none d-sm-inline mx-1"><?= $userData->name ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="<?= $BASE_URL ?>editprofile.php">Editar perfil</a></li>
                            <li><a class="dropdown-item" href="<?= $BASE_URL ?>changepassword.php">Alterar senha</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= $BASE_URL ?>logout.php">Sair</a></li>
                        </ul>
                    </div>
                </div>
            </div>