<?php

namespace Framework;


class Router
{
    public function route(array $static_routes, ?string $url, ?string $query) {
        $params = array();
        $this->getControllerName($static_routes, null, $controller, $action);
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
            $this->getControllerName($static_routes, $url, $controller, $action);
        }

        $controller->{$action}($params, $split_query);
    }

    private function getControllerName(?array $routes, ?string $url, &$controller, &$action) {
        if (!isset($routes[$url])) {
            $url = null;
        }

        $controllerName = $routes[$url]['controller'];
        $action = $routes[$url]['action'];

        $class = "\App\Controllers\\" . $controllerName;
        $controller = new $class();
    }
}
