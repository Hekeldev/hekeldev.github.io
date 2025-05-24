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

      <li class=" text-center " style="width:8%; text-align:center;" onClick="location.href='statement.php'"><a data-toggle="tab" href="#dashboard_wrap" style="padding-left: 0px; padding-right:0px"><span><img src="https://img.pay4d.info/tab-home-w.png" width="25" alt="" style="padding:3px" /><BR>&nbsp;</span></a></li>

      <li class="" style="width:15%; text-align:center;" onClick="location.href='userarea.php'"><a data-toggle="tab" href="#toto_wrap"><span><img src="https://img.pay4d.info/tab-toto-w.png" width="25" alt="" /><br>Togel</span></a>


      </li>
      <li class="" style="width:15%; text-align:center;" onClick="location.href='slot.php'"><a data-toggle="tab" href="#games_wrap"><span><img src="https://img.pay4d.info/tab-slot-w.png" width="25" alt="" /><br>Slot</span></a>


      </li>


      <li class="active" style="width:15%; text-align:center;" onClick="location.href='casino.php'"><a data-toggle="tab" href="#livegames_wrap"><span><img src="https://img.pay4d.info/tab-livegame-w.png" width="25" alt="" /><br>Casino</span></a>


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






      <div id="games_wrap" class="tab-pane fade in ">

      </div>





      <div id="livegames_wrap" class="tab-pane fade in active">
        <ul class="nav nav-pills grabgtab" style="font-size:16px; margin-bottom:0px; padding-bottom: 2px">
          <li class="active" id="tab_pplc" style="width:32.78%; font-weight:normal; margin-bottom:2px; margin-left:2px;"><a data-toggle="tab" href="#livegames_window_pplc" style="padding-left: 8px; padding-right:0px"><span><img src="https://img.pay4d.info/logo_pplc.png" alt="" style="vertical-align:bottom; height: 25px; padding-left:0px;" />&nbsp;Pragmatic Live</span>
            </a></li>
          <li class="" id="tab_ion" style="width:32.78%; font-weight:normal; margin-bottom:2px; margin-left:2px;"><a data-toggle="tab" href="#livegames_window_ion" style="padding-left: 8px; padding-right:0px"><span><img src="https://img.pay4d.info/logo_ion.png" alt="" style="vertical-align:bottom; height: 25px; padding-left:0px;" />&nbsp;ION Casino</span>
            </a></li>
          <li class="" id="tab_evo" style="width:32.78%; font-weight:normal; margin-bottom:2px; margin-left:2px;"><a data-toggle="tab" href="#livegames_window_evo" style="padding-left: 8px; padding-right:0px"><span><img src="https://img.pay4d.info/logo_evo.png" alt="" style="vertical-align:bottom; height: 25px; padding-left:0px;" />&nbsp;Evolution</span>
            </a></li>
          <li class="" id="tab_sx" style="width:32.78%; font-weight:normal; margin-bottom:2px; margin-left:2px;"><a data-toggle="tab" href="#livegames_window_sx" style="padding-left: 8px; padding-right:0px"><span><img src="https://img.pay4d.info/logo_sx.png" alt="" style="vertical-align:bottom; height: 25px; padding-left:0px;" />&nbsp;Sexy Gaming</span>
            </a></li>
          <li class="" id="tab_ab" style="width:32.78%; font-weight:normal; margin-bottom:2px; margin-left:2px;"><a data-toggle="tab" href="#livegames_window_ab" style="padding-left: 8px; padding-right:0px"><span><img src="https://img.pay4d.info/logo_ab.png" alt="" style="vertical-align:bottom; height: 25px; padding-left:0px;" />&nbsp;All Bet</span>
            </a></li>
          <li class="" id="tab_sa" style="width:32.78%; font-weight:normal; margin-bottom:2px; margin-left:2px;"><a data-toggle="tab" href="#livegames_window_sa" style="padding-left: 8px; padding-right:0px"><span><img src="https://img.pay4d.info/logo_sa.png" alt="" style="vertical-align:bottom; height: 25px; padding-left:0px;" />&nbsp;SA Gaming</span>
            </a></li>
          <li class="" id="tab_mg" style="width:32.78%; font-weight:normal; margin-bottom:2px; margin-left:2px;"><a data-toggle="tab" href="#livegames_window_mg" style="padding-left: 8px; padding-right:0px"><span><img src="https://img.pay4d.info/logo_mg.png" alt="" style="vertical-align:bottom; height: 25px; padding-left:0px;" />&nbsp;Micro Live</span>
            </a></li>
          <li class="" id="tab_og" style="width:32.78%; font-weight:normal; margin-bottom:2px; margin-left:2px;"><a data-toggle="tab" href="#livegames_window_og" style="padding-left: 8px; padding-right:0px"><span><img src="https://img.pay4d.info/logo_og.png" alt="" style="vertical-align:bottom; height: 25px; padding-left:0px;" />&nbsp;OPUS</span>
            </a></li>
          <li class="" id="tab_sbol" style="width:32.78%; font-weight:normal; margin-bottom:2px; margin-left:2px;"><a data-toggle="tab" href="#livegames_window_sbol" style="padding-left: 8px; padding-right:0px"><span><img src="https://img.pay4d.info/logo_sbol.png" alt="" style="vertical-align:bottom; height: 25px; padding-left:0px;" />&nbsp;SBO Casino</span>
            </a></li>
        </ul>

        <div style="height:10px; background-color:#FFF" class="grabgtabbottom"></div>
        <div class="tab-content">

          <div id="livegames_window_sbol" style="width:100%; margin-top:10px;" class="tab-pane fade in ">
            <div style="margin-top:0px;">
              <img src="https://img.pay4d.info/logo_sbol.png" height="30" alt="" style="vertical-align:text-bottom; margin-right:5px" /><span style="font-size:16px; font-weight:bold">SBO Live</span>
            </div>
            <hr style="margin-top:5px; height:2px">

            <div class="text-center tab-pane fade in">

              <div class=" text-center tab-pane fade in">
                <div style="width:175px; height:145px; display:inline-block;"><a href="https://sbo.lk-acc-n1.com/sbo/launch?token=RnlgU%2FHh4b9fYiFHH%2B7aw6xsZu%2FH4tqaikkZz6xZqNc%3D&game=baccarat"><img src="https://img.pay4d.info/sbo/images/baccarat.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px">Baccarat</div>
                  </a></div>
                <div style="width:175px; height:145px; display:inline-block;"><a href="https://sbo.lk-acc-n1.com/sbo/launch?token=RnlgU%2FHh4b9fYiFHH%2B7aw6xsZu%2FH4tqaikkZz6xZqNc%3D&game=roulette"><img src="https://img.pay4d.info/sbo/images/roulette.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px">Roulette</div>
                  </a></div>
                <div style="width:175px; height:145px; display:inline-block;"><a href="https://sbo.lk-acc-n1.com/sbo/launch?token=RnlgU%2FHh4b9fYiFHH%2B7aw6xsZu%2FH4tqaikkZz6xZqNc%3D&game=sicbo"><img src="https://img.pay4d.info/sbo/images/sicbo.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px">Sicbo</div>
                  </a></div>
                <div style="width:175px; height:145px; display:inline-block;"><a href="https://sbo.lk-acc-n1.com/sbo/launch?token=RnlgU%2FHh4b9fYiFHH%2B7aw6xsZu%2FH4tqaikkZz6xZqNc%3D&game=dragontiger"><img src="https://img.pay4d.info/sbo/images/dragontiger.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px">Dragon Tiger</div>
                  </a></div>
                <div style="width:175px; height:145px; display:inline-block;"><a href="https://sbo.lk-acc-n1.com/sbo/launch?token=RnlgU%2FHh4b9fYiFHH%2B7aw6xsZu%2FH4tqaikkZz6xZqNc%3D&game=12baccarat"><img src="https://img.pay4d.info/sbo/images/12baccarat.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px">12 Baccarat</div>
                  </a></div>
              </div>
            </div>
          </div>

          <div id="livegames_window_sa" style="width:100%; margin-top:10px;" class="tab-pane fade in ">
            <div style="margin-top:0px;">
              <img src="https://img.pay4d.info/sa/images/logo_w.png" width="170" alt="" />
            </div>
            <hr style="margin-top:5px; height:2px">

            <div class="text-center tab-pane fade in">

              <div class=" text-center tab-pane fade in">
                <div style="width:175px; height:145px; display:inline-block;"><a href="https://sa.lk-acc-n1.com/sa/launch?token=PhrOestPdt1O9bVnZNn%2BJiGYc41Kxf6OgA2Y17g3JI0%3D&game=baccarat"><img src="https://img.pay4d.info/sa/images/baccaratlobby.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px">Baccarat Lobby</div>
                  </a></div>
                <div style="width:175px; height:145px; display:inline-block;"><a href="https://sa.lk-acc-n1.com/sa/launch?token=PhrOestPdt1O9bVnZNn%2BJiGYc41Kxf6OgA2Y17g3JI0%3D&game=roulette"><img src="https://img.pay4d.info/sa/images/eroulette.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px">Roulette</div>
                  </a></div>
                <div style="width:175px; height:145px; display:inline-block;"><a href="https://sa.lk-acc-n1.com/sa/launch?token=PhrOestPdt1O9bVnZNn%2BJiGYc41Kxf6OgA2Y17g3JI0%3D&game=croulette"><img src="https://img.pay4d.info/sa/images/croulette.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px">Sexy Roulette</div>
                  </a></div>
                <div style="width:175px; height:145px; display:inline-block;"><a href="https://sa.lk-acc-n1.com/sa/launch?token=PhrOestPdt1O9bVnZNn%2BJiGYc41Kxf6OgA2Y17g3JI0%3D&game=sicbo"><img src="https://img.pay4d.info/sa/images/esicbo.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px">Sicbo</div>
                  </a></div>
                <div style="width:175px; height:145px; display:inline-block;"><a href="https://sa.lk-acc-n1.com/sa/launch?token=PhrOestPdt1O9bVnZNn%2BJiGYc41Kxf6OgA2Y17g3JI0%3D&game=dragontiger"><img src="https://img.pay4d.info/sa/images/edragontiger.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px">Dragon Tiger</div>
                  </a></div>
                <div style="width:175px; height:145px; display:inline-block;"><a href="https://sa.lk-acc-n1.com/sa/launch?token=PhrOestPdt1O9bVnZNn%2BJiGYc41Kxf6OgA2Y17g3JI0%3D&game=pokdeng"><img src="https://img.pay4d.info/sa/images/epokdeng.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px">Pok Deng</div>
                  </a></div>
                <div style="width:175px; height:145px; display:inline-block;"><a href="https://sa.lk-acc-n1.com/sa/launch?token=PhrOestPdt1O9bVnZNn%2BJiGYc41Kxf6OgA2Y17g3JI0%3D&game=andarbahar"><img src="https://img.pay4d.info/sa/images/eandarbahar.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px">Andar Bahar</div>
                  </a></div>
              </div>
            </div>
          </div>

          <div id="livegames_window_ion" style="width:100%; margin-top:10px;" class="tab-pane fade in ">
            <div style="margin-top:0px;">
              <img src="https://img.pay4d.info/ion/images/logo_w.png" width="170" alt="" />
            </div>
            <hr style="margin-top:5px; height:2px">
            <div class="text-center tab-pane fade in">

              <div class=" text-center tab-pane fade in">
                <div style="height:175px; width:222px; text-align:center; vertical-align:top; cursor:pointer; display:inline-block;">
                  <a href="https://ion.lk-acc-n1.com/ion/launch/?platform=MOBILE&game=1UiSLAl4XI2sDRfNviAYVpUTeCSEoCBe3KOMuw9GAUg%3D&token=uj1XlPbdNKLqUcAr8V0JqQvF%2BDHBmEazyCCRHqZ%2Fk3k%3D"><img src="https://img.pay4d.info/ion/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px;">Baccarat</div>
                  </a>
                </div>
                <div style="height:175px; width:222px; text-align:center; vertical-align:top; cursor:pointer; display:inline-block;">
                  <a href="https://ion.lk-acc-n1.com/ion/launch/?platform=MOBILE&game=QZ4%2F6eMCkU8Lsxtnx8imnKknA1fc8O541Y1yz5GYJQo%3D&token=uj1XlPbdNKLqUcAr8V0JqQvF%2BDHBmEazyCCRHqZ%2Fk3k%3D"><img src="https://img.pay4d.info/ion/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px;">Roulette</div>
                  </a>
                </div>
                <div style="height:175px; width:222px; text-align:center; vertical-align:top; cursor:pointer; display:inline-block;">
                  <a href="https://ion.lk-acc-n1.com/ion/launch/?platform=MOBILE&game=e2623pduS2tl0g7WJgG%2FV0iMu2VlAvX5tE2LIQHIsxc%3D&token=uj1XlPbdNKLqUcAr8V0JqQvF%2BDHBmEazyCCRHqZ%2Fk3k%3D"><img src="https://img.pay4d.info/ion/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px;">Sicbo</div>
                  </a>
                </div>
                <div style="height:175px; width:222px; text-align:center; vertical-align:top; cursor:pointer; display:inline-block;">
                  <a href="https://ion.lk-acc-n1.com/ion/launch/?platform=MOBILE&game=bLcmFHWG04qi0PdTxUQ3XkBQqNU3%2FvYGEqBY5x09AV4%3D&token=uj1XlPbdNKLqUcAr8V0JqQvF%2BDHBmEazyCCRHqZ%2Fk3k%3D"><img src="https://img.pay4d.info/ion/images/dragontiger.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                  </a>
                </div>
              </div>
            </div>


          </div>


          <div id="livegames_window_sx" style="width:100%; margin-top:10px;" class="tab-pane fade in ">
            <div style="margin-top:0px;">
              <img src="https://img.pay4d.info/sx/images/logo_w.png" width="170" alt="" />
            </div>
            <hr style="margin-top:5px; height:2px">
            <div class="text-center tab-pane fade in">

              <div class=" text-center tab-pane fade in">
                <div style="height:145px; width:175px; text-align:center; vertical-align:top; cursor:pointer; display:inline-block;">
                  <a href="https://sexy.lk-acc-n1.com/sx/launch.php?game=%2FpUEGClM8BTVaUBLxm5Sc4Hpa31LmG0CAvY8%2FA9T9Yk%3D&token=pw47SZHLkbIzImbHvJK45SWefhQsPZ2mev3HneEfm5c%3D"><img src="https://img.pay4d.info/sx/images/baccarat.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px;">Baccarat</div>
                  </a>
                </div>
                <div style="height:145px; width:175px; text-align:center; vertical-align:top; cursor:pointer; display:inline-block;">
                  <a href="https://sexy.lk-acc-n1.com/sx/launch.php?game=NWLjwbrVhXFDud6QhbspvG0m55OcPbknS6TdyUs%2BGt8%3D&token=pw47SZHLkbIzImbHvJK45SWefhQsPZ2mev3HneEfm5c%3D"><img src="https://img.pay4d.info/sx/images/roulette.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px;">Roulette</div>
                  </a>
                </div>
                <div style="height:145px; width:175px; text-align:center; vertical-align:top; cursor:pointer; display:inline-block;">
                  <a href="https://sexy.lk-acc-n1.com/sx/launch.php?game=Z3DlqXFPpFgmWGYSgfzRNhIXMNJz5mxQL5vX0wwIr%2F0%3D&token=pw47SZHLkbIzImbHvJK45SWefhQsPZ2mev3HneEfm5c%3D"><img src="https://img.pay4d.info/sx/images/sicbo.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px;">SicBo</div>
                  </a>
                </div>
                <div style="height:145px; width:175px; text-align:center; vertical-align:top; cursor:pointer; display:inline-block;">
                  <a href="https://sexy.lk-acc-n1.com/sx/launch.php?game=1SWcnu45ui1%2B46YMoOwtD3oqNZgscfvLV8oKxioBYHo%3D&token=pw47SZHLkbIzImbHvJK45SWefhQsPZ2mev3HneEfm5c%3D"><img src="https://img.pay4d.info/sx/images/dragontiger.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                  </a>
                </div>
                <div style="height:145px; width:175px; text-align:center; vertical-align:top; cursor:pointer; display:inline-block;">
                  <a href="https://sexy.lk-acc-n1.com/sx/launch.php?game=7WfE3QBU91bip7CJgFcibiqKxehg2X9bD9VmklpCH1k%3D&token=pw47SZHLkbIzImbHvJK45SWefhQsPZ2mev3HneEfm5c%3D"><img src="https://img.pay4d.info/sx/images/andarbahar.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px;">Andar Bahar</div>
                  </a>
                </div>
                <div style="height:145px; width:175px; text-align:center; vertical-align:top; cursor:pointer; display:inline-block;">
                  <a href="https://sexy.lk-acc-n1.com/sx/launch.php?game=xKM%2BVc0Yty4pfXP6%2Fo5U8fZKZ9RmI1NQaUDPmA%2FdOkk%3D&token=pw47SZHLkbIzImbHvJK45SWefhQsPZ2mev3HneEfm5c%3D"><img src="https://img.pay4d.info/sx/images/teenpatti.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                    <div style="text-align:center; margin-top:5px;">Teen Patti</div>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <div id="livegames_window_pplc" style="width:100%; margin-top:10px;" class="tab-pane fade in active">

            <div style="margin-top:0px;">
              <img src="https://img.pay4d.info/pp.png" height="30" alt="" style="vertical-align:text-bottom; margin-right:5px" /><span style="font-size:16px; font-weight:bold">Pragmatic Play</span>
            </div>
            <hr style="margin-top:5px; height:2px">
            <div class="text-center tab-pane fade in">
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DTX8D7ACAKOaQ2mg%2Bk4TF8Xh4tv7yVb2UvW4yiRbHmyw%3D%26symbol%3D101%26technologyID%3DH5%26platform%3DMOBILE%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino%26lobbyUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino&stylename=pay4d9_pay4d9">
                  <img src="https://img.pay4d.info/pp/images/101.jpg" style="width:165px">

                  <div style="text-align:center; margin-top:5px;">Top Games</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DTX8D7ACAKOaQ2mg%2Bk4TF8Xh4tv7yVb2UvW4yiRbHmyw%3D%26symbol%3D104%26technologyID%3DH5%26platform%3DMOBILE%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino%26lobbyUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino&stylename=pay4d9_pay4d9">
                  <img src="https://img.pay4d.info/pp/images/104.jpg" style="width:165px">

                  <div style="text-align:center; margin-top:5px;">Baccarat Lobby</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DTX8D7ACAKOaQ2mg%2Bk4TF8Xh4tv7yVb2UvW4yiRbHmyw%3D%26symbol%3D102%26technologyID%3DH5%26platform%3DMOBILE%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino%26lobbyUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino&stylename=pay4d9_pay4d9">
                  <img src="https://img.pay4d.info/pp/images/102.jpg" style="width:165px">

                  <div style="text-align:center; margin-top:5px;">Roulette Lobby</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DTX8D7ACAKOaQ2mg%2Bk4TF8Xh4tv7yVb2UvW4yiRbHmyw%3D%26symbol%3D103%26technologyID%3DH5%26platform%3DMOBILE%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino%26lobbyUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino&stylename=pay4d9_pay4d9">
                  <img src="https://img.pay4d.info/pp/images/103.jpg" style="width:165px">

                  <div style="text-align:center; margin-top:5px;">Blackjack Lobby</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DTX8D7ACAKOaQ2mg%2Bk4TF8Xh4tv7yVb2UvW4yiRbHmyw%3D%26symbol%3D1001%26technologyID%3DH5%26platform%3DMOBILE%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino%26lobbyUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino&stylename=pay4d9_pay4d9">
                  <img src="https://img.pay4d.info/pp/images/1001.jpg" style="width:165px">

                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DTX8D7ACAKOaQ2mg%2Bk4TF8Xh4tv7yVb2UvW4yiRbHmyw%3D%26symbol%3D1024%26technologyID%3DH5%26platform%3DMOBILE%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino%26lobbyUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino&stylename=pay4d9_pay4d9">
                  <img src="https://img.pay4d.info/pp/images/1024.jpg" style="width:165px">

                  <div style="text-align:center; margin-top:5px;">Andar Bahar</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DTX8D7ACAKOaQ2mg%2Bk4TF8Xh4tv7yVb2UvW4yiRbHmyw%3D%26symbol%3D204%26technologyID%3DH5%26platform%3DMOBILE%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino%26lobbyUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino&stylename=pay4d9_pay4d9">
                  <img src="https://img.pay4d.info/pp/images/204.jpg" style="width:165px">

                  <div style="text-align:center; margin-top:5px;">Mega Roulette</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DTX8D7ACAKOaQ2mg%2Bk4TF8Xh4tv7yVb2UvW4yiRbHmyw%3D%26symbol%3D701%26technologyID%3DH5%26platform%3DMOBILE%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino%26lobbyUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino&stylename=pay4d9_pay4d9">
                  <img src="https://img.pay4d.info/pp/images/701.jpg" style="width:165px">

                  <div style="text-align:center; margin-top:5px;">Mega Sicbo</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DTX8D7ACAKOaQ2mg%2Bk4TF8Xh4tv7yVb2UvW4yiRbHmyw%3D%26symbol%3D801%26technologyID%3DH5%26platform%3DMOBILE%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino%26lobbyUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino&stylename=pay4d9_pay4d9">
                  <img src="https://img.pay4d.info/pp/images/801.jpg" style="width:165px">

                  <div style="text-align:center; margin-top:5px;">Mega Wheel</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DTX8D7ACAKOaQ2mg%2Bk4TF8Xh4tv7yVb2UvW4yiRbHmyw%3D%26symbol%3D240%26technologyID%3DH5%26platform%3DMOBILE%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino%26lobbyUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino&stylename=pay4d9_pay4d9">
                  <img src="https://img.pay4d.info/pp/images/240.jpg" style="width:165px">

                  <div style="text-align:center; margin-top:5px;">Power Up Roulette</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DTX8D7ACAKOaQ2mg%2Bk4TF8Xh4tv7yVb2UvW4yiRbHmyw%3D%26symbol%3D1101%26technologyID%3DH5%26platform%3DMOBILE%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino%26lobbyUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino&stylename=pay4d9_pay4d9">
                  <img src="https://img.pay4d.info/pp/images/1101.jpg" style="width:165px">

                  <div style="text-align:center; margin-top:5px;">Sweet Bonanza Candyland</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DTX8D7ACAKOaQ2mg%2Bk4TF8Xh4tv7yVb2UvW4yiRbHmyw%3D%26symbol%3D1302%26technologyID%3DH5%26platform%3DMOBILE%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino%26lobbyUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino&stylename=pay4d9_pay4d9">
                  <img src="https://img.pay4d.info/pp/images/1302.jpg" style="width:165px">

                  <div style="text-align:center; margin-top:5px;">Spaceman</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DTX8D7ACAKOaQ2mg%2Bk4TF8Xh4tv7yVb2UvW4yiRbHmyw%3D%26symbol%3D1401%26technologyID%3DH5%26platform%3DMOBILE%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino%26lobbyUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino&stylename=pay4d9_pay4d9">
                  <img src="https://img.pay4d.info/pp/images/1401.jpg" style="width:165px">

                  <div style="text-align:center; margin-top:5px;">Boom City</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DTX8D7ACAKOaQ2mg%2Bk4TF8Xh4tv7yVb2UvW4yiRbHmyw%3D%26symbol%3D1601%26technologyID%3DH5%26platform%3DMOBILE%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino%26lobbyUrl%3Dhttps%3A%2F%2F<?php echo $isi1_judul_website; ?>imba.com%2Fm%2Fuserarea.php%3Fhead%3Dlivecasino&stylename=pay4d9_pay4d9">
                  <img src="https://img.pay4d.info/pp/images/1601.jpg" style="width:165px">

                  <div style="text-align:center; margin-top:5px;">Snakes & Ladders Live</div>
                </a>
              </div>
            </div>



          </div>


          <div id="livegames_window_ab" style="width:100%; margin-top:10px;" class="tab-pane fade in">
            <div style="margin-top:0px;">
              <img src="https://img.pay4d.info/ab/images/logo_w.png" width="150" alt="" />
            </div>
            <hr style="margin-top:5px; height:2px">
            <div class="text-center tab-pane fade in">
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="../pay4d9-opengame.php?game=0&token=2rNr58QDIuYDze2s6kb7YJwc%2FoZ0Rs5mUqJDddNY7wo%3D"><img src="https://img.pay4d.info/ab/images/hotgames.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Hot Games</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="../pay4d9-opengame.php?game=100&token=2rNr58QDIuYDze2s6kb7YJwc%2FoZ0Rs5mUqJDddNY7wo%3D"><img src="https://img.pay4d.info/ab/images/dragonhall.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">DragonHall</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="../pay4d9-opengame.php?game=106&token=2rNr58QDIuYDze2s6kb7YJwc%2FoZ0Rs5mUqJDddNY7wo%3D"><img src="https://img.pay4d.info/ab/images/quickhall.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">QuickHall</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="../pay4d9-opengame.php?game=102&token=2rNr58QDIuYDze2s6kb7YJwc%2FoZ0Rs5mUqJDddNY7wo%3D"><img src="https://img.pay4d.info/ab/images/multiplay.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">MultiPlay</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="../pay4d9-opengame.php?game=104&token=2rNr58QDIuYDze2s6kb7YJwc%2FoZ0Rs5mUqJDddNY7wo%3D"><img src="https://img.pay4d.info/ab/images/seecardbaccarat.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">SeeCard Baccarat</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="../pay4d9-opengame.php?game=101&token=2rNr58QDIuYDze2s6kb7YJwc%2FoZ0Rs5mUqJDddNY7wo%3D"><img src="https://img.pay4d.info/ab/images/baccarat.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="../pay4d9-opengame.php?game=105&token=2rNr58QDIuYDze2s6kb7YJwc%2FoZ0Rs5mUqJDddNY7wo%3D"><img src="https://img.pay4d.info/ab/images/sexybaccarat.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sexy Baccarat</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="../pay4d9-opengame.php?game=110&token=2rNr58QDIuYDze2s6kb7YJwc%2FoZ0Rs5mUqJDddNY7wo%3D"><img src="https://img.pay4d.info/ab/images/insurancebaccarat.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Insurance Baccarat</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="../pay4d9-opengame.php?game=401&token=2rNr58QDIuYDze2s6kb7YJwc%2FoZ0Rs5mUqJDddNY7wo%3D"><img src="https://img.pay4d.info/ab/images/roulette.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="../pay4d9-opengame.php?game=402&token=2rNr58QDIuYDze2s6kb7YJwc%2FoZ0Rs5mUqJDddNY7wo%3D"><img src="https://img.pay4d.info/ab/images/sexyroulette.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sexy Roulette</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="../pay4d9-opengame.php?game=201&token=2rNr58QDIuYDze2s6kb7YJwc%2FoZ0Rs5mUqJDddNY7wo%3D"><img src="https://img.pay4d.info/ab/images/sicbo.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">SicBoHiLo</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="../pay4d9-opengame.php?game=301&token=2rNr58QDIuYDze2s6kb7YJwc%2FoZ0Rs5mUqJDddNY7wo%3D"><img src="https://img.pay4d.info/ab/images/dragontiger.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="../pay4d9-opengame.php?game=801&token=2rNr58QDIuYDze2s6kb7YJwc%2FoZ0Rs5mUqJDddNY7wo%3D"><img src="https://img.pay4d.info/ab/images/bullbull.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">BullBull</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="../pay4d9-opengame.php?game=901&token=2rNr58QDIuYDze2s6kb7YJwc%2FoZ0Rs5mUqJDddNY7wo%3D"><img src="https://img.pay4d.info/ab/images/win3cards.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Win3Cards</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="../pay4d9-opengame.php?game=501&token=2rNr58QDIuYDze2s6kb7YJwc%2FoZ0Rs5mUqJDddNY7wo%3D"><img src="https://img.pay4d.info/ab/images/pokdeng.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Pokdeng</div>
                </a>
              </div>
            </div>
          </div>

          <div id="livegames_window_og" style="width:100%; margin-top:10px;" class="tab-pane fade in">
            <div style="margin-top:0px;">
              <img src="https://img.pay4d.info/og/images/logo_w.png" width="150" alt="" />
            </div>
            <hr style="margin-top:5px; height:2px">
            <div class="text-center tab-pane fade in">
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://opus-api.lk-acc-n1.com/opus/launch?cookie=nSxXPGaz%2FRHl5Fi2u9lDv37Mknd9p0wKXvdY%2BF4%2FcYU%3D&gameType=BA"><img src="https://img.pay4d.info/og/images/BA.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://opus-api.lk-acc-n1.com/opus/launch?cookie=nSxXPGaz%2FRHl5Fi2u9lDv37Mknd9p0wKXvdY%2BF4%2FcYU%3D&gameType=RO"><img src="https://img.pay4d.info/og/images/RO.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://opus-api.lk-acc-n1.com/opus/launch?cookie=nSxXPGaz%2FRHl5Fi2u9lDv37Mknd9p0wKXvdY%2BF4%2FcYU%3D&gameType=DC"><img src="https://img.pay4d.info/og/images/DC.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sicbo</div>
                </a>
              </div>
            </div>
          </div>


          <div id="livegames_window_evo" style="width:100%; margin-top:10px;" class="tab-pane fade in">
            <div style="margin-top:0px;">
              <img src="https://img.pay4d.info/evo/images/logo_w.png" width="150" alt="" />
            </div>
            <hr style="margin-top:5px; height:2px">
            <div class="text-center tab-pane fade in">
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://evo.lk-acc-n1.com/evo/launch?token=ND3Bc2IOCHpIBFdhAIhyU2b6ZhmAWrCoUS0PAPlAGcc%3D&category=top_games"><img src="https://img.pay4d.info/evo/images/top_games.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Top Games</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://evo.lk-acc-n1.com/evo/launch?token=ND3Bc2IOCHpIBFdhAIhyU2b6ZhmAWrCoUS0PAPlAGcc%3D&category=game_shows"><img src="https://img.pay4d.info/evo/images/game_shows.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Game Shows</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://evo.lk-acc-n1.com/evo/launch?token=ND3Bc2IOCHpIBFdhAIhyU2b6ZhmAWrCoUS0PAPlAGcc%3D&category=baccarat"><img src="https://img.pay4d.info/evo/images/baccarat.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://evo.lk-acc-n1.com/evo/launch?token=ND3Bc2IOCHpIBFdhAIhyU2b6ZhmAWrCoUS0PAPlAGcc%3D&category=roulette"><img src="https://img.pay4d.info/evo/images/roulette.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://evo.lk-acc-n1.com/evo/launch?token=ND3Bc2IOCHpIBFdhAIhyU2b6ZhmAWrCoUS0PAPlAGcc%3D&category=sicbo"><img src="https://img.pay4d.info/evo/images/sicbo.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sicbo</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://evo.lk-acc-n1.com/evo/launch?token=ND3Bc2IOCHpIBFdhAIhyU2b6ZhmAWrCoUS0PAPlAGcc%3D&category=dragontiger"><img src="https://img.pay4d.info/evo/images/dragontiger.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://evo.lk-acc-n1.com/evo/launch?token=ND3Bc2IOCHpIBFdhAIhyU2b6ZhmAWrCoUS0PAPlAGcc%3D&category=blackjack"><img src="https://img.pay4d.info/evo/images/blackjack.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Blackjack</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://evo.lk-acc-n1.com/evo/launch?token=ND3Bc2IOCHpIBFdhAIhyU2b6ZhmAWrCoUS0PAPlAGcc%3D&category=poker"><img src="https://img.pay4d.info/evo/images/poker.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Poker</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://evo.lk-acc-n1.com/evo/launch?token=ND3Bc2IOCHpIBFdhAIhyU2b6ZhmAWrCoUS0PAPlAGcc%3D&category=bacbo"><img src="https://img.pay4d.info/evo/images/bacbo.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Bac Bo</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://evo.lk-acc-n1.com/evo/launch?token=ND3Bc2IOCHpIBFdhAIhyU2b6ZhmAWrCoUS0PAPlAGcc%3D&category=fantan"><img src="https://img.pay4d.info/evo/images/fantan.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Fan Tan</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://evo.lk-acc-n1.com/evo/launch?token=ND3Bc2IOCHpIBFdhAIhyU2b6ZhmAWrCoUS0PAPlAGcc%3D&category=andarbahar"><img src="https://img.pay4d.info/evo/images/andarbahar.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Andar Bahar</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://evo.lk-acc-n1.com/evo/launch?token=ND3Bc2IOCHpIBFdhAIhyU2b6ZhmAWrCoUS0PAPlAGcc%3D&category=craps"><img src="https://img.pay4d.info/evo/images/craps.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Craps</div>
                </a>
              </div>
              <div style="height:145px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://evo.lk-acc-n1.com/evo/launch?token=ND3Bc2IOCHpIBFdhAIhyU2b6ZhmAWrCoUS0PAPlAGcc%3D&category=teenpatti"><img src="https://img.pay4d.info/evo/images/teenpatti.jpg" style="width:165px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Teen Patti</div>
                </a>
              </div>
            </div>
          </div>


          <div id="livegames_window_mg" style="width:100%; margin-top:10px; margin-bottom: 20px;" class="tab-pane fade in">
            <div style="margin-top:0px;">
              <img src="https://img.pay4d.info/mg2.png" height="30" alt="" style="vertical-align:text-bottom; margin-right:5px" /><span style="font-size:16px; font-weight:bold">Microgaming Live</span>
            </div>
            <hr style="margin-top:5px; height:2px">
            <div class="text-center tab-pane fade in">
              <div style="height:190px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://mg.lk-acc-n1.com?&token=Rm8Xu21mpL9Tuml%2BN8anxaRBRzImRzk5JzfAOfa%2BOa34R0%2FIU%2BtWOeZ9tGWzsYeS35vR9zvVRdtHBWzS2dXlG4Z49yeHgMUysJ3m8PhHNMNzZ%2BsuC%2B6HEKfph52pCuE%2BpHTEwNSYRApprk13YIiUErsfreuafQHaIQqOgKPxX4HLYIY%2BwgNPqiOYgCBDbm9UIX375b%2FHCIC3KIYcx9bs8g%3D%3D&language=id&mobile=yes&redirectUrl=">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_baccarat_playboy_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Playboy Club</div>
                </a>
              </div>
              <div style="height:190px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://mg.lk-acc-n1.com?&token=D22FvCcVpWqnP8Tm6gp9bH6kndcXufYyiipBNZmojLOzKPxWUXX2PBnYUdJPWm9JwkzMkfDLISGV5dOuT9XLEPo8PLCiO7MHKUW0Is4JWE9H8VYiDgoee2JxUjFcJUhxRIvKpPwAF1OZgDf8EdXWZQdrxEbX%2F74TyRA%2BTpwjtKU%3D&language=id&mobile=yes&redirectUrl=">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_baccarat_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Bonus Baccarat</div>
                </a>
              </div>
              <div style="height:190px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://mg.lk-acc-n1.com?&token=tdXvvMaBNwlaIWPveSMrkZplI4ju53firpNOFQ8%2F3DEBuuxdgjemIVadnsRgZgJwxtz17l%2FOe8TkcV2w0neOLMU83yJkFAYK6cQxYPDwFK%2BsDjjwK1t9S9%2FrP8%2Bzpb0%2Bl4uSvh46bJocS6n4je%2FlVefA%2FiWHNJC6Gaes1qbYj8A%3D&language=id&mobile=yes&redirectUrl=">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_baccaratnc_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">No Com Bonus Baccarat</div>
                </a>
              </div>
              <div style="height:190px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://mg.lk-acc-n1.com?&token=1o5fRtiIVhvA0%2BO3eMFTiHd9tng3keD3XCx%2BRH4FjqKCzcTBcUBiFPq3d6qncN8H9iCWfYwXS6Bj6H%2FIvOjLN0uCnuzcdcs9wVZdbU6vKqMtVYab1oSGVmCyf1tSZ8pD4UjKf23txyd8eFUBRX%2Buq8NWv5nksZ4wo%2F1vRr%2B7NOXsP%2FwhICeLVfaovdpAvmokucOouj7b5MBARamZ0Y%2FkSw%3D%3D&language=id&mobile=yes&redirectUrl=">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_mp_baccarat_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Baccarat</div>
                </a>
              </div>
              <div style="height:190px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://mg.lk-acc-n1.com?&token=C6R%2B4s3ug4YW%2BTD5OVsWgXItwtyv6VT%2FtnwtUR3A%2FTXoraB9nfsdlNA5joZKN7j8UuReQCnuZBDTZcjHevWfxGPw5H%2BoI7ZeGRLldhPbn7txWCAJNmvvEIBpGM8MywEU20bT49k2%2F4nDq%2B4T%2FIghv%2FsuMDJs%2Fa2NpFndXK2PnqQ%3D&language=id&mobile=yes&redirectUrl=">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_roulette_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Roulette </div>
                </a>
              </div>
              <div style="height:190px; width:175px; display:inline-block; text-align:center; vertical-align:top; cursor:pointer">
                <a href="https://mg.lk-acc-n1.com?&token=SmhhFF27lXntpfVmj%2Fo2lEUEJZ2zS51ZbLC6%2FvcccfdXCWH0CpnMqppe6Nn7JrZhyl1gqLMU2RvmQ%2FhRJCY2JZSww4pxioFx3zbmMHefmIYmfyEZJjhd0CXdXcD5A2hpMW9NW4h8ur%2FMx5GnVa%2FEjlz5x%2BHPWjM%2B9E31l8YzPvo%3D&language=id&mobile=yes&redirectUrl=">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_sicbo_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Sicbo</div>
                </a>
              </div>
            </div>
          </div>

        </div>
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