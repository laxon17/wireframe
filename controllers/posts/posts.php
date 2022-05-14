<?php

    $page_title = 'Posts';

    $access_method = Request::getMethod();

    $categories = $database->selectRecords('Categories');
    $recent_posts = $database->selectLastRecords('Posts', 'CreatedAt', 5, 1);
    $posts = $database->selectRecords('Posts');

    if($access_method === 'GET')
    {
        require 'resources/views/pages/posts.view.php';
        exit();
    }

    Utilities::redirect('/posts');