<?php
include('../backend/connection.php');
include('header.php');
?>
<body class="bg-light">
    <div class="container py-4">
        <div class="mb-4">
            <h1 class="h4 mb-1">Add Studio</h1>
            <p class="text-muted mb-0">Create a new studio</p>
        </div>
        <form class="card shadow-sm p-4" method="post" action="<?php echo htmlspecialchars($backendBaseUrl); ?>/add_studio_post.php">
            <div class="mb-3">
                <label class="form-label">Studio Name</label>
                <input class="form-control" placeholder="Studio Name" name="studio_name" required>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Save Studio</button>
                <button type="reset" class="btn btn-outline-secondary">Clear</button>
                <a class="btn btn-link" href="index.php">Return</a>
            </div>
        </form>
    </div>
</body>

</html>
