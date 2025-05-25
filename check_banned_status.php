<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cms";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Periksa apakah ada permintaan POST dari skrip JavaScript
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"])) {
    $username = $_POST["username"];

    // Periksa apakah pengguna memiliki status "Banned"
    $query = "SELECT status FROM users WHERE username='$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $status = $user["status"];

        if ($status === "Banned") {
            echo "Banned";
        } else {
            echo "Not Banned";
        }
    } else {
        echo "User tidak ditemukan";
    }
} else {
    echo "Permintaan tidak valid";
}

$conn->close();
?>
