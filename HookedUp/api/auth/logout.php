<?php 
    require '../tools.php';
    
    $id = getPOSTSafe('id');
    $sessionId = getPOSTSafe('sessionId');
    
    requireLoggedIn($id, $sessionId);
    
    $conn = mysqlConnect();
    $query = "UPDATE user SET sessionId = NULL WHERE id = ?";

    if (!$stmt = $conn->prepare($query)) {
        failure("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("s", $_SESSION['id']);
    
    if (!$stmt->execute()) {
        failure("Execute failed: " . $stmt->error);
    }
    
    session_destroy();
    
    success();
  