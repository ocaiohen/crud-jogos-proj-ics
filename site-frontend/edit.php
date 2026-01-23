<?php
include('header.php');
include('../backend/connection.php');

$gameQuery = 'SELECT * FROM games WHERE games_id ='.$_GET['id'];
$gameResult = mysqli_query($db, $gameQuery) or die(mysqli_error($db));
$game = mysqli_fetch_assoc($gameResult);

$studios = mysqli_query($db, 'SELECT studio_name FROM studios ORDER BY studio_name') or die(mysqli_error($db));
?>
<body class="bg-light">
    <div class="container py-4">
        <div class="mb-4">
            <h1 class="h4 mb-1">Edit Game</h1>
            <p class="text-muted mb-0">Update existing game</p>
        </div>

        <form class="card shadow-sm p-4" method="post" action="<?php echo htmlspecialchars($backendBaseUrl); ?>/edit_game.php">
            <input type="hidden" name="id" value="<?php echo $game['games_id']; ?>" />
            <div class="mb-3">
                <label class="form-label">Game Name</label>
                <input class="form-control" placeholder="Game Name" name="game_name" value="<?php echo htmlspecialchars($game['game_name']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Studio</label>
                <input class="form-control" list="studio-list" placeholder="Studio" name="studio" value="<?php echo htmlspecialchars($game['studio']); ?>" required>
                <datalist id="studio-list">
                    <?php while ($studioRow = mysqli_fetch_assoc($studios)) { ?>
                        <option value="<?php echo htmlspecialchars($studioRow['studio_name']); ?>"></option>
                    <?php } ?>
                </datalist>
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Release Date</label>
                    <input class="form-control" type="date" name="release_date" value="<?php echo $game['release_date']; ?>" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Rating (0-10)</label>
                    <input class="form-control" type="number" name="rating" min="0" max="10" step="0.1" value="<?php echo $game['rating']; ?>" required>
                </div>
            </div>
            <div class="mb-3 mt-3">
                <label class="form-label">Comment</label>
                <textarea class="form-control" name="comment" rows="3"><?php echo htmlspecialchars($game['comment']); ?></textarea>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update Game</button>
                <a class="btn btn-link" href="index.php">Return</a>
            </div>
        </form>
    </div>
</body>

</html>
