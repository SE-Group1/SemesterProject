<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);
    $conn = mysqlConnect();
    
    switch ($method) {
        case 'GET':
           if (!$id = getGETSafe('companyId')) {
                failure("companyId required arg");
            }
            
            $query = "SELECT * FROM companyVisit WHERE companyId = ? ORDER BY createdAt DESC";
            $companyVisits = exec_stmt($query, "s", $id);
            foreach ($companyVisits as $key => $companyVisit) {
                $query = "SELECT ".userProperties()." FROM user WHERE id = ?";
                if($user = reset(exec_stmt($query, "s", $companyVisit['originUserId']))) {
                    $companyVisit['user'] = $user;
                    $companyVisits[$key] = $companyVisit;
                }
            }
            
            success($companyVisits);
            
            break;
        case 'POST':
            break;
        case 'DELETE':
            break;
    }
?>

