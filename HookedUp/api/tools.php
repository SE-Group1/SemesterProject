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
 * Gets the sessionId from header data 
 */
function getSessionId() {
    return getAllHeaders()['X-Session-Id'];
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

function exec_stmt($query, $type = null, $param = null , $param2 = null, $param3 = null) {
        $conn = mysqlConnect();
        if (!$stmt = $conn->prepare($query)) {
            failure("Prepare failed: " . $conn->error);
        }
        
        if ($type != null) {
            if ($param3 != null) {
                $stmt->bind_param($type, $param, $param2, $param3);        
            } else if ($param2 != null) {
                $stmt->bind_param($type, $param, $param2);
            } else {
                $stmt->bind_param($type, $param);
            }
        }
        
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

function getRootUrl() {
    if (strpos($_SERVER['HTTP_HOST'], "localhost:8000") !== FALSE) {
        return "http://localhost:8001";    
    }
    
    return $_SERVER['HTTP_HOST'];
}

function requireLoggedIn() {
    if(!isUserLoggedIn()) {
        failure("Not logged in");
    }
}

function checkLoggedIn() {
    if(isUserLoggedIn()) {
        failure("Already logged in");
    }
}

function isUserLoggedIn() {
    session_start();
    
    if(!isset($_SESSION['id'])) {
        return false;
    }
    
    $url = "/api/auth/authenticate.php";
    $fields = array(
        'id' => $_SESSION['id'],
        'sessionId' => session_id()
    );
    
    $result = curl_post($url, $fields);
    return $result['result'];
}

/** 
    * Send a POST requst using cURL
    * Reference: Davic from Code2Design.com http://php.net/manual/en/function.curl-exec.php
    */ 
function curl_post($urlPart, array $post = NULL, array $options = array()) 
{
    $url = getRootUrl() . $urlPart;
    
    $defaults = array( 
        CURLOPT_POST => 1, 
        CURLOPT_HEADER => 0, 
        CURLOPT_URL => $url, 
        CURLOPT_FRESH_CONNECT => 1, 
        CURLOPT_RETURNTRANSFER => 1, 
        CURLOPT_FORBID_REUSE => 1, 
        CURLOPT_TIMEOUT => 4, 
        CURLOPT_POSTFIELDS => http_build_query($post) 
    ); 

    $ch = curl_init(); 
    curl_setopt_array($ch, ($options + $defaults)); 
    if( ! $result = curl_exec($ch)) 
    { 
        trigger_error(curl_error($ch)); 
    } 
    curl_close($ch);
    return json_decode($result, true); 
} 

/** 
    * Send a GET requst using cURL
    * Reference: Davic from Code2Design.com http://php.net/manual/en/function.curl-exec.php
    */ 
function curl_get($urlPart, array $get = NULL, array $options = array()) 
{    
    $url = getRootUrl() . $urlPart;
    
    $defaults = array( 
        CURLOPT_URL => $url. (strpos($url, '?') === FALSE ? '?' : ''). http_build_query($get), 
        CURLOPT_HEADER => 0, 
        CURLOPT_RETURNTRANSFER => TRUE, 
        CURLOPT_TIMEOUT => 4 
    ); 
    
    $ch = curl_init(); 
    curl_setopt_array($ch, ($options + $defaults)); 
    if( ! $result = curl_exec($ch)) 
    { 
        trigger_error(curl_error($ch)); 
    } 
    curl_close($ch);
    return json_decode($result, true);
}