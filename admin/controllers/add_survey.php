<?php

    $access_method = Request::getMethod();
    session_start();

    if($access_method !== 'POST' || !isset($_SESSION['user_id']) || $_SESSION['role'] !== 1) Utilities::redirect('/index');
    else 
    {
        $question = $_POST['add_question'];
        $users = $database->selectRecords('Users');

        $database->insertRecords('Poll', [
            'Question' => $question
        ]);

        $last_poll = $database->selectLastRecords('Poll', 'PollId', 1, 0);
        $last_poll_id = $last_poll[0]->PollId;

        foreach($users as $user) 
        {
            $database->insertRecords('PollAnswers', [
                'PollId' => $last_poll_id,
                'Answer' => null,
                'UserId' => $user->UserId
            ]);
        }

        Utilities::redirect('/dashboard/surveys');
    }