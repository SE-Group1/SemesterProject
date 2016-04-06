<?php

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
    return htmlspecialchars($_GET['$key']);
}

/**
 * Returns POST data safely scrubbed using htmlspecialchars()
 */
function getPOSTSafe($key) {
    return htmlspecialchars($_POST['$key']);
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