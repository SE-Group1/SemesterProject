<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);

    switch ($method) {
        case 'GET':
            if (!$filter = getGETSafe('filter')) {
                failure("filter required");
            }
            $explodedFilter = explode(" ", $filter);
            
            foreach ($explodedFilter as $key => $value) {
                $query_parts[] = "'%".$value."%'";            
            }
            
            $filter_username = implode(' OR username LIKE ', $query_parts);
            $filter_firstName = implode(' OR firstName LIKE ', $query_parts);
            $filter_lastName = implode(' OR lastName LIKE ', $query_parts);
            
            $query = "SELECT ".userProperties()." FROM user WHERE username LIKE {$filter_username} 
                OR firstName LIKE {$filter_firstName} 
                OR lastName LIKE {$filter_lastName}";
                
            $users = exec_stmt($query);
            
            foreach ($users as &$user) {
                $query = "SELECT title FROM employment WHERE userId = ?";
                $employments = exec_stmt($query, "s", $user['id']);
                
                $titles = array();
                foreach($employments as $employment) {
                    array_push($titles, $employment['title']);
                }
                
                $user['titles'] = $titles;
            }
           
            $filter_name = implode(' OR name LIKE ', $query_parts);
           
            $query = "SELECT ".companyProperties()." FROM company WHERE name LIKE {$filter_name}";
            $companies = exec_stmt($query);
            
            $result = array();
            
            $result['users'] = $users;
            $result['companies'] = $companies;
            success($result);
            
            break;
    }
?>