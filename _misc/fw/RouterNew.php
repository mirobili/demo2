<?php


class RouterNew {
    private static $routes = [];

    // Define a GET route with any number of parameters
    public static function get($route, $controller, $method, ...$params) {
        self::$routes[$route] = [$controller, $method, $params];
    }

    // Match a request to a route and handle dynamic parameters
    public static function dispatch($requestUri) {
        foreach (self::$routes as $route => $action) {
            // Replace all {param} with a regex pattern that matches any value
            $pattern = preg_replace('/\{[a-zA-Z0-9_]+\}/', '([a-zA-Z0-9_]+)', $route);

            // Check if the request URI matches the pattern
            if (preg_match("#^$pattern$#", $requestUri, $matches)) {
                list($controller, $method, $params) = $action;
                array_shift($matches); // Remove the full match from the array
                $params = array_merge($params, $matches); // Combine static params with dynamic ones
                return call_user_func_array([new $controller, $method], $params);
            }
        }
        return '404 Not Found';
    }
}