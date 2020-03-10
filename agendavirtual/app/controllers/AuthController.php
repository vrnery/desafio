<?php
namespace app\controllers;

class AuthController extends Controller{
    public function index(){
        $this->view('auth', [
            'title' => 'Autentication'
        ]);
    }
}