<?php 

    $access_method = Request::getMethod();

    if($access_method !== 'POST') Utilities::redirect('/index');
    else
    {
        $poll_id = $_POST['poll_id'];
        $answer = $_POST['poll_answer'];
        $user_id = $_POST['user_id'];

        $user = $database->selectFilteredRecord('Users', 'UserId', $user_id);

        $database->updateAnswer($answer, $poll_id, $user_id);

        Utilities::redirect('/survey?user_id=' . $user_id);
    }