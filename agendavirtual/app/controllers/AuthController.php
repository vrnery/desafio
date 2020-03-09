<?php
namespace app\controllers;

class AuthController extends Controller{
    public function index($request, $response, $args){
        $this->view('auth', [
            'nome' => 'Vanderson',
            'title' => 'Autentication'
        ]);
    }
}