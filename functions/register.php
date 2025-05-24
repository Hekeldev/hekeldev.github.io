<?php
session_start();
include '../config.php';
// INI ADALAH HALAMAN FUNCTIONS/REGISTER.PHP
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $telp_no = $_POST['telp_no'];
    $bank_name = $_POST['bank_name'];
    $fullname = $_POST['fullname'];
    $acc_no = $_POST['acc_no'];

    // Periksa apakah username sudah digunakan
    $queryCheckUsername = "SELECT * FROM users WHERE username = '$username'";
    $resultCheckUsername = mysqli_query($conn, $queryCheckUsername);
    // Periksa apakah email sudah digunakan
    $queryCheckEmail = "SELECT * FROM users WHERE email = '$email'";
    $resultCheckEmail = mysqli_query($conn, $queryCheckEmail);
    // Periksa apakah no telp sudah digunakan
    $queryCheckTelp = "SELECT * FROM users WHERE telp_no = '$telp_no'";
    $resultCheckTelp = mysqli_query($conn, $queryCheckTelp);
    // Periksa apakah nomor rekening sudah digunakan
    $queryCheckNorek = "SELECT * FROM users WHERE acc_no = '$acc_no'";
    $resultCheckNorek = mysqli_query($conn, $queryCheckNorek);

if (mysqli_num_rows($resultCheckUsername) > 0) {
    echo json_encode(array('status' => 'usernameWrong'));
} elseif (mysqli_num_rows($resultCheckEmail) > 0) {
    echo json_encode(array('status' => 'emailError'));
} elseif (mysqli_num_rows($resultCheckTelp) > 0) {
    echo json_encode(array('status' => 'telponExist'));
} elseif (mysqli_num_rows($resultCheckNorek) > 0) {
    echo json_encode(array('status' => 'rekExist'));
} else {
    // Enkripsi password sebelum disimpan ke database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Generate referral code
    $referralCode = generateReferralCode();

    // Insert data pengguna baru ke dalam tabel 'users'
    $queryInsertUser = "INSERT INTO users (username, password, email, telp_no, bank_name, fullname, acc_no, referral_code) VALUES ('$username', '$hashedPassword', '$email', '$telp_no', '$bank_name', '$fullname', '$acc_no', '$referralCode')";
    mysqli_query($conn, $queryInsertUser);

    // Ambil ID pengguna yang baru terdaftar
    $userId = mysqli_insert_id($conn);

    // Periksa apakah kode referral valid
    if (!empty($referralCode)) {
        $queryCheckReferralCode = "SELECT id FROM users WHERE referral_code = '$referralCode'";
        $resultCheckReferralCode = mysqli_query($conn, $queryCheckReferralCode);

        if (mysqli_num_rows($resultCheckReferralCode) > 0) {
            $referralUser = mysqli_fetch_assoc($resultCheckReferralCode);
            $referralUserId = $referralUser['id'];

            // Simpan ID pengguna yang mengundang dalam kolom referral_user_id
            $queryUpdateReferralUserId = "UPDATE users SET referral_user_id = $referralUserId WHERE id = $userId";
            mysqli_query($conn, $queryUpdateReferralUserId);
        }
    }

    echo json_encode(array('status' => 'success'));
}

// ...
}


// Fungsi untuk menghasilkan kode referral secara acak
function generateReferralCode()
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $referralCode = '';

    for ($i = 0; $i < 6; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $referralCode .= $characters[$index];
    }

    return $referralCode;
}

?>