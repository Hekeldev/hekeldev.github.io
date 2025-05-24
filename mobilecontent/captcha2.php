<?php
session_start();

// Fungsi untuk menghasilkan CAPTCHA dengan 2 digit angka acak
function generateCaptcha()
{
    $digits = 2; // Jumlah digit angka pada CAPTCHA
    $captcha = '';
    for ($i = 0; $i < $digits; $i++) {
        $captcha .= mt_rand(0, 9); // Menghasilkan digit angka acak
    }
    return $captcha;
}

// Fungsi untuk memperbarui captcha dan mengembalikan gambar baru
function refreshCaptcha()
{
    $captcha = generateCaptcha();
    $_SESSION['captcha'] = $captcha;

    // Membuat gambar CAPTCHA
    $image = imagecreatetruecolor(100, 30);
    $bgColor = imagecolorallocate($image, 0, 0, 0); // Warna latar belakang (hitam)
    $textColor = imagecolorallocate($image, 255, 255, 255); // Warna teks (putih)
    $lineColor = imagecolorallocate($image, 255, 255, 255); // Warna garis (putih)

    imagefilledrectangle($image, 0, 0, 99, 29, $bgColor);

    // Menambahkan garis-garis pada captcha
    for ($i = 0; $i < 5; $i++) {
        imageline($image, mt_rand(0, 99), 0, mt_rand(0, 99), 29, $lineColor);
    }

    imagettftext($image, 20, 0, 10, 22, $textColor, 'path/to/arial_bold.ttf', $captcha);

    return $image;
}

// Memeriksa apakah permintaan AJAX dikirim untuk memperbarui gambar captcha
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') {
    // Jika permintaan AJAX, memperbarui gambar captcha dan mengirimkan gambar baru
    $image = refreshCaptcha();
    ob_start();
    imagepng($image);
    $imageData = ob_get_clean();
    imagedestroy($image);
    echo base64_encode($imageData);
    exit();
}

// Membuat gambar CAPTCHA awal
$image = refreshCaptcha();
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
?>