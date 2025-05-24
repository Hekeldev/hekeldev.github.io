<?php 
$sesi_id = $_SESSION['user_id'];
include_once("functions/database.php");
$mysqli = new databases();  
?>
 
<div class="row content py-4 mt-4">  
    <h2 class="mt-4">Daftar Transaksi</h2>
    <div class="table-responsive"> 
        <table class="table table-striped bg-white" id="table-data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Data Produk</th>
                    <th>Harga</th> 
                </tr>
            <thead>
            <tbody>
                <?php $no=1 ; foreach($mysqli->produk_list_join()as $d) { 
                $code = $d['code_mark'];
                $val = $d['val_mark'];
                if($code=='percent'){
                    $harga =  $d['harga'] + (($val/100) * $d['harga']);
                }else{
                    $harga =  $d['harga'] + $val;
                }
                ?>
                <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $d['nama_produk'];?></td>
                    <td><?php echo $d['nama_list'];?> WIB</td>
                    <td><?php echo 'Rp. '.number_format($harga,0); ?></td> 
                </tr>
                <?php } ?>
            </tbody>
        </table>  
    </div>
</div> 

