<?php
namespace Router;

use Exceptions\RouteNotFoundException;

class Router
{
    public $url;
    public $routes = [];

    public function __construct($url)
    {
        $this->url = trim($url, '/');
    }

    public function __toString()
    {
        return "je suis la classe router";
    }

    public function get(string $path, string $action)
    {
        $this->routes['GET'][] = new Route($path, $action);
    }

    public function post(string $path, string $action)
    {
        $this->routes['POST'][] = new Route($path, $action);
    }

    public function run()
    {
        foreach($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if($route->matches($this->url)) {
                return $route->execute();
            }
        }
        return header('HTTP/1.0 404 Not Found');
    }



    // private array $routes;
    // public function register(string $path, callable $action): void
    // {
    //     $this->routes[$path] = $action;
    // }

    // public function resolve(string $uri): mixed
    // {
    //     $path = explode('?', $uri)[0];
    //     $action = $this->routes[$path] ?? null;

    //     if(!is_callable($action)) {
    //         throw new RouteNotFoundException();
    //     }

    //     return $action();
    // }
}