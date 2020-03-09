<?php
require_once  __DIR__ . '/vendor/autoload.php';

$loader = new \Twig\Loader\ArrayLoader([
    'exemplo' => 'Hello {{ name }}!',
]);

$twig = new \Twig\Environment($loader);

echo $twig->render('exemplo', ['name' => 'Vanderson Nery']);