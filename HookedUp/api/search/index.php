<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);

    switch ($method) {
        case 'GET':
            if (!$filter = getGETSafe('filter')) {
                failure("filter required");
            }
            
            $filter = '%'.$filter.'%';
            
            $query = "SELECT ".userProperties()." FROM user WHERE username LIKE ? OR firstName LIKE ? OR lastName LIKE ?";
            $users = exec_stmt($query, "sss", $filter, $filter, $filter);
           
            
            $query = "SELECT ".companyProperties()." FROM company WHERE name LIKE ?";
            $companies = exec_stmt($query, "s", $filter);
            
            $result = array();
            
            $result['users'] = $users;
            $result['companies'] = $companies;
            success($result);
            
            break;
    }
?>