<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $username = getPOSTSafe('username');
    $password = getPOSTSafe('password');
    
    $conn = mysqlConnect();
    
    $query = "SELECT password FROM user WHERE username = ?";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        failure("Prepare failed: ".$conn->error);
    }
    
    $stmt->bind_param("s", $username);
    
    if (!$stmt->execute()) {
        failure("Execute failed: ".$stmt->error);
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
    
    //TODO: start session

    success();
?>