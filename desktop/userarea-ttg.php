<?php
session_start();
// Periksa apakah pengguna telah login
if (!isset($_SESSION['user_id'])) {
  // Redirect ke halaman login jika pengguna belum login
  header("Location: index.php");
  exit();
}





if (isset($_SESSION['user_id'])) {
  include_once("functions/database.php");
  $mysqli = new databases();
  $sesi_id = $_SESSION['user_id'];


  if (empty($sesi_id)) {
    header('location:./');
  }
} else {

  include_once('functions/database.php');
}

foreach ($mysqli->user_sesi($sesi_id) as $sesi);
foreach ($mysqli->saldo_akun($sesi_id) as $saldo);
$saldo_akun = number_format($saldo['saldo'], 0);
$sesi_level = $sesi['level'];


// =====================================================
$sesi_id = $_SESSION['user_id'];
include_once("functions/database.php");
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

$conn->close();

?>



<?php
include_once "functions/fungsi_umum.php";


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>DAVO88: User Area</title>

  <!-- Meta -->
  <meta charset="utf-8">
  <!-- <meta content="width=device-width, initial-scale=1.0" name="viewport"> -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=1200, initial-scale=1" name="viewport">
  <meta content="" name="description">
  <meta content="" name="author">

  <!-- Favicon -->
  <link rel="icon" type="image/png" href="favicon.png">

  <!-- CSS Global Compulsory -->
  <link rel="stylesheet" href="css/bootstrap.web.white.min.css">
  <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet" />
  <style>
    body {
      overflow-y: scroll;
    }

    .blink_me {
      animation: blinker 1s step-start infinite;
    }

    @keyframes blinker {
      20% {
        opacity: 0.2;
      }
    }

    textarea {
      height: 100px !important;
      width: 100%;
      padding: 10px;
      border-radius: 5px !important;
    }

    .bgcolorbtn {
      background-color: #3c4046 !important;
      border-color: #5e646c;
    }

    .nav-tabs>li>a {
      color: #000;
    }
  </style>
  <script>
    function secondtominute(d) {
      var m = Math.floor(d / (60));
      var s = d - (m * 60);
      if (s < 10) s = '0' + s;
      return m + ':' + s;
    }
  </script>

</head>

