<?php
include('connection.php');

$query = 'DELETE FROM studios WHERE studio_id = '.$_GET['id'];
mysqli_query($db, $query) or die(mysqli_error($db));
?>
<script type="text/javascript">
	alert("Studio deleted successfully.");
	window.location = "index.php";
</script>
