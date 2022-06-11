<?php

require '../vendor/autoload.php';
use Router\Router;
use Symfony\Component\Debug\Debug;
use Exceptions\RouteNotFoundException;


// or enable only one feature
//ErrorHandler::register();
//DebugClassLoader::enable();

// If you want a custom generic template when debug is not enabled
// HtmlErrorRenderer::setTemplate('/path/to/custom/error.html.php');



define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) );
define('ROOT', dirname(__DIR__));

$router = new Router($_GET['url']);

$router->get('/home', 'App\Controllers\TrajetController@welcome');
$router->get('/', 'App\Controllers\TrajetController@index');
$router->get('/trajets/:id', 'App\Controllers\TrajetController@show');

$router->run();
