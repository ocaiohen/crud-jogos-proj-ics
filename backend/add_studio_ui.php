<?php
include('connection.php');
include('header.php');
?>
<body class="bg-light">
    <div class="container py-4">
        <div class="mb-4">
            <h1 class="h4 mb-1">Adicionar Estúdio</h1>
            <p class="text-muted mb-0">Criar um novo estúdio</p>
        </div>
        <form class="card shadow-sm p-4" method="post" action="add_studio_post.php">
            <div class="mb-3">
                <label class="form-label">Nome do Estúdio</label>
                <input class="form-control" placeholder="Nome do Estúdio" name="studio_name" required>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Salvar Estúdio</button>
                <button type="reset" class="btn btn-outline-secondary">Limpar</button>
                <a class="btn btn-link" href="index.php">Voltar</a>
            </div>
        </form>
    </div>
</body>

</html>
