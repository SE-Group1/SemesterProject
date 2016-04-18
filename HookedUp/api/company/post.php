<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);
    $conn = mysqlConnect();
    
    switch ($method) {
        case 'GET':
            if (!$id = getGETSafe('companyId')) {
                failure("companyId required arg");
            }
            
            $query = "SELECT * FROM post WHERE originCompanyId 
            = ? ORDER BY createdAt DESC LIMIT 10";
            
            $posts = exec_stmt($query, "s", $id);
            
            success($posts);
            
    } // end switch($method)
    ?>