<?php
session_start();
require_once "dbh.inc.php"; // Adjust the path as needed

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product_id']) && isset($_POST['new_nume']) && isset($_POST['new_pret'])) {
        $product_id = $_POST['product_id'];
        $new_nume = $_POST['new_nume'];
        $new_pret = $_POST['new_pret'];

        try {
            // Assuming your database table is named 'products'
            $query = "UPDATE products SET nume = :nume, pret = :pret WHERE id = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id', $product_id);
            $stmt->bindParam(':nume', $new_nume);
            $stmt->bindParam(':pret', $new_pret);
            $stmt->execute();

            header("Location: ../Shop.php");

        } catch (PDOException $e) {
            echo "Error modifying product: " . $e->getMessage();
        }
    } else {
        echo 'Invalid data provided for modification.';
    }
} else {
    echo 'Invalid request method.';
}
?>
