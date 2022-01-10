<?php
$pdo = new PDO('sqlite:./data/data.db', null, null, [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
]);
$error = null;
$id = $pdo->quote($_GET['id']);

try {
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

  <form action="" method="post">
    <div class="form-group">
      <label for="name">Modifier nom d'article :</label>
      <input type="text" name="name" id="name" value="<?= $posts->name ?>">
    </div>
  </form>

<?php endif ?>


<?php
require_once 'components/footer.php';
?>