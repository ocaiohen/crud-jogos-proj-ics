<?php
include('connection.php');

$studio_id = $_POST['studio_id'];
$studio_name = $_POST['studio_name'];

$query = 'UPDATE studios SET studio_name ="'.$studio_name.'" WHERE studio_id ='.$studio_id.';';
mysqli_query($db, $query) or die(mysqli_error($db));

header('Location: ' . FRONTEND_BASE_URL . '/index.php');
exit;
?>
