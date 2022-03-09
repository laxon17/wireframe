<?php

    $page_title = 'Verification';

    $token = $_GET['token'];

    if(isset($token) )
    {
        $user = $database->selectFilteredRecord('Users', 'UserToken', $token);
        if(isset($user)) 
        {
            $database->updateRecord('Users', 'UserVerified', 1, 'UserId', $user->UserId);
    
            require 'resources/views/authentication/verify.view.php';
        }
    }

    if($_SERVER['HTTP_REFERER'] == null) Utilities::redirect('/index'); 
    else require 'resources/views/authentication/verify.view.php';