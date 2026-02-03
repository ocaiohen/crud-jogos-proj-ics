<?php
include('connection.php');

$id = $_POST['id'];
$game_name = $_POST['game_name'];
$studio_name = $_POST['studio'];
$release_date = $_POST['release_date'];
$comment = $_POST['comment'];
$rating = $_POST['rating'];

// Get studio_id from studio_name
$studioQuery = "SELECT studio_id FROM studios WHERE studio_name='".$studio_name."'";
$studioResult = mysqli_query($db, $studioQuery) or die('Error in Database: '.mysqli_error($db));
$studioRow = mysqli_fetch_assoc($studioResult);
$studio_id = $studioRow['studio_id'];

$query = 'UPDATE games SET game_name ="'.$game_name.'",
        studio_id ="'.$studio_id.'", release_date="'.$release_date.'",
        comment="'.$comment.'", rating='.$rating.' WHERE games_id='.$id.';
    ';
mysqli_query($db, $query) or die(mysqli_error($db));

header('Location: ' . FRONTEND_BASE_URL . '/index.php');
exit;
?>
