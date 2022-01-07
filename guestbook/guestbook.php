<?php
require 'class/Message.php';
require 'class/GuestBook.php';

$file = dirname(__DIR__) . DIRECTORY_SEPARATOR . "guestbook" . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . "message";
$guestbook = new GuestBook($file);
$success = false;

if($_POST['user'] && $_POST['message']){
  $user = $_POST['user'];
  $content = $_POST['message'];
  $message = new Message($user, $content, new DateTime());

  if(!$message->isValid()){
    $errors = $message->getErrors();
    $success = false;
  } else {
    $guestbook->addMessage($message);
    $success = true;
    $_POST = [];
  }
}

$messages = $guestbook->getMessages();

require 'components/header.php';
?>

<div class="container d-flex justify-content-center flex-column p-4">

  <h2>Livre d'or</h2>

  <?php if($success): ?>
    <div class="alert alert-success">
      Votre message a bien été ajouter au livre d'or. 
    </div>
  <?php endif ?>

  <form action="" method="post" class="d-flex flex-column">

    <div class="d-flex flex-column form-group mt-4">
      <label for="user" class="form-label">Nom d'utilisateur :</label>
      <input type="text" name="user" id="user" placeholder="Entrez un nom d'utilisateur" class="form-control" value="<?= isset($_POST['user']) ? htmlentities($_POST['user']) : '' ?>">
      <?php if(isset($errors['username'])): ?>
        <p class="text-danger"><?= $errors['username'] ?></p>
      <?php endif ?>
    </div>

    <div class="d-flex flex-column form-group mt-4">
      <label for="message" class="form-label">Nom d'utilisateur :</label>
      <textarea class="form-control" placeholder="Ajoutez un message" id="message" name="message" style="height: 100px"><?= isset($_POST['message']) ? htmlentities($_POST['user']) : '' ?></textarea>
      <?php if(isset($errors['message'])): ?>
        <p class="text-danger"><?= $errors['message'] ?></p>
      <?php endif ?>
    </div>

    <button type="submit" class="btn btn-primary mt-4" style="width:fit-content;">Ajoutez</button>

  </form>

  <?php if(!empty($messages)): ?>
    <h2 class="mt-4">Les messages :</h2>

    <?php foreach($messages as $message): ?>
      <?= $message->toHTML() ?>
    <?php endforeach ?>
  <?php endif ?>

  
</div>

<?php
require 'components/footer.php';
?>