<?php

    $page_title = 'Dashboard';
    $access_method = Request::getMethod();

    session_start();

    if($access_method !== 'GET' || empty($_SESSION['user_id']) || $_SESSION['role'] != 1) Utilities::redirect('/index');
    else 
    {
        if(isset($_GET['delete_message']) && isset($_SESSION['user_id']) && $_SESSION['role'] == 1) 
        {
            $message_id = $_GET['delete_message'];
            $database->deleteRecords('ContactMessages', 'MessageId', $message_id);
            Utilities::redirect('/dashboard/messages');        
        } 
        else if(isset($_GET['view_message']) && isset($_SESSION['user_id']) && $_SESSION['role'] == 1)
        {
            $message_id = $_GET['view_message'];
            $message = $database->selectFilteredRecord('ContactMessages', 'MessageId', $message_id);
            $database->updateRecord('ContactMessages', 'HasRead', 1, 'MessageId', $message_id);
            require 'admin/views/partials/content/view-message.view.php';
        }
        else if(isset($_GET['delete_all']) && isset($_SESSION['user_id']) && $_SESSION['role'] == 1)
        {
            $database->deleteAllRecords('ContactMessages');
            Utilities::redirect('/dashboard/messages');   
        }
        else 
        {
            $messages = $database->selectRecords('ContactMessages', 1);     
            require 'admin/views/pages/index.view.php';
        }
    }