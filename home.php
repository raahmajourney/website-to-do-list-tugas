<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
        body {
            position: relative;
            overflow: hidden;
        }
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            background: url('bg.jpg') no-repeat center center fixed;
            background-size: cover;
            opacity: 0.4; /* Adjust the opacity here */
            z-index: -1;
        }
        .hero {
            text-align: center;
            padding: 100px 20px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
        }
        .btn-outline-primary, .btn-primary {
            transition: transform 0.2s;
        }
        .btn-outline-primary:hover, .btn-primary:hover {
            transform: scale(1.05);
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center bg-light p-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="hero">
                    <h2 class="text-center mb-4">Selamat Datang di Aplikasi <br>
                        To Do List Tugas</h2>
                    <div class="d-grid gap-2">
                        <a href="register.php" class="btn btn-outline-primary">Register</a>
                        <a href="login.php" class="btn btn-primary">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>