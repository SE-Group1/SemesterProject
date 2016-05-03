<?php require '../tools.php';
    requireLoggedIn();
    
    $filter = getGETSafe('filter');
?>
<!DOCTYPE html>
<html>
<head>
    <?php require '../links.php'; ?>
    <style>
        .btn btn-success {
            align: right;
            padding:20px;
        }
    
        #nav {
            background-color: white;
            height: 1500px;
        }
        #nav-content {
            line-height: 30px;
            padding: 10px;
        }
        #section {
            width:1000px;
            height:120px;
            padding:10px; 
        }
    </style>
</head>
<body>
<?php require '../navbar.php'; ?>
<div class="row">
    <div id="nav" class="col-md-2">
        <div id="nav-content">
            Location<br>
            Company<br>
            Date Posted<br>
            Industry<br>
            Experience Level<br>
            <button type="button" class="btn btn-success">Filter</button> 
        </div>
    </div>
    <div class="col-md-6">
        <h2 class="page-title text-center">Search Results</h2>
        <?php 
        if(isset($filter)) {
            $result = makeAPIRequest("api/search/index.php", "GET", array(
                "filter" => $filter
            ));
            
            $users = $result['result']['users'];
            foreach ($users as $user) { 
                
                echo makeTemplateRequest("/user-card/", "GET", array(
                    'userId' => $user['id']
                ));
            }
            
            $companies = $result['result']['companies'];
            foreach ($companies as $company) {
            
                echo makeTemplateRequest("/company-card/", "GET", array(
                    'companyId' => $company['id']
                ));
            }
         } ?>
    </div>
</div>
    
</body>
</html>