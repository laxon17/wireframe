<?php

    $database = require 'core/bootstrap.php';

    require Router::loadRoutes('routes/routes.php')
        ->direct(Request::getUri(), Request::getMethod());