<?php require '../tools.php'; 
    requireLoggedIn();
    
    $result = makeAPIRequest("/api/user/companylist/", "GET", array(
        'userId' => getUserId()
    ));
    
    $companyList = $result['result'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require '../links.php'; ?>
</head>
<body>
    <?php require '../navbar.php';?>
    <div class="col-md-6 col-md-offset-3">
        <h2 class="page-title text-center">Companies you are Following</h2>
        <?php foreach ($companyList as $company) {
            
            echo makeTemplateRequest("/company-card/", "GET", array(
                'companyId' => $company['id']
            ));
        } ?>
    </div>
</body>
</html>