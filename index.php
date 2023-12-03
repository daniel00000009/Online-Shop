<?php
session_start();
?>


<html>

<head>
  <title>Magazin Online</title>
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="banner">
    <div class="navbar">
      <img src="logo.png" class="logo" />
      <ul>
        <li><a href="#" id="homeLink">Home</a></li>
        <li><a href="#" id="registerLink">Register</a></li>
        <li><a href="#" id="loginLink">Log In</a></li>
      </ul>
    </div>
    <?php
     if (isset($_SESSION["user_id"])) {?>
       <div class="content">
      <h1>BUY CHEAP AND FAST</h1>
      <p>The Ultimate Online PC Store!</p>
      <div>
        <button href="shop.php" type="button" id="shopNowButton">
          <span></span>Shop Right Now
        </button>
      </div>
    </div>
    <?php } ?> 
    
  </div>
  <script src="script.js"></script>
</body>

</html>