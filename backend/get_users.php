<?php
include 'db_config.php';

$stmt = $conn->prepare("SELECT id_pengguna, nama, email, peran FROM pengguna");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($users);
?>
