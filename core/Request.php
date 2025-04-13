<?php

namespace Core;

class Request
{
    /**
     * Get the path from the current request URI.
     *
     * ✅ SRP (Single Responsibility Principle):
     * This method only handles parsing the URI path.
     */
    public function getPath(): string
    {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        return rtrim($path, '/') ?: '/';
    }

    /**
     * Get the HTTP request method (e.g. GET, POST).
     *
     * ✅ SRP:
     * This method is only responsible for detecting the method.
     */
    public function getMethod(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD']);
    }

    /**
     * Get and sanitize the request body (from $_GET or $_POST).
     *
     * ✅ SRP:
     * Only responsible for processing input data.
     *
     * ✅ OCP (Open/Closed Principle):
     * You can extend this to support JSON or file uploads
     * without changing the existing logic.
     */
    public function getBody(): array
    {
        $body = [];

        if ($this->getMethod() === 'GET') {
            foreach ($_GET as $key => $value) {
                $body[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        if ($this->getMethod() === 'POST') {
            foreach ($_POST as $key => $value) {
                $body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        return $body;
    }
}
