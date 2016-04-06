<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $username = getPOSTSafe('username');
    $password = getPOSTSafe('password');
    $firstName = getPOSTSafe('firstName');
    $lastName = getPOSTSafe('lastName');
    $email = getPOSTSafe('email');
    $phoneNumber = getPOSTSafe('phoneNumber');
    $birthday = getPOSTSafe('birthday');
    $secretQuestion = getPOSTSafe('secretQuestion');
    $secretAnswer = getPOSTSafe('secretAnswer');
    
    $conn = mysqlConnect();
    
    $query = 'INSERT INTO user VALUES (UUID(), DEFAULT, ?, ?, ?, ?, ?, ?, ?, ?, ?, DEFAULT)';
    
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("Prepare failed: ".$conn->error);
    }
    
    $hashedPass = password_hash($password);
    
    $stmt->bind_param("ssssssssss", $username, $hashedPass, $firstName, $lastName, $email, $phoneNumber, $birthday, $secretQuestion, $secretAnswer);
    
    if (!$stmt->execute()) {
        die("Execute failed: ".$stmt->error);
    }
    
    success();