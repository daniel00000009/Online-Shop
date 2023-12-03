# Online-Shop
For this project to work properly, you will need a web development package (e.g., XAMPP). Connect to the database, such as phpMyAdmin (for this exemple I use:

$dsn = "mysql:host=localhost;dbname=phpproject01";
$dbusername = "root";
$dbpassword = "";
Change it according to your preferences. 

Create the two tables that we will work with, which are 'users' and 'products', using the following SQL commands:
CREATE TABLE users (
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(30) NOT NULL,
  userPwd VARCHAR(100) NOT NULL,
  userPhone VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  userType ENUM('admin', 'user') DEFAULT 'user'
);

CREATE TABLE products (
  id INT(11) PRIMARY KEY AUTO_INCREMENT,
  nume VARCHAR(255) NOT NULL,
  pret DECIMAL(10, 2) NOT NULL
);

Open XAMPP and start Apache and MySQL. However, before doing so, you'll need to add the project to ..\xampp\htdocs. 
If you've followed the steps listed above, you should see a website with the project's name when searching for "localhost" on Google. 
Click on it, and the site should open, running the PHP and other files properly.

This is only for educational purposes, but usually, you don't want to share sensitive information, such as the one listed above."
