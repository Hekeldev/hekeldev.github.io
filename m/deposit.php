<?php
session_start();

// Periksa apakah pengguna telah login
if (!isset($_SESSION['user_id'])) {
	// Redirect ke halaman login jika pengguna belum login
	header("Location: ../");
	exit();
}

if (isset($_SESSION['user_id'])) {
	include_once("../functions/database.php");
	$mysqli = new databases();
	$sesi_id = $_SESSION['user_id'];

	if (empty($sesi_id)) {
		header('location:./');
	}
} else {

	include_once('../functions/database.php');
}

foreach ($mysqli->user_sesi($sesi_id) as $sesi);
foreach ($mysqli->saldo_akun($sesi_id) as $saldo);
$saldo_akun = number_format($saldo['saldo'], 0);
$sesi_level = $sesi['level'];


// =====================================================
$sesi_id = $_SESSION['user_id'];
include_once("../functions/database.php");
$mysqli = new databases();
foreach ($mysqli->user_sesi($sesi_id) as $sesi);
$uuid_user = $sesi['id'];
if ($uuid_user == '') {
	include("index.php");
} else {
	foreach ($mysqli->user_sesi($sesi_id) as $d);
}

// Ambil username dari session
$sesi_id = $_SESSION['user_id'];

// Ambil data waktu terakhir login dari database
$dbHost = 'localhost';
			$dbUser = 'heavendn_gamepay';
			$dbPass = 'Dimasws2004@';
			$dbName = 'heavendn_slots';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Periksa koneksi database
if ($conn->connect_error) {
	die("Koneksi database gagal: " . $conn->connect_error);
}

// Ambil waktu terakhir login dari tabel pengguna
$sql = "SELECT last_login FROM user WHERE user_id = '$sesi_id'";
$result = $conn->query($sql);


$lastLogin = $d['last_login'];

