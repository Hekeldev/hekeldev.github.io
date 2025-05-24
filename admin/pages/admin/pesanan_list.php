<?php 
$sesi_id = $_SESSION['user_id'];
include_once("functions/database.php");
$mysqli = new databases(); 
foreach($mysqli->user_sesi($sesi_id)as $sesi);
$sesi_level = $sesi['level'];
if($sesi_level==1){ ?>
 
<div class="row content mt-12">  
    <h2 class="mt-4">Daftar Pesanan</h2>
    <div class="table-responsive"> 
        <table class="table table-striped bg-white" id="table-data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Invoice</th>
                    <th>Tanggal Pemesanan</th>
                    <th>Data Pesanan</th>
                    <th>Total Bayar</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            <thead>
            <tbody>
                <?php $no=1 ; foreach($mysqli->list_transaksi()as $d){  
                        $kode = $d['kode_invoice'];
                        $total = 'Rp. '.number_format($d['bayar'],0);    
                        $status = $d['status_invoice'];
                        $data = explode('~', $d['invoice_remark']);
                        $tgl_checkout = date('D, d-M-Y H:i',strtotime($d['date_invoice']));
                        $date = date_create($d['date_invoice']);
                        $now = date_create();
                        $range = date_diff($date, $now);
                        $jeda = $range->d;
                        $wa = '62'.substr($d['no_wa'],1,15);
                        if($status==0){
                            if($jeda>=2){
                                $remark = 'Pesanan dibatalkan karena melewati batas waktu.';
                            }else{
                                $remark = 'Pending. Butuh tinjauan pembeli';
                            } 
                        }
                        else if($status==1){
                            if($jeda>=2){
                                $remark = 'Pesanan dibatalkan karena melewati batas waktu';
                            }else{
                                $remark = 'Menunggu pembayaran';
                            } 
                        }
                        else if($status==2){
                            $remark = 'Pesanan diproses';
                        }
                        else if($status==3){
                            $remark = 'Pesanan dibatalkan';
                        }
                        else if($status==4){
                            $remark = 'Pesanan selesai';
                        }
                        else if($status==9){
                            $remark = 'Menunggu konfirmasi';
                        }
                ?>
                <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $d['id_invoice'];?></td>
                    <td><?php echo $tgl_checkout;?> WIB</td>
                    <td><?php echo $data[0].' - '.$data[1]; ?></td>
                    <td><?php echo $total; ?></td>
                    <td><?php echo $remark; ?></td>
                    <td>
                        <div class="d-flex">
                            <a href="http://wa.me/<?php echo $wa;?>" target="_blank" class="btn btn-success-soft btn-sm m-1" title="Hubungi pemesan"><i class="bi bi-whatsapp"></i></a>
                            <a href="?page=edit_pesanan&ref=<?php echo $d['kode_invoice'];?>" class="btn btn-success-soft btn-sm m-1"><i class="bi bi-arrow-right-square"></i></a>
                        </div>
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
