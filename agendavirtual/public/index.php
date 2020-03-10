<?php
require "../bootstrap.php";

$router = $app->getRouteCollector();

$app->get('/', 'app\controllers\HomeController:index');

$app->group('/cadastro', function($router){
    $router->get('', 'app\controllers\CadastroController:create');
    $router->get('/store', 'app\controllers\CadastroController:store');
});

$app->group('/auth', function($router){
    $router->post('/login', 'app\controllers\AuthController:index');
});

$app->group('/company', function($router){
    $router->get('/', 'app\controllers\CompanyController:index');
    $router->get('/login',function($request, $response, $args){
        dd($request);
    });
});

$app->group('/home', function($router){
    $router->get('', 'app\controllers\HomeController:index');
    $router->get('/login',function($request, $response, $args){
        dd($request);
    });
});

$app->group('/schedule', function($router){
    $router->get('', 'app\controllers\ScheduleController:index');
    $router->get('/login',function($request, $response, $args){
        dd($request);
    });
});


$app->run();