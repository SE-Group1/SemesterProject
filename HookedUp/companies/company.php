<?php require '../tools.php';
    
    requireLoggedIn();
    
    $result = makeAPIRequest("/api/company/index.php", "GET", array(
        'id' => 'Company-1'
    ));
    
    $company = $result['result'][0];
    //echo json_encode($company);
    
    $result = makeAPIRequest("/api/company/employees/index.php", "GET", array(
        'companyId' => 'Company-1'
    ));
    
    $employees = $result['result'];
    //echo json_encode($employees);
    
    $reuslt = makeAPIRequest("/api/company/post.php", "GET", array(
        'companyId' => 'Company-1'
    ));
    
    $posts = $result['result'];
    //echo json_encode($posts);  
?>

<!DOCTYPE html>
<html>
<head> 
    <?php require '../links.php'; ?>
    <style>
        h2 {
            text-align: center;
            padding: 10px;
            margin: 10px;
            
        }
        
        hr {
            size: 3px;
        }
        
        .row1 {
            background-color:white;
            padding: 10px;
            
        }
        
        #employees {
            background-color:white;
            padding: 10px;
            margin: 10px;
            overflow-y: scroll;
            overflow-x: hidden;
            height: 300px;
        }
        
        .employ {
            height: 100px;
            width: 100px;
            float: left;
            margin-right: 10px;
        }
        
        .companies {
            height: 100px;
            width: 100px;
            float: left;
            margin: 10px;
        }
        
        .recent_posts {
            background-color: white;
        }
        
        #company {
            float: left;
        }
        
        .similar {
            padding:10px;
        }
        
        .postpic {
            max-height: 150px;
            max-width: 150px;
        }  
    </style>
</head>
<body>
    <?php require '../navbar.php'; ?>
    <div id="container">
        <div class="col-md-3" >
            <img src="papajohns.jpeg" class="img-thumbnail">
            <h2>Similar Companies</h2>
            <div class="row1">
                <?php for($i=1; $i <=5; $i++)  { ?>
                    <img src="company.jpeg" class="img-thumbnail companies">
                    <?php echo "<h5 class='similar'> Company ".$i."</h5>"; ?>
                    <div class="clearfix"></div>
                    <hr>
                
                <?php } ?>
                
            </div>
        </div>
            <div class="col-md-9 row1 comp">
                <h2 id="company"><?= $company['name']; ?></h2>
                <div class="clearfix"></div>
                <div class="location">
                    <div>401 East West Blvd</div>
                    <div>Columbia Missouri, 65203</div>
            </div>
                    
            </div>
        
            
            <div class="col-md-3 similar">
            </div>
            
            <div class="col-md-9">
                <div id="employees">
                    <h2>Current Employees</h2>
                    <div class="col-md-6">
                        <?php 
                            foreach($employees as $employee) { 
                                $user=$employee['user'];?>
                                
                            <div><img src="dt.jpeg" class="employ img-thumbnail"></div>
                            <div>
                                <div class="name"><h4><b><?php echo $user['firstName']; echo " " . $user['lastName']?></b></h4></div>
                                <div class="name"><h5><b><?php echo $employee['title']?></b></h5></div>
                                <div class="name"><h5><b><?php echo $user['email']?></b></h5></div>
                            </div>
                            <div class="clearfix"></div>
                            
                        <?php } ?>
                    </div>
                    
                        <div class="col-md-6">
                        <?php 
                            for($i=0; $i < 5; $i++) { ?>
                            <div><img src="kp.jpeg" class="employ img-thumbnail"></div>
                            <div class="name"><h4><b>Katy Perry</b></h4></div>
                            <div class="clearfix"></div>
                            
                        <?php }
                        ?>
                    </div>
                    
                    
                </div> <!-- End employees div-->
                
                <div class = "recent_posts">
                    <h2>Recent Posts</h2>
                    <hr>
                    
                    <?php
                        foreach($posts as $post) { ?>
                            <div><img src="Papajohns.jpeg" class="col-md-4 img-thumbnail postpic" >
                            <div class="col-md-6"><?php echo $post['comment'] ?> </div>
                            <div class="name"><h5><b><?php echo $post['createdAt']?></b></h5></div>
                            <div class='clearfix'></div>
                            </div><hr>
                        <?php }
                    ?>   
                    
                </div>
            </div>

        
        <!-- col-md-3 div-->
    </div>
    <!-- end Container div-->     
</body>
</html>