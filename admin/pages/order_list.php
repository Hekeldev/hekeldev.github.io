<?php 
include_once("functions/database.php");
$mysqli = new databases();  
if(isset($_SESSION['user_id'])){
?>
 
<div class="row content py-4 mt-4">  
    <h2 class="mt-4">Daftar Transaksi</h2>
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
                <?php $no=1 ;  
                $sesi_id = $_SESSION['user_id'];
                foreach($mysqli->invoice_sesi($sesi_id)as $d) {  
                        $kode = $d['kode_invoice'];
                        $total = 'Rp. '.number_format($d['bayar'],0);    
                        $status = $d['status_invoice'];
                        $data = explode('~', $d['invoice_remark']);
                        $tgl_checkout = date('D, d-M-Y H:i',strtotime($d['date_invoice']));
                        $date = date_create($d['date_invoice']);
                        $now = date_create();
                        $range = date_diff($date, $now);
                        $jeda = $range->d;
                        if($status==0){
                            if($jeda>=1){
                                $remark = 'Pesanan dibatalkan karena melewati batas waktu.';
                            }else{
                                $remark = 'Pending. Butuh tinjauan pembeli';
                            }
                            $href = "?page=invoice&ref=$kode";
                        }
                        else if($status==1){
                            if($jeda>=1){
                                $remark = 'Pesanan dibatalkan karena melewati batas waktu';
                            }else{
                                $remark = 'Menunggu pembayaran';
                            } 
                            $href = "?page=invoice&ref=$kode";
                        }
                        else if($status==2){
                            $remark = 'Pesanan diproses';
                            $href = "?page=invoice&ref=$kode";
                        }
                        else if($status==3){
                            $remark = 'Pesanan dibatalkan';
                            $href = "?page=invoice&ref=$kode";
                        }
                        else if($status==4){
                            $remark = 'Pesanan selesai';
                            $href = "?page=invoice&ref=$kode";
                        }
                        else if($status==9){
                            $remark = 'Menunggu konfirmasi';
                            $href = "?page=invoice&ref=$kode";
                        }
                ?>
                <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $d['id_invoice'];?></td>
                    <td><?php echo $tgl_checkout;?> WIB</td>
                    <td><?php echo $data[0].' - '.$data[1]; ?></td>
                    <td><?php echo $total; ?></td>
                    <td><?php echo $remark; ?></td>
                    <td><a href="<?php echo $href;?>" class="btn btn-success-soft btn-sm"><i class="bi bi-arrow-right-square"></i></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>  
    </div>
</div> <?php } else { 

    include("403.php");
}?>
