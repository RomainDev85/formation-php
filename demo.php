<?php

    //////////////////////////////////////////////// Les variables
    // $nom = 'Aubry';
    // $prenom = 'Romain';
    // $note1 = 10;
    // $note2 = 20;

    // // echo $note + $note2;
    // // echo $nom . ' ' . $prenom;
    // // echo $nom . "\n" . $prenom;
    // // echo "$prenom $nom";
    // echo "Bonjour $prenom $nom, vous avez eu " . (($note1 + $note2) / 2) . " de moyenne";






    //////////////////////////////////////////////// Les tableaux
    // $notes = [10, 20, 10, 9, 8];
    // $eleves = ['Marc', 'Doe', [10, 20, 40]];
    // $eleve = [
    //     'nom' => 'Doe',
    //     'prenom' => 'Marc',
    //     'notes' => [10, 20, 15]
    // ];
    // $eleve['classe'] = 'CM2-A';
    // $classe = [
    //     [
    //         'nom' => 'Doe',
    //         'prenom' => 'Marc',
    //         'notes' => [10, 12, 14]
    //     ],
    //     [
    //         'nom' => 'Durant',
    //         'prenom' => 'Pierre',
    //         'notes' => [8, 13, 16]
    //     ]
    // ];

    // echo $notes[1];
    // echo $eleves[2][1];
    // echo $eleve['nom'];
    // print_r($eleve);
    // print_r($classe);





    //////////////////////////////////////////////// Les conditions
    // $note = 9;
    // $note = (int)readline('Entrez votre note: ');
    // if ($note > 10){
    //     echo 'Bravo vous avez la moyenne';
    // }
    // elseif ($note == 10) {
    //     echo 'Vous avez juste la moyenne';
    // }
    // else {
    //     echo 'Dommage vous n\'avez pas la moyenne';
    // }

    // $action = (int)readline('Entrez votre action : (1: attaquer, 2: défendre, 3: passer mon tour)');
    // switch($action){
    //     case 1:
    //         echo 'J\'attaque';
    //         break;
    //     case 2:
    //         echo 'Je defends';
    //         break;
    //     case 3:
    //         echo 'Je passe mon tour';
    //         break;
    //     default:
    //         echo 'Commande inconnu';
    // }
    
    //$heure = (int)readline('Entrez une heure : ');
    // if((9 <= $heure && 12 >= $heure) || (14 <= $heure && 17 >= $heure)){
    //     echo 'Le magasin est ouvert.';
    // } else {
    //     echo 'Le magasin est fermer.';
    // }





    ///////////////////////////////////////// Les boucles
    $chiffre = null;
    $notes = [10, 20, 16];
    $eleves = [
        'cm2' => 'Jean',
        'cm1' => 'Marc'
    ];

    // while ($chiffre !== 10 ) {
    //     $chiffre = (int)readline('Entrez une valeur : ');
    // }
    // echo 'Bravo vous avez gagné!';

    // for($i = 0; $i < 10; $i++){
    //     echo "- $i \n";
    // }

    // foreach ($notes as $note) {
    //     echo "- $note \n";
    // }

    foreach ($eleves as $classe => $eleve){
        echo "$eleve est dans la classe de $classe \n";
    }

?>