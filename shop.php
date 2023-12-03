<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Shopping</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
    }

    .navbar {
      width: 85%;
      margin: auto;
      padding: 35px 0;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    .navbar ul li {
      display: inline-block;
      margin-right: 20px;
      position: relative;
    }

    .navbar ul li a {
      text-decoration: none;
      color: black !important;
      text-transform: uppercase;
    }

    .navbar ul li::after {
      content: '';
      height: 3px;
      width: 0;
      background: #00965c;
      position: absolute;
      left: 0;
      bottom: -10px;
      transition: 0.5s;
    }

    .navbar ul li:hover::after {
      width: 100%;
    }

    .products {
      display: flex;
      flex-direction: column;
      align-items: center;
      margin: 20px;
    }

    .product {
      background-color: #fff;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      text-align: center;
    }

    .product img {
      border-radius: 4px;
      margin-bottom: 10px;
    }

    .product h3 {
      font-size: 20px;
      margin-bottom: 10px;
    }

    .product p {
      margin-bottom: 10px;
    }

    .product button {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .product button:hover {
      background-color: #555;
    }
  </style>
</head>

<body>
  <div class="navbar">
    <img src="logo.png" class="logo" />
    <ul>
      <li><a href="#" id="homeLink">Home</a></li>
      <li><a href="cart.php" id="cartLink">Cart</a></li>
    </ul>
  </div>

  <div class="products">
    <form method="post" action="includes/addProducts.inc.php" method="post">
      <!-- Formular pentru inserare produs -->
      <div>
        <?php
        if (isset($_SESSION['user_Type']) && $_SESSION['user_Type'] === 'admin') { ?>
    
        <label for="new_product_name">Nume produs:</label>
        <input type="text" name="new_product_name" id="new_product_name" required>
        <label for="new_product_price">Pret produs:</label>
        <input type="text" name="new_product_pret" id="new_product_pret" required>
        <button type="submit" name="add_new_product">Adauga produs</button>
        <?php } ?>
      </div>
    </form>

    <!-- Display products from the database -->
    <?php

    require_once "includes/dbh.inc.php"; // Adjust the path as needed
    function get_products(PDO $pdo)
    {
      $query = "SELECT * FROM products;";
      $stmt = $pdo->prepare($query);
      $stmt->execute();

      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    try {
      $products = get_products($pdo); // Assuming get_products fetches products from the database

      foreach ($products as $product) {
        echo '<div class="product">';
        echo '<h3>' . $product['nume'] . '</h3>';
        echo '<p>Pret: ' . $product['pret'] . '</p>';

        // Add "Adauga in Cart" button and form
        echo '<form action="includes/addToCart.inc.php" method="post">';
        echo '<input type="hidden" name="product_id" value="' . $product['id'] . '">';
        echo '<button type="submit">Adauga in Cart</button>';
        echo '</form>';

        if (isset($_SESSION['user_Type']) && $_SESSION['user_Type'] === 'admin') {

          // Add "Modificare" button and form
          echo '<form action="includes/modifyProduct.inc.php" method="post">';
          echo '<input type="hidden" name="product_id" value="' . $product['id'] . '">';
          echo '<label for="new_nume">Noul Nume:</label>';
          echo '<input type="text" name="new_nume" id="new_nume" required>';
          echo '<label for="new_pret">Noul Pret:</label>';
          echo '<input type="text" name="new_pret" id="new_pret" required>';
          echo '<button type="submit">Modificare</button>';
          echo '</form>';

          // Add "Stergere" button and form
          echo '<form action="includes/deleteProduct.inc.php" method="post">';
          echo '<input type="hidden" name="product_id" value="' . $product['id'] . '">';
          echo '<button type="submit">Stergere</button>';
          echo '</form>';
        }

        echo '</div>';
      }
    } catch (PDOException $e) {
      echo "Error fetching products: " . $e->getMessage();
    }
    ?>

    <script src="script.js"></script>
</body>

</html>