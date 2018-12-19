<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

// Code for updating first name, last name, username and bio
if (isset($_SESSION['logedin'], $_POST['first_name'], $_POST['last_name'], $_POST['username'], $_POST['description'])) {

    $first_name = trim(filter_var($_POST['first_name'], FILTER_SANITIZE_STRING));
    $last_name = trim(filter_var($_POST['last_name'], FILTER_SANITIZE_STRING));
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $description = trim(filter_var($_POST['description'], FILTER_SANITIZE_STRING));
    $updated_at = date("y-m-d, H:i:s");
    $id = (int)$_SESSION['logedin']['id'];

    $statement = $pdo->prepare('UPDATE users SET first_name = :first_name, last_name = :last_name,
        username = :username, description = :description, updated_at = :updated_at WHERE id = :id');

    if (!$statement)
    {
        die(var_dump($pdo->errorInfo()));
    }

    // binds variables to parameteres for insert statement
    $statement->bindParam(':first_name', $first_name, PDO::PARAM_STR);
    $statement->bindParam(':last_name', $last_name, PDO::PARAM_STR);
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    $statement->execute();

}

// Code for updating email and password
if (isset($_SESSION['logedin'], $_POST['email'], $_POST['password'], $_POST['confirm_password'])) {

    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $confirm_password = password_hash($_POST['confirm_password'], PASSWORD_DEFAULT);
    $updated_at = date("y-m-d, H:i:s");
    $id = (int)$_SESSION['logedin']['id'];

    $statement = $pdo->prepare('UPDATE users SET email = :email, password = :password, updated_at = :updated_at WHERE id = :id');

    if (!$statement)
    {
        die(var_dump($pdo->errorInfo()));
    }

    // binds variables to parameteres for insert statement
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $confirm_password, PDO::PARAM_STR);
    $statement->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    $statement->execute();
}
