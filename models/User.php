<?php

class User {
    public $id;
    public $name;
    public $nuit;
    public $username;
    public $province;
    public $city;
    public $email;
    public $phoneNumber;
    public $password;
    public $image;
    public $token;

    public function generateToken() {
        //Converter binario para hexadecimal e gerar uma codigo criptografado de 50 bytes
        return bin2hex(random_bytes(50));
    }

    public function generatePassword($password) {
        //Gerar uma password hash para a password do usuario
        return password_hash($password, PASSWORD_DEFAULT);
    }

    //Gerar um codigo hexadecimal para salvar a photo do usuario
    public function generateImageName() {
        return bin2hex(random_bytes(60)) . "jpeg";
    }
}

interface UserDaoInterface {
    public function buildUser($date);
    public function create(User $user, $authUser = false);
    public function update(User $user);
    public function verifyToken($protected = false);
    public function setTokenToSession($token, $redirect = false);
    public function authenticateUser($email, $password);
    public function findByEmail($email);
    public function findId($id);
    public function findByToken($token);
    public function destroyToekn();
    public function changePassword(User $user);
}