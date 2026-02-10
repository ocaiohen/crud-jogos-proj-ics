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
                $row = mysqli_fetch_array($result);
                ?>
                <div class="mb-4">
                    <p class="mb-1"><strong>Game:</strong> <?php echo $row['game_name']; ?></p>
                    <p class="mb-1"><strong>Studio:</strong> <?php echo $row['studio_name']; ?></p>
                    <p class="mb-1"><strong>Release Date:</strong> <?php echo $row['release_date']; ?></p>
                    <p class="mb-1"><strong>Current Rating:</strong> <?php echo $row['rating']; ?></p>
                    <p class="mb-0"><strong>Comment:</strong> <?php echo $row['comment']; ?></p>
                </div>
                
                <hr>

                <h5 class="mb-3">Rate & Review</h5>
                <form action="<?php echo htmlspecialchars($backendBaseUrl); ?>/rate_game.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['games_id']; ?>">
                    <div class="mb-3">
                        <label class="form-label">Rating (0-10)</label>
                        <input type="number" class="form-control" name="rating" min="0" max="10" step="0.1" value="<?php echo $row['rating']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Comment</label>
                        <textarea class="form-control" name="comment" rows="3"><?php echo htmlspecialchars($row['comment']); ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Review</button>
                    <a href="index.php" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
