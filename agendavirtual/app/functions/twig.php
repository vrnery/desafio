<?php

use app\src\Flash;
use Models\User;
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

$user = new \Twig\TwigFunction('user', function(){
    if($_SESSION['id_user']){
        return (new User)->find($_SESSION['id_user'])->first();
    } else {
        return false;
    }
});

return [
    $file_exists,
    $teste,
    $message,
    $user,
];