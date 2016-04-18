<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);
    $conn = mysqlConnect();
    echo "Hello World";
    echo $_GET['company_name'];
    $id=$_GET['company_id'];
    $manager=$_GET['manager'];
    $creditcard=$_GET['creditcard'];
    $image="Image-1";
    
    switch ($method) {
        case 'GET':
        
        if (!$name = getGETSafe('company_name')) {
                failure("companyId required arg");
            }
            $query ="INSERT INTO `company` VALUES 
                (UUID(), DEFAULT, ?, NULL, ?, ?, ?, true)";
                if($stmt = mysqli_prepare($conn, $query)) {
                    mysqli_stmt_bind_param($stmt, "ssss", $name, $manager, $image, $creditcard);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                    
                    ?>
                    <form>
                        <input type="hidden" value="<?php $_GET['company_id']?>">
                    </form>
                    <script>
                    window.location.replace("http://localhost:8000/companies/company.php");
                    </script>
                   <?php
                }
                else {
                     echo FAILED;
                }
                
    } //end switch
    
    
    ?>
    