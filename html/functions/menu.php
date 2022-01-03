<?php

if(!function_exists('nav_item')){
  function nav_item(string $lien, string $titre): string {
    $classe = 'nav-link';
    if($_SERVER["SCRIPT_NAME"] === $lien){
      $classe = $classe . " active";
    }
  
    $html = <<<HTML
    <li class="nav-item">
      <a class="$classe" aria-current="page" href="$lien">$titre</a>
    </li>
  HTML;
  
    return $html;
  
  };
}

?>

<?= nav_item('/index.php', 'Accueil'); ?>
<?= nav_item('/contact.php', 'Contact'); ?>
<?= nav_item('/glace.php', 'Composez une glace'); ?>
<?= nav_item('/jeu.php', 'Devinez le nombre'); ?>
<?= nav_item('/newsletter.php', 'Newsletter'); ?>

