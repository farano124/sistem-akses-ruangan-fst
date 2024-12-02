<?php
session_start();
include 'db_config.php';

ob_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Debugging: Cek apakah username dan password diterima
    echo "DEBUG: Username: $username, Password: $password<br>";

    // Query untuk memeriksa pengguna
    $stmt = $conn->prepare("SELECT * FROM pengguna WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Debugging: Cek hasil query
    if ($user) {
        echo "DEBUG: User ditemukan: <pre>" . print_r($user, true) . "</pre>";
    } else {
        echo "DEBUG: Username tidak ditemukan di database.";
        exit();
    }

    // Cek apakah password cocok
    if ($password === $user['password']) {
        echo "DEBUG: Password cocok.<br>";
        $_SESSION['id_pengguna'] = $user['id_pengguna'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['peran'];

        switch ($user['peran']) {
            case 'Admin Sistem':
                header("Location: ../admin_dashboard.php");
                break;
            case 'Mahasiswa':
                header("Location: ../mahasiswa_dashboard.php");
                break;
            case 'Dosen':
                header("Location: ../dosen_dashboard.php");
                break;
            case 'Staf Administrasi':
                header("Location: ../staf_dashboard.php");
                break;
        }
        exit();
    } else {
        echo "DEBUG: Password salah.";
        exit();
    }
}
?>
