<?php
include('header.php');
include('connection.php');

$gameQuery = 'SELECT g.*, s.studio_name FROM games g JOIN studios s ON g.studio_id = s.studio_id WHERE g.games_id ='.$_GET['id'];
$gameResult = mysqli_query($db, $gameQuery) or die(mysqli_error($db));
$game = mysqli_fetch_assoc($gameResult);

$studios = mysqli_query($db, 'SELECT studio_name FROM studios ORDER BY studio_name') or die(mysqli_error($db));
?>
<body class="bg-light">
    <div class="container py-4">
        <div class="mb-4">
            <h1 class="h4 mb-1">Editar Jogo</h1>
            <p class="text-muted mb-0">Atualizar jogo existente</p>
        </div>

        <form class="card shadow-sm p-4" method="post" action="edit_game.php">
            <input type="hidden" name="id" value="<?php echo $game['games_id']; ?>" />
            <div class="mb-3">
                <label class="form-label">Nome do Jogo</label>
                <input class="form-control" placeholder="Nome do Jogo" name="game_name" value="<?php echo htmlspecialchars($game['game_name']); ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Estúdio</label>
                <input class="form-control" list="studio-list" placeholder="Estúdio" name="studio" value="<?php echo htmlspecialchars($game['studio_name']); ?>" required>
                <datalist id="studio-list">
                    <?php while ($studioRow = mysqli_fetch_assoc($studios)) { ?>
                        <option value="<?php echo htmlspecialchars($studioRow['studio_name']); ?>"></option>
                    <?php } ?>
                </datalist>
            </div>
            <div class="mb-3">
                <label class="form-label">Data de Lançamento</label>
                <input class="form-control" type="date" name="release_date" value="<?php echo $game['release_date']; ?>" required>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Atualizar Jogo</button>
                <a class="btn btn-link" href="index.php">Voltar</a>
            </div>
        </form>
        <div class="card mt-3 p-3">
            <h6 class="mb-2">Avaliação e comentário (usuário)</h6>
            <p class="mb-1"><strong>Avaliação atual:</strong> <?php echo htmlspecialchars($game['rating']); ?></p>
            <p class="mb-0"><strong>Comentário atual:</strong> <?php echo htmlspecialchars($game['comment']); ?></p>
        </div>
    </div>
</body>

</html>
