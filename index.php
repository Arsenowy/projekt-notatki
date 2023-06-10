<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Projekt notatki</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:300,400,500,700|Playfair+Display:400,500,700&display=swap">
    <link rel="stylesheet" href="./assets/fonts/font-awesome5.css">
</head>

<body>

    <!-- Registration form -->
    <form action="" method="post">
      <input type="text" name="login" placeholder="Login" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" name="register">Register</button>
  </form>

    <!-- Login form -->
    <form action="" method="post">
        <input type="text" name="login" placeholder="Login" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Login</button>
    </form>
  </div>
</body>

</html>

<?php

require_once 'Database.php';
require_once 'User.php';

$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'notes';

// Create a new database instance and connect
$db = new Database($host, $username, $password, $database);
$db->connect();

// Create a new User instance
$user = new User($db->getConnection());

// Handle registration form submission
if (isset($_POST['register'])) {
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($user->register($login, $email, $password)) {
        echo 'Registration successful!';
    } else {
        echo 'Registration failed!';
    }
}

// Handle login form submission
if (isset($_POST['login'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($user->login($login, $password)) {
        echo 'Login successful!';
    } else {
        echo 'Login failed!';
    }
}
