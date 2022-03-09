<?php

    $access_method = Request::getMethod();
    
    $page_title = 'Surveys';

    if($access_method === 'GET' && isset($_GET['user_id'])) 
    {
        session_start();
        $current_user = $_SESSION['user_id'];
        $remote_user = $_GET['user_id'];
        if($current_user != $remote_user) Utilities::redirect('/index');
        else 
        {
            $polls = $database->selectPolls($current_user);
    
            require 'resources/views/user/survey.view.php';
        } 
    } 
    else Utilities::redirect('/index');