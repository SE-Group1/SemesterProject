<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';

    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);
    $conn = mysqlConnect();
    switch ($method) {
        case 'GET':
            if (!$id = getGETSafe('id')) {
                failure("id required arg");
            }
            
            //Get user
            $query = "SELECT ".userProperties()." FROM user WHERE id = ?";
            
            $result = exec_stmt($query, "s", $id);
            if($result == null || count($result) == 0) {
                success();
            }
            
            $user = $result[0];
            
            //Get employment info
            $query = "SELECT * FROM employment WHERE userId = ?";
            $employments = exec_stmt($query, "s", $id);
            
            $user['employments'] = $employments;
            
            $titles = array();
            foreach($employments as $employment) {
                array_push($titles, $employment['title']);
            }
            
            $user['titles'] = $titles;
            
            success($user);
    
            break;
        case 'POST':
            break;
        case 'PUT';
            break;
        case 'DELETE';
            break;
    }    
?>
