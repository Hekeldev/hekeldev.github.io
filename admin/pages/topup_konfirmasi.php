<?php 
$id = $_GET['id'];
include_once("functions/database.php");
$mysqli = new databases();  
foreach($mysqli->top_up_data($id)as $d);
?>

<form method="POST" action="functions/actions.php?aksi=konfirmasi_topup" enctype="multipart/form-data">
    <div class="row content py-4 mt-4"> 
        <h2 class="mt-4">Form Konfirmasi TopUp</h2> 
        <div class="col-12 col-md-12 mb-2">
            <div class="row mb-2"> 
                <input type="hidden" name="id" class="form-control" value="<?php echo $id;?>" readonly>
                <div class="col-12 col-md-6 mb-3">
                    <label>Jumlah TopUp</label>
                    <input type="text" value="<?php echo 'Rp. '.number_format($d['nominal'],0);?>" class="form-control" readonly>
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
 
        <div class="col-12 col-md-12 mb-2">
          <h5>Daftar Rekening</h5> 
            <!-- Accordion Start -->  
                    <?php foreach($mysqli->list_bank() as $r){ 
                      $id_rekening = $r['id']; 
                      ?>
                      <div class="input-group mb-3">
                        <input type="text" class="btn-check w-100" id="rekening<?php echo $id_rekening;?>" value="<?php echo $r['nomor_rekening'].'~'.$r['nama_bank'].'~'.$r['nama_pemilik'];?>">
                        <label class="btn btn-secondary w-100" for="rekening<?php echo $id_rekening;?>"><?php echo $r['nama_bank'];?> <br>
                        <em><?php echo $r['nomor_rekening'];?> A.n. <?php echo $r['nama_pemilik'];?></em>
                        </label>
                      </div>
                    <?php } ?>    
        </div>
        <div class="col-12 col-md-12 mb-4 mt-2 d-flex justify-content-end">
            <button type="submit" class="btn btn-primary float-right">Kirim Bukti <i class="bi bi-arrow-right-square"></i></button>
        </div>
    </div>
</form>


