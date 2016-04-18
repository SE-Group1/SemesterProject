<?php require '../tools.php';
    requireLoggedIn();
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
        
        .users {
            height: 100px;
            width: 100px;
            float: left;
            margin: 10px;
        }
        
        .recent_posts {
            background-color: white;
        }
        
        #user {
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
            <img src="billGates.jpg" class="img-thumbnail">
            <h2><Skills/h2>
            <div class="row1">
                <?php for($i=1; $i <=5; $i++)  { ?>
                    <img src="skills.jpg" class="img-thumbnail companies">
                    <?php echo "<a class='similar' href=> Skill ".$i."</a>"; ?>
                    <div class="clearfix"></div>
                    <hr>
                
                <?php } ?>
                
            </div>
        </div>
            <div class="col-md-9 row1 comp">
                <h2 id="user"><?= $user['id']; ?></h2>
                <div class="clearfix"></div>
                <div class="location">
                    <div>1835 73rd Ave</div>
                    <div>Medina, Washington 12345</div>
            </div>
                    
            </div>
        
            
            <div class="col-md-3 similar">
            </div>
            
            <div class="col-md-9">
                <div id="employees">
                    <h2>Past Experience</h2>
                    <div class="col-md-6">
                        <?php 
                            for($i=0; $i < 5; $i++) { ?>
                            <div><img src="apple.jpg" class="employ img-thumbnail"></div>
                            <div>
                                <div class="name"><h4><b>Apple</b></h4></div>
                                <div class="name"><h5><b>Mac'in on Mac's</b></h5></div>
                            </div>
                            <div class="clearfix"></div>
                            
                        <?php }
                        ?>
                    </div>
                    
                        <div class="col-md-6">
                        <?php 
                            for($i=0; $i < 5; $i++) { ?>
                            <div><img src="kp.jpeg" class="employ img-thumbnail"></div>
                            <div class="name"><h4><b>CEO</b></h4></div>
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