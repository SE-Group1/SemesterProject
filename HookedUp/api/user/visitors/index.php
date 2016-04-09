<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);
    $conn = mysqlConnect();
    
    switch ($method) {
        case 'GET':
        if (!$userId = getGETSafe('userId')) {
            failure("userId required arg");
        }
        
        $query = "SELECT * FROM profileVisit WHERE originUserId = ?";
        if (!$stmt = $conn->prepare($query)) {
            failure("Prepare failed: " . $conn->error);
        }
        
        $stmt->bind_param("s", $userId);
        if (!$stmt->execute()) {
            failure("Execute failed: " . $stmt->error);
        }
        
        $result = $stmt->get_result();
        $array = array();
        while ($row = $result->fetch_assoc()) {
            $array[] = $row;
        }
        
        success($array);
    }
?>  