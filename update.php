<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\rahma\htdocs\manajementugas');
include ('db.php');

$id = $_GET['id'];
$sql = "SELECT * FROM tugas WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$task = $stmt->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $status = $_POST['status'];

    $sql = "UPDATE tugas SET title = ?, description = ?, due_date = ?, status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$title, $description, $due_date, $status, $id]);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="my-4 text-center">Edit Tugas</h2>
                <form method="POST" action="update.php?id=<?= $task['id']; ?>">
                    <div class="mb-3">
                        <label for="title" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="title" name="title" value="<?= $task['title']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="3"><?= $task['description']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="due_date" class="form-label">Deadline</label>
                        <input type="date" class="form-control" id="due_date" name="due_date" value="<?= $task['due_date']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                            <option value="pending" <?= $task['status'] == 'pending' ? 'selected' : ''; ?>>Belum Selesai</option>
                            <option value="completed" <?= $task['status'] == 'completed' ? 'selected' : ''; ?>>Selesai</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="update">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>