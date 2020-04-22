<?php
require "../bootstrap.php";

$router = $app->getRouteCollector();

$app->get('/', 'app\controllers\HomeController:index');

$app->group('/axios', function($router){
    $router->get('/teste', 'app\controllers\AxiosController:teste');
});

// $router->get('/newuser', 'app\controllers\CadastroController:newuser');
// $router->get('/store', 'app\controllers\CadastroController:store');

$app->group('/cadastro', function($router){
    $router->get('/user', 'app\controllers\CadastroController:newuser');
    $router->post('/storeuser', 'app\controllers\CadastroController:storeuser');
});

$app->group('/user', function($router){
    $router->get('', 'app\controllers\UserController:index');
    $router->post('/store', 'app\controllers\UserController:store');
    $router->get('/edit', 'app\controllers\UserController:edit');
    $router->post('/update', 'app\controllers\UserController:update');
    $router->post('/foto', 'app\controllers\UserController:file');
    $router->post('/login', 'app\controllers\AuthController:auth_user');
    $router->get('/logout', 'app\controllers\AuthController:destroy_user');
});

$app->group('/company', function($router){
    $router->get('', 'app\controllers\CompanyController:index');
    $router->post('/store', 'app\controllers\CompanyController:store');
});

$app->group('/contact', function($router){
    $router->get('', 'app\controllers\ContactController:index');
    $router->post('/store', 'app\controllers\ContactController:store');
});

$app->group('/admin', function($router){
    $router->get('', 'app\controllers\AdminController:index');
});

// $app->group('/auth', function($router){
//     $router->post('/login', 'app\controllers\AuthController:index');
// });

// $app->group('/company', function($router){
//     $router->get('/', 'app\controllers\CompanyController:index');
//     $router->get('/login',function($request, $response, $args){
//         dd($request);
//     });
// });

// $app->group('/home', function($router){
//     $router->get('', 'app\controllers\HomeController:index');
//     $router->get('/login',function($request, $response, $args){
//         dd($request);
//     });
// });

// $app->group('/schedule', function($router){
//     $router->get('', 'app\controllers\ScheduleController:index');
//     $router->get('/login',function($request, $response, $args){
//         dd($request);
//     });
// });
$app->get('/teste', function(){
    echo phpinfo();
});

$app->run();