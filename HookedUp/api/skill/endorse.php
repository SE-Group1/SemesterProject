<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);
    $conn = mysqlConnect();
    
    switch ($method) {
        case 'POST':
            //parse_str(file_get_contents('php://input'), $_PUT);
            
            $userId = getPUTSafe('userId');
            $skillId = getPUTSafe('skillId');
            
            $query = "SELECT id FROM endorsement WHERE originUserId = ? AND skillId = ?";
            $result = exec_stmt($query, "ss", $userId, $skillId);
            
            if(!empty($result)) {
                failure("User $userId already endorsed this skill.");
            }
            
            $query = "INSERT INTO endorsement VALUES (UUID(), DEFAULT, ?, ?)";
            exec_stmt($query, "ss", $skillId, $userId);
            
            success();
            break;
            
        case 'DELETE';
            break;
    }    
?>