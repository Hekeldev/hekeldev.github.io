<?php
$sesi_id = $_SESSION['user_id'];
include_once("functions/database.php");
$mysqli = new databases(); 
foreach($mysqli->user_sesi($sesi_id)as $sesi);
$sesi_level = $sesi['level'];
if($sesi_level==1){  
?>
 
<form method="POST" action="functions/actions.php?aksi=tambah_rekening">
    <div class="row content mt-12">   
        <div class="col-12 col-md-12 mb-3"> 
            <h2>Tambah Data Rekening</h2>
            <div class="form-group mb-3"> 
                <label for="floatingInput">Nama Bank</label>
                <input class="form-control" name="nama_bank" type="text" value="" placeholder="Nama bank/e-wallet"> 
            </div> 
            <div class="form-group mb-3"> 
                <label for="floatingInput">Nomor Rekening</label>
                <input class="form-control" name="nomor" type="text" value="" placeholder="Nomor rekening">
            </div>  
            <div class="form-group mb-3"> 
                <label for="floatingInput">Nama Pemilik Rekening</label>
                <input class="form-control" name="pemilik" value=""   placeholder="Nama pemilik rekening">
            </div>  
            <div class="form-group mb-3"> 
                <label for="floatingInput">Status Rekening</label>
                <select class="form-select" name="status">
                    <option value="">Pilih Status</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                 </select>
            </div>  
            <div class="form-group mb-3 d-flex justify-content-end"> 
                <button type="submit" class="btn btn-primary float-right mt-4"><i class="bi bi-save"></i> Simpan</button>
            </div> 
        </div> 
    </div>
</form>

<?php } 
else {
    include("pages/403.php");
 } ?>
