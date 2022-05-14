<?php

    $page_title = 'Dashboard';
    $access_method = Request::getMethod();

    session_start();

    if(empty($_SESSION['user_id']) || $_SESSION['role'] != 1) Utilities::redirect('/index');
    else 
    {
        $posts_count = $database->getRecordCount('Posts');
        $comment_count = $database->getRecordCount('Comments');
        $categories_count = $database->getRecordCount('Categories');
        $users_count = $database->getRecordCount('Users');

        $log_content = file('private/visitors.txt');
        $visitor_count = count($log_content);
        $visitors = [];

        for($i = count($log_content) - 1; $i > 2; $i--) 
            array_push($visitors, explode("\t", $log_content[$i]));

        
        require 'admin/views/pages/index.view.php';
    }