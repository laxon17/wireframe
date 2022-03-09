<?php

    $access_method = Request::getMethod();
    session_start();

    if($access_method === 'GET' && isset($_SESSION['user_id']) && $_SESSION['role'] === 1) 
    {
        if(isset($_GET['delete_category']) && isset($_SESSION['user_id']) && $_SESSION['role'] === 1)
        {
            $category_id = $_GET['delete_category'];
            $post_count = $database->selectPostsByCategory([$category_id]);
            
            if(count($post_count)) Utilities::redirect('/dashboard/modify?exception=You must first delete al posts bound to this category!');
            else 
            {
                $database->deleteRecords('Categories', 'CategoryId', $category_id);
                Utilities::redirect('/dashboard/modify');
            } 
        }
        $categories = $database->selectRecords('Categories');
        require 'admin/views/pages/index.view.php';
    }
    else
    {
        $new_category = $_POST['add_category'];
        if(empty($new_category) || !preg_match('/^[a-zA-Z0-9\#\s\.]{2,50}$/', $new_category)) Utilities::redirect('/dashboard/modify?error=Provide the name for new category!');
        else
        {
            $database->insertRecords('Categories', [
                'CategoryName' => $new_category
            ]);

            Utilities::redirect('/dashboard/modify');
        }
    }