<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>

	<body>
		<?php
		$id = $_POST['id'];
		$game_name = $_POST['game_name'];
		$studio = $_POST['studio'];
		$release_date = $_POST['release_date'];
		$comment = $_POST['comment'];
		$rating = $_POST['rating'];
		
		include('connection.php');
		
		$query = 'UPDATE games SET game_name ="'.$game_name.'",
				studio ="'.$studio.'", release_date="'.$release_date.'",
				comment="'.$comment.'", rating='.$rating.' WHERE games_id='.$id.';
			';
		mysqli_query($db, $query) or die(mysqli_error($db));
		?>
		<script type="text/javascript">
			alert("Game updated successfully.");
			window.location = "index.php";
		</script>
	</body>
</html>
