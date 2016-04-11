<!DOCTYPE html>
<html>
<head>
<title>Search Results</title>
</head>
<body>
        <?php require 'links.php'; ?>
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
<?php require 'navbar.php'; ?>
<div id="nav">
Location<br>
Company<br>
Date Posted<br>
Industry<br>
Experience Level<br>
<button type="button" class="btn btn-success">Filter</button> 
</div>
<div><center><h3>Results Found</h3></center></div>
<?php

for($i=0; $i < 10; $i++) { ?>
    <div id="section">  
        <div class= "col-lg-2"><br><img src = "web.png" alt= "Job Posting" style = "width:100px;height:100px;"></div>
        <div class= <h4>Software Engineer</h4></div>
        <div class= <small>Microsoft</small></div>
        <div class= <sub>Greater Atlanta Area</sub></div> 
        <button type="button" class="btn btn-success">View</button>     
    </div>
<?php }
?>
    
    

   
    

</body>
</html>