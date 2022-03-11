<?php

    $page_title = 'Dashboard';
    $access_method = Request::getMethod();

    session_start();

    if(empty($_SESSION['user_id']) || $_SESSION['role'] != 1) Utilities::redirect('/index');
    else if($access_method === 'POST')
    {
        $str_json = file_get_contents('php://input');
        $decoded_json = json_decode($str_json, false);
        $role_id = $decoded_json->role_id;
        $user_id = $decoded_json->user_id;

        $database->updateRecord('Users', 'RoleId', $role_id, 'UserId', $user_id);
        Utilities::redirect('/dashboard/users');
    }
    else 
    {
        $users = $database->selectRecords('Users');
        $roles = $database->selectRecords('Roles');
        require 'admin/views/pages/index.view.php';
    }