<?php
include 'db_config.php';

$stmt = $conn->prepare("SELECT pesan, tanggal FROM notifikasi ORDER BY tanggal DESC LIMIT 5");
$stmt->execute();
$notifications = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($notifications);
?>
