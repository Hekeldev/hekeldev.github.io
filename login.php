<?php
// INI ACTION LOGIN
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Periksa kecocokan username dan password dengan database
    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            // Login berhasil, buat token unik untuk pengguna
            $token = bin2hex(random_bytes(32));
            
            // Simpan token ke dalam tabel users
            $updateTokenQuery = "UPDATE users SET token='$token' WHERE id='" . $user['id'] . "'";
            mysqli_query($conn, $updateTokenQuery);
            
            // Simpan data pengguna dan token ke session
            $_SESSION['username'] = $user['username'];
            $_SESSION['level'] = $user['level'];
            $_SESSION['token'] = $token;

            $ipAddress = $_SERVER['REMOTE_ADDR'];
            $currentDateTime = date("d M Y H:i:s");
            $sql = "UPDATE users SET last_login = '$currentDateTime', last_ip='$ipAddress' WHERE username = '$username'";
            $conn->query($sql);

            // Saat pengguna berhasil login
            // Redirect ke halaman userarea
            echo "Logging in";
            exit;
        } else {
            // Password salah
            echo "Salah Password";
        }

        // Cek apakah akun dibanned
        if ($user['status'] === 'Banned') {
            echo "User di banned";
            exit;
        }
    } else {
        // User tidak ditemukan
        echo "User tidak ada";
    }
}

?>