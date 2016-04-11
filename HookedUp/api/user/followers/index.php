<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);
    
    switch ($method) {
        case 'GET':
        if (!$userId = getGETSafe('userId')) {
            failure("userId required arg");
        }
        
        $query = "SELECT ".userProperties().", follower.createdAt AS followedAt FROM user, follower 
            WHERE follower.destinationUserId = ? && follower.originUserId = user.id 
            ORDER By follower.createdAt DESC";
        
        success(exec_stmt($query,"s",$userId));
    }
?>  