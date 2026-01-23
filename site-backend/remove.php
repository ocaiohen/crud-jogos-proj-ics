<?php
include('connection.php');

$query = 'DELETE FROM games WHERE games_id = '.$_GET['id'];
mysqli_query($db, $query) or die(mysqli_error($db));

header('Location: ' . FRONTEND_BASE_URL . '/index.php');
exit;
?>
