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

    public function hasErrors(){
        return !empty($this->errors);
    }

    public function error(){
        dd($this->errors);
    }

}