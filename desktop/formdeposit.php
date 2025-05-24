<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../config.php';
include_once "../assets/admin.js";

if (!isset($_SESSION['username'])) {
  header('Location: ../index.php');
  exit;
}

$username = $_SESSION['username'];
$queryUser = "SELECT * FROM users WHERE username='$username'";
$resultUser = mysqli_query($conn, $queryUser);
$user = mysqli_fetch_assoc($resultUser);

$userId = $user['id'];
$queryBalance = "SELECT SUM(amount) AS balance FROM deposits WHERE user_id='$userId' AND status='Approved'";
$resultBalance = mysqli_query($conn, $queryBalance);
$balance = mysqli_fetch_assoc($resultBalance)['balance'];

$formattedBalance = 'IDR ' . number_format($balance, 0, ',', '.');
$queryPendingDeposits = "SELECT SUM(amount) AS total_pending_deposit FROM deposits WHERE user_id='$userId' AND status='Pending'";
$resultPendingDeposits = mysqli_query($conn, $queryPendingDeposits);
$totalPendingDeposit = mysqli_fetch_assoc($resultPendingDeposits)['total_pending_deposit'];
$formattedPendingDeposit = 'IDR ' . number_format($totalPendingDeposit, 0, ',', '.');

// Mengajukan deposit
if (isset($_POST['submit'])) {
  $amount = $_POST['amount'];
  $username = $user['username'];
  $bank_name = $user['bank_name'];
  $acc_no = $user['acc_no'];
  $fullname = $user['fullname'];
  $destination = $_POST['destination'];

  $submitDate = date('d M Y H:i:s');
  if ($amount >= MINIMAL_DEPOSIT) {
    $queryDeposit = "INSERT INTO deposits (user_id, amount, username, bank_name, acc_no, fullname, destination, status, submit_date) VALUES ('" . $user['id'] . "', '$amount', '$username', '$bank_name', '$acc_no', '$fullname', '$destination', 'Pending', '$submitDate')";
    mysqli_query($conn, $queryDeposit);

    echo '<script type="text/javascript">alert("Deposit dikirim");</script>';
  } else {
    $formattedMinimalDeposit = 'IDR ' . number_format(MINIMAL_DEPOSIT, 0, ',', '.');
    echo '<script type="text/javascript">alert("Maaf, minimal deposit adalah ' . $formattedMinimalDeposit . '");</script>';
  }
}

$queryBankOptions = "SELECT * FROM bank_options";
$resultBankOptions = mysqli_query($conn, $queryBankOptions);
$bankOptionsData = [];
while ($bankOption = mysqli_fetch_assoc($resultBankOptions)) {
  $bankOptionsData[] = $bankOption;
}
$sql = "SELECT last_login FROM users WHERE user_id = '$userId'";
$result = $conn->query($sql);
$lastLogin = $user['last_login'];
$amountFromDatabase = 1000000; // Angka dari database
$formattedAmount = 'IDR ' . number_format($amountFromDatabase, 0, ',', '.');
?>



