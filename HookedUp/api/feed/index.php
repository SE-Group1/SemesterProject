<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $query = "SELECT * FROM post ORDER BY createdAt DESC";
    success(exec_stmt($query));
?>