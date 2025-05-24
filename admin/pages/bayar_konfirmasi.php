<?php 
$sesi_id = $_SESSION['user_id'];
include_once("functions/database.php");
$mysqli = new databases(); 
$kode = $_GET['ref']; 
$invoice = $_GET['invoice'];
?>

<form method="POST" action="functions/actions.php?aksi=konfirmasi_pembayaran" enctype="multipart/form-data">
    <div class="row content py-4 mt-4"> 
        <h2 class="mt-4">Form Konfirmasi Pembayaran</h2> 
        <div class="col-12 col-md-12 mb-2">
            <div class="row mb-2">
                <div class="col-12 col-md-6 mb-3">
                    <label>Nomor Invoice</label>
                    <input type="text" name="invoice" class="form-control" value="<?php echo $invoice;?>" readonly>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label>Kode Referensi</label>
                    <input type="text" name="kode" class="form-control" value="<?php echo $kode;?>" readonly>
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label>Bank Pengirim</label>
                    <input type="text" name="bank" class="form-control">
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label>Nomor Rekening Pengirim</label>
                    <input type="text" name="rekening" class="form-control">
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label>Nama Rekening Pengirim</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="col-12 col-md-6 mb-3">
                    <label>Upload Bukti Transfer</label>
                    <input type="file" name="gambar" class="form-control" accept="image/jpeg,image/jpg,image/png">
                </div>
            </div> 
        </div> 

        <div class="col-12 col-md-12 mb-4 mt-2 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary float-right" id="cara_bayar_btn">Kirim Bukti <i class="bi bi-arrow-right-square"></i></button>
        </div>
    </div>
</form>