<div id="statusDeposit" style="display: none;"></div><span id="deposit_form">
  <div class="panel panel-danger">
    <div class="panel-heading">
      <strong><span class="glyphicon glyphicon-import"></span>DEPOSIT</strong>
    </div>



    <?php
    // Periksa apakah ada deposit Pending untuk pengguna yang sedang login
    $queryPendingDeposit = "SELECT * FROM deposits WHERE status='Pending' AND user_id = '$userId'";
    $resultPendingDeposit = mysqli_query($conn, $queryPendingDeposit);
    if (mysqli_num_rows($resultPendingDeposit) > 0) {
      // Jika deposit sedang pending, tampilkan form dengan status depositnya
      $depositData = mysqli_fetch_assoc($resultPendingDeposit);
    ?>
      <div class="panel-heading">
        <p>Deposit sedang dalam proses. Mohon tunggu hingga deposit selesai diproses.</p>
      </div>
    <?php
    } else {
      // Jika tidak ada deposit Pending, tampilkan form
    ?>
      <div class="panel-body">
        <form method="post" action="" class="form-group-sm deposit_form">
          <div id="loading" style="display: none;">
            <img src="m/loading.gif" width="36px" alt="Loading...">
          </div>
          <div id="content" style="display: none;">
            <!-- Isi konten di sini -->
            <div class="form-group">
              <label>Rekening Asal</label>
              <select class="form-control rekasal" name="bankasal">
                <option value="139752" selected="" att="37"><?php echo $user['bank_name']; ?> <?php echo $user['acc_no']; ?> <?php echo $user['fullname']; ?></option>
              </select>
            </div>
            <script>
              $(document).ready(function() {
                $('#jumlah_deposit').focus();

                $(document).on("change", ".rektujuan", function() {
                  var bank = $(this).val()
                  var nr = $('.rektujuan option[value=' + bank + ']').attr('rek');
                  if (nr != '') $('#norek').val(nr);

                  $('.qrimg').each(function() {
                    var id = $(this).attr('att');
                    $('.qrimg' + id).hide();
                  });

                  $('.qrimg' + bank).show();

                  if (bank == '46' || bank == '41' || bank == '19' || bank == '42') {
                    $("#input_catatan").hide();
                    $("#input_pengirim").show();
                    $("#note").val('nb');
                  } else {
                    $("#input_catatan").show();
                    $("#input_pengirim").hide();
                    $("#note").val('b');
                  }

                  if (bank == '37' || bank == '46') {
                    $("#nonqr").css("width", "66.6%");
                  } else {
                    $("#nonqr").css("width", "100%");
                  }
                });

                $(document).on("change", ".rekasal", function() {
                  var ra = $('.rekasal').val();
                  var oa = $('.rekasal option[value=' + ra + ']').attr('att');
                  if (oa != '') $('.rektujuan').val(oa);

                  var nr = $('.rektujuan option[value=' + oa + ']').attr('rek');
                  if (nr != '') $('#norek').val(nr);

                  $('#notesalin').hide();

                  $('.qrimg').each(function() {
                    var id = $(this).attr('att');
                    $('.qrimg' + id).hide();
                  });

                  $('.qrimg' + oa).show();

                  if (oa == '37') {
                    $("#nonqr").css("width", "66.6%");
                  } else {
                    $("#nonqr").css("width", "100%");
                  }
                });
              });
            </script>


            <div class="form-group">
              <label>Rekening Tujuan Deposit</label><a title="Salin No Rekening" href="javascript:salinnorek();" style="text-decoration: underline;"><span style="float: right;"><span class="glyphicon glyphicon-duplicate" style="margin-left: 20px"></span><u>Salin</u></span></a><span id="notesalin" style="float: right; display: none;" class="text-success">Berhasil disalin!</span>
              <select class="form-control rektujuan" name="destination">
                <?php foreach ($bankOptionsData as $bankOption) : ?>

                  <option value="<?php echo $bankOption['value']; ?>" att="" rek="<?php echo $bankOption['att']; ?>"><?php echo $bankOption['value']; ?> <?php echo $bankOption['att']; ?> A/N <?php echo $bankOption['rek']; ?></option>

                <?php endforeach; ?>
              </select>
              <input type="text" id="norek" value="" style="position: absolute; z-index: -999; opacity: 0;">
            </div>
            <div class="rows">
              <div id="nonqr" class="col-md-8" style="padding: 0px; width: 66.6%;">
                <div class="well well-sm" style="margin-top: 10px">
                  Untuk Deposit ke Rekening atau Emoney Berbeda,<br>Silakan tambahkan akun anda di menu <span class="glyphicon glyphicon-briefcase" style="margin-left: 5px"></span>Rekening
                </div>
                <div class="form-group">
                  <label for="amount">Jumlah</label>

                  <input type="text" class="form-control text-right" name="amount" style="font-weight:bold" id="amount">
                </div>


                <div class="form-group" id="input_pengirim" style="display: none;">
                  <label>Catatan: Nomor Pengirim / Kode SN / Nominal Unik</label><input type="text" class="form-control" placeholder="max 24 karakter (harus diisi)" maxlength="24" name="pengirim" style="font-weight:bold" id="pengirim">
                </div>
                <div class="form-group" id="input_catatan" style="">
                  <label>Catatan: Nomor Rekord / Referensi</label><input type="text" class="form-control" placeholder="max 24 karakter (bila diperlukan)" maxlength="24" name="catatan" style="font-weight:bold" id="catatan">
                </div>

                <input type="submit" name="submit" class="btn btn-info btn-block" id="konfirmasi_deposit" value="Konfirmasi Deposit">
              </div>

            </div>

          </div>

        <?php
      }
        ?>

        <script>
          // Menampilkan animasi loading GIF
          document.getElementById("loading").style.display = "block";

          // Menunggu selama 2 detik sebelum menampilkan konten
          setTimeout(function() {
            // Sembunyikan animasi loading GIF
            document.getElementById("loading").style.display = "none";

            // Tampilkan konten
            document.getElementById("content").style.display = "block";
          }, 1000);
        </script>


      </div>
      </form>

  </div>
  </div>
</span>
</div>

<script>
  $(document).on("click", "#konfirmasi_deposit", function() {
    // Kode yang ada di dalam event handler ini
    // ...

    $.post(
      "",
      $(".deposit_form").serialize(),
      function(data) {
        if (data == "success") {
          setTimeout(function() {
            $("#statusDeposit").fadeOut(500, function() {
              $("#statusDeposit")
                .removeClass(
                  "alert alert-warning text-center glyphicon glyphicon-alert"
                )
                .addClass("alert alert-success text-center")
                .text("Terima kasih, Deposit berhasil disubmit!")
                .fadeIn(1000);
            });
          }, 1000);
        }
        // Kode lainnya...
      }
    );

    // ...
  });
</script>