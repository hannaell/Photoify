<?php

declare(strict_types=1);

require __DIR__.'/views/header.php';

// Posts
$statement = $pdo->prepare(
    "SELECT p.id as post_id, p.content, p.description, p.created_at, p.updated_at,
    u.username, u.id as user_id, u.profile_picture
    FROM posts p INNER JOIN users u WHERE u.id = p.user_id"
    );

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->execute();
    // Saving database in variable
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    $posts = array_reverse($posts);

?>

<?php if (isset($_SESSION['logedin'])): ?>
    <div class="postsFeed">

        <?php foreach ($posts as $post): ?>
            <?php
            $postId = $post['post_id'];
            $userId = $_SESSION['logedin']['id'];
            $ago = getTime(time()-strtotime($post['created_at']));

            // Comments
            $statement = $pdo->prepare(
                "SELECT c.id as comment_id, c.content, c.created_at, u.username, u.profile_picture, u.id as user_id
                FROM comments c INNER JOIN users u WHERE u.id = c.user_id AND c.post_id = :post_id"
            );

            if (!$statement) {
                die(var_dump($pdo->errorInfo()));
            }

            $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);

            $statement->execute();
            // Saving database in variable
            $comments = $statement->fetchAll(PDO::FETCH_ASSOC);
            // die(var_dump($comments));

            $uploaded = time()-strtotime($post['created_at']);
            $uploaded = date('d', $uploaded);


            // Determine if user already liked the posts
            $statement = $pdo->prepare(
                "SELECT * FROM likes WHERE user_id = :user_id AND post_id = :post_id;"
            );

            if (!$statement) {
                die(var_dump($pdo->errorInfo()));
            }
            $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
            $statement->bindParam(':post_id', $postId, PDO::PARAM_INT);

            $statement->execute();

            $liked = $statement->fetch(PDO::FETCH_ASSOC);

            $countLikes = countLikes($postId, $pdo);
            $countComments = countComments($postId, $pdo);

            ?>

            <div class="post" data-id="<?php echo $postId; ?>">

                <div class="card">

                    <div class="account">
                        <img class="profilePictureFeed" src="/app/images/<?php echo $post['profile_picture']; ?>" alt="Profile Picture">
                        <a href="/profileuser.php?user_id=<?= $post['user_id']?>">
                        <p class="userFeed"><?php echo $post['username']; ?></p></a>
                        <?php if ($post['user_id'] === $_SESSION['logedin']['id']): ?>
                                <div class="dropdown">
                                    <button class="dropbtn">
                                        <span class="settingsIconFeed">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </span>
                                    </button>
                                    <div class="dropdown-content" id="myDropdown">
                                        <a class="" href="/editposts.php?post_id=<?= $postId?>">Edit post</a>

                                        <form action="/editposts.php?post_id=<?= $postId?>" method="post" enctype="multipart/form-data">
                                            <div>
                                                <button class="buttonDeleteposts" type="submit" name="delete">Delete post</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                        <?php endif; ?>
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
                                <button class="hart" type="submit">
                                    <?php if ($liked): ?>
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
                            <a class="" href="/comments.php?post_id=<?= $postId?>">
                                <span class="commentIcon">
                                    <i class="far fa-comment"></i></a>
                                </span>
                            </a>

                        </div>

                        <div class="numberOfLikes">
                            <?php foreach ($countLikes as $countLike): ?>
                                <div class="numberLikes">
                                    <p class="likeCounterFeed"><?php echo $countLike['likes']; ?></p>
                                    <p class="likesFeed">Likes</p>
                                </div>
                            <?php endforeach; ?>

                            <?php foreach ($countComments as $countComment): ?>
                                <div class="numberComments">
                                    <a class="" href="/comments.php?post_id=<?= $postId?>">
                                        <p class="likeCounterFeed"><?php echo $countComment['comments']; ?></p>
                                    </a>
                                    <a class="" href="/comments.php?post_id=<?= $postId?>">
                                        <p class="likesFeed">Comments</p>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <div class="description">
                            <a class="" href="/profileuser.php?user_id=<?= $post['user_id']?>">
                            <p class="userFeed"><?php echo $post['username']; ?></p></a>
                            <p class="descriptionFeed"><?php echo $post['description']; ?></p>
                        </div>

                        <div class="uploadedTime">
                            <p class="uploadedFeed"><?php echo $ago; ?></p>
                        </div>

                     </div>

                </div>

            </div>


        <?php endforeach; ?>
    </div>
    <script type="text/javascript" src="assets/script/posts.js">

    </script>

    <?php else: redirect('/login.php'); ?>

<?php endif; ?>

<?php require __DIR__.'/views/footer.php'; ?>
