<?php 
$id = $_GET['id'];
include_once("functions/database.php");
$mysqli = new databases();  
foreach($mysqli->user_sesi($sesi_id)as $sesi);
$sesi_level = $sesi['level'];
if($sesi_level==1){ 
foreach($mysqli->top_up_data($id)as $d);
$status = $d['status'];
?>
 
    <div class="row content py-4 mt-4"> 
        <h2 class="mt-4">Form Konfirmasi TopUp</h2> 
        <div class="col-12 col-md-12 mb-2">
            <div class="row mb-2"> 
                <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>" readonly>
                <div class="col-12 col-md-6 mb-3">
                    <label>Jumlah TopUp</label>
                    <input type="text" value="<?php echo 'Rp. '.number_format($d['nominal'],0);?>" class="form-control" readonly id="total_td">
                </div> 
            </div> 
        </div>  

        <h2 class="mt-4">Riwayat Pembayaran</h2>
    <div class="table-responsive">
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
                foreach($mysqli->list_bayar_saldo($id) as $y){ 
                $waktu_konfirmasi = date('D, d-M-Y H:i',strtotime($y['date']));?>
                <tr>
                <td><?php echo $no++;?></td>
                <td><?php echo $waktu_konfirmasi;?></td>
                <td><?php echo $y['nama_pengirim'];?></td>
                <td><?php echo $y['bank_pengirim'];?></td>
                <td><?php echo $y['rekening_pengirim'];?></td>
                <td><button type="button" class="btn btn-sm btn-success-soft bukti_saldo" data="<?php echo $y['bukti'];?>">Lihat Bukti</button></td>
            </tr>
            </tr> <?php } ?>
        </table>
        <i>Harap periksa konfirmasi pembayaraan dari buyer dengan teliti sebelum mengubah status saldo.</i>
    </div>
    
    <form method="POST" action="functions/actions.php?aksi=update_saldo">
    <h2 class="mt-4">Status Saldo</h2>
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <div class="col-12 col-md-6 mb-2">
        <label>Status Saldo</label>
        <?php 
        if($status==0){
            $ket_status ='<input class="form-control" value="Belum dapat mengubah status saldo" readonly>';
        }else  if($status==null){
          $ket_status ='<input class="form-control" value="Verified" readonly>';
       }else{
            $ket_status = ' <select name="status" class="form-select">';
            
                if($status==9){
                    $ket_status .=  '<option value="9" selected>Menunggu Konfirmasi</option>';
                }else{
                    $ket_status .=  '<option value="9">Menunggu Konfirmasi</option>';
                } 
                if($status==3){
                    $ket_status .=  '<option value="3" selected>Tidak Valid</option>';
                }else{
                    $ket_status .=  '<option value="3">Tidak Valid</option>';
                }
                if($status==null){
                    $ket_status .=  '<option value="1" selected>Verified</option>';
                }else{
                    $ket_status .=  '<option value="1">Verified</option>';
                }         

                $ket_status .= '</select>';
            }
        echo $ket_status;?>
    </div>

        <div class="col-12 col-md-12 mb-4 mt-2 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary float-right">Simpan <i class="bi bi-arrow-right-square"></i></button>
        </div>
    </div>
</form>


<?php } 
else {
    include("pages/403.php");
 } ?>
