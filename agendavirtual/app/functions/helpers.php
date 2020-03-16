<?php

use app\src\Flash;
use app\src\Redirect;

function dd($data){
    print_r($data);

    die();
}

function json($data){
    header('Content-Type: application/json');

    echo json_encode($data);
}

function path(){
    $vendorDir = dirname(dirname(__FILE__));
    return dirname($vendorDir);
}

function flash($index, $message){
    Flash::add($index, $message);
}

function error($message) {
    return "<span class='error'>* {$message}</span>";
}

function success($message) {
    return "<div class='alert alert-success' id='myCloseAlert' role='alert'><button type='button' class='close'>&times;</button>{$message}</div>";
}

function redirect($target){
    Redirect::redirect($target);

    die();
}

function back(){
    Redirect::back();

    die();
}