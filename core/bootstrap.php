<?php

    $configuration = require 'config/config.php';

    require 'Router.php';
    require 'vendor/autoload.php';
    require 'Utilities.php';
    require 'Request.php';
    require 'database/Connection.php';
    require 'database/QueryBuilder.php';

    return new QueryBuilder(
        Connection::Connect($configuration)
    );