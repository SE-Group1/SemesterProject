<?php
    require 'tools.php';
    
    if(isUserLoggedIn()) {
        header("Location: http://" . $_SERVER['HTTP_HOST'] . "/home.php");
    } else {   
        header("Location: http://" . $_SERVER['HTTP_HOST'] . "/login.php");
    }