<?php

namespace Router;

use Database\Config;
use Database\DBConnection;

class Route
{
    public $path;
    public $action;
    public $matches;

    public function __construct($path, $action)
    {
        $this->path = trim($path, '/');
        $this->action = $action;
    }

    public function matches(string $url)
    {
        $path = preg_replace('#:([\w]+)#', '([^/]+)', $this->path);
        $pathToMatch = "#^$path$#";

        if(preg_match($pathToMatch, $url, $matches)){
            $this->matches = $matches;
            return true;
        } else {
            return false;
        }
    }

    public function execute()
    {
        if($_SERVER["SERVER_NAME"] !== "norbus.test"){
            $host = 'eu-cdbr-west-02.cleardb.net';
            $user = 'b857ac46ef3acc';
            $password= '83d0638c';
            $db_name = 'heroku_a07462fa3a91fd4';
       } else {
           $host = '127.0.0.1';
           $user = 'root';
           $password= '';
           $db_name = 'norbus';
       }
        $params = explode('@', $this->action);
        $controller = new $params[0](new DBConnection($db_name, $host, $user, $password));
        $method = $params[1];

        return isset($this->matches[1]) ? $controller->$method($this->matches[1]) : $controller->$method();
    }
}