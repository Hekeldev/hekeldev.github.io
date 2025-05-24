<?php
session_start();

include '../config.php';

// Periksa apakah pengguna telah login
if (!isset($_SESSION['username'])) {
    // Jika pengguna belum login, redirect ke halaman login
    header('Location: login.php');
    exit;
}

// Ambil ID pengguna dari sesi yang aktif
$username = $_SESSION['username'];

// Ambil data saldo pengguna dari tabel users berdasarkan ID pengguna
$queryUserBalance = "SELECT balance FROM users WHERE username = '$username'";
$resultUserBalance = mysqli_query($conn, $queryUserBalance);
$userBalance = mysqli_fetch_assoc($resultUserBalance)['balance'];


?>
<?php echo number_format($userBalance, 0, ',', ','); ?>
