<?php

namespace Framework;

class Router
{
    public function route(array $static_routes, ?string $url, ?string $query) {
        $this->getControllerName($static_routes, null, $controller, $action, $paramNames);
        $split_query = null;

        // remove the query string from the URL and make sure the link ends with a slash
        if (isset($url)) {
            $url = preg_replace('/\?.*/', '', $url);
            $url = rtrim($url, '/') . '/';
        }

        // split the query string into an array
        if (isset($query)) {
            parse_str($query, $split_query);
        }

        // static route assignment
        if (isset($static_routes[$url])) {
            $this->getControllerName($static_routes, $url, $controller, $action, $paramNames);
        }

        $params = [];
        foreach ($paramNames as $paramName)
        {
            $params[$paramName] = null;
            if (isset($_POST[$paramName]))
            {
                $params[$paramName] = $_POST[$paramName];
            }
        }

        $controller->{$action}($params, $split_query);
    }

    private function getControllerName(?array $routes, ?string $url, &$controller, &$action, &$params) {
        if (!isset($routes[$url])) {
            $url = null;
        }

        $controllerName = $routes[$url]['controller'];
        $action = $routes[$url]['action'];
        $params = $routes[$url]['params'];

        $class = "\App\Controllers\\" . $controllerName;
        $controller = new $class();
    }
}
