<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);
    
    switch ($method) {
        case 'GET':
        if (!$id = getGETSafe('id')) {
            failure("id required arg");
        }
        
        $query = "SELECT ".companyProperties()." FROM company WHERE id = ?";
        
        success(exec_stmt($query, "s", $id));
    }
?>