<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);
    
    switch ($method) {
        case 'GET':
        if (!$companyId = getGETSafe('companyId')) {
            failure("companyId required arg");
        }
        
        $query = "SELECT id FROM post WHERE originCompanyId = ? ORDER BY createdAt DESC";
        $posts = exec_stmt($query, "s", $companyId);
        
        success($posts);
    }
?>  