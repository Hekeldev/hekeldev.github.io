<?php
  date_default_timezone_set("Asia/Jakarta");
  $alamat_website = '';
  $host = "localhost";
  $username = "heavendn_gamepay";
  $password = "Dimasws2004@";
  $database = "heavendn_pay4d";
  $koneksi = mysqli_connect($host, $username, $password, $database);
  if (!$koneksi) {
    echo "Kesalahan : Tidak dapat terhubung ke database." . PHP_EOL;
    echo "Kode Kesalahan : " . mysqli_connect_errno() . PHP_EOL;
    echo "Pesan Kesalahan : " . mysqli_connect_error() . PHP_EOL;
    exit;
  }
?>