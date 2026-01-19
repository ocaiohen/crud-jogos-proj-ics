<?php
include('connection.php');
include('header.php');

$studios = mysqli_query($db, 'SELECT studio_name FROM studios ORDER BY studio_name') or die(mysqli_error($db));
?>
<body>
	<h1 class="page-header">
		Add Game
	</h1>

	<h2>New Game</h2>
	<br/>
	<form method="post" action="add_post.php">
		<input placeholder="Game Name" name="game_name" required><br/><br/>
		<label>Studio:</label><br/>
		<input list="studio-list" placeholder="Studio" name="studio" required>
		<datalist id="studio-list">
			<?php while ($studioRow = mysqli_fetch_assoc($studios)) { ?>
				<option value="<?php echo htmlspecialchars($studioRow['studio_name']); ?>"></option>
			<?php } ?>
		</datalist>
		<br/><br/>
		<label>Release Date:</label><br/>
		<input type="date" name="release_date" required><br/><br/>
		<label>Rating (0-10):</label><br/>
		<input type="number" name="rating" min="0" max="10" step="0.1" required><br/><br/>
		<label>Comment:</label><br/>
		<textarea name="comment"></textarea>
		<br/><br/>
		<button type="submit" class="btn btn-success">Save Game</button>&nbsp;
		<button type="reset" class="btn btn-warning">Clear Entry</button>&nbsp;
		<a class="btn btn-info" href="index.php">Return</a>

	</form>
</body>

</html>

