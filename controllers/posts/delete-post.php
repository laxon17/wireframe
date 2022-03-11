<?php

    $page_title = 'My profile';

    $access_method = Request::getMethod();

    

    if($access_method !== 'GET') Utilities::Redirect('/index');
    else 
    {
        session_start();
        $id = $_GET['id'];

        $writer = $database->selectFilteredRecord('Posts', 'PostId', $id);
        $writer_id = $writer->UserId;

        if($writer_id == $_SESSION['user_id'] || $_SESSION['role'] == 1) 
        {
            $cover = $database->selectFilteredRecord('CoverImages', 'PostId', $id);
            $database->deleteRecords('PostCategory', 'PostId', $id);
            $database->deleteRecords('CoverImages', 'PostId', $id);
            $database->deleteRecords('Comments', 'PostId', $id);
            $database->deleteRecords('Posts', 'PostId', $id);

            unlink("public/img/covers/" . $cover->CoverPath);

            session_start();

            Utilities::redirect('/profile?username=' . $_SESSION['username']);
        }
        else Utilities::Redirect('/index');
    }