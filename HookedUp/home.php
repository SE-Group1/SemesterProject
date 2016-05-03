<?php require 'tools.php'; 
    requireLoggedIn();
    $url = "/api/company/index.php";
    $fields = array(
        'id' => 'Company-1'
    );
    
    $result = curl_get($url, $fields);
    $company = $result['result'][0];
    //echo json_encode($company);
    
    $field = array(
        'companyId' => 'Company-1'
    );
    
    $url1 = "/api/company/employees/index.php";
    $results = curl_get($url1, $field);
    $employees = $results['result'];
    //echo json_encode($employees);
    
    $url2 = "/api/company/post.php";
    $result2 = curl_get($url2, $field);
    $posts = $result2['result'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'links.php'; ?>
    <style>
    </style>
    <script>
        $(document).ready(function() {
            $.getJSON("api/feed/index.php", function(data) {
                //console.log(data);
            });
            
            $.ajax({
                url: "api/skill/endorse.php",
                type: "POST",
                data: {
                    'userId': "User-2",
                    "skillId": "Skill-1"
                },
                success: function(data) {
                    $("#result").html(data);
                }
            });
        });
    </script>
</head>
<body>

<?php require 'navbar.php'; ?>

<div class="container">
    <p id="result">
    </p>
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

</body>
</html>
