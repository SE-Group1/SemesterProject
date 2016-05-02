<?php require'../tools.php';
    requireLoggedIn();
    
    $companyId = getGETSafe('companyId');
    
    $result = makeAPIRequest("/api/company/", "GET", array(
        'id' => $companyId
    ));
    
    $company = $result['result'];
?>
    
<div class="card shadow" style="margin-bottom:15px">
    <div><img src="<?= getImageUrl($company['profileImageId']); ?>" class="card-image img-thumbnail"></div>
    <div>
        <div class="name"><h4><b><a href="<?= getClientUrl() . "companies/profile.php?id=" . $company['id']; ?>"><?= $company['name'] ?></a></b></h4></div>
        <!--<div class="name text-muted"><h6><i></i></h6></div>-->
    </div>
    <div class="clearfix"></div>
</div>