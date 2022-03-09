<?php

    $page_title = 'Dashboard';
    $access_method = Request::getMethod();

    session_start();

    if(empty($_SESSION['user_id']) || $_SESSION['role'] !== 1) Utilities::redirect('/index');
    else if($access_method === 'POST')
    {
        $str_json = file_get_contents('php://input');
        $decoded_json = json_decode($str_json, false);
        $survey_id = $decoded_json->survey_id;

        $database->updateRecord('Poll', 'IsActive', 0, 'PollId', $survey_id);
    }
    else
    {
        $surveys = $database->selectRecords('Poll'); 
        require 'admin/views/pages/index.view.php';
    }