<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';

    switch (getMethod()) {
        case 'GET':
            if (!$userId = getGETSafe('userId')) {
                failure("userId required");
            }
            
            $query = "SELECT originUserId, destinationUserId FROM connection WHERE originUserId = ? OR destinationUserId = ?";
            $results = exec_stmt($query, "ss", $userId, $userId);
            
            $users = array();
            foreach ($results as $row) {
                $friendId = $row['originUserId'] === $userId ? $row['destinationUserId'] : $row['originUserId'];
                $query = "SELECT ".userProperties()." FROM user WHERE id = ?";
                $result = exec_stmt($query, "s", $friendId);
                if($result !== false) {
                    array_push($users, $result[0]);
                }
            }
            
            success($users);
                        
            break;
    }
?>