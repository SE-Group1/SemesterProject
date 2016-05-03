<?php require '../tools.php'; 
    requireLoggedIn();
    
    $result = makeAPIRequest("/api/user/connectionlist/", "GET", array(
        'userId' => getUserId()
    ));
    
    $connectionList = $result['result'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require '../links.php'; ?>
</head>
<body>
    <?php require '../navbar.php';?>
    <div class="col-md-6 col-md-offset-3">
        <h2 class="page-title text-center">Your Connections</h2>
        <?php foreach ($connectionList as $connection) {
            
            echo makeTemplateRequest("/user-card/", "GET", array(
                'userId' => $connection['id']
            ));
        } ?>
    </div>
</body>
</html>