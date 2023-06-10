<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Projekt notatki</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Heebo:300,400,500,700|Playfair+Display:400,500,700&display=swap">
    <link rel="stylesheet" href="./assets/fonts/font-awesome5.css">
    <link rel="stylesheet" href="./assets/vendor/css/animate.css">
		<link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/rtl.css">
</head>

<body>
<form action="" method="post">
    <input type="text" name="title" placeholder="Title" required>
    <textarea name="content" placeholder="Content" required></textarea>
    <button type="submit" name="add_note">Add Note</button>
</form>

  <script src="./assets/vendor/js/jquery.js"></script>
  <script src="./assets/vendor/js/popper.js"></script>
  <script src="./assets/vendor/js/bootstrap.js"></script>
  <script src="./assets/js/util/autoPadding.js"></script>
  <script src="./assets/js/util/crossPlatform.js"></script>
  <script src="./assets/js/main.js"></script>
</body>

</html>

<?php

require_once 'Database.php';
require_once 'User.php';
require_once 'Note.php';

$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'notes';

// Create a new database instance and connect
$db = new Database($host, $username, $password, $database);
$db->connect();

// Handle note form submission
if (isset($_POST['add_note'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    if ($note->add($title, $content)) {
        echo 'Note added successfully!';
    } else {
        echo 'Failed to add note!';
    }
}