<?php


// function bonjour($nom){
//     return 'Bonjour ' . $nom . " !";
// }
// $salutation = bonjour("Romain");
// echo $salutation;

function repondre_oui_non($phrase){
    $result = readline($phrase);
    if($result === "o"){
        return true;
    } elseif($result === "n") {
        return false;
    } else {
        return repondre_oui_non($phrase);
    }
}

// $resultat = repondre_oui_non("Voulez vous continuer ? ");
// var_dump($resultat);


?>