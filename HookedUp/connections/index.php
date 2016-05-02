<?php require '../tools.php'; 
    requireLoggedIn();
    
    $result = makeAPIRequest("/api/user/connectionList/", "GET", array(
        'userId' => getUserId()
    ));
    
    $connectionList = $result['result'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require '../links.php'; ?>
    
  </script>
</head>
<body>
    <?php require '../navbar.php';?>
    <div class="col-md-6 col-md-offset-3">
        <div class="text-center page-title"><center><h3>Your Connections</h3></center></div>
        <?php foreach ($connectionList as $connection) {
            
            echo makeTemplateRequest("/user-card.php", "GET", array(
                'userId' => $connection['id']
            ));
        } ?>
    </div>
</body>
</html>