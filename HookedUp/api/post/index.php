<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/api/tools.php';
    
    $method = htmlspecialchars($_SERVER['REQUEST_METHOD']);
    $conn = mysqlConnect();
    
    switch ($method) {
        case 'GET':    
            if (!$id = getGETSafe('postId')) {
                failure("userId required arg");
            }
            
            $query = "SELECT * FROM post WHERE id = ?";
            $posts = exec_stmt($query, "s", $id);
            if (!$post = reset($posts)) {
                failure("No post for id: ".$id);
            }
            
            $query = "SELECT ".userProperties()." FROM user WHERE id=?";
            $users = exec_stmt($query, "s", $post['originUserId']);
            if ($user = reset($users)) {
                $post['posterProfileImageId'] = $user['profileImageId'];
                $post['posterName'] = $user['firstName'] . " " . $user['lastName'];
            }
            
            $query = "SELECT ".companyProperties()." FROM company WHERE id=?";
            $companies = exec_stmt($query, "s", $post['originCompanyId']);
            if ($company = reset($companies)) {
                $post['posterProfileImageId'] = $company['profileImageId'];
                $post['posterName'] = $company['name'];
            }
            
            $query = "SELECT * FROM postLike WHERE postId = ?";
            $postLikes = exec_stmt($query, "s", $id);
            $post['numberOfLikes'] = count($postLikes);
            
            $query = "SELECT * FROM comment WHERE postId = ? ORDER BY createdAt DESC";
            $comments = exec_stmt($query, "s", $post['id']);
            foreach($comments as $key => $comment) {
                $query = "SELECT * FROM commentLike WHERE commentId = ?";
                $commentLikes = exec_stmt($query, "s", $comment['id']);
                $comment['numberOfLikes'] = count($commentLikes);
                $comments[$key] = $comment;
            }
            
            $post['comments'] = $comments;

            success($post);
            break;
        case 'POST':
            break;
        case 'DELETE';
            break;
    }    
?>