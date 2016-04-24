<?php require '../../tools.php';
    
    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);
    $conn = mysqlConnect();
    $_GET['company_name'];
    $id=$_GET['company_id'];
    $manager=$_POST['manager'];
    $creditcard=$_GET['creditcard'];
    
    $manager = getPOSTSafe('manager');
    
    $image="Image-1";
    
    switch ($method) {
        case 'GET':
        
        if (!$name = getGETSafe('company_name')) {
                failure("companyId required arg");
            }
            $query ="INSERT INTO `company` VALUES 
                (UUID(), DEFAULT, ?, NULL, ?, ?, ?, true)";
                
            exec_stmt($query, );
                }
                
    } //end switch
    
    
    ?>
    