<?php

    $comment_id = $_GET['comment_id'];
    $writer = $database->selectFilteredRecord('Comments', 'CommentId', $comment_id);
    session_start();

    if(empty($comment_id)) Utilities::redirect('/index');
    else if($_SESSION['role'] === 1 || $writer->UserId === $_SESSION['user_id'])
    {
        $comment = $database->selectFilteredRecord('Comments', 'CommentId', $comment_id);
        $post_id = $comment->PostId;
        if($comment->ParentId === null) 
        {
            $database->deleteRecords('Comments', 'ParentId', $comment_id);
            $database->deleteRecords('Comments', 'CommentId', $comment_id);
        }
        else $database->deleteRecords('Comments', 'CommentId', $comment_id);

        Utilities::redirect('/view-post?id=' . $post_id);
    }