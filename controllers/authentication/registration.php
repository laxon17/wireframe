<?php

    $page_title = 'Register';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    $accessMethod = Request::getMethod();

    if($accessMethod === 'GET') require 'resources/views/authentication/registration.view.php';
    else 
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $username = $_POST['user_name'];
        $user_mail = $_POST['user_mail'];
        $user_password = $_POST['password'];
        $password_repeat = $_POST['re_password'];
        
        $users = $database->selectRecords('Users');

        $values = [];
        $errors = [];

        if(!Utilities::checkRegex($first_name, 'FirstName')) $errors['firstname'] = 'First name is not as expected!';
        $values['firstname'] = $first_name; 
        if(!Utilities::checkRegex($last_name, 'LastName')) $errors['lastname'] = 'Last name is not as expected!'; 
        $values['lastname'] = $last_name;
        if(!Utilities::checkRegex($username, 'Username')) $errors['username'] = 'Username is not as expected!'; 
        $values['username'] = $username;
        if(!Utilities::checkRegex($user_mail, 'Mail')) $errors['usermail'] = 'E-Mail is not as expected!'; 
        $values['usermail'] = $user_mail;
        if(!Utilities::checkRegex($user_password, 'Password')) $errors['password'] = 'Password is not as expected!'; 
        if($user_password !== $password_repeat) $errors['re_password'] = 'Passwords don\'t match'; 

        $verification_token = md5(time() . $username);
        
        $found = false;

        foreach($users as $user) 
        {
            if($user->Username === $username) 
            {
                $errors['username'] = 'Username is already taken!';
                $found = true;
            }
            if($user->UserMail === $user_mail) 
            {
                $errors['usermail'] = 'E-mail is already taken!';  
                $found = true;
            }
        }

        if(count($errors))
        {
            require 'resources/views/authentication/registration.view.php';
            exit();
        }
        if(!$found) 
        {
            $database->insertRecords('Users', [
                'FirstName' => $first_name,
                'LastName' => $last_name,
                'Username' => $username,
                'UserMail' => $user_mail,
                'UserPassword' => password_hash($user_password, PASSWORD_DEFAULT),
                'UserToken' => $verification_token
            ]);

            $mail = new PHPMailer(true);

            
        }
    }
