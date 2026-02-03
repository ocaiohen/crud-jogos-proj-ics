<?php
include('header.php');
include('../backend/connection.php');
?>
<body class="bg-light">
    <div class="container py-4">
        <header class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h1 class="h3 mb-1">Game CRUD With MySQLi Datatable</h1>
                <p class="text-muted mb-0">Frontend: <?php echo htmlspecialchars(FRONTEND_BASE_URL); ?> | Backend: <?php echo htmlspecialchars(BACKEND_BASE_URL); ?></p>
            </div>
            <a class="btn btn-primary" href="add.php">Add New Game</a>
        </header>

        <section class="card shadow-sm mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h2 class="h5 mb-0">List of Games</h2>
                <span class="text-muted small">CRUD over MySQL/MariaDB</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Game Name</th>
                                <th>Studio</th>
                                <th>Release Date</th>
                                <th>Comment</th>
                                <th>Rating</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = 'SELECT g.*, s.studio_name FROM games g JOIN studios s ON g.studio_id = s.studio_id';
                            $result = mysqli_query($db, $query);
                            while($row = mysqli_fetch_array($result)) {
                                $gameId = $row['games_id'];
                                $gameName = $row['game_name'];
                                $studio = $row['studio_name'];
                                $releaseDate = $row['release_date'];
                                $comment = $row['comment'];
                                $rating = $row['rating'];
                                echo "<tr>";
                                echo "<td>$gameName</td>";
                                echo "<td>$studio</td>";
                                echo "<td>$releaseDate</td>";
                                echo "<td>$comment</td>";
                                echo "<td>$rating</td>";
                                echo "<td class='text-end'><a class='btn btn-sm btn-outline-primary me-2' href='detail.php?id=$gameId'>View</a><a class='btn btn-sm btn-outline-secondary me-2' href='edit.php?id=$gameId'>Edit</a><a class='btn btn-sm btn-outline-danger' href='".$backendBaseUrl."/remove.php?id=$gameId'>Remove</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <section class="card shadow-sm">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h2 class="h5 mb-0">Studios</h2>
                <a class="btn btn-success btn-sm" href="add_studio.php">Add New Studio</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Studio Name</th>
                                <th class="text-end">Actions</th>
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
                                echo "<td class='text-end'><a class='btn btn-sm btn-outline-secondary me-2' href='edit_studio.php?id=$studioId'>Edit</a><a class='btn btn-sm btn-outline-danger' href='".$backendBaseUrl."/remove_studio.php?id=$studioId'>Remove</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
