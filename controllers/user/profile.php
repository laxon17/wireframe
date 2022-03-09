<?php

    $page_title = 'Profile';

    if(empty($_GET['username'])) Utilities::redirect('/index');
    else 
    {
        $user = $database->selectFilteredRecord('Users', 'UserName', $_GET['username']);
        if(empty($user)) Utilities::redirect('/');
        $role_name = $database->selectFilteredRecord('Roles', 'RoleId', $user->RoleId);
        $posts = $database->selectFilteredRecords('Posts', 'UserId', $user->UserId);

        require 'resources/views/user/profile.view.php';
    }