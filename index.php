<?php

require '../vendor/autoload.php';

use App\Exceptions\NotFoundException;
use Router\Router;
use Symfony\Component\Debug\Debug;

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();
// or enable only one feature
//ErrorHandler::register();
//DebugClassLoader::enable();

// If you want a custom generic template when debug is not enabled
// HtmlErrorRenderer::setTemplate('/path/to/custom/error.html.php');



define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) );
define('ROOT', dirname(__DIR__));
// define('DB_NAME', $_SERVER["SERVER_NAME"] !== "norbus.test" ? 'heroku_a07462fa3a91fd4' : 'norbus');
// define('DB_HOST', $_SERVER["SERVER_NAME"] !== "norbus.test" ? 'eu-cdbr-west-02.cleardb.net' : '127.0.0.1');
// define('DB_USER', $_SERVER["SERVER_NAME"] !== "norbus.test" ? 'b857ac46ef3acc' : 'root');
// define('DB_PWD', $_SERVER["SERVER_NAME"] !== "norbus.test" ? '83d0638c' : '');

define('DB_NAME', $_SERVER["SERVER_NAME"] !== "norbus.test" ? 'victo1854461' : 'norbus');
define('DB_HOST', $_SERVER["SERVER_NAME"] !== "norbus.test" ? '185.98.131.148' : '127.0.0.1');
define('DB_USER', $_SERVER["SERVER_NAME"] !== "norbus.test" ? 'victo1854461' : 'root');
define('DB_PWD', $_SERVER["SERVER_NAME"] !== "norbus.test" ? 'victo1854461' : '');

$router = new Router($_GET['url']);

$router->get('/order/:id', 'App\Controllers\OrderController@show');
$router->get('/option/:id', 'App\Controllers\OrderController@option');

$router->get('/login', 'App\Controllers\UserController@login');
$router->post('/login', 'App\Controllers\UserController@loginPost');
$router->get('/logout', 'App\Controllers\UserController@logout');

$router->get('/admin/orders', 'App\Controllers\Admin\OrderController@index');
$router->post('/admin/oder/delete/:id', 'App\Controllers\Admin\OrderController@destroy');
$router->get('/admin/order/edit/:id', 'App\Controllers\Admin\OrderController@edit');
$router->post('/admin/order/edit/:id', 'App\Controllers\Admin\OrderController@update');

$router->get('/', 'App\Controllers\Admin\OrderController@create');
$router->post('/admin/order/create', 'App\Controllers\Admin\OrderController@createOrder');

try {
    $router->run();
} catch (NotFoundException $e) {
    echo $e->error404();
}
