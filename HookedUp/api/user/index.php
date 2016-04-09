<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';

    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);
    $conn = mysqlConnect();
    switch ($method) {
        case 'GET':
            if (!$id = getGETSafe('id')) {
                failure("id required arg");
            }
            
            $query = "SELECT id, createdAt, username, firstName, lastName, email, phoneNumber, birthday, profileImageId
             FROM user WHERE id = ?";
            if (!$stmt = $conn->prepare($query)) {
                failure("Prepare failed: " . $conn->error);
            }
            
            $stmt->bind_param("s", $id);
            if (!$stmt->execute()) {
                failure("Execute failed: " . $stmt->error);
            }
            
            $result = $stmt->get_result();
            if (!$user = $result->fetch_assoc()) {
                failure("No user for id: ".$id);
            }
            success($user);
    
            break;
        case 'POST':
            break;
        case 'PUT';
            break;
        case 'DELETE';
            break;
    }    
?>
