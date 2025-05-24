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

// Ambil saldo pengguna dari database
$userId = $user['id'];
$queryBalance = "SELECT SUM(amount) AS balance FROM deposits WHERE user_id='$userId' AND status='Approved'";
$resultBalance = mysqli_query($conn, $queryBalance);
$balance = mysqli_fetch_assoc($resultBalance)['balance'];

// Mengubah format saldo menjadi IDR
$formattedBalance = 'IDR ' . number_format($balance, 0, ',', '.');

// Mengambil data deposit yang sedang pending
$queryPendingDeposits = "SELECT SUM(amount) AS total_pending_deposit FROM deposits WHERE user_id='$userId' AND status='Pending'";
$resultPendingDeposits = mysqli_query($conn, $queryPendingDeposits);
$totalPendingDeposit = mysqli_fetch_assoc($resultPendingDeposits)['total_pending_deposit'];

// Mengubah format total pending deposit menjadi IDR
$formattedPendingDeposit = 'IDR ' . number_format($totalPendingDeposit, 0, ',', '.');

// Mengajukan deposit
if (isset($_POST['submit'])) {
  $amount = $_POST['amount'];
  $username = $user['username'];
  $bank_name = $user['bank_name'];
  $acc_no = $user['acc_no'];
  $fullname = $user['fullname'];
  $destination = $_POST['destination'];


  // Mengubah format tanggal CURDATE() menjadi (d M Y H:i:s)
  $submitDate = date('d M Y H:i:s');

  // Periksa apakah jumlah deposit memenuhi batasan minimum
  if ($amount >= MINIMAL_DEPOSIT) {



    // Simpan data deposit ke database
    $queryDeposit = "INSERT INTO deposits (user_id, amount, username, bank_name, acc_no, fullname, destination, status, submit_date) VALUES ('" . $user['id'] . "', '$amount', '$username', '$bank_name', '$acc_no', '$fullname', '$destination', 'Pending', '$submitDate')";
    mysqli_query($conn, $queryDeposit);

    echo '<script type="text/javascript">alert("Deposit dikirim");</script>';
  } else {
    $formattedMinimalDeposit = 'IDR ' . number_format(MINIMAL_DEPOSIT, 0, ',', '.');
    echo '<script type="text/javascript">alert("Maaf, minimal deposit adalah ' . $formattedMinimalDeposit . '");</script>';
  }
}





// Periksa apakah pengguna mengirimkan permintaan withdraw
if (isset($_POST['submitWithdraw'])) {
  $amount = $_POST['withdrawAmount'];

  // Periksa apakah saldo pengguna cukup untuk withdraw
  if ($amount <= $balance) { //$amount <= $balance
    // Kurangi saldo pengguna
    $newBalance = $balance - $amount;;  // $balance - $amount;
    $queryUpdateBalance = "UPDATE deposits SET amount=$newBalance WHERE username='$username'";
    mysqli_query($conn, $queryUpdateBalance);

    // Tambahkan entri withdraw ke database
    $queryAddWithdraw = "INSERT INTO withdraws (username, amount, status) VALUES ('$username', $amount, 'Pending')";
    mysqli_query($conn, $queryAddWithdraw);

    // Pesan jika withdraw berhasil
    $pesan = "Withdraw Berhasil !";
    $url = "index.php"; // Ganti dengan URL tujuan yang diinginkan
    echo '<script type="text/javascript">
            alert("' . $pesan . '");
            window.location.href = "' . $url . '";
         </script>';
    exit;
  } else {
    // Jika saldo tidak mencukupi, tampilkan pesan SweetAlert
    $pesan = "Withdraw gagal ! Saldo anda tidak mencukupi";
    $url = "index.php"; // Ganti dengan URL tujuan yang diinginkan
    echo '<script type="text/javascript">
            alert("' . $pesan . '");
            window.location.href = "' . $url . '";
         </script>';
  }
}



// Ambil nilai banner carousel dari database
$queryBannerCarousel = "SELECT value FROM configuration WHERE key_name='banner_carousel'";
$resultBannerCarousel = mysqli_query($conn, $queryBannerCarousel);
$bannerCarousel = mysqli_fetch_assoc($resultBannerCarousel);

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

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Periksa kecocokan username dan password dengan database
  $query = "SELECT * FROM users WHERE username='$username'";
  $result = mysqli_query($conn, $query);
  $user = mysqli_fetch_assoc($result);

  if ($user && password_verify($password, $user['password'])) {
    // Login berhasil, simpan data pengguna ke session
    $_SESSION['username'] = $user['username'];
    $_SESSION['level'] = $user['level'];

    // Redirect ke halaman admin
    header('Location: admin.php');
    exit;
  } else {
    // Login gagal, tampilkan pesan error
    $queryFailedLogin = "SELECT * FROM failed_logins WHERE username='$username'";
    $resultFailedLogin = mysqli_query($conn, $queryFailedLogin);
    $failedLogin = mysqli_fetch_assoc($resultFailedLogin);

    if ($failedLogin && $failedLogin['count'] >= 2) {
      // Jika pengguna salah memasukkan kata sandi sebanyak 3x, tampilkan pesan SweetAlert dan batasi akses selama 60 detik
      echo "<script>
                Swal.fire({
                    title: 'Login Gagal',
                    text: 'Anda telah salah memasukkan kata sandi sebanyak 3 kali. Silakan coba lagi dalam 60 detik.',
                    icon: 'error'
                });
            </script>";
    } else {
      // Jika pengguna salah memasukkan kata sandi kurang dari 3x, tampilkan pesan error dan catat kegagalan login
      $errorMessage = "Username atau password salah.";

      // ...


      if ($failedLogin) {
        // Jika sudah ada catatan kegagalan login sebelumnya, update jumlah kegagalan login
        $count = $failedLogin['count'] + 1;
        $queryUpdateFailedLogin = "UPDATE failed_logins SET count=$count WHERE username='$username'";
        mysqli_query($conn, $queryUpdateFailedLogin);
      } else {
        // Jika belum ada catatan kegagalan login sebelumnya, tambahkan catatan baru
        $queryInsertFailedLogin = "INSERT INTO failed_logins (username, count) VALUES ('$username', 1)";
        mysqli_query($conn, $queryInsertFailedLogin);
      }
    }
  }
}

