<?php require'../tools.php';
    requireLoggedIn();
    
    $userId = getGETSafe('userId');
    
    $result = makeAPIRequest("/api/user/", "GET", array(
        'id' => $userId
    ));
    
    $user = $result['result'];
          
    $titles = $user['titles'];
    $titleText = "";
    for ($i = 0; isset($titles) && $i < count($titles); $i++) {
        $titleText .= ($i == 0 ? '' : ', ') . $titles[$i];
    }
?>
    
<div class="card shadow" style="margin-bottom:15px">
    <div><img src="<?= getImageUrl($user['profileImageId']); ?>" class="card-image img-thumbnail"></div>
    <div>
        <div class="name"><h4><b><a href="<?= getClientUrl() . "profile/?id=" . $user['id']; ?>"><?= $user['firstName'] . " " . $user['lastName']; ?></a></b></h4></div>
        <div class="name text-muted"><h6><i><?= $titleText ?></i></h6></div>
    </div>
    <div class="clearfix"></div>
</div>