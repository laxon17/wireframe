<?php

    $pageTitle = 'Register';

    // if(isset($_POST['registerSubmit'])) 
    // {
    //     $firstName = $_POST['first'];
    //     $lastName = $_POST['last'];
    //     $mail = $_POST['mail'];
    //     $password = md5($_POST['password']);

    //     die('Los');

    //     $database->insertRecords('Users', [
    //         'FirstName' => $firstName,
    //         'LastName' => $lastName,
    //         'UserMail' => $mail,
    //         'UserPassword' => $password
    //     ]);
    // }

    require 'resources/views/authentication/registration.view.php';