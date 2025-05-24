<?php 
$sesi_id = $_SESSION['user_id'];
include_once("functions/database.php");
$mysqli = new databases(); 
foreach($mysqli->user_sesi($sesi_id)as $sesi);
$sesi_level = $sesi['level'];
if($sesi_level==1){ 
$kode = $_GET['ref'];
foreach($mysqli->invoice($kode)as $x);
$invoice_no = $x['id_invoice'];
$tgl_checkout = date('D, d-M-Y H:i',strtotime($x['date_invoice']));
$produk = explode('~', $x['invoice_remark']);
$pembayaran = explode('~', $x['metode_bayar']);
$harga = number_format($x['bayar']); 
$status = $x['status_invoice'];
$akun = explode('~', $x['akun']);
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
                <label>Nama Pemesan</label>
                <input type="text" name="tgl" class="form-control" value="<?php echo $x['nama'];?>" readonly>
            </div>
            <div class="col-12 col-md-6 mb-2">
                <label>Nomor Whatsapp</label>
                <input type="text" name="tgl" class="form-control" value="<?php echo $x['no_wa'];?>" readonly>
            </div>
            <?php
                if($x['akun']!==':~:'){
                for($y=0;$y<count($akun);$y++){
                    $akun_data = explode(':',$akun[$y]);
                    ?>
                    <div class="col-12 col-md-6 mb-2">
                    <label><?php echo $akun_data[0]; ?></label>
                    <input type="text" class="form-control" value="<?php echo $akun_data[1];?>" readonly>
                </div>
                <?php } }else{

                } ?>
                
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

    
    <h2 class="mt-4">Riwayat Pembayaran</h2>
    <div class="table-responsive">
        <?php if($x['metode_bayar']=='saldo'){ ?>
            <p>Buyer menggunakan saldo akun untuk melakukan pembayaran invoice ini, harap periksa di menu <a href="?page=daftar_topup">Saldo Sistem</a></p>
        <?php } else{ ?>
        <table class="table table-striped bg-white">
            <tr>
                <th>No</th>
                <th>Waktu Konfirmasi</th>
                <th>Nama Pengirim</th>
                <th>Nama Bank</th>
                <th>Nomor Rekening</th>
                <th>Opsi</th>
            </tr>
            <tr> 
            <?php 
                $no=1;  
                foreach($mysqli->list_bayar($id=$invoice_no) as $y){ 
                $waktu_konfirmasi = date('D, d-M-Y H:i',strtotime($y['date']));?>
                <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $waktu_konfirmasi;?></td>
                <td><?php echo $y['nama_pengirim'];?></td>
                <td><?php echo $y['bank_pengirim'];?></td>
                <td><?php echo $y['rekening_pengirim'];?></td>
                <td><button class="btn btn-sm btn-success-soft bukti_lihat" data="<?php echo $y['bukti'];?>">Lihat Bukti</button></td>
            </tr>
            </tr> <?php } ?>
        </table>
        <i>Harap periksa konfirmasi pembayaraan dari buyer dengan teliti sebelum mengubah status pesanan.</i>
        <?php } ?>
    </div>
    
    <form method="POST" action="functions/actions.php?aksi=update_pesanan">
    <h2 class="mt-4">Status Pesanan</h2>
    <input type="hidden" name="id" value="<?php echo $invoice_no;?>">
    <div class="col-12 col-md-6 mb-2">
        <label>Status Pesanan</label>
        <?php 
        if($status==0 or $status==1){
            $ket_status ='<input class="form-control" value="Belum dapat mengubah status pesanan" readonly>';
        }else if($status==4){
            $ket_status ='<input class="form-control" value="Pesanan Selesai" readonly>';
        }else{
            $ket_status = ' <select name="status" class="form-select">';
            
                if($status==9){
                    $ket_status .=  '<option value="9" selected>Menunggu Konfirmasi</option>';
                }else{
                    $ket_status .=  '<option value="9">Menunggu Konfirmasi</option>';
                }
                if($status==2){
                    $ket_status .=  '<option value="2" selected>Pesanan Diproses</option>';
                }else{
                    $ket_status .=  '<option value="2">Pesanan Diproses</option>';
                }
                if($status==3){
                    $ket_status .=  '<option value="3" selected>Batalkan</option>';
                }else{
                    $ket_status .=  '<option value="3">Batalkan</option>';
                }
                if($status==4){
                    $ket_status .=  '<option value="4" selected>Pesanan Selesai</option>';
                }else{
                    $ket_status .=  '<option value="4">Pesanan Selesai</option>';
                }         

                $ket_status .= '</select>';
            }
        echo $ket_status;?>
    </div>

    <div class="col-12 col-md-12 mb-4 mt-4 input-group d-flex justify-content-end">
        <a href="?page=daftar_pesanan" type="button" class="btn btn-warning float-right"><i class="bi bi-arrow-left"></i> Kembali </a>
        <button type="submit" class="btn btn-primary float-right"><i class="bi bi-save"></i> Simpan</button>
    </div>
    </form>
</div>


<?php } 
else {
    include("pages/403.php");
 } ?>
