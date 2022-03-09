<?php

    $search_query = $_GET['query'];
    $suggested_posts = [];
    $error = 'No posts found!';
    
    $posts = $database->selectRecords('Posts');

    if($search_query !== '') 
    {
        $search_query = strtolower($search_query);
        $query_length = strlen($search_query);

        foreach($posts as $post) 
        {
            if(stristr(strtolower($post->PostTitle), $search_query)) array_push($suggested_posts, $post);
        }
    } 
    echo !empty($suggested_posts) ? json_encode($suggested_posts) : $posts;