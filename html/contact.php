<?php
  $title = "Nous contacter";
  require_once 'config/config.php';
  require 'functions/contact.php';
  require 'components/header.php';
?>

<div class="row">
  <div class="col-md-8">
    <h2>Nous contacter</h2>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Itaque amet, tempore aperiam debitis, aspernatur facilis tempora error laboriosam iure eligendi repellendus recusandae. Odit fugit sequi atque? Dolore molestias dolorem adipisci!
    </p>
  </div>
  <div class="col-md-4">
    <h2>Horaire magasin</h2>
    <?= in_creneau(CRENEAUX) ?>
    <?php foreach(JOURS as $k => $jour): ?>
      <li <?php if($k + 1 === (int)date('N')): ?> style="color:green"<?php endif ?>><strong><?= $jour ?></strong> : <?= creneaux_html(CRENEAUX[$k]) ?></li>
    <?php endforeach ?>
  </div>
</div>

<?php require 'components/footer.php' ?>
