<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
        
    switch ($method) {
        case 'GET':
            if (!$filter = getGETSafe('filter')) {
                failure("filter required id");
            }
            
            $query = "SELECT ".userProperties()." FROM user WHERE username LIKE ? OR firstName LIKE ? OR lastName LIKE ?";
            $users = exec_stmt($query);
           
            
            $query = "SELECT ".companyProperties()." FROM company WHERE name LIKE ?";
            $companies = exec_stmt($query);
            
            $result = array();
            
            $result['users'] = $users;
            $result['companies'] = $companies;
            success($result);
            
            break;
    }
?>