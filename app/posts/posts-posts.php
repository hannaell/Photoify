<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';


// Code for uploading pictures
if (isset($_SESSION['logedin'], $_FILES['img'])) {
    $postPicture = $_FILES['img'];
    $created_at = date("y-m-d, H:i:s");
    $id = (int)$_SESSION['logedin']['id'];
    $imgName = $id.'_'.$created_at.$postPicture['name'];


    $user = getUserByID($id, $pdo);

    $statement = $pdo->prepare('INSERT INTO posts (content, description, created_at, user_id)
    VALUES (:content, :description, :created_at, :id)');


    if (!$statement)
    {
        die(var_dump($pdo->errorInfo()));
    }

    $statement->bindParam(':created_at', $created_at, PDO::PARAM_STR);
    $statement->bindParam(':content', $imgName, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    $statement->execute();

    if (!is_dir(__DIR__."/../images/")) {
        mkdir(__DIR__."/../images/");
    }

    $path = __DIR__."/../images/";
    $getImg = $postPicture['tmp_name'];
    $uploadImg = $path.$imgName;

    move_uploaded_file($getImg, $uploadImg);

    $_SESSION['logedin']['content'] = $imgName;

    redirect('/index.php');
}
