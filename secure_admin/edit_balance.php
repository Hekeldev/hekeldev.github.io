<?php
// INI FILE edit_balance.php

// Pastikan pengguna sudah login atau sesi telah dimulai
session_start();

if (!isset($_SESSION['username']) || ($_SESSION['level'] != 'admin' && $_SESSION['level'] != 'superadmin')) {
    header('Location: logout.php');
    exit;
}

// Sambungkan ke database
include '../config.php';

// Periksa apakah metode POST telah digunakan untuk mengirim data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Peroleh data dari formulir edit saldo
    $userId = $_POST['userId'];
    $newBalance = $_POST['newBalance'];
    $newUsername = $_POST['username'];
    $newFullname = $_POST['fullname'];
    $newLevel = $_POST['level'];
    $newRek = $_POST['acc_no'];
    $newBank = $_POST['bank_name'];
    $newEmail = $_POST['email'];
    $newTelp = $_POST['telp_no'];

    // Validasi data yang diterima dari formulir (misalnya: pastikan saldo baru adalah angka positif)
    if (!is_numeric($newBalance) || $newBalance < 0) {
        echo "Saldo baru harus berupa angka positif.";
        exit;
    }

    // Ambil username admin yang sedang login
    $adminUsername = $_SESSION['username'];

    // Ambil saldo sekarang sebelum melakukan perubahan
    $queryGetBalance = "SELECT balance FROM users WHERE id = '$userId'";
    $resultGetBalance = mysqli_query($conn, $queryGetBalance);

    if ($resultGetBalance && mysqli_num_rows($resultGetBalance) > 0) {
        $rowGetBalance = mysqli_fetch_assoc($resultGetBalance);
        $currentBalance = $rowGetBalance['balance'];

        // Lakukan update saldo di database
        $queryUpdateUser = "UPDATE users SET balance = '$newBalance', username = '$newUsername', fullname = '$newFullname', level = '$newLevel', acc_no = '$newRek', bank_name = '$newBank', email = '$newEmail', telp_no = '$newTelp' WHERE id = '$userId'";
        if (mysqli_query($conn, $queryUpdateUser)) {
            // Insert log into balance_change_log table
            $queryGetUsername = "SELECT username FROM users WHERE id = '$userId'";
            $resultGetUsername = mysqli_query($conn, $queryGetUsername);
            $rowGetUsername = mysqli_fetch_assoc($resultGetUsername);
            $usernamePengguna = $rowGetUsername['username'];

            $queryInsertLog = "INSERT INTO balance_change_log (username_pengguna, admin_username, old_balance, new_balance, change_date) VALUES ('$usernamePengguna', '$adminUsername', '$currentBalance', '$newBalance', NOW())";
            mysqli_query($conn, $queryInsertLog);

            echo "Saldo berhasil diupdate.";
        } else {
            echo "Gagal mengupdate saldo. Error: " . mysqli_error($conn);
        }
    } else {
        echo "Gagal mengambil saldo saat ini.";
    }

    exit;
}
