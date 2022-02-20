<?php

    $router->GET('', 'index');
    $router->GET('contact', 'contact');
    $router->GET('author', 'author');
    $router->GET('register', 'registration');
    $router->GET('login', 'login');

    $router->POST('login', 'login');
    $router->POST('register', 'registration');