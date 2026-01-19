<?php
include('connection.php');
include('header.php');
?>
<body>
	<h1 class="page-header">Add Studio</h1>
	<h2>New Studio</h2>
	<br/>
	<form method="post" action="add_studio_post.php">
		<input placeholder="Studio Name" name="studio_name" required><br/><br/>
		<button type="submit" class="btn btn-success">Save Studio</button>&nbsp;
		<button type="reset" class="btn btn-warning">Clear Entry</button>&nbsp;
		<a class="btn btn-info" href="index.php">Return</a>
	</form>
</body>

</html>
