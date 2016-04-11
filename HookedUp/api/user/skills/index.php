<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);
    $conn = mysqlConnect();
    
    switch ($method) {
        case 'GET':    
            if (!$id = getGETSafe('userId')) {
                failure("userId required arg");
            }
            
            $query = "SELECT * FROM skill WHERE originUserId = ? ORDER BY name";
            $skills = exec_stmt($query, "s", $id);
            foreach($skills as $key => $skill) {
                $query = "SELECT * FROM endorsement WHERE skillId = ? ORDER BY createdAt DESC";
                $endorsements = exec_stmt($query, "s", $skill['id']);
                $skill['endorsements'] = $endorsements;
                $skills[$key] = $skill;
            }              
          
            success($skills);
            break;
        case 'POST':
            break;
        case 'PUT';
            break;
        case 'DELETE';
            break;
    }    
?>