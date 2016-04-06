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
        die("Connection failed: " . $conn->connect_error);
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
function fail($error) {
    $data = array();
    $data['success'] = false;
    $data['error'] = $error;
    echo json_encode($data);
    exit();
}

/**
 * Returns json for success with the result if provided
 */
function success($resultArr = array()) {
    $data = array();
    $data['success'] = true;
    $data['result'] = $resultArr;
    echo json_encode($data);
    exit();
}

/**
 * Returns true if the user is logged in
 */
function isLoggedIn() {
    return isset($_SESSION['userId']);
}