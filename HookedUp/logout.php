<?php 
    require 'tools.php';
    
    requireLoggedIn();
    
    $url = "/api/auth/logout.php";
    $fields = array(
        'id' => $_SESSION['id'],
        'sessionId' => session_id()
    );
    
    $result = curl_post($url, $fields);
    if($result['success']) {
        session_destroy();
        redirect("login.php");
    }