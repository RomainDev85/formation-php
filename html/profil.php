<?php
$title = "Cookie";
$name = null;
if(!empty($_GET['action']) && $_GET['action'] === 'deconnecter'){
  unset($_COOKIE['user']);
  setcookie('user', '', time() - 10);
}
if(!empty($_COOKIE['user'])){
  $name = $_COOKIE['user'];
}
if(!empty($_POST['name'])){
  $name = $_POST['name'];
  setcookie('user', $name);
}
require 'components/header.php';

?>

<?php if($name): ?>

  <h2>Bonjour <?= htmlentities($name) ?></h2>
  <a href="/profil.php?action=deconnecter">Déconnexion</a>

<?php else: ?>

  <div class="m-4">
    <h2>Connexion</h2>

    <form action="/profil.php" method="post">
      <div class="form-group">
        <label for="name">Nom</label>
        <input type="text" name="name" id="name" placeholder="Entrez un nom">
      </div>
      <button type="submit" class="btn btn-primary mt-2">Connexion</button>
    </form>
  </div>

<?php endif ?>



<?php
require 'components/footer.php'
?>