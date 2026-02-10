<?php
include('connection.php');

$game_name = $_POST['game_name'];
$studio_name = $_POST['studio'];
$release_date = $_POST['release_date'];

// Get studio_id from studio_name
$studioQuery = "SELECT studio_id FROM studios WHERE studio_name='".$studio_name."'";
$studioResult = mysqli_query($db, $studioQuery) or die('Error in Database: '.mysqli_error($db));
$studioRow = mysqli_fetch_assoc($studioResult);
$studio_id = $studioRow['studio_id'];

$query = "INSERT INTO games (games_id, game_name, studio_id, release_date)
        VALUES (NULL,'".$game_name."','".$studio_id."','".$release_date."')";
mysqli_query($db,$query) or die ('Error in Database: '.mysqli_error($db));

header('Location: index.php');
exit;
?>
