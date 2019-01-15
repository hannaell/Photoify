<?php

declare(strict_types=1);

require __DIR__.'/views/header.php';
require __DIR__.'/app/posts/comments-posts.php';

?>

<?php if (isset($_SESSION['logedin'])): ?>

    <?php

    $postId = filter_var($_GET['post_id'], FILTER_SANITIZE_STRING);;

    $statement = $pdo->prepare(
        'SELECT p.id as post_id, p.content, p.description, p.created_at, p.updated_at,
        u.username, u.id as user_id, u.profile_picture
        FROM posts p INNER JOIN users u WHERE u.id = p.user_id AND p.id = :post_id'
    );
    $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    // Comments
    $statement = $pdo->prepare(
        'SELECT c.id as comment_id, c.content, c.created_at, u.username, u.profile_picture, u.id as user_id
        FROM comments c INNER JOIN users u WHERE u.id = c.user_id AND c.post_id = :post_id'
    );
    if (!$statement)
    {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
    $statement->execute();
    $comments = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Determine if user already liked the posts
    $statement = $pdo->prepare(
        'SELECT * FROM likes WHERE user_id = :user_id AND post_id = :post_id;'
    );
    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
    $statement->execute();
    $liked = $statement->fetch(PDO::FETCH_ASSOC);

    $countLikes = countLikes($postId, $pdo);
    $ago = getTime(time()-strtotime($user['created_at']));

    ?>

    <!-- Skriver ut bilder och kommentarer -->
    <div class="post" data-id="<?php echo $postId; ?>">

        <div class="card">

            <div class="account">
                <img class="profilePictureFeed" src="/app/images/<?php echo $user['profile_picture']; ?>" alt="Profile Picture">
                <a class="" href="/profileuser.php?user_id=<?= $posts['user_id']?>">
                <p class="userFeed"><?php echo $user['username']; ?></p></a>
            </div>

            <div class="uploadedPicture">
                <img class="photoFeed" src="/app/images/<?php echo $postImg['content']; ?>" alt="Image">
            </div>

            <div class="container">

                <div class="likeButton">
                    <form method="post" class="likeFormFeed" >
                        <input type="hidden" name="post_id" value="<?php echo $postId; ?>" />
                        <button class="hart" type="submit">
                            <?php if($liked): ?>
                                <span class="redHart">
                                    <i class="fas fa-heart" aria-hidden="true"></i>
                                </span>
                            <?php else: ?>
                                <span class="hartIconFeed">
                                    <i class="far fa-heart" aria-hidden="true"></i>
                                </span>
                            <?php endif; ?>
                        </button>
                    </form>
                    <div class="">
                        <span class="commentIcon">
                            <i class="far fa-comment"></i>
                        </span>
                    </div>
                </div>

                <div class="numberOfLikes">
                    <?php foreach ($countLikes as $countLike): ?>
                        <p class="likeCounterFeed"><?php echo $countLike['likes']; ?></p>
                        <p class="likesFeed">Likes</p>
                    <?php endforeach; ?>
                </div>

                <div class="description">
                    <a class="" href="/profileuser.php?user_id=<?= $user['user_id']?>">
                    <p class="userFeed"><?php echo $user['username']; ?></p></a>
                    <p class="descriptionFeed"><?php echo $postImg['description']; ?></p>
                </div>

                <?php foreach ($comments as $comment): ?>
                    <div class="comments">
                        <p class="commentUserFeed"><?php echo $comment['username']; ?></p>
                        <p class="commentFeed"><?php echo $comment['content']; ?></p>
                    </div>
                <?php endforeach; ?>

                <!-- <div class="addComment"> -->
                    <form class="addComment" action="app/posts/comments-posts.php?post_id=<?php echo $postId?>" method="post">
                        <div class="formCommentFeed">

                            <input class="inputFeed" type="text" name="comment" placeholder="Comment..." required>
                        </div>
                        <button class="buttonComment" type="submit">Submit</button>
                    </form>
                <!-- </div> -->

                <div class="uploadedTime">
                    <p class="uploadedFeed"><?php echo $ago; ?></p>
                </div>

             </div>

        </div>

    </div>
    <script type="text/javascript" src="assets/script/posts.js"></script>

    <?php else: redirect('/login.php'); ?>

<?php endif; ?>

<?php require __DIR__.'/views/footer.php'; ?>
