<?php

declare(strict_types=1);

require __DIR__.'/../autoload.php';

/** PSUEDO KOD
 *
 *  If the form has been sent
 *      check the database for a like from the user
 *          if no row was found
 *              insert like row
 *          if row was found (else)
 *              delete like row
 *      Retrieve the updated like count from database
 *          Send the updated like count to user
 *
 */

// If the form has been sent
if(!isset($_SESSION['logedin'], $_POST['post_id'])){
    die();
}

$userId = $_SESSION['logedin']['id'];
$postId = filter_var($_POST['post_id'], FILTER_SANITIZE_NUMBER_INT);

$data['inputs'] = $_POST;

// Check the database for a like from the user
$query = 'SELECT * FROM likes WHERE user_id = :user_id AND post_id = :post_id';
$statement = $pdo->prepare($query);

$statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
$statement->bindParam(':post_id', $postId, PDO::PARAM_INT);

$statement->execute();

$result = $statement->fetch(PDO::FETCH_ASSOC);
$data['debug'] = $result;

// if no row was found
if(!$result){
    // insert like row
    $statement = $pdo->prepare('INSERT INTO likes (user_id, post_id) VALUES (:user_id, :post_id);');
    $data['action'] = 'liked';
}else{
    // delete like row
    $statement = $pdo->query('DELETE FROM likes WHERE post_id = :post_id AND user_id = :user_id;');
    $data['action'] = 'disliked';
}

// Execute statement
$statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
$statement->bindParam(':post_id', $postId, PDO::PARAM_INT);
$statement->execute();

// Get updated like count from database
$query = 'SELECT COUNT(*) AS likes FROM likes WHERE post_id = :post_id';
$statement = $pdo->prepare($query);
$statement->bindParam(':post_id', $postId, PDO::PARAM_INT);

$statement->execute();

$result = $statement->fetch(PDO::FETCH_ASSOC);

$data['likeCount'] = $result['likes'];

// Send the updated data to user
header('Content-Type: application/json');
echo json_encode($data);
die();
