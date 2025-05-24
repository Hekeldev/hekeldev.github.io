<?php
session_start();
include_once "miminMASTER/modul/koneksi.php";
include_once "miminMASTER/modul/fungsi_umum.php";
include_once "miminMASTER/modul/query_pengaturan.php";
if (isset($_POST['masuk'])) {
  $nama_pengguna_akun = $_POST['nama_pengguna_akun'];
  $kata_sandi_akun = $_POST['kata_sandi_akun'];
  $query_akun = mysqli_query($koneksi, "SELECT * FROM akun WHERE nama_pengguna_akun = '$nama_pengguna_akun' AND kata_sandi_akun = '$kata_sandi_akun'");
  $cek_akun = mysqli_num_rows($query_akun);
  if ($cek_akun > 0) {
    $data_akun = mysqli_fetch_array($query_akun);
    $id_akun = $data_akun['id_akun'];
    $status_akun = $data_akun['status_akun'];
    if ($status_akun == "Aktif") {
      $_SESSION['id_akun'] = $id_akun;
      echo '
            <script>
              window.location.replace("' . $alamat_website . '");
            </script>
          ';
    } else {
      echo '
            <script>
              alert("Akun anda tidak aktif silahkan hubungi admin!");
              window.location.replace("' . $alamat_website . '");
            </script>
          ';
    }
  } else {
    echo 'wrong';
  }
} else if (isset($_SESSION['id_akun'])) {
  $id_akun_masuk = $_SESSION['id_akun'];
  $query_akun_masuk = mysqli_query($koneksi, "SELECT * FROM akun WHERE id_akun = '$id_akun_masuk'");
  $data_akun_masuk = mysqli_fetch_array($query_akun_masuk);
  $nama_lengkap_akun_masuk = $data_akun_masuk['nama_lengkap_akun'];
  $nama_pengguna_akun_masuk = $data_akun_masuk['nama_pengguna_akun'];
  $kata_sandi_akun_masuk = $data_akun_masuk['kata_sandi_akun'];
  $email_akun_masuk = $data_akun_masuk['email_akun'];
  $telepon_akun_masuk = $data_akun_masuk['telepon_akun'];
  $whatsapp_akun_masuk = $data_akun_masuk['whatsapp_akun'];
  $kode_referensi_akun_masuk = $data_akun_masuk['kode_referensi_akun'];
  $level_akun_masuk = $data_akun_masuk['level_akun'];
  $status_akun_masuk = $data_akun_masuk['status_akun'];

  $saldo = mysqli_query($koneksi, "SELECT * FROM saldo WHERE id_akun_saldo = '$id_akun_masuk'");
  $data_saldo = mysqli_fetch_array($saldo);
  $id_saldo = $data_saldo['id_saldo'];
  $total_saldo = $data_saldo['total_saldo'];
} else if (isset($_POST['masuk'])) {
  $nama_pengguna_akun = $_POST['nama_pengguna_akun'];
  $kata_sandi_akun = $_POST['kata_sandi_akun'];
  $query_akun = mysqli_query($koneksi, "SELECT * FROM akun WHERE nama_pengguna_akun = '$nama_pengguna_akun' AND kata_sandi_akun = '$kata_sandi_akun'");
  $cek_akun = mysqli_num_rows($query_akun);
  if ($cek_akun > 0) {
    $data_akun = mysqli_fetch_array($query_akun);
    $id_akun = $data_akun['id_akun'];
    $status_akun = $data_akun['status_akun'];
    if ($status_akun == "Aktif") {
      $_SESSION['id_akun'] = $id_akun;
      echo '
          <script>
            window.location.replace("' . $alamat_website . '");
          </script>
        ';
    } else {
      echo '
          <script>
            alert("Akun anda tidak aktif silahkan hubungi admin!");
            window.location.replace("' . $alamat_website . '");
          </script>
        ';
    }
  } else {
    echo '
       wrong
      ';
  }
} else if (isset($_POST['daftar'])) {
  $nama_lengkap_akun = $_POST['nama_lengkap_akun'];
  $nama_pengguna_akun = $_POST['nama_pengguna_akun'];
  $kata_sandi_akun = $_POST['kata_sandi_akun'];
  $email_akun = $_POST['email_akun'];
  $telepon_akun = $_POST['telepon_akun'];
  $whatsapp_akun = $_POST['whatsapp_akun'];
  $kode_referensi_akun = $_POST['kode_referensi_akun'];
  $rekening_anggota = explode(" ", $_POST['rekening_anggota']);
  $id_rekening_rekening_anggota = $rekening_anggota[0];
  $kategori_rekening_anggota = $rekening_anggota[1];
  $nama_rekening_anggota = $_POST['nama_rekening_anggota'];
  $nomor_rekening_anggota = $_POST['nomor_rekening_anggota'];
  $input_kode_verifikasi = $_POST['input_kode_verifikasi'];
  $kode_verifikasi = $_POST['kode_verifikasi'];
  $cek_nama_pengguna = mysqli_query($koneksi, "SELECT * FROM akun WHERE nama_pengguna_akun = '$nama_pengguna_akun'");
  $jumlah_nama_pengguna = mysqli_num_rows($cek_nama_pengguna);
  if ($jumlah_nama_pengguna > 0) {
    echo '
        <script>
          alert("Nama pengguna sudah terdaftar, gunakan yang lainnya!");
        </script>
      ';
  } else {
    if ($input_kode_verifikasi != $kode_verifikasi) {
      echo '
          <script>
            alert("Kode verifikasi salah!");
          </script>
        ';
    } else {
      $daftar = mysqli_query($koneksi, "INSERT INTO akun (nama_lengkap_akun, nama_pengguna_akun, kata_sandi_akun, email_akun, telepon_akun, whatsapp_akun, kode_referensi_akun) VALUES ('$nama_lengkap_akun', '$nama_pengguna_akun', '$kata_sandi_akun', '$email_akun', '$telepon_akun', '$whatsapp_akun', '$kode_referensi_akun')");
      if ($daftar) {
        $akun_baru = mysqli_query($koneksi, "SELECT * FROM akun WHERE nama_pengguna_akun = '$nama_pengguna_akun' AND kata_sandi_akun = '$kata_sandi_akun'");
        $data_akun_baru = mysqli_fetch_array($akun_baru);
        $id_akun_baru = $data_akun_baru['id_akun'];
        $daftar_rekening = mysqli_query($koneksi, "INSERT INTO rekening_anggota (id_akun_rekening_anggota, kategori_rekening_anggota, id_rekening_rekening_anggota, nama_rekening_anggota, nomor_rekening_anggota) VALUES ('$id_akun_baru', '$kategori_rekening_anggota', '$id_rekening_rekening_anggota', '$nama_rekening_anggota', '$nomor_rekening_anggota')");
        if ($daftar_rekening) {
          $saldo = mysqli_query($koneksi, "INSERT INTO saldo (id_akun_saldo, total_saldo) VALUES ('$id_akun_baru', '0')");
          if ($saldo) {
            $_SESSION['id_akun'] = $id_akun_baru;
            echo '
                <script>
                  alert("Pendaftaran berhasil");
                  window.location.replace("' . $alamat_website . '");
                </script>
              ';
          } else {
            echo "Proses Gagal<br>Error : " . $saldo . "<br>" . mysqli_error($koneksi);
          }
        } else {
          echo "Proses Gagal<br>Error : " . $daftar_rekening . "<br>" . mysqli_error($koneksi);
        }
      } else {
        echo "Proses Gagal<br>Error : " . $daftar . "<br>" . mysqli_error($koneksi);
      }
    }
  }
}

$ip_pengunjung = ipPengunjung();
$tanggal_pengunjung = date("j");
$bulan_pengunjung = date("n");
$tahun_pengunjung = date("Y");
$cek_pengunjung = mysqli_query($koneksi, "SELECT * FROM pengunjung WHERE ip_pengunjung = '$ip_pengunjung' AND tanggal_pengunjung = '$tanggal_pengunjung' AND bulan_pengunjung = '$bulan_pengunjung' AND tahun_pengunjung = '$tahun_pengunjung'");
$jumlah_pengunjung = mysqli_num_rows($cek_pengunjung);
if ($jumlah_pengunjung == 0) {
  $tambah_pengunjung = mysqli_query($koneksi, "INSERT INTO pengunjung (ip_pengunjung, tanggal_pengunjung, bulan_pengunjung, tahun_pengunjung) VALUES ('$ip_pengunjung', '$tanggal_pengunjung', '$bulan_pengunjung', '$tahun_pengunjung')");
}
