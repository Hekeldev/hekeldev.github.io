<?php 
date_default_timezone_set('Asia/Jakarta');
include("database.php"); 
$mysqli = new databases(); 
function generateRandomString($length) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
if ( $_SERVER['REQUEST_METHOD']=='GET' && realpath(__FILE__) == realpath( $_SERVER['SCRIPT_FILENAME'] ) ) {	
	header('location:../');
}
else{  
	session_start(); 
	if(isset($_SESSION['user_id'])){
		$sesi_id = $_SESSION['user_id']; 
	}else{
		$sesi_id = null;
	} 
	$aksi = $_GET['aksi'];	
	$date = date('Y-m-d H:i:s');

	//New If
	if($aksi=='daftar'){ 
		$username = str_replace(" ","",$_POST['username']);  
		$nama = $_POST['name']; 
		$email = str_replace(" ","",$_POST['email']);  
		$kontak = str_replace(" ","",$_POST['hp']);  
		$sandi = md5($_POST['sandi1']);
		$sandi2 = md5($_POST['sandi2']);

		//Memeriksa Email
		foreach($mysqli->user_cek_email($email)as $cek_email); 
		if($cek_email['jumlah']>0){
			echo 'email';
		}else{
			//Memeriksa Username
			foreach($mysqli->user_cek_username($username)as $cek_username); 
			if($cek_username['jumlah']>0){
				echo 'username';
			}else{
				//Memeriksa Kata Sandi
				if($sandi!==$sandi2){
					echo 'sandi';
				}else{
					//Memeriksa Nomor Handphone
					foreach($mysqli->user_cek_kontak($kontak)as $cek_kontak); 
					if($cek_kontak['jumlah']>0){
						echo 'kontak';
					}else{
						//Validasi Berhasil->Insert dan Login
						$mysqli->daftar($username,$nama,$email, $sandi, $kontak);
						echo 'berhasil';
					}
				}
			}
		} 
	}
	else if($aksi=='login'){
		$user = $_POST['user'];
		$password = md5($_POST['password']);
		$agent= $_SERVER['HTTP_USER_AGENT'];
		$ip= $_SERVER['REMOTE_ADDR'];
		foreach($mysqli->login($user,$password)as $d);
		$cek=$d['jumlah'];
		if($cek>0){
			$id = $d['id'];
			echo 'berhasil'; 
			$_SESSION['user_id'] = $id ; 
			$log = 'Berhasil';
		}else{
			echo 'gagal';
			$log = 'Gagal';
		}

		$mysqli->log_user($user, $agent, $ip, $log, $date);
	} 
	else if($aksi=='delete'){
		$id_produk   = $_POST['id'];
		$date_user   = $_POST['date_user'];
		$type  		 = $_POST['type'];
		 
		$mysqli->delete($sesi_id, $id_produk, $date_user, $type); 

		if($mysqli==true){
			header("Location: {$_SERVER['HTTP_REFERER']}");
		}	
	} 
	else if($aksi=='order'){ 
		$field1 = $_POST['field1'];
		$field2 = $_POST['field2'];
		$field1name = $_POST['field1name'];
		$field2name = $_POST['field2name'];
		$no_wa = $_POST['no_wa'];
		$rekening = $_POST['rekening'];
		$id = $_POST['id_list']; 
		$akun = $field1name.':'.$field1.'~'.$field2name.':'.$field2;
		$kode = generateRandomString(5);
		
		foreach($mysqli->cek_order($sesi_id)as $cek);
		$orderan = $cek['jumlah'];

		if($orderan>0){
			echo "<script>alert('Ada pesanan yang belum selesai!')
					window.location.href = '../?page=home';
					;</script>";
		}else{  
			foreach($mysqli->produk_list_data($id)as $d);
			$nama_produk = $d['nama_produk'];
			$nama_list = $d['nama_list'];
			$code = $d['code_mark'];
			$val = $d['val_mark'];
			if($code=='percent'){
			$harga =  $d['harga'] + (($val/100) * $d['harga']);
			}else{
			$harga =  $d['harga'] + $val;
			}
			$invoice_remark = $nama_produk.'~'.$nama_list.'~'.$harga;
			if($rekening=='saldo'){
				foreach($mysqli->saldo_akun($sesi_id)as $saldo);
				$saldo_akun = $saldo['saldo'];
				if($harga<=$saldo_akun){ 
					foreach($mysqli->checkout($sesi_id, $date, $rekening, $invoice_remark, $kode, $no_wa, $akun, $harga, $status=9)as $x); 
					$id_invoice = $x['last_id'];
					//Potong Saldo
					$mysqli->bayar_saldo($sesi_id, $harga, $date, $id_invoice);
					header("Location: ../?page=invoice&ref=$kode");
					
				}else{
					echo "<script>alert('Gagal! Saldo tidak mencukupi, harap TopUp terlebih dahulu atau gunakan metode pembayaran lain.')
						window.location.href = '../?page=home';
						;</script>";
				}
			}else{
				$mysqli->checkout($sesi_id, $date, $rekening, $invoice_remark, $kode, $no_wa, $akun, $harga, $status=0); 
				header("Location: ../?page=invoice&ref=$kode");
			}
			
		}
 
	}
	else if($aksi=='cek_invoice'){ 
		$invoice = $_POST['invoice'];
		$kode = $_POST['referensi'];

		foreach($mysqli->cek_invoice($invoice,$kode)as $d);
		$row = $d['jumlah'];
		if($row>0){
			echo 'valid';
		}else{
			echo 'invalid';
		}

	}
	else if($aksi=='konfirmasi_pembayaran'){ 
		$invoice = $_POST['invoice']; 
		$bank = strtoupper($_POST['bank']);
		$rekening = $_POST['rekening'];
		$nama = ucwords($_POST['nama']);
		$gambar = $_FILES['gambar']['name']; 
		$waktu = date('D d-m-Y H:i');

		$mysqli->konfirmasi_pembayaran($invoice,$sesi_id,$bank,$rekening,$nama,$date,$gambar);
		 
	}
	else if($aksi=='konfirmasi_topup'){ 
		$id = $_POST['id']; 
		$bank = strtoupper($_POST['bank']);
		$rekening = $_POST['rekening'];
		$nama = ucwords($_POST['nama']);
		
		$waktu = date('D d-m-Y H:i');

		$mysqli->konfirmasi_topup($id,$sesi_id,$bank,$rekening,$nama,$date);
		 

	}
	else if($aksi=='tarik_saldo'){  
		$bank = strtoupper($_POST['bank']);
		$rekening = $_POST['rekening'];
		$nama = ucwords($_POST['nama']); 
		$nominal = str_replace(',','',$_POST['nominal']);  
		$data = $bank.'~'.$rekening.'~'.$nama;
		foreach($mysqli->saldo_akun($sesi_id)as $d);
		$saldo = $d['saldo'];
		if($nominal<=$saldo){
			$mysqli->tarik_saldo($sesi_id,$data,$nominal,$date);
			echo 'success';
		}else{
			echo 'gagal';
		}
		
		 

	}
	else if($aksi=='update_profile'){ 
		$nama = ucwords($_POST['nama']); 
		$kontak = $_POST['kontak'];
		$email = strtolower($_POST['email']);
		$gambar = $_FILES['gambar']['name']; 

		foreach($mysqli->user_sesi($sesi_id)as $d);
		$email_ex = $d['email'];
		$kontak_ex = $d['kontak'];

		if($email==$email_ex && $kontak==$kontak_ex){
			$mysqli->update_profile($nama,$kontak,$email,$gambar,$sesi_id);
			if($mysqli==true){
				header("Location: ../?page=profile");
			}
		}else{
			if($email!==$email_ex){
				foreach($mysqli->cek_user_email($email,$hp=$kontak)as $d);
				$cek=$d['jumlah'];
				if($cek>0){
					echo "<script>alert('Email telah terdaftar!')
					window.location.href = '../?page=profile';
					;</script>";
					//header("location : ../?page=profile");
				}else{
					$mysqli->update_profile($nama,$kontak,$email,$gambar,$sesi_id);
					if($mysqli==true){
						header("Location: ../?page=profile");
					}
				}
			}else if($kontak!==$kontak_ex){
				foreach($mysqli->cek_user_kontak($hp=$kontak)as $d);
				$cek=$d['jumlah'];
				if($cek>0){
					echo "<script>alert('Nomor handphone telah terdaftar!')
					window.location.href = '../?page=profile';
					;</script>";
					//header("location : ../?page=profile");
				}else{
					$mysqli->update_profile($nama,$kontak,$email,$gambar,$sesi_id);
					if($mysqli==true){
						header("Location: ../?page=profile");
					}
				}
			}
			
		}
 
	} 
	else if($aksi=='update_sandi'){ 
		$sandi_lama = md5($_POST['old']);	
		$sandi_baru = $_POST['new1'];	
		$konfirmasi_sandi = $_POST['new2'];	
		$new = md5($sandi_baru);

		foreach($mysqli->user_sesi($sesi_id)as $d){
			$password = $d['password'];
		}
		
		if($sandi_lama==$password){
			if($sandi_baru==$konfirmasi_sandi){
				$mysqli->update_password($new, $sesi_id);
				echo 'success';
			}else{
				echo 'error';
			}
		}else{
			echo 'false';
		}
	}  
	else if($aksi=='tambah_produk'){   
		$nama = $_POST['nama'];  
		$field1 = $_POST['field1'];  
		$field2 = $_POST['field2'];  
		$short_desc = $_POST['short_desc'];  
		$kategori = $_POST['kategori_produk'];   
		$long_desc = $_POST['long_desc'];  
		$status = $_POST['status'];   
		$gambar = $_FILES['gambar']['name']; 
		foreach($mysqli->user_sesi($sesi_id)as $sesi);
		$sesi_level = $sesi['level'];
		if($sesi_level==1){   
			foreach($mysqli->tambah_produk($nama,$short_desc,$kategori, $long_desc, $status, $gambar, $date, $field1, $field2)as $d);
		}else{
			echo "<script>alert('Anda tidak dapat menambah data ini!')
					window.location.href = '../';
					;</script>";
		}


			$id = $d['last_id'];
			header("Location: ../?page=edit_produk&id=$id");
		
		

	}
	else if($aksi=='update_produk'){   
		$id = $_POST['id'];  
		$nama = $_POST['nama'];  
		$field1 = $_POST['field1'];  
		$field2 = $_POST['field2'];  
		$short_desc = $_POST['short_desc'];  
		$kategori = $_POST['kategori_produk'];  
		$long_desc = $_POST['long_desc'];  
		$status = $_POST['status'];   
		$gambar = $_FILES['gambar']['name']; 
		foreach($mysqli->user_sesi($sesi_id)as $sesi);
		$sesi_level = $sesi['level'];
		if($sesi_level==1){    
			$mysqli->update_produk($nama,$short_desc,$kategori,  $long_desc, $status, $gambar, $date, $id, $field1, $field2);
		}else{
			echo "<script>alert('Anda tidak dapat mengubah data ini!')
					window.location.href = '../';
					;</script>";
		}

		if($mysqli==true){
			header("Location: ../?page=daftar_produk");
		}
		

	}
	else if($aksi=='update_rekening'){   
		$id = $_POST['id'];  
		$nama_bank = $_POST['nama_bank'];  
		$status = $_POST['status'];  
		$nomor = $_POST['nomor'];  
		$pemilik = $_POST['pemilik'];  
		foreach($mysqli->user_sesi($sesi_id)as $sesi);
		$sesi_level = $sesi['level'];
		if($sesi_level==1){   
			$mysqli->update_rekening($nama_bank,$status,$nomor, $pemilik, $id);
		}else{
			echo "<script>alert('Anda tidak dapat mengubah data ini!')
					window.location.href = '../';
					;</script>";
		}

		if($mysqli==true){
			header("Location: ../?page=daftar_rekening");
		}
		

	}
	else if($aksi=='tambah_rekening'){    
		$nama_bank = $_POST['nama_bank'];  
		$status = $_POST['status'];  
		$nomor = $_POST['nomor'];  
		$pemilik = $_POST['pemilik'];  
		foreach($mysqli->user_sesi($sesi_id)as $sesi);
		$sesi_level = $sesi['level'];
		if($sesi_level==1){   
			$mysqli->tambah_rekening($nama_bank, $status, $nomor, $pemilik);
		}else{
			echo "<script>alert('Anda tidak dapat menambah data ini!')
					window.location.href = '../';
					;</script>";
		}

		if($mysqli==true){
			header("Location: ../?page=daftar_rekening");
		}
		

	}
	else if($aksi=='tambah_sub_produk'){    
		$nama = $_POST['nama'];  
		$harga = str_replace(',','',$_POST['harga']);  
		$code = $_POST['code'];  
		$val_mark = $_POST['val_mark'];  
		$id = $_POST['id'];  
		foreach($mysqli->user_sesi($sesi_id)as $sesi);
		$sesi_level = $sesi['level'];
		if($sesi_level==1){   
			$mysqli->tambah_sub_produk($nama, $harga, $code, $val_mark, $id);
		}else{
			echo "<script>alert('Anda tidak dapat menambah data ini!')
					window.location.href = '../';
					;</script>";
		}

		if($mysqli==true){
			echo 'success';
		}
		

	}
	else if($aksi=='update_pesanan'){   
		$id = $_POST['id'];  
		$status = $_POST['status'];   
		foreach($mysqli->user_sesi($sesi_id)as $sesi);
		$sesi_level = $sesi['level'];
		if($sesi_level==1){   
			if($status==null){
				echo "<script> 
					window.location.href = '../?page=daftar_pesanan';
					;</script>";
			}else{
				$mysqli->update_pesanan($id,$status);
			}
		}else{
			echo "<script>alert('Anda tidak dapat mengubah data ini!');
					window.location.href = '../';
					;</script>";
		}

		if($mysqli==true){
			header("Location: ../?page=daftar_pesanan");
		} 
	}
	else if($aksi=='update_saldo'){   
		$id = $_POST['id'];  
		$status = $_POST['status'];   
		foreach($mysqli->user_sesi($sesi_id)as $sesi);
		$sesi_level = $sesi['level'];
		if($sesi_level==1){   
			if($status==null){
				echo "<script> 
					window.location.href = '../?page=daftar_topup';
					;</script>";
			}else{
				if($status==NULL){
					$remark = 'APPROVED';
				}else if($status==3){
					$remark = 'REJECTED';
				}else if($status==9){
					$remark = 'PROGRESS';
				}
				$mysqli->update_saldo($id,$status,$remark);
			}
		}else{
			echo "<script>alert('Anda tidak dapat mengubah data ini!');
					window.location.href = '../';
					;</script>";
		}

		if($mysqli==true){
			header("Location: ../?page=daftar_topup");
		} 
	}
	else if($aksi=='update_payout'){   
		$id = $_POST['id'];  
		$status = $_POST['status'];   
		foreach($mysqli->user_sesi($sesi_id)as $sesi);
		$sesi_level = $sesi['level'];
		if($sesi_level==1){   
			if($status==null){
				echo "<script> 
					window.location.href = '../?page=daftar_topup';
					;</script>";
			}else{
				if($status==null){
					$remark = 'Penarikan selesai';
					$mysqli->update_saldo($id,$status,$remark);
				} 
			}
		}else{
			echo "<script>alert('Anda tidak dapat mengubah data ini!');
					window.location.href = '../';
					;</script>";
		}

		if($mysqli==true){
			header("Location: ../?page=daftar_topup");
		} 
	}
	else if($aksi=='top_up'){   
		$nominal = str_replace(',','',$_POST['nominal']);  
		foreach($mysqli->top_up($sesi_id, $nominal, $date)as $d);
		$d['last_id'];
		echo "success";
	}
}
?>