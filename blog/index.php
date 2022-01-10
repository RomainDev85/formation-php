<?php
$pdo = new PDO('sqlite:./data/data.db', null, null, [
  PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
$error = null;

try {
  $query = $pdo->query('SELECT * FROM posts');
  $posts = $query->fetchAll(PDO::FETCH_OBJ);
} catch(Exception $e) {
  $error = $e->getMessage();
}

// echo "<pre>";
// echo print_r($posts[0]->name);
// echo "</pre>";

require 'components/header.php';
?>

<?php if($error): ?>

  <div class="alert alert-danger">
    <?= $error ?>
  </div>

<?php else: ?>

<ul>
  <?php foreach($posts as $post): ?>
    <li><a href="/edit.php?id=<?= $post->id ?>"><?= $post->name ?></a></li>
  <?php endforeach ?>
</ul>

<?php endif ?>



<?php require 'components/footer.php'; ?>