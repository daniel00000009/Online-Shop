<?php
session_start();
require_once "dbh.inc.php"; // Adjust the path as needed

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['product_id'])) {
        $product_id = $_POST['product_id'];

        try {
            // Assuming your database table is named 'products'
            $query = "DELETE FROM products WHERE id = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id', $product_id);
            $stmt->execute();

            header("Location: ../Shop.php");

        } catch (PDOException $e) {
            echo "Error deleting product: " . $e->getMessage();
        }
    } else {
        echo 'Invalid data provided for deletion.';
    }
} else {
    echo 'Invalid request method.';
}
?>
