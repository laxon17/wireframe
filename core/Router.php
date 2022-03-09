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
            $this->routes['GET'][$uri] = $controller . '.php';
        }

        public function POST($uri, $controller) 
        {
            $this->routes['POST'][$uri] =  $controller . '.php';
        }

        public function direct($uri, $method)
        {
            if(array_key_exists($uri, $this->routes[$method])) 
            {
                return $this->routes[$method][$uri];
            }
            
            else Utilities::redirect('/index');
        }   
    }