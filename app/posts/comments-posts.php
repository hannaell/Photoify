<?php

declare(strict_types=1);

// require __DIR__.'/../autoload.php';


//$postId = filter_var($_GET['post_id'], FILTER_SANITIZE_STRING);
//
// //Get post
// $statement = $pdo->prepare(
//     'SELECT content, description, created_at, updated_at, user_id
//     FROM posts WHERE id = :id'
// );
// if(!$statement){
//     die(var_dump($pdo->errorInfo()));
// }
// $statement->bindParam(':id', $postId, PDO::PARAM_STR);
// $statement->execute();
// $postImg = $statement->fetch(PDO::FETCH_ASSOC);

// if (isset($_POST['comment'], $_GET['post_id'])) {
//     $comment = trim(filter_var($_POST['comment'], FILTER_SANITIZE_STRING));
//     $created_at = date("y-m-d, H:i:s");
//     $id = (int)$_SESSION['logedin']['id'];
//     $postId = filter_var($_GET['post_id'], FILTER_SANITIZE_STRING);
//
//     $statement = $pdo->prepare(
//         'INSERT INTO comments (content, created_at, user_id, post_id)
//         VALUES (:content, :created_at, :id, :post_id)'
//     );
//     if (!$statement)
//     {
//         die(var_dump($pdo->errorInfo()));
//     }
//     $statement->bindParam(':created_at', $created_at, PDO::PARAM_STR);
//     $statement->bindParam(':content', $comment, PDO::PARAM_STR);
//     $statement->bindParam(':id', $id, PDO::PARAM_INT);
//     $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
//
//     $statement->execute();
//
//     redirect('/feed.php');
// }

// $statement = $pdo->prepare(
//     'SELECT p.id as post_id, p.content, p.description, p.created_at, p.updated_at,
//     u.username, u.id as user_id, u.profile_picture
//     FROM posts p INNER JOIN users u WHERE u.id = p.user_id AND p.id = :post_id'
// );
// $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
// $statement->execute();
// $user = $statement->fetch(PDO::FETCH_ASSOC);
