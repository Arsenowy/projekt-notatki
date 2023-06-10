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
<form name="add-note" method="post" class="row g-3">
  <div class="col-12">
    <label for="title" class="form-label">Tytuł</label>
    <input type="text" class="form-control" id="title" required>
  </div>
  <div class="col-12">
    <label for="body" class="form-label">Treść</label>
    <textfield type="text" class="form-control" id="body" required></textfield>
  </div>
  <div class="col-12">
    <input value="Dodaj notatkę" name="add-note" type="submit" class="btn btn-primary">
  </div>
  </form>
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

if (isset($_POST['add_note'])) {
  if (isset($_SESSION['user_id'])) {
      $userId = $_SESSION['user_id'];

      $title = $_POST['title'];
      $content = $_POST['content'];

      if ($note->add($userId, $title, $content)) {
          echo 'Note added successfully!';
      } else {
          echo 'Failed to add note!';
      }
  } else {
      echo 'You must be logged in to add a note!';
  }
}