<?php
$host = 'localhost';
$dbname = 'aplikasi_tiket';
$username = 'user_tiket';  // Ganti dengan username yang Anda buat
$password = 'password_anda'; // Ganti dengan password yang Anda buat

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Koneksi database gagal: " . $e->getMessage());
}
