<?php
require 'class/Message.php';
$date = new DateTime();
$dateFormat = "le {$date->format('d/m/Y')} à {$date->format('G')}h{$date->format('i')}";
// var_dump($date->format("d/m/Y"));
echo $dateFormat;