<?php

    $page_title = 'Create post';
    $access_method = Request::getMethod();
    $categories = $database->selectRecords('Categories');

    if($access_method !== 'POST') require 'resources/views/posts/create-post.view.php';  
    else
    {
        $post_title = $_POST['post_title'];
        $post_body = $_POST['post_body'];
        $image_path = $_FILES['image_path']['name'];
        $image_name = uniqid() . '_' . time();
        $target = 'public/img/covers/' . $image_name;
        $post_category = []; 
        $values = [];
        $errors = [];     

        if(empty($_POST['category_select'])) $errors['category'] = 'Please, provide at least one category for post!';
        else 
        {
            foreach($_POST['category_select'] as $selected) 
            {
                array_push($post_category, $selected);
            }
        }

        if(empty($post_title)) 
        {
            $errors['title'] = 'Please, fill in the post title!';
            if(!preg_match('/^[A-Za-z0-9\-\?\s\#]{3,50}$/', $post_title)) $errors['title'] = 'Title is not as expected!';
        }
        else $values['title'] = $post_title;

        if(empty($post_body)) $errors['body'] = 'Please, fill in the post body!';
        else $values['body'] = $post_body;

        if(empty($image_path)) $errors['image'] = 'Please, include a proper cover image!';

        if(count($errors)) 
        {
            require 'resources/views/posts/create-post.view.php';
            exit();
        }
        
        else 
        {
            session_start();

            $database->insertRecords('Posts', [
                'PostTitle' => $post_title,
                'PostBody' => $post_body,
                'UserId' => $_SESSION['user_id']
            ]);

            $last_post = $database->selectLastRecords('Posts', 'PostId', 1);
            
            if(empty($last_post)) $post_id = 1;
            else $post_id = $last_post[0]->PostId;

            $database->insertRecords('CoverImages', [
                'CoverPath' => $image_name,
                'PostId' => $post_id
            ]);

            move_uploaded_file($_FILES['image_path']['tmp_name'], $target);

            foreach($post_category as $category) 
            {
                $database->insertRecords('PostCategory', [
                    'PostId' => $post_id,
                    'CategoryId' => (int) $category 
                ]);
            }

            Utilities::redirect('/profile?username=' . $_SESSION['username']);
        }
    }