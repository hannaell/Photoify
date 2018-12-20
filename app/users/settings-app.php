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

    $user = getUserByID($id, $pdo);

    if(password_verify($_POST['password'], $user['password'])) {

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

            $_SESSION['logedin'] = getUserByID($id, $pdo);

    }
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
}
