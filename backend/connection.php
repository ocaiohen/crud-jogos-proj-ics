<?php
require_once __DIR__.'/config.php';

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS);
if (!$db) {
    die('Unable to connect. Check your connection parameters.');
}
mysqli_select_db($db, DB_NAME) or die(mysqli_error($db));
?>
