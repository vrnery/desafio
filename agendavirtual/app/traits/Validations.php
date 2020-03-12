<?php
namespace app\traits;

trait Validations{

    private $errors = [];

    protected function required($field){
        if (empty($_POST[$field])){
            $this->errors[$field][] = Flash($field, error('Esse campo é obrigatório'));
        }
    }
    
    protected function unique($field, $model){
        dd($field);
    }
    
    protected function email($field){
        if(!filter_var($_POST[$field], FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field][] = Flash($field, error('Esse email é inválido'));
        }
    }

    protected function max($field, $max){
        // dd($field);
    }

    public function hasErrors(){
        return !empty($this->errors);
    }

    public function error(){
        dd($this->errors);
    }

}