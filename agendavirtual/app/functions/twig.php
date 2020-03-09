<?php

// $file_exists = new Twig\SimpleFunction('file_exists', function($file){
$file_exists = new \Twig\TwigFunction('file_exists', function($file){
    return file_exists($file);
});

$teste = new \Twig\TwigFunction('teste', function(){
    echo 'Testando';
});

return [
    $file_exists,
    $teste
];