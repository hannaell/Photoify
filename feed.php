<?php require __DIR__.'/views/header.php';

// Posts
$statement = $pdo->prepare(
    "SELECT p.id as post_id, p.content, p.description, p.created_at, p.updated_at,
    u.username, u.id as user_id, u.profile_picture
    FROM posts p INNER JOIN users u WHERE u.id = p.user_id"
    );

    if (!$statement)
    {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->execute();
    // Saving database in variable
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    $posts = array_reverse($posts);
    // die(var_dump($posts));

?>

<?php if (isset($_SESSION['logedin'])): ?>

    <?php foreach ($posts as $post): ?>
        <?php
        $postId = $post['post_id'];
        $userId = $_SESSION['logedin']['id'];

        // Comments
        $statement = $pdo->prepare(
            "SELECT c.id as comment_id, c.content, c.created_at, u.username, u.profile_picture, u.id as user_id
            FROM comments c INNER JOIN users u WHERE u.id = c.user_id AND c.post_id = :post_id"
        );

        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);

        $statement->execute();
        // Saving database in variable
        $comments = $statement->fetchAll(PDO::FETCH_ASSOC);
        // die(var_dump($comments));

        $uploaded = time()-strtotime($post['created_at']);
        $uploaded = date('d', $uploaded);

        // Likes
        // $statement = $pdo->prepare(
        //     "SELECT l.post_id as post_id, p.id as id FROM likes l INNER JOIN posts p WHERE p.id = l.post_id
        //     AND post_id = :post_id"
        // );
        //
        // if (!$statement)
        // {
        //     die(var_dump($pdo->errorInfo()));
        // }
        //
        // $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
        //
        // $statement->execute();
        // // Saving database in variable
        // $likes = $statement->fetchAll(PDO::FETCH_ASSOC);
        // // die(var_dump($likes));
        // //
        // //

        $likes = $statement->fetchAll(PDO::FETCH_ASSOC);
        // Determine if user already liked the posts
        $statement = $pdo->query(
            "SELECT * FROM likes WHERE user_id = '$userId' AND post_id ='$postId';"
        );

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }

        $liked = $statement->fetch(PDO::FETCH_ASSOC);

        if ($liked) {
            $action = 'disliked';
        } else {
            $action = 'liked';
        }

        // Like counter
        $statement = $pdo->prepare(
            "SELECT COUNT(post_id) FROM likes WHERE post_id = :post_id"
        );

        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);

        $statement->execute();
        // Saving database in variable
        $countLikes = $statement->fetchAll(PDO::FETCH_ASSOC);
        // die(var_dump($countLikes));

        ?>

        <!-- Skriver ut bilder och kommentarer -->
        <div class="post">

            <div class="card">

                <div class="account">
                    <img class="profilePictureFeed" src="/app/images/<?php echo $post['profile_picture']; ?>" alt="Profile Picture">
                    <p class="userFeed"><?php echo $post['username']; ?></p>
                </div>

                <div class="uploadedPicture">
                    <?php if ($post['user_id'] === $_SESSION['logedin']['id']): ?>
                        <a href="/editposts.php?post_id=<?= $postId?>">
                            <img class="photoFeed" src="/app/images/<?php echo $post['content']; ?>" alt="Image">
                        </a>
                    <?php else: ?>
                        <img class="photoFeed" src="/app/images/<?php echo $post['content']; ?>" alt="Image">
                    <?php endif; ?>
                </div>

                 <div class="container">

                    <div class="likeButton">
                        <form method="post" class="likeFormFeed" >
                            <input type="hidden" name="post_id" value="<?php echo $postId; ?>" />
                            <input type="hidden" name="action" value="<?php echo $action; ?>" />
                            <button type="submit"><i class="far fa-heart" aria-hidden="true"></i></button>
                        </form>
                    </div>

                    <div class="numberOfLikes">
                        <?php foreach ($countLikes as $countLike): ?>
                            <p class="likeCounterFeed"><?php echo $countLike["COUNT(post_id)"]; ?></p>
                            <p class="likesFeed">Likes</p>
                        <?php endforeach; ?>
                    </div>

                    <div class="description">
                        <p class="userFeed"><?php echo $post['username']; ?></p>
                        <p class="descriptionFeed"><?php echo $post['description']; ?></p>
                    </div>

                    <?php foreach ($comments as $comment): ?>
                        <div class="comments">
                            <p class="commentUserFeed"><?php echo $comment['username']; ?></p>
                            <p class="commentFeed"><?php echo $comment['content']; ?></p>
                        </div>
                    <?php endforeach; ?>

                    <div class="addComment">
                        <form action="app/posts/comments-posts.php?post_id=<?php echo $postId?>" method="post">
                            <div class="formCommentFeed">
                                <span class="commentIcon">
                                    <i class="far fa-comment"></i>
                                </span>

                                <!-- <label for="comment">Comment</label> -->
                                <input class="inputFeed" type="text" name="comment" placeholder="Comment..." required>
                            </div>
                            <button class="button" type="submit">Submit</button>
                        </form>
                    </div>

                    <div class="uploadedTime">
                        <p class="uploadedFeed"><?php echo $uploaded . ' day ago'; ?></p>
                    </div>

                 </div>

            </div>

        </div>

    <?php endforeach; ?>

    <?php else: redirect('/login.php'); ?>

<?php endif; ?>

<?php require __DIR__.'/views/footer.php'; ?>
