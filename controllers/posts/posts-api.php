<?php

    $json_string = file_get_contents('php://input');
    $decoded_json = json_decode($json_string);

    if($decoded_json)
    {
        $posts = $database->selectPostsByCategory($decoded_json->categories);
        echo json_encode($posts);
        exit();
    }

    $posts = $database->selectRecords('Posts');
    echo json_encode($posts);