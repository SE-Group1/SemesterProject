<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $firstName = getPOSTSafe('firstName');
    $lastName = getPOSTSafe('lastName');
    $username = getPOSTSafe('username');
    $password = getPOSTSafe('password');
    
    $conn = mysqlConnect();
    
    $query = 'INSERT INTO user VALUES (UUID(), DEFAULT, ?, ?, ?, ?, NULL, NULL, NULL, NULL, NULL, NULL, DEFAULT, NULL, NULL, NULL)';
    
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        fail("Prepare failed: ".$conn->error);
    }
    
    $hashedPass = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt->bind_param("ssss", $username, $hashedPass, $firstName, $lastName);
    
    if (!$stmt->execute()) {
        fail("Execute failed: " . $stmt->error);
    }
    
    success();