<?php

require_once 'Database.php';
require_once 'User.php';
require_once 'Note.php';

// Database configuration
$host = 'localhost';
$username = 'root';
$password = 'root';
$database = 'notes';

$db = new Database($host, $username, $password, $database);
$db->connect();


$db->createUsersTable();
$db->createNotesTable();
$user = new User($db->getConnection());
$note = new Note($db->getConnection());

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

$userId = $_SESSION['user_id'];

$notes = $note->getNotesByUser($userId);

if (isset($_GET['delete_note'])) {
    $noteId = $_GET['delete_note'];
    if ($note->delete($noteId)) {
        header('Location: notes.php');
        exit();
    }
}
?>

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
            <a class="nav-link" href="./register.html">Zarejestruj się</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

    <h1 class="mb-5">Moje notatki</h1>

    <a class="mb-5" href="add-note.php">Dodaj nową notatkę</a>

    <table>
        <tr>
            <th>Tytuł</th>
            <th>Tekst</th>
            <th>Akcja</th>
        </tr>
        <?php foreach ($notes as $noteData) : ?>
            <tr>
                <td><?php echo $noteData['title']; ?></td>
                <td><?php echo $noteData['content']; ?></td>
                <td>
                    <a href="notes.php?delete_note=<?php echo $noteData['id']; ?>">Usuń</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

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
