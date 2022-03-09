<?php

    $router->GET('index', 'controllers/index');
    $router->GET('contact', 'controllers/contact');
    $router->GET('author', 'controllers/author');
    $router->GET('posts', 'controllers/posts/posts');

    $router->GET('profile', 'controllers/user/profile');
    $router->GET('survey', 'controllers/user/survey');


    $router->GET('register', 'controllers/authentication/registration');
    $router->GET('login', 'controllers/authentication/login');
    $router->GET('logout', 'controllers/authentication/logout');

    $router->GET('verify', 'controllers/validations/verify');

    $router->GET('delete-post', 'controllers/posts/delete-post');
    $router->GET('create-post', 'controllers/posts/create-post');
    $router->GET('view-post', 'controllers/posts/view-post');
    $router->GET('edit-post', 'controllers/posts/edit-post');
    $router->GET('search', 'controllers/posts/search');
    $router->GET('delete-comment', 'controllers/posts/delete-comment');

    $router->POST('register', 'controllers/authentication/registration');
    $router->POST('login', 'controllers/authentication/login');
    $router->POST('create-post', 'controllers/posts/create-post');
    $router->POST('edit-post', 'controllers/posts/edit-post');
    $router->POST('update-image', 'controllers/user/update-image');
    $router->POST('comment', 'controllers/posts/comment');
    $router->POST('contact', 'controllers/contact');

    $router->GET('dashboard/index', 'admin/controllers/index');
    $router->GET('dashboard/admin', 'admin/controllers/profile');
    $router->GET('dashboard/users', 'admin/controllers/users');
    $router->GET('dashboard/posts', 'admin/controllers/posts');
    $router->GET('dashboard/messages', 'admin/controllers/messages');
    $router->GET('dashboard/surveys', 'admin/controllers/surveys');
    $router->GET('dashboard/modify', 'admin/controllers/modify');

    $router->POST('dashboard/modify', 'admin/controllers/modify');
    $router->POST('dashboard/surveys', 'admin/controllers/surveys');
    $router->POST('dashboard/add_survey', 'admin/controllers/add_survey');
    $router->POST('dashboard/users', 'admin/controllers/users');
    $router->POST('dashboard/posts', 'admin/controllers/posts');
    $router->POST('surveys', 'controllers/surveys');