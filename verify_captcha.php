<?php
// Ambil nilai captcha yang dimasukkan oleh pengguna
$captchaValue = $_POST['captcha'];

// Proses verifikasi captcha
// Ganti dengan kode untuk memverifikasi captcha sesuai dengan implementasi captcha Anda
// Misalnya, Anda bisa menggunakan library PHP seperti Securimage, ReCaptcha, atau membuat kode verifikasi sendiri
$isValidCaptcha = true; // Ganti dengan kode verifikasi captcha sesuai implementasi Anda

// Berikan respon "Valid" jika captcha valid, dan "Invalid" jika captcha tidak valid
if ($isValidCaptcha) {
    echo "Valid";
} else {
    echo "Invalid";
}
?>
