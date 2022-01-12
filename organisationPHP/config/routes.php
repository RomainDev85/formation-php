<?php
$router->map('GET', '/', 'home');
$router->map('GET', '/nous-contacter', 'contact', 'contact');
$router->map('GET', '/blog/[a:slug]-[i:id]', 'article', 'article');