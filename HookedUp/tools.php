<?php 

    /**
     * Called at the top of pages that require login to view
     * Checks user cookie and redirects them to login screen if 
     * not logged in or invalid. 
     */
    function requireLoggedIn() {
        session_start();
        
        if(!isset($_SESSION['id'])) {
            return false;
        }
        
        $url = $_SERVER['HTTP_HOST'] . "/api/auth/authenticate.php";
        $fields = array(
            'id' => $_SESSION['id'],
            'sessionId' => session_id()
        );
        
        $result = curl_post($url, $fields);
        
        if(!$result['result']) {
            header("Location: http://" . $_SERVER['HTTP_HOST']);
        }
    }
    
    /** 
     * Send a POST requst using cURL
     * Reference: Davic from Code2Design.com http://php.net/manual/en/function.curl-exec.php
     */ 
    function curl_post($url, array $post = NULL, array $options = array()) 
    { 
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