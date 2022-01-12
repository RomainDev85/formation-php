<?php
require '../vendor/autoload.php';

$uri = $_SERVER['REQUEST_URI'];

if($uri !== '/'){
    require '../elements/header.php';
    require '../templates/404.php';
    require '../elements/footer.php';
    header( "refresh:3; url=/");
} else {
    require '../elements/header.php';
    require '../templates/index.php';
    require '../elements/footer.php';
}

