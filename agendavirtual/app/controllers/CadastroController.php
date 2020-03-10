<?php
namespace app\controllers;

class CadastroController extends Controller{
    
    public function create(){
        $this->view('cadastro.user', [
            'title' => 'Cadastrar'
        ]);
    }

    public function store(){
        $users = new Users;
        $users = $users->all();

        $this->view('cadastro.user', [
            'title' => 'Home'
        ]);
    }
}