<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["new_product_name"];
    $pret = $_POST["new_product_pret"];

    try {

        require_once"dbh.inc.php";
        require_once"signup_model.inc.php";
        require_once"signup_contr.inc.php";
        require_once 'config_session.inc.php';

        create_product($pdo, $name, $pret);

        header("Location: ../shop.php");

    } catch (PDOException $e) {
        die("Query Failed: ". $e->getMessage());
    }
}
else
{
    header("Location: ../shop.php");
    die ();
}


        