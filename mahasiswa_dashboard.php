<?php
// Mulai sesi dan pastikan hanya mahasiswa yang dapat mengakses halaman ini
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Mahasiswa') {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header class="header">
            <img src="assets/logo.png" alt="Logo" class="logo">
            <h1>Dashboard Mahasiswa</h1>
            <a href="logout.php" class="logout">Logout</a>
        </header>

        <main>
            <section class="section">
                <h2>Hak Akses Ruangan</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Ruangan</th>
                            <th>Jenis</th>
                            <th>Waktu Berakhir</th>
                        </tr>
                    </thead>
                    <tbody id="hak-akses-table">
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
    <script src="js/mahasiswa_script.js"></script>
</body>
</html>
