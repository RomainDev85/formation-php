<?php
require_once 'class/Post.php';
$pdo = new PDO('sqlite:./data/data.db', null, null, [
  PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
$error = null;

try {
  if(isset($_POST['name'], $_POST['content'])){
    $query = $pdo->prepare('INSERT INTO posts (name, content) VALUES (:name, :content)');
    $query->execute([
      'name' => $_POST['name'],
      'content' => $_POST['content']
    ]);
  }
  $query = $pdo->query('SELECT * FROM posts');
  $posts = $query->fetchAll(PDO::FETCH_CLASS, '\Blog\Post');
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

<div class="container mt-2">
  <h2>Liste des articles</h2>
  <ul class="list-group">
    <?php foreach($posts as $post): ?>
      <li class="list-group-item">
        <p class="small text-muted"><?= $post->created_at->format('d/m/Y H:i') ?></p>
        <a href="/edit.php?id=<?= $post->id ?>"><?= $post->name ?></a>
        <p><?= $post->getExcerpt() ?></p>
      </li>
    <?php endforeach ?>
  </ul>
</div>

<div class="container mt-4">
  <h2>Ajouter un article</h2>
  <form action="" method="post">
    <div class="form-group">
      <label for="name">Nom de l'article :</label>
      <input type="text" name="name" id="name" placeholder="Ajouter un nom d'article" class="form-control">
    </div>

    <div class="form-group">
      <label for="content">Contenu de l'article :</label>
      <textarea type="text" name="content" id="content" class="form-control" placeholder="Contenu de l'article"></textarea>
    </div>

    <button type="submit" class="btn btn-primary mt-2">Ajouter</button>
  </form>
</div>

<?php endif ?>



<?php require 'components/footer.php'; ?>