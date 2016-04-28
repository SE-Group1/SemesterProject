<?php
    require 'tools.php';
    
    if(isUserLoggedIn()) {
        redirect("home.php");
    } else {
        redirect("login.php");
    }