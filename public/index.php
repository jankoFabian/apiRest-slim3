<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
session_start();
require __DIR__ . '/../vendor/autoload.php';

//agregando 
$settings=require __DIR__.'/../src/settings.php';
//
$app = new \Slim\App($settings);
require __DIR__.'/../src/src_loader.php';
//provando midleware
//require __DIR__.'/../src/midlewares.php';
//require __DIR__.'/../src/middleware/autenticar_middleware.php';

require __DIR__.'/../src/dependencies.php';
require __DIR__.'/../src/routers.php';
require __DIR__.'/../src/router_autenticar.php';

$app->run();
?>