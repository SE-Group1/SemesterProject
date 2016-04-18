<?php require '../tools.php';
    
    requireLoggedIn();
    
    $url = $_SERVER['HTTP_HOST'] . "/api/company/index.php";
    $fields = array(
        'id' => 'Company-1'
    );
    
    $result = curl_get($url, $fields);
    $company = $result['result'][0];
    echo json_encode($company);
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
            
            body {
                background-color: #D8D8D8 
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
                margin: 10px;
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
            
            
           
                
        </style>
        
        
    </head>
    
    <body>
        <?php require '../navbar.php'; ?>
        <div id="container">
            <div class="col-md-3" >
                <img src="Job.jpg" class="img-thumbnail">
                <h2>Job Title</h2>
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
                                for($i=0; $i < 5; $i++) { ?>
                                <div><img src="dt.jpeg" class="employ img-thumbnail"></div>
                                <div>
                                    <div class="name"><h4><b>Donald Trump</b></h4></div>
                                    <div class="name"><h5><b>Professional Wall-Builder</b></h5></div>
                                </div>
                                <div class="clearfix"></div>
                                
                            <?php }
                            ?>
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
                            for($i=0; $i < 10; $i++) { ?>
                                <div><img src="company.jpeg" class="col-md-4" class="column">
                                <div class="col-md-6" class="column"> Lorem ipsum dolor sit amet, aenean porta nec velit, lectus posuere, tortor quamt fasdjlskfjas a kgjasdl ajsflaksd fkj lkjf asdlfjas fsjf  sdfkjasf asfjijfaslkfj skfjsdf sdjf lkdjfasd flkajf </div>
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