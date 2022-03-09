<?php

    class Request
    {
        public static function getUri()
        {
            $uri = trim($_SERVER['REQUEST_URI'], '/');
            if(strpos($uri, '?')) return substr($uri, 0, strpos($uri, '?'));
            return $uri;
        }

        public static function getMethod()
        {
            return $_SERVER['REQUEST_METHOD'];
        }
    }