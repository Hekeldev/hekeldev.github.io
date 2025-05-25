<?php
include '../config.php';
session_start();

// Ambil username dari sesi (sebelum data sesi dihapus)
$adminUsername = $_SESSION['username'];

// Hapus semua data sesi
session_unset();

// Hancurkan sesi
session_destroy();

// Setelah proses logout berhasil, perbarui riwayat login dengan menyimpan waktu logout
$logoutTime = date('d M Y H:i:s');
$deviceInfo = $_SERVER['HTTP_USER_AGENT'];
$ipAddress = $_SERVER['REMOTE_ADDR'];

// Cek apakah username tersedia pada sesi sebelum menyimpan ke database
if (!empty($adminUsername)) {
    $sql = "INSERT INTO admin_activity_log (admin_username, activity_type, logout_time, device, ip_address) 
    VALUES ('$adminUsername', 'logout', '$logoutTime', '$deviceInfo', '$ipAddress')";
    $conn->query($sql);
}

// Alihkan ke halaman login
header('Location: login.php');
exit;
?>
