<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);
    
    switch ($method) {
        case 'GET':
        if (!$userId = getGETSafe('userId')) {
            failure("userId required arg");
        }
        
        $query = "SELECT id FROM post WHERE originUserId = ? ORDER BY createdAt DESC";
        $posts = exec_stmt($query, "s", $userId);
        
        success($posts);
    }
?>  