<?php
session_start();
include 'db_config.php';

// Pastikan sesi mahasiswa
if (!isset($_SESSION['id_pengguna'])) {
    echo json_encode([]);
    exit();
}

$id_pengguna = $_SESSION['id_pengguna'];

$stmt = $conn->prepare("SELECT r.nama_ruangan, r.jenis_ruangan, h.waktu_berakhir 
                        FROM hak_akses h
                        JOIN ruangan r ON h.id_ruangan = r.id_ruangan
                        WHERE h.id_pengguna = :id_pengguna");
$stmt->bindParam(':id_pengguna', $id_pengguna);
$stmt->execute();
$hak_akses = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($hak_akses);
?>
