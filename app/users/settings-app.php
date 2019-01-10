<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';


// Code for upload profile picture
if (isset($_SESSION['logedin'], $_FILES['img'])) {
    $profilePicture = $_FILES['img'];
    $updated_at = date("y-m-d, H:i:s");
    $id = (int)$_SESSION['logedin']['id'];
    $imgName = $id.'_'.$updated_at.$profilePicture['name'];

    $user = getUserByID($id, $pdo);

    $statement = $pdo->prepare('UPDATE users SET profile_picture = :profile_picture, updated_at = :updated_at WHERE id = :id');

        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        // binds variables to parameteres for insert statement
        $statement->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
        $statement->bindParam(':profile_picture', $imgName, PDO::PARAM_STR);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        $statement->execute();

        if (!is_dir(__DIR__."/../images/")) {
            mkdir(__DIR__."/../images/");
        }

        $path = __DIR__."/../images/";
        $getImg = $profilePicture['tmp_name'];
        $uploadImg = $path.$imgName;

        move_uploaded_file($getImg, $uploadImg);

        $_SESSION['logedin']['profile_picture'] = $imgName;

        redirect('/settings.php');

}


// Code for updating first name, last name, username and bio
if (isset($_SESSION['logedin'], $_POST['first_name'], $_POST['last_name'], $_POST['username'], $_POST['biography'])) {

    $first_name = trim(filter_var($_POST['first_name'], FILTER_SANITIZE_STRING));
    $last_name = trim(filter_var($_POST['last_name'], FILTER_SANITIZE_STRING));
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $biography = trim(filter_var($_POST['biography'], FILTER_SANITIZE_STRING));
    $updated_at = date("y-m-d, H:i:s");
    $id = (int)$_SESSION['logedin']['id'];

    $user = getUserByID($id, $pdo);



        $statement = $pdo->prepare('UPDATE users SET first_name = :first_name, last_name = :last_name,
            username = :username, biography = :biography, updated_at = :updated_at WHERE id = :id');

            if (!$statement)
            {
                die(var_dump($pdo->errorInfo()));
            }

            // binds variables to parameteres for insert statement
            $statement->bindParam(':first_name', $first_name, PDO::PARAM_STR);
            $statement->bindParam(':last_name', $last_name, PDO::PARAM_STR);
            $statement->bindParam(':username', $username, PDO::PARAM_STR);
            $statement->bindParam(':biography', $biography, PDO::PARAM_STR);
            $statement->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);

            $statement->execute();

            $_SESSION['logedin'] = getUserByID($id, $pdo);


    redirect('/settings.php');
}

// Code for updating email
if (isset($_SESSION['logedin'], $_POST['email'], $_POST['password'])) {

    $id = (int)$_SESSION['logedin']['id'];
    $user = getUserByID($id, $pdo);
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));

    if (password_verify($_POST['password'], $user['password'])) {
        $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');

        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->bindParam(':email', $email, PDO::PARAM_STR);

        $statement->execute();

        $checkForEmail = $statement->fetch(PDO::FETCH_ASSOC);

        if ($checkForEmail) {
            echo "Email alredy exicts";
        }
        else {
            // die(var_dump('blah'));
            $updated_at = date("y-m-d, H:i:s");
            $id = (int)$_SESSION['logedin']['id'];

            $statement = $pdo->prepare('UPDATE users SET email = :email WHERE id = :id');

            if (!$statement)
            {
                die(var_dump($pdo->errorInfo()));
            }

            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);

            $statement->execute();

            $_SESSION['logedin']['email'] = $email;
        }
    }
    redirect('/settings.php');
}

// Code for updating password
if (isset($_SESSION['logedin'], $_POST['password'], $_POST['new_password'], $_POST['confirm_password'])) {

    if ($_POST['new_password'] === $_POST['confirm_password']) {

        $id = (int)$_SESSION['logedin']['id'];
        $user = getUserByID($id, $pdo);
        $updated_at = date("y-m-d, H:i:s");
        $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

        if (password_verify($_POST['password'], $user['password'])) {

            $statement = $pdo->prepare('UPDATE users SET password = :password, updated_at = :updated_at WHERE id = :id');


            if (!$statement)
            {
                die(var_dump($pdo->errorInfo()));
            }

            $statement->bindParam(':password', $new_password, PDO::PARAM_STR);
            $statement->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);

            $statement->execute();

            $_SESSION['logedin']['password'] = $new_password;

        }
    }
    redirect('/settings.php');
}

// Code for delete account
if (isset($_SESSION['logedin'], $_POST['password'])) {
    $id = (int)$_SESSION['logedin']['id'];
    $user = getUserByID($id, $pdo);

    if (password_verify($_POST['password'], $user['password'])) {

        // Delete profile picture
        if ($_SESSION['logedin']['profile_picture']) {
            $path = __DIR__."/../images/";
            unlink($path.$_SESSION['logedin']['profile_picture']);
        }

        // Delete post images
        $statement = $pdo->prepare('SELECT content FROM posts WHERE user_id = :user_id');

        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
        $statement->execute();

        $posts = $statement->fetchAll(PDO::FETCH_ASSOC);

        $path = __DIR__."/../images/";
        foreach ($posts as $post) {
            unlink($path.$post['content']);
        }


        // Delete account
        $statement = $pdo->prepare('DELETE FROM users WHERE id = :user_id');

        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
        $statement->execute();

        // Delete posts
        $statement = $pdo->prepare('DELETE FROM posts WHERE user_id = :user_id');

        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
        $statement->execute();

        // Delete comments
        $statement = $pdo->prepare('DELETE FROM comments WHERE user_id = :user_id');

        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
        $statement->execute();

        // Delete likes
        $statement = $pdo->prepare('DELETE FROM likes WHERE user_id = :user_id');

        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
        $statement->execute();

        // Delete follower
        $statement = $pdo->prepare('DELETE FROM followers WHERE user_id = :user_id');

        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
        $statement->execute();



    }
    session_destroy();
    redirect('/login.php');
}
