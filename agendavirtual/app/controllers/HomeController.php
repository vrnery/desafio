<?php

namespace app\controllers;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
// use Slim\Handlers\Strategies\RequestResponse;
// use Slim\Handlers\Strategies\RequestResponseArgs;

class HomeController extends Controller{
    public function index(Request $request, Response $response, Array $args){
        // dd($args);
        $this->view('home', [
            'title' => 'Home'
        ]);
        return $response;
    }
}