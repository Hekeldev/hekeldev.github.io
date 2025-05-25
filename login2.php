<?php
session_start();
include 'config.php';
$date = date('d M Y H:i:s');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $agent = $_SERVER['HTTP_USER_AGENT'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $last_login_ip = $_SERVER['REMOTE_ADDR'];

$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

if ($user && password_verify($password, $user['password'])) {
    // Login berhasil, simpan data pengguna ke session
    $_SESSION['username'] = $user['username'];
    $_SESSION['level'] = $user['level'];

    // Update waktu terakhir login
    $currentDateTime = date("Y-m-d H:i:s");
    $sql = "UPDATE users SET last_login = '$currentDateTime' WHERE username = '$username'";
    $conn->query($sql);

    // Mendapatkan waktu login saat ini
    $login_time = date('d M Y H:i:s');
    $sql = "INSERT INTO login_history (user_id, username, last_login_ip, login_time) VALUES ( '$username', '$last_login_ip', '$login_time')";
    $conn->query($sql);

    // Redirect ke halaman userarea
    echo "Logging in";
    exit;
} else {
    // Login gagal, tampilkan pesan error
    echo "Login Gagal";
    exit;
}
}
