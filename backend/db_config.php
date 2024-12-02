<?php
// Konfigurasi koneksi database
$host = 'localhost';
$dbname = 'akses_ruangan';
$username = 'root';
$password = '';

try {
    // Membuat koneksi PDO ke database
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Mengatur mode error untuk PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Menampilkan pesan error jika koneksi gagal
    die("Koneksi ke database gagal: " . $e->getMessage());
}
?>
