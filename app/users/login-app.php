<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// In this file we login users.
if (isset($_POST['email'], $_POST['password'])) {
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $password = $_POST['password'];

    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);


    if (!$statement) {
        die(var_dump($pdo->errorInfo()));
    }

    if (!$user) {
        redirect('/login.php');
    }

    if (password_verify($password, $user['password'])) {
        $_SESSION['logedin'] = [
            'id' => $user['id'],
            'first_name' => $user['first_name'],
            'last_name' => $user['last_name'],
            'email' => $email['email'],
            'username' => $user['username'],
            'profile_picture' => $user['profile_picture'],
            'description' => $user['description'],
            'created_at' => $user['created_at']
        ];

        redirect('/index.php');
    }

    else {
        redirect('/login.php');
    }
}
