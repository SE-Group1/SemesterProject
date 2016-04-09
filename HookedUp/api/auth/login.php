<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $username = getPOSTSafe('username');
    $password = getPOSTSafe('password');
    
    $conn = mysqlConnect();
    
    /**
     * Verify the password sent in the request matches the stored one 
     */
    $query = "SELECT id, firstName, lastName, password FROM user WHERE username = ?";
    
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        failure("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("s", $username);
    
    if (!$stmt->execute()) {
        failure("Execute failed: " . $stmt->error);
    }
    
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    if(!$user) {
        failure("Incorrect username or password");
    }
    
    $hashedPassword = $user['password'];
    
    if(!password_verify($password, $hashedPassword)) {
        failure("Incorrect username or password");
    }
    
    /**
     * If the passwords match, start a new session and store the session id in the database
     */
    session_start();
    
    $query = "UPDATE user SET sessionId = ? WHERE id = ?";
    
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        failure("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("ss", session_id(), $user['id']);
    
    if (!$stmt->execute()) {
        failure("Execute failed: " . $stmt->error);
    }
    
    $_SESSION['id'] = $user['id'];
    $_SESSION['username'] = $username;
    $_SESSION['firstName'] = $user['firstName'];
    $_SESSION['lastName'] = $user['lastName'];

    success();
?>