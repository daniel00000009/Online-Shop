<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $phone = $_POST["phone"];
    $userType = $_POST["userType"];

    try {

        require_once"dbh.inc.php";
        require_once"signup_model.inc.php";
        require_once"signup_contr.inc.php";

        //ERROR HANDLER
        $errors = [];

        if(is_input_empty($username, $pwd, $phone)) {
            $errors["empty_input"] = "Fill in all the fields!";
        }
        if(is_username_invalid($username)) {
            $errors["invalid_username"] = "Invalid username/e-mail used!";
        }
        if(is_username_taken($pdo, $username)) {
            $errors["username_taken"] = "Username already taken!";
        }
        if(is_phone_registered($pdo, $phone)) {
            $errors["phone_used"] = "Phone already registered!";
        }

        require_once 'config_session.inc.php';

        if($errors) {
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../register.php");
            die();
        }

        create_user($pdo, $username, $pwd, $phone, $userType);

        header("Location: ../register.php?signup=succes");

        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query Failed: ". $e->getMessage());
    }
}
else
{
    header("Location: ../register.php");
    die ();
}