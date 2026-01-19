<?php
include('connection.php');
include('header.php');

$query = 'SELECT * FROM studios WHERE studio_id ='.$_GET['id'];
$result = mysqli_query($db, $query) or die(mysqli_error($db));
$studio = mysqli_fetch_assoc($result);
?>
<body>
	<h1 class="page-header">Edit Studio</h1>
	<h2>Update Studio</h2>
	<br/>
	<form method="post" action="edit_studio_post.php">
		<input type="hidden" name="studio_id" value="<?php echo $studio['studio_id']; ?>" />
		<input placeholder="Studio Name" name="studio_name" value="<?php echo htmlspecialchars($studio['studio_name']); ?>" required><br/><br/>
		<button type="submit">Update Studio</button>
		<a href="index.php">Return</a>
	</form>
</body>

</html>
