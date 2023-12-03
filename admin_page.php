<?php
require_once 'includes/config_session.inc.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>
    <link rel="stylesheet" href="style.css" />
    <style>
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
    </style>
</head>
<body>
    <h3>WELCOME ADMIN!</h3>

    <div class="banner">
    <div class="navbar">
      <img src="logo.png" class="logo" />
      <ul>
        <li><a href="login.php" >Back</a></li>
      </ul>
    </div>
    <script src="script.js"></script>
</body>
</html>