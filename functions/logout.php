<?php
session_start();
// Ambil data waktu terakhir login dari database
$dbHost = 'localhost';
$dbUser = 'heavendn_gamepay';
$dbPass = 'Dimasws2004@';
$dbName = 'heavendn_slots';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
	die("Koneksi database gagal: " . $conn->connect_error);
}

$user = $_POST['user'];
$sesi_id = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
$logout_time = date('d M Y H:i:s');
$ip_saat_logout = $_SERVER['REMOTE_ADDR'];

$query = "INSERT INTO logout_time (user_id, ip_saat_logout, logout_time) VALUES ('$user_id', '$ip_saat_logout', '$logout_time')";
$sql = "INSERT INTO logout_time = '$currentDateTime' WHERE username = '$user'";




$result = mysqli_query($conn, $query);

if ($result) {
    session_unset();
    session_destroy();
    
    $alertMessage = "Berhasil Logout.";
    header("Location: ../index.php?alert=" . urlencode($alertMessage));
    exit();
  
    
} else {
    echo "Terjadi kesalahan dalam menyimpan history logout.";
}