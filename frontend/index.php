<?php
include('header.php');
include('../backend/connection.php');
?>
<body class="bg-light">
    <div class="container py-4">
        <header class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h1 class="h3 mb-1">Game Reviews</h1>
                <p class="text-muted mb-0">Browse and Rate Games</p>
            </div>
        </header>

        <section class="card shadow-sm mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h2 class="h5 mb-0">Available Games</h2>
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
                                echo "<td class='text-end'><a class='btn btn-sm btn-primary' href='detail.php?id=$gameId'>View & Rate</a></td>";
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
