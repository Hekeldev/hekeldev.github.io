<?php 
$id = $_GET['id'];
include_once("functions/database.php");
$mysqli = new databases();  
foreach($mysqli->user_sesi($sesi_id)as $sesi);
$sesi_level = $sesi['level'];
if($sesi_level==1){ 
foreach($mysqli->top_up_data($id)as $d);
$status = $d['status']; 
foreach($mysqli->saldo_akun($sesi_id=$d['userid'])as $saldo);
$saldo_akun = 'Rp. '.number_format($saldo['saldo'],0);
$remark = explode('~', $d['remark']);
?>
 
    <div class="row content py-4 mt-4"> 
        <h2 class="mt-4">Permintaan Penarikan Saldo</h2> 
        <div class="col-12 col-md-12 mb-2">
            <div class="row mb-2"> 
                <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>" readonly>
                <div class="col-12 col-md-6 mb-3">
                    <label>Nama Pengguna</label>
                    <input type="text" value="<?php echo $d['nama'];?>" class="form-control" readonly>
                </div> 
                <div class="col-12 col-md-6 mb-3">
                    <label>Nomor Whatsapp</label>
                    <input type="text" value="<?php echo $d['kontak'];?>" class="form-control" readonly>
                </div> 
                <div class="col-12 col-md-6 mb-3">
                    <label>Email</label>
                    <input type="text" value="<?php echo $d['email'];?>" class="form-control" readonly>
                </div>  
            </div> 
        </div>  

        <h2 class="mt-4">Detail Penarikan Saldo</h2> 
        <div class="col-12 col-md-12 mb-2">
            <div class="row mb-2">   
                <div class="col-12 col-md-6 mb-3">
                    <label>Jumlah Saldo Akun</label>
                    <input type="text" value="<?php echo $saldo_akun;?>" class="form-control" readonly>
                </div> 
                <div class="col-12 col-md-6 mb-3">
                    <label>Jumlah Penarikan</label>
                    <input type="text" value="<?php echo 'Rp. '.number_format($d['nominal'],0);?>" class="form-control" readonly>
                </div> 
                <div class="col-12 col-md-6 mb-3">
                    <label>Nama Bank/E-Wallet Tujuan</label>
                    <input type="text" value="<?php echo $remark[0];?>" class="form-control" readonly>
                </div> 
                <div class="col-12 col-md-6 mb-3">
                    <label>Nomor Bank/E-Wallet Tujuan</label>
                    <input type="text" value="<?php echo $remark[1];?>" class="form-control" readonly>
                </div> 
                <div class="col-12 col-md-6 mb-3">
                    <label>Nama Pemilik Bank/E-Wallet Tujuan</label>
                    <input type="text" value="<?php echo $remark[2];?>" class="form-control" readonly>
                </div> 
            </div> 
        </div> 
 
    
    <form method="POST" action="functions/actions.php?aksi=update_payout">
    <h2 class="mt-4">Status Saldo</h2>
    <input type="hidden" name="id" value="<?php echo $id;?>">
    <div class="col-12 col-md-6 mb-2">
        <label>Status Saldo</label>
        <?php  
        if($status==1){
          $ket_status ='<input class="form-control" value="Selesai" readonly>';
        }else{
            $ket_status = ' <select name="status" class="form-select">';
            
                if($status==9){
                    $ket_status .=  '<option value="9" selected>Menunggu Konfirmasi</option>';
                }else{
                    $ket_status .=  '<option value="9">Menunggu Konfirmasi</option>';
                }  
                if($status==1){
                    $ket_status .=  '<option value="1" selected>Selesai</option>';
                }else{
                    $ket_status .=  '<option value="1">Selesai</option>';
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
