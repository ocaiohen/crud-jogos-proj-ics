<?php
include('connection.php');
include('header.php');

$gameQuery = 'SELECT * FROM games WHERE games_id ='.$_GET['id'];
$gameResult = mysqli_query($db, $gameQuery) or die(mysqli_error($db));
$game = mysqli_fetch_assoc($gameResult);

$studios = mysqli_query($db, 'SELECT studio_name FROM studios ORDER BY studio_name') or die(mysqli_error($db));
?>
<body>

	<h1 class="page-header">
		Edit Game
	</h1>

	<h2>Update Game</h2>

	<form method="post" action="edit_post.php">
	    	<input type="hidden" name="id" value="<?php echo $game['games_id']; ?>" />
		<input placeholder="Game Name" name="game_name" value="<?php echo htmlspecialchars($game['game_name']); ?>" required><br/><br/>
		<label>Studio:</label><br/>
		<input list="studio-list" placeholder="Studio" name="studio" value="<?php echo htmlspecialchars($game['studio']); ?>" required>
		<datalist id="studio-list">
			<?php while ($studioRow = mysqli_fetch_assoc($studios)) { ?>
				<option value="<?php echo htmlspecialchars($studioRow['studio_name']); ?>"></option>
			<?php } ?>
		</datalist>
		<br/><br/>
		<label>Release Date:</label><br/>
		<input type="date" name="release_date" value="<?php echo $game['release_date']; ?>" required><br/><br/>
		<label>Rating (0-10):</label><br/>
		<input type="number" name="rating" min="0" max="10" step="0.1" value="<?php echo $game['rating']; ?>" required><br/><br/>
		<label>Comment:</label><br/>
		<textarea name="comment"><?php echo htmlspecialchars($game['comment']); ?></textarea>
		<button type="submit">Update Game</button>
		<a href="index.php">Return</a>

	</form>
</body>

</html>
	</form>  

