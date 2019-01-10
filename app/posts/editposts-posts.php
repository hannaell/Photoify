<?php

declare(strict_types=1);


// Fetch post
if (isset($_SESSION['logedin']['id'])) {
    if (isset($_GET['post_id'])) {
        $postId = $_GET['post_id'];

        $statement = $pdo->prepare('SELECT * FROM posts WHERE id = :post_id');

        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $statement->execute();

        $post = $statement->fetch(PDO::FETCH_ASSOC);
    }

    // Update post
    if (isset($_POST['description'])) {
        $postId = $_GET['post_id'];
        $description = trim(filter_var($_POST['description'], FILTER_SANITIZE_STRING));
        $updated_at = date("y-m-d, H:i:s");

        $statement = $pdo->prepare('UPDATE posts SET description = :description, updated_at = :updated_at WHERE id = :post_id');

        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $statement->bindParam(':description', $description,  PDO::PARAM_STR);
        $statement->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
        $statement->execute();

        redirect('/feed.php');
    }

    // Delete post, comment, img, likes
    if (isset($_POST['delete'])) {
        $postId = $_GET['post_id'];

        // Delete img
        $statement = $pdo->prepare('SELECT content FROM posts WHERE id = :post_id');

        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $statement->execute();

        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

        $path = __DIR__."/../images/";
        foreach ($posts as $post) {
            unlink($path.$post['content']);
        }

        // Delete post
        $statement = $pdo->prepare('DELETE FROM posts WHERE id = :post_id');

        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $statement->execute();

        // Delete comments
        $statement = $pdo->prepare('DELETE FROM comments WHERE post_id = :post_id');

        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $statement->execute();

        // Delete likes
        $statement = $pdo->prepare('DELETE FROM likes WHERE post_id = :post_id');

        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
        $statement->execute();

        redirect('/feed.php');
    }
}
