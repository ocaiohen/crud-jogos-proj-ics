<?php
include('connection.php');

$studio_name = $_POST['studio_name'];

$query = "INSERT INTO studios (studio_id, studio_name) VALUES (NULL,'".$studio_name."')";
mysqli_query($db, $query) or die('Error in Database: '.mysqli_error($db));

header('Location: ' . FRONTEND_BASE_URL . '/index.php');
exit;
?>
