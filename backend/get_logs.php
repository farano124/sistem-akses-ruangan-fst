<?php
include 'db_config.php';

$stmt = $conn->prepare("SELECT log.id_log, pengguna.nama, log.tindakan, log.status, log.waktu 
                        FROM log_aktivitas log
                        JOIN pengguna ON log.id_pengguna = pengguna.id_pengguna");
$stmt->execute();
$logs = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($logs);
?>
