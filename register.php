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

print_r($_POST);