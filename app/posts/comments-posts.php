<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

if (isset($_POST['comment'], $_GET['post_id'])) {
    $comment = trim(filter_var($_POST['comment'], FILTER_SANITIZE_STRING));
    $created_at = date("y-m-d, H:i:s");
    $id = (int)$_SESSION['logedin']['id'];
    $postId = $_GET['post_id'];

    $statement = $pdo->prepare('INSERT INTO comments (content, created_at, user_id, post_id)
    VALUES (:content, :created_at, :id, :post_id)');

    if (!$statement)
    {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':created_at', $created_at, PDO::PARAM_STR);
    $statement->bindParam(':content', $comment, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);

    $statement->execute();

    redirect('/feed.php');
}
