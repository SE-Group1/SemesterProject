<?php

/**
 * Returns a mysqli object with a valid connection to the server's database
 */
function mysqlConnect() {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "hookedup";
    $dbname = "hookedup";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        failure("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}

/**
 * Returns GET data safely scrubbed using htmlspecialchars()
 */
function getGETSafe($key) {
    $val = htmlspecialchars($_GET[$key]);
    return empty($val) ? NULL : $val;
}

/**
 * Returns POST data safely scrubbed using htmlspecialchars()
 */
function getPOSTSafe($key) {
    $val = htmlspecialchars($_POST[$key]);
    return empty($val) ? NULL : $val;
}

/**
 * Returns json with an error message
 */
function failure($error) {
    $data = array();
    $data['success'] = false;
    $data['error'] = $error;
    exit(json_encode($data));
}

/**
 * Returns json for success with the result if provided
 */
function success($resultArr = array()) {
    $data = array();
    $data['success'] = true;
    $data['result'] = $resultArr;
    exit(json_encode($data));
}

/**
 * Returns true if the user is logged in
 */
function isLoggedIn() {
    return isset($_SESSION['userId']);
}

function userProperties($root = "user") {
    $root = $root.".";
    return $root."id, ".$root."createdAt, ".$root."username, ".$root."firstName, ".$root."lastName, "
        .$root."email, ".$root."phoneNumber, ".$root."birthday, ".$root."profileImageId";
}

function companyProperties($root = "company") {
    $root = $root.".";
    return $root."id, ".$root."createdAt, ".$root."name, ".$root."birthday, ".$root."managerUserId ,"
        .$root."profileImageId, ".$root."isPremium";
}

function exec_stmt($query, $type = "", $param = array()) {
        $conn = mysqlConnect();
        if (!$stmt = $conn->prepare($query)) {
            failure("Prepare failed: " . $conn->error);
        }
        
        $stmt->bind_param($type, $param);
        if (!$stmt->execute()) {
            failure("Execute failed: " . $stmt->error);
        }
        
        $result = $stmt->get_result();
        $array = array();
        while ($row = $result->fetch_assoc()) {
            $array[] = $row;
        }
        
        return $array;         
}

?>