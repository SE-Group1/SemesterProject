<?php require'../../tools.php';
    requireLoggedIn();
    
    $postId = getGETSafe('postId');
    
    $result = makeAPIRequest("/api/post/", "GET", array(
        'postId' => $postId
    ));
    
    $post = $result['result'];
    
    if(isset($post['originUserId'])) {
        $profileLink = getClientUrl() . "profile/?id=" . $post['originUserId'];
    } else {
        $profileLink = getClientUrl() . "companies/profile.php?id=" . $post['originCompanyId'];
    }
?>

<div class="card shadow" style="margin-bottom:15px">
    <div><img src="<?= getImageUrl($post['posterProfileImageId']) ?>" class="card-image img-thumbnail"></div>
    <div>
        <div class="name"><h4><b><a href="<?= $profileLink ?>"><?= $post['posterName']; ?></a></b></h4></div>
        <div><p><?= $post['comment']; ?></p></div>
    </div>
    <div class="clearfix"></div>
</div>