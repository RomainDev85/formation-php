<?php
if(isset($_POST['email']) && isset($_POST['password'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $fichier = dirname(__DIR__) . DIRECTORY_SEPARATOR . "html" . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . "utilisateur.tsv";
  $users = file($fichier);

  // var_dump($users);

  foreach($users as $user){
    $utilisateur = explode(' ', $user);
    $utilisateur[0] = trim($utilisateur[0]);
    $utilisateur[1] = trim($utilisateur[1]);
    
    if($email === $utilisateur[0] && password_verify($password, $utilisateur[1])){
      session_start();
      $_SESSION['user'] = 1;
      header('Location: /dashboard.php');
    }
  }
}

require 'components/header.php'
?>

<div class="m-4">
  <h2>Connexion administrateur</h2>

  <form action="/login.php" method="post">
    <div class="form-group m-4">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" placeholder="entrez votre email">
    </div>

    <div class="form-group m-4">
      <label for="password">Mot de passe</label>
      <input type="password" name="password" id="password" placeholder="entrez votre mot de passe">
    </div>

    <button type="submit" class="btn btn-primary">Connexion</button>
  </form>
</div>

<?php
require 'components/footer.php'
?>