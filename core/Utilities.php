<?php

    class Utilities 
    {
        private $expressions = [
            'Password' => '/^[A-Z]{1}[a-z0-9!@#$%^.&*]{7,19}$/',
            'Mail' => '/^[a-zA-Z0-9]([a-z]|[0-9])+\.?-?_?([a-z]|[0-9])*\.?([a-z]|[0-9])*\@[a-z]{3,}\.([a-z]{2,4}\.)?([a-z]{2,4})$/',
            'FirstName' => '/^[A-Z]{1}[a-z]{2,14}$/',
            'LastName' => '/^[A-Z]{1}[a-z]{4,29}$/',
            'Username' => '/^([a-z]{1})[a-z0-9]{4,29}$/',
            'UserId' => '/^(([a-zA-Z0-9]([a-z]|[0-9])+\.?-?_?([a-z]|[0-9])*\.?([a-z]|[0-9])*\@[a-z]{3,}\.([a-z]{2,4}\.)?([a-z]{2,4}))|(([a-z]{1})[a-z0-9]{4,29}))$/'
        ];
        
        public static function dieDump($variable)
        {
            die(var_dump($variable));
        }

        public static function redirect($location) 
        {
            return header("location: {$location}");
        } 
        
        public static function checkRegex($value, $name) 
        {
            $utility = new static;
            
            if(preg_match($utility->expressions[$name], $value)) return true;

            return false;
        }
    }