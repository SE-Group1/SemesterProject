<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "hookedup";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
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

    echo json_encode($array);
?>