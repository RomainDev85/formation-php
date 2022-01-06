<?php
if(session_status() === PHP_SESSION_NONE){
  session_start();
}
if(empty($_SESSION) || $_SESSION['user'] !== 1){
  header('Location: /login.php');
}
require 'functions/compteur.php';
$annee = (int)date('Y');
$annee_selection = empty($_GET['annee']) ? null : (int)$_GET['annee'];
$mois_selection = empty($_GET['mois']) ? null : $_GET['mois'];
if($annee_selection && $mois_selection){
  $total = nombre_vues_mois($mois_selection, $annee_selection);
  $detail = nombre_vues_detail_mois($mois_selection, $annee_selection);
} else {
  $total = nombre_vues();
};

$mois = [
  '01' => 'Janvier',
  '02' => 'Février',
  '03' => 'Mars',
  '04' => 'Avril',
  '05' => 'Mai',
  '06' => 'Juin',
  '07' => 'Juillet',
  '08' => 'Aout',
  '09' => 'Septembre',
  '10' => 'Octobre',
  '11' => 'Novembre',
  '12' => 'Décembre'
];
require 'components/header.php';
?>


<div class="row m-4">
  <div class="col-md-4">
    <div class="list-group">
      <?php for($i = 0; $i < 5; $i++): ?>
        <div class="m-2">
          <a class="list-group-item <?php echo $annee - $i === $annee_selection ? "active" : "" ?> " href="dashboard.php?annee=<?= $annee - $i ?>"><?= $annee - $i ?></a>
          <div class="list-group">
          <?php if($annee - $i === $annee_selection): ?>
            <?php foreach($mois as $numero => $element): ?>
              <a href="dashboard.php?annee=<?= $annee_selection ?>&mois=<?= $numero ?>" class="list-group-item <?= $numero === $mois_selection ? 'active' : ''?>"><?= $element ?></a>
            <?php endforeach ?>
          <?php endif ?>
          </div>
        </div>
      <?php endfor ?>
    </div>
  </div>
  <div class="col-md-8">
    <div class="card">
      <strong style="font-size:3rem;"><?= $total ?></strong>
      Visite total.
    </div>
    <?php if(isset($detail)): ?>
    <h2 class="mt-4">Details des visites pour le mois</h2>
    <table class="container-fluid table table-striped">
      <thead>
        <tr>
          <th>Jour</th>
          <th>Mois</th>
          <th>Année</th>
          <th>Nombre visite</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($detail as $ligne): ?>
        <tr>
          <td><?= $ligne['jour'] ?></td>
          <td><?= $ligne['mois'] ?></td>
          <td><?= $ligne['annee'] ?></td>
          <td><?= $ligne['visites'] ?> visite<?= $ligne['visites'] > 1 ? 's' : '' ?></td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>
    <?php endif ?>
  </div>
</div>

<?php
require 'components/footer.php';
?>