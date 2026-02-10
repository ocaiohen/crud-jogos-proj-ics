<?php
include('header.php');
include('connection.php');
?>
<body class="bg-light">
    <div class="container py-4">
        <header class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h1 class="h3 mb-1">Painel Administrativo - Gerenciamento de Jogos</h1>
                <p class="text-muted mb-0">Gerencie Jogos e Estúdios</p>
            </div>
            <a class="btn btn-primary" href="add_game_ui.php">Adicionar Jogo</a>
        </header>

        <section class="card shadow-sm mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h2 class="h5 mb-0">Lista de Jogos</h2>
                <span class="text-muted small">CRUD sobre MySQL/MariaDB</span>
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
                                echo "<td class='text-end'><a class='btn btn-sm btn-outline-primary me-2' href='".FRONTEND_BASE_URL."/detail.php?id=$gameId' target='_blank'>Ver</a><a class='btn btn-sm btn-outline-secondary me-2' href='edit_game_ui.php?id=$gameId'>Editar</a><a class='btn btn-sm btn-outline-danger' href='remove.php?id=$gameId'>Remover</a></td>";
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
                <h2 class="h5 mb-0">Estúdios</h2>
                <a class="btn btn-success btn-sm" href="add_studio_ui.php">Adicionar Estúdio</a>
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
                                echo "<td class='text-end'><a class='btn btn-sm btn-outline-secondary me-2' href='edit_studio_ui.php?id=$studioId'>Editar</a><a class='btn btn-sm btn-outline-danger' href='remove_studio.php?id=$studioId'>Remover</a></td>";
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
