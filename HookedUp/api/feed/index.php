<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
        
    switch ($method) {
        case 'GET':
            $query = "SELECT * FROM post ORDER BY createdAt DESC";
            success(exec_stmt($query));
            break;
    }
?>