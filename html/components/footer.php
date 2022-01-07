    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <?php
          require_once 'class/Compteur.php';
          $compteur = new Compteur(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . 'compteur');
          $compteur->incrementer();
        ?>
        <?= "Il y a eu {$compteur->recuperer()} visites sur le site" ?> 
      </div>
      <div class="col-md-4">
        <h5>Navigation</h5>
        <ul class="list-unstyled text-small">
          <?php require './functions/menu.php' ?>
        </ul>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>