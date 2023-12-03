<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/login_view.inc.php';

?>

<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <link rel="stylesheet" href="style.css" />

  <!-- Adaugă stilurile CSS direct aici -->
  <style>
    .banner {
      width: 100%;
      height: 100vh;
      background-image: linear-gradient(rgba(0, 0, 0, 0.478),
          rgba(0, 0, 0, 0.489)),
        url(onlineShop.jpg);
      background-size: cover;
      background-position: center;
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
      color: white !important;
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

    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .content {
      width: 60%;
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    form {
      display: flex;
      flex-direction: column;
    }

    form label {
      margin-bottom: 8px;
      display: flex;
      align-items: center;
    }

    form label span {
      margin-right: 10px;
      flex-shrink: 0;
    }

    form input {
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    form input[type="submit"] {
      background-color: #333;
      color: #fff;
      cursor: pointer;
    }

    form input[type="submit"]:hover {
      background-color: #555;
    }

    .logout-container {
      display: flex;
      justify-content: flex-end;
    }

    /* Poți ajusta alinierea butonului de logout aici */
    .logout-container button {
      color: white;
      margin-top: 10px;
    }

    /* Poziționează butonul de logout în colțul dreapta-sus */
    .logout-container {
      position: absolute;
      top: 50px;
      right: 10px;
    }
  </style>
</head>

<body>
  <h3>
    <?php
    output_username();
    ?>

  </h3>


  <div class="banner">
    <div class="navbar">
      <img src="logo.png" class="logo" />
      <ul>
        <li><a href="#" id="homeLink">Home</a></li>
      </ul>
    </div>

  </div>

  <div class="content">
    <?php
    if (!isset($_SESSION["user_id"])) { ?>
      <h2>Log In</h2>
      <form action="includes/login.inc.php" method="post">
        <input type="text" name="username" placeholder="Username/E-mail" />
        <br />

        <input type="password" name="pwd" placeholder="Password" />
        <br />

        <button type="submit">
          <span></span>Log In
        </button>
      </form>
  </div>
<?php } ?>


<?php

check_login_errors();

?>
<!-- Container pentru butonul de logout -->
<div class="logout-container">
  <form action="includes/logout.inc.php" method="post">
    <button>Logout</button>
  </form>
</div>

<script src="script.js"></script>

</body>

</html>