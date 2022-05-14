<?php 
    session_start();

    $file = fopen('private/visitors.txt', 'a+');
    $string_to_write = $_SERVER['REMOTE_ADDR']. "\t" . $_SERVER['REQUEST_URI'] . "\t" . $_SERVER['REQUEST_METHOD'] . "\t" . $_SERVER['REQUEST_TIME']. "\n"; 
    fwrite($file, $string_to_write);
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <meta name="keywords" content="Blog, programming, topics, developers, front end, back end, php, c#, sql, databases, mysql, javascript, .net" />
            <meta name="description" content="Hello, we are WireFrame! Sign up and help us grow in the development community!" />
            <meta name="author" content="Lazar Lalovic 62/20" />
            <link rel="preconnect" href="https://fonts.googleapis.com"/>
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
            <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,400;1,200&display=swap" rel="stylesheet" />
            <!--Import Google Icon Font-->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
            <link href="public/img/icon.png" rel="icon" />
            <!-- Compiled and minified CSS -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" />
            <link rel="stylesheet" href="public/css/style.css" />
            <link rel="stylesheet" href="public/css/responsive.css" />
            <script type="text/javascript" src="public/js/main.js" defer></script>
            <script src="node_modules/ckeditor4/ckeditor.js"></script>
            <title>Wireframe | <?= $page_title; ?></title>
        </head>
        <body>