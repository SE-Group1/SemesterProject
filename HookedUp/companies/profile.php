<?php require '../tools.php';
    requireLoggedIn();
    
    $companyId = getGETSafe('id');
    
    //Get company
    $result = makeAPIRequest("/api/company/index.php", "GET", array(
        'id' => $companyId
    ));
    
    $company = $result['result'];
    
    //Get employees
    $result = makeAPIRequest("/api/company/employees/index.php", "GET", array(
        'companyId' => $companyId
    ));
    
    $employees = $result['result'];
    
    //Get posts
    $result = makeAPIRequest("/api/company/posts/", "GET", array(
        'companyId' => $companyId
    ));
    
    $posts = $result['result'];
?>

<!DOCTYPE html>
<html>
<head> 
    <?php require '../links.php'; ?>
    <style>
        #header {
            margin-bottom: 15px;
        }
        #profileImage {
            margin-right: 15px;
        }
        #left-column {
            padding: 0 15px 0 0;
        }
        #right-column {
            padding: 0 0 0 15px;
        }
        #experience {
            background-color:white;
            overflow-y: scroll;
            overflow-x: hidden;
            height: 300px;
            margin-bottom: 15px;
        }
        .employ {
            height: 100px;
            width: 100px;
            float: left;
            margin: 10px;
        }
        .users {
            height: 100px;
            width: 100px;
            float: left;
            margin: 10px;
        }
        .thumb:hover {
           color: dodgerblue;
        }
    </style>
</head>
<body>
    <?php require '../navbar.php'; ?>
    <div id="container">
        <div class="col-md-10 col-md-offset-1">
            <div id="header">
                <div class="card shadow comp">
                    <div id="profileImage" class="pull-left"><img class="img-thumbnail" src="<?= getImageUrl($company['profileImageId']); ?>" width="150" height="150"></div>
                    <h1 class="no-spacing"><?= $company['name']; ?></h1>
                    <div class="location">
                        <div>1835 73rd Ave</div>
                        <div>Medina, Washington 12345</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div>
                <div id="left-column" class="col-md-2">
                    <div class="card shadow" height="200">
                        <h2>Similar</h2>
                    </div>
                </div>
                
                <div class="col-md-8 no-padding">
                    <div id="experience" class="card shadow">
                        <h2>Employees</h2>
                        
                        <?php foreach ($employees as $employee) {
                            echo makeTemplateRequest('/user-card/', "GET", array(
                                'userId' => $employee['user']['id']
                            ));
                        } ?>
                    </div>
                    <!-- End employees div-->
                    
                    <div class="card shadow">
                        <h2>Recent Posts</h2><hr>
                        
                        <?php foreach ($posts as $post) {
                            echo makeTemplateRequest("/post-card/", "GET", array(
                                'postId' => $post['id']
                            ));
                        } ?>
                    </div>
                </div>
                <!-- col-md-8 div-->
                
                <div id="right-column" class="col-md-2">
                </div>
            </div>
        </div>
    </div>
    <!-- end Container div--> 
</body>
</html>