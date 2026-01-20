<?php
include('connection.php');

$id = $_POST['id'];
$game_name = $_POST['game_name'];
$studio = $_POST['studio'];
$release_date = $_POST['release_date'];
$comment = $_POST['comment'];
$rating = $_POST['rating'];

$query = 'UPDATE games SET game_name ="'.$game_name.'",
        studio ="'.$studio.'", release_date="'.$release_date.'",
        comment="'.$comment.'", rating='.$rating.' WHERE games_id='.$id.';
    ';
mysqli_query($db, $query) or die(mysqli_error($db));

header('Location: ' . FRONTEND_BASE_URL . '/index.php');
exit;
?>
