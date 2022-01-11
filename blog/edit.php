<?php
$pdo = new PDO('sqlite:./data/data.db', null, null, [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
$error = null;
$success = null;
$id = $pdo->quote($_GET['id']);

try {
  if(isset($_POST['name'], $_POST['content'])){
    $query = $pdo->prepare("UPDATE posts SET name = :name, content = :content WHERE id = :id");
    $query->execute([
      'id' => $_GET['id'],
      'name' => $_POST['name'],
      'content' => $_POST['content']
    ]);
    $success = "Votre article à bien été mis à jour.";
  }
  $query = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
  $query->execute([
    'id' => $_GET['id']
  ]);
  $posts = $query->fetch();
} catch(PDOException $e){
  $error = $e->getMessage();
}
require_once 'components/header.php';
?>


<?php if($error || !$posts): ?>

  <div class="alert alert-danger">
    <?= $error ?>
  </div>

<?php else: ?>

  <div class="container mt-4">
    <?php if($success): ?>
      <div class="alert alert-success">
        <?= $success ?>
      </div>
    <?php endif ?>

    <div class="alert alert-primary">
      <a href="/">Retour a l'accueil</a>
    </div>

    <form action="" method="post">
      <div class="form-group">
        <label for="name">Modifier nom d'article :</label>
        <input type="text" name="name" id="name" value="<?= htmlentities($posts->name) ?>" class="form-control">
      </div>

      <div class="form-group">
        <label for="content">Modifier contenu de l'article :</label>
        <textarea type="text" name="content" id="content" class="form-control"><?= htmlentities($posts->content) ?></textarea>
      </div>

      <button type="submit" class="btn btn-primary mt-2">Modifier</button>
    </form>
  </div>

<?php endif ?>


<?php
require_once 'components/footer.php';
?>