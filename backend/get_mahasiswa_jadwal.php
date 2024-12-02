<?php
session_start();
include 'db_config.php';

// Pastikan sesi mahasiswa
if (!isset($_SESSION['id_pengguna'])) {
    echo json_encode([]);
    exit();
}

$id_pengguna = $_SESSION['id_pengguna'];

// Data jadwal sementara (ganti dengan tabel jadwal jika ada)
$jadwal = [
    ["nama_ruangan" => "Ruang Kelas 101", "hari" => "Senin", "jam" => "08:00 - 10:00"],
    ["nama_ruangan" => "Laboratorium Komputer 1", "hari" => "Rabu", "jam" => "13:00 - 15:00"]
];

echo json_encode($jadwal);
?>
