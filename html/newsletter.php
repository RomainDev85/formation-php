<?php
$title = "Newsletter";
require 'components/header.php';
$error = null;
$success = null;
$email = null;
if(!empty($_POST['email'])){
  $email = $_POST['email'];
  if(filter_var($email, FILTER_VALIDATE_EMAIL)){
    $file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('Y-m-d') . '.tsv';
    file_put_contents($file, trim($email).PHP_EOL, FILE_APPEND);
    $success = "Votre email a bien été enregistrer.";
  } else {
    $error = "Email invalide.";
  }
}

?>

<div class="m-4">
  <h2>Newsletter</h2>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione repellendus ullam maxime voluptates voluptate autem aut ab enim! Assumenda ea et nihil nisi ipsam eveniet soluta reiciendis, temporibus a neque?
  Eveniet illum ratione voluptatem odit totam culpa provident qui amet soluta asperiores rerum eaque, dignissimos alias debitis est iste beatae tempora optio! Reprehenderit est odio quaerat ea, architecto aliquam voluptas.
  Corrupti, facere ipsa possimus veniam reprehenderit unde cupiditate necessitatibus animi maiores obcaecati repudiandae qui fugiat officiis libero labore nobis eius commodi eveniet earum molestias, quisquam molestiae! Harum dicta corporis iste.</p>

  <?php if($error): ?>
    <div class="alert alert-danger">
      <?= $error ?>
    </div>
  <?php endif; ?>

  <?php if($success): ?>
    <div class="alert alert-success">
      <?= $success ?>
    </div>
  <?php endif; ?>
  <div class="row">
    <form action="./newsletter.php" method="POST" class="col-md-4">
      <h5>Ajoutez votre email et restez informez</h5>
      <label for="email" class="form-label">Email : </label>
      <input type="email" name="email" id="email" placeholder="Inserez votre email" value="<?= htmlentities($email) ?>" class="form-control">
      <button type="submit" class="btn btn-primary mt-2">S'inscrire</button>
    </form>
  </div>
</div>


<?php
require 'components/footer.php'
?>