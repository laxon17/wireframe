<?php

    $page_title = 'Posts';

    $access_method = Request::getMethod();

    $categories = $database->selectRecords('Categories');
    $recent_posts = $database->selectLastRecords('Posts', 'CreatedAt', 5, 1);

    if($access_method === 'GET')
    {
        $chosen_categories = [];
        $number_of_records = $database->selectRecords('Posts');
        $pages_number = ceil(count($number_of_records) / 5);    

        if(!isset($_GET['page'])) $start_point = 0;
        else $start_point = ($_GET['page']-1) * 5; 

        if(isset($_GET['categories'])) 
        {
            foreach($_GET['categories'] as $category_id) array_push($chosen_categories, $category_id);
        
            $posts = $database->selectPostsByCategory($chosen_categories, 0, 1, $start_point);
        }
        else $posts = $database->selectRecords('Posts', 1, 1, $start_point, 1);

        require 'resources/views/pages/posts.view.php';

        if($_GET['page'] > $pages_number) Utilities::redirect('/index');
    } 
    else Utilities::redirect('/posts');