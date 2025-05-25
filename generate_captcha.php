<?php
// Mulai session untuk menyimpan nilai captcha sementara
session_start();

// Fungsi untuk menghasilkan captcha gambar 2 angka
function generateCaptcha() {
    $captchaLength = 2; // Jumlah angka captcha
    $captcha = '';

    // Generate angka acak untuk captcha
    for ($i = 0; $i < $captchaLength; $i++) {
        $captcha .= mt_rand(0, 9);
    }

    // Simpan nilai captcha di session (sementara)
    $_SESSION['captcha'] = $captcha;

    // Buat gambar captcha
    $image = imagecreatetruecolor(100, 30);
    $bgColor = imagecolorallocate($image, 255, 255, 255);
    $textColor = imagecolorallocate($image, 0, 0, 0);

    // Isi latar belakang dengan warna putih
    imagefilledrectangle($image, 0, 0, 100, 30, $bgColor);

    // Tambahkan teks captcha ke gambar
    imagestring($image, 5, 25, 5, $captcha, $textColor);

    // Set header untuk tipe gambar PNG
    header('Content-Type: image/png');

    // Tampilkan gambar captcha
    imagepng($image);

    // Hapus gambar dari memori
    imagedestroy($image);
}

// Panggil fungsi untuk menghasilkan captcha
generateCaptcha();
?>
