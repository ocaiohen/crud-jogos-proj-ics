<?php
include('../backend/connection.php');
include('header.php');
?>  
<body class="bg-light">
    <div class="container py-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h1 class="h4 mb-0">Game Details <small class="text-muted">View Game Information</small></h1>
            </div>
            <div class="card-body">
                <?php 
                $query = 'SELECT g.*, s.studio_name FROM games g JOIN studios s ON g.studio_id = s.studio_id WHERE g.games_id ='.$_GET['id'];
                $result = mysqli_query($db, $query) or die(mysqli_error($db));
                
                while($row = mysqli_fetch_array($result)) {
                    echo "<p class='mb-1'><strong>Game:</strong> {$row['game_name']}</p>";
                    echo "<p class='mb-1'><strong>Studio:</strong> {$row['studio_name']}</p>";
                    echo "<p class='mb-1'><strong>Release Date:</strong> {$row['release_date']}</p>";
                    echo "<p class='mb-1'><strong>Comment:</strong> {$row['comment']}</p>";
                    echo "<p class='mb-0'><strong>Rating:</strong> {$row['rating']}</p>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
