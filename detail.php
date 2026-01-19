<?php
       include('connection.php');
       include('header.php');
?>  
<body>

	<h1 class="page-header">
		Game Details <small>View Game Information</small>
	</h1>

	<?php 
	$query = 'SELECT * FROM games WHERE games_id ='.$_GET['id'];
	$result = mysqli_query($db, $query) or die(mysqli_error($db));
	
	while($row = mysqli_fetch_array($result)) {

		$id = $row['games_id'];
                $game_name = $row['game_name'];
                $studio = $row['studio'];
                $release_date = $row['release_date'];
                $comment = $row['comment'];
                $rating = $row['rating'];
                // Display game details
                echo "<p>Game: $game_name</p>";
                echo "<p>Studio: $studio</p>";
                echo "<p>Release Date: $release_date</p>";
                echo "<p>Comment: $comment</p>";
                echo "<p>Rating: $rating</p>";
	}
?>
</body>
</html>

