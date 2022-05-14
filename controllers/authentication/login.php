<?php
    
    $page_title = 'Log In';
    
    $access_method = Request::getMethod();

    if($access_method === 'GET') 
    {
        require 'resources/views/authentication/login.view.php';
        exit();
    }

    $user_id = $_POST['user_id'];
    $user_password = $_POST['user_password'];
    
    $values = [];
    $errors = [];

    if(!Utilities::checkRegex($user_id, 'UserId')) $errors['credentials'] = 'Your ID is not as expected!';
    $values['credentials'] = $user_id; 
    if(!Utilities::checkRegex($user_password, 'Password')) $errors['password'] = 'Password is not as expected!'; 

    $canBeLogged = false;

    $user = $database->selectUser($user_id);
    
    if(empty($user)) $errors['credentials'] = 'User with given ID is not found. Try Again!';
    else 
    {
        $errors = [];
        if(!$user->UserVerified) $errors['credentials'] = 'User with given ID, hasn\'t verified his identity yet!';
        else 
        {
            $errors = [];
            if(!password_verify($user_password, $user->UserPassword)) $errors['password'] = 'Incorrect password! Try again!';
            else
            {
                $errors = [];
                $canBeLogged = true;
            }
            
        }
    }

    if(count($errors)) 
    {
        require 'resources/views/authentication/login.view.php';
        exit();
    }

    if($canBeLogged) 
    {
        session_start();
        $_SESSION['user_id'] = $user->UserId;
        $_SESSION['username'] = $user->Username;
        $_SESSION['role'] = $user->RoleId; 

        Utilities::redirect('/index');
    }
    