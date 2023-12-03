<?php
session_start();

// Calculăm prețul total
$total_price = 0;
foreach ($_SESSION['cart'] as $item) {
    $total_price += $item['pret'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
        }

        .cart {
            width: 85%;
            margin: auto;
            padding: 35px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .cart-item {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
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
    </style>
</head>

<body>
    <div class="navbar">
        <img src="logo.png" class="logo" />
        <ul>
            <li><a href="shop.php" id="shopNowButton">Back to Shopping</a></li>
        </ul>
    </div>

    <div class="cart">
        <h1>Shopping Cart</h1>
        <?php
        // Verificăm dacă coșul de cumpărături este gol
        if (empty($_SESSION['cart'])) {
            echo "<p>Coșul de cumpărături este gol.</p>";
        } else {

            if (isset($_POST['empty_cart'])) {
                // Golește coșul
                $_SESSION['cart'] = array();
                // Recalculăm prețul total
                $total_price = 0;
            }
            
            // Afișăm fiecare element din coș
            foreach ($_SESSION['cart'] as $item) {
                echo "<div class='cart-item'>";
                echo "<p>Nume produs: " . $item['nume'] . "</p>";
                echo "<p>Preț: $" . $item['pret'] . "</p>";
                echo "</div>";
            }

            // Afișăm prețul total
            echo "<p>Preț total: $" . $total_price . "</p>";

            echo "<form method='post'>";
            echo "<button type='submit' name='empty_cart'>Golește coșul</button>";
            echo "</form>";
        }
        ?>
    </div>
    <script src="script.js"></script>
</body>

</html>