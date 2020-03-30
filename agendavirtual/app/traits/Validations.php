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
        $model = "Models\\".ucfirst($model);

        $model = new $model();

        // $find = $model->find($field, $_POST[$field]);
        $find = $model::where($field, $_POST[$field])->first();

        if ($find and !empty($_POST[$field])) {
            $this->errors[$field][] = Flash($field, error('Emails já esta cadastrado'));
        }
    }
    
    protected function email($field){
        if(!filter_var($_POST[$field], FILTER_VALIDATE_EMAIL)) {
            $this->errors[$field][] = Flash($field, error('Esse email é inválido'));
        }
    }

    protected function max($field, $max){
        if (strlen($_POST[$field]) > $max) {
            $this->errors[$field][] = Flash($field, error('O número máximo de caracteres permitido é '.$max));
        }
    }

    protected function tell($field){
        if(!preg_match("/\([0-9]{2}\) [0-9]{4}\-[0-9]{4}/", $_POST[$field])){
            $this->errors[$field][] = Flash($field, error('Formatação invalida para telefone'));
        }
    }

    protected function cell($field){
        if(!preg_match("/\([0-9]{2}\) [0-9]{5}\-[0-9]{4}/", $_POST[$field])){
            $this->errors[$field][] = Flash($field, error('Formatação invalida para celular'));
        }
    }

    protected function cep($field){
        if(!preg_match("/[0-9]{5}\-[0-9]{3}/", $_POST[$field])){
            $this->errors[$field][] = Flash($field, error('Formatação invalida para cep'));
        }
    }

    public function hasErrors(){
        return !empty($this->errors);
    }

    public function error(){
        dd($this->errors);
    }

}