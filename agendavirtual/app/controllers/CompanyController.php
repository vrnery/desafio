<?php
namespace app\controllers;

class CompanyController extends Controller{
    public function index($request, $response, $args){
        $this->view('company', [
            'nome' => 'Vanderson',
            'title' => 'Company'
        ]);
    }
}