<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);
    
    switch ($method) {
        case 'GET':
        if (!$id = getGETSafe('id')) {
            failure("id required arg");
        }
        
        $query = "SELECT ".companyProperties()." FROM company WHERE id = ?";
        $result = exec_stmt($query, "s", $id);
        success($result[0]);
        break;
        
        case 'POST':
        
        $name = getPOSTSafe('company_name');
        $id = getPOSTSafe('company_id');
        $manager = getPOSTSafe('manager');
        $creditcard = getPOSTSafe('creditcard');
        $image = 'Image-1';
                    
        $query ="INSERT INTO `company` VALUES 
            (UUID(), DEFAULT, ?, NULL, ?, ?, ?, true)";
            
            exec_stmt($query, 'ssss', $name, $manager, $image, $creditcard);
            break;
    }
?>