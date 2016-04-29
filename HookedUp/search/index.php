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
        .card-title {
            font-size: large;
        }
        
        .employ {
            height: 100px;
            width: 100px;
            float: left;
            margin-right: 10px;
        }
        
        .card {
            background-color: white;
            border-color: #ddd;
            border-radius: 4px;
            padding: 15px;
            box-shadow: 0px 2px 4px #999;
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
        <div class="text-center"><center><h3>Search Results</h3></center></div>
        <?php 
        if(isset($filter)) {
            $result = makeAPIRequest("api/search/index.php", "GET", array(
                "filter" => $filter
            ));
            
            $users = $result['result']['users'];
            
            foreach ($users as $user) {
                
                $titles = $user['titles'];
                $titleText = "";
                for ($i = 0; isset($titles) && $i < count($titles); $i++) {
                    $titleText .= ($i == 0 ? '' : ', ') . $titles[$i];
                } ?>
                <div class="card">
                    <div><img src="<?= getImageUrl($user['profileImageId']); ?>" class="employ img-thumbnail"></div>
                    <div>
                        <div class="name"><h4><b><a href="<?= getClientUrl() . "profile/?id=" . $user['id']; ?>"><?= $user['firstName'] . " " . $user['lastName']; ?></a></b></h4></div>
                        <div class="name text-muted"><h6><i><?= $titleText ?></i></h6></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            <?php }
            
            $companies = $result['result']['companies'];
            foreach ($companies as $company) { ?>
                <div id="section">  
                <div class="col-lg-2"><br><img src="<?= getImageUrl($company['profileImageId']); ?>" width="100" height="100"></div> 
                <div><h4>Profile Type: Company</h4></div>   
                <div><h4><?= $company['name']?></h4></div>
                <button type="button" class="btn btn-success" onClick='/company'>View</button>     
            </div> 
            <?php } ?>
        <?php } ?>
    </div>
</div>
    
</body>
</html>