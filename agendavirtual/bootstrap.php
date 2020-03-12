<?php

session_start();

require "app/config/database.php";
require "vendor/autoload.php";

use Slim\Factory\AppFactory;

use Models\Database;
//Initialize Illuminate Database Connection
new Database();

$displayErrorDetails = true;

$app = AppFactory::create();

$app->addErrorMiddleware($displayErrorDetails, false, false);