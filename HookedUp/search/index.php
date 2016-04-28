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
            line-height:30px;
            background-color: white;
            height:1500px;
            width:200px;
            float:left;
            padding:5px; 
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
<div id="nav">
    Location<br>
    Company<br>
    Date Posted<br>
    Industry<br>
    Experience Level<br>
    <button type="button" class="btn btn-success">Filter</button> 
</div>
<div><center><h3>Search Results</h3></center></div>

<?php 
    if(isset($filter)) {
        $result = makeAPIRequest("api/search/index.php", "GET", array(
            "filter" => $filter
        ));
        
        $users = $result['result']['users'];
        
        foreach ($users as $user) { ?>
            <div id="section"> 
                <div class="col-lg-2"><br><img src="<?= getImageUrl($user['profileImageId']);?>" width="100" height="100"></div> 
                <div><h4>Profile Type: People</h4></div>
                <div><h4><?php echo $user['firstName'].' '.$user['lastName']?></h4></div>
                <div><small><?php echo $user['email']?></small></div>
                <div><sub><?php echo $user['phoneNumber']?></sub></div> 
                <button type="button" class="btn btn-success" onClick='/user'>View</button>  
            </div>
        <?php }
        
        $companies = $result['result']['companies'];
        foreach ($companies as $company) { ?>
            <div id="section">  
            <div class="col-lg-2"><br><img src="<?= getImageUrl($company['profileImageId']); ?>" width="100" height="100"></div> 
            <div><h4>Profile Type: Company</h4></div>   
            <div><h4><?php echo $company['name']?></h4></div>
            <button type="button" class="btn btn-success" onClick='/company'>View</button>     
        </div> 
        <?php } ?>
    <?php } ?>
    
</body>
</html>