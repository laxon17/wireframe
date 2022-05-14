<?php

    session_start();
    $access_method = Request::getMethod();

    if($access_method !== 'GET' || empty($_SESSION['user_id']) || $_SESSION['role'] != 1)
    {
        Utilities::redirect('/index');
        die();
    }
    
    header("Content-Disposition: attachment; filename=categories.xls");
    header("Content-Type: application/x-msexcel");   
    header('Content-Type: application/vnd.ms-excel');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');  
    header("Pragma: no-cache"); 


    $categories = $database->selectRecords('Categories');

    $export_string = "Category Id\tCategory Name\n";

    foreach($categories as $category) {
        $export_string .= $category->CategoryId . "\t" . $category->CategoryName ."\n";
    }

    echo $export_string;
    