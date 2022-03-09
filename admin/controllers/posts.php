<?php

    $page_title = 'Dashboard';
    $access_method = Request::getMethod();

    session_start();

    if(empty($_SESSION['user_id']) || $_SESSION['role'] !== 1) Utilities::redirect('/index');
    else if($access_method === 'POST')
    {
        $str_json = file_get_contents('php://input');
        $decoded_json = json_decode($str_json, false);
        $post_id = $decoded_json->post_id;

        $database->updateRecord('Posts', 'Approved', 1, 'PostId', $post_id);
    } 
    else
    {
        $posts = $database->selectFilteredRecords('Posts', 'Approved', 0);
        require 'admin/views/pages/index.view.php';
    }