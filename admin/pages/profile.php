<?php 
$sesi_id = $_SESSION['user_id'];
include_once("functions/database.php");
$mysqli = new databases();  
foreach($mysqli->user_sesi($sesi_id)as $sesi);
$uuid_user = $sesi['id'];
if($uuid_user==''){
    include("pages/403.php");
}else{
foreach($mysqli->user_sesi($sesi_id) as $d);
?>

<form method="POST" action="functions/actions.php?aksi=update_profile" enctype="multipart/form-data"> 
    <div class="row content py-4 mt-4">  
        <div class="col-12 col-md-4 mb-3">
            <div class="mb-2 d-flex justify-content-center">  
                <img src="upload/profile/<?php echo $d['avatar'];?>" class="img-ava-200">  
            </div>
            <div class="form-group mb-3 px-8 text-center"> 
                <label for="floatingInput">Perbarui Gambar Profile</label>
                <input class="form-control" name="gambar" type="file" accept="image/jpeg,image/jpg,image/png">
            </div> 
        </div>
        <div class="col-12 col-md-5 mb-3"> 
            <h2>Informasi Pengguna</h2>
            <div class="form-group mb-3"> 
                <label for="floatingInput">Nama Lengkap</label>
                <input class="form-control" name="nama" type="text" value="<?php echo $d['nama'];?>">
            </div> 
            <div class="form-group mb-3"> 
                <label for="floatingInput">Alamat Email</label>
                <input class="form-control" name="email" type="email" value="<?php echo $d['email'];?>">
            </div> 
            <div class="form-group mb-3"> 
                <label for="floatingInput">Nomor Handphone</label>
                <input class="form-control" name="kontak" type="text" value="<?php echo $d['kontak'];?>">
            </div> 
            <div class="d-flex justify-content-end mb-3"> 
                <button type="submit" class="btn btn-primary float-right mt-4"><i class="bi bi-save"></i> Simpan</button>
            </div> 
        </div> 
    </div> 
</form>

<?php } ?>