include_once "miminMASTER/modul/query_pengaturan2.php";
include_once "miminMASTER/modul/koneksi.php";
include_once "miminMASTER/modul/fungsi_umum.php";

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $isi1_judul_website; ?>: User Area</title>

	<!-- Meta -->
	<meta charset="utf-8">
	<!-- <meta content="width=device-width, initial-scale=1.0" name="viewport"> -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=0.65, maximum-scale=1, minimum-scale=0.65">
	<meta name="theme-color" content="#272b30">

	<!-- Favicon -->
	<link rel="icon" type="image/png" href="favicon.png">

	<!-- CSS Global Compulsory -->

	<link rel="stylesheet" href="../css/bootstrap.web.white.min.css">
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
	<script src="../js/4dv5.js"></script>
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
				<a class="navbar-brand" href="userarea.php" style=" margin-top:-3px"><span style="color:#fc0; font-size:14px; font-weight:bold">USER AREA</span></a>
				<a class="btn btn-default btn-sm bgcolorbtn" href="deposit.php" style=" margin-top:7px"><span class="glyphicon glyphicon-import"></span>Deposit</a>
				<a class="btn btn-default btn-sm bgcolorbtn" href="withdraw.php" style=" margin-top:7px"><span class="glyphicon glyphicon-export"></span>Withdraw</a>
				<a class="btn btn-default btn-sm bgcolorbtn" href="history.php" style=" margin-top:7px"><span class="glyphicon glyphicon-calendar"></span>History</a>
				<a class="btn btn-default btn-sm bgcolorbtn" href="memo.php" style=" margin-top:7px">Memo<span class="badge badgeTotal" style="margin-left:5px; margin-right:10px; font-size:9px; font-weight:bold"></span></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar" style="background-color:#000;">
				<ul class="nav navbar-nav">
					<li><a href="statement.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
					<li><a href="rekening.php"><span class="glyphicon glyphicon-briefcase"></span>Rekening</a></li>
					<li><a href="myaccount.php"><span class="glyphicon glyphicon-user"></span>Ubah Password</a></li>
					<li><a href="history.php"><span class="glyphicon glyphicon-calendar"></span>History Transaksi</a></li>
					<li><a href="deposit.php"><span class="glyphicon glyphicon-import"></span>Deposit</a></li>
					<li><a href="withdraw.php"><span class="glyphicon glyphicon-export"></span>Withdraw</a></li>
					<li><a href="memo.php"><span class="glyphicon glyphicon-edit"></span>Memo<span class="badge badgeTotal" style="margin-left:5px; margin-right:5px; font-size:9px; font-weight:bold"></span></a></li>
					<li><a href="referal.php"><span class="glyphicon glyphicon-user"></span>Referal</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<hr style="margin:0px;">
					<li><a href="../functions/logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">


		<div class="col-xs-12" style="padding:0px; margin:0px;">
			<div class="col-xs-6" style="padding:0px; margin:0px;">
				<div id="logo"><a href="userarea.php"><img src="images/logo.png" width="150" alt="" style="margin:0px 0px 5px 0px" /></a></div>
			</div>
			<div class="col-xs-6" style="padding:0px; margin-top:0px; margin-bottom:5px;font-weight:bold; text-align:right">
				<a href="memo.php"><span class="glyphicon glyphicon-envelope"><span class="badge badgeTotal" style="margin-left:5px; margin-right:10px; font-size:9px; font-weight:bold"></span></span></a><span style="font-weight:bold"><?php echo $d['username']; ?></span><span style="font-weight:normal"> | <?php echo $d['nama']; ?></span>
			</div>
		</div>
		<div class="col-xs-12" style="padding:0px; margin:0px;">


			<div class="col-xs-6" style="padding:0px; margin:0px;">
				<div class="panel panel-danger">
					<div class="panel-heading" style="padding-top:5px; padding-bottom:5px">User Data</div>
					<div class="panel-body" style="padding:10px;padding-top:3px;height:65px;overflow:hidden; font-size:10px"><input type="hidden" class="userstatus" value="1"><input type="hidden" class="credit" name="credit" value=""><input type="hidden" id="max_lose" value=""><input type="hidden" id="min_deposit" value=""><input type="hidden" id="min_withdraw" value="">
						<div>Balance: Rp <strong><span class="userCredit" style="font-size:14px; color:#d00"><?php echo $saldo_akun ?></span></strong></div>
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
		<style>
			body {
				padding: 0px;
				padding-top: 0px;
				margin: 0px;
				background-color: #EEE !important;
				font-size: 12px;
			}

			.well {
				background-color: #FFF !important;
			}

			.container {
				width: 100%;
			}

			.contentmenu {
				width: 1000px;
				margin: 0px auto;
				text-align: left;
				padding: 10px;
				font-size: 12px;
			}

			.btn-lg {
				font-size: 14px;

			}

			.contentmenu a:link,
			.contentmenu a:visited {
				text-decoration: none;
				color: black;
			}

			.contentmenu a:hover {
				text-decoration: none;
				color: blue;
			}

			.header {
				background-color: #ffffff;


			}

			.contentheader {
				width: 1000px;
				margin: 0px auto;
				padding-top: 20px;
			}

			.menubar {
				background-color: #FEFEFE;
				border-bottom: 1px #CCC solid;
			}

			.headbox {
				background-color: #EEE;
				margin: 0px auto;
				text-align: center;
				padding: 8px;
				font-size: 14px;
				color: black;
				-webkit-border-radius: 5px 5px 0px 0px;
				-moz-border-radius: 5px 5px 0px 0px;
				border-radius: 5px 5px 0px 0px;
				-webkit-box-shadow: #DDD 0px 5px 10px;
				-moz-box-shadow: #DDD 0px 5px 10px;
				box-shadow: #DDD 0px 5px 10px;
			}

			.contentbox {
				background-color: #FFF;
				min-height: 100px;
				padding: 15px;
				color: black;
				-webkit-border-radius: 0px 0px 5px 5px;
				-moz-border-radius: 0px 0px 5px 5px;
				border-radius: 0px 0px 5px 5px;
				-webkit-box-shadow: #DDD 0px 5px 10px;
				-moz-box-shadow: #DDD 0px 5px 10px;
				box-shadow: #DDD 0px 5px 10px;
			}


			.btn-rad {
				-webkit-border-radius: 8px;
				-moz-border-radius: 8px;
				border-radius: 8px;
				border-color: #DDD;
				background-color: #DDD;
				color: #666 !important;
			}

			.btn-default {
				margin-bottom: 1px;
				background-color: #666;
			}

			.btn-warning {
				background-color: #009900;
				border: 1px solid #FFF !important;

			}

			.box {
				border-radius: 25px;
				background: #73AD21;
			}

			.content {
				width: 1000px;
				margin: 20px auto;
			}

			.fadein {
				position: relative;
				width: 100%;
				height: 330px;
			}

			.fadein img {
				position: absolute;
				left: 0;
				top: 0;
			}


			.panel {
				-webkit-box-shadow: #DDD 0px 5px 10px;
				-moz-box-shadow: #DDD 0px 5px 10px;
				box-shadow: #DDD 0px 5px 10px;
				border: 1px #ccc solid;
			}

			.panel-danger>.panel-heading,
			.panel-warning>.panel-heading {
				color: #FFF;
				font-weight: bold;
				border-color: #000;
				background: #1840b1;
				filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ff484e55', endColorstr='#ff313539', GradientType=0);
				-webkit-filter: none;
				filter: none
			}

			.btn-warning,
			.btn-block[disabled] {
				background: #1840b1 !important;
			}

			.panel-default>.panel-heading {
				color: #ffffff;
				border-color: rgba(0, 0, 0, 0.6)
			}

			.glyphicon {
				margin-right: 5px;
			}

			.btn-danger {
				margin-bottom: 3px;
			}

			textarea {
				height: 100px !important;
				width: 100%;
				padding: 10px;
				border-radius: 5px !important;
			}

			.form-control {
				height: 25px !important;
				border-radius: 3px !important;
			}



			td {
				padding-top: 5px !important;
				padding-bottom: 5px !important;
				padding-left: 3px !important;
				padding-right: 3px !important;
			}

			.grabgtab {
				font-weight: bold;
				border-color: rgba(0, 0, 0, 0.6);
				background-image: -webkit-linear-gradient(#EEE, #DDD 60%, #CCC);
				background-image: -o-linear-gradient(#EEE, #DDD 60%, #CCC);
				background-image: -webkit-gradient(linear, left top, left bottom, from(#EEE), color-stop(60%, #DDD), to(#CCC));
				background-image: linear-gradient(#EEE, #DDD 60%, #CCC);
				background-repeat: no-repeat;
				filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#EEE', endColorstr='#CCC', GradientType=0);
				-webkit-filter: none;
				filter: none
			}

			.grabgtabbottom {
				font-weight: bold;
				border-color: rgba(0, 0, 0, 0.6);
				background-image: -webkit-linear-gradient(#FFF, #EEE 60%, #EEE);
				background-image: -o-linear-gradient(#FFF, #EEE 60%, #EEE);
				background-image: -webkit-gradient(linear, left top, left bottom, from(#FFF), color-stop(60%, #EEE), to(#EEE));
				background-image: linear-gradient(#FFF, #EEE 60%, #EEE);
				background-repeat: no-repeat;
				filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#EEE', endColorstr='#EEE', GradientType=0);
				-webkit-filter: none;
				filter: none
			}

			@media (max-width: 1200px) {
				.navbar {
					background: #32363b;
				}

				.navbar-header {
					float: none;
				}

				.navbar-left,
				.navbar-right {
					float: none !important;
				}

				.navbar-toggle {
					display: block;
				}

				.navbar-collapse {
					border-top: 1px solid transparent;
					box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.1);
				}

				.navbar-fixed-top {
					top: 0;
					border-width: 0 0 1px;
				}

				.navbar-collapse.collapse {
					display: none !important;
				}

				.navbar-nav {
					float: none !important;
					margin-top: 7.5px;
				}

				.navbar-nav>li {
					float: none;
				}

				.navbar-nav>li>a {
					padding-top: 10px;
					padding-bottom: 10px;
				}

				.collapse.in {
					display: block !important;
				}
			}

			.abel {
				font-family: 'Abel';
			}
		</style>
		<!-- MAIN TAB -->

		<ul class="nav nav-tabs grabgtab" style="margin-bottom:0px; font-size:15px; font-weight:bold; margin-top:0px;">

			<li class=" text-center active" style="width:8%; text-align:center;" onClick="location.href='statement.php'"><a data-toggle="tab" href="#dashboard_wrap" style="padding-left: 0px; padding-right:0px"><span><img src="https://img.pay4d.info/tab-home-w.png" width="25" alt="" style="padding:3px" /><BR>&nbsp;</span></a></li>

			<li class="" style="width:15%; text-align:center;" onClick="location.href='userarea.php'"><a data-toggle="tab" href="#toto_wrap"><span><img src="https://img.pay4d.info/tab-toto-w.png" width="25" alt="" /><br>Togel</span></a>


			</li>
			<li class="" style="width:15%; text-align:center;" onClick="location.href='slot.php'"><a data-toggle="tab" href="#games_wrap"><span><img src="https://img.pay4d.info/tab-slot-w.png" width="25" alt="" /><br>Slot</span></a>


			</li>


			<li class="" style="width:15%; text-align:center;" onClick="location.href='casino.php'"><a data-toggle="tab" href="#livegames_wrap"><span><img src="https://img.pay4d.info/tab-livegame-w.png" width="25" alt="" /><br>Casino</span></a>


			</li>
			<li class="" style="width:15%; text-align:center;" onClick="location.href='sport.php'"><a data-toggle="tab" href="#sport_wrap"><span><img src="https://img.pay4d.info/tab-sport-w.png" width="25" alt="" /><br>Sport</span></a>

				<span style="position:absolute; margin-top:-70px; margin-left:10px;"><img src="https://img.pay4d.info/joy.png" height="16" alt="" /></span>

			</li>

			<li class="" style="width:15%; text-align:center;" onClick="location.href='arcade.php'"><a data-toggle="tab" href="#fishing_wrap"><span><img src="https://img.pay4d.info/tab-tembakikan-w.png" width="25" alt="" /><br>Arcade</span></a>

			</li>

			<li class="" style="width:15%; text-align:center;" onClick="location.href='sabung.php'"><a data-toggle="tab" href="#sabung_wrap"><span><img src="https://img.pay4d.info/tab-sabung-w.png" width="25" alt="" /><br>Sabung</span></a>

				<span style="position:absolute; margin-top:-85px; margin-left:-20px;"><img src="https://img.pay4d.info/new2.png" width="40" alt="" /></span>
			</li>
		</ul>
		<div style="height:10px; background-color:#FFF" class="grabgtabbottom"></div>


		<div class="tab-content">

			<div id="dashboard_wrap" class="tab-pane fade in active">
				<div class="row" style="margin-bottom:0px">
					<div class="col-xs-3" style="padding-right:2px">
						<a class="btn btn-default btn-block " href="statement.php"><span class="glyphicon glyphicon-calendar"></span>Statement</a>
					</div>
					<div class="col-xs-3" style="padding-right:1px; padding-left: 1px;">
						<a class="btn btn-default btn-block " href="history.php"><span class="glyphicon glyphicon-calendar"></span>History</a>
					</div>
					<div class="col-xs-3" style="padding-right:1px; padding-left: 2px;">
						<a class="btn btn-default btn-block " href="memo.php"><span class="glyphicon glyphicon-edit"></span>Memo<span class="badge badgeTotal" style="margin-left:5px; margin-right:10px; font-size:9px; font-weight:bold"></span></a>
					</div>
					<div class="col-xs-3" style="padding-left:2px">
						<a class="btn btn-default btn-block " href="referal.php"><span class="glyphicon glyphicon-user"></span>Referal</a>
					</div>
				</div>
				<div class="row" style="margin-bottom:10px">
					<div class="col-xs-3" style="padding-right:2px">
						<a class="btn btn-default btn-block active" href="deposit.php"><span class="glyphicon glyphicon-import"></span>Deposit</a>
					</div>
					<div class="col-xs-3" style="padding-left:1px; padding-right:1px;">
						<a class="btn btn-default btn-block " href="withdraw.php"><span class="glyphicon glyphicon-export"></span>Withdraw</a>
					</div>
					<div class="col-xs-3" style="padding-left:2px; padding-right:1px">
						<a class="btn btn-default btn-block " href="rekening.php"><span class="glyphicon glyphicon-briefcase"></span>Rekening<span style="position:absolute; font-size: 10px; margin-top: -8px; margin-left:-85px">&#11088;</span></a>
					</div>
					<div class="col-xs-3" style="padding-left:2px">
						<a class="btn btn-default btn-block " href="myaccount.php"><span class="glyphicon glyphicon-user"></span>Password</a>
					</div>
				</div>






				<div id="statusDeposit"></div>
				<div id="deposit_form">
					<div class="panel panel-danger">
						<div class="panel-heading">
							<strong><span class="glyphicon glyphicon-import"></span>DEPOSIT</strong>
						</div>
						<div class="panel-body">
							<form class="form-group-sm deposit_form" method="post">
								<div class="form-group">
									<label>Rekening Asal</label>
									<select class="form-control rekasal" name="bankasal">
										<option value="<?php echo $d['nama_bank']; ?>" selected att="5"><?php echo $d['nama_bank']; ?> <?php echo $d['rek']; ?> <?php echo $d['nama']; ?></option>
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

								<?php $no = 1;
								foreach ($mysqli->saldo($sesi_id) as $d) {
									$ket = $d['saldo_flow'];
									$status = $d['status'];
									if ($ket == 'in') {
										$arus = '<i class="bi bi-arrow-up"></i> Kredit';
									} else {
										$arus = '<i class="bi bi-arrow-down"></i> Debit';
									}
									if ($status == "konfir") {
										$button = '<a href="konfirmasi&id=' . $d['id'] . '" class="btn btn-danger btn-sm" title="Konfirmasi topup">' . $d['remark'] . ' <i class="bi bi-arrow-right-square"></i></a>';
									} else if ($status == "progress") {
										$button = '<a href="konfirmasi&id=' . $d['id'] . '" class="btn btn-warning btn-sm" title="Konfirmasi topup">' . $d['remark'] . ' <i class="bi bi-arrow-right-square"></i></a>';
									} else if ($status == "rejected") {
										$button = '<a href="konfirmasi&id=' . $d['id'] . '" class="btn btn-danger btn-sm" title="Konfirmasi topup">' . $d['remark'] . ' <i class="bi bi-arrow-right-square"></i></a>';
									} else if ($status == "withdraw") {
										$button = 'Proses penarikan';
									} else {
										$button = $d['remark'];
									}
								?>
								<?php } ?>

								<div class="form-group">
									<label>Rekening Tujuan Deposit</label><a title="Salin No Rekening" href="javascript:salinnorek();" style="text-decoration: underline;"><span style="float: right;"><span class="glyphicon glyphicon-duplicate" style="margin-left: 20px"></span><u>Salin</u></span></a><span id="notesalin" style="float: right; display: none;" class="text-success">Berhasil disalin!</span>
									<select class="form-control rektujuan" name="bank">
										<option value="37" att="139752" rek="0838****8229" selected="">DANA 0838****8229 a/n RONY WAHYU PRATAMA</option>
										<option value="46" att="" rek="SCAN QRIS">QRIS a/n SKYLINE HELM SECOND</option>
										<option value="44" att="" rek="0131607546">BCA 0131-6075-46 A/N RONY WAHYU PRATAMA</option>
										<option value="45" att="" rek="HUBUNGI LIVECHAT">BRI xxxx-xxxx A/N HUBUNGI LIVECHAT</option>
										<option value="47" att="" rek="HUBUNGI LIVECHAT">BNI xxxx-xxxx A/N HUBUNGI LIVECHAT</option>
										<option value="48" att="" rek="HUBUNGI LIVECHAT">MANDIRI xxxx-xxxx A/N HUBUNGI LIVECHAT</option>
										<option value="41" att="" rek="0131607546">AntarBank 0131-6075-46 A/N RONY WAHYU PRATAMA (BCA)</option>
										<option value="19" att="" rek="082138436633">Telkomsel 0821-3843-6633 - DEPOSIT PULSA TELKOMSEL</option>
										<option value="42" att="" rek="083823148229">Axiata 0838-2314-8229 - DEPOSIT PULSA XL</option>
									</select>
									<input type="text" id="norek" value="1" style="position: absolute; z-index: -999; opacity: 0;">
									<div class="rows">
										<div id="nonqr" class="col-xs-8" style="padding: 0px;">
											<div class="well well-sm" style="margin-top: 15px; margin-bottom:10px">
												Untuk Deposit ke Rekening atau Emoney Berbeda,<br>Silakan tambahkan akun anda di menu <span class="glyphicon glyphicon-briefcase" style="margin-left: 5px"></span>Rekening
											</div>
											<div class="form-group">
												<label>Jumlah</label><input type="text" inputmode="numeric" class="form-control text-right" name="nominal" style="font-weight:bold" id="jumlah_deposit">
											</div>
											<div class="form-group" id="input_pengirim" style="display:none">
												<label>Catatan: Nomor Pengirim / Kode SN / Nominal Unik</label><input type="text" class="form-control" maxlength="24" placeholder="max 24 karakter (harus diisi)" name="pengirim" style="font-weight:bold" id="pengirim">
											</div>
											<div class="form-group" id="input_catatan">
												<label>Catatan: Nomor Rekord / Referensi</label><input type="text" class="form-control" maxlength="24" placeholder="max 24 karakter (bila diperlukan)" name="catatan" style="font-weight:bold" id="catatan">
											</div>

											<input type="hidden" name="task" value="deposit">
											<input type="hidden" id="note" value="b">
											<?php
											if ($status == "konfir") {
												echo '<input type="button" class="btn btn-info btn-block" href="#" value="Konfirmasi Deposits">';
											} else {
												echo '<input type="button" class="btn btn-info btn-block" id="konfirmasi_deposit" value="Konfirmasi Deposit">';
											}
											?>

										</div>
										<div class="col-xs-4 qrimg qrimg37" att="37" style="padding: 20px 0px 0px 15px; ">
											<div style="margin-bottom:20px; width:100%; text-align:center"><img src="../qrdana.jpg" width="159" height="159"></div>
											<div style="width:100%; text-align:center">DANA (VIA BARCODE)<br>a/n RONY WAHYU PRATAMA </div>
										</div>
										<div class="col-xs-4 qrimg qrimg46" att="46" style="padding: 20px 0px 0px 15px; display:none">
											<div style="margin-bottom:20px; width:100%; text-align:center"><img src="../qr.PNG" width="159" height="159"></div>
											<div style="width:100%; text-align:center">QRIS (SUPPORT SEMUA PEMBAYARAN BANK/EWALLET)<br>a/n SKYLINE HELM SECOND </div>
										</div>
									</div>

								</div>
							</form>
						</div>
					</div>



					<a class="btn btn-primary btn-block" href="?deposit&head=home" role="button" style="font-weight:bold; margin-top:20px"><span class="glyphicon glyphicon-menu-left"></span>Kembali</a>


					<div style="margin-top:20px">
						<div class="well well-sm" style="padding-top: 5px; padding-bottom:2px;">
							<marquee><span class="broadcast" style="white-space:nowrap">Hubungi Whatsapp / WA kami yang baru ya bossku untuk kendala †<?php echo $isi2_whatsapp; ?></span></marquee>
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
						<div class="well well-sm" style="margin-top:-10px; padding-bottom:2px">
							<marquee><span class="listkeluaran" style="white-space:nowrap"> <span style="margin-left:30px;"><span style="color:#F00 ">SINGAPORE </span><span style="color:#333"><?php echo jamTogelIndonesiaMobile(date("Y-m-d "), true); ?> </span><strong>4573</strong></span>
									<span style="margin-left:30px;"><span style="color:#F00 ">SAKA POOLS </span><span style="color:#333"><?php echo jamTogelIndonesiaMobile(date("Y-m-d "), true); ?></span><strong>6284</strong></span>
									<span style="margin-left:30px;"><span style="color:#F00 ">SAKA TOTO </span><span style="color:#333"><?php echo jamTogelIndonesiaMobile(date("Y-m-d "), true); ?> </span><strong>2352</strong></span>
									<span style="margin-left:30px;"><span style="color:#F00 ">SAKA 4D </span><span style="color:#333"><?php echo jamTogelIndonesiaMobile(date("Y-m-d "), true); ?> </span><strong>7360</strong></span>
									<div style="clear:both"></div>
								</span></marquee>
						</div>
					</div>



				</div>

				<a class="btn btn-danger btn-block" href="../functions/logout.php" role="button" style="font-weight:bold; margin-top:20px"><span class="glyphicon glyphicon-menu-left"></span>Log out</a>

			</div>


			<div id="games_wrap" class="tab-pane fade in ">
			</div>
		</div>
	</div>

	<div class="well well-sm container-fluid text-center" style="margin:0px; padding:5px; border-radius:0px; padding-bottom: 55px">
		&copy; 2018 - 2023 Copyright <?php echo $isi1_judul_website; ?>. All Rights Reserved.
	</div>



	<div style="font-size:18px; font-weight: bold; position: fixed;left: 0;bottom: 0;width: 100%; background-color: #FFF; box-shadow:rgba(0,0,0,0.6) 0px 0px 10px 0px">
		<div class="row" style="margin:0px; padding: 0px; border: 1px solid #DDD;border-left: 0px; border-bottom: 0px; border-top: 0px;">
			<div class="col-xs-4 text-center" style="border: 1px solid #DDD; padding: 10px; border-right: 0px;">
				<a href="https://wa.me/<?php echo $isi2_whatsapp; ?>" target="_blank" style="text-decoration: none; cursor: pointer; color: #333;"><img src="https://img.pay4d.info/icon-wa_w.png" style="width:30px; vertical-align:middle; margin-right: 5px; margin-top: -5px;">WhatsApp</a>
			</div>
			<div class="col-xs-4 text-center" style="border: 1px solid #DDD; padding: 10px; border-right: 0px;">
				<a href="../promosi.php" target="_blank" style="text-decoration: none; cursor: pointer; color: #333;"><img src="https://img.pay4d.info/icon-promo_w.png" style="width:30px; vertical-align:middle; margin-right: 5px; margin-top: -5px;">Promosi</a>
			</div>
			<div class="col-xs-4 text-center" style="border: 1px solid #DDD; padding: 10px; border-right: 0px;">
				<a href="<?php echo $isi3_livechat; ?>" target="_blank" style="text-decoration: none; cursor: pointer; color:  #333"><img src="https://img.pay4d.info/icon-livechat_w.png" style="width:30px; vertical-align:middle; margin-right: 5px; margin-top: -5px;">LiveChat</a>
			</div>
		</div>
	</div>




</body>

</html>