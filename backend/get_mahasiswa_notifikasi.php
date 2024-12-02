<?php
session_start();
include 'db_config.php';

// Pastikan sesi mahasiswa
if (!isset($_SESSION['id_pengguna'])) {
    echo json_encode([]);
    exit();
}

$id_pengguna = $_SESSION['id_pengguna'];

$stmt = $conn->prepare("SELECT pesan, tanggal 
                        FROM notifikasi 
                        WHERE id_pengguna = :id_pengguna 
                        ORDER BY tanggal DESC");
$stmt->bindParam(':id_pengguna', $id_pengguna);
$stmt->execute();
$notifikasi = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($notifikasi);
?>
