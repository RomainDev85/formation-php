<?php
require_once 'Compteur.php';
class DoubleCompteur extends Compteur 
{
  public function recuperer(): int
  {
    if(!file_exists($this->fichier)){
      return 0;
    }
    return 2 * (int)file_get_contents($this->fichier);
  }
}