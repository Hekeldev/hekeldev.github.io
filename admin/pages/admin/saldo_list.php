<?php 
$sesi_id = $_SESSION['user_id'];
include_once("functions/database.php");
$mysqli = new databases();  
foreach($mysqli->user_sesi($sesi_id)as $sesi);
$sesi_level = $sesi['level'];
if($sesi_level==1){ 
?>
 
<div class="row content py-4 mt-4">  
<div class="d-flex justify-content-between align-items-center">
        <h2 class="mt-4">Riwayat Saldo Pengguna</h2> 
    </div>
    <div class="table-responsive"> 
        <table class="table table-striped bg-white" id="table-data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama</th>
                    <th>No. Whatsapp</th>
                    <th>Jumlah</th>
                    <th>Mutasi</th> 
                    <th>Catatan</th> 
                    <th>Opsi</th> 
                </tr>
            <thead>
            <tbody>
                <?php $no=1 ; foreach($mysqli->saldo_admin()as $d){  
                $ket = $d['saldo_flow'];
                $status = $d['status'];
                if($ket=='in'){
                    $arus = '<i class="bi bi-arrow-up"></i> Kredit';
                }else{
                    $arus = '<i class="bi bi-arrow-down"></i> Debit';
                }
                if($status== "konfir" or $status==9){
                    $remark = $d['remark'];
                    $button = '<a href="?page=topup_data&id='.$d['id_saldo'].'" class="btn btn-danger btn-sm" title="Konfirmasi topup"><i class="bi bi-arrow-right-square"></i></a>';
                }else if($status==5){
                    //5 : Payout
                    $remark = 'Permintaan penarikan saldo';
                    $button = '<a href="?page=payout_data&id='.$d['id_saldo'].'" class="btn btn-warning btn-sm" title="Konfirmasi payout"> <i class="bi bi-arrow-right-square"></i></a>';
                }else{
                    $button ='';
                    $remark = $d['remark'];
                }
                ?>
                <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $d['date'];?></td>
                    <td><?php echo $d['nama'];?></td>
                    <td><?php echo $d['kontak'];?></td>
                    <td><?php echo 'Rp. '.number_format($d['nominal'],0);?></td>
                    <td><?php echo $arus;?></td>
                    <td><?php echo $remark;?></td> 
                    <td> 
                        <?php echo $button;?>
                    </td> 
                </tr>
                <?php } ?>
            </tbody>
        </table>  
    </div>
</div> 

<?php } 
else {
    include("pages/403.php");
 } ?>
