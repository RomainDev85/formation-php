<?php
require_once 'class/OpenWeather.php';
$weather = new OpenWeather('f708cf926282c3bdbcd62235dd4f4899');
$error = null;
try {
  $forecast = $weather->getForecast('Toulouse');
  $today = $weather->getToday('Toulouse');
} catch(Exception $e){
  $error = $e->getMessage();
}
require 'components/header.php';
?>

<?php if($error): ?>
  <div class="alert alert-danger">
    <?= $error ?>
  </div>
<?php else: ?>
  <div class="container">

    <h2>Date du jour :</h2>
    <p><?= $today['date']->format('d/m/Y') ?> : <?= $today['description'] ?> <?= $today['temp'] ?> °C </p>

    <ul>
      <?php foreach($forecast as $key => $day): ?>
        <?php if($key < 5 ): ?>
          <li><?= $day['date']->format('d/m/Y') ?> : <?= $day['description'] ?> <?= $day['temp'] ?> °C </li>
        <?php endif ?>
      <?php endforeach ?>
    </ul>
  </div>
<?php endif ?>


<?php
require 'components/footer.php';