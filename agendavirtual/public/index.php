<?php
require "../bootstrap.php";

// use Psr\Http\Message\ServerRequestInterface as Request;
// use Psr\Http\Message\ResponseInterface as Response;
// use Slim\Http\Request;
// use Slim\Http\Response;

$router = $app->getRouteCollector();

$app->get('/', 'app\controllers\HomeController:index');

$app->group('/axios', function($router){
    $router->get('/teste', 'app\controllers\AxiosController:teste');
});
// $router->get('/newuser', 'app\controllers\CadastroController:newuser');
// $router->get('/store', 'app\controllers\CadastroController:store');

$app->group('/cadastro', function($router){
    $router->get('', 'app\controllers\CadastroController:index');
    $router->post('/store', 'app\controllers\CadastroController:store');
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