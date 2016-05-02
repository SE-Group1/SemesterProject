<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';

    switch (getMethod()) {
        case 'GET':
            if (!$userId = getGETSafe('userId')) {
                failure("userId required");
            }
            
            $query = "SELECT ".companyProperties()." FROM company ORDER BY name";
            $results = exec_stmt($query);
            
            success($results);
                        
            break;
    }
?>