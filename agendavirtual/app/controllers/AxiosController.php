<?php
namespace app\controllers;

class AxiosController{
    
    public function teste(){
        echo json_encode("Teste ok");
        die();
    }

    public function sourcecadastro(){
        Redirect::redirect("/cadastro");
        
        die();
    }
}