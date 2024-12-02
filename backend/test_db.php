<?php
include 'db_config.php';

try {
    $stmt = $conn->query("SELECT DATABASE()");
    $db = $stmt->fetchColumn();
    echo "Koneksi berhasil ke database: $db";
} catch (Exception $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>
