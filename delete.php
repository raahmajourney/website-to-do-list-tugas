<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\rahma\htdocs\manajementugas');
include ('db.php');

$id = $_GET['id'];

$sql = "DELETE FROM tugas WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);

header("Location: index.php");
?>