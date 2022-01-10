<?php
phpinfo();
die();
$age = null;
if(!empty($_COOKIE['age'])){
  $age = (int)$_COOKIE['age'];
}
if(!empty($_POST['age']) && strlen($_POST['age']) !== 0){
  $age = (int)$_POST['age'];
  setcookie('age', $age);
}
require 'components/header.php'
?>


<div class="m-4">
  <h2>Ce contenu est réserver à un public majeur.</h2>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore, nam at explicabo qui tenetur molestias quis est nesciunt delectus, nostrum incidunt, nihil dicta accusamus fuga quaerat libero recusandae excepturi quibusdam?
  Quo aliquam incidunt maiores. Dignissimos in recusandae velit facilis at cum ullam illo. Nesciunt, vel est natus repudiandae aperiam deserunt voluptatibus enim, amet recusandae minima cum. Voluptate nisi assumenda aspernatur.</p>


  <?php if($age !== null && $age < 2004): ?>
    <h5>Vous etes majeur, vous pouvez acceder au contenu.</h5>
  <?php else: ?>
    <?php if(isset($_POST['age']) && strlen($_POST['age']) === 0): ?>
      <div class="alert alert-danger">
        Veuillez sélectionner une date de naissance.
      </div>
    <?php endif ?>
    <form action="/page-18.php" method="post">
      <label for="age">Quel est votre age ?</label>
      <select name="age" id="age">
        <option value="">Selectionner un age</option>
        <?php
          for($i = 1919; $i < 2015; $i++){
            echo "<option value='$i'>$i</option>";
          }
        ?>
      </select>
      <button type="submit" class="btn btn-primary m-2">Verifier</button>
    </form>
  <?php endif ?>

</div>


<?php
require 'components/footer.php'
?>