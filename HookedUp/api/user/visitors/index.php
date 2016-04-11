<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);
    $conn = mysqlConnect();
    
    switch ($method) {
        case 'GET':
        if (!$id = getGETSafe('userId')) {
            failure("userId required arg");
        }
        
        $query = "SELECT ".userProperties().", profileVisit.createdAt AS visitedAt FROM user, profileVisit 
            WHERE profileVisit.destinationUserId = ? && profileVisit.originUserId = user.id
            ORDER BY profileVisit.createdAt DESC";
        success(exec_stmt($query, "s", $id));
    }
?>  