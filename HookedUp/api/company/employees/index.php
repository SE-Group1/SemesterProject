<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);
    $conn = mysqlConnect();
    
    switch ($method) {
        case 'GET':
           if (!$id = getGETSafe('companyId')) {
                failure("companyId required arg");
            }
            
            $query = "SELECT * FROM employment 
                WHERE companyId = ? && endedAt IS NULL  
                ORDER BY startedAt DESC";
            $employments = exec_stmt($query, "s", $id);
            foreach ($employments as $key => $employment) {
                $query = "SELECT ".userProperties()." FROM user WHERE id = ?";
                if($user = reset(exec_stmt($query, "s", $employment['userId']))) {
                    $employment['user'] = $user;
                    unset($employment['userId']);
                    $employments[$key] = $employment;
                }
            }
            
            success($employments);
            
            break;
        case 'POST':
            break;
        case 'DELETE':
            break;
    }
?>

