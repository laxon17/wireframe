<?php
    
    $comment = $_POST['comment_body'];
    $user_id = $_POST['user_id'];
    $post_id = $_POST['post_id'];
    $parent_id = $_POST['parent_id'];

    if(empty($comment)) Utilities::redirect('/view-post?id=' . $post_id . '&errors="Comment body can\'t be empty!"');
    else
    {
        $database->insertRecords('Comments', [
            'ParentId' => $parent_id,
            'CommentBody' => htmlspecialchars($comment),
            'PostId' => $post_id,
            'UserId' => $user_id
        ]);

        Utilities::redirect('/view-post?id=' . $post_id);
    }
    