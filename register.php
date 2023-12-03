<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/signup_view.inc.php';
?>

<!DOCTYPE html>
<html>

<head>
  <title>Register</title>
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
      width: 33%;
      background-color: rgba(255, 255, 255, 0.8);
      padding: 20px;
      border-radius: 10px;
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
  </style>
</head>

<body>
  <div class="banner">
    <div class="navbar">
      <img src="logo.png" class="logo" />
      <ul>
        <li><a href="#" id="homeLink">Home</a></li>
      </ul>
    </div>
  </div>

  <div class="content">
    <h3>Register</h3>
    <form id="registerForm" action="includes/signup.inc.php" method="post">
      <input type="text" name="username" placeholder="Username/E-mail" />
      <br />

      <input type="password" name="pwd" placeholder="Password" />
      <br />

      <input type="text" name="phone" placeholder="Phone Number" />
      <br />

      <button type="submit">
        <span></span>Sign Up
      </button>

      <select name="userType" id="userType" type="submit">
    <option value="user">user</option>
    <option value="admin">admin</option>
  </select>
    </form>
    
  </div>
  
  <?php
  check_signup_errors();
  ?>

  <script src="script.js"></script>
</body>

</html>