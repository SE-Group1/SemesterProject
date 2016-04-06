<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $conn = mysqlConnect();
    
    $query = "SELECT * FROM user";
    $stmt = $conn->prepare($query);
    if (!$stmt) {
        die("Prepare failed: ".$conn->error);
    }
    
    if (!$stmt->execute()) {
        die("Execute failed: ".$stmt->error);
    }

    $result = $stmt->get_result();

    $array = array();
    while($row = $result->fetch_assoc()) {
        $array[] = $row;
    }

    success($array);
?>