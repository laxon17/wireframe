<?php

    $post_id = $_GET['id'];
    $post = $database->selectFilteredRecord('Posts', 'PostId', $post_id);
    $page_title =  $post->PostTitle;
    
    $cover = $database->selectFilteredRecord('CoverImages', 'PostId', $post_id); 
    $writer = $database->selectFilteredRecord('Users', 'UserId', $post->UserId);
    $categories = $database->selectCategoriesOfPost($post_id);    

    $comments = $database->selectComments($_GET['id']);

    if($post->Approved) require 'resources/views/posts/view-post.view.php';
    else Utilities::redirect('/index'); 