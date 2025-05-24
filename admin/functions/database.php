<?php 
include("koneksi.php"); 
date_default_timezone_set('Asia/Jakarta'); 
class databases{
		
	public function __construct(){
		$db = new DatabaseConnection;
		$this->conn = $db->conn;
	}
	public function compressImage($source, $destination, $quality) {
		$info = getimagesize($source);
		if ($info['mime'] == 'image/jpeg') 
		  $image = imagecreatefromjpeg($source);
		elseif ($info['mime'] == 'image/gif') 
		  $image = imagecreatefromgif($source);
		elseif ($info['mime'] == 'image/png') 
		  $image = imagecreatefrompng($source);
		imagejpeg($image, $destination, $quality);
	}

	//User-General
	public function daftar($username,$nama,$email, $sandi, $kontak){
		$id = md5(date('Y-m-d H:i:s'));
		$this->conn->query("INSERT INTO user(username,nama,email,kontak,password) values('$username','$nama','$email','$kontak', '$sandi')"); 
		// $last_id = $this->conn->insert_id;
		// session_start();
		// $_SESSION['user_id'] = $last_id; 
		// echo 'berhasil';

	}
	public function user_cek_email($email){
		$hasil = $this->conn->query("SELECT count(*)as jumlah from user where email='$email'");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		}
		return $result;
	}
	public function user_cek_username($username){
		$hasil = $this->conn->query("SELECT count(*)as jumlah from user where username='$username'");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		}
		return $result;
	}
	public function user_cek_kontak($kontak){
		$hasil = $this->conn->query("SELECT count(*)as jumlah from user where kontak='$kontak'");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		}
		return $result;
	}

	public function log_user($user, $agent, $ip, $log, $date){
		$this->conn->query("INSERT INTO user_log (nama, ip, agent, log, waktu) VALUES('$user', '$ip', '$agent', '$log', '$date')");

		return true; 
	} 
	public function cek_user($email,$kontak){
		$hasil = $this->conn->query("SELECT count(*)as jumlah from user where email='$email' or kontak='$kontak'");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		}
		return $result;
	}
	public function cek_user_email($email){
		$hasil = $this->conn->query("SELECT count(*)as jumlah from user where email='$email'");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		}
		return $result;
	}
	public function cek_user_kontak($hp){
		$hasil = $this->conn->query("SELECT count(*)as jumlah from user where kontak='$hp'");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		}
		return $result;
	}	
	public function cek_user_uuid($sesi_id){
		$hasil = $this->conn->query("SELECT * FROM user where uuid_user='$sesi_id'");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		} 

		return $result;
	} 	
	public function login($user,$password){
		$hasil = $this->conn->query("SELECT id,count(*)as jumlah from user where username='$user' and password='$password' or email='$user' and password='$password'");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		}
		return $result;
	}
	public function user($user){
		$hasil = $this->conn->query("SELECT * from user where email='$user' or kontak='$user' ");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		}
		return $result;
	}
	public function user_sesi($sesi_id){
		$hasil = $this->conn->query("SELECT * from user where id='$sesi_id' ");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		}
		return $result;
	}
	public function user_id($user_id){
		$hasil = $this->conn->query("SELECT * from user where id='$user_id'");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		}
		return $result;
	}
	public function delete($sesi_id, $id_produk, $date_user, $type){
		if($type=='produk'){
			$this->conn->query("delete from produk where id_produk='$id_produk' "); 
			$this->conn->query("delete from produk_list where id_produk='$id_produk' "); 
			$success = "produk";
		}else if($type=='produk_list'){ 
			$this->conn->query("delete from produk_list where id_list='$id_produk' "); 
			$success = "produk";
		}else if($type=='rekening'){
			$this->conn->query("delete from admin_rekening where id='$id_produk' "); 
			$success = "rekening";
		} 
		return true;
	}
	public function list_bank(){ 
		$hasil = $this->conn->query("SELECT * FROM admin_rekening where status=1");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		} 

		return $result;
	} 	
	public function list_bank_id($id){
		if($id==''){
			$where = '';
		}else{
			$where = "where id='$id'";
		}
		$hasil = $this->conn->query("SELECT * FROM admin_rekening $where");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		} 

		return $result;
	} 	  
	public function update_password($new, $sesi_id){
		$this->conn->query("UPDATE user set password='$new' where id='$sesi_id'");

		return true; 
	}
	public function update_profile($nama, $kontak, $email, $gambar, $sesi_id){
		$filename = $_FILES['gambar']['name'];
		$angka_acak     = md5(rand(1,9999999));
		$nama_gambar_baru = $angka_acak.'-'.$filename; 
		$target_file = '../upload/profile/'.$nama_gambar_baru;
		$file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
		$file_extension = strtolower($file_extension); 
		$valid_extension = array("png","jpeg","jpg");
		$ukuran	= $_FILES['gambar']['size'];
		
		if(in_array($file_extension, $valid_extension) && $ukuran <1044070) {
			move_uploaded_file($_FILES['gambar']['tmp_name'],$target_file);
			//compressImage($_FILES['gambar']['tmp_name'],$target_file,75);
			$gambar = ",avatar='$nama_gambar_baru'";
		}else {
			$gambar = "";
		}

		$this->conn->query("UPDATE user set nama='$nama', email='$email', kontak='$kontak' $gambar where id='$sesi_id'");
		
		return true; 
	} 
	public function tambah_sub_produk($nama, $harga, $code, $val_mark, $id){  
		$this->conn->query("INSERT INTO produk_list(id_produk, nama_list, harga, code_mark, val_mark) VALUE ('$id','$nama', '$harga', '$code', '$val_mark')");
		
		return true; 
	} 

	//Pesanan->Checkout->Bayar->Invoice->Cek_Stok
	//Status Invoice 0:pending, 1:checkout, 2:proses, 3:batal, 4:selesai, 9:Menunggu Konfirmasi 
	public function konfirmasi_pembayaran($invoice,$sesi_id,$bank,$rekening,$nama,$date,$gambar){
		$filename = $_FILES['gambar']['name'];
		$angka_acak     = md5(rand(1,9999999));
		$nama_gambar_baru = $angka_acak.'-'.$filename; 
		$target_file = '../upload/bukti_tf/'.$nama_gambar_baru;
		$file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
		$file_extension = strtolower($file_extension); 
		$valid_extension = array("png","jpeg","jpg");
		$ukuran	= $_FILES['gambar']['size'];
		
		if(in_array($file_extension, $valid_extension) && $ukuran <2444070) {
			move_uploaded_file($_FILES['gambar']['tmp_name'],$target_file);
			//compressImage($_FILES['gambar']['tmp_name'],$target_file,75);
			
			$this->conn->query("INSERT INTO invoice_validasi(id_user,nama_pengirim,bank_pengirim,rekening_pengirim,id_invoice,date,bukti)values('$sesi_id','$nama','$bank','$rekening','$invoice','$date','$nama_gambar_baru')");

			$query = $this->conn->query("SELECT status_invoice,count(*)as jumlah from invoice where id_user='$sesi_id' and id_invoice='$invoice'");

			$d = mysqli_fetch_array($query);
			$cek = $d['jumlah'];
			$status = $d['status_invoice'];
			if($cek>0){
				if($status==0){
					$this->conn->query("UPDATE invoice set status_invoice=9 where id_invoice='$invoice'");
				}
			}

			echo "<script>alert('Bukti pembayaran berhasil dibuat!')
					window.location.href = '../';
					;</script>";
		}else {
			echo "<script>alert('Gambar tidak diperbolehkan atau gambar melebihi batas (Maks. 2Mb).')
					window.location.href = '../';
					;</script>";
		} 
	}
	public function konfirmasi_topup($id,$sesi_id,$bank,$rekening,$nama,$date){
		
		
		
			
			$this->conn->query("INSERT INTO saldo_validasi(id_user,nama_pengirim,bank_pengirim,rekening_pengirim,id_saldo,date)values('$sesi_id','$nama','$bank','$rekening','$id','$date')");

			$query = $this->conn->query("SELECT status,count(*)as jumlah from saldo where id_user='$sesi_id' and id='$id'");

			$d = mysqli_fetch_array($query);
			$cek = $d['jumlah'];
			
			if($cek> 'konfir'){
				if($status== 'konfir'){
					$this->conn->query("UPDATE saldo set status=null, remark='PROGRESS' where id='$id'");
				}
			}

			echo "<script>alert('Deposit sukses terkirim')
			window.location.href = '../../m/deposit.php';
			;</script>";
		}
	


	public function checkout($sesi_id, $date, $rekening, $invoice_remark, $kode, $no_wa, $akun, $harga, $status){
		$this->conn->query("INSERT INTO invoice(id_user, date_invoice, metode_bayar, invoice_remark, kode_invoice, no_wa, akun, bayar, status_invoice) values('$sesi_id', '$date', '$rekening', '$invoice_remark', '$kode', '$no_wa', '$akun', '$harga', '$status')");

		$last_id = $this->conn->insert_id;

		$result[] = array(
			'last_id' => $last_id,
		);
		return $result; 
	}	 
	public function cek_order($sesi_id){
		$hasil = $this->conn->query("SELECT *,count(*) as jumlah from invoice where 
									status_invoice!=3 	 
									and
									status_invoice!=4 	and  id_user='$sesi_id'  
									or
									invoice.status_invoice=0 and  id_user='$sesi_id'  
									and 
									date_invoice BETWEEN DATE_SUB(NOW(), INTERVAL 24 HOUR) AND NOW()
									or
									invoice.status_invoice=1 and  id_user='$sesi_id'  
									and 
									date_invoice BETWEEN DATE_SUB(NOW(), INTERVAL 24 HOUR) AND NOW()
									or
									invoice.status_invoice=2 and  id_user='$sesi_id'  
									and 
									date_invoice BETWEEN DATE_SUB(NOW(), INTERVAL 24 HOUR) AND NOW()
									or
									invoice.status_invoice=9 and  id_user='$sesi_id'  
									and 
									date_invoice BETWEEN DATE_SUB(NOW(), INTERVAL 48 HOUR) AND NOW()
									
									");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		} 
		//Tidak dihitung 3 : Batal, if 1: 0->Tanpa tinjauan pengguna 2hari, if 2: 1->Tanpa konfirmasi 2hari, if 3 : 9-> Tidak di konfirmasi owner 7hari
		return $result;
	}  
	public function invoice($kode){
		$hasil = $this->conn->query("SELECT * FROM invoice 
									 left join user on user.id = invoice.id_user
									where invoice.kode_invoice='$kode'");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		} 

		return $result;
	} 
	public function invoice_sesi($sesi_id){
		$hasil = $this->conn->query("SELECT * from invoice where id_user='$sesi_id' order by id_invoice desc	");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		} 

		return $result;
	}  
	public function cek_invoice($invoice,$kode){
		$hasil = $this->conn->query("Select count(*)as jumlah from invoice where id_invoice='$invoice' and kode_invoice='$kode'");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		} 

		return $result;
	} 

	//Produk
	public function produk($data_id,$limit){
		if($data_id!==null){
			$where = "where produk.id_produk='$data_id' and produk.status_produk=1";
		}else{
			$where = "where produk.status_produk=1";
		}

		if($limit!==''){
			$limit = "limit $limit";
		}else{
			$limit = "";
		}

		$hasil = $this->conn->query("SELECT * from produk  
		$where order by rand() $limit 
		");
		$row = mysqli_num_rows($hasil);
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		}
		return $result;
		
		
	}
	public function produk_list($id){ 
		$hasil = $this->conn->query("SELECT * from produk_list 
		left join produk on produk.id_produk = produk_list.id_produk
		where produk_list.id_produk='$id'"); 
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		}
		return $result; 
	}
	public function produk_data($id){ 
		if($id!==null){
			$where = "where produk.id_produk='$id'";
		}else{
			$where = "";
		}
		$hasil = $this->conn->query("SELECT * from produk $where"); 
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		}
		return $result; 
	}
	public function produk_list_join(){ 
		$hasil = $this->conn->query("SELECT * from produk_list join produk on produk.id_produk = produk_list.id_produk where produk.status_produk=1"); 
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		}
		return $result; 
	}
	public function produk_list_data($id){ 
		$hasil = $this->conn->query("SELECT * from produk_list 
		left join produk on produk.id_produk = produk_list.id_produk
		where produk_list.id_list='$id'"); 
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		}
		return $result; 
	} 
	public function kategori_produk(){  
		$hasil = $this->conn->query("SELECT * from produk_kategori order by nama_kategori asc
		");
		$row = mysqli_num_rows($hasil);
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		}
		return $result;
		
		
	}

	//Admin 
	public function tambah_produk($nama,$short_desc,$kategori, $long_desc, $status, $gambar, $date, $field1, $field2){
		$filename = $_FILES['gambar']['name'];
		$angka_acak     = md5(rand(1,9999999));
		$nama_gambar_baru = $angka_acak.'-'.$filename; 
		$target_file = '../upload/produk/'.$nama_gambar_baru;
		$file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
		$file_extension = strtolower($file_extension); 
		$valid_extension = array("png","jpeg","jpg");
		$ukuran	= $_FILES['gambar']['size'];
		
		if(in_array($file_extension, $valid_extension)) {
			move_uploaded_file($_FILES['gambar']['tmp_name'],$target_file);
			//compressImage($_FILES['gambar']['tmp_name'],$target_file,75);

		$this->conn->query("INSERT INTO produk(nama_produk, short_desc, long_desc,  status_produk, gbr_produk, tipe_produk, last_update, field_1, field_2) values('$nama', '$short_desc', '$long_desc', '$status', '$nama_gambar_baru', '$kategori' , '$date', '$field1', '$field2')");

		}else {
			$this->conn->query("INSERT INTO produk(nama_produk, short_desc, long_desc,  status_produk, gbr_produk, tipe_produk, last_update, field_1, field_2) values('$nama', '$short_desc', '$long_desc','$status', 'default.png', '$kategori' , '$date', '$field1', '$field2')");

		} 
		$last_id = $this->conn->insert_id;

		$result[] = array(
			'last_id' => $last_id,
		);
		return $result; 
	}
	public function tambah_rekening($nama_bank, $status, $nomor, $pemilik){
		$this->conn->query("INSERT INTO admin_rekening  (nama_bank, nomor_rekening, nama_pemilik, status) VALUES('$nama_bank', '$nomor', '$pemilik', '$status')");

		return true; 
	}
	public function update_pesanan($id,$status){
		$this->conn->query("UPDATE invoice set status_invoice='$status' where id_invoice='$id'");

		return true; 
	}
	public function update_saldo($id,$status, $remark){
		$this->conn->query("UPDATE saldo set status='$status', remark='$remark' where id='$id'");

		return true; 
	}
	public function update_produk($nama,$short_desc,$kategori, $long_desc, $status, $gambar, $date, $id, $field1, $field2){
		$filename = $_FILES['gambar']['name'];
		$angka_acak     = md5(rand(1,9999999));
		$nama_gambar_baru = $angka_acak.'-'.$filename; 
		$target_file = '../upload/produk/'.$nama_gambar_baru;
		$file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
		$file_extension = strtolower($file_extension); 
		$valid_extension = array("png","jpeg","jpg");
		$ukuran	= $_FILES['gambar']['size'];
		
		if(in_array($file_extension, $valid_extension)) {
			move_uploaded_file($_FILES['gambar']['tmp_name'],$target_file);
			//compressImage($_FILES['gambar']['tmp_name'],$target_file,75);
			$new_gbr = ",gbr_produk='$nama_gambar_baru'";
		}else {
			$new_gbr = '';
		}
		$this->conn->query("UPDATE produk set nama_produk='$nama', short_desc='$short_desc', long_desc='$long_desc', status_produk='$status',  tipe_produk='$kategori', last_update='$date', field_1='$field1', field_2='$field2' $new_gbr where id_produk='$id'");

		return true; 
	} 
	public function update_rekening($nama_bank,$status,$nomor, $pemilik, $id){
		$this->conn->query("UPDATE admin_rekening set nama_bank='$nama_bank', nomor_rekening='$nomor', nama_pemilik='$pemilik', status='$status' where id='$id'");

		return true; 
	}
	public function list_bayar($id){
		$hasil = $this->conn->query("Select * from invoice_validasi where id_invoice='$id'");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		} 

		return $result;
	} 
	public function list_bayar_saldo($id){
		$hasil = $this->conn->query("Select * from saldo_validasi where id_saldo='$id'");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		} 

		return $result;
	} 
	public function list_transaksi(){
		$hasil = $this->conn->query("SELECT * from invoice order by id_invoice desc");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		} 

		return $result;
	} 
	public function saldo_akun($sesi_id){
		$hasil = $this->conn->query("SELECT 
		sum(case WHEN saldo_flow='deposit' and status=null then nominal else null end) as masuk,
		sum(case WHEN saldo_flow='out' and status=null then nominal else null end) as keluar
		
		from saldo
		where id_user='$sesi_id'");
		$d = mysqli_fetch_array($hasil);
		$saldo = $d['masuk']-$d['keluar'];
		
		$result[] = array(
			'saldo' => $saldo,
		);

		return $result;
	} 
	public function saldo($sesi_id){
		$hasil = $this->conn->query("SELECT * from saldo where id_user='$sesi_id' order by id desc");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		} 

		return $result;
	} 
	public function saldo_admin(){
		$hasil = $this->conn->query("SELECT *,saldo.id as id_saldo from saldo left join user on user.id = saldo.id_user order by saldo.id desc");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		} 

		return $result;
	} 
	public function top_up($sesi_id, $nominal, $date){
		$this->conn->query("INSERT INTO saldo(id_user,nominal,saldo_flow,remark,status,date) VALUES('$sesi_id', '$nominal', 'DEPOSIT', 'PROGRESS', 'progress', '$date')");
		$last_id = $this->conn->insert_id;

		$result[] = array(
			'last_id' => $last_id,
		);
		return $result; 
	} 
	public function bayar_saldo($sesi_id, $harga, $date, $id_invoice){
		$this->conn->query("INSERT INTO saldo(id_user,nominal,saldo_flow,remark,status,date) VALUES('$sesi_id', '$harga', 'out', 'Pembayaran invoice #$id_invoice', ' ', '$date')"); 
 
	} 
	public function tarik_saldo($sesi_id,$data,$nominal,$date){
		$this->conn->query("INSERT INTO saldo(id_user,nominal,saldo_flow,remark,status,date) VALUES('$sesi_id', '$nominal', 'out', '$data', '5', '$date')"); 
	} 
	public function top_up_data($id){
		$hasil = $this->conn->query("SELECT *,user.id as userid from saldo left join user on user.id = saldo.id_user where saldo.id='$id'");
		while ($d = mysqli_fetch_array($hasil)){
			$result[] = $d;
		} 

		return $result;
	} 
	 
}
?>