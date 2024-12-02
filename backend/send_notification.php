<?php
include 'db_config.php';

$data = json_decode(file_get_contents("php://input"), true);
$user_id = $data['user_id'];
$message = $data['message'];

$stmt = $conn->prepare("INSERT INTO notifikasi (id_pengguna, pesan, status) VALUES (:user_id, :message, 'Belum Dibaca')");
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':message', $message);

if ($stmt->execute()) {
    echo "Notifikasi berhasil dikirim!";
} else {
    echo "Gagal mengirim notifikasi!";
}
?>
