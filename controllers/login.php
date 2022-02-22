<?php

    $accessMethod = Request::getMethod();

    if($accessMethod === 'GET') 
    {
        $pageTitle = 'Log In';
    
        require 'resources/views/authentication/login.view.php';
    }

    else 
    {
        $userId = $_POST['user_id'];
        $userPassword = $_POST['user_password'];
        
        $values = [];
        $errors = [];

        if(!Utilities::checkRegex($userId, 'UserId')) $errors['credentials'] = 'Your ID is not as expected!';
        $values['credentials'] = $userId; 
        if(!Utilities::checkRegex($userPassword, 'Password')) $errors['password'] = 'Password is not as expected!'; 

        $users = $database->selectRecords('Users');
        $userFound;
        $canBeLogged = false;

        foreach($users as $user)
        {
            if($user->Username === $userId || $user->UserMail === $userId)
            {
                $errors = [];
                if($user->UserPassword === md5($userPassword))
                {
                    $errors = [];
                    $userFound = $user;
                    $canBeLogged = true;
                    break;
                } 
                else 
                {
                    $errors['password'] = 'Password is incorrect! Try again!';
                    break;
                }
            }
            else 
            {
                $errors['credentials'] = 'User with given ID is not found! Try again!'; 
            }
        }

        if(count($errors)) 
        {
            $pageTitle = 'Log In';

            require 'resources/views/authentication/login.view.php';
        }

        if($canBeLogged) 
        {
            session_start();
            $_SESSION['userId'] = $userFound->UserId;
            $_SESSION['userFirstName'] = $userFound->FirstName;
            $_SESSION['username'] = $userFound->Username;
            $_SESSION['role'] = $userFound->RoleId;
            Utilities::Redirect('/index');
        }
    }