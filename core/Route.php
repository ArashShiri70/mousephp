<?php

class Route
{
    private static array $routes = [];

    public static function get(string $path, callable $callback)
    {
        self::$routes['GET'][$path] = $callback;
    }

    public static function resolve(string $requestUri, string $method)
    {
        $callback = self::$routes[$method][$requestUri] ?? null;

        if (!$callback) {
            http_response_code(404);
            echo "404 - Not Found";
            return;
        }

        call_user_func($callback);
    }
}
