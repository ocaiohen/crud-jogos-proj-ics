<?php
include('header.php');
include('connection.php');
?>
<body class="bg-light">
    <div class="container py-4">
        <header class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h1 class="h3 mb-1">Admin Panel - Game Management</h1>
                <p class="text-muted mb-0">Manage Games and Studios</p>
            </div>
            <a class="btn btn-primary" href="add_game_ui.php">Add New Game</a>
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
                                echo "<td class='text-end'><a class='btn btn-sm btn-outline-primary me-2' href='".FRONTEND_BASE_URL."/detail.php?id=$gameId' target='_blank'>View</a><a class='btn btn-sm btn-outline-secondary me-2' href='edit_game_ui.php?id=$gameId'>Edit</a><a class='btn btn-sm btn-outline-danger' href='remove.php?id=$gameId'>Remove</a></td>";
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
                <a class="btn btn-success btn-sm" href="add_studio_ui.php">Add New Studio</a>
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
                                echo "<td class='text-end'><a class='btn btn-sm btn-outline-secondary me-2' href='edit_studio_ui.php?id=$studioId'>Edit</a><a class='btn btn-sm btn-outline-danger' href='remove_studio.php?id=$studioId'>Remove</a></td>";
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
