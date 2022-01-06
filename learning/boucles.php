<?php

    // $chiffre = null;
    // $notes = [10, 20, 16];
    // $eleves = [
    //     'cm2' => 'Jean',
    //     'cm1' => 'Marc'
    // ];
    
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
    
    // foreach ($eleves as $classe => $eleve){
    //     echo "$eleve est dans la classe de $classe \n";
    // }

    // $eleves = [
    //     'cm2' => ['Jean', 'Cindy', 'Baptiste'],
    //     'cm1' => ['Marc', 'Romain', 'Clémence']
    // ];

    // foreach ($eleves as $classe => $listeEleves){
    //     echo "La classe $classe:\n";
    //     foreach($listeEleves as $eleve){
    //         echo "- $eleve\n";
    //     }
    //     echo "\n";
    // }

    // Ex 1
    // $notes = [];
    // $action = null;

    // while ($action !== "fin"){
    //     $action = readline("Entrz une note : ");
    //     if($action !== "fin"){
    //         $notes[] = (int)$action;
    //     }
    // }
    
    // echo "Les notes sont :\n";
    // foreach($notes as $note){
    //     echo "- $note\n";
    // }

    //Ex2
    $creneaux = [];

    while (true){
        $debut = (int)readline('Heure d\'ouverture : ');
        $fin = (int)readline('Heure de fermeture : ');
        if($debut >= $fin){
            echo "Le créneaux ne peut pas etre enregistrer car l'heure d'ouverture ($debut) est superieur a l'heure de fermeture ($fin)";
        } else {
            $creneaux[] = [$debut, $fin];
            $action = readline("Voulez vous enregistrer un nouveau créneau (o/n) ? : ");
            if($action === "n"){
                break;
            }
        }
    }

    $heure = readline("A qu'elle heure voulez vous visiter le magasin ? ");
    $creneauTrouve = false;
    $magasinOuvert = "";

    foreach($creneaux as $creneau){
        if($heure >= $creneau[0] && $heure <= $creneau[1]){
            $creneauTrouve = true;
            $magasinOuvert = "Le magasin sera bien ouvert entre $creneau[0]h et $creneau[1]h.";
            break;
        }
    }

    if($creneauTrouve){
        echo $magasinOuvert;
    } else {
        echo "Le magasin sera fermer à $heure h";
    }

    

?>
