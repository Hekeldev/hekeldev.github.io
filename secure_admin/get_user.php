<?php
// get_user.php

include '../config.php';

if (isset($_GET['userId']) && is_numeric($_GET['userId'])) {
    $userId = $_GET['userId'];

    // Periksa apakah pengguna dengan ID yang diberikan ada dalam database
    $queryCheckUser = "SELECT * FROM users WHERE id=$userId";
    $resultCheckUser = mysqli_query($conn, $queryCheckUser);

    if (mysqli_num_rows($resultCheckUser) > 0) {
        $user = mysqli_fetch_assoc($resultCheckUser);

        // Mengambil data pengguna dalam format JSON
        echo json_encode($user);
        exit;
    }
}

// Jika pengguna tidak ditemukan atau terjadi kesalahan lainnya, kirimkan respon JSON dengan pesan error
echo json_encode(['error' => 'User not found.']);
?>
