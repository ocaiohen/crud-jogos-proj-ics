<?php
include('header.php');
include('connection.php');

$studios = mysqli_query($db, 'SELECT studio_name FROM studios ORDER BY studio_name') or die(mysqli_error($db));
?>
<body class="bg-light">
    <div class="container py-4">
        <div class="mb-4">
            <h1 class="h4 mb-1">Adicionar Jogo</h1>
            <p class="text-muted mb-0">Criar um novo registro de jogo</p>
        </div>

        <form class="card shadow-sm p-4" method="post" action="add_game.php">
            <div class="mb-3">
                <label class="form-label">Nome do Jogo</label>
                <input class="form-control" placeholder="Nome do Jogo" name="game_name" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Estúdio</label>
                <input class="form-control" list="studio-list" placeholder="Estúdio" name="studio" required>
                <datalist id="studio-list">
                    <?php while ($studioRow = mysqli_fetch_assoc($studios)) { ?>
                        <option value="<?php echo htmlspecialchars($studioRow['studio_name']); ?>"></option>
                    <?php } ?>
                </datalist>
            </div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Data de Lançamento</label>
                    <input class="form-control" type="date" name="release_date" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Avaliação (0-10)</label>
                    <input class="form-control" type="number" name="rating" min="0" max="10" step="0.1" required>
                </div>
            </div>
            <div class="mb-3 mt-3">
                <label class="form-label">Comentário</label>
                <textarea class="form-control" name="comment" rows="3"></textarea>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Salvar Jogo</button>
                <button type="reset" class="btn btn-outline-secondary">Limpar</button>
                <a class="btn btn-link" href="index.php">Voltar</a>
            </div>
        </form>
    </div>
</body>

</html>
