<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// Kollar om allt är ifyllt
if (isset($_POST['first_name'], $_POST['last_name'],$_POST['email'], $_POST['username'], $_POST['password'], $_POST['confirm_password'])) {
    // Checks if passwords match
    if ($_POST['password'] === $_POST['confirm_password']) {
        $first_name = trim(filter_var($_POST['first_name'], FILTER_SANITIZE_STRING));
        $last_name = trim(filter_var($_POST['last_name'], FILTER_SANITIZE_STRING));
        $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $created_at = date("y-m-d, H:i:s");
        $profilePicture = 'user.png';

        $statement = $pdo->prepare('INSERT INTO users(first_name, last_name, username, email, password, created_at, profile_picture)
        VALUES (:first_name, :last_name, :username, :email, :password, :created_at, :profile_picture)');

        if (!$statement) {
            die(var_dump($pdo->errorInfo()));
        }

        // binds variables to parameteres for insert statement
        $statement->bindParam(':first_name', $first_name, PDO::PARAM_STR);
        $statement->bindParam(':last_name', $last_name, PDO::PARAM_STR);
        $statement->bindParam(':username', $username, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        $statement->bindParam(':created_at', $created_at, PDO::PARAM_STR);
        $statement->bindParam(':profile_picture', $profilePicture, PDO::PARAM_STR);

        $statement->execute();

        redirect('/feed.php');
    }
}
