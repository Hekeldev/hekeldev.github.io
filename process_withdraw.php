<?php
include 'config.php';
session_start();

if (!isset($_SESSION['username'])) {
    // Jika nilai $_SESSION['id'] belum diatur, maka redirect ke halaman login atau lakukan tindakan lainnya
    header('Location: login.php'); // Ganti 'login.php' dengan halaman login yang sesuai
    exit;
}

$userId = $_SESSION['username'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $withdrawAmount = $_POST['amount'];

    // Validasi nilai withdraw
    if ($withdrawAmount <= 10000) {
        echo "Jumlah withdraw harus lebih besar dari 10000.";
        exit;
    }

    // Pastikan saldo mencukupi sebelum melakukan withdraw
    $queryBalance = "SELECT balance FROM users WHERE username='$userId'";
    $resultBalance = mysqli_query($conn, $queryBalance);

    if (!$resultBalance) {
        echo "Error: " . mysqli_error($conn);
        exit;
    }

    $row = mysqli_fetch_assoc($resultBalance);
    $currentBalance = $row['balance'];

    if ($withdrawAmount > $currentBalance) {
        echo "Saldo tidak mencukupi.";
        exit;
    }

    // Kurangi saldo
    $newBalance = $currentBalance - $withdrawAmount;
    $queryUpdateBalance = "UPDATE users SET balance='$newBalance' WHERE username='$userId'";
    $resultUpdateBalance = mysqli_query($conn, $queryUpdateBalance);

    if (!$resultUpdateBalance) {
        echo "Error: " . mysqli_error($conn);
        exit;
    }

    // Proses penerimaan withdraw dan catat ke tabel transaksi
    $withdrawTime = date('Y-m-d H:i:s');
    $queryInsertTransaction = "INSERT INTO transactions (username, amount, transaction_type, transaction_time) 
                               VALUES ('$userId', '$withdrawAmount', 'withdraw', '$withdrawTime')";
    $resultInsertTransaction = mysqli_query($conn, $queryInsertTransaction);

    if (!$resultInsertTransaction) {
        echo "Error: " . mysqli_error($conn);
        exit;
    }

    echo "Withdraw berhasil diajukan. Saldo Anda telah dikurangi.";
}