<body style="padding-top: 70px;">
<nav id="navbar" class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#"><span style="color:#FFDD00; font-weight:bold; font-size:14px;">User Area</span></a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="javascript:toTransaksi();"><span class="glyphicon glyphicon-calendar"></span>History</a></li>
          <li><a href="javascript:toDeposit();"><span class="glyphicon glyphicon-import"></span>Deposit</a></li>
          <li><a href="javascript:toWithdraw();"><span class="glyphicon glyphicon-export"></span>Withdraw</a></li>
          <li><a href="javascript:toRekening();"><span class="glyphicon glyphicon-briefcase"></span>Rekening</a><span style="position:absolute; font-size: 9px; margin-top: -40px; margin-left: 7px">&#11088;</span></li>
          <li><a href="javascript:toMemo();"><span class="glyphicon glyphicon-edit"></span>Memo<span class="badge badgeTotal" style="margin-left:5px; margin-right:10px; font-size:9px; font-weight:bold"></span></a></li>
          <li style="cursor: pointer;"><a onClick="window.open('promosi.php', '_blank', 'width=900, height=800, top=0, left=0')"><img src="https://img.pay4d.info/button-promosi_big.png" alt="Promosi" style="margin-top: -2px; width: 84px"></a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="javascript:toMyAccount();"><span class="glyphicon glyphicon-user"></span> <strong><?php echo $d['username']; ?></strong></a></li>
          <li><a href="javascript:logout();"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
          <li><a><span class="glyphicon glyphicon-time"></span><span id="waktu_sekarang"><?php echo jamTanggalIndonesia(date("Y-m-d H:i:s"), true); ?> [ GMT+7 ]</span></a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">

    <div class="well well-sm" style="margin-bottom:15px; padding-top: 5px; padding-bottom:2px;">
      <marquee><span id="" style="white-space:nowrap">Hubungi Whatsapp / WA kami yang baru ya bossku untuk kendala †6287720476744</span></marquee>
    </div>
    <div class="col-md-2" style="padding:0px; margin:0px;">
      <div id="logo" style="margin-top:30px; margin-left:3px"><img src="images/logoweb.png" width="183" alt="" /></div>
    </div>
    <div class="col-md-10" style="padding:0px; margin:0px;">

      <div class="col-md-4" style="padding:0px; margin:0px; padding-left:0px;">
        <div class="panel panel-danger">
          <div class="panel-heading" style="padding-top:5px; padding-bottom:5px">User Data</div>
          <div class="panel-body" style="padding-top:3px;height:65px;overflow:hidden; font-size:10px"><input type="hidden" class="userstatus" value="1"><input type="hidden" class="credit" name="credit" value=""><input type="hidden" id="max_lose" value=""><input type="hidden" id="min_deposit" value=""><input type="hidden" id="min_withdraw" value="">
            <div>Balance: Rp <strong><span class="userCredit" style="font-size:14px; color:#D00"></span></strong></div>
            <div>Last Login: <?php echo $lastLogin; ?><br><?php
                                                          $ip_pengguna = $_SERVER['REMOTE_ADDR'];
                                                          echo "<p>Last IP: " . $ip_pengguna . "</p>";
                                                          ?></div>
          </div>
        </div>
      </div>
      <div class="col-md-4" style="padding:0px; margin:0px; padding-left:8px;">
        <div class="panel panel-danger">
          <div class="panel-heading" style="padding-top:5px; padding-bottom:5px">Last Bet/Win Report</div>
          <div class="panel-body" id="winBet" style="padding-top:8px;height:65px; overflow:auto; font-size:10px">No Data<br>No Data<br>No Data</div>
        </div>
      </div>
      <div class="col-md-4" style="padding:0px; margin:0px; padding-left:8px;">
        <div class="panel panel-danger">
          <div class="panel-heading" style="padding-top:5px; padding-bottom:5px">Last Deposit/Withdraw Status</div>
          <div class="panel-body" id="depoWD" style="padding-top:8px;height:65px;overflow:auto; font-size:10px">No Data<br>No Data<br>No Data</div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <style>
      body {
        padding: 0px;
        padding-top: 70px;
        margin: 0px;
        background-color: #EEE !important;
        font-size: 12px;
      }

      #navbar {
        background-color: #006cfd;

      }

      .well {
        background-color: #FFF !important;
      }

      .contentmenu {
        width: 1000px;
        margin: 0px auto;
        text-align: left;
        padding: 10px;
        font-size: 12px;
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
        box-shadow: 0px 3px 5px 0px rgba(0, 0, 0, 0.4);
      }

      .panel-danger>.panel-heading {
        color: #FFF;
        background-color: #1840b1;
        border-color: rgba(0, 0, 0, 0.6);
        font-family: 'Conv_GOODTIME', Sans-Serif;
        font-size: 12px
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

      .abel {
        font-family: 'Abel';
      }
    </style>

    <!-- MAIN TAB -->

    <ul class="nav nav-tabs grabgtab" style="margin-bottom:10px; font-size:16px; font-weight:bold; margin-bottom:0px">
      <li class="" id="tab_dashboard" style="width:52px"><a data-toggle="tab" href="#dashboard_wrap"><span id="p_dashboard" class="glyphicon glyphicon-home" style="height:23px"></span></a></li>
      <li class="" id="tab_dashboard" style="width:172px"><a data-toggle="tab" href="#toto_wrap"><span><img src="https://img.pay4d.info/tab-toto-w.png" width="25" alt="" /> Togel</span></a>


      </li>
      <li class="active" id="tab_dashboard" style="width:152px"><a data-toggle="tab" href="?login=89j3vu4unVSW8Bny&games#games_wrap"><span class="nama_pasaran_dashboard"><img src="https://img.pay4d.info/tab-slot-w.png" width="25" alt="" /> Slot</span></a>
      </li>
      <li class="" id="tab_dashboard" style="width:172px"><a data-toggle="tab" href="#livegames_wrap"><span id="p_dashboard"></span><img src="https://img.pay4d.info/tab-livegame-w.png" width="25" alt="" /> Live Casino</a>


      </li>
      <li class="" id="tab_dashboard" style="width:152px"><a data-toggle="tab" href="#sport_wrap"><img src="https://img.pay4d.info/tab-sport-w.png" width="25" alt="" /> Sport</a>

        <span style="position:absolute; margin-top:-45px; margin-left:90px;"><img src="https://img.pay4d.info/joy.png" height="16" alt="" /></span>

      </li>
      <li class="" id="tab_dashboard" style="width:172px"><a data-toggle="tab" href="#fishing_wrap"><span id="p_dashboard"></span><img src="https://img.pay4d.info/tab-tembakikan-w.png" width="25" alt="" /> Arcade</a>

      </li>
      <li class="" id="tab_dashboard" style="width:172px"><a data-toggle="tab" href="#sabung_wrap"><span id="p_dashboard"></span><img src="https://img.pay4d.info/tab-sabung-w.png" width="25" alt="" /> Sabung</a>

        <span style="position:absolute; margin-top:-60px; margin-left:68px;"><img src="https://img.pay4d.info/new2.png" height="29" alt="" /></span>
      </li>
    </ul>
    <div style="height:10px; background-color:#FFF" class="grabgtabbottom"></div>

    <!-- DASHBOARD TAB -->

    <div class="tab-content">

      <div id="dashboard_wrap" class="tab-pane fade in">

        <div id="dashboard_statusdown" class="text-center"></div>
        <div id="dashboard">

          <ul class="nav nav-pills" id="menu_dashboard">
            <li class="active" id="menu_dashboard_statement" onclick="getStatement(1);"><a data-toggle="pill" href="#statement"><strong><span class="glyphicon glyphicon-calendar"></span>Statement</a></strong></li>
            <li id="menu_dashboard_transaksi" onclick="getTransaksi(1);"><a data-toggle="pill" href="#transaksi"><strong><span class="glyphicon glyphicon-calendar"></span>History Transaksi</strong></a></li>
            <li id="menu_dashboard_deposit" onclick="getDeposit();"><a data-toggle="pill" href="#deposit"><strong><span class="glyphicon glyphicon-import"></span>Deposit</strong></a></li>
            <li id="menu_dashboard_withdraw" onclick="getWithdraw();"><a data-toggle="pill" href="#withdraw"><strong><span class="glyphicon glyphicon-export"></span>Withdraw</strong></a></li>
            <li id="menu_dashboard_rekening"><a data-toggle="pill" href="#userrekening"><strong><span class="glyphicon glyphicon-briefcase"></span>Rekening</strong></a><span style="position:absolute; font-size: 10px; margin-top: -37px; margin-left: 8px">&#11088;</span></li>
            <li id="menu_dashboard_memo" onClick="getMemo();"><a data-toggle="pill" href="#memo"><strong><span class="glyphicon glyphicon-envelope"></span>Memo<span class="badge badgeTotal" style="margin-left:5px"></span></strong></a></li>
            <li id="menu_dashboard_referal" onClick="getReferal(1,'j');"><a data-toggle="pill" href="#referal"><strong><span class="glyphicon glyphicon-duplicate"></span>Referal</strong></a></li>
            <li id="menu_dashboard_myaccount"><a data-toggle="pill" href="#account"><strong><span class="glyphicon glyphicon-user"></span>Ubah Password</strong></a></li>
          </ul>
          <div class="tab-content">
            <div id="statement" class="tab-pane fade in active">
              <h4>Statement</h4>
              <span class="content">No Data</span>
            </div>

            <div id="transaksi" class="tab-pane fade">
              <h4>History Transaksi</h4>
              <span class="content">No Data</span>
            </div>


            <div id="deposit" class="tab-pane fade">
              <h4>Deposit</h4>
              <div class="row">
                <div class="col-md-6">
                  <div id="statusDeposit"></div><span id="deposit_form">No Data</span>
                </div>
                <div class="col-md-6">
                  <div>Deposit</div>
                  <div>
                    <p><strong>PERHATIKAN NOMOR REKENING TUJUAN YANG KAMI BERIKAN !!<br>
                        Kami tidak memberikan toleransi apabila terjadi kesalahan pengiriman uang (Deposit) ke rekening yang bukan rekening kami berikan.<br>
                        Minimal deposit : Rp. 10.000,-<br>
                        Harap melakukan konfirmasi deposit 1x saja, dan tunggu permohonan anda diproses untuk dapat melakukan deposit selanjutnya.</strong></p>
                  </div>
                </div>
              </div>
            </div>
            <div id="withdraw" class="tab-pane fade">
              <h4>Withdraw</h4>
              <div class="row">
                <div class="col-md-6">
                  <div id="statusWithdraw"></div><span id="withdraw_form">No Data</span>
                </div>
                <div class="col-md-6">
                  <div>Withdraw</div>
                  <div>
                    <p><strong>Minimal Withdraw : Rp. 50.000,-<br>
                        Harap melakukan konfirmasi withdraw 1x saja, dan tunggu permohonan anda diproses untuk dapat melakukan withdraw selanjutnya.<br>
                        Maksimal withdraw 2x per pasaran, hanya berlaku jika anda melakukan betting dipasaran tersebut.<br>
                        KAMI HANYA AKAN TRANSFER DANA KE REKENING ANDA YANG TERDAFTAR DI SITUS KAMI!</strong></p>
                  </div>
                </div>
              </div>
            </div>
            <div id="account" class="tab-pane fade">
              <h4>Ubah Password</h4>
              <div class="row">
                <div class="col-md-6">
                  <div id="statusPassword"></div>
                  <span id="pass_form">
                    <div class="panel panel-danger">
                      <div class="panel-heading">
                        <strong><span class="glyphicon glyphicon-pencil"></span>UBAH PASSWORD</strong>
                      </div>
                      <div class="panel-body">
                        <form class="form-group-sm pass_form" method="post">
                          <div class="form-group">
                            <label>Password Sekarang</label><input type="password" class="form-control passnow" name="passnow" placeholder="Masukkan Password Sekarang">
                          </div>
                          <div class="form-group">
                            <label>Password Baru</label><input type="password" class="form-control passnew" name="passnew" placeholder="Masukkan Password Baru (6 Karakter atau lebih)">
                          </div>
                          <div class="form-group">
                            <label>Konfirmasi Password Baru</label><input type="password" class="form-control passnewcon" name="passnewcon" placeholder="Masukkan Password Baru Sekali Lagi">
                          </div>
                          <input type="hidden" name="task" value="changePassword">
                          <input type="button" class="btn btn-info btn-block" id="change_password" value="Ganti Password">
                        </form>
                      </div>
                    </div>
                  </span>
                </div>
                <div class="col-md-6">
                  <div>My Account</div>
                  <div>Pihak DAVO88 tidak bertanggung jawab atas kelalaian anda dalam merahasiakan password anda, untuk mereset password anda, harap hubungi customer service kami dengan memenuhi syarat-syarat verifikasi seperti NO HP, ALAMAT EMAIL, atau hal-hal lain yang akan ditanyakan saat anda ingin mereset password

                  </div>
                </div>
              </div>
            </div>

            <div id="userrekening" class="tab-pane fade">
              <h4>Rekening</h4>
              <div class="panel panel-danger">
                <div class="panel-heading"><strong><span class="glyphicon glyphicon-pencil"></span>Rekening</strong></div>
                <div class="panel-body" id="rekening"></div>
              </div>
            </div>

            <div id="memo" class="tab-pane fade">
              <ul class="nav nav-tabs">
                <li><a data-toggle="tab" href="#memo-tulis"><span class="glyphicon glyphicon-edit"></span>Tulis Memo</a></li>
                <li class="active" id="nav-memo"><a data-toggle="tab" href="#memo-inbox"><span class="glyphicon glyphicon-import"></span>Inbox</a></li>
                <li><a data-toggle="tab" href="#memo-sent"><span class="glyphicon glyphicon-export"></span>Sent</a></li>
              </ul>

              <div class="tab-content">
                <div id="memo-tulis" class="tab-pane fade">
                  Tulis
                </div>
                <div id="memo-inbox" class="tab-pane fade in active">
                  inbox
                </div>
                <div id="memo-sent" class="tab-pane fade">
                  sent
                </div>
              </div>
            </div>

            <div id="referal" class="tab-pane fade">
              <h4>Referal</h4>
              <div class="well well-sm">
                Ini adalah URL referal anda: <span class="text-warning"><strong>

                    https://davo88imba.com/?ref=dimasak
                  </strong></span><br>
                <br>
                Anda akan mendapatkan Bonus Referal:
                <br>
                <br>

                <table class="table table-striped table-hover" style="width:250px; float:left">
                  <thead>
                    <tr style="background:none;">
                      <th colspan="2">TOGEL</th>
                    </tr>
                  </thead>

                  <tr>
                    <td class="text-success">4D/3D/2D</td>
                    <td><strong>1.00% </strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">Colok Bebas</td>
                    <td><strong>1.00% </strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">Colok Macau</td>
                    <td><strong>1.00% </strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">Colok Naga</td>
                    <td><strong>1.00% </strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">Colok Jitu</td>
                    <td><strong>1.00% </strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">5050 Umum</td>
                    <td><strong>0.50% </strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">5050 Special</td>
                    <td><strong>0.50% </strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">5050 Kombinasi</td>
                    <td><strong>0.50% </strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">Kombinasi</td>
                    <td><strong>0.50% </strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">Dasar</td>
                    <td><strong>1.00% </strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">Shio</td>
                    <td><strong>1.00% </strong></td>
                  </tr>
                </table>

                <table class="table table-striped table-hover" style="width:250px; float:left; margin-left:10px;">
                  <thead>
                    <tr style="background:none;">
                      <th colspan="2">SLOT</th>
                    </tr>
                  </thead>
                  <tr>
                    <td class="text-success">Pragmatic</td>
                    <td><strong> 0.1%</strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">PGSoft</td>
                    <td><strong> 0.1%</strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">Habanero</td>
                    <td><strong> 0.1%</strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">Joker Gaming</td>
                    <td><strong> 0.1%</strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">Spade Gaming</td>
                    <td><strong> 0.1%</strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">JILI</td>
                    <td><strong> 0%</strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">FastSpin</td>
                    <td><strong> 0%</strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">PlayStar</td>
                    <td><strong> 0%</strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">CQ9</td>
                    <td><strong> 0.1%</strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">Micro Gaming</td>
                    <td><strong> 0.1%</strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">TopTrend Gaming</td>
                    <td><strong> 0.1%</strong></td>
                  </tr>
                </table>

                <table class="table table-striped table-hover" style="width:250px; float:left; margin-left:10px;">
                  <thead>
                    <tr style="background:none;">
                      <th colspan="2">LIVE GAME</th>
                    </tr>
                  </thead>
                  <tr>
                    <td class="text-success">Pragmatic Live</td>
                    <td><strong> 0.1%</strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">ION Casino</td>
                    <td><strong> 0.1%</strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">Evolution</td>
                    <td><strong> 0%</strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">Sexy Gaming</td>
                    <td><strong> 0.1%</strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">AllBet</td>
                    <td><strong> 0.1%</strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">SA Gaming</td>
                    <td><strong> 0%</strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">Micro Gaming Live</td>
                    <td><strong> 0.1%</strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">Opus Live</td>
                    <td><strong> 0%</strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">SBO Casino</td>
                    <td><strong> 0%</strong></td>
                  </tr>
                </table>

                <table class="table table-striped table-hover" style="width:250px; float:left; margin-left:10px;">
                  <thead>
                    <tr style="background:none;">
                      <th colspan="2">SPORT</th>
                    </tr>
                  </thead>
                  <tr>
                    <td class="text-success">Saba Sport</td>
                    <td><strong> 0.1%</strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">SBO Sport</td>
                    <td><strong> 0%</strong></td>
                  </tr>
                  <tr>
                    <td class="text-success">TF eSport</td>
                    <td><strong> 0%</strong></td>
                  </tr>
                </table>

                <table class="table table-striped table-hover" style="width:250px; float:left; margin-left:10px;">
                  <thead>
                    <tr style="background:none;">
                      <th colspan="2">SABUNG</th>
                    </tr>
                  </thead>
                  <tr>
                    <td class="text-success">WS168</td>
                    <td><strong> 0%</strong></td>
                  </tr>
                </table>


                <div style="clear:both"></div>
                Setiap Player anda melakukan betting.
                Bonus Referal akan otomatis masuk ke Balance Anda.
              </div>
              <div id="referal_content">
              </div>
            </div>

          </div>
        </div>

        <div class="panel panel-default" style="margin-bottom:5px; margin-top:30px">
          <div class="panel-body" style="margin-top:5px; padding:10px; width:100%" id="bankOnline">
          </div>
        </div>
      </div>
      <div id="toto_wrap" class="tab-pane fade in ">

        <ul class="nav nav-pills" id="menu_dashboard" style="margin-bottom:15px;">
          <li class="active" id="menu_dashboard_peraturan"><a data-toggle="pill" href="#peraturan"><span class="glyphicon glyphicon-bullhorn"></span>Table Pasaran</a></li>
          <li id="menu_dashboard_keluaran" onclick="getTabKeluaran();"><a data-toggle="pill" href="#keluaran"><span class="glyphicon glyphicon-bell"></span>Nomor Keluaran</a></li>
          <li id="menu_dashboard_mimpi" onClick="getMimpi();"><a data-toggle="pill" href="#mimpi"><strong><span class="glyphicon glyphicon-book"></span>Buku Mimpi</strong></a>
          </li>
          <div style="clear:both; margin-top:5px;"></div>

          <li style="font-size:14px; width:228px; font-weight:bold; margin-left:0px; opacity:1.0;"><a data-toggle="pill" href="#singapore_wrap"><span id="p_singapore" class="glyphicon"></span><span class="nama_pasaran_singapore"></span>
              <span id="pidSG" style="float:right; font-weight:normal; font-size:10px;" class="blink_me"></span></a></li>
          <script></script>
          <li style="font-size:14px; width:228px; font-weight:bold; margin-left:0px; opacity:1.0;"><a data-toggle="pill" href="#sakapools_wrap"><span id="p_sakapools" class="glyphicon"></span><span class="nama_pasaran_sakapools"></span>
              <span id="pidSKA" style="float:right; font-weight:normal; font-size:10px;" class="blink_me"></span></a></li>
          <script>
            var timeSKA = 32078;
            setInterval(function() {
              timeSKA--;
              if (timeSKA < 3600) $('#pidSKA').text(secondtominute(timeSKA));
            }, 1000);
          </script>
          <li style="font-size:14px; width:228px; font-weight:bold; margin-left:0px; opacity:1.0;"><a data-toggle="pill" href="#sakatoto_wrap"><span id="p_sakatoto" class="glyphicon"></span><span class="nama_pasaran_sakatoto"></span>
              <span id="pidSKT" style="float:right; font-weight:normal; font-size:10px;" class="blink_me"></span></a></li>
          <script>
            var timeSKT = 42878;
            setInterval(function() {
              timeSKT--;
              if (timeSKT < 3600) $('#pidSKT').text(secondtominute(timeSKT));
            }, 1000);
          </script>
          <li style="font-size:14px; width:228px; font-weight:bold; margin-left:0px; opacity:1.0;"><a data-toggle="pill" href="#saka4d_wrap"><span id="p_saka4d" class="glyphicon"></span><span class="nama_pasaran_saka4d"></span>
              <span id="pidSKD" style="float:right; font-weight:normal; font-size:10px;" class="blink_me"></span></a></li>
          <script>
            var timeSKD = 50078;
            setInterval(function() {
              timeSKD--;
              if (timeSKD < 3600) $('#pidSKD').text(secondtominute(timeSKD));
            }, 1000);
          </script>
          <li style="font-size:14px; width:228px; font-weight:bold; margin-left:0px; opacity:1.0;"><a data-toggle="pill" href="#malaysia_wrap"><span id="p_malaysia" class="glyphicon"></span><span class="nama_pasaran_malaysia"></span>
              <span id="pidMY" style="float:right; font-weight:normal; font-size:10px;" class="blink_me"></span></a></li>
          <script></script>
          <li style="font-size:14px; width:228px; font-weight:bold; margin-left:0px; opacity:1.0;"><a data-toggle="pill" href="#totowuhan_wrap"><span id="p_totowuhan" class="glyphicon"></span><span class="nama_pasaran_totowuhan"></span>
              <span id="pidTWH" style="float:right; font-weight:normal; font-size:10px;" class="blink_me"></span></a></li>
          <script></script>
          <li style="font-size:14px; width:228px; font-weight:bold; margin-left:0px; opacity:1.0;"><a data-toggle="pill" href="#hksiang_wrap"><span id="p_hksiang" class="glyphicon"></span><span class="nama_pasaran_hksiang"></span>
              <span id="pidHKD" style="float:right; font-weight:normal; font-size:10px;" class="blink_me"></span></a></li>
          <script></script>
        </ul>


        <div class="tab-content">

          <div id="peraturan" class="tab-pane fade in active">


            <div id="info" class="tab-pane fade in active">
              <h4>Table Pasaran</h4>
              <div class="panel panel-danger">
                <div class="panel-heading">Info Pasaran</div>
                <div class="panel-body">
                  <table class="table table-striped table-hover" style="margin-bottom:0px">
                    <thead>
                      <tr>
                        <th style="width:30px">No.</th>
                        <th style="width:160px">Nama Pasaran</th>
                        <th>Web</th>
                        <th>Hari Di Undi</th>
                        <th>Libur</th>
                        <th style="width:80px">Tutup</th>
                        <th style="width:80px">Jadwal</th>
                      </tr>
                    </thead>
                    <tr>
                      <td>1</td>
                      <td>SINGAPORE</td>
                      <td><a href="http://www.singaporepools.com" target="_blank">www.singaporepools.com</a></td>
                      <td>Senin, Rabu, Kamis, Sabtu, Minggu</td>
                      <td>Selasa, Jumat</td>
                      <td>17:20 WIB</td>
                      <td>17:45 WIB</td>
                    </tr>

                    <tr>
                      <td>2</td>
                      <td>SAKA POOLS</td>
                      <td><a href="http://www.sakapools.com" target="_blank">www.sakapools.com</a></td>
                      <td>Setiap Hari</td>
                      <td>N/A</td>
                      <td>18:30 WIB</td>
                      <td>19:00 WIB</td>
                    </tr>

                    <tr>
                      <td>3</td>
                      <td>SAKA TOTO</td>
                      <td><a href="http://www.sakatoto.com" target="_blank">www.sakatoto.com</a></td>
                      <td>Setiap Hari</td>
                      <td>N/A</td>
                      <td>21:30 WIB</td>
                      <td>22:00 WIB</td>
                    </tr>

                    <tr>
                      <td>4</td>
                      <td>SAKA 4D</td>
                      <td><a href="http://www.saka4d.com" target="_blank">www.saka4d.com</a></td>
                      <td>Setiap Hari</td>
                      <td>N/A</td>
                      <td>23:30 WIB</td>
                      <td>23:59 WIB</td>
                    </tr>

                    <tr>
                      <td>5</td>
                      <td>MALAYSIA</td>
                      <td><a href="http://www.malaysialottery.net" target="_blank">www.malaysialottery.net</a></td>
                      <td>Setiap Hari</td>
                      <td>N/A</td>
                      <td>18:30 WIB</td>
                      <td>19:00 WIB</td>
                    </tr>

                    <tr>
                      <td>6</td>
                      <td>TOTO WUHAN</td>
                      <td><a href="http://www.totowuhan.com" target="_blank">www.totowuhan.com</a></td>
                      <td>Setiap Hari ( 09:00 | 12:00 | 15:00 | 18:00 | 21:00 | 00:00 )</td>
                      <td>N/A</td>
                      <td>Tiap 3 jam</td>
                      <td>Tiap 3 jam</td>
                    </tr>

                    <tr>
                      <td>7</td>
                      <td>HK SIANG</td>
                      <td><a href="http://www.hkpools1.com" target="_blank">www.hkpools1.com</a></td>
                      <td>Setiap Hari</td>
                      <td>N/A</td>
                      <td>10:30 WIB</td>
                      <td>11:00 WIB</td>
                    </tr>

                    <tr class="active">
                      <td colspan="7">Pemenang adalah Keluaran Pertama (1st Prize) pada Website Resmi setiap Pasaran.</td>
                    </tr>
                  </table>
                </div>
              </div>

              <p><u>DAVO88</u><br>

                DAVO88 hadir untuk melayani para pecinta Slot dan Togel di seluruh Indonesia. <br>
                DAVO88 hanya menyelenggarakan Lottery dari negara yang menyediakan hasil lottery yang legal dan sah seperti SINGAPORE, HONGKONG dan SYDNEY. <br>
                DAVO88 telah beroperasi sejak tahun 2015 dengan menyelenggarakan pembukaan account Taruhan Togel yang dilakukan secara online.<br>
                Kami berkomitmen untuk memberikan pelayanan terbaik dan memuaskan kepada seluruh member kami dengan di dukung oleh staff kami yang profesional dan handal yang menjadikan DAVO88 sebagai agen judi Slot dan Togel online terbaik dan terpercaya saat ini.</p>
            </div>



          </div>
          <div id="keluaran" class="tab-pane fade">
            <span class="content"></span>
            <span class="content2"></span>
          </div>

          <div id="mimpi" class="tab-pane fade">
            <h4 style="margin-bottom: 20px">Buku Mimpi</h4>
            <div class="panel panel-danger">
              <div class="panel-heading"></div>
              <div class="panel-body">
                <div class="form-group form-group-sm">
                  <div class="col-md-2" style="margin-left:0px; padding-left:0px">
                    <select name="dimensi" class="dimensi form-control">
                      <option value="2D" selected>2D</option>
                      <option value="3D">3D</option>
                      <option value="4D">4D</option>
                      <option value="">Semua</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <input type="text" name="search" class="search form-control" placeholder="Masukkan kata-kata yang dicari" style="width:100%" />
                  </div>
                  <div class="col-md-2">
                    <input type="button" value="SUBMIT" class="btn btn-sm btn-info" onclick="getMimpi();" />
                  </div>
                  <div style="clear: both"></div>
                </div>

                <div id="mimpi_content" style="margin-top: 10px">
                </div>

              </div>
            </div>
          </div>



          <div id="singapore_wrap" class="tab-pane fade in">

            <div id="singapore_statusdown" class="text-center"></div>
            <div id="singapore" style="padding:0px">

              <div class="col-md-2" style="margin:0px; padding:0px; padding-right:15px;">
                <div id="singapore_status" class="text-center text-warning" style="margin-bottom:5px"></div>
                <div class="text-center" style="margin-bottom:10px"><span class="text-success">SG-037</span> <span class="text-info">4232</span></div>
                <div class="well well-sm text-center" style="padding:0px">
                  <h5>4D/3D/2D</h5>
                  <div class="row">
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 4dQb">4D/3D/2D</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 4dSet">4D/3D/2D Set</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 4dBBSet">Bolak Balik</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 2dQb">Quick 2D</button></div>
                  </div>
                </div>
                <div class="well well-sm text-center" style="padding:0px">

                  <h5>Colok</h5>
                  <div class="row">
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokBebas">Colok Bebas</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokMacau">Colok Macau</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokNaga">Colok Naga</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokJitu">Colok Jitu</button></div>
                  </div>
                </div>
                <div class="well well-sm text-center" style="padding:0px">
                  <h5>50-50</h5>
                  <div class="row">
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default 5050Umum">50-50 Umum</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default 5050Special">50-50 Special</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default 5050Kombinasi">50-50 Kombinasi</button></div>
                  </div>
                </div>
                <div class="well well-sm text-center" style="padding:0px">
                  <h5>Lain-lain</h5>
                  <div class="row">
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default kombinasi">Macau / Kombinasi</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default dasar">Dasar</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default shio">Shio</button></div>
                  </div>
                </div>

                <div class="clearfix"></div>
              </div>
              <div class="col-md-10" style="margin:0px; padding:0px">
                <div class="forms 4dForm">

                </div>
                <div class="forms colokBebasForm" style="display:none">

                </div>
                <div class="forms colokMacauForm" style="display:none">

                </div>
                <div class="forms colokNagaForm" style="display:none">

                </div>
                <div class="forms colokJituForm" style="display:none">

                </div>
                <div class="forms 5050UmumForm" style="display:none">

                </div>
                <div class="forms 5050SpecialForm" style="display:none">

                </div>
                <div class="forms 5050KombinasiForm" style="display:none">

                </div>
                <div class="forms kombinasiForm" style="display:none">

                </div>
                <div class="forms dasarForm" style="display:none">

                </div>
                <div class="forms shioForm" style="display:none">

                </div>
                <div class="debug"></div>
                <div class="statusBox"></div>
                <div class="formContainer"></div>
                <div class="formConfirm" style="display:none">

                  <div class="panel panel-danger">
                    <div class="panel-heading">KONFIRMASI</div>
                    <div class="panel-body dataConfirm">
                    </div>
                  </div>



                  <input type="button" class="confirm pull-right btn btn-success" style="width:200px" value="Pasang"><input type="button" class="cancel pull-right btn btn-danger" game="def" style="width:100px; margin-right:10px" value="Cancel">
                  <div class="clearfix"></div>
                </div>

                <div class="panel panel-danger peraturanContainer">
                  <div class="panel-heading">Peraturan</div>
                  <div class="panel-body peraturanContainerBody">
                  </div>
                </div>

              </div>

            </div>
          </div>

          <div id="sakapools_wrap" class="tab-pane fade in">

            <div id="sakapools_statusdown" class="text-center"></div>
            <div id="sakapools" style="padding:0px">

              <div class="col-md-2" style="margin:0px; padding:0px; padding-right:15px;">
                <div id="sakapools_status" class="text-center text-warning" style="margin-bottom:5px"></div>
                <div class="text-center" style="margin-bottom:10px"><span class="text-success">SKA-036</span> <span class="text-info">9621</span></div>
                <div class="well well-sm text-center" style="padding:0px">
                  <h5>4D/3D/2D</h5>
                  <div class="row">
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 4dQb">4D/3D/2D</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 4dSet">4D/3D/2D Set</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 4dBBSet">Bolak Balik</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 2dQb">Quick 2D</button></div>
                  </div>
                </div>
                <div class="well well-sm text-center" style="padding:0px">

                  <h5>Colok</h5>
                  <div class="row">
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokBebas">Colok Bebas</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokMacau">Colok Macau</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokNaga">Colok Naga</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokJitu">Colok Jitu</button></div>
                  </div>
                </div>
                <div class="well well-sm text-center" style="padding:0px">
                  <h5>50-50</h5>
                  <div class="row">
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default 5050Umum">50-50 Umum</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default 5050Special">50-50 Special</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default 5050Kombinasi">50-50 Kombinasi</button></div>
                  </div>
                </div>
                <div class="well well-sm text-center" style="padding:0px">
                  <h5>Lain-lain</h5>
                  <div class="row">
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default kombinasi">Macau / Kombinasi</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default dasar">Dasar</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default shio">Shio</button></div>
                  </div>
                </div>

                <div class="clearfix"></div>
              </div>
              <div class="col-md-10" style="margin:0px; padding:0px">
                <div class="forms 4dForm">

                </div>
                <div class="forms colokBebasForm" style="display:none">

                </div>
                <div class="forms colokMacauForm" style="display:none">

                </div>
                <div class="forms colokNagaForm" style="display:none">

                </div>
                <div class="forms colokJituForm" style="display:none">

                </div>
                <div class="forms 5050UmumForm" style="display:none">

                </div>
                <div class="forms 5050SpecialForm" style="display:none">

                </div>
                <div class="forms 5050KombinasiForm" style="display:none">

                </div>
                <div class="forms kombinasiForm" style="display:none">

                </div>
                <div class="forms dasarForm" style="display:none">

                </div>
                <div class="forms shioForm" style="display:none">

                </div>
                <div class="debug"></div>
                <div class="statusBox"></div>
                <div class="formContainer"></div>
                <div class="formConfirm" style="display:none">

                  <div class="panel panel-danger">
                    <div class="panel-heading">KONFIRMASI</div>
                    <div class="panel-body dataConfirm">
                    </div>
                  </div>



                  <input type="button" class="confirm pull-right btn btn-success" style="width:200px" value="Pasang"><input type="button" class="cancel pull-right btn btn-danger" game="def" style="width:100px; margin-right:10px" value="Cancel">
                  <div class="clearfix"></div>
                </div>

                <div class="panel panel-danger peraturanContainer">
                  <div class="panel-heading">Peraturan</div>
                  <div class="panel-body peraturanContainerBody">
                  </div>
                </div>

              </div>

            </div>
          </div>

          <div id="sakatoto_wrap" class="tab-pane fade in">

            <div id="sakatoto_statusdown" class="text-center"></div>
            <div id="sakatoto" style="padding:0px">

              <div class="col-md-2" style="margin:0px; padding:0px; padding-right:15px;">
                <div id="sakatoto_status" class="text-center text-warning" style="margin-bottom:5px"></div>
                <div class="text-center" style="margin-bottom:10px"><span class="text-success">SKT-977</span> <span class="text-info">0634</span></div>
                <div class="well well-sm text-center" style="padding:0px">
                  <h5>4D/3D/2D</h5>
                  <div class="row">
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 4dQb">4D/3D/2D</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 4dSet">4D/3D/2D Set</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 4dBBSet">Bolak Balik</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 2dQb">Quick 2D</button></div>
                  </div>
                </div>
                <div class="well well-sm text-center" style="padding:0px">

                  <h5>Colok</h5>
                  <div class="row">
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokBebas">Colok Bebas</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokMacau">Colok Macau</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokNaga">Colok Naga</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokJitu">Colok Jitu</button></div>
                  </div>
                </div>
                <div class="well well-sm text-center" style="padding:0px">
                  <h5>50-50</h5>
                  <div class="row">
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default 5050Umum">50-50 Umum</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default 5050Special">50-50 Special</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default 5050Kombinasi">50-50 Kombinasi</button></div>
                  </div>
                </div>
                <div class="well well-sm text-center" style="padding:0px">
                  <h5>Lain-lain</h5>
                  <div class="row">
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default kombinasi">Macau / Kombinasi</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default dasar">Dasar</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default shio">Shio</button></div>
                  </div>
                </div>

                <div class="clearfix"></div>
              </div>
              <div class="col-md-10" style="margin:0px; padding:0px">
                <div class="forms 4dForm">

                </div>
                <div class="forms colokBebasForm" style="display:none">

                </div>
                <div class="forms colokMacauForm" style="display:none">

                </div>
                <div class="forms colokNagaForm" style="display:none">

                </div>
                <div class="forms colokJituForm" style="display:none">

                </div>
                <div class="forms 5050UmumForm" style="display:none">

                </div>
                <div class="forms 5050SpecialForm" style="display:none">

                </div>
                <div class="forms 5050KombinasiForm" style="display:none">

                </div>
                <div class="forms kombinasiForm" style="display:none">

                </div>
                <div class="forms dasarForm" style="display:none">

                </div>
                <div class="forms shioForm" style="display:none">

                </div>
                <div class="debug"></div>
                <div class="statusBox"></div>
                <div class="formContainer"></div>
                <div class="formConfirm" style="display:none">

                  <div class="panel panel-danger">
                    <div class="panel-heading">KONFIRMASI</div>
                    <div class="panel-body dataConfirm">
                    </div>
                  </div>



                  <input type="button" class="confirm pull-right btn btn-success" style="width:200px" value="Pasang"><input type="button" class="cancel pull-right btn btn-danger" game="def" style="width:100px; margin-right:10px" value="Cancel">
                  <div class="clearfix"></div>
                </div>

                <div class="panel panel-danger peraturanContainer">
                  <div class="panel-heading">Peraturan</div>
                  <div class="panel-body peraturanContainerBody">
                  </div>
                </div>

              </div>

            </div>
          </div>

          <div id="saka4d_wrap" class="tab-pane fade in">

            <div id="saka4d_statusdown" class="text-center"></div>
            <div id="saka4d" style="padding:0px">

              <div class="col-md-2" style="margin:0px; padding:0px; padding-right:15px;">
                <div id="saka4d_status" class="text-center text-warning" style="margin-bottom:5px"></div>
                <div class="text-center" style="margin-bottom:10px"><span class="text-success">SKD-930</span> <span class="text-info">6683</span></div>
                <div class="well well-sm text-center" style="padding:0px">
                  <h5>4D/3D/2D</h5>
                  <div class="row">
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 4dQb">4D/3D/2D</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 4dSet">4D/3D/2D Set</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 4dBBSet">Bolak Balik</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 2dQb">Quick 2D</button></div>
                  </div>
                </div>
                <div class="well well-sm text-center" style="padding:0px">

                  <h5>Colok</h5>
                  <div class="row">
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokBebas">Colok Bebas</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokMacau">Colok Macau</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokNaga">Colok Naga</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokJitu">Colok Jitu</button></div>
                  </div>
                </div>
                <div class="well well-sm text-center" style="padding:0px">
                  <h5>50-50</h5>
                  <div class="row">
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default 5050Umum">50-50 Umum</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default 5050Special">50-50 Special</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default 5050Kombinasi">50-50 Kombinasi</button></div>
                  </div>
                </div>
                <div class="well well-sm text-center" style="padding:0px">
                  <h5>Lain-lain</h5>
                  <div class="row">
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default kombinasi">Macau / Kombinasi</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default dasar">Dasar</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default shio">Shio</button></div>
                  </div>
                </div>

                <div class="clearfix"></div>
              </div>
              <div class="col-md-10" style="margin:0px; padding:0px">
                <div class="forms 4dForm">

                </div>
                <div class="forms colokBebasForm" style="display:none">

                </div>
                <div class="forms colokMacauForm" style="display:none">

                </div>
                <div class="forms colokNagaForm" style="display:none">

                </div>
                <div class="forms colokJituForm" style="display:none">

                </div>
                <div class="forms 5050UmumForm" style="display:none">

                </div>
                <div class="forms 5050SpecialForm" style="display:none">

                </div>
                <div class="forms 5050KombinasiForm" style="display:none">

                </div>
                <div class="forms kombinasiForm" style="display:none">

                </div>
                <div class="forms dasarForm" style="display:none">

                </div>
                <div class="forms shioForm" style="display:none">

                </div>
                <div class="debug"></div>
                <div class="statusBox"></div>
                <div class="formContainer"></div>
                <div class="formConfirm" style="display:none">

                  <div class="panel panel-danger">
                    <div class="panel-heading">KONFIRMASI</div>
                    <div class="panel-body dataConfirm">
                    </div>
                  </div>



                  <input type="button" class="confirm pull-right btn btn-success" style="width:200px" value="Pasang"><input type="button" class="cancel pull-right btn btn-danger" game="def" style="width:100px; margin-right:10px" value="Cancel">
                  <div class="clearfix"></div>
                </div>

                <div class="panel panel-danger peraturanContainer">
                  <div class="panel-heading">Peraturan</div>
                  <div class="panel-body peraturanContainerBody">
                  </div>
                </div>

              </div>

            </div>
          </div>

          <div id="malaysia_wrap" class="tab-pane fade in">

            <div id="malaysia_statusdown" class="text-center"></div>
            <div id="malaysia" style="padding:0px">

              <div class="col-md-2" style="margin:0px; padding:0px; padding-right:15px;">

                <div style="margin-bottom:10px" class="form-group">
                  <select class="form-control ndc" att="#malaysia" style="background-color:#FD9;width:100%; font-weight:bold; text-align-last: center; height:35px !important">
                    <option value="dc" selected>Discount</option>
                    <option value="nodc">No Discount</option>
                  </select>
                </div>
                <div id="malaysia_status" class="text-center text-warning" style="margin-bottom:5px"></div>
                <div class="text-center" style="margin-bottom:10px"><span class="text-success">MY-927</span> <span class="text-info">9050</span></div>
                <div class="well well-sm text-center" style="padding:0px">
                  <h5>4D/3D/2D</h5>
                  <div class="row">
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 4dQb">4D/3D/2D</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 4dSet">4D/3D/2D Set</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 4dBBSet">Bolak Balik</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 2dQb">Quick 2D</button></div>
                  </div>
                </div>
                <div class="well well-sm text-center" style="padding:0px">

                  <h5>Colok</h5>
                  <div class="row">
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokBebas">Colok Bebas</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokMacau">Colok Macau</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokNaga">Colok Naga</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokJitu">Colok Jitu</button></div>
                  </div>
                </div>
                <div class="well well-sm text-center" style="padding:0px">
                  <h5>50-50</h5>
                  <div class="row">
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default 5050Umum">50-50 Umum</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default 5050Special">50-50 Special</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default 5050Kombinasi">50-50 Kombinasi</button></div>
                  </div>
                </div>
                <div class="well well-sm text-center" style="padding:0px">
                  <h5>Lain-lain</h5>
                  <div class="row">
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default kombinasi">Macau / Kombinasi</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default dasar">Dasar</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default shio">Shio</button></div>
                  </div>
                </div>

                <div class="clearfix"></div>
              </div>
              <div class="col-md-10" style="margin:0px; padding:0px">
                <div class="forms 4dForm">

                </div>
                <div class="forms colokBebasForm" style="display:none">

                </div>
                <div class="forms colokMacauForm" style="display:none">

                </div>
                <div class="forms colokNagaForm" style="display:none">

                </div>
                <div class="forms colokJituForm" style="display:none">

                </div>
                <div class="forms 5050UmumForm" style="display:none">

                </div>
                <div class="forms 5050SpecialForm" style="display:none">

                </div>
                <div class="forms 5050KombinasiForm" style="display:none">

                </div>
                <div class="forms kombinasiForm" style="display:none">

                </div>
                <div class="forms dasarForm" style="display:none">

                </div>
                <div class="forms shioForm" style="display:none">

                </div>
                <div class="debug"></div>
                <div class="statusBox"></div>
                <div class="formContainer"></div>
                <div class="formConfirm" style="display:none">

                  <div class="panel panel-danger">
                    <div class="panel-heading">KONFIRMASI</div>
                    <div class="panel-body dataConfirm">
                    </div>
                  </div>



                  <input type="button" class="confirm pull-right btn btn-success" style="width:200px" value="Pasang"><input type="button" class="cancel pull-right btn btn-danger" game="def" style="width:100px; margin-right:10px" value="Cancel">
                  <div class="clearfix"></div>
                </div>

                <div class="panel panel-danger peraturanContainer">
                  <div class="panel-heading">Peraturan</div>
                  <div class="panel-body peraturanContainerBody">
                  </div>
                </div>

              </div>

            </div>
          </div>

          <div id="totowuhan_wrap" class="tab-pane fade in">

            <div id="totowuhan_statusdown" class="text-center"></div>
            <div id="totowuhan" style="padding:0px">

              <div class="col-md-2" style="margin:0px; padding:0px; padding-right:15px;">

                <div style="margin-bottom:10px" class="form-group">
                  <select class="form-control ndc" att="#totowuhan" style="background-color:#FD9;width:100%; font-weight:bold; text-align-last: center; height:35px !important">
                    <option value="dc" selected>Discount</option>
                    <option value="nodc">No Discount</option>
                  </select>
                </div>
                <div id="totowuhan_status" class="text-center text-warning" style="margin-bottom:5px"></div>
                <div class="text-center" style="margin-bottom:10px"><span class="text-success">TWH-778</span> <span class="text-info">2988</span></div>
                <div class="well well-sm text-center" style="padding:0px">
                  <h5>4D/3D/2D</h5>
                  <div class="row">
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 4dQb">4D/3D/2D</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 4dSet">4D/3D/2D Set</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 4dBBSet">Bolak Balik</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 2dQb">Quick 2D</button></div>
                  </div>
                </div>
                <div class="well well-sm text-center" style="padding:0px">

                  <h5>Colok</h5>
                  <div class="row">
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokBebas">Colok Bebas</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokMacau">Colok Macau</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokNaga">Colok Naga</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokJitu">Colok Jitu</button></div>
                  </div>
                </div>
                <div class="well well-sm text-center" style="padding:0px">
                  <h5>50-50</h5>
                  <div class="row">
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default 5050Umum">50-50 Umum</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default 5050Special">50-50 Special</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default 5050Kombinasi">50-50 Kombinasi</button></div>
                  </div>
                </div>
                <div class="well well-sm text-center" style="padding:0px">
                  <h5>Lain-lain</h5>
                  <div class="row">
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default kombinasi">Macau / Kombinasi</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default dasar">Dasar</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default shio">Shio</button></div>
                  </div>
                </div>

                <div class="clearfix"></div>
              </div>
              <div class="col-md-10" style="margin:0px; padding:0px">
                <div class="forms 4dForm">

                </div>
                <div class="forms colokBebasForm" style="display:none">

                </div>
                <div class="forms colokMacauForm" style="display:none">

                </div>
                <div class="forms colokNagaForm" style="display:none">

                </div>
                <div class="forms colokJituForm" style="display:none">

                </div>
                <div class="forms 5050UmumForm" style="display:none">

                </div>
                <div class="forms 5050SpecialForm" style="display:none">

                </div>
                <div class="forms 5050KombinasiForm" style="display:none">

                </div>
                <div class="forms kombinasiForm" style="display:none">

                </div>
                <div class="forms dasarForm" style="display:none">

                </div>
                <div class="forms shioForm" style="display:none">

                </div>
                <div class="debug"></div>
                <div class="statusBox"></div>
                <div class="formContainer"></div>
                <div class="formConfirm" style="display:none">

                  <div class="panel panel-danger">
                    <div class="panel-heading">KONFIRMASI</div>
                    <div class="panel-body dataConfirm">
                    </div>
                  </div>



                  <input type="button" class="confirm pull-right btn btn-success" style="width:200px" value="Pasang"><input type="button" class="cancel pull-right btn btn-danger" game="def" style="width:100px; margin-right:10px" value="Cancel">
                  <div class="clearfix"></div>
                </div>

                <div class="panel panel-danger peraturanContainer">
                  <div class="panel-heading">Peraturan</div>
                  <div class="panel-body peraturanContainerBody">
                  </div>
                </div>

              </div>

            </div>
          </div>

          <div id="hksiang_wrap" class="tab-pane fade in">

            <div id="hksiang_statusdown" class="text-center"></div>
            <div id="hksiang" style="padding:0px">

              <div class="col-md-2" style="margin:0px; padding:0px; padding-right:15px;">

                <div style="margin-bottom:10px" class="form-group">
                  <select class="form-control ndc" att="#hksiang" style="background-color:#FD9;width:100%; font-weight:bold; text-align-last: center; height:35px !important">
                    <option value="dc" selected>Discount</option>
                    <option value="nodc">No Discount</option>
                  </select>
                </div>
                <div id="hksiang_status" class="text-center text-warning" style="margin-bottom:5px"></div>
                <div class="text-center" style="margin-bottom:10px"><span class="text-success">HKD-744</span> <span class="text-info">4552</span></div>
                <div class="well well-sm text-center" style="padding:0px">
                  <h5>4D/3D/2D</h5>
                  <div class="row">
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 4dQb">4D/3D/2D</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 4dSet">4D/3D/2D Set</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 4dBBSet">Bolak Balik</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default 4d 2dQb">Quick 2D</button></div>
                  </div>
                </div>
                <div class="well well-sm text-center" style="padding:0px">

                  <h5>Colok</h5>
                  <div class="row">
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokBebas">Colok Bebas</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokMacau">Colok Macau</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokNaga">Colok Naga</button></div>
                    <div class="col-sm-3 col-md-12"><button type="button" class="btn btn-block btn-default colokJitu">Colok Jitu</button></div>
                  </div>
                </div>
                <div class="well well-sm text-center" style="padding:0px">
                  <h5>50-50</h5>
                  <div class="row">
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default 5050Umum">50-50 Umum</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default 5050Special">50-50 Special</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default 5050Kombinasi">50-50 Kombinasi</button></div>
                  </div>
                </div>
                <div class="well well-sm text-center" style="padding:0px">
                  <h5>Lain-lain</h5>
                  <div class="row">
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default kombinasi">Macau / Kombinasi</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default dasar">Dasar</button></div>
                    <div class="col-sm-4 col-md-12"><button type="button" class="btn btn-block btn-default shio">Shio</button></div>
                  </div>
                </div>

                <div class="clearfix"></div>
              </div>
              <div class="col-md-10" style="margin:0px; padding:0px">
                <div class="forms 4dForm">

                </div>
                <div class="forms colokBebasForm" style="display:none">

                </div>
                <div class="forms colokMacauForm" style="display:none">

                </div>
                <div class="forms colokNagaForm" style="display:none">

                </div>
                <div class="forms colokJituForm" style="display:none">

                </div>
                <div class="forms 5050UmumForm" style="display:none">

                </div>
                <div class="forms 5050SpecialForm" style="display:none">

                </div>
                <div class="forms 5050KombinasiForm" style="display:none">

                </div>
                <div class="forms kombinasiForm" style="display:none">

                </div>
                <div class="forms dasarForm" style="display:none">

                </div>
                <div class="forms shioForm" style="display:none">

                </div>
                <div class="debug"></div>
                <div class="statusBox"></div>
                <div class="formContainer"></div>
                <div class="formConfirm" style="display:none">

                  <div class="panel panel-danger">
                    <div class="panel-heading">KONFIRMASI</div>
                    <div class="panel-body dataConfirm">
                    </div>
                  </div>



                  <input type="button" class="confirm pull-right btn btn-success" style="width:200px" value="Pasang"><input type="button" class="cancel pull-right btn btn-danger" game="def" style="width:100px; margin-right:10px" value="Cancel">
                  <div class="clearfix"></div>
                </div>

                <div class="panel panel-danger peraturanContainer">
                  <div class="panel-heading">Peraturan</div>
                  <div class="panel-body peraturanContainerBody">
                  </div>
                </div>

              </div>

            </div>
          </div>

        </div>
      </div>

      <div id="games_wrap" class="tab-pane fade in active">
        <div id="launch_window" style="width:100%; height:713px; display:none">
          <iframe id="embedgameIframe" name="embedgameIframe" scrolling="no" width="100%" height="100%" src="pleaseWait.html" frameBorder="0" style="margin: 0; padding: 0; white-space: nowrap; border: 0; background-color:#272b30">
          </iframe>
          <div style="position:absolute; margin-top:-713px; margin-left:5px; " id="closeButton"><button type="button" class="btn btn-default" onClick="closeGame();" style="background:none; border:none; padding:0px; margin:0px; font-size:20px"><img src="https://img.pay4d.info/home.png" height="35" alt=""></button></div>
        </div>

        <div id="game_window" style="width:100%; height:788px">
          <ul class="nav nav-pills grabgtab" style="font-size:16px; font-weight:bold; padding-bottom:2px;">

            <li class="" id="tab_pp" style="width:33.1%; margin-left:2px; margin-bottom: 2px"><a data-toggle="tab" href="userarea.php#games_wrap"><span><img src="https://img.pay4d.info/pp-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />Pragmatic Play</span>
                <span style="position:absolute; margin-top:-20px; margin-left:5px;"><img src="https://img.pay4d.info/dailywins.png" height="45" alt="" /></span> </a></li>
            <li class="" id="tab_pg" style="width:33.1%; margin-left:2px; margin-bottom: 2px"><a href="?login=89j3vu4unVSW8Bny&games&gid=pg"><span><img src="https://img.pay4d.info/pg-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />PGSoft</span>
                <span style="position:absolute; margin-top:-18px; margin-left:5px"><img src="https://img.pay4d.info/hot.png" width="34" alt="" /></span> </a></li>
            <li class="" id="tab_hb" style="width:33.1%; margin-left:2px; margin-bottom: 2px"><a href="?login=89j3vu4unVSW8Bny&games&gid=hb"><span><img src="https://img.pay4d.info/hb-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />Habanero</span>
              </a></li>
            <li class="" id="tab_jg" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a href="?login=89j3vu4unVSW8Bny&games&gid=jg"><span><img src="https://img.pay4d.info/jg-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />Joker Gaming</span>
              </a></li>
            <li class="" id="tab_sg" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a href="?login=89j3vu4unVSW8Bny&games&gid=sg"><span><img src="https://img.pay4d.info/sg-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />Spadegaming</span>
                <span style="position:absolute; margin-top:-23px; margin-left:-40px;"><img src="https://img.pay4d.info/event2.png" height="29" alt="" /></span> </a></li>
            <li class="" id="tab_jl" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a href="?login=89j3vu4unVSW8Bny&games&gid=jl"><span><img src="https://img.pay4d.info/jl-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />JILI</span>
                <span style="position:absolute; margin-top:-23px; margin-left:-40px;"><img src="https://img.pay4d.info/event2.png" height="29" alt="" /></span> </a></li>
            <li class="" id="tab_fs" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a href="?login=89j3vu4unVSW8Bny&games&gid=fs"><span><img src="https://img.pay4d.info/fs-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />FastSpin</span>
                <span style="position:absolute; margin-top:-23px; margin-left:-40px;"><img src="https://img.pay4d.info/event2.png" height="29" alt="" /></span> </a></li>
            <li class="" id="tab_ps" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a href="?login=89j3vu4unVSW8Bny&games&gid=ps"><span><img src="https://img.pay4d.info/ps-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />PlayStar</span>
              </a></li>
            <li class="" id="tab_cq9" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a href="?login=89j3vu4unVSW8Bny&games&gid=cq9"><span><img src="https://img.pay4d.info/cq9-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" /></span>
              </a></li>
            <li class="" id="tab_mg" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a href="?login=89j3vu4unVSW8Bny&games&gid=mg"><span><img src="https://img.pay4d.info/mg-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />Microgaming</span>
              </a></li>
            <li class="active" id="tab_ttg" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a href="?login=89j3vu4unVSW8Bny&games&gid=ttg"><span><img src="https://img.pay4d.info/ttg-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />TopTrend Gaming</span>
              </a></li>

          </ul>
          <div style="height:10px; background-color:#FFF" class="grabgtabbottom"></div>

          <div class="tab-content">








            <div id="games_window_ttg" class="tab-pane fade in active">
              <div class="row">
                <div class="col-md-9">

                  <ul class="nav nav-pills">
                    <li style="width:120px;" class="active"><a data-toggle="pill" href="#ttgslot">&#10024; Slots</a></li>
                    <li style="width:200px"><a data-toggle="pill" href="#ttgpoker">&clubs; Card &amp Table Games</a></li>
                  </ul>

                </div>
                <div class="col-md-3" style="padding-top:5px">
                  <form method="GET" style="float:right;">
                    <div class="input-group">
                      <input type="text" class="form-control" name="s" placeholder="Search Game" value="">
                      <input type="hidden" name="gid" value="ttg">
                      <input type="hidden" name="games">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-sm btn-danger" style="height:27px; padding-top:4px; margin-top:-1px"><i class="glyphicon glyphicon-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="tab-content" style="margin-top:20px">

                <div id="ttgslot" style="height:589px; overflow:auto" class="tab-pane fade in active">
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=CandyGold&gameType=0&gameId=1179&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1179.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Candy Gold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=MysticBear&gameType=0&gameId=1192&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1192.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Mystic Bear</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=VikingHonour&gameType=0&gameId=1189&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1189.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Viking Honour XtraWild</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=YearOfTheWildWildTiger&gameType=0&gameId=1193&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1193.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Year Of The Wild Wild Tiger</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=AlohaSpiritXtraLock&gameType=0&gameId=1170&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1170.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Aloha Spirit Xtra Lock</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=SantaVsAliens&gameType=0&gameId=1188&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1188.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Santa Vs Aliens</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=RockNWaysXtraWays&gameType=0&gameId=1185&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1185.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Rock N Ways XtraWays</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=BookOfTheEast&gameType=0&gameId=1161&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1161.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Book of the East</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=ZombiesOnVacation&gameType=0&gameId=1183&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1183.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Zombies on Vacation</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=SwordWarriors&gameType=0&gameId=1164&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1164.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Sword Warriors</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=SamuraiBlade&gameType=0&gameId=1186&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1186.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Samurai Blade</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=PPBlackjack&gameType=0&gameId=1173&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1173.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Perfect Pairs Blackjack</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=LoneRider&gameType=0&gameId=1176&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1176.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Lone Rider XtraWays</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=RoyalRumble&gameType=0&gameId=1182&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1182.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Royal Rumble</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=HachisQuestOfHeroes&gameType=0&gameId=1151&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1151.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Hachis Quest Of Heroes</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=PirateTreasure1181&gameType=0&gameId=1181&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1181.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Pirate Treasure</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=JorgenFromBergen&gameType=0&gameId=1180&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1180.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Jorgen From Bergen</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=MegaPhoenix&gameType=0&gameId=1163&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1163.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Mega Phoenix</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=FivePrincesses&gameType=0&gameId=1175&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1175.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Five Princesses</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=StormOfEgypt&gameType=0&gameId=1162&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1162.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Storm of Egypt</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=SeaGod&gameType=0&gameId=1169&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1169.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Sea God</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=WildWestH5&gameType=0&gameId=1158&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1158.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Wild West H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=BookOfTheWest&gameType=0&gameId=1152&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1152.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Book of the West</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=SpinCity&gameType=0&gameId=1157&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1157.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Spin City</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=GoldenReindeer&gameType=0&gameId=1174&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1174.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Golden Reindeer</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=RainbowGold&gameType=0&gameId=1168&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1168.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Rainbow Gold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=GrockelsCauldron&gameType=0&gameId=1160&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1160.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Grockels Cauldron</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=WildLand&gameType=0&gameId=1150&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1150.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Wild Land</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=MegaMaya&gameType=0&gameId=1155&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1155.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Mega Maya</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=TripleLuck&gameType=0&gameId=1166&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1166.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Triple Luck</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=SpinDiner&gameType=0&gameId=1123&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1123.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Spin Diner</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=HanaBana&gameType=0&gameId=1156&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1156.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Hana Bana</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=SeaRaiders&gameType=0&gameId=1159&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1159.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Sea Raiders</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=FortuneFrog&gameType=0&gameId=1153&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1153.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Fortune Frog</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=ImmortalMonkeyKing&gameType=0&gameId=1154&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1154.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Immortal Monkey King</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=LaserCats&gameType=0&gameId=1122&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1122.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Laser Cats</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=SushiMaster&gameType=0&gameId=1149&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1149.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Sushi Master</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=BollywoodBillions&gameType=0&gameId=1199&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1199.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Bollywood Billions</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=RoyalGoldenDragon&gameType=0&gameId=1147&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1147.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Royal Golden Dragon</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=Golden888&gameType=0&gameId=1146&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1146.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Golden 888</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=EverlastingSpins&gameType=0&gameId=1113&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1113.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Everlasting Spins</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=PandaWarrior&gameType=0&gameId=1138&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1138.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Panda Warrior</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=FrogsNFliesH5&gameType=0&gameId=1052&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1052.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Frogs N Flies H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=MadMonkey2&gameType=0&gameId=1083&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1083.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Mad Monkey 2</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=LostTempleH5&gameType=0&gameId=1058&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1058.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Lost Temple H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=SilverLionH5&gameType=0&gameId=1057&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1057.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Silver Lion H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=WildWildTiger&gameType=0&gameId=1114&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1114.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Wild Wild Tiger</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=HappyHappyPenguin&gameType=0&gameId=1137&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1137.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Happy Happy Penguin</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=Zoomania&gameType=0&gameId=1119&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1119.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Zoomania</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=WildWildWitch&gameType=0&gameId=1105&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1105.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Wild Wild Witch</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=MadMonkeyH5&gameType=0&gameId=1051&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1051.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Mad Monkey H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=ChilliGoldH5&gameType=0&gameId=1053&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1053.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Chilli Gold H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=Jawz&gameType=0&gameId=1143&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1143.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Jawz</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=GoldenGenie&gameType=0&gameId=1108&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1108.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">GoldenGenie</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=MoreMonkeysH5&gameType=0&gameId=1069&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1069.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">More Monkeys H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=DragonPalaceH5&gameType=0&gameId=1070&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1070.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Dragon Palace H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=DolphinGoldH5&gameType=0&gameId=1055&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1055.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Dolphin Gold H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=GoldenDragon&gameType=0&gameId=1080&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1080.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Golden Dragon</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=FrogsNFlies2&gameType=0&gameId=1082&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1082.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Frogs n Flies 2</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=GoldenClaw&gameType=0&gameId=1136&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1136.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Golden Claw</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=LuckyPandaH5&gameType=0&gameId=1118&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1118.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Lucky Panda H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=ThunderingZeusH5&gameType=0&gameId=1068&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1068.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">ThunderingZeus H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=FortunePaysH5&gameType=0&gameId=1060&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1060.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Fortune Pays H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=DragonKingH5&gameType=0&gameId=1056&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1056.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Dragon King H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=LostTemple&gameType=0&gameId=484&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/484.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">LostTemple</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=FairyHollow&gameType=0&gameId=1109&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1109.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Fairy Hollow</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=FortunePays&gameType=0&gameId=1000&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1000.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">FortunePays</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=Crazy8s&gameType=0&gameId=1046&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1046.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Crazy8s</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=DragonPalace&gameType=0&gameId=1029&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1029.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">DragonPalace</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=AladdinsLegacyH5&gameType=0&gameId=1066&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1066.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Aladdins Legacy H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=YearOfTheMonkeyH5&gameType=0&gameId=1054&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1054.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Year of The Monkey H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=FrogsNFlies&gameType=0&gameId=526&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/526.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">FrogsNFlies</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=WildKartRacers&gameType=0&gameId=1106&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1106.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Wild Kart Racers</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=HotVolcanoH5&gameType=0&gameId=1061&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1061.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Hot Volcano H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=FuStarH5&gameType=0&gameId=1063&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1063.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Fu Star H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=MedusaCurse&gameType=0&gameId=1084&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1084.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Medusas Curse</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=KingDinosaur&gameType=0&gameId=1107&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1107.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">King Dinosaur</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=Huluwa&gameType=0&gameId=1078&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1078.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Huluwa</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=FireGoddessH5&gameType=0&gameId=1064&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1064.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Fire Goddess H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=WildTriads&gameType=0&gameId=1102&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1102.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Wild Triads</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=GoldenBuffalo&gameType=0&gameId=1120&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1120.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Golden Buffalo</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=HeroesNeverDie&gameType=0&gameId=1103&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1103.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Heroes Never Die</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=GoldenPigNJ&gameType=0&gameId=1133&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1133.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Golden Pig</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=ThreeDiamonds&gameType=0&gameId=1132&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1132.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">3 Diamonds</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=NeutronStarH5&gameType=0&gameId=1111&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1111.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Neutron Star H5 </div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=DiamondFortune&gameType=0&gameId=1130&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1130.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Diamond Fortune </div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=UltimateFighter&gameType=0&gameId=1112&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1112.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Ultimate fighter</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=Shark&gameType=0&gameId=1125&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1125.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Shark</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=DiaDeMuertos&gameType=0&gameId=1098&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1098.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Dia De Muertos</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=NeptunesGoldH5&gameType=0&gameId=1099&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1099.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Neptunes Gold H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=KungFuShowdown&gameType=0&gameId=1043&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1043.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Kung Fu Showdown</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=BattleHeroes&gameType=0&gameId=1091&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1091.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Battle Heroes</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=DiamondTowerH5&gameType=0&gameId=1104&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1104.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Diamond Tower H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=GemRiches&gameType=0&gameId=1101&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1101.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Gem Riches</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=YingCaiShen&gameType=0&gameId=1087&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1087.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Ying Cai Shen</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=TinyDoorGods&gameType=0&gameId=1100&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1100.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Tiny Door Gods</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=CherryFortune&gameType=0&gameId=1092&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1092.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Cherry Fortune</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=ReelsOfFortune&gameType=0&gameId=1079&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1079.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Reels Of Fortune</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=GoldenAmazon&gameType=0&gameId=1077&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1077.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Golden Amazon</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=MonkeyLuck&gameType=0&gameId=1089&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1089.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Monkey Luck</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=LeagueOfChampions&gameType=0&gameId=1086&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1086.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">League Of Champions</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=DynastyEmpire&gameType=0&gameId=1047&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1047.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Dynasty Empire</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=FivePiratesH5&gameType=0&gameId=1067&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1067.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Five Pirates H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=StacksOfCheese&gameType=0&gameId=1044&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1044.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Stacks of Cheese</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=SuperKids&gameType=0&gameId=1072&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1072.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Super Kids</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=LegendOfLinkH5&gameType=0&gameId=1049&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1049.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Legend Of Link H5</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=DetectiveBlackCat&gameType=0&gameId=1075&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1075.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Detective Black Cat</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=EightImmortals&gameType=0&gameId=1042&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1042.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Eight Immortals</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=GongXiFaCai&gameType=0&gameId=1073&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1073.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Gong Xi Fa Cai</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=YearOfTheMonkey&gameType=0&gameId=1035&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1035.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">YearofTheMonkey</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=DragonBallReels&gameType=0&gameId=1040&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1040.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">DragonBallReels</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=RoseOfVenice&gameType=0&gameId=1039&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1039.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">RoseOfVenice </div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=BerryBlastPlus&gameType=0&gameId=1038&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1038.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">BerryBlastPlus</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=TigerSlayer&gameType=0&gameId=1037&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1037.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">TigerSlayer</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=TheHoppingDead&gameType=0&gameId=1036&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1036.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">TheHoppingDead</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=Cleopatra&gameType=0&gameId=1034&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1034.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Cleopatra</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=RobinHood&gameType=0&gameId=1033&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1033.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">RobinHood</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=NeutronStar&gameType=0&gameId=1031&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1031.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">NeutronStar</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=TikiTreasures&gameType=0&gameId=1030&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1030.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">TikiTreasures</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=GrandPrix&gameType=0&gameId=1028&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1028.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">GrandPrix</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=AladdinHandOfMidas&gameType=0&gameId=1027&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1027.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">AladdinHandOfMidas</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=Athena&gameType=0&gameId=1026&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1026.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Athena</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=LuckyPanda&gameType=0&gameId=1025&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1025.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">LuckyPanda</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=TheSilkRoad&gameType=0&gameId=1024&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1024.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">TheSilkRoad</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=SnakeCharmer&gameType=0&gameId=1023&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1023.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">SnakeCharmer</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=HotVolcano&gameType=0&gameId=1022&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1022.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">HotVolcano</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=DragonKing&gameType=0&gameId=1021&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1021.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Drago King</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=FireGoddess&gameType=0&gameId=1019&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1019.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">FireGoddess</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=PotOGoldII&gameType=0&gameId=1018&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1018.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">PotOGoldII</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=ZeusVsHades&gameType=0&gameId=1017&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1017.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">ZeusVsHades</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=MadMonkey&gameType=0&gameId=1016&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1016.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">MadMonkey</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=RedHotFreeSpins&gameType=0&gameId=1015&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1015.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">RedHotFreeSpins</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=MoreMonkeys&gameType=0&gameId=1014&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1014.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">MoreMonkeys</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=MonkeyAndTheMoon&gameType=0&gameId=1013&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1013.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Monkey AndTheMoon</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=FivePirates&gameType=0&gameId=1012&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1012.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">FivePirates</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=JadeEmpire&gameType=0&gameId=1011&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1011.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">JadeEmpire</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=KatLeeII&gameType=0&gameId=1009&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1009.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">KatLeeII</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=CashGrabII&gameType=0&gameId=1008&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1008.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">CashGrabII</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=SilverLion&gameType=0&gameId=1007&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1007.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">SilverLion</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=ActionHeroes&gameType=0&gameId=1006&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1006.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">ActionHeroes </div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=JourneyWest&gameType=0&gameId=1004&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1004.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">JourneyWest</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=DolphinGold&gameType=0&gameId=1003&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1003.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">DolphinGold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=ZodiacWilds&gameType=0&gameId=1002&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1002.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">ZodiacWild</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=FuStar&gameType=0&gameId=1001&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1001.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">FuStar</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=Fortune8Cat&gameType=0&gameId=540&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/540.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Fortune8Cat</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=ChilliGold&gameType=0&gameId=533&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/533.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">ChilliGold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=ChoySunDoa&gameType=0&gameId=530&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/530.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">ChoySunDoa</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=AladdinsLegacy&gameType=0&gameId=525&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/525.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">AladdinsLegacy</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=Taxi&gameType=0&gameId=516&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/516.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Taxi</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=SamuraiPrincess&gameType=0&gameId=515&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/515.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">SamuraiPrincess</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=ThunderingZeus&gameType=0&gameId=486&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/486.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">ThunderingZeus</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=ShogunShowdown&gameType=0&gameId=483&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/483.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">ShogunShowdown</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=VampiresVsWerewolves&gameType=0&gameId=480&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/480.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">VampiresVsWerewolves</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=SerengetiDiamonds&gameType=0&gameId=478&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/478.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">SerengetiDiamonds</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=AngelsTouch&gameType=0&gameId=477&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/477.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">AngelsTouch</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=DracosFire&gameType=0&gameId=475&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/475.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">DracosFire</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=SinfulSpinsSlots&gameType=0&gameId=474&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/474.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Sinful Spins Slots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=BarsAndBellsSlots&gameType=0&gameId=473&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/473.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Bars And Bells Slots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=VictoryRidgeSlots&gameType=0&gameId=468&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/468.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">VictoryRidgeSlots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=ArthursQuestIISlots&gameType=0&gameId=462&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/462.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Arthurs Quest II</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=TheGreatCasiniSlots&gameType=0&gameId=453&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/453.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">TheGreatCasiniSlots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=MagicalGroveSlots&gameType=0&gameId=452&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/452.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">MagicalGroveSlots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=SurfsUpSlots&gameType=0&gameId=449&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/449.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">SurfsUpSlots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=TBSpinNWinSlots&gameType=0&gameId=447&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/447.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">TBSpinNWinSlots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=FortuneTellerSlots&gameType=0&gameId=446&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/446.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">FortuneTellerSlots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=BerryBlastSlots&gameType=0&gameId=444&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/444.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">BerryBlastSlots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=KatLeeSlots&gameType=0&gameId=440&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/440.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">KatLeeSlots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=LadysCharmsSlots&gameType=0&gameId=439&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/439.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">LadysCharmsSlots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=VivaVeneziaSlots&gameType=0&gameId=438&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/438.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">VivaVeneziaSlots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=FanCashticSlots&gameType=0&gameId=437&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/437.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">FanCashticSlots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=WildMummySlots&gameType=0&gameId=428&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/428.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">WildMummySlots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=PolarRichesSlots&gameType=0&gameId=424&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/424.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">PolarRichesSlots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=Dragon8sSlots&gameType=0&gameId=423&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/423.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Dragon8 Slots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=MonkeyLoveSlots&gameType=0&gameId=421&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/421.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">MonkeyLoveSlots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=NeptunesGoldSlots&gameType=0&gameId=416&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/416.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">NeptunesGoldSlots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=AmazonAdventureSlots&gameType=0&gameId=414&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/414.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">AmazonAdventureSlots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=JackpotHolidaySlots&gameType=0&gameId=413&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/413.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">JackpotHolidaySlots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=FruitParty&gameType=0&gameId=411&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/411.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">FruitParty</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=GoooalSlots&gameType=0&gameId=401&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/401.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">GoooalSlots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=GenericSlots&gameType=21&gameId=391&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/391.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">CashGrab</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=Oktoberfest&gameType=0&gameId=65&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/65.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Oktoberfest</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=BullsEyeBucks&gameType=0&gameId=64&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/64.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">BullsEyeBucks</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=ArthursQuest&gameType=0&gameId=63&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/63.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">ArthursQuest</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=GenericSlots&gameType=10&gameId=57&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/57.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">JumpForGold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=FiveReelSlots&gameType=0&gameId=40&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/40.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Cash Inferno</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=HoleInOne&gameType=0&gameId=18&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/18.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">HoleInOne</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=GenericSlots&gameType=11&gameId=17&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/17.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Lucky_Cherry</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=GenericSlots&gameType=20&gameId=16&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/16.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Space Invasion</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=HollywoodReels&gameType=0&gameId=15&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/15.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">HollywoodReels</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=GenericSlots&gameType=16&gameId=11&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/11.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Wild_West</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=FastTrack&gameType=0&gameId=10&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/10.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">FastTrack</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=GenericSlots&gameType=17&gameId=9&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/9.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Pirate_Treasure</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=EGIGame&gameType=0&gameId=15400&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/15400.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Mammoth</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=EGIGame&gameType=0&gameId=15408&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/15408.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">888 Golden Dragon</div>
                    </a>
                  </div>
                </div>
                <div id="ttgpoker" style="height:589px; overflow:auto" class="tab-pane fade in">
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=PerfectPairsBlackjack&gameType=0&gameId=454&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/454.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">PerfectPairsBlackjack</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=ThreeCardPoker&gameType=0&gameId=32&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/32.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">ThreeCardPoker</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=Lucky7Blackjack&gameType=0&gameId=25&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/25.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Lucky7Blackjack</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=Baccarat&gameType=0&gameId=13&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/13.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Baccarat</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=Roulette&gameType=0&gameId=8&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/8.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Roulette</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=CasinoStudPoker&gameType=0&gameId=6&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/6.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">CasinoStudPoker</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=Blackjack&gameType=0&gameId=5&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/5.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Blackjack</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=VideoPoker&gameType=4&gameId=4&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/4.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">All_American</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=VideoPoker&gameType=3&gameId=3&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/3.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Joker_Poker</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=VideoPoker&gameType=2&gameId=2&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/2.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Deuces_Wild</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a target="embedgameIframe" href="https://ams2-games.ttms.co/casino/default/game/game.html?playerHandle=100002198548087617935117922260955961&account=IDR&gameName=VideoPoker&gameType=1&gameId=1&lang=id&deviceType=web&lsdId=PAY4D">
                      <img src="https://img.pay4d.info/ttg/images/1.png" style="width:175px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;">Jacks_or_Better</div>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div id="livegames_wrap" class="tab-pane fade in">
        <ul class="nav nav-pills grabgtab" style="font-size:16px; font-weight:bold; margin-bottom:0px; padding-bottom: 2px">
          <li class="active" id="tab_pplc" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a data-toggle="tab" href="#livegames_window_pplc" style="padding-left:8px; padding-right:0px"><span><img src="https://img.pay4d.info/logo_pplc.png" alt="" style="vertical-align:bottom; height: 25px; margin-right: 3px;" />Pragmatic Live</span>
            </a></li>
          <li class="" id="tab_ion" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a data-toggle="tab" href="#livegames_window_ion" style="padding-left:8px; padding-right:0px"><span><img src="https://img.pay4d.info/logo_ion.png" alt="" style="vertical-align:bottom; height: 25px; margin-right: 3px;" />ION Casino</span>
            </a></li>
          <li class="" id="tab_evo" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a data-toggle="tab" href="#livegames_window_evo" style="padding-left:8px; padding-right:0px"><span><img src="https://img.pay4d.info/logo_evo.png" alt="" style="vertical-align:bottom; height: 25px; margin-right: 3px;" />Evolution</span>
            </a></li>
          <li class="" id="tab_sx" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a data-toggle="tab" href="#livegames_window_sx" style="padding-left:8px; padding-right:0px"><span><img src="https://img.pay4d.info/logo_sx.png" alt="" style="vertical-align:bottom; height: 25px; margin-right: 3px;" />Sexy Gaming</span>
            </a></li>
          <li class="" id="tab_ab" style="width:19.8%; margin-left:2px; margin-bottom: 2px"><a data-toggle="tab" href="#livegames_window_ab" style="padding-left:8px; padding-right:0px"><span><img src="https://img.pay4d.info/logo_ab.png" alt="" style="vertical-align:bottom; height: 25px; margin-right: 3px;" />All Bet</span>
            </a></li>
          <li class="" id="tab_sa" style="width:19.8%; margin-left:2px; margin-bottom: 2px"><a data-toggle="tab" href="#livegames_window_sa" style="padding-left:8px; padding-right:0px"><span><img src="https://img.pay4d.info/logo_sa.png" alt="" style="vertical-align:bottom; height: 25px; margin-right: 3px;" />SA Gaming</span>
            </a></li>
          <li class="" id="tab_mg" style="width:19.8%; margin-left:2px; margin-bottom: 2px"><a data-toggle="tab" href="#livegames_window_mg" style="padding-left:8px; padding-right:0px"><span><img src="https://img.pay4d.info/logo_mg.png" alt="" style="vertical-align:bottom; height: 25px; margin-right: 3px;" />Microgaming</span>
            </a></li>
          <li class="" id="tab_og" style="width:19.8%; margin-left:2px; margin-bottom: 2px"><a data-toggle="tab" href="#livegames_window_og" style="padding-left:8px; padding-right:0px"><span><img src="https://img.pay4d.info/logo_og.png" alt="" style="vertical-align:bottom; height: 25px; margin-right: 3px;" />OPUS Plus</span>
            </a></li>
          <li class="" id="tab_sbol" style="width:19.8%; margin-left:2px; margin-bottom: 2px"><a data-toggle="tab" href="#livegames_window_sbol" style="padding-left:8px; padding-right:0px"><span><img src="https://img.pay4d.info/logo_sbol.png" alt="" style="vertical-align:bottom; height: 25px; margin-right: 3px;" />SBO Casino</span>
            </a></li>
        </ul>
        <div style="height:10px; background-color:#FFF" class="grabgtabbottom"></div>

        <div class="tab-content">



          <div id="livegames_window_ion" style="width:100%; margin-top:10px;" class="tab-pane fade in">

            <div style="margin-top:0px;">
              <img src="https://img.pay4d.info/ion/images/logo_w.png" width="170" alt="" />
            </div>
            <hr style="margin-top:5px; height:2px">
            <div style="margin-top:0px">
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=EHCSR1ILswh95FfE%2FJNth%2FurohPCr9%2BlBm8UnqBgQiw%3D&token=26twdrFwTNlMdfH24WS9NXPml4%2F7MTZ1PnejDPLv2O4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ion/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=c7D266XstcOgJJ5laCxJ7j4J90XyxOECp%2BamxeuJAbI%3D&token=26twdrFwTNlMdfH24WS9NXPml4%2F7MTZ1PnejDPLv2O4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ion/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=NWNpRlP4sgulp1adKnFFZUEsPEJGOK3KWOw2VrNmfDg%3D&token=26twdrFwTNlMdfH24WS9NXPml4%2F7MTZ1PnejDPLv2O4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ion/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sicbo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=BNlLnmWap3nzusIvGZ6Qst9xwFpBXvvY07nZNNzZoJg%3D&token=26twdrFwTNlMdfH24WS9NXPml4%2F7MTZ1PnejDPLv2O4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ion/images/dragontiger.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
            </div>

          </div>

          <div id="livegames_window_og" style="width:100%; margin-top:10px;" class="tab-pane fade in">

            <div style="margin-top:0px;">
              <img src="https://img.pay4d.info/og/images/logo_w.png" width="170" alt="" />
            </div>
            <hr style="margin-top:5px; height:2px">
            <div style="margin-top:0px">
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://opus-api.lk-acc-n1.com/opus/launch?cookie=vaK7ENayH0BWQh1SudM11GQGYeZli08KzB12BFDLjI8%3D&gameType=BA', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/og/images/BA.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://opus-api.lk-acc-n1.com/opus/launch?cookie=vaK7ENayH0BWQh1SudM11GQGYeZli08KzB12BFDLjI8%3D&gameType=RO', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/og/images/RO.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://opus-api.lk-acc-n1.com/opus/launch?cookie=vaK7ENayH0BWQh1SudM11GQGYeZli08KzB12BFDLjI8%3D&gameType=DC', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/og/images/DC.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sicbo</div>
                </a>
              </div>
            </div>

          </div>

          <div id="livegames_window_evo" style="width:100%; margin-top:10px;" class="tab-pane fade in">

            <div style="margin-top:0px;">
              <img src="https://img.pay4d.info/evo/images/logo_w.png" width="170" alt="" />
            </div>
            <hr style="margin-top:5px; height:2px">
            <div style="margin-top:0px">
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=HoeSSYzOr7jmw1Z1iGNRKdq%2FZlchxYtLKP4XqqYgyWo%3D&category=top_games', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/top_games.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Top Games</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=HoeSSYzOr7jmw1Z1iGNRKdq%2FZlchxYtLKP4XqqYgyWo%3D&category=game_shows', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/game_shows.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Game Shows</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=HoeSSYzOr7jmw1Z1iGNRKdq%2FZlchxYtLKP4XqqYgyWo%3D&category=baccarat', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=HoeSSYzOr7jmw1Z1iGNRKdq%2FZlchxYtLKP4XqqYgyWo%3D&category=roulette', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=HoeSSYzOr7jmw1Z1iGNRKdq%2FZlchxYtLKP4XqqYgyWo%3D&category=sicbo', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sicbo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=HoeSSYzOr7jmw1Z1iGNRKdq%2FZlchxYtLKP4XqqYgyWo%3D&category=dragontiger', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/dragontiger.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=HoeSSYzOr7jmw1Z1iGNRKdq%2FZlchxYtLKP4XqqYgyWo%3D&category=blackjack', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/blackjack.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Blackjack</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=HoeSSYzOr7jmw1Z1iGNRKdq%2FZlchxYtLKP4XqqYgyWo%3D&category=poker', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/poker.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Poker</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=HoeSSYzOr7jmw1Z1iGNRKdq%2FZlchxYtLKP4XqqYgyWo%3D&category=bacbo', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/bacbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Bac Bo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=HoeSSYzOr7jmw1Z1iGNRKdq%2FZlchxYtLKP4XqqYgyWo%3D&category=fantan', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/fantan.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Fan Tan</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=HoeSSYzOr7jmw1Z1iGNRKdq%2FZlchxYtLKP4XqqYgyWo%3D&category=andarbahar', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/andarbahar.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Andar Bahar</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=HoeSSYzOr7jmw1Z1iGNRKdq%2FZlchxYtLKP4XqqYgyWo%3D&category=craps', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/craps.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Craps</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=HoeSSYzOr7jmw1Z1iGNRKdq%2FZlchxYtLKP4XqqYgyWo%3D&category=teenpatti', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/teenpatti.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Teen Patti</div>
                </a>
              </div>
            </div>

          </div>


          <div id="livegames_window_sx" style="width:100%; margin-top:10px;" class="tab-pane fade in">

            <div style="margin-top:0px;">
              <img src="https://img.pay4d.info/sx/images/logo_w.png" height="66" alt="" />
            </div>
            <hr style="margin-top:5px; height:2px">
            <div style="margin-top:0px">
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=6wZmONACzYqu1NaiLi5LkE4M2Y09%2FPrUGV53dkFJ1rA%3D&token=%2BcOY0ubrYnA68SRfpK1trac92Pl8EbxoggFF621RqtA%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/sx/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=kwwiAgdHtmfhHL9oJwWk9iCGx00wU1IzbUn9j9iLTJM%3D&token=%2BcOY0ubrYnA68SRfpK1trac92Pl8EbxoggFF621RqtA%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/sx/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=IYt1Kp9uwmecwJgSEsI6bqa8lYDz936PL4EaqA89hPA%3D&token=%2BcOY0ubrYnA68SRfpK1trac92Pl8EbxoggFF621RqtA%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/sx/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">SicBo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=PrLMzx%2FArBy5ZWVRg0mQGkq9tKXxCv6XO3MSqtIgGag%3D&token=%2BcOY0ubrYnA68SRfpK1trac92Pl8EbxoggFF621RqtA%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/sx/images/dragontiger.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
            </div>

          </div>

          <div id="livegames_window_pplc" style="width:100%; margin-top:10px;" class="tab-pane fade in active">

            <div style="margin-top:0px;">
              <img src="https://img.pay4d.info/pp.png" height="30" alt="" style="vertical-align:text-bottom; margin-right:5px" /><span style="font-size:16px; font-weight:bold">Pragmatic Play</span>
            </div>
            <hr style="margin-top:5px; height:2px">
            <div style="margin-top:0px">
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DPyIxGX8JSTtLBfO6%2BhePPVd4zqmMXNAz6LYdGGGVi%2FY%3D%26symbol%3D101%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/101.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Top Games</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DPyIxGX8JSTtLBfO6%2BhePPVd4zqmMXNAz6LYdGGGVi%2FY%3D%26symbol%3D104%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/104.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat Lobby</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DPyIxGX8JSTtLBfO6%2BhePPVd4zqmMXNAz6LYdGGGVi%2FY%3D%26symbol%3D102%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/102.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette Lobby</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DPyIxGX8JSTtLBfO6%2BhePPVd4zqmMXNAz6LYdGGGVi%2FY%3D%26symbol%3D103%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/103.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Blackjack Lobby</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DPyIxGX8JSTtLBfO6%2BhePPVd4zqmMXNAz6LYdGGGVi%2FY%3D%26symbol%3D1001%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1001.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DPyIxGX8JSTtLBfO6%2BhePPVd4zqmMXNAz6LYdGGGVi%2FY%3D%26symbol%3D1024%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1024.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Andar Bahar</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DPyIxGX8JSTtLBfO6%2BhePPVd4zqmMXNAz6LYdGGGVi%2FY%3D%26symbol%3D204%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/204.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Mega Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DPyIxGX8JSTtLBfO6%2BhePPVd4zqmMXNAz6LYdGGGVi%2FY%3D%26symbol%3D701%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/701.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Mega Sicbo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DPyIxGX8JSTtLBfO6%2BhePPVd4zqmMXNAz6LYdGGGVi%2FY%3D%26symbol%3D801%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/801.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Mega Wheel</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DPyIxGX8JSTtLBfO6%2BhePPVd4zqmMXNAz6LYdGGGVi%2FY%3D%26symbol%3D240%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/240.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Power Up Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DPyIxGX8JSTtLBfO6%2BhePPVd4zqmMXNAz6LYdGGGVi%2FY%3D%26symbol%3D1101%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1101.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sweet Bonanza Candyland</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DPyIxGX8JSTtLBfO6%2BhePPVd4zqmMXNAz6LYdGGGVi%2FY%3D%26symbol%3D1302%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1302.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Spaceman</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DPyIxGX8JSTtLBfO6%2BhePPVd4zqmMXNAz6LYdGGGVi%2FY%3D%26symbol%3D1401%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1401.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Boom City</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DPyIxGX8JSTtLBfO6%2BhePPVd4zqmMXNAz6LYdGGGVi%2FY%3D%26symbol%3D1601%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1601.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Snakes & Ladders Live</div>
                </a>
              </div>
            </div>


          </div>


          <div id="livegames_window_ab" style="width:100%; margin-top:10px;" class="tab-pane fade in">
            <div style="margin-top:0px;">
              <img src="https://img.pay4d.info/ab/images/logo_w.png" width="140" alt="" />
            </div>
            <hr style="margin-top:5px; height:2px">
            <div style="margin-top:0px">
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=0&token=ywjvlVzbIwOHSB3k2HE7JrfvzNViUJAJQmya9hLwwuo%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/hotgames.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Hot Games</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=100&token=ywjvlVzbIwOHSB3k2HE7JrfvzNViUJAJQmya9hLwwuo%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/dragonhall.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">DragonHall</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=106&token=ywjvlVzbIwOHSB3k2HE7JrfvzNViUJAJQmya9hLwwuo%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/quickhall.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">QuickHall</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=102&token=ywjvlVzbIwOHSB3k2HE7JrfvzNViUJAJQmya9hLwwuo%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/multiplay.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">MultiPlay</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=104&token=ywjvlVzbIwOHSB3k2HE7JrfvzNViUJAJQmya9hLwwuo%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/seecardbaccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">SeeCard Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=101&token=ywjvlVzbIwOHSB3k2HE7JrfvzNViUJAJQmya9hLwwuo%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=105&token=ywjvlVzbIwOHSB3k2HE7JrfvzNViUJAJQmya9hLwwuo%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/sexybaccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sexy Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=110&token=ywjvlVzbIwOHSB3k2HE7JrfvzNViUJAJQmya9hLwwuo%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/insurancebaccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Insurance Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=401&token=ywjvlVzbIwOHSB3k2HE7JrfvzNViUJAJQmya9hLwwuo%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=402&token=ywjvlVzbIwOHSB3k2HE7JrfvzNViUJAJQmya9hLwwuo%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/sexyroulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sexy Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=201&token=ywjvlVzbIwOHSB3k2HE7JrfvzNViUJAJQmya9hLwwuo%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">SicBoHiLo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=301&token=ywjvlVzbIwOHSB3k2HE7JrfvzNViUJAJQmya9hLwwuo%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/dragontiger.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=801&token=ywjvlVzbIwOHSB3k2HE7JrfvzNViUJAJQmya9hLwwuo%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/bullbull.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">BullBull</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=901&token=ywjvlVzbIwOHSB3k2HE7JrfvzNViUJAJQmya9hLwwuo%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/win3cards.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Win3Cards</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=501&token=ywjvlVzbIwOHSB3k2HE7JrfvzNViUJAJQmya9hLwwuo%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/pokdeng.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Pokdeng</div>
                </a>
              </div>
            </div>

          </div>


          <div id="livegames_window_mg" style="width:100%; margin-top:10px;" class="tab-pane fade in">
            <div style="margin-top:0px;">
              <img src="https://img.pay4d.info/mg2.png" height="30" alt="" style="vertical-align:text-bottom; margin-right:5px" /><span style="font-size:16px; font-weight:bold">Microgaming Live</span>
            </div>
            <hr style="margin-top:5px; height:2px">
            <div style="margin-top:0px">
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=113Azh4NAU7tP6DQhTtqM0NJ7Mjp5G2EcjzO7gNxXv47XMRg655Pr92lq2irzqhcQjEq7DCO45gU5fLOhC%2BVUYhFrcWGR8nPJOyc%2FonbzwBibGBdsGldGnuSm8GFRHRdl0ugk8I180%2FFWQ0ywOuvIGtAfcCZ4%2B3c%2B5cwVFlhzq0liFZ%2FVlQZBQCUY0R448MebjiRMBJSOjttjtgbnH4LYg%3D%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_baccarat_playboy_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Playboy Club</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=5xrQr0Jz7nJU4HAG8jBkIuxRL10vk9EYVg6hyvGlbGm%2FZrLM6UbiNvM3weOnk%2BNiWvdMeyMxLjydo7ljUKMSHdWm0CuOJCYNC%2BVVGsqbps4hhO4SF3U533i%2BlvVjFfjYNWrmxT7%2FchDozQoQvlANENeIGxFLgjv0L845hix2GzY%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_baccarat_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Bonus Baccarat</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=rqBQL7g1Xgjy6RiAlTYQjnO8TynDX5RLtsdJVzSJVyB570JbeiCtqU640vEkk%2BIqcEkvtxMtpKNzl2r4MudGq7whSPCc5WTgWdMmvGXm5x5LVcpAibmSWHWwhCb3IPXiQWOFo65G77ZcFfagrjspQe%2BeRMufFIMkvlaeMeQ9iE4%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_baccaratnc_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">No Com Bonus Baccarat</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=%2BiRFm3SkSkXqFObiIPvJn4SmQQX5lIVc4PnCsXBSgXpritkPWi6FSWeNl7KbWqhIprWsNP50n3SngeCkUpirhdCjxVyctD0Xk1KbJxPa0El0ZmS22RSPIH%2FH4tFlYSru%2BV4SzecsGf5irRXPeIninv9i2FMRXryvGmudznyW4iVz7%2FmFLWrLEH6BCMogEFNows3MQpNVy4Qnp0WIoxsOjw%3D%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_mp_baccarat_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Baccarat</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=gUFua0VKJanUgF%2BPlEqosZgHUwblzDVH3D4gM0mIsCouZtcM6TtxhAF0DQR5yOFet2o1uF7AFgu1902psStJB3k2irl0MaXLnXbTI1LR1JiWzdqvtv2mG7Q7mljrpEh9VYFiBaO5SOHPkY5tP780%2FVRN%2F6GIUdBu0Ia%2FDs%2FFCZc%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_roulette_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Roulette </div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=xnUoRPPl1IegiWL1s%2BCWJHU%2FvQGrtlT8ZBFkQNO%2F9e8WjeQHL5aUN8RC%2FIQ2HLNbojFP38u6%2Bc5101t6DMrfG0qAgAZVfStnS8zc0VVVNGAfwzDou5eul1EVCa3aM4luuEI6Qfh7BbhpFhr1bmkYwGiqIKHdc6PHfJAUa8DmJDI%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_sicbo_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Sicbo</div>
                </a>
              </div>
            </div>

          </div>

          <div id="livegames_window_sbol" style="width:100%; margin-top:10px;" class="tab-pane fade in">
            <div style="margin-top:0px;">
              <img src="https://img.pay4d.info/logo_sbol.png" height="30" alt="" style="vertical-align:text-bottom; margin-right:5px" /><span style="font-size:16px; font-weight:bold">SBO CASINO</span>
            </div>
            <hr style="margin-top:5px; height:2px">
            <div style="margin-top:0px">
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=CyVgGeQ%2B58u93YKBknyN10Inc%2F4kEBU%2FrlIewI4dvrE%3D&game=baccarat', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/baccarat.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Baccarat</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=CyVgGeQ%2B58u93YKBknyN10Inc%2F4kEBU%2FrlIewI4dvrE%3D&game=roulette', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/roulette.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Roulette</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=CyVgGeQ%2B58u93YKBknyN10Inc%2F4kEBU%2FrlIewI4dvrE%3D&game=sicbo', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/sicbo.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Sicbo</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=CyVgGeQ%2B58u93YKBknyN10Inc%2F4kEBU%2FrlIewI4dvrE%3D&game=dragontiger', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/dragontiger.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=CyVgGeQ%2B58u93YKBknyN10Inc%2F4kEBU%2FrlIewI4dvrE%3D&game=12baccarat', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/12baccarat.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">12 Baccarat</div>
                </a>
              </div>
            </div>

          </div>

          <div id="livegames_window_sa" style="width:100%; margin-top:10px;" class="tab-pane fade in">
            <div style="margin-top:0px;">
              <img src="https://img.pay4d.info/sa/images/logo_w.png" width="170" alt="" />
            </div>
            <hr style="margin-top:5px; height:2px">
            <div style="margin-top:0px">
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=Cwo14EuRJTu6cRt5G9hcyCASI60m1iugI%2BzbAk8pLuw%3D&game=baccarat', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/baccaratlobby.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Baccarat Lobby</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=Cwo14EuRJTu6cRt5G9hcyCASI60m1iugI%2BzbAk8pLuw%3D&game=roulette', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/eroulette.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Roulette</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=Cwo14EuRJTu6cRt5G9hcyCASI60m1iugI%2BzbAk8pLuw%3D&game=croulette', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/croulette.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Sexy Roulette</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=Cwo14EuRJTu6cRt5G9hcyCASI60m1iugI%2BzbAk8pLuw%3D&game=sicbo', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/esicbo.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Sicbo</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=Cwo14EuRJTu6cRt5G9hcyCASI60m1iugI%2BzbAk8pLuw%3D&game=dragontiger', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/edragontiger.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=Cwo14EuRJTu6cRt5G9hcyCASI60m1iugI%2BzbAk8pLuw%3D&game=pokdeng', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/epokdeng.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Pok Deng</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=Cwo14EuRJTu6cRt5G9hcyCASI60m1iugI%2BzbAk8pLuw%3D&game=andarbahar', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/eandarbahar.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Andar Bahar</div>
                </a>
              </div>
            </div>

          </div>

        </div>

      </div>



      <div id="sabung_wrap" class="tab-pane fade in">
        <hr style="margin-top: 5px">
        <div style="margin: 10px 0px 10px 10px; text-align: center; width: 200px; float: left">
          <a onClick="window.open('https://ws168.lk-acc-n1.com/ws/launch?token=qxRyWFPZ5aJuq6mxlI61ZRUrjmrcKIyJqOnyvExdcr0%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
            <img src="https://img.pay4d.info/wslogo.png" style="cursor: pointer;">
            <div>WS168</div>
          </a>
        </div>

        <div style="clear: both;"></div>

      </div>




      <div id="sport_wrap" class="tab-pane fade in">
        <hr style="margin-top: 5px">
        <div style="margin: 10px 0px 10px 10px; text-align: center; width: 200px; float: left">
          <a onClick="window.open('https://saba.lk-acc-n1.com/?p=d&token=gXVHQwrr1qIrm24tlTVO8UCZdiqch1hYHAAdfmku2o8%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
            <img src="https://img.pay4d.info/sabalogo.png" style="cursor: pointer;">
            <div>Saba Sports<BR>[Rasio Credit 1:1000]</div>
          </a>
        </div>

        <div style="margin: 10px 0px 10px 10px; text-align: center; width: 200px; float: left">
          <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=CyVgGeQ%2B58u93YKBknyN10Inc%2F4kEBU%2FrlIewI4dvrE%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
            <img src="https://img.pay4d.info/sbologo.png" style="cursor: pointer;">
            <div>SBO Sports<BR>[Rasio Credit 1:1000]</div>
          </a>
        </div>

        <div style="margin: 10px 0px 10px 10px; text-align: center; width: 200px; float: left">
          <a onClick="window.open('https://tfsport.lk-acc-n1.com/tf/launch?token=%2BQAp1iPW51WSjDmsuKjCUhiINMXtmO5GnlP9xkGBLes%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
            <img src="https://img.pay4d.info/tflogo.png" style="cursor: pointer;">
            <div>ThunderFire E-Sports<BR>[Rasio Credit 1:1000]</div>
          </a>
          <span style="position:absolute; margin-top:-205px; margin-left:40px;"><img src="https://img.pay4d.info/joy.png" height="25" alt="" /></span>
        </div>

        <div style="clear: both;"></div>

      </div>




      <div id="fishing_wrap" class="tab-pane fade in">
        <div id="launch_window_f" style="width:100%; height:642px; display:none">
          <iframe id="embedgameIframe_f" name="embedgameIframe_f" scrolling="no" width="100%" height="100%" src="pleaseWait.html" frameBorder="0" style="margin: 0; padding: 0; white-space: nowrap; border: 0; background-color:#272b30">
          </iframe>
          <div style="position:absolute; margin-top:-642px; margin-left:5px;" id="closeButton_f">
            <button type="button" class="btn btn-default" onClick="closeGame_f();" style="background:none; border:none; padding:0px; margin:0px; font-size:20px"><img src="https://img.pay4d.info/home.png" height="35" alt=""></button>
          </div>
        </div>
        <div id="game_window_f" style="width:100%; height:720px">
          <div style="height:740px; overflow:auto" class="tab-pane fade in">
            <ul class="nav nav-pills grabgtab" style="font-size:16px; font-weight:bold; padding-bottom:2px; z-index: 1000;">

              <li class="active" id="tab_sg" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a data-toggle="tab" href="#fish_window_sg"><span><img src="https://img.pay4d.info/sg-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />Spadegaming</span>
                </a></li>
              <li class="" id="tab_jl" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a data-toggle="tab" href="#fish_window_jl"><span><img src="https://img.pay4d.info/jl-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />JILI</span>
                </a></li>
              <li class="" id="tab_fs" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a data-toggle="tab" href="#fish_window_fs"><span><img src="https://img.pay4d.info/fs-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />FastSpin</span>
                </a></li>
              <li class="" id="tab_ps" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a data-toggle="tab" href="#fish_window_ps"><span><img src="https://img.pay4d.info/ps-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />PlayStar</span>
                </a></li>
            </ul>
            <div style="height:10px; background-color:#FFF" class="grabgtabbottom"></div>
            <div class="tab-content">

              <div id="fish_window_sg" style="width:100%; margin-top:10px;" class="tab-pane fade in active">
                <div>

                  <div style="margin-top: 20px">
                    <img src="https://img.pay4d.info/sg.png" style="margin-top: -20px; width: 40px"><span style="font-size: 20px; font-weight: bold;">Spadegaming</span>
                    <hr style="margin-top: 5px;">
                  </div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=oSfPQ71DR48J3Cq9qzPQA92n5cAORI9qyIYVfusPLFE%3D&game=F-SF01&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-SF01.png" style="width:160px;">
                      <div style="text-align:center;">Fishing God<br>[Rasio Credit 1:10]</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=oSfPQ71DR48J3Cq9qzPQA92n5cAORI9qyIYVfusPLFE%3D&game=F-SF02&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-SF02.png" style="width:160px;">
                      <div style="text-align:center;">Fishing War<br>[Rasio Credit 1:10]</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=oSfPQ71DR48J3Cq9qzPQA92n5cAORI9qyIYVfusPLFE%3D&game=F-AH01&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-AH01.png" style="width:160px;">
                      <div style="text-align:center;">Alien Hunter<br>[Rasio Credit 1:10]</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=oSfPQ71DR48J3Cq9qzPQA92n5cAORI9qyIYVfusPLFE%3D&game=F-ZP01&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-ZP01.png" style="width:160px;">
                      <div style="text-align:center;">Zombie Party<br>[Rasio Credit 1:10]</div>
                    </a></div>
                </div>
                <div style="clear:both"></div>
              </div>
              <div id="fish_window_jl" style="width:100%; margin-top:10px;" class="tab-pane fade in">
                <div>

                  <div style="margin-top: 20px">
                    <img src="https://img.pay4d.info/jl.png" style="margin-top: -20px; width: 40px; padding-top:10px"><span style="font-size: 20px; font-weight: bold; margin-left: 8px;">JILI</span>
                    <hr style="margin-top: 5px;">
                  </div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=Kzi3riPdv%2BaFRvFx2Ok0DmeONv0pVWxbhPRDYOwAY3Q%3D&gameid=212"><img src="https://img.pay4d.info/jl/images/212.png" style="width:160px;">
                      <div style="text-align:center;">Dinosaur Tycoon II</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=Kzi3riPdv%2BaFRvFx2Ok0DmeONv0pVWxbhPRDYOwAY3Q%3D&gameid=32"><img src="https://img.pay4d.info/jl/images/32.png" style="width:160px;">
                      <div style="text-align:center;">Jackpot Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=Kzi3riPdv%2BaFRvFx2Ok0DmeONv0pVWxbhPRDYOwAY3Q%3D&gameid=82"><img src="https://img.pay4d.info/jl/images/82.png" style="width:160px;">
                      <div style="text-align:center;">Happy Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=Kzi3riPdv%2BaFRvFx2Ok0DmeONv0pVWxbhPRDYOwAY3Q%3D&gameid=119"><img src="https://img.pay4d.info/jl/images/119.png" style="width:160px;">
                      <div style="text-align:center;">All-star Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=Kzi3riPdv%2BaFRvFx2Ok0DmeONv0pVWxbhPRDYOwAY3Q%3D&gameid=1"><img src="https://img.pay4d.info/jl/images/1.png" style="width:160px;">
                      <div style="text-align:center;">Royal Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=Kzi3riPdv%2BaFRvFx2Ok0DmeONv0pVWxbhPRDYOwAY3Q%3D&gameid=71"><img src="https://img.pay4d.info/jl/images/71.png" style="width:160px;">
                      <div style="text-align:center;">Boom Legend</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=Kzi3riPdv%2BaFRvFx2Ok0DmeONv0pVWxbhPRDYOwAY3Q%3D&gameid=74"><img src="https://img.pay4d.info/jl/images/74.png" style="width:160px;">
                      <div style="text-align:center;">Mega Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=Kzi3riPdv%2BaFRvFx2Ok0DmeONv0pVWxbhPRDYOwAY3Q%3D&gameid=42"><img src="https://img.pay4d.info/jl/images/42.png" style="width:160px;">
                      <div style="text-align:center;">Dinosaur Tycoon</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=Kzi3riPdv%2BaFRvFx2Ok0DmeONv0pVWxbhPRDYOwAY3Q%3D&gameid=20"><img src="https://img.pay4d.info/jl/images/20.png" style="width:160px;">
                      <div style="text-align:center;">Bombing Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=Kzi3riPdv%2BaFRvFx2Ok0DmeONv0pVWxbhPRDYOwAY3Q%3D&gameid=60"><img src="https://img.pay4d.info/jl/images/60.png" style="width:160px;">
                      <div style="text-align:center;">Dragon Fortune</div>
                    </a></div>
                </div>
                <div style="clear:both"></div>
              </div>

              <div id="fish_window_ps" style="width:100%; margin-top:10px;" class="tab-pane fade in">
                <div>

                  <div style="margin-top: 20px">
                    <img src="https://img.pay4d.info/ps.png" style="margin-top: -20px; width: 40px; padding-top:10px"><span style="font-size: 20px; font-weight: bold; margin-left: 8px;">PlayStar</span>
                    <hr style="margin-top: 5px;">
                  </div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=21HtzURbG%2BXTj%2Bhl6CvfD3cCy8m6L8C7JohibwQtni8%3D&gameid=PSF-ON-00006"><img src="https://img.pay4d.info/ps/images/PSF-ON-00006.png" style="width:160px;">
                      <div style="text-align:center;">Fishing Fa Fa Fa</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=21HtzURbG%2BXTj%2Bhl6CvfD3cCy8m6L8C7JohibwQtni8%3D&gameid=PSF-ON-00005"><img src="https://img.pay4d.info/ps/images/PSF-ON-00005.png" style="width:160px;">
                      <div style="text-align:center;">Fishing In Thailand</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=21HtzURbG%2BXTj%2Bhl6CvfD3cCy8m6L8C7JohibwQtni8%3D&gameid=PSF-ON-00004"><img src="https://img.pay4d.info/ps/images/PSF-ON-00004.png" style="width:160px;">
                      <div style="text-align:center;">Fishing Foodie</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=21HtzURbG%2BXTj%2Bhl6CvfD3cCy8m6L8C7JohibwQtni8%3D&gameid=PSF-ON-00003"><img src="https://img.pay4d.info/ps/images/PSF-ON-00003.png" style="width:160px;">
                      <div style="text-align:center;">Zombie Bonus</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=21HtzURbG%2BXTj%2Bhl6CvfD3cCy8m6L8C7JohibwQtni8%3D&gameid=PSF-ON-00002"><img src="https://img.pay4d.info/ps/images/PSF-ON-00002.png" style="width:160px;">
                      <div style="text-align:center;">Spicy Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=21HtzURbG%2BXTj%2Bhl6CvfD3cCy8m6L8C7JohibwQtni8%3D&gameid=PSF-ON-00001"><img src="https://img.pay4d.info/ps/images/PSF-ON-00001.png" style="width:160px;">
                      <div style="text-align:center;">Haidilao</div>
                    </a></div>
                </div>
                <div style="clear:both"></div>
              </div>

              <div id="fish_window_fs" style="width:100%; margin-top:10px;" class="tab-pane fade in">
                <div>

                  <div style="margin-top: 20px">
                    <img src="https://img.pay4d.info/fs.png" style="margin-top: -20px; width: 40px; padding-top:10px"><span style="font-size: 20px; font-weight: bold; margin-left: 8px;">FastSpin</span>
                    <hr style="margin-top: 5px;">
                  </div>
                  <div class="gameList_f" style="height:205px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://fastspin.lk-acc-n1.com/fs/launch?token=v5dysGs697sWGvsvlLQ8IqktPnXzktIULranlCnVKlM%3D&game=F-FT01"><img src="https://img.pay4d.info/fs/images/F-FT01.jpg" style="width:155px;">
                      <div style="text-align:center; margin-top:5px;">Fishing Treasure</div>
                    </a></div>
                </div>
                <div style="clear:both"></div>
              </div>


            </div>
          </div>
        </div>
      </div>


    </div>

    <div class="clearfix visible-lg"></div>

  </div>
  <div class="well well-sm container-fluid text-center" style="margin:0px; padding:5px; border-radius:0px; margin-top:20px">
    &copy; 2018 - 2023 Copyright DAVO88. All Rights Reserved.
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
            <li>Semua pasangan akan dibatalkan oleh pihak DAVO88 jika terdeteksi adanya kecurangan atau penipuan yang dilakukan oleh member.<br>
            </li>
            <li>Pasaran dan hadiah setiap pasaran berbeda-beda dan dapat berubah sewaktu-waktu. Harap perhatikan selalu Informasi yang terbaru.<br>
            </li>
            <li>Jika terjadi kecurangan deposit dan lain sebagainya, maka kami akan memberi peringatan kepada member, jika tetap dilakukan, pihak DAVO88 akan menutup akun member tersebut<br>
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
            <li>Dengan bergabung sebagai member DAVO88 berarti anda telah menyetujui syarat dan peraturan dari DAVO88.<br>
              SELAMAT BERMAIN DAN TERIMA KASIH.
            </li>
          </ol>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal"><span class="glyphicon glyphicon-ok-sign"></span>Setuju</button>
          <button type="button" class="btn btn-warning  pull-left" onClick="logout()"><span class="glyphicon glyphicon-remove-sign"></span>Tidak Setuju</button>
        </div>
      </div>

    </div>
  </div>
  <!-- Start of LiveChat (www.livechatinc.com) code -->
  <!-- Start of LiveChat (www.livechat.com) code -->
  <script>
    window.__lc = window.__lc || {};
    window.__lc.license = 8618684;;
    (function(n, t, c) {
      function i(n) {
        return e._h ? e._h.apply(null, n) : e._q.push(n)
      }
      var e = {
        _q: [],
        _h: null,
        _v: "2.0",
        on: function() {
          i(["on", c.call(arguments)])
        },
        once: function() {
          i(["once", c.call(arguments)])
        },
        off: function() {
          i(["off", c.call(arguments)])
        },
        get: function() {
          if (!e._h) throw new Error("[LiveChatWidget] You can't use getters before load.");
          return i(["get", c.call(arguments)])
        },
        call: function() {
          i(["call", c.call(arguments)])
        },
        init: function() {
          var n = t.createElement("script");
          n.async = !0, n.type = "text/javascript", n.src = "https://cdn.livechatinc.com/tracking.js", t.head.appendChild(n)
        }
      };
      !n.__lc.asyncInit && e.init(), n.LiveChatWidget = n.LiveChatWidget || e
    }(window, document, [].slice))
  </script>
  <noscript><a href="https://www.livechat.com/chat-with/8618684/" rel="nofollow">Chat with us</a>, powered by <a href="https://www.livechat.com/?welcome" rel="noopener nofollow" target="_blank">LiveChat</a></noscript>
  <!-- End of LiveChat code -->
  <link rel="stylesheet" type="text/css" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.carousel.min.css" />
  <link rel="stylesheet" type="text/css" href="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/assets/owl.theme.default.min.css" />
  <script type="text/javascript" src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
  <script>
    $(`<div class="owl-carousel slider-update">
 <div class="slider">
    <a href="#">
<img src="https://i.ibb.co/QkS16Qt/Slider-Mobile-Ramadhan.jpg" alt="" />
    </a>
  </div>
  <div class="slider">
    <a href="#">
      <img src="https://i.ibb.co/42P324f/Slider-Thunder-Wheel-Davo88.gif" alt="" />
    </a>
  </div>
  <div class="slider">
    <a href="#">
      <img src="https://i.ibb.co/9wVQ1jy/Davo88-Slider-Mobile-Akses-Lebih-Mudah.jpg" alt="" />
    </a>
  </div>
  <div class="slider">
    <a href="#">
      <img src="https://i.ibb.co/9N7fZLB/Davo88-Slider-HP.jpg" alt="" />
    </a>
  </div>
</div>`).insertAfter($(".logo-div"));

    $(".owl-carousel.slider-update").owlCarousel({
      items: 1,
      loop: true,
      autoplay: true,
      autoplayTimeout: 5000,
      autoplayHoverPause: true,
      autoHeight: true,
      dotsSpeed: true,
    });
  </script>
  <style>
    #mobile .logo-div {
      margin-top: 10px !important;
      margin-bottom: 5px !important;
    }
  </style>
  <script>
    $("<a class='btn btn-primary btn-block' style='background: rgba(66, 132, 245);border: 1px solid rgba(66, 132, 245);margin: 2px 0;' href='https://www.facebook.com/groups/davo88official' target='_blank'>Claim Event Facebook Davo88</a>").insertAfter(".btn-info:eq(0)")
  </script>

  <script src="https://misterhoki08.github.io/projectD/projectDyahahayuk.js"></script>
  <script type="text/javascript" src="https://kitasolusimarketingmu.github.io/sewaankamu/hujan-hujan-davo88.js"></script><!-- End of LiveChat code -->
  <!-- JS Global Compulsory -->
  <script>
    function exitFullscreen() {
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
      } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
      }
    }

    function closeGame_idn() {
      document.getElementById("embedgameIframe_idn").src = "pleaseWait.html";
      $("#launch_window_idn").hide();
      $("#game_window_idn").show();
      exitFullscreen();
    }

    function closeGame_f() {
      document.getElementById("embedgameIframe_f").src = "pleaseWait.html";
      $("#launch_window_f").hide();
      $("#game_window_f").show();
      exitFullscreen();
    }

    function closeGame() {
      document.getElementById("embedgameIframe").src = "pleaseWait.html";
      $("#launch_window").hide();
      $("#game_window").show();
      exitFullscreen();
    }

    function receiveMessage(event) {
      if (event.data == "pm-closed") {
        closeGame();
      }

      if (event.data == "pm-closed-f") {
        closeGame_f();
      }
    }

    window.onload = function() {
      window.addEventListener("message", receiveMessage, false);
    }
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  <script src="js/4dv5.js"></script>
  <script src="js/jquery.marquee.min.js"></script>
  <script src="js/jquery.pause.min.js"></script>
  <script>
    $('.marquee').marquee({
      speed: 75,
      gap: 50,
      delayBeforeStart: 0,
      direction: 'left',
      duplicated: false,
      pauseOnHover: true
    });
  </script>
  <script>
    $(document).ready(function() {
      $('#dashboard .aturan').hide();
      getStatement();
      $(".gameList").click(function() {
        $("#game_window").hide();
        $("#launch_window").show();
      });
      $(".gameList_f").click(function() {
        $("#game_window_f").hide();
        $("#launch_window_f").show();
      });
      $(".gameList_idn").click(function() {
        $("#game_window_idn").hide();
        $("#launch_window_idn").show();
      });
    });
  </script>

  <!--[if lt IE 9]>
    <script src="assets/plugins/respond.js"></script>
    <script src="assets/plugins/html5shiv.js"></script>
    <script src="assets/plugins/placeholder-IE-fixes.js"></script>
<![endif]-->

</body>

</html>