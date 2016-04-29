<?php require '../tools.php';
    requireLoggedIn();
    
    $userId = getGETSafe('id');
    
    $result = makeAPIRequest("/api/user/index.php", "GET", array(
        'id' => $userId
    ));
    
    $user = $result['result'];
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
    </style>  
</head>
<body>
    <?php require '../navbar.php'; ?>
    <div id="container">
        <div class="col-md-10 col-md-offset-1">
            <div id="header">
                <div class="card shadow comp">
                    <div id="profileImage" class="pull-left"><img class="img-thumbnail" src="<?= getImageUrl($user['profileImageId']); ?>" width="150" height="150"></div>
                    <h1 class="no-spacing"><?= $user['firstName'] . ' ' . $user['lastName']; ?></h1>
                    <div class="location">
                        <div>1835 73rd Ave</div>
                        <div>Medina, Washington 12345</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div>
                <div class="col-md-2 card shadow">
                    <h2>Skills</h2>
                    <?php for($i=1; $i <=5; $i++)  { ?>
                        <img src="skills.jpg" class="img-thumbnail companies">
                        <?php echo "<a class='similar' href=> Skill ".$i."</a>"; ?>
                        <div class="clearfix"></div>
                        <hr>
                    <?php } ?>
                </div>
                
                <div class="col-md-8">
                    <div id="experience" class="card shadow">
                        <h2>Past Experience</h2>
                        <?php 
                            for($i=0; $i < 5; $i++) { ?>
                            <div><img src="apple.jpg" class="employ img-thumbnail"></div>
                            <div>
                                <div class="name"><h4><b>Apple</b></h4></div>
                                <div class="name"><h5><b>Mac'in on Mac's</b></h5></div>
                            </div>
                            <div class="clearfix"></div>
                        <?php } ?>
                    </div>
                    <!-- End employees div-->
                    
                    <div class="card shadow">
                        <h2>Recent Posts</h2>
                        <hr>
                        
                        <?php
                            for($i=0; $i < 10; $i++) { ?>
                                <div><img src="company.jpeg" class="col-md-4" class="column">
                                <div class="col-md-6" class="column"> Lorem ipsum dolor sit amet, aenean porta nec velit, lectus posuere, tortor quamt fasdjlskfjas a kgjasdl ajsflaksd fkj lkjf asdlfjas fsjf  sdfkjasf asfjijfaslkfj skfjsdf sdjf lkdjfasd flkajf </div>
                                <div class='clearfix'></div>
                                </div><hr>
                            <?php } ?>
                    </div>
                </div>
                <!-- col-md-8 div-->
                
                <div class="col-md-2 card shadow" height="200px">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- end Container div-->     
</body>
</html>