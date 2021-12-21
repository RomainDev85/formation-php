<?php

// $mot = (string)readline('veuillez entrer un mot : ');
// $reverse = strtolower(strrev($mot));
// if(strtolower($mot) === $reverse){
//     echo 'Ce mot est un palyndrome';
// } else {
//     echo "Ce mot n'est pas un palyndrome";
// }

$notes = [16, 10, 20];
$sum = array_sum($notes);
var_dump($sum);
$count = count($notes);
echo "Vous avez " . round(($sum / $count), 1) . " de moyenne.";



?>