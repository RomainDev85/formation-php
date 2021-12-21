<?php

include 'fonctions-user.php'; // Le fichier n'a pas besoin d'exister le script fonctionne.
require 'fonctions-user.php'; // Le fichier doit exister sinon le script ne s'execute pas.

$test = repondre_oui_non("Voulez vous continuer ? ");
var_dump($test);