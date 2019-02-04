<?php

declare(strict_types=1);

require __DIR__.'/views/header.php';


$userId = filter_var($_GET['user_id'], FILTER_SANITIZE_STRING);
// Posts
$statement = $pdo->prepare(
    "SELECT p.id as post_id, p.content, p.description, p.created_at, p.updated_at,
    u.username, u.biography, u.id as user_id, u.profile_picture
    FROM posts p INNER JOIN users u WHERE u.id = p.user_id AND u.id = :user_id"
    );

    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);

    $statement->execute();
    // Saving database in variable
    $posts = $statement->fetchAll(PDO::FETCH_ASSOC);
    $posts = array_reverse($posts);
    // die(var_dump($posts));
?>


<?php if (isset($_SESSION['logedin'])): ?>
    <div class="profile">

        <div class="userProfile">
            <img class="profilepictureProfile" src="/app/images/<?php echo $_SESSION['logedin']['profile_picture']; ?>" alt="BILD">
            <h2 class="usernameProfile"><?php echo $_SESSION['logedin']['username']; ?></h2>
            <h4 class="bioProfile"><?php echo $_SESSION['logedin']['biography']; ?></h4>
        </div>

        <div class="feeedProfile">
            <?php foreach ($posts as $post): ?>
                <?php
                    $postId = $post['post_id'];
                ?>
            <div class="photoDiv">
                <a href="/comments.php?post_id=<?= $postId?>">
                    <img class="photoProfile" src="/app/images/<?php echo $post['content']; ?>" alt="Image">
                </a>
            </div>
            <?php endforeach; ?>
        </div>

    </div>
    <script type="text/javascript" src="assets/script/posts.js"></script>
    <script type="text/javascript" src="assets/script/upload.js"></script>

<?php else: redirect('/login.php'); ?>

<?php endif; ?>

<?php require __DIR__.'/views/footer.php'; ?>
