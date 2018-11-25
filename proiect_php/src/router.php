<?php
class Router
{
    protected $routes;

    public function __construct($routesArray)
    {
        $this->routes = $routesArray;
    }

    public function route($url)
    {
        $controller = $this->routes[$url]["controller"];
        require_once "../app/Controllers/".$controller.".php";
        $controllerObj = new $controller();

        $action = $this->routes[$url]["action"];
        $controllerObj->{$action}();
    }
}