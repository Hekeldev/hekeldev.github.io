<?php

session_start();

include 'config.php';
// Periksa apakah form telah dikirim
if (isset($_POST['submit'])) {
  $image = $_FILES['file'];
  $altText = $_POST['alt_text'];
  $title = $_POST['title'];
  $description = $_POST['deskripsi'];

  // Periksa apakah file gambar telah diunggah
  if ($image['error'] === UPLOAD_ERR_OK) {
    // Tentukan direktori tujuan penyimpanan gambar
    $uploadDir = 'path/to/upload/directory/';
    if (!is_dir($uploadDir)) {
      mkdir($uploadDir, 0777, true);
    }

    // Generate nama unik untuk file gambar
    $imageName = uniqid() . '_' . $image['name'];
    $imagePath = $uploadDir . $imageName;

    // Pindahkan file gambar ke direktori tujuan
    if (move_uploaded_file($image['tmp_name'], $imagePath)) {
      // Simpan informasi accordion ke database
      $queryAddAccordion = "INSERT INTO accordions (title, image_path, alt_text, description) VALUES ('$title', '$imagePath', '$altText', '$description')";
      mysqli_query($conn, $queryAddAccordion);

      // Redirect kembali ke halaman admin.php setelah berhasil menambahkan accordion
      header('Location: secure_admin/?PAY4D=daftar_promosi');
      exit;
    } else {
      // Jika terjadi kesalahan saat mengunggah gambar, tampilkan pesan error
      echo "Terjadi kesalahan saat mengunggah gambar.";
    }
  } else {
    // Jika terjadi kesalahan saat mengunggah gambar, tampilkan pesan error
    echo "Terjadi kesalahan saat mengunggah gambar.";
  }
}


?>
