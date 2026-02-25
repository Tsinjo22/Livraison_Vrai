<?php
use app\middlewares\AuthMiddleware;
use app\middlewares\SecurityHeadersMiddleware;
use flight\Engine;
use flight\net\Router;
use app\controllers\HomeController;
/** 
 * @var Router $router 
 * @var Engine $app
 */


$home = new HomeController();
Flight::route('/', [$home, 'index']);

// Middleware d'authentification global
