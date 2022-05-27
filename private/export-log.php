<?php

    session_start();
    $access_method = Request::getMethod();

    if($access_method !== 'GET' || empty($_SESSION['user_id']) || $_SESSION['role'] != 1)
    {
        Utilities::redirect('/index');
        die();
    }
    header("Content-Disposition: attachment;Filename=log.txt");

    $log_content = file('private/visitors.txt');

    $string_to_dispose = "IpAddress\t\tURI\t\tREQUEST_METHOD\t\tTIME\t\t\n";
    $visit = [];

    for($i = 2; $i < count($log_content); $i++) 
    {
        array_push($visit, explode("\t", $log_content[$i]));
        foreach($visit as $information)
        {
            $string_to_dispose .= "$information[0]\t\t$information[1]\t\t$information[2]\t\t$information[3]\t\t\n";
        }
    }

    echo $string_to_dispose;
    