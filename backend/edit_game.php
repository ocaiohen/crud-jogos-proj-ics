<?php
include('connection.php');

$id = $_POST['id'];
$game_name = $_POST['game_name'];
$studio_id = $_POST['studio_id'];
$release_date = $_POST['release_date'];

$query = 'UPDATE games SET game_name ="'.$game_name.'",
        studio_id ="'.$studio_id.'", release_date="'.$release_date.'" WHERE games_id='.$id.';
    ';
mysqli_query($db, $query) or die(mysqli_error($db));

header('Location: index.php');
exit;
?>
