<?php

namespace Betteryourweb\Framework\Routes;

use Betteryourweb\Framework\Application;
use Silex\Route;

class Router
{
    protected $routes;
    /**
     * @var Application
     */
    private $app;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function make($path, $action, $method){
        $this->app->match($path,$action,$method);

    }
    public function get($path, $action){
        return $this->setRoutes($path, $action, 'get');
    }
    public function post($path, $action){
        return $this->setRoutes($path, $action, 'POST');
    }
    public function delete($path, $action){
        return $this->setRoutes($path, $action, 'delete');
    }
    public function put($path, $action){
        return $this->setRoutes($path, $action, 'put');
    }
    public function patch($path, $action){
        return $this->setRoutes($path, $action, 'patch');
    }

    public function getRoutes(){
        return $this->routes;
    }


    public function run(){
        foreach ($this->routes as $route) {
            $action = $route['action'];
            $method = $route['method'];
            $path = $route['path'];

            $this->make($path, $action, $method);

        }
    }

    /**
     * @param $path
     * @param $action
     * @param $method
     */
    protected function setRoutes($path, $action, $method)
    {
        $this->routes[] = ['path' => $path, 'action' => $action, 'method' => $method];
    }
}