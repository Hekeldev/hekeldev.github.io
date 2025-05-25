<?php
session_start();
include '../config.php';

// Periksa apakah pengguna telah login
if (!isset($_SESSION['username'])) {
    // Jika pengguna belum login, kembalikan respons JSON dengan status "NotLoggedIn"
    $response = array('status' => 'NotLoggedIn');
    echo json_encode($response);
    exit;
}

// Ambil ID pengguna dari session
$userId = $_SESSION['user_id'];

// Ambil status pengguna dari database berdasarkan ID pengguna
$query = "SELECT status FROM users WHERE id = $userId";
$result = mysqli_query($conn, $query);

if ($result) {
    $user = mysqli_fetch_assoc($result);
    
    // Cek apakah status pengguna adalah "Banned"
    if ($user['status'] == 'Banned') {
        // Jika pengguna di banned, kembalikan respons JSON dengan status "Banned"
        $response = array('status' => 'Banned');
        echo json_encode($response);
    } else {
        // Jika pengguna tidak di banned, kembalikan respons JSON dengan status "NotBanned"
        $response = array('status' => 'NotBanned');
        echo json_encode($response);
    }
} else {
    // Jika terjadi kesalahan saat mengambil status pengguna, kembalikan respons JSON dengan status "Error"
    $response = array('status' => 'Error');
    echo json_encode($response);
}
?>
