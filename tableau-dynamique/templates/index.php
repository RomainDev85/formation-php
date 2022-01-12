<?php 
$pdo = new PDO('sqlite:' . dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'products.db');
$query = $pdo->query('SELECT * from products');
$lines = $query->fetchAll(PDO::FETCH_OBJ);
// dump($lines);
?>

<div class="container mt-2">
    <h1>Tous les biens</h1>

    <form action="" class="m-2 p-2">
        <div class="form-group row">
            <input type="text" name="name" id="name" class="form-control" placeholder="Ville">
        </div>
    </form>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Prix</th>
                <th scope="col">Ville</th>
                <th scope="col">Adresse</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($lines as $line): ?>
            <tr>
                <th scope="row"><?= $line->id ?></th>
                <td><?= $line->name ?></td>
                <td><?= number_format($line->price, 0, '.', ' '); ?> €</td>
                <td><?= $line->address ?></td>
                <td><?= $line->city ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>