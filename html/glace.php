<?php
$title = "Composer votre glace";
// Checkbox
$parfums = [
  'Fraise' => 4,
  'Chocolat' => 5,
  'Vanille' => 3
];
// Radio
$cornets = [
  'Pot' => 2,
  'Cornet' => 3
];
$supplements = [
  'Pepite de chocolat' => 1,
  'Chantilly' => 0.5
];
$ingredients = [];
$total = 0;
if(isset($_GET['parfum'])){
    foreach ($_GET['parfum'] as $parfum) {
        if(isset($parfums[$parfum])){
            $ingredients[] = $parfum;
            $total += $parfums[$parfum];
        }
    }
}
if(isset($_GET['supplement'])){
    foreach ($_GET['supplement'] as $supplement) {
        if(isset($supplements[$supplement])){
            $ingredients[] = $supplement;
            $total += $supplements[$supplement];
        }
    }
}
if(isset($_GET['cornet'])){
    $cornet = $_GET['cornet'];
    if(isset($cornets[$cornet])){
        $ingredients[] = $cornet;
        $total += $cornets[$cornet];
    }
}

require 'components/header.php';
require 'functions/glace.php'
?>




<div class="row p-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Votre glace</h3>
                <ul>
                    <?php foreach($ingredients as $ingredient): ?>
                        <li><?= $ingredient ?></li>
                    <?php endforeach ?>
                </ul>
                <p><strong>Prix : <?= $total ?> €</strong></p>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <h2>Composer votre glace</h2>

        <form action="/glace.php" method="get">
        <h5>Choisissez votre / vos parfum(s)</h5>
        <?php foreach($parfums as $parfum => $prix): ?>
            <div class="checkbox">
            <label>
                <?= checkbox('parfum', $parfum, $_GET) ?>
                <?= $parfum ?> - <?= $prix ?> €
            </label>
            </div>
        <?php endforeach; ?>
        
        <h5>Choisissez votre cornet</h5>
        <?php foreach($cornets as $cornet => $prix): ?>
            <div class="checkbox">
            <label>
                <?= radio('cornet', $cornet, $_GET) ?>
                <?= $cornet ?> - <?= $prix ?> €
            </label>
            </div>
        <?php endforeach; ?>

        <h5>Choisissez votre / vos supplement(s)</h5>
        <?php foreach($supplements as $supplement => $prix): ?>
            <div class="checkbox">
            <label>
                <?= checkbox('supplement', $supplement, $_GET) ?>
                <?= $supplement ?> - <?= $prix ?> €
            </label>
            </div>
        <?php endforeach; ?>
        <button class="btn btn-primary mt-2" type="submit">Composer ma glace</button>
        </form>
    </div>
</div>





<?php require 'components/footer.php' ?>