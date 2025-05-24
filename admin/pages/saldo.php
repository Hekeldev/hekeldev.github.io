<?php 
$sesi_id = $_SESSION['user_id'];
include_once("functions/database.php");
$mysqli = new databases();  
?>
 
<div class="row content py-4 mt-4">  
<div class="d-flex justify-content-between align-items-center">
        <h2 class="mt-4">Riwayat Saldo</h2>
        <div>
         <a class="btn btn-primary" href="#" title="Tarik saldo" id="tarik_saldo_btn"><i class="bi bi-arrow-counterclockwise"></i> Tarik Saldo</a>
         <a class="btn btn-warning" href="#" title="TopUp" id="top_up_btn"><i class="bi bi-plus-lg"></i> TopUp</a>
        </div>
    </div>
    <div class="table-responsive"> 
        <table class="table table-striped bg-white" id="table-data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Mutasi</th> 
                    <th>Keterangan</th> 
                </tr>
            <thead>
            <tbody>
                <?php $no=1 ; foreach($mysqli->saldo($sesi_id)as $d){  
                $ket = $d['saldo_flow'];
                $status = $d['status'];
                if($ket=='in'){
                    $arus = '<i class="bi bi-arrow-up"></i> Kredit';
                }else{
                    $arus = '<i class="bi bi-arrow-down"></i> Debit';
                }
                if($status==0){
                    $button = '<a href="?page=konfirmasi_topup&id='.$d['id'].'" class="btn btn-danger btn-sm" title="Konfirmasi topup">'.$d['remark'].' <i class="bi bi-arrow-right-square"></i></a>';
                }else if($status==9){
                    $button = '<a href="?page=konfirmasi_topup&id='.$d['id'].'" class="btn btn-warning btn-sm" title="Konfirmasi topup">'.$d['remark'].' <i class="bi bi-arrow-right-square"></i></a>';
                }else if($status==3){
                    $button = '<a href="?page=konfirmasi_topup&id='.$d['id'].'" class="btn btn-danger btn-sm" title="Konfirmasi topup">'.$d['remark'].' <i class="bi bi-arrow-right-square"></i></a>';
                }else if($status==5){
                    $button = 'Proses penarikan';
                }else{
                    $button = $d['remark'];
                }
                ?>
                <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $d['date'];?></td>
                    <td><?php echo 'Rp. '.number_format($d['nominal'],0);?></td>
                    <td><?php echo $arus;?></td>
                    <td><?php echo $button;?></td> 
                </tr>
                <?php } ?>
            </tbody>
        </table>  
    </div>
</div> 