// Ambil waktu terakhir login dari tabel pengguna
$sql = "SELECT last_login FROM users WHERE user_id = '$userId'";
$result = $conn->query($sql);


$lastLogin = $user['last_login'];

// Mengambil angka dari database
$amountFromDatabase = 1000000; // Angka dari database

// Mengubah format angka menjadi format mata uang IDR
$formattedAmount = 'IDR ' . number_format($amountFromDatabase, 0, ',', '.');
?>
    
    <div class="panel-body" id="rekening">
        <form class="form-group-sm updaterek_form" method="post">
        <div id="loadingREK" style="display: none;">
      <img src="m/loading.gif" width="36px" alt="Loading...">
    </div>
    <div id="contentREK" style="display: none;">
      <!-- Isi konten di sini -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th style="width:150px;">Bank</th>
                        <th>Nama Rekening</th>
                        <th style="width:250px;">No Rekening</th>
                        <th style="width:120px; text-align:center;">Rek. Withdraw</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td><input type="text" class="form-control" value="<?php echo $user['bank_name']; ?>" readonly=""></td>
                        <td><input type="text" class="form-control" value="<?php echo $user['fullname']; ?>" readonly=""></td>
                        <td><input type="text" class="form-control" value="<?php echo $user['acc_no']; ?>" readonly=""></td>
                        <td style="text-align:center; padding-top: 12px;"><input type="radio" name="def" value="339497" checked=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </form>
        <h5>Tambah Rekening</h5>
        <form class="form-group-sm addrek_form" method="post">
            <table class="table">
                <thead>
                    <tr>
                        <th style="width:150px;">Bank</th>
                        <th>Nama Rekening</th>
                        <th style="width:380px;">No Rekening</th>
                        <th style="width:100px;"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select class="form-control" name="bankadd" id="reg_bank">
                                <option value="">Pilih Bank</option>
                                <option value="BCA">BCA</option>
                                <option value="Mandiri">Mandiri</option>
                                <option value="BNI">BNI</option>
                                <option value="BRI">BRI</option>
                                <option value="CIMB">CIMB</option>
                                <option value="Danamon">Danamon</option>
                                <option value="Permata">Permata</option>
                                <option value="BJB">BJB</option>
                                <option value="PANIN">PANIN</option>
                                <option value="OCBC">OCBC</option>
                                <option value="SUMUT">SUMUT</option>
                                <option value="BSI">BSI</option>
                                <option value="NEO">NEO</option>
                                <option value="JAGO">JAGO</option>
                                <option value="Jenius">Jenius</option>
                                <option value="DANA">DANA</option>
                                <option value="OVO">OVO</option>
                                <option value="ShopeePay">ShopeePay</option>
                                <option value="GOPAY">GOPAY</option>
                                <option value="LinkAja">LinkAja</option>
                                <option value="Lain-lain">Lain-lain</option>
                            </select>
                        </td>
                        <td><input type="text" class="form-control" value="<?php echo $user['fullname']; ?>" readonly=""></td>
                        <td><input type="text" class="form-control" name="rekadd" inputmode="numeric" id="noaddrek" maxlength="20" placeholder="Isi Nomor Rekening"></td>
                        <td><input type="hidden" name="task" value="addrek"><input type="submit" id="addrek" class="btn btn-success" value="Tambah" style="width: 150px; height: 26px; padding-top: 4px"></td>
                    </tr>
                </tbody>
            </table>
        </form>
        <script>
        // Menampilkan animasi loading GIF
        document.getElementById("loadingREK").style.display = "block";

        // Menunggu selama 2 detik sebelum menampilkan konten
        setTimeout(function() {
          // Sembunyikan animasi loadingREK GIF
          document.getElementById("loadingREK").style.display = "none";

          // Tampilkan konten
          document.getElementById("contentREK").style.display = "block";
        }, 1000);
      </script>
        <script>
            $(document).ready(function() {
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>

    
