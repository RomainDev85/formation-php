<?php

function creneaux_html(array $creneaux){
  $phrases = [];
  if(count($creneaux) === 0){
    return 'Fermer';
  } else {
    foreach( $creneaux as $creneau ){
      $phrases[] = "de <strong>$creneau[0]h</strong> à <strong>$creneau[1]h</strong>";
    }
    return 'Ouvert ' . implode(" et ", $phrases);
  }
}

function in_creneau(array $creneaux): string {
  // return date('N d m o');
  $jour = (int)date('N') - 1;
  $heure = (int)date('G') + 1;
  // print_r($jour);
  // print_r($heure);
  // $jour = 4; // Pour tester
  // $heure = 13; // Pour tester
  $html = null;

  if(count($creneaux[$jour]) === 0) {
    return 
      '<div class="alert alert-danger">
        <p>Le magasin est fermé</p>
      </div>';
  }
  foreach($creneaux[$jour] as $creneau){
    $ouvert = null;
    if($heure >= $creneau[0] && $heure < $creneau[1]){
      $ouvert = true; 
    }
    if($ouvert === true){
      $html = '<div class="alert alert-success">
                <p>Le magasin est ouvert.</p>
              </div>';
    } elseif($ouvert === null) {
      $html = '<div class="alert alert-danger">
                <p>Le magasin est fermer.</p>
              </div>';
    }
  }
  return $html;
}