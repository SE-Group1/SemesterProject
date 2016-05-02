<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';

    switch (getMethod()) {
        case 'GET':
            if (!$userId = getGETSafe('userId')) {
                failure("userId required");
            }
            
            $query = "SELECT originUserId, destinationUserId FROM connection WHERE originUserId = ? OR destinationUserId = ?";
            $results = exec_stmt($query, "ss", $userId, $userId);
            
            $users = array(
                0 => array(
                    "userId" => $userId
                )
            );
            
            foreach ($results as $row) {
                $friendId = $row['originUserId'] === $userId ? $row['destinationUserId'] : $row['originUserId'];
                array_push($users, array(
                    "userId" => $friendId
                ));
            }
            
            foreach ($users as &$user) {
                $query = "SELECT count(*) AS numConnections FROM connection WHERE originUserId = ? OR destinationUserId = ?";
                $result = exec_stmt($query, "ss", $user['userId'], $user['userId']);
                $user['numConnections'] = $result[0]['numConnections'];
            }
            
            foreach ($users as $key => $row) {
                $numConnections[$key] = $row['numConnections'];
            }
            
            array_multisort($numConnections, SORT_DESC, $users);
            
            success($users);
                        
            break;
    }
?>