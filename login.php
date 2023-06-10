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
