<?php

use app\src\Flash;
// use Psr\Http\Message\ResponseInterface;

// $file_exists = new Twig\SimpleFunction('file_exists', function($file){
$file_exists = new \Twig\TwigFunction('file_exists', function($file){
    return file_exists($file);
});

$teste = new \Twig\TwigFunction('teste', function(){
    echo 'Testando';
});

$message = new \Twig\TwigFunction('message', function($index){
    echo Flash::get($index);
});

return [
    $file_exists,
    $teste,
    $message
];