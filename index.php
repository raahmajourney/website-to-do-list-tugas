<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\rahma\htdocs\manajementugas');
include('db.php');

if (isset($_POST['add'])) {
    header("Location: create.php");
    exit;
}

if (isset($_POST['logout'])) {
    header("Location: home.php");
    exit;
}

// halaman untuk melihat daftar tugas

$sql = "SELECT * FROM tugas ORDER BY id DESC";
$stmt = $conn->query($sql);
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list Tugas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function confirmDelete(event) {
            if (!confirm("Apakah Anda yakin ingin menghapus tugas ini?")) {
                event.preventDefault();
            }
        }

        function updateStatus(taskId, selectElement) {
            var status = selectElement.value;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_status.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("id=" + taskId + "&status=" + status);
        }
    </script>
</head>
<body class="bg-light p-3">
    <div class="container">
        <h2 class="my-4 text-center">Daftar Tugas</h2>
        
        <form method="POST">
            <button type="submit" class="btn btn-primary" name="add">+ Tugas</button>
            <button type="submit" class="btn btn-primary" name="logout">Logout</button>
        </form>
       <br> 

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($tasks as $task): ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $task['title']; ?></td>
                        <td><?= $task['description']; ?></td>
                        <td><?= $task['due_date']; ?></td>
                        <td>
                            <select class="form-select" onchange="updateStatus(<?= $task['id']; ?>, this)">
                                <option value="pending" <?= $task['status'] == 'pending' ? 'selected' : ''; ?>>Belum Selesai</option>
                                <option value="completed" <?= $task['status'] == 'completed' ? 'selected' : ''; ?>>Selesai</option>
                            </select>
                        </td>
                        <td>
                            <a href="update.php?id=<?= $task['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?= $task['id']; ?>" class="btn btn-danger" onclick="confirmDelete(event)">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>