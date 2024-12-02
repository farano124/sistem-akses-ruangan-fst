<?php
// Mulai sesi dan pastikan hanya admin yang dapat mengakses halaman ini
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Admin Sistem') {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Sistem</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <img src="assets/logo.png" alt="Logo" class="logo">
            <h1>Dashboard Admin Sistem</h1>
            <a href="logout.php" class="logout">Logout</a>
        </header>

        <main>
            <section class="section">
                <h2>Daftar Pengguna</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Peran</th>
                        </tr>
                    </thead>
                    <tbody id="user-table">
                        <!-- Data akan dimuat menggunakan JavaScript -->
                    </tbody>
                </table>
            </section>

            <section class="section">
                <h2>Log Aktivitas</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID Log</th>
                            <th>Pengguna</th>
                            <th>Tindakan</th>
                            <th>Status</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody id="log-table">
                        <!-- Data akan dimuat menggunakan JavaScript -->
                    </tbody>
                </table>
            </section>

            <section class="section">
                <h2>Kirim Notifikasi</h2>
                <form id="notification-form">
                    <label for="user-id">Pilih Pengguna:</label>
                    <select id="user-id" name="user-id" required>
                        <!-- Opsi akan dimuat menggunakan JavaScript -->
                    </select>
                    <label for="message">Pesan:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                    <button type="submit">Kirim</button>
                </form>
            </section>
        </main>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
