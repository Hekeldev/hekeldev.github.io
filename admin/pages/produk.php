<?php
include_once("functions/database.php");
$mysqli = new databases(); 
if(isset($_SESSION['user_id'])){
  $sesi_id = $_SESSION['user_id'];
  foreach($mysqli->user_sesi($sesi_id)as $sesi);
  $kontak = $sesi['kontak'];
  $button = '<button type="submit" class="btn btn-primary"><i class="bi bi-cart-plus"></i> Pesan Sekarang</button>';

  foreach($mysqli->saldo_akun($sesi_id)as $saldo);
  $saldo_akun = 'Rp. '.number_format($saldo['saldo'],0);

  $saldo = '
    <div class="col-12 col-md-12 mb-3">
      <input type="radio" class="btn-check w-100" name="rekening" id="rekeningSaldo" value="saldo" required>
     <label class="btn btn-secondary w-100" for="rekeningSaldo">Saldo Akun : '.$saldo_akun.' <br>
     <em>Pastikan saldo akun cukup atau pesanan akan ditolak</em>
    </label>
  </div>
  ';
}else{
  $kontak = null;
  $button = '<button type="button" data-bs-toggle="modal" data-bs-target="#modal_login" class="btn btn-primary"> Login Untuk Melakukan Pesanan <i class="bi bi-box-arrow-in-right"></i></button>';
  $saldo = 'Login untuk menggunakan saldo';
}
if(isset($_GET['id']) and $_GET['id']!==''){
  $id = $_GET['id'];
  foreach($mysqli->produk($data_id=$id, $limit=1)as $d);
  $tipe = $d['tipe_produk'];
  if($tipe==1){
    $field1 = $d['field_1'];
    $field2 = $d['field_2'];
    if($field2==null){
      $field2_data = '';
    }else{
      $field2_data = '
      <div class="col-12 col-md-4 mb-3">
        <label>'.$field2.'</label>
        <input type="hidden" value="'.$field2.'" name="field2name">
        <input type="text" class="form-control" value="" name="field2" placeholder="'.$field2.' anda" required>
      </div> 
    ';
    }
    $informasi_pembelian = '
      <div class="col-12 mb-3">
        <div class="card bg-body-grey">
          <div class="card-header">
            <h5>Informasi Pembeliaan</h5>
          </div> 
          <div class="row p-4">

            <div class="col-12 col-md-4 mb-3">
              <label>'.$field1.'</label>
              <input type="hidden" value="'.$field1.'" name="field1name">
              <input type="text" class="form-control" name="field1" placeholder="'.$field1.' anda" required>
            </div> 

            '.$field2_data.'
            
          </div>
        </div>
      </div>';
  }else{
    $informasi_pembelian = '';
  }
?>
<form method="POST" action="functions/actions.php?aksi=order">
<div class="row content mt-12">
  <!-- Start Row -->
  <!-- Left  -->
  <div class="col-12 col-md-4 mb-3">
    <div class="bg-body-grey data-view">
      <div class="d-flex flex-column align-items-center justify-content-center mb-2">
        <img class="rounded img-100 m-2" src="upload/produk/<?php echo $d['gbr_produk'];?>">
        <h5 class="text-center"><?php echo $d['nama_produk'];?></h5>
        <div class="border-bottom-h"></div>
      </div>
      <p><?php echo $d['long_desc'];?></p>
    </div>
  </div> 
  <!-- Right -->
  <div class="col-12 col-md-8 mb-3">
    <div class="row"> 
      <!-- Item Informasi Pembeliaan Start -->
      <?php echo $informasi_pembelian;?>
      <!-- Item Pilih Nominal Start -->
      <div class="col-12 mb-3">
        <div class="card bg-body-grey">
          <div class="card-header">
            <h5>Pilih Sub Produk</h5>
          </div> 
          <div class="row p-4">
            <?php foreach($mysqli->produk_list($id) as $u){ 
              $id_list = $u['id_list'];
              $code = $u['code_mark'];
              $val = $u['val_mark'];
              if($code=='percent'){
                $harga =  $u['harga'] + (($val/100) * $u['harga']);
              }else{
                $harga =  $u['harga'] + $val;
              }
              ?>
              <div class="col-12 col-md-4 mb-3">
                <input type="radio" class="btn-check w-100" name="id_list" id="nominal<?php echo $id_list;?>" value="<?php echo $id_list;?>" required>
                <label class="btn btn-secondary w-100" for="nominal<?php echo $id_list;?>"><?php echo $u['nama_list'];?>
                  <br> <em>Rp. <?php echo number_format($harga,0);?></em>
                </label>
              </div>
            <?php } ?>  
          </div>
        </div>
      </div>
      <!-- Item Metode Pembayaran Start -->
      <div class="col-12 mb-3">
        <div class="card bg-body-grey">
          <div class="card-header">
            <h5>Pilih Metode Pembayaran</h5>
          </div> 
          <div class="row p-4">
            <!-- Accordion Start -->
            <div class="accordion" id="accordionExample">
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                   <i class="bi bi-credit-card me-2"></i> Transfer Bank
                  </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <div class="row">
                      <?php foreach($mysqli->list_bank() as $r){ 
                        $id_rekening = $r['id']; 
                        ?>
                        <div class="col-12 col-md-12 mb-3">
                          <input type="radio" class="btn-check w-100" name="rekening" id="rekening<?php echo $id_rekening;?>" value="<?php echo $r['nomor_rekening'].'~'.$r['nama_bank'].'~'.$r['nama_pemilik'];?>" required>
                          <label class="btn btn-secondary w-100" for="rekening<?php echo $id_rekening;?>"><?php echo $r['nama_bank'];?> <br>
                          <em><?php echo $r['nomor_rekening'];?> A.n. <?php echo $r['nama_pemilik'];?></em>
                          </label>
                        </div>
                      <?php } ?>  
                    </div>
                  </div>
                </div>
              </div>
              <div class="accordion-item">
                <h2 class="accordion-header">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <i class="bi bi-cash-coin me-2"></i> Saldo
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    <?php echo $saldo;?>
                  </div>
                </div>
              </div> 
            </div>
            <!-- Accordion End -->
          </div>
        </div>
      </div>
      <!-- Item 2 Start -->
      <div class="col-12 mb-3">
        <div class="card bg-body-grey">
          <div class="card-header">
            <h5>Nomor Whatsapp</h5>
          </div> 
          <div class="row p-4">
            <input type="number" class="form-control" placeholder="081...." name="no_wa" value="<?php echo $kontak;?>">
          </div>
        </div>
      </div>

      <!-- Tombol Pean -->
      <div class="col-12 mb-3 d-flex justify-content-end">
        <?php echo $button;?>
      </div>
    </div>
  </div>

 
  
  <!-- End Row -->
</div>
</form>

<?php } 
else{
  include("404-l.php");
}
?>