<?php 

function nav_item(string $lien, string $titre): string {
  $classe = 'nav-link';
  if($_SERVER["SCRIPT_NAME"] === $lien){
    $classe = $classe . " active";
  }

  $html = <<<HTML
  <li class="nav-item">
    <a class="$classe" aria-current="page" href="$lien">$titre</a>
  </li>
  HTML;

  return $html;

};

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
      <ul class="navbar-nav">
        <?= nav_item('/index.php', 'Accueil'); ?>
        <?= nav_item('/contact.php', 'Contact'); ?>
      </ul>
    </div>
  </div>
</nav>