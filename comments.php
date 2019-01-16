<?php

declare(strict_types=1);

require __DIR__.'/views/header.php';

?>

<?php if (isset($_SESSION['logedin'])): ?>

    <?php
    $id = (int)$_SESSION['logedin']['id'];
    $postId = filter_var($_GET['post_id'], FILTER_SANITIZE_STRING);;

    $statement = $pdo->prepare(
        'SELECT p.id as post_id, p.content, p.description, p.created_at, p.updated_at,
        u.username, u.id as user_id, u.profile_picture
        FROM posts p INNER JOIN users u WHERE u.id = p.user_id AND p.id = :post_id'
    );
    $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    //Get post
    $statement = $pdo->prepare(
        'SELECT content, description, created_at, updated_at, user_id
        FROM posts WHERE id = :id'
    );
    if(!$statement){
        die(var_dump($pdo->errorInfo()));
    }
    $statement->bindParam(':id', $postId, PDO::PARAM_STR);
    $statement->execute();
    $postImg = $statement->fetch(PDO::FETCH_ASSOC);

    if (isset($_POST['comment'], $_GET['post_id'])) {
        $comment = trim(filter_var($_POST['comment'], FILTER_SANITIZE_STRING));
        $created_at = date("y-m-d, H:i:s");

        $statement = $pdo->prepare(
            'INSERT INTO comments (content, created_at, user_id, post_id)
            VALUES (:content, :created_at, :id, :post_id)'
        );
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
    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
    $statement->execute();
    $liked = $statement->fetch(PDO::FETCH_ASSOC);




    $countLikes = countLikes($postId, $pdo);
    $ago = getTime(time()-strtotime($user['created_at']));

    ?>


        <div class="postComments">
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

                    <div class="likesComments">
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

                    <div class="commenstDiv">
                        <?php foreach ($comments as $comment): ?>
                            <div class="comments">
                                <a class="" href="/profileuser.php?user_id=<?= $comment['user_id']?>">
                                <p class="commentUserFeed"><?php echo $comment['username']; ?></p></a>
                                <p class="commentFeed"><?php echo $comment['content']; ?></p>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <form class="addComment" action="/comments.php?post_id=<?php echo $postId?>" method="post">
                        <div class="formComment">
                            <input class="inputComments" type="text" name="comment" placeholder="Comment..." required>
                            <button class="buttonComment" type="submit">Submit</button>
                        </div>
                    </form>

                    <div class="uploadedTime">
                        <p class="uploadedFeed"><?php echo $ago; ?></p>
                    </div>

                 </div>

            </div>

        </div>

    </div>
    <script type="text/javascript" src="assets/script/posts.js"></script>

    <?php else: redirect('/login.php'); ?>

<?php endif; ?>

<?php require __DIR__.'/views/footer.php'; ?>
