<?php

    $router->GET('index', 'index');
    $router->GET('contact', 'contact');
    $router->GET('author', 'author');
    $router->GET('register', 'registration');
    $router->GET('login', 'login');
    $router->GET('posts', 'posts');
    $router->GET('logout', 'logout');

    $router->POST('register', 'registration');
    $router->POST('login', 'login');
    