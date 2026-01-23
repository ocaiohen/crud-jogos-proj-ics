<?php
include('connection.php');

$game_name = $_POST['game_name'];
$studio = $_POST['studio'];
$release_date = $_POST['release_date'];
$comment = $_POST['comment'];
$rating = $_POST['rating'];

$query = "INSERT INTO games
        (games_id, game_name, studio, release_date, comment, rating)
        VALUES (NULL,'".$game_name."','".$studio."','".$release_date."','".$comment."','$rating')";
mysqli_query($db,$query) or die ('Error in Database: '.mysqli_error($db));

header('Location: ' . FRONTEND_BASE_URL . '/index.php');
exit;
?>
