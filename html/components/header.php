<?php
if(session_status() === PHP_SESSION_NONE){
  session_start();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>
      <?php
        if(isset($title)) {
          echo $title;
        } else {
          echo "Mon site php";
        }
      ?>
    </title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/index.php">Mon site</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mr-auto">
        <?php require './functions/menu.php' ?>
      </ul>
      <ul class="navbar-nav">
        <?php if(!empty($_SESSION['user']) && $_SESSION['user'] === 1): ?>
          <li class="nav-item"><a href="/functions/logout.php" class="nav-link">Se déconnecter</a></li>
        <?php endif ?>
      </ul>
    </div>
  </div>
</nav>