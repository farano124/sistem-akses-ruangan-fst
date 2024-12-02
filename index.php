<?php
session_start();
// Jika sudah login, arahkan ke dashboard sesuai peran
if (isset($_SESSION['role'])) {
    switch ($_SESSION['role']) {
        case 'Admin Sistem':
            header("Location: admin_dashboard.php");
            exit();
        case 'Mahasiswa':
            header("Location: mahasiswa_dashboard.php");
            exit();
        case 'Dosen':
            header("Location: dosen_dashboard.php");
            exit();
        case 'Staf Administrasi':
            header("Location: staf_dashboard.php");
            exit();
    }
}

// Jika login gagal, tampilkan pesan error
$error_message = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Akses Ruangan</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login Sistem Akses Ruangan</h2>
        <form action="backend/auth.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Masukkan username" required>
            
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            
            <button type="submit">Login</button>
        </form>

        <?php if ($error_message): ?>
            <div class="error-message">
                <p><?php echo $error_message; ?></p>
            </div>
        <?php endif; ?>

    </div>
</body>
</html>

