<?php
session_start();
require_once "dbh.inc.php"; // Adjust the path as needed

if (isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];

    try {
        // Assuming your database table is named 'products'
        $query = "SELECT * FROM products WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $product_id);
        $stmt->execute();
        $added_product = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if the product with the given ID exists
        if ($added_product) {
            // Check if the cart is not empty
            if (!empty($_SESSION['cart'])) {
                // Check if the product is already in the cart
                $product_index = array_search($product_id, array_column($_SESSION['cart'], 'id'));

                if ($product_index !== false) {
                    // Product is already in the cart, increment the quantity or handle as needed
                    $_SESSION['cart'][$product_index]['quantity']++;
                } else {
                    // Product is not in the cart, add it
                    $_SESSION['cart'][] = array(
                        'id' => $product_id,
                        'nume' => $added_product['nume'],
                        'pret' => $added_product['pret'],
                        'quantity' => 1
                    );
                }
            } else {
                // Cart is empty, add the product
                $_SESSION['cart'][] = array(
                    'id' => $product_id,
                    'nume' => $added_product['nume'],
                    'pret' => $added_product['pret'],
                    'quantity' => 1
                );
            }

            // Display the added product details
        } 

        header("Location: ../Cart.php");

    } catch (PDOException $e) {
        echo "Error fetching product details: " . $e->getMessage();
    }
} else {
    echo 'Invalid request';
}
?>
