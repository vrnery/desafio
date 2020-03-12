<?php

namespace app\src;

use app\traits\Validations;

class Validate{
    
    use Validations;

    public function validate($rules){
        foreach ($rules as $field => $validation){
            $validation = $this->validationWithParamter($field, $validation);
            
            if ($this->hasOneValidation($validation)){
                $this->$validation($field);
            }

            if ($this->hasTwoOneOrMoreValidation($validation)){
                $validations = explode(':', $validation);

                foreach ($validations as $validation) {
                    $this->$validation($field);
                }
            }
        }
    }

    private function validationWithParamter($field, $validation){
        if(substr_count($validation, '@') > 0){
            $validations = explode(':', $validation);
        }

        foreach ($validations as $key => $value) {
            if (substr_count($value, '@') > 0) {
                list($validationWithParameter, $parameter) = explode('@', $value);

                $this->$validationWithParameter($field, $parameter);

                unset($validations[$key]);

                $validation = implode(':', $validations);
            }
        }

        return $validation;
    }

    private function hasOneValidation($validate){
        return substr_count($validate, ':') == 0;
    }

    private function hasTwoOneOrMoreValidation($validate){
        return substr_count($validate, ':') >= 1;
    }

}