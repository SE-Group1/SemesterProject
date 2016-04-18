<?php require '../tools.php';
    requireLoggedIn();
?>
<!DOCTYPE html>
<html>
<head>
<title>Search Results</title>
</head>
<body>
    <?php require '../links.php'; ?>
    <style>
        
            .btn btn-success {
                align: right;
                padding:20px;
            }
        
            #nav {
                line-height:30px;
                background-color:#eeeeee;
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
<?php require '../navbar.php'; ?>
<div id="nav">
Location<br>
Company<br>
Date Posted<br>
Industry<br>
Experience Level<br>
<button type="button" class="btn btn-success">Filter</button> 
</div>
<?php
    if (!$filter = getGETSafe('filter')) { ?>
        <div><center><h3>Need Search</h3></center></div>  
        
        <form action="" method="get">
            Search:
            <input type="search" name="filter">
            <input type="submit">
        </form>
              
    <?php } else { ?>    
        <div><center><h3>Search Result</h3></center></div>
        
        <form action="" method="get">
            Search:
            <input type="search" name="filter" value = "<?php echo $filter ?>">
            <input type="submit">
        </form>
        
        <?php 
            $result = curl_get("api/search/index.php", array(
                "filter" => $filter
            ));
            
            $users = $result['result']['users'];
            
            foreach ($users as $user) { ?>  
                <div id="section"> 
                    <div class= "col-lg-2"><br><img src = "billGates.jpg" style = "width:100px;height:100px;"></div> 
                    <div class= <h4>Profile Type: People</h4></div>
                    <div class= <h4><?php echo $user['firstName'].' '.$user['lastName']?></h4></div>
                    <div class= <small><?php echo $user['email']?></small></div>
                    <div class= <sub><?php echo $user['phoneNumber']?></sub></div> 
                    <button type="button" class="btn btn-success" onClick='/user'>View</button>  
            </div> 
            <?php }
            
            $companies = $result['result']['companies'];
            foreach ($companies as $company) { ?>
                <div id="section">  
                <div class= "col-lg-2"><br><img src = "billGates.jpg" style = "width:100px;height:100px;"></div> 
                <div class= <h4>Profile Type: Company</h4></div>   
                <div class= <h4><?php echo $company['name']?></h4></div>
                <button type="button" class="btn btn-success" onClick='/company'>View</button>     
            </div> 
            <?php }
            
            /*for($i=0; $i < 10; $i++) { ?>
            <div id="section">  
                <div class= "col-lg-2"><br><img src = "web.png" alt= "Job Posting" style = "width:100px;height:100px;"></div>
                <div class= <h4>Software Engineer</h4></div>
                <div class= <small>Microsoft</small></div>
                <div class= <sub>Greater Atlanta Area</sub></div> 
                <button type="button" class="btn btn-success">View</button>     
            </div>
        <?php } ?>*/
        } ?>
    
</body>
</html>