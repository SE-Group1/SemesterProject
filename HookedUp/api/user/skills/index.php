<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);
    $conn = mysqlConnect();
    
    switch ($method) {
        case 'GET':    
            if (!$userId = getGETSafe('userId')) {
                failure("userId required arg");
            }
            
            $query = "SELECT * FROM skill WHERE originUserId = ?";
            if (!$stmt = $conn->prepare($query)) {
                failure("Prepare failed: " . $conn->error);
            }
            
            $stmt->bind_param("s", $userId);
            if (!$stmt->execute()) {
                failure("Execute failed: " . $stmt->error);
            }
            
            $result = $stmt->get_result();
            $skills = array();
            while ($skill = $result->fetch_assoc()) {
                $query = "SELECT * FROM endorsement WHERE skillId = ?";
                if (!$stmt = $conn->prepare($query)) {
                    failure("Prepare failed: " . $conn->error);
                }
                
                $stmt->bind_param("s", $skill['id']);
                if (!$stmt->execute()) {
                    failure("Execute failed: " . $stmt->error);
                }
                
                $e_result = $stmt->get_result();
                $endorsements = array();
                while ($endorsement = $e_result->fetch_assoc()) {
                    $endorsements[] = $endorsement;
                }
                $skill['endorsements'] = $endorsements;
                
                $skills[] = $skill;
            }
            success($skills);
            break;
        case 'POST':
            break;
        case 'PUT';
            break;
        case 'DELETE';
            break;
    }    
?>