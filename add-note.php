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
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand mx-4" href="#">Notes app logo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="./notes.php">Twoje notatki</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container my-5">
    <h1>Dodaj notatkę</h1>
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
  </div>

<footer class="bg-dark text-center text-white">
  <div class="container p-4">
    <section class="mb-4">
      <p>
        Projekt zespołowy aplikacji.
      </p>
    </section>
    <section class="m">
      <div class="row">
        <div class="col-md-6 mb-4 mb-md-0">
          Mikołaj Krawczyk
          <br>
          555 555 555
        </div>
        <div class="col-md-6 mb-4 mb-md-0">
          Radosław Cudak
          <br>
          666 666 666
        </div>
      </div>
    </section>
  </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2023 Copyright: Mikołaj Krawczyk, Radosław Cudak
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
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