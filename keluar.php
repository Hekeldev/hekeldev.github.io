<?php
  include_once "m/miminMASTER/modul/koneksi.php";
  session_start();
  unset($_SESSION['id_akun']);
  header("location: ".$alamat_website);
  exit;
?>