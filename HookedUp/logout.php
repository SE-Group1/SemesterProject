<?php 
    require 'tools.php';
    
    requireLoggedIn();
    
    $result = curl_post("/api/auth/logout.php");
    echo json_encode($result);