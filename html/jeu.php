<?php
$erreur = null;
$succes = null;
$aDeviner = 150;
$valeur = null;
if(count($_GET) != 0){
  $valeur = (int)$_GET['chiffre'];
  if($_GET['chiffre'] < $aDeviner){
    $erreur = 'Votre chiffre est trop petit.';
  } elseif($_GET['chiffre'] > $aDeviner){
    $erreur = 'Votre chiffre est trop grand.';
  } else {
    $succes = "Bravo vous avez devinez le chiffre <strong>$aDeviner</strong>";
  }
}
require 'components/header.php'
?>


<form action="/jeu.php" method="GET" class="m-4">
  <?php if($erreur !== null): ?> <div class="alert alert-danger"><?=$erreur?></div> <?php endif; ?>
  <?php if($succes !== null): ?> <div class="alert alert-success"><?=$succes?></div> <?php endif; ?>
  <div class="form-group">
    <input type="number" name="chiffre" id="chiffre" placeholder="Entrez un chiffre entre 0 et 1000" value="<?php if($valeur !== null){ echo $valeur; } ?>">
  </div>
  <button type="submit" class="btn btn-primary mt-2">Deviner</button>
</form>

<?php
require 'components/footer.php'
?>