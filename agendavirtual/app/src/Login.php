<?php

namespace app\src;

use app\src\Password;
use Illuminate\Database\Eloquent\Model;

class Login
{
    private $type;
    private $config;

    public function __construct($type)
    {
        $this->type = $type;
        $this->config = (object) Load::file('/config.php')['login'][$this->type];
    }

    public function login($data, Model $model)
    {
        if (!isset($this->type)) {
            throw new \Exception('Para fazer login, informar o tipo');
        }


        $user = $model->where('email', $data->email)->first();

        if (!$user) {
            return false;
        }

        if (Password::verify($data->password, $user->password)) {
            $_SESSION[$this->config->idLoggedIn] = $user->id;
            $_SESSION[$this->config->loggedIn] = true;
            return true;
        }

        return false;
    }

    public function logout(){
        session_destroy();
        redirect($this->config->redirect);
    }
}
