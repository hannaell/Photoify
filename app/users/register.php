<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// Kollar om allt är ifyllt
if (isset($_POST['firstName'], $_POST['lastName'],$_POST['email'], $_POST['userName'], $_POST['password'], $_POST['confirmPassword'])) {
    if ($_POST['password'] === $_POST['confirmPassword']) {
        // Checks if passwords match
        $firstName = trim(filter_var($_POST['firstName'], FILTER_SANITIZE_STRING));
        $lastName = trim(filter_var($_POST['lastName'], FILTER_SANITIZE_STRING));
        $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
        $userName = trim(filter_var($_POST['userName'], FILTER_SANITIZE_STRING));
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $created_at = ('Y-m-d');

        $statement = $pdo->prepare('INSERT INTO users(first_name, last_name, user_name, email, password, created_at)
        VALUES (:firstName, :lastName, :userName, :email, :password, :created_at)');

        // $statement = $pdo->prepare('INSERT INTO users(first_name, last_name, email, user_name, password, created_at)
        // VALUES (:firstName, :lastName, :email, :userName, :password, :created_at)');

        if (!$statement)
        {
            die(var_dump($pdo->errorInfo()));
        }

        // binds variables to parameteres for insert statement
        $statement->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $statement->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $statement->bindParam(':userName', $userName, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':password', $password, PDO::PARAM_STR);
        $statement->bindParam(':created_at', $created_at, PDO::PARAM_STR);

        $statement->execute();
    }
}
