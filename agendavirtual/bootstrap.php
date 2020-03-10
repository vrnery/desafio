<?php
require "app/config/database.php";
require "vendor/autoload.php";

use Slim\Factory\AppFactory;
use Slim\Handlers\Strategies\RequestResponseArgs;
use Models\Database;
//Initialize Illuminate Database Connection
new Database();

$app = AppFactory::create();