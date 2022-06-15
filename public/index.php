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
define('DB_NAME', $_SERVER["SERVER_NAME"] !== "norbus.test" ? 'heroku_a07462fa3a91fd4' : 'norbus');
define('DB_HOST', $_SERVER["SERVER_NAME"] !== "norbus.test" ? 'eu-cdbr-west-02.cleardb.net' : '127.0.0.1');
define('DB_USER', $_SERVER["SERVER_NAME"] !== "norbus.test" ? 'b857ac46ef3acc' : 'root');
define('DB_PWD', $_SERVER["SERVER_NAME"] !== "norbus.test" ? '83d0638c' : '');

$router = new Router($_GET['url']);

$router->get('/home', 'App\Controllers\OrderController@welcome');
// $router->post('/', 'App\Controllers\OrderController@index');
$router->get('/', 'App\Controllers\VilleController@index');
$router->get('/order/:id', 'App\Controllers\OrderController@show');
$router->get('/option/:id', 'App\Controllers\OrderController@option');

$router->get('/admin/orders', 'App\Controllers\Admin\OrderController@index');
$router->post('/admin/oder/delete/:id', 'App\Controllers\Admin\OrderController@destroy');
$router->get('/admin/order/edit/:id', 'App\Controllers\Admin\OrderController@edit');
$router->post('/admin/order/edit/:id', 'App\Controllers\Admin\OrderController@update');

try {
    $router->run();
} catch (NotFoundException $e) {
    echo $e->error404();
}
