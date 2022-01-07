<?php
require '../html/class/Creneau.php';
require '../html/class/Form.php';

// $date = new DateTime(); // instancie un objet
// echo $date->format('d/m/Y'); // utilise une méthode
// $date = '2019-01-01';
// $date2 = '2019-04-02';

// Approche procédural
// $time = strtotime($date);
// $time2 = strtotime($date2);
// $days = floor(abs(($time - $time2) / (24 * 60 * 60)));
// echo "Il y a $days jours de différence";

// echo "\n";

// Approche POO
// $d = new DateTime($date);
// $d2 = new DateTime($date2);
// $diff = $d->diff($d2, true);
// echo "Il y a $diff->days jours de différence";
// echo "Il y a $diff->y année, $diff->m mois, $diff->d jours de différence"; // Compliquer a calculer en procédural mais facilter en POO grace au proprieté renvoyer par la méthode diff de l'objet DateTime

$creneau = new Creneau(9, 12);
$creneau2 = new Creneau(14, 17);
// var_dump($creneau->inclusHeure(10));
// var_dump($creneau2->inclusHeure(10));
// var_dump($creneau->interesect($creneau2));

echo Form::checkbox('demo', 'Demo', []);
echo Form::$class;
