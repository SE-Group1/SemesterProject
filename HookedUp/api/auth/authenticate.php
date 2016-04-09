<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $id = getPOSTSafe('id');
    $sessionId = getPOSTSafe('sessionId');
    
    $conn = mysqlConnect();
    
    $query = "SELECT username, firstName, lastName FROM user WHERE id = ?";
    
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        failure("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("s", $id);
    
    if (!$stmt->execute()) {
        failure("Execute failed: " . $stmt->error);
    }
    
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    if(!$user) {
        failure("No user for id: " . $id);
    }
    
    $loggedIn = isset($user['sessionId']) && $sessionId === $user['sessionId'];
    
    if($loggedIn) {
        session_start();
    }
    
    $_SESSION['id'] = $id;
    $_SESSION['username'] = $user['username'];
    $_SESSION['firstName'] = $user['firstName'];
    $_SESSION['lastName'] = $user['lastName'];

    success($loggedIn);
?>