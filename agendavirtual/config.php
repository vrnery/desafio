<?php

return[
    'email' => [
        'HOST' => 'smtp.gmail.com',
        'PORT' => '587',
        'USER' => 'email@gmail.com',
        'PASS' => 'senha'
    ],
    'login' => [
        'manager' => [
            'loggedIn' => 'manager_login',
            'redirect' => '/manager',
            'idLoggedIn' => 'id_manager',
        ],
        'user' => [
            'loggedIn' => 'user_login',
            'redirect' => '/',
            'idLoggedIn' => 'id_user',
        ],
        'company' => [
            'loggedIn' => 'company_login',
            'redirect' => '/company',
            'idLoggedIn' => 'id_company',
        ],
    ],
];