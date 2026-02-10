<?php
include('connection.php');

$game_name = $_POST['game_name'];
$studio_id = $_POST['studio_id'];
$release_date = $_POST['release_date'];

$query = "INSERT INTO games (games_id, game_name, studio_id, release_date)
        VALUES (NULL,'".$game_name."','".$studio_id."','".$release_date."')";
mysqli_query($db,$query) or die ('Error in Database: '.mysqli_error($db));

header('Location: index.php');
exit;
?>
