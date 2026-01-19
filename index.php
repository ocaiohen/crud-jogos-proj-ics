<?php
       include('header.php');
       include('connection.php');
?>
<body>

	<h1 class="page-header">
		Game CRUD With MySQLi Datatable
	</h1>
	
	<h2>List of Games</h2>
	<br/>
	<a href="add.php">Add New Game (CREATE)</a>
	<br/><br/>
	<table border="1"> 
		<thead>
			<tr>
				<th>Game Name</th>
				<th>Studio</th>
				<th>Release Date</th>
				<th>Comment</th>
				<th>Rating</th>
				<th>Actions</th>
			</tr>
			</thead>
			<tbody>
				<?php
				$query = 'SELECT * FROM games';
				$result = mysqli_query($db, $query);
				while($row = mysqli_fetch_array($result)) {
					$game_id = $row['games_id'];
					$game_name = $row['game_name'];
					$studio = $row['studio'];
					$release_date = $row['release_date'];
					$comment = $row['comment'];
					$rating = $row['rating'];
					echo "<tr>";
					echo "<td>$game_name</td>";
					echo "<td>$studio</td>";
					echo "<td>$release_date</td>";
					echo "<td>$comment</td>";
					echo "<td>$rating</td>";
					echo "<td><a href='detail.php?id=$game_id'>View</a> | <a href='edit.php?id=$game_id'>Edit</a> | <a href='remove.php?id=$game_id'>Remove</a></td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>

	<br/><br/>
	<h2>Studios</h2>
	<br/>
	<a href="add_studio.php">Add New Studio</a>
	<br/><br/>
	<table border="1">
		<thead>
			<tr>
				<th>Studio Name</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$studioQuery = 'SELECT * FROM studios ORDER BY studio_name';
			$studioResult = mysqli_query($db, $studioQuery);
			while($studioRow = mysqli_fetch_array($studioResult)) {
				$studioId = $studioRow['studio_id'];
				$studioName = $studioRow['studio_name'];
				echo "<tr>";
				echo "<td>$studioName</td>";
				echo "<td><a href='edit_studio.php?id=$studioId'>Edit</a> | <a href='remove_studio.php?id=$studioId'>Remove</a></td>";
				echo "</tr>";
			}
			?>
		</tbody>
	</table>
</body>

</html>
