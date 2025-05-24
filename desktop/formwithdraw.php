<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../config.php';
include_once "../assets/admin.js";
// Periksa apakah pengguna telah login
if (!isset($_SESSION['username'])) {
  // Jika pengguna belum login, redirect ke halaman login
  header('Location: ../index.php');
  exit;
}

// Ambil informasi pengguna dari database
$username = $_SESSION['username'];
$queryUser = "SELECT * FROM users WHERE username='$username'";
$resultUser = mysqli_query($conn, $queryUser);
$user = mysqli_fetch_assoc($resultUser);

// Mengambil data withdraw pengguna
$queryWithdraws = "SELECT * FROM withdraws WHERE username='$username' ORDER BY created_at DESC";
$resultWithdraws = mysqli_query($conn, $queryWithdraws);

$queryBankOptions = "SELECT * FROM bank_options";
$resultBankOptions = mysqli_query($conn, $queryBankOptions);
// Inisialisasi array untuk menyimpan data opsi bank
$bankOptionsData = [];

// Loop melalui hasil query dan simpan data opsi bank dalam array
while ($bankOption = mysqli_fetch_assoc($resultBankOptions)) {
  $bankOptionsData[] = $bankOption;
}


// Mengambil angka dari database
$amountFromDatabase = 1000000; // Angka dari database

// Mengubah format angka menjadi format mata uang IDR
$formattedAmount = 'IDR ' . number_format($amountFromDatabase, 0, ',', '.');
?>


<span id="withdraw_form">


  <div class="panel panel-danger">
    <div class="panel-heading">
      <strong><span class="glyphicon glyphicon-export"></span>WITHDRAW</strong>
    </div>
    <div class="panel-body">


      <form class="form-group-sm withdraw_form" method="post">
        <div id="loadingWD" style="display: none;">
          <img src="m/loading.gif" width="36px" alt="Loading...">
        </div>

        <div id="contentWD" style="display: none;">
          <!-- Isi konten di sini -->
          <div class="form-group">
            <label>Rekening Withdraw</label>
            <input type="text" class="form-control" readonly="" value="<?php echo $user['bank_name']; ?> <?php echo $user['acc_no']; ?> <?php echo $user['fullname']; ?>">

          </div>
          <div class="form-group">
            <label for="withdrawAmount">Jumlah</label><input type="number" class="form-control text-right" name="withdrawAmount" id="withdrawAmount" min="10000" style="font-weight:bold" required>
          </div>
          <div class="form-group" id="input_catatan">
            <label>Catatan: </label><input type="text" class="form-control" placeholder="max 24 karakter (bila diperlukan)" maxlength="24" name="catatan" style="font-weight:bold" id="catatan">
          </div>

          <input type="hidden" name="task" value="withdraw">
          <input type="hidden" name="kelipatan" id="kelipatan" value="1000">
          <button type="submit" class="btn btn-info btn-block" name="submitWithdraw">Request Withdraw</button>
          
      </form>

    </div>
  </div>

  </div>



  <script>
    $(document).ready(function() {
      $('#jumlah_withdraw').focus();
    });
  </script>
</span>
<script>
  // Menampilkan animasi loading GIF
  document.getElementById("loadingWD").style.display = "block";

  // Menunggu selama 2 detik sebelum menampilkan konten
  setTimeout(function() {
    // Sembunyikan animasi loadingWD GIF
    document.getElementById("loadingWD").style.display = "none";

    // Tampilkan konten
    document.getElementById("contentWD").style.display = "block";
  }, 1000);
</script>