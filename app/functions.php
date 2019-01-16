<?php

declare(strict_types=1);

if (!function_exists('redirect')) {
    /**
     * Redirect the user to given path.
     *
     * @param string $path
     *
     * @return void
     */
    function redirect(string $path)
    {
        header("Location: ${path}");
        exit;
    }
}

/**
 * Get data from database by id
 * @param  int    $id  [description]
 * @param  object $pdo [description]
 * @return array       [description]
 */
function getUserByID(int $id, object $pdo): array
  {
    $statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
    $statement->bindParam(':id', $id, PDO::PARAM_STR);
    $statement->execute();
    return $statement->fetch(PDO::FETCH_ASSOC);
  }

function countLikes(int $postId, object $pdo): array {
    // Like counter
    $statement = $pdo->prepare(
        'SELECT COUNT(*) as likes FROM likes WHERE post_id = :post_id'
    );

    if (!$statement)
    {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);

    $statement->execute();
    // Saving database in variable
    return $statement->fetchAll(PDO::FETCH_ASSOC);
    // die(var_dump($countLikes));
}

function countComments(int $postId, object $pdo): array {
    // Comment counter
    $statement = $pdo->prepare(
        'SELECT COUNT(*) as comments FROM comments WHERE post_id = :post_id'
    );
    if (!$statement)
    {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);

    $statement->execute();
    // Saving database in variable
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

  /**
 * Get a sentence with days, minutes or hours
 * @param  int    $time [time passed]
 * @return string       []
 */
function getTime(int $time): string{
  if ($time < (60*60))
  {
    return date('i', $time)." minutes ago";
  }
  elseif ($time > 60*60 && $time < 60*60*24)
  {
    return date('H', $time)." hours ago";
  }
  elseif ($time > 60*60*24 && $time < 60*60*24*7)
  {
    return date('d', $time)." days ago";
  }
  else
  {
    return date('d', $time)." days ago";
  }
}
