<?php
// Mulai sesi dan pastikan hanya staf yang dapat mengakses halaman ini
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Staf Administrasi') {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Staf Administrasi</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <img src="assets/logo.png" alt="Logo" class="logo">
            <h1>Dashboard Staf Administrasi</h1>
            <a href="logout.php" class="logout">Logout</a>
        </header>

        <main>
            <section class="section">
                <h2>Daftar Ruangan yang Dikelola</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Ruangan</th>
                            <th>Jenis</th>
                            <th>Kapasitas</th>
                        </tr>
                    </thead>
                    <tbody id="ruangan-table">
                        <!-- Data akan dimuat menggunakan JavaScript -->
                    </tbody>
                </table>
            </section>

            <section class="section">
                <h2>Jadwal Ruangan</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Ruangan</th>
                            <th>Hari</th>
                            <th>Jam</th>
                        </tr>
                    </thead>
                    <tbody id="jadwal-table">
                        <!-- Data akan dimuat menggunakan JavaScript -->
                    </tbody>
                </table>
            </section>

            <section class="section">
                <h2>Notifikasi</h2>
                <ul id="notifikasi-list">
                    <!-- Data notifikasi akan dimuat menggunakan JavaScript -->
                </ul>
            </section>
        </main>
    </div>
    <script src="js/staf_script.js"></script>
</body>
</html>
