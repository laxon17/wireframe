<?php 

    class Router
    {
        private $routes = [
            'GET' => [],
            'POST' => []
        ];

        public static function loadRoutes($file) 
        {
            $router = new static;

            require $file;

            return $router;
        }

        public function GET($uri, $controller) 
        {
            $this->routes['GET'][$uri] = 'controllers/' . $controller . '.php';
        }

        public function POST($uri, $controller) 
        {
            $this->routes['POST'][$uri] = 'controllers/' . $controller . '.php';
        }

        public function direct($uri, $method)
        {
            if(array_key_exists($uri, $this->routes[$method])) 
            {
                return $this->routes[$method][$uri];
            }
            
            throw new InvalidArgumentException("No routes defined for \"{$uri}\"  URI!");
        }   
    }