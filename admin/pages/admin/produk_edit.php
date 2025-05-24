<?php 
$sesi_id = $_SESSION['user_id'];
include_once("functions/database.php");
$mysqli = new databases(); 
foreach($mysqli->user_sesi($sesi_id)as $sesi);
$sesi_level = $sesi['level'];
if($sesi_level==1){ 
    $id = $_GET['id'];
    foreach($mysqli->produk_data($id)as $d) 
?>
 
<form method="POST" action="functions/actions.php?aksi=update_produk" enctype="multipart/form-data">
    <div class="row content mt-12">  
        <div class="col-12 col-md-3 mb-3">
            <div class="mb-2 d-flex justify-content-center">  
                <img src="upload/produk/<?php echo $d['gbr_produk'];?>" class="img-ava-200">  
            </div>
            <div class="form-group mb-3 px-8 text-center"> 
                <label for="floatingInput">Perbarui Gambar Produk</label>
                <input class="form-control" name="gambar" type="file" accept="image/jpeg,image/jpg,image/png">
            </div> 
        </div>
        <div class="col-12 col-md-4 mb-3"> 
            <h2>Informasi Produk</h2>
            <div class="form-group mb-3"> 
                <label for="floatingInput">Nama Produk</label>
                <input class="form-control" name="nama" type="text" value="<?php echo $d['nama_produk'];?>" placeholder="Nama produk game/voucher">
                <input class="form-control" type="hidden" name="id" id="id_td" type="text" value="<?php echo $d['id_produk'];?>">
            </div> 
            <div class="form-group mb-3"> 
                <label for="floatingInput">Keterangan Produk</label>
                <input class="form-control" name="short_desc" type="text" value="<?php echo $d['short_desc'];?>" placeholder="Keterangan singkat">
            </div> 
            <div class="form-group mb-3"> 
                <label for="floatingInput">Kategori Produk</label>
                <select class="form-select" name="kategori_produk">
                    <option value="">Pilih Kategori</option>
                    <?php 
                    $kategori = $d['tipe_produk'];
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
                <textarea class="form-control" name="long_desc" rows="5" placeholder="Deskripsi lengkap produk/barang"><?php echo $d['long_desc'];?></textarea>
            </div> 
            <div class="form-group mb-3"> 
                <label for="floatingInput">Field 1</label>
                <input class="form-control" name="field1" type="text" value="<?php echo $d['field_1'];?>" placeholder="Contoh : ID Game (Opsional)"> 
            </div> 
            <div class="form-group mb-3"> 
                <label for="floatingInput">Field 2</label>
                <input class="form-control" name="field2" type="text" value="<?php echo $d['field_2'];?>" placeholder="Contoh : ID Server (Opsional)">
            </div> 
            <div class="form-group mb-3"> 
                <label for="floatingInput">Status Produk</label>
                <select class="form-select" name="status">
                    <option value="">Pilih Status</option>
                    <?php 
                    $status = $d['status_produk']; 
                        if($status==1){
                            echo '<option value="1" selected>Aktif Listing</option>';
                        }else{
                            echo '<option value="1">Aktif Listing</option>';
                        }
                        if($status==0){
                            echo '<option value="0" selected>Tidak Aktif</option>';
                        }else{
                            echo '<option value="0">Tidak Aktif</option>';
                        }
                    ?>
                    </select>
            </div>  
            <div class="form-group mb-3 d-flex justify-content-end"> 
                <button type="submit" class="btn btn-primary float-right mt-4"><i class="bi bi-save"></i> Simpan</button>
            </div> 
        </div> 
        <div class="col-12 col-md-5 mb-3"> 
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="mt-4">Data Produk</h2>
                <a class="btn btn-warning" href="#" id="tambah_sub_produk_btn" title="Tambah data"><i class="bi bi-plus-lg"></i></a>
            </div> 
            <div class="table-responsive">
                <table class="table table-striped bg-white">
                    <tr>
                        <th>No</th>
                        <th>Nama Sub Produk</th>
                        <th>Harga Dasar</th>
                        <th>Rate Cat.</th>
                        <th>Nilai Rate</th>
                        <th>Harga Jual</th>
                        <th>Opsi</th>
                    </tr>
              
                    <?php $no=1; foreach($mysqli->produk_list($id) as $u){ 
                    $id_list = $u['id_list'];
                    $code = $u['code_mark'];
                    $val = $u['val_mark'];
                    if($code=='percent'){
                        $var_data = $val.'%';
                        $harga =  $u['harga'] + (($val/100) * $u['harga']);
                    }else{
                        $var_data = number_format($val,0);
                        $harga =  $u['harga'] + $val;
                    }
                    ?>
                    <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $u['nama_list'];?></td>
                        <td><?php echo number_format($u['harga'],0);?></td>
                        <td><?php echo $u['code_mark'];?></td>
                        <td><?php echo $var_data;?></td>
                        <td><?php echo number_format($harga,0);?></td>
                        <td>
                            <div class="d-flex"> 
                                <button type="button" class="btn btn-sm btn-danger-soft m-1 deleteBtn" data-id="<?php echo $id_list;?>" data-type="produk_list" title="Hapus data"><i class="bi bi-eraser-fill"></i></button> 
                                <!-- <a href="#" class="btn btn-success-soft btn-sm m-1" title="Edit produk"><i class="bi bi-pencil-square"></i></a> -->
                            </div>
                        </td>
                    </tr>
              
                    <?php }?>
              </table>
            </div>
        </div>
    </div>
</form>

<?php } 
else {
    include("pages/403.php");
 } ?>
