<?php
date_default_timezone_set('Asia/Jakarta');
include("database.php");
$mysqli = new databases();

function jamTanggalIndonesia($kalender, $cetak_hari = false)
{
	$nama_hari = array(1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
	$nama_bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
	$pemisah_jam_tanggal = explode(' ', $kalender);
	$jam = $pemisah_jam_tanggal[1];
	$tanggal = $pemisah_jam_tanggal[0];
	$pemisah_tanggal = explode('-', $tanggal);
	$tanggal = $pemisah_tanggal[2];
	$bulan = $pemisah_tanggal[1];
	$tahun = $pemisah_tanggal[0];
	$hasil = $tanggal . ' ' . $nama_bulan[(int)$bulan] . ' ' . $tahun . ', Jam ' . $jam;
	if ($cetak_hari) {
		$format_hari = date('N', strtotime($kalender));
		return $nama_hari[$format_hari] . ', ' . $tanggal . ' ' . $nama_bulan[(int)$bulan] . ' ' . $tahun . ', Jam ' . $jam;
	}
	return $hasil;
}


function generateRandomString($length)
{
	return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
}
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
	header('location:../');
} else {
	session_start();
	if (isset($_SESSION['user_id'])) {
		$sesi_id = $_SESSION['user_id'];
	} else {
		$sesi_id = null;
	}
	$aksi = $_GET['aksi'];
	$date = date('d M Y H:i:s');


	// Memeriksa jumlah kesalahan saat login
	if ($aksi == 'login') {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
			} else {
			}
			// Ambil data dari form login
			$user = $_POST['user'];
			$password = $_POST['password'];


			if (empty($user) || empty($password)) {
				echo "empty";
				exit();
			}






			$dbHost = 'localhost';
			$dbUser = 'heavendn_gamepay';
			$dbPass = 'Dimasws2004@';
			$dbName = 'heavendn_slots';

			$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

			if ($conn->connect_error) {
				die("Koneksi database gagal: " . $conn->connect_error);
			}



			// Memeriksa kata sandi
			$sql = "SELECT * FROM user WHERE user = '$user' AND password = '$password'";
			$result = $conn->query($sql);
			$user = $_POST['user'];
			$password = md5($_POST['password']);

			$agent = $_SERVER['HTTP_USER_AGENT'];
			$ip = $_SERVER['REMOTE_ADDR'];
			$last_login_ip = $_SERVER['REMOTE_ADDR'];
			foreach ($mysqli->login($user, $password) as $d);
			$cek = $d['jumlah'];

			$last_login = null;
			if ($cek > 0) {
				$id = $d['id'];



				echo "success";
				$_SESSION['user_id'] = $id;




				// Update waktu terakhir login
				$currentDateTime = (date("d M Y H:i:s"));
				$sql = "UPDATE user SET last_login = '$currentDateTime' WHERE username = '$user'";

				$conn->query($sql);

				// Mendapatkan waktu login saat ini
				$login_time = date('d M Y H:i:s');

				// Menyimpan data login history ke database
				// Gantilah 'nama_tabel' dengan nama tabel yang Anda buat sebelumnya
				$sql = "INSERT INTO login_history (user_id, username, last_login_ip, login_time) VALUES ('$id', '$user', '$last_login_ip', '$login_time')";
				// Eksekusi query (gunakan metode yang sesuai untuk database yang Anda gunakan)
				$conn->query($sql);

				$log = 'Berhasil';
			} else {
				echo "wrong";
				$log = 'Gagal';
			}
		}
	} else if ($aksi == 'delete') {
		$id_produk   = $_POST['id'];
		$date_user   = $_POST['date_user'];
		$type  		 = $_POST['type'];

		$mysqli->delete($sesi_id, $id_produk, $date_user, $type);

		if ($mysqli == true) {
			header("Location: {$_SERVER['HTTP_REFERER']}");
		}
	} else if ($aksi == 'order') {
		$field1 = $_POST['field1'];
		$field2 = $_POST['field2'];
		$field1name = $_POST['field1name'];
		$field2name = $_POST['field2name'];
		$no_wa = $_POST['no_wa'];
		$rekening = $_POST['rekening'];
		$id = $_POST['id_list'];
		$akun = $field1name . ':' . $field1 . '~' . $field2name . ':' . $field2;
		$kode = generateRandomString(5);

		foreach ($mysqli->cek_order($sesi_id) as $cek);
		$orderan = $cek['jumlah'];

		if ($orderan > 0) {
			echo "<script>alert('Ada pesanan yang belum selesai!')
					window.location.href = '../?page=home';
					;</script>";
		} else {
			foreach ($mysqli->produk_list_data($id) as $d);
			$nama_produk = $d['nama_produk'];
			$nama_list = $d['nama_list'];
			$code = $d['code_mark'];
			$val = $d['val_mark'];
			if ($code == 'percent') {
				$harga =  $d['harga'] + (($val / 100) * $d['harga']);
			} else {
				$harga =  $d['harga'] + $val;
			}
			$invoice_remark = $nama_produk . '~' . $nama_list . '~' . $harga;
			if ($rekening == 'saldo') {
				foreach ($mysqli->saldo_akun($sesi_id) as $saldo);
				$saldo_akun = $saldo['saldo'];
				if ($harga <= $saldo_akun) {
					foreach ($mysqli->checkout($sesi_id, $date, $rekening, $invoice_remark, $kode, $no_wa, $akun, $harga, $status = 9) as $x);
					$id_invoice = $x['last_id'];
					//Potong Saldo
					$mysqli->bayar_saldo($sesi_id, $harga, $date, $id_invoice);
					header("Location: ../?page=invoice&ref=$kode");
				} else {
					echo "<script>alert('Gagal! Saldo tidak mencukupi, harap TopUp terlebih dahulu atau gunakan metode pembayaran lain.')
						window.location.href = '../?page=home';
						;</script>";
				}
			} else {
				$mysqli->checkout($sesi_id, $date, $rekening, $invoice_remark, $kode, $no_wa, $akun, $harga, $status = 0);
				header("Location: ../?page=invoice&ref=$kode");
			}
		}
	} else if ($aksi == 'cek_invoice') {
		$invoice = $_POST['invoice'];
		$kode = $_POST['referensi'];

		foreach ($mysqli->cek_invoice($invoice, $kode) as $d);
		$row = $d['jumlah'];
		if ($row > 0) {
			echo 'valid';
		} else {
			echo 'invalid';
		}
	} else if ($aksi == 'konfirmasi_pembayaran') {
		$invoice = $_POST['invoice'];
		$bank = strtoupper($_POST['bank']);
		$rekening = $_POST['rekening'];
		$nama = ucwords($_POST['nama']);
		$gambar = $_FILES['gambar']['name'];
		$waktu = date('D d-m-Y H:i');

		$mysqli->konfirmasi_pembayaran($invoice, $sesi_id, $bank, $rekening, $nama, $date, $gambar);
	} else if ($aksi == 'konfirmasi_topup') {
		$id = $_POST['id'];
		$bank = strtoupper($_POST['bank']);
		$rekening = $_POST['rekening'];
		$nama = ucwords($_POST['nama']);
		$gambar = $_FILES['gambar']['name'];
		$waktu = date('D d-m-Y H:i');

		$mysqli->konfirmasi_topup($id, $sesi_id, $bank, $rekening, $nama, $date, $gambar);
	} else if ($aksi == 'tarik_saldo') {
		$bank = strtoupper($_POST['bank']);
		$rekening = $_POST['rekening'];
		$nama = ucwords($_POST['nama']);
		$nominal = str_replace(',', '', $_POST['nominal']);
		$data = $bank . '~' . $rekening . '~' . $nama;
		foreach ($mysqli->saldo_akun($sesi_id) as $d);
		$saldo = $d['saldo'];
		if ($nominal <= $saldo) {
			$mysqli->tarik_saldo($sesi_id, $data, $nominal, $date);
			echo 'success';
		} else {
			echo 'gagal';
		}
	} else if ($aksi == 'update_profile') {
		$nama = ucwords($_POST['nama']);
		$kontak = $_POST['kontak'];
		$email = strtolower($_POST['email']);
		$gambar = $_FILES['gambar']['name'];

		foreach ($mysqli->user_sesi($sesi_id) as $d);
		$email_ex = $d['email'];
		$kontak_ex = $d['kontak'];

		if ($email == $email_ex && $kontak == $kontak_ex) {
			$mysqli->update_profile($nama, $kontak, $email, $gambar, $sesi_id);
			if ($mysqli == true) {
				header("Location: ../?page=profile");
			}
		} else {
			if ($email !== $email_ex) {
				foreach ($mysqli->cek_user_email($email, $hp = $kontak) as $d);
				$cek = $d['jumlah'];
				if ($cek > 0) {
					echo "<script>alert('Email telah terdaftar!')
					window.location.href = '../?page=profile';
					;</script>";
					//header("location : ../?page=profile");
				} else {
					$mysqli->update_profile($nama, $kontak, $email, $gambar, $sesi_id);
					if ($mysqli == true) {
						header("Location: ../?page=profile");
					}
				}
			} else if ($kontak !== $kontak_ex) {
				foreach ($mysqli->cek_user_kontak($hp = $kontak) as $d);
				$cek = $d['jumlah'];
				if ($cek > 0) {
					echo "<script>alert('Nomor handphone telah terdaftar!')
					window.location.href = '../?page=profile';
					;</script>";
					//header("location : ../?page=profile");
				} else {
					$mysqli->update_profile($nama, $kontak, $email, $gambar, $sesi_id);
					if ($mysqli == true) {
						header("Location: ../?page=profile");
					}
				}
			}
		}
	} else if ($aksi == 'update_sandi') {
		$sandi_lama = md5($_POST['old']);
		$sandi_baru = $_POST['new1'];
		$konfirmasi_sandi = $_POST['new2'];
		$new = md5($sandi_baru);

		foreach ($mysqli->user_sesi($sesi_id) as $d) {
			$password = $d['password'];
		}

		if ($sandi_lama == $password) {
			if ($sandi_baru == $konfirmasi_sandi) {
				$mysqli->update_password($new, $sesi_id);
				echo 'success';
			} else {
				echo 'error';
			}
		} else {
			echo 'false';
		}
	} else if ($aksi == 'tambah_produk') {
		$nama = $_POST['nama'];
		$field1 = $_POST['field1'];
		$field2 = $_POST['field2'];
		$short_desc = $_POST['short_desc'];
		$kategori = $_POST['kategori_produk'];
		$long_desc = $_POST['long_desc'];
		$status = $_POST['status'];
		$gambar = $_FILES['gambar']['name'];
		foreach ($mysqli->user_sesi($sesi_id) as $sesi);
		$sesi_level = $sesi['level'];
		if ($sesi_level == 1) {
			foreach ($mysqli->tambah_produk($nama, $short_desc, $kategori, $long_desc, $status, $gambar, $date, $field1, $field2) as $d);
		} else {
			echo "<script>alert('Anda tidak dapat menambah data ini!')
					window.location.href = '../';
					;</script>";
		}


		$id = $d['last_id'];
		header("Location: ../?page=edit_produk&id=$id");
	} else if ($aksi == 'update_produk') {
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$field1 = $_POST['field1'];
		$field2 = $_POST['field2'];
		$short_desc = $_POST['short_desc'];
		$kategori = $_POST['kategori_produk'];
		$long_desc = $_POST['long_desc'];
		$status = $_POST['status'];
		$gambar = $_FILES['gambar']['name'];
		foreach ($mysqli->user_sesi($sesi_id) as $sesi);
		$sesi_level = $sesi['level'];
		if ($sesi_level == 1) {
			$mysqli->update_produk($nama, $short_desc, $kategori,  $long_desc, $status, $gambar, $date, $id, $field1, $field2);
		} else {
			echo "<script>alert('Anda tidak dapat mengubah data ini!')
					window.location.href = '../';
					;</script>";
		}

		if ($mysqli == true) {
			header("Location: ../?page=daftar_produk");
		}
	} else if ($aksi == 'update_rekening') {
		$id = $_POST['id'];
		$nama_bank = $_POST['nama_bank'];
		$status = $_POST['status'];
		$nomor = $_POST['nomor'];
		$pemilik = $_POST['pemilik'];
		foreach ($mysqli->user_sesi($sesi_id) as $sesi);
		$sesi_level = $sesi['level'];
		if ($sesi_level == 1) {
			$mysqli->update_rekening($nama_bank, $status, $nomor, $pemilik, $id);
		} else {
			echo "<script>alert('Anda tidak dapat mengubah data ini!')
					window.location.href = '../';
					;</script>";
		}

		if ($mysqli == true) {
			header("Location: ../?page=daftar_rekening");
		}
	} else if ($aksi == 'tambah_rekening') {
		$nama_bank = $_POST['nama_bank'];
		$status = $_POST['status'];
		$nomor = $_POST['nomor'];
		$pemilik = $_POST['pemilik'];
		foreach ($mysqli->user_sesi($sesi_id) as $sesi);
		$sesi_level = $sesi['level'];
		if ($sesi_level == 1) {
			$mysqli->tambah_rekening($nama_bank, $status, $nomor, $pemilik);
		} else {
			echo "<script>alert('Anda tidak dapat menambah data ini!')
					window.location.href = '../';
					;</script>";
		}

		if ($mysqli == true) {
			header("Location: ../?page=daftar_rekening");
		}
	} else if ($aksi == 'tambah_sub_produk') {
		$nama = $_POST['nama'];
		$harga = str_replace(',', '', $_POST['harga']);
		$code = $_POST['code'];
		$val_mark = $_POST['val_mark'];
		$id = $_POST['id'];
		foreach ($mysqli->user_sesi($sesi_id) as $sesi);
		$sesi_level = $sesi['level'];
		if ($sesi_level == 1) {
			$mysqli->tambah_sub_produk($nama, $harga, $code, $val_mark, $id);
		} else {
			echo "<script>alert('Anda tidak dapat menambah data ini!')
					window.location.href = '../';
					;</script>";
		}

		if ($mysqli == true) {
			echo 'success';
		}
	} else if ($aksi == 'update_pesanan') {
		$id = $_POST['id'];
		$status = $_POST['status'];
		foreach ($mysqli->user_sesi($sesi_id) as $sesi);
		$sesi_level = $sesi['level'];
		if ($sesi_level == 1) {
			if ($status == null) {
				echo "<script> 
					window.location.href = '../?page=daftar_pesanan';
					;</script>";
			} else {
				$mysqli->update_pesanan($id, $status);
			}
		} else {
			echo "<script>alert('Anda tidak dapat mengubah data ini!');
					window.location.href = '../';
					;</script>";
		}

		if ($mysqli == true) {
			header("Location: ../?page=daftar_pesanan");
		}
	} else if ($aksi == 'update_saldo') {
		$id = $_POST['id'];
		$status = $_POST['status'];
		foreach ($mysqli->user_sesi($sesi_id) as $sesi);
		$sesi_level = $sesi['level'];
		if ($sesi_level == 1) {
			if ($status == null) {
				echo "<script> 
					window.location.href = '../?page=daftar_topup';
					;</script>";
			} else {
				if ($status == 1) {
					$remark = '';
				} else if ($status == 3) {
					$remark = 'Pembayaran tidak valid';
				} else if ($status == 9) {
					$remark = 'Pending Deposit';
				}
				$mysqli->update_saldo($id, $status, $remark);
			}
		} else {
			echo "<script>alert('Anda tidak dapat mengubah data ini!');
					window.location.href = '../';
					;</script>";
		}

		if ($mysqli == true) {
			header("Location: ../?page=daftar_topup");
		}
	} else if ($aksi == 'update_payout') {
		$id = $_POST['id'];
		$status = $_POST['status'];
		foreach ($mysqli->user_sesi($sesi_id) as $sesi);
		$sesi_level = $sesi['level'];
		if ($sesi_level == 1) {
			if ($status == null) {
				echo "<script> 
					window.location.href = '../?page=daftar_topup';
					;</script>";
			} else {
				if ($status == 1) {
					$remark = 'Penarikan selesai';
					$mysqli->update_saldo($id, $status, $remark);
				}
			}
		} else {
			echo "<script>alert('Anda tidak dapat mengubah data ini!');
					window.location.href = '../';
					;</script>";
		}

		if ($mysqli == true) {
			header("Location: ../?page=daftar_topup");
		}
	} else if ($aksi == 'top_up') {
		$nominal = str_replace(',', '', $_POST['nominal']);
		foreach ($mysqli->top_up($sesi_id, $nominal, $date) as $d);
		echo $d['last_id'];
		echo "<script>alert('success deposit!');
					window.location.href = '../dashboard.php?page=deposit2';
					;</script>";
	}
}
