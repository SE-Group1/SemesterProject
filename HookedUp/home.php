<?php require 'tools.php'; 
    requireLoggedIn();
    
    $result = makeAPIRequest("/api/feed/", "GET");
    $posts = $result['result'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'links.php'; ?>
</head>
<body>

<?php require 'navbar.php'; ?>

<div class="container">
    <p id="result">
    </p>
    <div class = "recent_posts">
        <h2>Recent Posts</h2>
        <hr>
        
        <?php foreach($posts as $post) { 
            echo makeTemplateRequest("/post-card/", "GET", array(
                'postId' => $post['id']
            ));
        } ?>
    </div>
</div>

</body>
</html>
