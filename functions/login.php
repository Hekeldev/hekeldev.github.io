<?php
session_start();

if (isset($_SESSION['selectedCSS'])) {
    $selectedCSS = $_SESSION['selectedCSS'];
} else {
    $selectedCSS = 'default'; // Nilai default jika session belum diset
}

if (isset($_SESSION['username'])) {
    // Jika pengguna sudah login, redirect ke halaman admin
    header('Location: admin.php');
    exit;
}

include '../config.php';

$date = date('d M Y H:i:s');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $agent = $_SERVER['HTTP_USER_AGENT'];
    $ip = $_SERVER['REMOTE_ADDR'];
    $last_login_ip = $_SERVER['REMOTE_ADDR'];

    // Periksa kecocokan username dan password dengan database
    $query = "SELECT * FROM users WHERE username='$username'";
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

        // Menyimpan data login history ke database
        // Gantilah 'nama_tabel' dengan nama tabel yang Anda buat sebelumnya
        $sql = "INSERT INTO login_history (user_id, username, last_login_ip, login_time) VALUES ( '$username', '$last_login_ip', '$login_time')";
        // Eksekusi query (gunakan metode yang sesuai untuk database yang Anda gunakan)
        $conn->query($sql);

        // Redirect ke halaman admin
        header('Location: admin.php');
        exit;
    } else {
       
        if ($user) {
            echo "wrongpw";
            exit;
        } else {
            // Jika username tidak terdaftar
            $errorMessage = "Username tidak terdaftar";
        }

        // ...
    }
}



?>