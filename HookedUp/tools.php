<?php 

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
     * Called at the top of pages that require login to view
     * Checks user cookie and redirects them to login screen if 
     * not logged in or invalid. 
     */
    function requireLoggedIn() {
        if(!isUserLoggedIn()) {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . "/login.php");
        }
    }
    
    function checkLoggedIn() {
        if(isUserLoggedIn()) {
            header("Location: http://" . $_SERVER['HTTP_HOST'] . "/home.php");
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
    function curl_post($url, array $post = NULL, array $options = array()) 
    { 
        
        if (strpos($_SERVER['HTTP_HOST'], "localhost:8000") !== FALSE) {
            $url = "http://localhost:8001".$url;    
        } else {
            $url = $_SERVER['HTTP_HOST'].$url;
        }
        
        
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
    function curl_get($url, array $get = NULL, array $options = array()) 
    {    
        if (strpos($_SERVER['HTTP_HOST'], "localhost:8000") !== FALSE) {
            $url = "http://localhost:8001".$url;    
        } else {
            $url = $_SERVER['HTTP_HOST'].$url;
        }
        
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