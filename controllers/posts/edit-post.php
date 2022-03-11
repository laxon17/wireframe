<?php

    $page_title = 'Edit post';
    $access_method = Request::getMethod();
    $categories = $database->selectRecords('Categories');
        
    if($access_method === 'POST') 
    {
        $post_title = $_POST['post_title'];
        $post_body = $_POST['post_body'];
        $post_id = $_POST['post_id'];
        $old_path = $_POST['old_path'];

        $new_path = $_FILES['new_path']['name'];
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

        if(count($errors)) 
        {
            require 'resources/views/posts/edit-post.view.php';
            exit();
        }
        else 
        {
            session_start(); 

            $database->updateRecord('Posts', 'PostTitle', $post_title, 'PostId', $post_id);
            $database->updatePostBody($post_body, $post_id);
            
            if($new_path !== '') {
                $database->updateRecord('CoverImages', 'CoverPath', $image_name, 'PostId', $post_id);
                move_uploaded_file($_FILES['new_path']['tmp_name'], $target);
                unlink('public/img/covers/' . $old_path);
            }

            $database->deleteRecords('PostCategory', 'PostId', $post_id);
            
            foreach($post_category as $category) 
            {
                $database->insertRecords('PostCategory', [
                    'PostId' => $post_id,
                    'CategoryId' => $category
                ]);
            }
        
            Utilities::redirect('/view-post?id=' . $post_id);
        }
    }
    else
    {
        $post = $database->selectFilteredRecord('Posts', 'PostId', $_GET['id']);
        $old_categories = $database->selectFilteredRecords('PostCategory', 'PostId', $_GET['id']);
        $image = $database->selectFilteredRecord('CoverImages', 'PostId', $_GET['id']);

        $post_categories = [];

        foreach($old_categories as $category)
        {
            array_push($post_categories, $category->CategoryId);
        }

        $values['title'] = $post->PostTitle;
        $values['body'] = $post->PostBody;
        $values['path'] = $image->CoverPath;

        require 'resources/views/posts/edit-post.view.php';
    }