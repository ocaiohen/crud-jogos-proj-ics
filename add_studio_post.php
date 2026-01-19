<?php
include('connection.php');

$studio_name = $_POST['studio_name'];

$query = "INSERT INTO studios (studio_id, studio_name) VALUES (NULL,'".$studio_name."')";
mysqli_query($db, $query) or die('Error in Database: '.mysqli_error($db));
?>
<script type="text/javascript">
	alert("Studio added successfully.");
	window.location = "index.php";
</script>
