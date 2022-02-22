<?php

    session_start();
    session_unset();
    session_destroy();
    
    Utilities::Redirect('/index');
    exit();