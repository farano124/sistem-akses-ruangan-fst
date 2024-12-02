-- Membuat database
CREATE DATABASE IF NOT EXISTS akses_ruangan;
USE akses_ruangan;

-- Tabel pengguna
CREATE TABLE pengguna (
    id_pengguna INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    peran ENUM('Mahasiswa', 'Dosen', 'Staf Administrasi', 'Admin Sistem') NOT NULL
);

-- Tabel ruangan
CREATE TABLE ruangan (
    id_ruangan INT AUTO_INCREMENT PRIMARY KEY,
    nama_ruangan VARCHAR(100) NOT NULL,
    jenis_ruangan ENUM('Kelas', 'Laboratorium', 'Administrasi', 'Lainnya') NOT NULL,
    kapasitas INT NOT NULL
);

-- Tabel hak_akses
CREATE TABLE hak_akses (
    id_hak_akses INT AUTO_INCREMENT PRIMARY KEY,
    id_pengguna INT NOT NULL,
    id_ruangan INT NOT NULL,
    waktu_berakhir DATETIME,
    FOREIGN KEY (id_pengguna) REFERENCES pengguna(id_pengguna) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (id_ruangan) REFERENCES ruangan(id_ruangan) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tabel log_aktivitas
CREATE TABLE log_aktivitas (
    id_log INT AUTO_INCREMENT PRIMARY KEY,
    id_pengguna INT NOT NULL,
    tindakan VARCHAR(255) NOT NULL,
    waktu DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status ENUM('Berhasil', 'Gagal') NOT NULL,
    FOREIGN KEY (id_pengguna) REFERENCES pengguna(id_pengguna) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Tabel notifikasi
CREATE TABLE notifikasi (
    id_notifikasi INT AUTO_INCREMENT PRIMARY KEY,
    id_pengguna INT NOT NULL,
    pesan TEXT NOT NULL,
    tanggal DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    status ENUM('Dibaca', 'Belum Dibaca') NOT NULL,
    FOREIGN KEY (id_pengguna) REFERENCES pengguna(id_pengguna) ON DELETE CASCADE ON UPDATE CASCADE
);

-- Data contoh untuk tabel pengguna
INSERT INTO pengguna (id_pengguna, nama, email, username, password, peran) VALUES
(1, 'John Doe', 'john.doe@example.com', 'johndoe', 'password123', 'Mahasiswa'),
(2, 'Jane Smith', 'jane.smith@example.com', 'janesmith', 'password123', 'Dosen'),
(3, 'Admin User', 'admin@example.com', 'admin', 'adminpassword', 'Admin Sistem'),
(4, 'Staff User', 'staff@example.com', 'staff', 'staffpassword', 'Staf Administrasi');

-- Data contoh untuk tabel ruangan
INSERT INTO ruangan (id_ruangan, nama_ruangan, jenis_ruangan, kapasitas) VALUES
(1, 'Ruang Kelas 101', 'Kelas', 30),
(2, 'Laboratorium Komputer 1', 'Laboratorium', 20),
(3, 'Ruang Administrasi', 'Administrasi', 10),
(4, 'Ruang Seminar', 'Lainnya', 50);

-- Data contoh untuk tabel hak_akses
INSERT INTO hak_akses (id_hak_akses, id_pengguna, id_ruangan, waktu_berakhir) VALUES
(1, 1, 1, '2024-12-31 23:59:59'), -- Mahasiswa ke Ruang Kelas 101
(2, 2, 2, '2024-12-31 23:59:59'), -- Dosen ke Laboratorium Komputer 1
(3, 3, 3, '2025-12-31 23:59:59'), -- Admin ke Ruang Administrasi
(4, 4, 3, '2024-12-31 23:59:59'); -- Staf Administrasi ke Ruang Administrasi

-- Data contoh untuk tabel log_aktivitas
INSERT INTO log_aktivitas (id_log, id_pengguna, tindakan, status) VALUES
(1, 1, 'Login ke sistem', 'Berhasil'),
(2, 2, 'Mengakses Laboratorium Komputer 1', 'Berhasil'),
(3, 3, 'Mengubah hak akses pengguna', 'Berhasil'),
(4, 4, 'Login ke sistem', 'Gagal');

-- Data contoh untuk tabel notifikasi
INSERT INTO notifikasi (id_notifikasi, id_pengguna, pesan, status) VALUES
(1, 1, 'Hak akses Anda akan segera kedaluwarsa.', 'Belum Dibaca'),
(2, 2, 'Anda telah mengakses Laboratorium Komputer 1.', 'Dibaca'),
(3, 3, 'Pengguna baru telah ditambahkan ke sistem.', 'Belum Dibaca'),
(4, 4, 'Login gagal 3 kali berturut-turut.', 'Belum Dibaca');
