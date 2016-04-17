<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);

    switch ($method) {
        case 'GET':
            $query = "SELECT * FROM post ORDER BY createdAt DESC";
            success(exec_stmt($query));
            break;
    }
?>