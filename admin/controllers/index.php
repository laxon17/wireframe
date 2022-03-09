<?php

    $page_title = 'Dashboard';
    $access_method = Request::getMethod();

    session_start();

    if($access_method !== 'GET' || empty($_SESSION['user_id']) || $_SESSION['role'] !== 1) Utilities::redirect('/index');
    else 
    {
        $posts_count = $database->getRecordCount('Posts');
        $comment_count = $database->getRecordCount('Comments');
        $categories_count = $database->getRecordCount('Categories');
        $users_count = $database->getRecordCount('Users');
        
        require 'admin/views/pages/index.view.php';
    }