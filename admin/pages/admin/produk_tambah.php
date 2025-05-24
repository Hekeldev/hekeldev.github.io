<?php 
$sesi_id = $_SESSION['user_id'];
include_once("functions/database.php");
$mysqli = new databases(); 
foreach($mysqli->user_sesi($sesi_id)as $sesi);
$sesi_level = $sesi['level'];
if($sesi_level==1){  
?>
 
<form method="POST" action="functions/actions.php?aksi=tambah_produk" enctype="multipart/form-data">
    <div class="row content mt-12">  
        <div class="col-12 col-md-4 mb-3">
            <div class="mb-2 d-flex justify-content-center">  
                <img src="upload/produk/default.png" class="img-ava-200">  
            </div>
            <div class="form-group mb-3 px-8 text-center"> 
                <label for="floatingInput">Gambar Produk</label>
                <input class="form-control" name="gambar" type="file" accept="image/jpeg,image/jpg,image/png">
            </div> 
        </div>
        <div class="col-12 col-md-5 mb-3"> 
            <h2>Informasi Produk</h2>
            <div class="form-group mb-3"> 
                <label for="floatingInput">Nama Produk</label>
                <input class="form-control" name="nama" type="text" value="" placeholder="Nama produk game/voucher">
            </div> 
            <div class="form-group mb-3"> 
                <label for="floatingInput">Keterangan Produk</label>
                <input class="form-control" name="short_desc" type="text" value="" placeholder="Keterangan singkat">
            </div> 
            <div class="form-group mb-3"> 
                <label for="floatingInput">Kategori Produk</label>
                <select class="form-select" name="kategori_produk">
                    <option value="">Pilih Kategori</option>
                    <?php 
                    $kategori = $d['cat_produk'];
                    foreach($mysqli->kategori_produk()as $cat){
                        if($kategori==$cat['id_kategori']){
                            $select = 'selected';
                        }else{
                            $select = '';
                        }
                        ?>
                        <option value="<?php echo $cat['id_kategori'];?>" <?php echo $select;?>><?php echo $cat['nama_kategori'];?></option>
                    <?php } ?> 
                </select>
            </div>  
            <div class="form-group mb-3"> 
                <label for="floatingInput">Deskripsi Produk</label>
                <textarea class="form-control" name="long_desc" rows="5" placeholder="Deskripsi lengkap produk/barang"></textarea>
            </div>
            <div class="form-group mb-3"> 
                <label for="floatingInput">Field 1</label>
                <input class="form-control" name="field1" type="text" placeholder="Contoh : ID Game (Opsional)"> 
            </div> 
            <div class="form-group mb-3"> 
                <label for="floatingInput">Field 2</label>
                <input class="form-control" name="field2" type="text" placeholder="Contoh : ID Server (Opsional)">
            </div>  
            <div class="form-group mb-3"> 
                <label for="floatingInput">Status Produk</label>
                <select class="form-select" name="status">
                    <option value="">Pilih Status</option>
                    <option value="1">Aktif Listing</option>
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
