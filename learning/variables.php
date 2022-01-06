<?php

    $nom = 'Aubry';
    $prenom = 'Romain';
    $note1 = 10;
    $note2 = 20;

    // echo $note + $note2;
    // echo $nom . ' ' . $prenom;
    // echo $nom . "\n" . $prenom;
    // echo "$prenom $nom";
    echo "Bonjour $prenom $nom, vous avez eu " . (($note1 + $note2) / 2) . " de moyenne";

?>