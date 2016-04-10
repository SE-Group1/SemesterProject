<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);
    $conn = mysqlConnect();
    
    switch ($method) {
        case 'GET':
           if (!$id = getGETSafe('companyId')) {
                failure("companyId required arg");
            }
            
            $query = "SELECT * FROM employment 
                WHERE companyId = ? && endedAt IS NULL  
                ORDER BY startedAt DESC";
            if (!$stmt = $conn->prepare($query)) {
                failure("Prepare failed: " . $conn->error);
            }
            
            $stmt->bind_param("s", $id);
            if (!$stmt->execute()) {
                failure("Execute failed: " . $stmt->error);
            }
            
            $result = $stmt->get_result();
            $employments = array();
            
            while ($employment = $result->fetch_assoc()) {
                
                $query = "SELECT ".userProperties()." FROM user WHERE id = ?";
                if (!$stmt = $conn->prepare($query)) {
                    failure("Prepare failed: " . $conn->error);
                }
                
                $stmt->bind_param("s", $employment['userId']);
                if (!$stmt->execute()) {
                    failure("Execute failed: " . $stmt->error);
                }
                
                $u_result = $stmt->get_result();
                if ($user = $u_result->fetch_assoc()) {
                    $employment['user'] = $user;
                    unset($employment['userId']);
                }
                
                $employments[] = $employment;
            }
            
            success($employments);
            
            break;
        case 'POST':
            break;
        case 'DELETE':
            break;
    }
?>

