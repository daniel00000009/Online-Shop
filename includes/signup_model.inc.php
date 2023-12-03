<?php

declare(strict_types= 1);

function get_username(object $pdo, string $username){
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_phone(object $pdo, string $phone){
    $query = "SELECT username FROM users WHERE userPhone = :phone;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":phone", $phone);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $username, string $userPwd, string $phone, string $userType){
    $query = "INSERT INTO users (username, userPwd, userPhone, userType) VALUES (:username, :userPwd, :userPhone, :userType);";
    $stmt = $pdo->prepare($query);

    $option = [
        'cost' => 12
    ];
    $hashedPwd = password_hash($userPwd, PASSWORD_BCRYPT, $option);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":userPwd", $hashedPwd);
    $stmt->bindParam(":userPhone", $phone);
    $stmt->bindParam(":userType", $userType);
    $stmt->execute();
}

function set_product(object $pdo, string $name, string $pret){
    $query = "INSERT INTO products (nume, pret) VALUES (:namee, :pret);";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":namee", $name);
    $stmt->bindParam(":pret", $pret);
    $stmt->execute();
}

function get_products(PDO $pdo){
    $query = "SELECT * FROM products;";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}