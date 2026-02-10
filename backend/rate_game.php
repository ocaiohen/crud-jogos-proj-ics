<?php
include('connection.php');

$id = $_POST['id'];
$comment = $_POST['comment'];
$rating = $_POST['rating'];

$query = 'UPDATE games SET comment="'.$comment.'", rating='.$rating.' WHERE games_id='.$id;
mysqli_query($db, $query) or die(mysqli_error($db));

header('Location: ' . FRONTEND_BASE_URL . '/detail.php?id='.$id);
exit;
?>
