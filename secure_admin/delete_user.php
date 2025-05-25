<?php
session_start();
// Sambungkan ke database
include '../config.php';

// Periksa apakah parameter deleteUser telah diterima melalui URL
if (isset($_GET['deleteUser']) && is_numeric($_GET['deleteUser'])) {
    $userId = $_GET['deleteUser'];

    // Periksa apakah pengguna dengan ID yang diberikan ada dalam database
    $queryCheckUser = "SELECT * FROM users WHERE id=$userId";
    $resultCheckUser = mysqli_query($conn, $queryCheckUser);

    if (mysqli_num_rows($resultCheckUser) > 0) {
        // Dapatkan data pengguna yang akan dihapus
        $userData = mysqli_fetch_assoc($resultCheckUser);
        $username = $userData['username'];
        $level = $userData['level'];

        // Periksa apakah pengguna yang akan dihapus bukan "SuperAdmin"
        if ($level != 'superadmin') {
            // Dapatkan username admin yang sedang login
            $adminUsername = $_SESSION['username'];

            // Tambahkan data pengguna yang akan dihapus beserta username admin ke dalam tabel deleted_users
            $queryInsertDeletedUser = "INSERT INTO deleted_users (username, level, admin_username) VALUES ('$username', '$level', '$adminUsername')";
            mysqli_query($conn, $queryInsertDeletedUser);

            // Hapus pengguna dari tabel users
            $queryDeleteUser = "DELETE FROM users WHERE id=$userId";
            mysqli_query($conn, $queryDeleteUser);

            // Hapus entri terkait di tabel user_balance (jika ada)
            $queryDeleteUserBalance = "DELETE FROM user_balance WHERE user_id=$userId";
            mysqli_query($conn, $queryDeleteUserBalance);

            // Redirect ke halaman riwayat pengguna yang dihapus
            header("Location: index.php?PAY4D=userdata");
            exit;
        } else {
            // Jika pengguna yang akan dihapus adalah "SuperAdmin", tampilkan pesan error
            echo '<script>alert("Tidak dapat menghapus pengguna SuperAdmin"); window.location.href = "index.php?PAY4D=userdata";</script>';
            exit;
        }
    } else {

        echo '<script>alert("Pengguna tidak ditemukan."); window.location.href = "index.php?PAY4D=userdata";</script>';
        exit;
    }
} else {

    header("Location: index.php?PAY4D=userdata");
    exit;
}
