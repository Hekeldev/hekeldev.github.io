<?php 
$sesi_id = $_SESSION['user_id'];
include_once("functions/database.php");
$mysqli = new databases(); 
foreach($mysqli->user_sesi($sesi_id)as $sesi);
$sesi_level = $sesi['level'];
if($sesi_level==1){ ?>
 
<div class="row content mt-12">  
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="mt-4">Daftar Rekening Toko</h2>
        <a class="btn btn-warning" href="?page=tambah_rekening" title="Tambah data"><i class="bi bi-plus-lg"></i></a>
    </div>
    <div class="table-responsive"> 
        <table class="table table-striped bg-white" id="table_data">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Bank</th>
                    <th>Nomor Rekening</th> 
                    <th>Nama Pemilik</th>
                    <th>Status</th>
                    <th>Opsi</th>
                </tr>
            <thead>
            <tbody>
                <?php $no=1 ; 
                foreach($mysqli->list_bank_id($id=null)as $d){    
                $ket =$d['status'];
                    if($ket==1){
                        $status = 'Aktif';
                    }else{
                        $status = 'Tidak Aktif';
                    }

                ?>
                <tr>
                    <td><?php echo $no++;?></td>
                    <td><?php echo $d['nama_bank'];?></td> 
                    <td><?php echo $d['nomor_rekening'];?></td>  
                    <td><?php echo $d['nama_pemilik'];?></td> 
                    <td><?php echo $status; ?></td> 
                    <td> <div class="d-flex"> 
                        <button class="btn btn-sm btn-danger-soft m-1 deleteBtn" data-id="<?php echo $d['id'];?>" data-type="rekening" title="Hapus data"><i class="bi bi-eraser-fill"></i></button> 
                        <a href="?page=edit_rekening&id=<?php echo $d['id'];?>" class="btn btn-success-soft btn-sm m-1" title="Edit data"><i class="bi bi-pencil-square"></i></a>
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
