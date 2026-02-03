<?php
include('../backend/connection.php');
include('header.php');

$query = 'SELECT * FROM studios WHERE studio_id ='.$_GET['id'];
$result = mysqli_query($db, $query) or die(mysqli_error($db));
$studio = mysqli_fetch_assoc($result);
?>
<body class="bg-light">
    <div class="container py-4">
        <div class="mb-4">
            <h1 class="h4 mb-1">Edit Studio</h1>
            <p class="text-muted mb-0">Update studio information</p>
        </div>
        <form class="card shadow-sm p-4" method="post" action="<?php echo htmlspecialchars($backendBaseUrl); ?>/edit_studio_post.php">
            <input type="hidden" name="studio_id" value="<?php echo $studio['studio_id']; ?>" />
            <div class="mb-3">
                <label class="form-label">Studio Name</label>
                <input class="form-control" placeholder="Studio Name" name="studio_name" value="<?php echo htmlspecialchars($studio['studio_name']); ?>" required>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update Studio</button>
                <a class="btn btn-link" href="index.php">Return</a>
            </div>
        </form>
    </div>
</body>

</html>
