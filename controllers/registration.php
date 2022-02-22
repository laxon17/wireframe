<?php
    
    $accessMethod = Request::getMethod();

    if($accessMethod === 'GET') 
    {
        $pageTitle = 'Register';

        require 'resources/views/authentication/registration.view.php';
    }
    
    else 
    {
        $firstName = $_POST['first_name'];
        $lastName = $_POST['last_name'];
        $userName = $_POST['user_name'];
        $userMail = $_POST['user_mail'];
        $userPassword = $_POST['password'];
        $passwordRepeat = $_POST['re_password'];
        
        $users = $database->selectRecords('Users');

        $values = [];
        $errors = [];

        if(!Utilities::checkRegex($firstName, 'FirstName')) $errors['firstname'] = 'First name is not as expected!';
        $values['firstname'] = $firstName; 
        if(!Utilities::checkRegex($lastName, 'LastName')) $errors['lastname'] = 'Last name is not as expected!'; 
        $values['lastname'] = $lastName;
        if(!Utilities::checkRegex($userName, 'Username')) $errors['username'] = 'Username is not as expected!'; 
        $values['username'] = $userName;
        if(!Utilities::checkRegex($userMail, 'Mail')) $errors['usermail'] = 'E-Mail is not as expected!'; 
        $values['usermail'] = $userMail;
        if(!Utilities::checkRegex($userPassword, 'Password')) $errors['password'] = 'Password is not as expected!'; 
        if($userPassword !== $passwordRepeat) $errors['re_password'] = 'Passwords don\'t match'; 
        
        $found = false;

        foreach($users as $user) 
        {
            if($user->Username === $userName) 
            {
                $errors['username'] = 'Username is already taken!';
                $found = true;
            }
            if($user->UserMail === $userMail) 
            {
                $errors['usermail'] = 'Mail is already taken!';  
                $found = true;
            }
        }

        if(count($errors))
        {
            $pageTitle = 'Register';
            require 'resources/views/authentication/registration.view.php';
        }
        if(!$found) 
        {
            $database->insertRecords('Users', [
                'FirstName' => $firstName,
                'LastName' => $lastName,
                'Username' => $userName,
                'UserMail' => $userMail,
                'UserPassword' => md5($userPassword)
            ]);

            Utilities::Redirect('/login'); 
        }
    }
    
    

        

    


    