<?php require '../tools.php';
    requireLoggedIn();
    
    $userId = getGETSafe('id');
    
    //Get user
    $result = makeAPIRequest("api/user/", "GET", array(
        'id' => $userId
    ));
    
    $user = $result['result'];
    
    //Get skills
    $result = makeAPIRequest("api/user/skills/", "GET", array(
        'userId' => $userId
    ));
    
    $skills = $result['result'];
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
    <script>
        function endorseSkill(skillId) {
            // makeAPIRequest("/api/skill/endorse.php", "PUT", {
            //     "userId": "<?= getUserId(); ?>",
            //     "skillId": skillId
            // }, 
            // function(data) {
            //    console.log(data); 
            // });
            makeAPIRequest("/api/skill/endorse.php", "PUT", {
                "userId": "<?= getUserId(); ?>",
                "skillId": skillId
            }).done(function(data) {
                console.log(data);
            });
        }
    </script>
</head>
<body>
    <?php require '../navbar.php'; ?>
    <div id="container">
        <div class="col-md-10 col-md-offset-1">
            <div id="header">
                <div class="card shadow comp">
                    <div id="profileImage" class="pull-left"><img class="img-thumbnail" src="<?= getUserImageUrl($user); ?>" width="150" height="150"></div>
                    <h1 class="no-spacing"><?= $user['firstName'] . ' ' . $user['lastName']; ?></h1>
                    <div class="location">
                        <div>1835 73rd Ave</div>
                        <div>Medina, Washington 12345</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div>
                <div id="left-column" class="col-md-2">
                    <div class="card shadow">
                        <h2>Skills</h2>
                        <?php foreach ($skills as $skill)  { ?>
                            <div>
                                <p class="pull-left"><?= $skill['name']; ?></p>
                                
                                <?php $endorsements = $skill['endorsements'];
                                if(isset($endorsements) && count($endorsements) > 0) { ?>
                                    <p class="pull-right"><span class="thumb glyphicon glyphicon-thumbs-up" width="20" height="20" onclick="endorseSkill('<?= $skill['id'] ?>');"></span>  <?= count($endorsements); ?></p>
                                <?php } ?> 
                                <div class="clearfix"></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                
                <div class="col-md-8 no-padding">
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
                        <h2>Recent Posts</h2><hr>
                        
                        <?php for($i=0; $i < 10; $i++) { ?>
                            <div><img src="company.jpeg" class="col-md-4" class="column">
                            <div class="col-md-6" class="column"> Lorem ipsum dolor sit amet, aenean porta nec velit, lectus posuere, tortor quamt fasdjlskfjas a kgjasdl ajsflaksd fkj lkjf asdlfjas fsjf  sdfkjasf asfjijfaslkfj skfjsdf sdjf lkdjfasd flkajf </div>
                            <div class='clearfix'></div>
                            </div><hr>
                        <?php } ?>
                    </div>
                </div>
                <!-- col-md-8 div-->
                
                <div id="right-column" class="col-md-2">
                    <?php if(isUser($userId)) { ?>
                        <div class="card shadow">
                            <a href="../connections/visual.php">See how you compare to your friends</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- end Container div-->     
</body>
</html>