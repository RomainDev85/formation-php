<?php

    $note = 9;
    $note = (int)readline('Entrez votre note: ');
    if ($note > 10){
        echo 'Bravo vous avez la moyenne';
    }
    elseif ($note == 10) {
        echo 'Vous avez juste la moyenne';
    }
    else {
        echo 'Dommage vous n\'avez pas la moyenne';
    }

    $action = (int)readline('Entrez votre action : (1: attaquer, 2: défendre, 3: passer mon tour)');
    switch($action){
        case 1:
            echo 'J\'attaque';
            break;
        case 2:
            echo 'Je defends';
            break;
        case 3:
            echo 'Je passe mon tour';
            break;
        default:
            echo 'Commande inconnu';
    }
    
    $heure = (int)readline('Entrez une heure : ');
    if((9 <= $heure && 12 >= $heure) || (14 <= $heure && 17 >= $heure)){
        echo 'Le magasin est ouvert.';
    } else {
        echo 'Le magasin est fermer.';
    }

?>