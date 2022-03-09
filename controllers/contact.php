<?php

    $page_title = 'Contact';

    $access_method = Request::getMethod();

    if($access_method === 'GET') require 'resources/views/pages/contact.view.php';
    else 
    {
        $sender_mail = $_POST['contact_mail'];
        $message_title = $_POST['message_title'];
        $message_body = $_POST['message_body'];

        $errors = [];

        if(!Utilities::checkRegex($sender_mail, 'Mail')) $errors['credentials'] = 'E-mail is not as expected!';
        if(empty($message_body)) $errors['message'] = 'Message can\'t be empty!';

        if(count($errors)) 
        {
            require 'resources/views/pages/contact.view.php';
            end();
        }
        else
        {
            
            $database->insertRecords('ContactMessages', [
                'SenderMail' => $sender_mail,
                'MessageTitle' => empty($message_title) ? 'No title' : $message_title,
                'MessageBody' => $message_body
            ]);

            Utilities::redirect('/contact?success=Your message was sent successfully!');
        }
    }