<?php 
    require 'tools.php';
    
    requireLoggedIn();
    
    $url = "/api/auth/logout.php";
    $fields = array(
        'id' => $_SESSION['id'],
        'sessionId' => session_id()
    );
    
    $result = makeAPIRequest($url, "POST", $fields);
    if($result['success']) {
        session_destroy();
        redirect("login.php");
    }