<?php 
include_once("functions/database.php");
$mysqli = new databases(); 
$kode = $_GET['ref'];
foreach($mysqli->invoice($kode)as $x);
$invoice_no = $x['id_invoice'];
$tgl_checkout = date('D, d-M-Y H:i',strtotime($x['date_invoice']));
$produk = explode('~', $x['invoice_remark']);
$pembayaran = explode('~', $x['metode_bayar']);
$harga = number_format($x['bayar']); 
if($x['metode_bayar']=='saldo'){
    $button = '<button type="button" class="btn btn-primary float-right">Sedang di proses</button>';
}else{
    $button = '<button type="button" class="btn btn-primary float-right" id="cara_bayar_btn">Cara Pembayaran</button>';
}
$status = $x['status_invoice'];
if($status==9){
    $ket = 'Menunggu Konfirmasi';
}else if($status==0){
    $ket = 'Menunggu Pembayaran';
}else if($status==4){
    $ket = 'Pesanan Selesai';
}else if($status==3){
    $ket = 'Pesanan Dibatalkan';
}else if($status==2){
    $ket = 'Pesanan Diproses';
}else{
    $ket = 'Belum ada update';
}
?>

<div class="row content mt-12"> 
    <h2 class="mt-4">Detail Pesanan</h2> 
    <div class="col-12 col-md-12 mb-3">
        <div class="row mb-2">
            <div class="col-12 col-md-6 mb-2">
                <label>Nomor Invoice</label>
                <input type="text" name="kode_invoice" class="form-control" value="<?php echo $invoice_no;?>" readonly id="invoice_info" ref="<?php echo $kode;?>">
            </div>
            <div class="col-12 col-md-6 mb-2">
                <label>Waktu Pemesanan</label>
                <input type="text" name="tgl" class="form-control" value="<?php echo $tgl_checkout;?> WIB" readonly>
            </div>
            <div class="col-12 col-md-6 mb-2">
                <label>Status Pemesanan</label>
                <input type="text" name="tgl" class="form-control" value="<?php echo $ket;?>" readonly>
            </div>
        </div> 
    </div>

    <h2 class="mt-4">Detail Produk</h2>
    <div class="col-12 col-md-6 mb-2">
        <label>Nama Produk</label>
        <input type="text" class="form-control" value="<?php echo $produk[0];?>" readonly>
    </div>
    <div class="col-12 col-md-6 mb-2">
        <label>Data Produk</label>
        <input type="text" class="form-control" value="<?php echo $produk[1];?>" readonly>
    </div>
    <div class="col-12 col-md-6 mb-2">
        <label>Total Bayar</label>
        <input type="text"  class="form-control"  id="total_td" value="Rp. <?php echo $harga;?>" readonly>
    </div>  

    <div class="col-12 col-md-6 mb-2">
        <label>Pilihan Pembayaran</label> 
        <textarea type="text" name="bank" class="form-control" placeholder="Pilih pembayaran"
            value="" readonly><?php echo $pembayaran[0].' '.$pembayaran[1].' '.$pembayaran[2];?></textarea>
            <input type="hidden" id="bank_info" value="<?php echo $pembayaran[1];?>">
            <input type="hidden" id="rek_info" value="<?php echo $pembayaran[0];?>">
            <input type="hidden" id="penerima_info" value="<?php echo $pembayaran[2];?>">
    </div>


    <div class="col-12 col-md-12 mb-4 mt-4 input-group d-flex justify-content-end">
        <a href="?page=order_list" type="button" class="btn btn-warning float-right"><i class="bi bi-arrow-left"></i> Kembali </a>
        <?php echo $button;?>
        
    </div>
</div>
 