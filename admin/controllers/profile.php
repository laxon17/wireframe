<?php

    $page_title = 'Dashboard';
    $access_method = Request::getMethod();

    session_start();

    if($access_method !== 'GET' || empty($_SESSION['user_id']) || $_SESSION['role'] !== 1) Utilities::redirect('/index');
    else require 'admin/views/pages/index.view.php';