<?php

    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);

    switch ($method) {
        case 'GET':
            if (!$userId = getGETSafe('userId')) {
                failure("userId required");
            }
            
            
            break;
    }
?>