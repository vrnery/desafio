<?php

namespace app\controllers;

use app\src\Login;
use app\src\Validate;
use Models\User;

class AuthController extends Controller
{
    public function index()
    {
        $this->view('auth', [
            'title' => 'Autentication',
        ]);
    }

    public function auth_user()
    {
        $validate = new Validate;

        $data = $validate->validate([
            'email' => 'required:email:max@200',
            'password' => 'required',
        ]);

        if ($validate->hasErrors()) {
            return back();
        }

        $login = new Login('user');
        $loggedIn = $login->login($data, new User);

        if($loggedIn) {
            return back();
        }

        flash('message', alert('Email e/ou senha incorretos'));
        return back();
    }

    public function destroy_user() {
        $logout = new Login('user');
        $logout->logout();
    }
}
