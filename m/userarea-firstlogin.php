<?php
session_start();

include '../config.php';

// Periksa apakah pengguna telah login dan token-nya valid
if (!isset($_SESSION['username']) || !isset($_SESSION['token'])) {
	// Jika pengguna belum login atau token tidak ada, tampilkan pesan alert
	echo '<script>alert("Invalid token (Kamu belum melakukan login), silahkan login");</script>';
	echo '<script>window.location.href = "../index.php";</script>';
	exit;
}

// Periksa apakah token sesuai dengan yang ada di database untuk menghindari multiple login
$username = $_SESSION['username'];
$token = $_SESSION['token'];

// Periksa apakah token sesuai dengan yang ada di database untuk menghindari multiple login
$queryToken = "SELECT * FROM users WHERE username='$username' AND token='$token'";
$resultToken = mysqli_query($conn, $queryToken);
$userToken = mysqli_fetch_assoc($resultToken);

if (!$userToken) {
	// Jika token tidak sesuai, berarti pengguna telah login di perangkat lain
	// Tampilkan pesan alert dan hapus session untuk logout
	echo '<script>alert("Invalid token (Akun kamu telah login di perangkat lain), silahkan login ulang");</script>';
	session_unset();
	session_destroy();
	echo '<script>window.location.href = "../index.php";</script>';
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

// Ambil data saldo pengguna dari tabel users berdasarkan ID pengguna
$queryUserBalance = "SELECT balance FROM users WHERE username = '$username'";
$resultUserBalance = mysqli_query($conn, $queryUserBalance);
$userBalance = mysqli_fetch_assoc($resultUserBalance)['balance'];


// Mengubah format saldo menjadi IDR
$formattedBalance = '' . number_format($balance, 0, ',', ',');

// Mengambil data deposit yang sedang pending
$queryPendingDeposits = "SELECT SUM(amount) AS total_pending_deposit FROM deposits WHERE user_id='$userId' AND status='Pending'";
$resultPendingDeposits = mysqli_query($conn, $queryPendingDeposits);
$totalPendingDeposit = mysqli_fetch_assoc($resultPendingDeposits)['total_pending_deposit'];

// Mengubah format total pending deposit menjadi IDR
$formattedPendingDeposit = 'IDR ' . number_format($totalPendingDeposit, 0, ',', ',');

// Mengajukan deposit
if (isset($_POST['submit'])) {
	$amount = $_POST['amount'];
	$username = $user['username'];
	$bank_name = $user['bank_name'];
	$acc_no = $user['acc_no'];
	$fullname = $user['fullname'];
	$destination = $_POST['destination'];

	// Periksa apakah jumlah deposit memenuhi batasan minimum
	if ($amount >= MINIMAL_DEPOSIT) {
		// Simpan data deposit ke database
		$queryDeposit = "INSERT INTO deposits (user_id, amount, username, bank_name, acc_no, fullname, destination, status, submit_date) VALUES ('" . $user['id'] . "', '$amount', '$username', '$bank_name', '$acc_no', '$fullname', '$destination', 'Pending', CURDATE())";
		mysqli_query($conn, $queryDeposit);

		header('Location: userarea.php?page=deposit&head=home');
		exit;
	} else {
		$formattedMinimalDeposit = 'Rp ' . number_format(MINIMAL_DEPOSIT, 0, ',', '.');
		$pesan = "Maaf, minimal deposit adalah ' . $formattedMinimalDeposit . '";
		$url = "userarea.php?page=deposit&head=home"; // Ganti dengan URL tujuan yang diinginkan
		echo '<script type="text/javascript">
            alert("' . $pesan . '");
            window.location.href = "' . $url . '";
        </script>';
	}
}


$balance = $user['balance'];
// Check if the user has any pending withdrawal
$queryCheckPendingWithdraw = "SELECT * FROM withdraws WHERE username='$username' AND status='Pending'";
$resultCheckPendingWithdraw = mysqli_query($conn, $queryCheckPendingWithdraw);
$hasPendingWithdraw = mysqli_num_rows($resultCheckPendingWithdraw) > 0;

// Periksa apakah pengguna mengirimkan permintaan withdraw
if (isset($_POST['submitWithdraw'])) {
	$amount = $_POST['withdrawAmount'];

	if ($hasPendingWithdraw) {
		// Jika sudah memiliki pending withdrawal, tampilkan pesan SweetAlert
		$pesan = "Withdraw gagal ! Anda sedang memiliki status withdraw pending";
		$url = "userarea.php?page=withdraw&head=home"; // Ganti dengan URL tujuan yang diinginkan
		echo '<script type="text/javascript">
            alert("' . $pesan . '");
            window.location.href = "' . $url . '";
        </script>';
	} elseif ($balance >= $amount) {
		// Kurangi saldo pengguna
		$newBalance = intval($balance) - intval($amount);

		$queryUpdateBalance = "UPDATE users SET balance=$newBalance WHERE username='$username'";
		mysqli_query($conn, $queryUpdateBalance);

		// Tambahkan entri withdraw ke database dengan status "Pending"
		$queryAddWithdraw = "INSERT INTO withdraws (username, amount, status, created_at) VALUES ('$username', $amount, 'Pending', NOW())";
		mysqli_query($conn, $queryAddWithdraw);

		// Update nilai saldo di variabel $user
		$user['balance'] = $newBalance;

		// Pesan jika withdraw berhasil
		$pesan = "Withdraw Berhasil !";
		$url = "userarea.php?page=withdraw&head=home"; // Ganti dengan URL tujuan yang diinginkan
		echo '<script type="text/javascript">
            alert("' . $pesan . '");
            window.location.href = "' . $url . '";
        </script>';
		exit;
	} else {
		// Jika saldo tidak mencukupi, tampilkan pesan SweetAlert
		$pesan = "Withdraw gagal ! Saldo anda tidak mencukupi";
		$url = "userarea.php?page=withdraw&head=home"; // Ganti dengan URL tujuan yang diinginkan
		echo '<script type="text/javascript">
            alert("' . $pesan . '");
            window.location.href = "' . $url . '";
        </script>';
	}
}

// Periksa apakah terdapat permintaan withdraw yang perlu diubah statusnya
$queryWithdraws = "SELECT * FROM withdraws WHERE status='Pending' ORDER BY created_at ASC";
$resultWithdraws = mysqli_query($conn, $queryWithdraws);

while ($withdraw = mysqli_fetch_assoc($resultWithdraws)) {
	$withdrawId = $withdraw['id'];
	$created_at = $withdraw['created_at'];
	$currentDateTime = new DateTime();
	$withdrawDateTime = new DateTime($created_at);
	$interval = $currentDateTime->diff($withdrawDateTime);
	$minutesPassed = $interval->i; // Jumlah menit sejak permintaan withdraw dibuat

	if ($minutesPassed >= 1) {
		// Jika lebih dari atau sama dengan 1 menit, ubah status menjadi "Rejected"
		$queryUpdateWithdrawStatus = "UPDATE withdraws SET status='Rejected' WHERE id=$withdrawId";
		mysqli_query($conn, $queryUpdateWithdrawStatus);

		// Ambil data withdraw yang telah diubah statusnya menjadi "Rejected"
		$queryRejectedWithdraw = "SELECT * FROM withdraws WHERE id=$withdrawId AND status='Rejected'";
		$resultRejectedWithdraw = mysqli_query($conn, $queryRejectedWithdraw);
		$rejectedWithdraw = mysqli_fetch_assoc($resultRejectedWithdraw);

		if ($rejectedWithdraw) {
			// Jika status diubah menjadi "Rejected", kembalikan saldo pengguna
			$amountToRefund = $rejectedWithdraw['amount'];

			// Kembalikan saldo pengguna menggunakan nilai terbaru dari $user
			$newBalance = $user['balance'] + $amountToRefund;
			$queryUpdateBalance = "UPDATE users SET balance=$newBalance WHERE username='$username'";
			mysqli_query($conn, $queryUpdateBalance);

			// Update nilai saldo di variabel $user
			$user['balance'] = $newBalance;
		}
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo WEBSITE_NAME ?>: User Area</title>

  <!-- Meta -->
  <meta charset="utf-8">
  <!-- <meta content="width=device-width, initial-scale=1.0" name="viewport"> -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=0.65, maximum-scale=1, minimum-scale=0.65">
  <meta name="theme-color" content="#272b30">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="favicon.png">

  <!-- CSS Global Compulsory -->

  <link rel="stylesheet" href="bootstrap.web.white.min.css">
  <link rel="stylesheet" href="css/<?php echo MOBILE_CSS ?>.css">
  <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet" />
  <style>
    .blink_me {
      animation: blinker 1s step-start infinite;
    }

    @keyframes blinker {
      20% {
        opacity: 0.2;
      }
    }

    .bgcolorbtn {
      background-color: #3c4046 !important;
      border-color: #5e646c;
    }

    .nav-tabs>li>a {
      color: #333;
    }
  </style>
  <!-- JS Global Compulsory -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  <script src="4dv5.js"></script>
  <script>
    function secondtominute(d) {
      var m = Math.floor(d / (60));
      var s = d - (m * 60);
      if (s < 10) s = '0' + s;
      return m + ':' + s;
    }
  </script>

</head>

<body>

<nav class="navbar navbar-inverse" style="border-radius: 0px; margin-bottom:8px">
		<div class="container">
			<div class="navbar-header" style="background-color:#32363b;">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="userarea.php?page=login&head=home" style=" margin-top:-3px"><span style="color:#fc0; font-size:14px; font-weight:bold">USER AREA</span></a>
				<a class="btn btn-default btn-sm bgcolorbtn" href="userarea.php?page=deposit&head=home" style=" margin-top:7px"><span class="glyphicon glyphicon-import"></span>Deposit</a>
				<a class="btn btn-default btn-sm bgcolorbtn" href="userarea.php?page=withdraw&head=home" style=" margin-top:7px"><span class="glyphicon glyphicon-export"></span>Withdraw</a>
				<a class="btn btn-default btn-sm bgcolorbtn" href="userarea.php?page=history&head=home" style=" margin-top:7px"><span class="glyphicon glyphicon-calendar"></span>History</a>
				<a class="btn btn-default btn-sm bgcolorbtn" href="userarea.php?page=memo&head=home" style=" margin-top:7px">Memo<span class="badge badgeTotal" style="margin-left:5px; margin-right:10px; font-size:9px; font-weight:bold"></span></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar" style="background-color:#000;">
				<ul class="nav navbar-nav">
					<li><a href="userarea.php?page=login&head=home"><span class="glyphicon glyphicon-home"></span>Home</a></li>
					<li><a href="userarea.php?page=rekening&head=home"><span class="glyphicon glyphicon-briefcase"></span>Rekening</a></li>
					<li><a href="userarea.php?page=myaccount&head=home"><span class="glyphicon glyphicon-user"></span>Ubah Password</a></li>
					<li><a href="userarea.php?page=history&head=home"><span class="glyphicon glyphicon-calendar"></span>History Transaksi</a></li>
					<li><a href="userarea.php?page=deposit&head=home"><span class="glyphicon glyphicon-import"></span>Deposit</a></li>
					<li><a href="userarea.php?page=withdraw&head=home"><span class="glyphicon glyphicon-export"></span>Withdraw</a></li>
					<li><a href="userarea.php?page=memo&head=home"><span class="glyphicon glyphicon-edit"></span>Memo<span class="badge badgeTotal" style="margin-left:5px; margin-right:5px; font-size:9px; font-weight:bold"></span></a></li>
					<li><a href="userarea.php?page=referal&head=home"><span class="glyphicon glyphicon-user"></span>Referal</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<hr style="margin:0px;">
					<li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">


		<div class="col-xs-12" style="padding:0px; margin:0px;">
			<div class="col-xs-6" style="padding:0px; margin:0px;">
				<div id="logo"><a href="userarea.php?page=login&head=home"><img src="../secure_admin/<?php echo WEBSITE_LOGO ?>" width="150" alt="" style="margin:0px 0px 5px 0px" /></a></div>
			</div>
			<div class="col-xs-6" style="padding:0px; margin-top:0px; margin-bottom:5px;font-weight:bold; text-align:right">
				<a href="memo.php"><span class="glyphicon glyphicon-envelope"><span class="badge badgeTotal" style="margin-left:5px; margin-right:10px; font-size:9px; font-weight:bold"></span></span></a><span style="font-weight:bold"><?php echo $user['username']; ?></span><span style="font-weight:normal"> | <?php echo $user['fullname']; ?></span>
			</div>
		</div>
		<div class="col-xs-12" style="padding:0px; margin:0px;">


			<div class="col-xs-6" style="padding:0px; margin:0px;">
				<div class="panel panel-danger">
					<div class="panel-heading" style="padding-top:5px; padding-bottom:5px">User Data</div>
					<div class="panel-body" style="padding:10px;padding-top:3px;height:65px;overflow:hidden; font-size:10px"><input type="hidden" class="userstatus" value="1"><input type="hidden" class="credit" name="credit" value=""><input type="hidden" id="max_lose" value=""><input type="hidden" id="min_deposit" value=""><input type="hidden" id="min_withdraw" value="">
						<div>Balance: Rp <strong><span class="" style="font-size:14px; color:#d00"><?php echo number_format($userBalance, 0, ',', ','); ?></span></strong></div>
						<div>Last Login: <?php echo $lastLogin; ?><br><?php
																		$ip_pengguna = $_SERVER['REMOTE_ADDR'];
																		echo "<p>Last IP: " . $ip_pengguna . "</p>";
																		?></div>
					</div>
				</div>
			</div>
			<div class="col-xs-6" style="padding:0px; margin:0px; padding-left:8px;">
				<div class="panel panel-danger">
					<div class="panel-heading" style="padding-top:5px; padding-bottom:5px">Last Bet/Win Report</div>
					<div class="panel-body" id="winBet" style="padding:10px;padding-top:8px;height:65px; overflow:auto; font-size:10px">No Data<br>No Data<br>No Data</div>
				</div>
			</div>

		</div>
    <div class="clearfix"></div>

    <!-- CSS MOBILE -->
    <style>


    </style>
    <!-- MAIN TAB -->

    <ul class="nav nav-tabs grabgtab" style="margin-bottom:0px; font-size:15px; font-weight:bold; margin-top:0px;">

      <li class=" text-center " style="width:8%; text-align:center;" onClick="location.href='userarea.php?page=statement&head=home'"><a data-toggle="tab" href="#dashboard_wrap" style="padding-left: 0px; padding-right:0px"><span><img src="https://img.pay4d.info/tab-home-w.png" width="25" alt="" style="padding:3px" /><BR>&nbsp;</span></a></li>

      <li class="active" style="width:15%; text-align:center;" onClick="location.href='userarea.php?page=login&head=home'"><a data-toggle="tab" href="#toto_wrap"><span><img src="https://img.pay4d.info/tab-toto-w.png" width="25" alt="" /><br>Togel</span></a>


      </li>
      <li class="" style="width:15%; text-align:center;" onClick="location.href='userarea.php?page=slots&head=home'"><a data-toggle="tab" href="#games_wrap"><span><img src="https://img.pay4d.info/tab-slot-w.png" width="25" alt="" /><br>Slot</span></a>


      </li>


      <li class="" style="width:15%; text-align:center;" onClick="location.href='userarea.php?page=casino&head=home'"><a data-toggle="tab" href="#livegames_wrap"><span><img src="https://img.pay4d.info/tab-livegame-w.png" width="25" alt="" /><br>Casino</span></a>


      </li>
      <li class="" style="width:15%; text-align:center;" onClick="location.href='userarea.php?page=sport&head=home'"><a data-toggle="tab" href="#sport_wrap"><span><img src="https://img.pay4d.info/tab-sport-w.png" width="25" alt="" /><br>Sport</span></a>

        <span style="position:absolute; margin-top:-70px; margin-left:10px;"><img src="https://img.pay4d.info/joy.png" height="16" alt="" /></span>

      </li>

      <li class="" style="width:15%; text-align:center;" onClick="location.href='userarea.php?page=arcade&head=home'"><a data-toggle="tab" href="#fishing_wrap"><span><img src="https://img.pay4d.info/tab-tembakikan-w.png" width="25" alt="" /><br>Arcade</span></a>

      </li>

      <li class="" style="width:15%; text-align:center;" onClick="location.href='userarea.php?page=sabung&head=home'"><a data-toggle="tab" href="#sabung_wrap"><span><img src="https://img.pay4d.info/tab-sabung-w.png" width="25" alt="" /><br>Sabung</span></a>

        <span style="position:absolute; margin-top:-85px; margin-left:-20px;"><img src="https://img.pay4d.info/new2.png" width="40" alt="" /></span>
      </li>
    </ul>
    <div style="height:10px; background-color:#FFF" class="grabgtabbottom"></div>


    <div class="tab-content">




      <div id="toto_wrap" class="tab-pane fade in active">
        <div class="row" style="margin-top:0px; margin-bottom:10px;">
          <div class="col-xs-4" style="padding-right:2px;">

            <a class="btn btn-default btn-block active" href="userarea.php?page=login&head=home"><span class="glyphicon glyphicon-calendar"></span>Pasaran</a>
          </div>
          <div class="col-xs-4" style="padding-right:2px; padding-left:0px">

            <a class="btn btn-default btn-block " href="userarea.php?page=keluaran&head=home"><span class="glyphicon glyphicon-bell"></span>Keluaran</a>
          </div>

          <div class="col-xs-4" style="padding-left:0px">
            <a class="btn btn-default btn-block " href="userarea.php?page=bukumimpi&head=home"><span class="glyphicon glyphicon-book"></span>Buku Mimpi</a>
          </div>
        </div>

        <a class="btn btn-warning btn-block " href="userarea.php?page=SG&head=home" role="button"><span class="glyphicon glyphicon-ok-sign"></span><span style="font-size:14px; font-weight:bold; text-shadow:none;">SINGAPORE</span><span style="font-size:11px; margin-left:20px; text-shadow:none;">Tutup: 17:20 WIB - Diundi: 17:45 WIB</span><span class="blink_me" id="pidSG" style="float:right; text-shadow:none;"></span></a>
        <script>
          var timeSG = 41693;
          setInterval(function() {
            timeSG--;
            if (timeSG < 3600) $('#pidSG').text(secondtominute(timeSG));
          }, 1000);
        </script> <a class="btn btn-warning btn-block " href="userarea.php?page=SKA&head=home" role="button"><span class="glyphicon glyphicon-ok-sign"></span><span style="font-size:14px; font-weight:bold; text-shadow:none;">SAKA POOLS</span><span style="font-size:11px; margin-left:20px; text-shadow:none;">Tutup: 18:30 WIB - Diundi: 19:00 WIB</span><span class="blink_me" id="pidSKA" style="float:right; text-shadow:none;"></span></a>
        <script>
          var timeSKA = 45893;
          setInterval(function() {
            timeSKA--;
            if (timeSKA < 3600) $('#pidSKA').text(secondtominute(timeSKA));
          }, 1000);
        </script> <a class="btn btn-warning btn-block " href="userarea.php?page=SKT&head=home" role="button"><span class="glyphicon glyphicon-ok-sign"></span><span style="font-size:14px; font-weight:bold; text-shadow:none;">SAKA TOTO</span><span style="font-size:11px; margin-left:20px; text-shadow:none;">Tutup: 21:30 WIB - Diundi: 22:00 WIB</span><span class="blink_me" id="pidSKT" style="float:right; text-shadow:none;"></span></a>
        <script>
          var timeSKT = 56693;
          setInterval(function() {
            timeSKT--;
            if (timeSKT < 3600) $('#pidSKT').text(secondtominute(timeSKT));
          }, 1000);
        </script> <a class="btn btn-warning btn-block " href="userarea.php?page=SKD&head=home" role="button"><span class="glyphicon glyphicon-ok-sign"></span><span style="font-size:14px; font-weight:bold; text-shadow:none;">SAKA 4D</span><span style="font-size:11px; margin-left:20px; text-shadow:none;">Tutup: 23:30 WIB - Diundi: 23:59 WIB</span><span class="blink_me" id="pidSKD" style="float:right; text-shadow:none;"></span></a>
        <script>
          var timeSKD = 63893;
          setInterval(function() {
            timeSKD--;
            if (timeSKD < 3600) $('#pidSKD').text(secondtominute(timeSKD));
          }, 1000);
        </script> <a class="btn btn-warning btn-block " href="userarea.php?page=MY&head=home" role="button"><span class="glyphicon glyphicon-ok-sign"></span><span style="font-size:14px; font-weight:bold; text-shadow:none;">MALAYSIA</span><span style="font-size:11px; margin-left:20px; text-shadow:none;">Tutup: 18:30 WIB - Diundi: 19:00 WIB</span><span class="blink_me" id="pidMY" style="float:right; text-shadow:none;"></span></a>
        <script>
          var timeMY = 45893;
          setInterval(function() {
            timeMY--;
            if (timeMY < 3600) $('#pidMY').text(secondtominute(timeMY));
          }, 1000);
        </script> <a class="btn btn-warning btn-block " href="userarea.php?page=TWH&head=home" role="button"><span class="glyphicon glyphicon-ok-sign"></span><span style="font-size:14px; font-weight:bold; text-shadow:none;">TOTO WUHAN</span><span style="font-size:11px; margin-left:20px; text-shadow:none;">Tutup: Tiap 3 jam - Diundi: Tiap 3 jam</span><span class="blink_me" id="pidTWH" style="float:right; text-shadow:none;"></span></a>
        <script></script>
        <a class="btn btn-warning btn-block " href="userarea.php?page=HKD&head=home" role="button"><span class="glyphicon glyphicon-ok-sign"></span><span style="font-size:14px; font-weight:bold; text-shadow:none;">HK SIANG</span><span style="font-size:11px; margin-left:20px; text-shadow:none;">Tutup: 10:30 WIB - Diundi: 11:00 WIB</span><span class="blink_me" id="pidHKD" style="float:right; text-shadow:none;"></span></a>
        <script>
          var timeHKD = 17093;
          setInterval(function() {
            timeHKD--;
            if (timeHKD < 3600) $('#pidHKD').text(secondtominute(timeHKD));
          }, 1000);
        </script>

<div style="margin-top:20px">
					<div class="well well-sm" style="padding-top: 5px; padding-bottom:2px;">
						<marquee><span class="broadcast" style="white-space:nowrap"><?php echo MARQ ?></span></marquee>
					</div>
					<div class="well well-sm bankOnline" style="margin-top:-10px; text-align:center"><span style="margin-left:10px; margin-right:10px; white-space:nowrap"><strong>BCA</strong> : <span class="text-success">ONLINE</span></span>
						<span style="margin-left:10px; margin-right:10px; white-space:nowrap"><strong>Mandiri</strong> : <span class="text-success">ONLINE</span></span>
						<span style="margin-left:10px; margin-right:10px; white-space:nowrap"><strong>BNI</strong> : <span class="text-success">ONLINE</span></span>
						<span style="margin-left:10px; margin-right:10px; white-space:nowrap"><strong>BRI</strong> : <span class="text-success">ONLINE</span></span>
						<span style="margin-left:10px; margin-right:10px; white-space:nowrap"><strong>CIMB</strong> : <span class="text-success">ONLINE</span></span>
						<span style="margin-left:10px; margin-right:10px; white-space:nowrap"><strong>Danamon</strong> : <span class="text-success">ONLINE</span></span>
						<span style="margin-left:10px; margin-right:10px; white-space:nowrap"><strong>Permata</strong> : <span class="text-success">ONLINE</span></span>
						<span style="margin-left:10px; margin-right:10px; white-space:nowrap"><strong>BJB</strong> : <span class="text-success">ONLINE</span></span>
						<span style="margin-left:10px; margin-right:10px; white-space:nowrap"><strong>PANIN</strong> : <span class="text-success">ONLINE</span></span>
						<span style="margin-left:10px; margin-right:10px; white-space:nowrap"><strong>OCBC</strong> : <span class="text-success">ONLINE</span></span>
						<span style="margin-left:10px; margin-right:10px; white-space:nowrap"><strong>SUMUT</strong> : <span class="text-success">ONLINE</span></span>
						<span style="margin-left:10px; margin-right:10px; white-space:nowrap"><strong>BSI</strong> : <span class="text-success">ONLINE</span></span>
						<span style="margin-left:10px; margin-right:10px; white-space:nowrap"><strong>NEO</strong> : <span class="text-success">ONLINE</span></span>
						<span style="margin-left:10px; margin-right:10px; white-space:nowrap"><strong>JAGO</strong> : <span class="text-success">ONLINE</span></span>
						<span style="margin-left:10px; margin-right:10px; white-space:nowrap"><strong>Jenius</strong> : <span class="text-success">ONLINE</span></span>
						<span style="margin-left:10px; margin-right:10px; white-space:nowrap"><strong>DANA</strong> : <span class="text-success">ONLINE</span></span>
						<span style="margin-left:10px; margin-right:10px; white-space:nowrap"><strong>OVO</strong> : <span class="text-success">ONLINE</span></span>
						<span style="margin-left:10px; margin-right:10px; white-space:nowrap"><strong>ShopeePay</strong> : <span class="text-success">ONLINE</span></span>
						<span style="margin-left:10px; margin-right:10px; white-space:nowrap"><strong>GOPAY</strong> : <span class="text-success">ONLINE</span></span>
						<span style="margin-left:10px; margin-right:10px; white-space:nowrap"><strong>LinkAja</strong> : <span class="text-success">ONLINE</span></span>
						<span style="margin-left:10px; margin-right:10px; white-space:nowrap"><strong>Lain-lain</strong> : <span class="text-success">ONLINE</span></span>
					</div>

					<?php
					// Ambil tanggal saat ini
					$currentDate = date('d/m');
					?>

					<div class="well well-sm" style="margin-top:-10px; padding-bottom:2px">
						<marquee><span class="listkeluaran" style="white-space:nowrap"> <span style="margin-left:30px;"><span style="color:#F00 ">SINGAPORE </span><span style="color:#333"><?php echo $currentDate ?> </span><strong><?php echo TOGEL_SINGAPORE ?></strong></span>
								<span style="margin-left:30px;"><span style="color:#F00 ">SAKA POOLS </span><span style="color:#333"><?php echo $currentDate ?> </span><strong><?php echo TOGEL_SAKAPOOLS ?></strong></span>
								<span style="margin-left:30px;"><span style="color:#F00 ">SAKA TOTO </span><span style="color:#333"><?php echo $currentDate ?> </span><strong><?php echo TOGEL_SAKATOTO ?></strong></span>
								<span style="margin-left:30px;"><span style="color:#F00 ">SAKA 4D </span><span style="color:#333"><?php echo $currentDate ?> </span><strong><?php echo TOGEL_SAKA4D ?></strong></span>
								<span style="margin-left:30px;"><span style="color:#F00 ">MALAYSIA </span><span style="color:#333"><?php echo $currentDate ?> </span><strong><?php echo TOGEL_MALAYSIA ?></strong></span>
								<span style="margin-left:30px;"><span style="color:#F00 ">TOTO WUHAN </span><span style="color:#333"><?php echo $currentDate ?> </span><strong><?php echo TOGEL_TOTOWUHAN ?></strong></span>
								<span style="margin-left:30px;"><span style="color:#F00 ">HK SIANG </span><span style="color:#333"><?php echo $currentDate ?> </span><strong><?php echo TOGEL_HKSIANG ?></strong></span>
								<div style="clear:both"></div>
							</span></marquee>
					</div>
				</div>



			</div>



			<div id="games_wrap" class="tab-pane fade in ">

      </div>














    </div>



  </div>
  <div class="well well-sm container-fluid text-center" style="margin:0px; padding:5px; border-radius:0px; padding-bottom: 55px">
    &copy; 2018 - 2023 Copyright <?php echo WEBSITE_NAME ?>. All Rights Reserved.
  </div>


  <div style="font-size:18px; font-weight: bold; position: fixed;left: 0;bottom: 0;width: 100%; background-color: #FFF; box-shadow:rgba(0,0,0,0.6) 0px 0px 10px 0px">
    <div class="row" style="margin:0px; padding: 0px; border: 1px solid #DDD;border-left: 0px; border-bottom: 0px; border-top: 0px;">
      <div class="col-xs-4 text-center" style="border: 1px solid #DDD; padding: 10px; border-right: 0px;">
        <a href="<?php echo WA_ADMIN ?>" target="_blank" style="text-decoration: none; cursor: pointer; color: #333;"><img src="https://img.pay4d.info/icon-wa_w.png" style="width:30px; vertical-align:middle; margin-right: 5px; margin-top: -5px;">WhatsApp</a>
      </div>
      <div class="col-xs-4 text-center" style="border: 1px solid #DDD; padding: 10px; border-right: 0px;">
        <a href="../promosi.php" target="_blank" style="text-decoration: none; cursor: pointer; color: #333;"><img src="https://img.pay4d.info/icon-promo_w.png" style="width:30px; vertical-align:middle; margin-right: 5px; margin-top: -5px;">Promosi</a>
      </div>
      <div class="col-xs-4 text-center" style="border: 1px solid #DDD; padding: 10px; border-right: 0px;">
        <a href="<?php echo LIVECHAT_ADMIN ?>" target="_blank" style="text-decoration: none; cursor: pointer; color:  #333"><img src="https://img.pay4d.info/icon-livechat_w.png" style="width:30px; vertical-align:middle; margin-right: 5px; margin-top: -5px;">LiveChat</a>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title"><span class="glyphicon glyphicon-info-sign"></span>Syarat dan Ketentuan</h4>
        </div>
        <div class="modal-body">
          <ol>
            <li> MINIMAL USIA ADALAH 18 TAHUN<br>
            </li>
            <li>Harap memperhatikan jam tutup setiap pasaran karena jam tutup berbeda-beda.<br>
            </li>
            <li>Semua pasangan kan dianggap sah jika terjadi sebelum jam tutup di pasaran yang bersangkutan.<br>
            </li>
            <li>Pasangan yang sudah di konfirmasi tidak bisa dibatalkan.<br>
            </li>
            <li>Pasangan harap di cek kembali di menu history transaksi.<br>
            </li>
            <li>Semua betting yang telah dibeli adalah sah dan tidak bisa dibatalkan.<br>
            </li>
            <li>Setiap Member bertanggung jawab pada user account masing - masing.<br>
            </li>
            <li>Semua pasangan akan dibatalkan oleh pihak <?php echo WEBSITE_NAME ?> jika terdeteksi adanya kecurangan atau penipuan yang dilakukan oleh member.<br>
            </li>
            <li>Pasaran dan hadiah setiap pasaran berbeda-beda dan dapat berubah sewaktu-waktu. Harap perhatikan selalu Informasi yang terbaru.<br>
            </li>
            <li>Jika terjadi kecurangan deposit dan lain sebagainya, maka kami akan memberi peringatan kepada member, jika tetap dilakukan, pihak <?php echo WEBSITE_NAME ?> akan menutup akun member tersebut<br>
            </li>
            <li>Deposit dapat dilakukan setiap hari 24jam kecuali bank yang bersangkutan OFFLINE.<br>
            </li>
            <li>Withdraw dapat dilakukan setiap hari 24jam kecuali bank yang bersangkutan OFFLINE.<br>
            </li>
            <li>TIDAK MENERIMA PEMAIN INVEST DI PASARAN HONGKONG MALAM.<br>
            </li>
            <li>BATAS MAXIMAL INVEST DENGAN NOMINAL BET YANG SAMA:
              <br>40 LINE (2D),
              <br>400 LINE (3D),
              <br>3000 LINE (4D).
              <br>Jika masih melakukan betting invest melebihi batas maximal line akan kami berikan peringatan ringan sampai terjadinya pemblokiran permanen account dan saldo tidak dikembalikan
            </li>
            <li>Dengan bergabung sebagai member <?php echo WEBSITE_NAME ?> berarti anda telah menyetujui syarat dan peraturan dari <?php echo WEBSITE_NAME ?>.<br>
              SELAMAT BERMAIN DAN TERIMA KASIH.
            </li>
          </ol>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-ok-sign"></span>Setuju</button>
          <button type="button" class="btn btn-danger  pull-left" onClick="logout()"><span class="glyphicon glyphicon-remove-sign"></span>Tidak Setuju</button>
        </div>
      </div>

    </div>
  </div>



</body>

</html>