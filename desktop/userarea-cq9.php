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
          <li><a href="javascript:toMyAccount();"><span class="glyphicon glyphicon-user"></span> <strong>dimasak</strong></a></li>
          <li><a href="javascript:logout();"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
          <li><a><span class="glyphicon glyphicon-time"></span><span id="timenow"></span></a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">

    <div class="well well-sm" style="margin-bottom:15px; padding-top: 5px; padding-bottom:2px;">
      <marquee><span id="broadcast" style="white-space:nowrap"></span></marquee>
    </div>
    <div class="col-md-2" style="padding:0px; margin:0px;">
      <div id="logo" style="margin-top:30px; margin-left:3px"><img src="images/logo.png" width="183" alt="" /></div>
    </div>
    <div class="col-md-10" style="padding:0px; margin:0px;">

      <div class="col-md-4" style="padding:0px; margin:0px; padding-left:0px;">
        <div class="panel panel-danger">
          <div class="panel-heading" style="padding-top:5px; padding-bottom:5px">User Data</div>
          <div class="panel-body" style="padding-top:3px;height:65px;overflow:hidden; font-size:10px"><input type="hidden" class="userstatus" value="1"><input type="hidden" class="credit" name="credit" value=""><input type="hidden" id="max_lose" value=""><input type="hidden" id="min_deposit" value=""><input type="hidden" id="min_withdraw" value="">
            <div>Balance: Rp <strong><span class="userCredit" style="font-size:14px; color:#D00"></span></strong></div>
            <div>Last Login: 07 Jul 2023 08:41:20<br>Last IP: 36.71.85.27</div>
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
            var timeSKA = 32104;
            setInterval(function() {
              timeSKA--;
              if (timeSKA < 3600) $('#pidSKA').text(secondtominute(timeSKA));
            }, 1000);
          </script>
          <li style="font-size:14px; width:228px; font-weight:bold; margin-left:0px; opacity:1.0;"><a data-toggle="pill" href="#sakatoto_wrap"><span id="p_sakatoto" class="glyphicon"></span><span class="nama_pasaran_sakatoto"></span>
              <span id="pidSKT" style="float:right; font-weight:normal; font-size:10px;" class="blink_me"></span></a></li>
          <script>
            var timeSKT = 42904;
            setInterval(function() {
              timeSKT--;
              if (timeSKT < 3600) $('#pidSKT').text(secondtominute(timeSKT));
            }, 1000);
          </script>
          <li style="font-size:14px; width:228px; font-weight:bold; margin-left:0px; opacity:1.0;"><a data-toggle="pill" href="#saka4d_wrap"><span id="p_saka4d" class="glyphicon"></span><span class="nama_pasaran_saka4d"></span>
              <span id="pidSKD" style="float:right; font-weight:normal; font-size:10px;" class="blink_me"></span></a></li>
          <script>
            var timeSKD = 50104;
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
        <div id="launch_window" style="width:100%; height:700px; display:none">
          <iframe id="embedgameIframe" name="embedgameIframe" scrolling="no" width="100%" height="100%" src="pleaseWait.html" frameBorder="0" style="margin: 0; padding: 0; white-space: nowrap; border: 0; background-color:#272b30">
          </iframe>
          <div style="position:absolute; margin-top:-700px; margin-left:5px; " id="closeButton"><button type="button" class="btn btn-default" onClick="closeGame();" style="background:none; border:none; padding:0px; margin:0px; font-size:20px"><img src="https://img.pay4d.info/home.png" height="35" alt=""></button></div>
        </div>

        <div id="game_window" style="width:100%; height:788px">
          <ul class="nav nav-pills grabgtab" style="font-size:16px; font-weight:bold; padding-bottom:2px;">

            <li class="" id="tab_pp" style="width:33.1%; margin-left:2px; margin-bottom: 2px"><a href="?login=89j3vu4unVSW8Bny&games&gid=pp"><span><img src="https://img.pay4d.info/pp-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />Pragmatic Play</span>
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
            <li class="active" id="tab_cq9" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a href="?login=89j3vu4unVSW8Bny&games&gid=cq9"><span><img src="https://img.pay4d.info/cq9-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" /></span>
              </a></li>
            <li class="" id="tab_mg" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a href="?login=89j3vu4unVSW8Bny&games&gid=mg"><span><img src="https://img.pay4d.info/mg-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />Microgaming</span>
              </a></li>
            <li class="" id="tab_ttg" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a href="?login=89j3vu4unVSW8Bny&games&gid=ttg"><span><img src="https://img.pay4d.info/ttg-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />TopTrend Gaming</span>
              </a></li>

          </ul>
          <div style="height:10px; background-color:#FFF" class="grabgtabbottom"></div>

          <div class="tab-content">

            <div id="games_window_cq9" class="tab-pane fade in active">
              <div class="row">
                <div class="col-md-9">
                </div>
                <div class="col-md-3" style="padding-top:5px">
                  <form method="GET" style="float:right;">
                    <div class="input-group">
                      <input type="text" class="form-control" name="s" placeholder="Search Game" value="">
                      <input type="hidden" name="gid" value="cq9">
                      <input type="hidden" name="games">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-sm btn-danger" style="height:27px; padding-top:4px; margin-top:-1px"><i class="glyphicon glyphicon-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>



              <div id="cq9all" style="height:605px; overflow:auto; margin-top:10px;" class="tab-pane fade in active">
                <div style="margin-top: 15px;"></div>

                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=243&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/243.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Mafia</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=GB15&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/GB15.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Hero of the 3 Kingdoms - Cao Cao</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=241&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/241.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">The Chicken House</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=230&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/230.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Baseball Fever</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=GB13&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/GB13.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Football Fever M</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=BU28&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/BU28.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Hong Kong Flavor</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=GB12&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/GB12.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Myeong Ryang</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=229&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/229.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Night City</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=228&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/228.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Mirror Mirror</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=227&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/227.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">888 Cai Shen</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=GB9&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/GB9.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Football Fever</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=BU26&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/BU26.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Diamond Fruit</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=BU27&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/BU27.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Songkran</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=225&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/225.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Mr. Miser</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=226&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/226.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Lucky Tigers</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=223&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/223.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Acrobatics</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=CC09&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/CC09.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Frozen World</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=GB8&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/GB8.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Dragon Koi</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=GB5&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/GB5.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Hot DJ</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=171&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/171.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Greek Gods</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=GB3&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/GB3.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Coin Spinner</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=222&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/222.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Loy Krathong</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=219&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/219.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">King Kong Shake</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=218&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/218.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Dollar Bomb</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=GB6&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/GB6.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Ganesha Jr.</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=177&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/177.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Aladdins lamp</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=GB2&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/GB2.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Monster Hunter</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=211&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/211.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">King of Atlantis</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=215&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/215.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Hot Pinatas</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=214&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/214.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Ninja Raccoon</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=212&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/212.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Burning Xi-You</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=210&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/210.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Oo Ga Cha Ka</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=209&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/209.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">The Cupids</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=208&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/208.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Money Tree</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=206&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/206.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Sweet POP</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=5009&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/5009.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Uproar in Heaven</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=5008&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/5008.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Da Hong Zhong</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=5007&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/5007.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Da Fa Cai</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=195&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/195.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Lord Ganesha</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=197&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/197.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Dragons Treasure</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=199&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/199.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Songkran Festival</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=187&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/187.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Wing Chun</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=194&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/194.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Fortune Dragon</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=185&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/185.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Dragon Ball</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=186&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/186.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Fire Queen 2</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=188&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/188.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Cricket Fever</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=184&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/184.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Six Gacha</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=AS09&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/AS09.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Hollywood Pets</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=AS20&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/AS20.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Queen Of Dead</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=AS19&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/AS19.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Xmas Tales</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=AS02&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/AS02.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Cirque de fous</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=AS18&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/AS18.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Wild Fudge</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=AS10&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/AS10.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Lucky 3</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=AS17&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/AS17.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Treasure of Seti</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=AS03&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/AS03.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Dragon Hunters</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=AS33&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/AS33.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Pig Of Luck</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=AS04&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/AS04.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Fortune Spirits</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=36&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/36.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Pub Tycoon</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=22&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/22.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Monkey Office Legend</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=AS01&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/AS01.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Boots Of Luck</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=AS08&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/AS08.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Golden Mayan</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=21&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/21.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Big Wolf</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=92&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/92.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">World Cup Russia2018</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=141&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/141.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Xmas</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=49&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/49.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Lonely Planet</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=35&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/35.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Crazy Nuozha</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=38&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/38.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">All Wilds</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=103&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/103.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Jewel Luxury</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=135&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/135.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Gu Gu Gu M</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=51&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/51.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Ecstatic Circus</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=98&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/98.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">All Star Team</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=2&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/2.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">God Of Chess</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=70&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/70.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Wanbao Dino</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=66&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/66.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Fire 777</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=86&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/86.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">RunningToro</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=130&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/130.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Gold Stealer</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=77&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/77.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Red Phoenix</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=122&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/122.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Zuma Wild</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=104&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/104.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Chicky Parm Parm</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=182&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/182.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Thor 2</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=20&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/20.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">888</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=42&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/42.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Sherlock Holmes</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=44&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/44.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Fruit King II</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=17&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/17.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Great Lion</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=81&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/81.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Treasure Island</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=57&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/57.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">The Beast War</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=146&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/146.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Sky Lanterns</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=96&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/96.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Football Baby</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=95&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/95.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Football Boots</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=76&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/76.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">WonWonWon</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=59&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/59.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Summer Mood</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=80&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/80.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Poseidon</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=32&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/32.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Detective Dee</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=27&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/27.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Magic World</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=34&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/34.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Gophers War</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=13&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/13.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Sakura Legend</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=47&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/47.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Pharaohs Gold</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=102&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/102.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Fruity Carnival</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=204&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/204.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">LuckyBoxes</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=221&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/221.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Detective Dee 2</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=129&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/129.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Gu Gu Gu 2 M</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=132&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/132.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Meow</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=160&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/160.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Fa Cai Shen2</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=9&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/9.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Zhong Kui</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=133&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/133.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Good Fortune M</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=153&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/153.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Six Candy</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=83&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/83.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Fire Queen</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=183&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/183.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Wolf Disco</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=12&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/12.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Treasure House</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=112&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/112.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Pyramid Raider</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=19&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/19.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Hot Spin</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=23&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/23.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Yuan Bao</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=124&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/124.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Invincible Elephant</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=55&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/55.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Dragon Heart</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=4&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/4.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Wild Tarzan</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=68&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/68.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Wukong & Peaches</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=39&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/39.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Apsaras</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=144&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/144.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Diamond Treasure</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=148&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/148.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Fortune Totem</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=118&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/118.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">SkrSkr</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=121&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/121.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Rave Jump 2 M</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=180&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/180.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Gu Gu Gu 3</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=5&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/5.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Mr. Rich</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=74&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/74.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Treasure Bowl</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=108&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/108.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Jump Higher mobile</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=152&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/152.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Double Fly</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=116&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/116.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Wonderland</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=154&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/154.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Kronos</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=128&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/128.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Wheel Money</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=173&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/173.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">6 Toros</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=109&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/109.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Rave Jump mobile</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=58&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/58.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Gu Gu Gu 2</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=113&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/113.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Flying Cai Shen</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=203&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/203.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">RaveHigh</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=147&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/147.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Flower Fortunes</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=8&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/8.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">So Sweet</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=79&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/79.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Chameleon</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=29&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/29.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">WaterWorld</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=127&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/127.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">God of War M</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=115&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/115.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Snow Queen</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=140&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/140.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Fire Chibi 2</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=117&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/117.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">5 God beasts</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=15&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/15.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">GuGuGu</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=139&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/139.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Fire Chibi M</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=78&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/78.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Apollo</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=3&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/3.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Vampire Kiss</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=157&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/157.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">5 Boxing</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=54&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/54.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Funny Alpaca</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=202&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/202.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">OrientalBeauty</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=46&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/46.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Wolf Moon</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=136&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/136.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Running Animals</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=123&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/123.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Lucky Bats M</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=24&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/24.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Rave Jump2</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=89&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/89.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Thor</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=69&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/69.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Fa Cai Shen</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=105&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/105.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Jumping Mobile</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=137&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/137.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Disco Night M</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=138&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/138.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Move n Jump</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=205&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/205.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">DiscoNight</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=64&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/64.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Zeus</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=31&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/31.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">God of War</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=50&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/50.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Good Fortune</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=111&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/111.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Fly Out</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=10&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/10.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Lucky Bats</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=179&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/179.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Jump High 2</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=99&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/99.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Jump Higher</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=7&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/7.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Rave Jump</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=52&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/52.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Jump High</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=26&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/26.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">777</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=150&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/150.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Shou-Xin</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=33&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/33.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Fire Chibi</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=163&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/163.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Ne Zha Advent</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=143&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/143.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Fa Cai Fu Wa</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=142&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/142.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Hephaestus</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=201&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/201.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">MuayThai</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=1&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/1.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Fruit King</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=72&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/72.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Happy Rich Year</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=16&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/16.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Super5</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=131&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/131.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Fa Cai Shen M</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=161&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/161.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Hercules</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=67&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/67.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Golden Eggs</div>
                  </a></div>
                <div class="gameList" style="height:205px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://cq9.lk-acc-n1.com?gameid=125&token=5TszNbgW9af5tyR%2BKJ1VSAS5DvQrJ2YW9qCY8zMKYdo%3D"><img src="https://img.pay4d.info/cq9/images/125.png" style="width:155px;">
                    <div style="text-align:center; margin-top:5px">Zeus M</div>
                  </a></div>
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
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=YMC3sReTReIiLl5uMGQxlUfPYo20RWisgfUk3Kguny8%3D&token=OiVHt9N9IyoF86fFx2kDh1eNP5Q%2F1qh4JqGpfF%2Bt%2BCc%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ion/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=PaxSpoxmbCTMQ5BYqVfgpF57zlJDaQVLUbJ6NdRFSJY%3D&token=OiVHt9N9IyoF86fFx2kDh1eNP5Q%2F1qh4JqGpfF%2Bt%2BCc%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ion/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=CPUsYpVqqeJTFZxw8m4RhAHHajJV4%2FXgKiBuNNL48eg%3D&token=OiVHt9N9IyoF86fFx2kDh1eNP5Q%2F1qh4JqGpfF%2Bt%2BCc%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ion/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sicbo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=cUg%2B7AuQmWMEMvXfZbFODUTwkLg39%2FNhyi7fmr70Yd8%3D&token=OiVHt9N9IyoF86fFx2kDh1eNP5Q%2F1qh4JqGpfF%2Bt%2BCc%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://opus-api.lk-acc-n1.com/opus/launch?cookie=URHTJY5Z%2B5RCVhhIdsdBdYrPNO%2BU6IyeR1nE%2FO2h2kw%3D&gameType=BA', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/og/images/BA.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://opus-api.lk-acc-n1.com/opus/launch?cookie=URHTJY5Z%2B5RCVhhIdsdBdYrPNO%2BU6IyeR1nE%2FO2h2kw%3D&gameType=RO', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/og/images/RO.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://opus-api.lk-acc-n1.com/opus/launch?cookie=URHTJY5Z%2B5RCVhhIdsdBdYrPNO%2BU6IyeR1nE%2FO2h2kw%3D&gameType=DC', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=qCRsM3EXg7P8%2BT2aRERbt%2F4rozy60ZpTMHpHcW0jt%2F0%3D&category=top_games', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/top_games.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Top Games</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=qCRsM3EXg7P8%2BT2aRERbt%2F4rozy60ZpTMHpHcW0jt%2F0%3D&category=game_shows', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/game_shows.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Game Shows</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=qCRsM3EXg7P8%2BT2aRERbt%2F4rozy60ZpTMHpHcW0jt%2F0%3D&category=baccarat', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=qCRsM3EXg7P8%2BT2aRERbt%2F4rozy60ZpTMHpHcW0jt%2F0%3D&category=roulette', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=qCRsM3EXg7P8%2BT2aRERbt%2F4rozy60ZpTMHpHcW0jt%2F0%3D&category=sicbo', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sicbo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=qCRsM3EXg7P8%2BT2aRERbt%2F4rozy60ZpTMHpHcW0jt%2F0%3D&category=dragontiger', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/dragontiger.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=qCRsM3EXg7P8%2BT2aRERbt%2F4rozy60ZpTMHpHcW0jt%2F0%3D&category=blackjack', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/blackjack.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Blackjack</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=qCRsM3EXg7P8%2BT2aRERbt%2F4rozy60ZpTMHpHcW0jt%2F0%3D&category=poker', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/poker.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Poker</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=qCRsM3EXg7P8%2BT2aRERbt%2F4rozy60ZpTMHpHcW0jt%2F0%3D&category=bacbo', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/bacbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Bac Bo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=qCRsM3EXg7P8%2BT2aRERbt%2F4rozy60ZpTMHpHcW0jt%2F0%3D&category=fantan', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/fantan.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Fan Tan</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=qCRsM3EXg7P8%2BT2aRERbt%2F4rozy60ZpTMHpHcW0jt%2F0%3D&category=andarbahar', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/andarbahar.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Andar Bahar</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=qCRsM3EXg7P8%2BT2aRERbt%2F4rozy60ZpTMHpHcW0jt%2F0%3D&category=craps', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/craps.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Craps</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=qCRsM3EXg7P8%2BT2aRERbt%2F4rozy60ZpTMHpHcW0jt%2F0%3D&category=teenpatti', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=uJDDq4fNfyU4FHtUv2W3T%2FS1ZVsKWYS76vnpVUltaIw%3D&token=slSvvRqJdWK19z6L8krjLHsziYu2h6qg9iHAkxCXNLQ%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/sx/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=F0vwxtiniOuc9lE58h9CEn%2B1vSvsd95XTrmUUEe9TP8%3D&token=slSvvRqJdWK19z6L8krjLHsziYu2h6qg9iHAkxCXNLQ%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/sx/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=3M9qyRfZBWtRNuss%2FdawqJG%2B9U0%2BXv5Aj2qWu19glHY%3D&token=slSvvRqJdWK19z6L8krjLHsziYu2h6qg9iHAkxCXNLQ%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/sx/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">SicBo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=xi9THhgILFAuhMdC5s%2FvrVf6BdC5nToTBabvxOt4Ph4%3D&token=slSvvRqJdWK19z6L8krjLHsziYu2h6qg9iHAkxCXNLQ%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D0yrIHBblQEgK%2Focr0zJwcdmwSwP7%2FGFK4YhbRT2tP90%3D%26symbol%3D101%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/101.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Top Games</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D0yrIHBblQEgK%2Focr0zJwcdmwSwP7%2FGFK4YhbRT2tP90%3D%26symbol%3D104%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/104.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat Lobby</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D0yrIHBblQEgK%2Focr0zJwcdmwSwP7%2FGFK4YhbRT2tP90%3D%26symbol%3D102%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/102.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette Lobby</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D0yrIHBblQEgK%2Focr0zJwcdmwSwP7%2FGFK4YhbRT2tP90%3D%26symbol%3D103%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/103.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Blackjack Lobby</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D0yrIHBblQEgK%2Focr0zJwcdmwSwP7%2FGFK4YhbRT2tP90%3D%26symbol%3D1001%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1001.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D0yrIHBblQEgK%2Focr0zJwcdmwSwP7%2FGFK4YhbRT2tP90%3D%26symbol%3D1024%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1024.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Andar Bahar</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D0yrIHBblQEgK%2Focr0zJwcdmwSwP7%2FGFK4YhbRT2tP90%3D%26symbol%3D204%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/204.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Mega Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D0yrIHBblQEgK%2Focr0zJwcdmwSwP7%2FGFK4YhbRT2tP90%3D%26symbol%3D701%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/701.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Mega Sicbo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D0yrIHBblQEgK%2Focr0zJwcdmwSwP7%2FGFK4YhbRT2tP90%3D%26symbol%3D801%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/801.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Mega Wheel</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D0yrIHBblQEgK%2Focr0zJwcdmwSwP7%2FGFK4YhbRT2tP90%3D%26symbol%3D240%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/240.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Power Up Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D0yrIHBblQEgK%2Focr0zJwcdmwSwP7%2FGFK4YhbRT2tP90%3D%26symbol%3D1101%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1101.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sweet Bonanza Candyland</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D0yrIHBblQEgK%2Focr0zJwcdmwSwP7%2FGFK4YhbRT2tP90%3D%26symbol%3D1302%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1302.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Spaceman</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D0yrIHBblQEgK%2Focr0zJwcdmwSwP7%2FGFK4YhbRT2tP90%3D%26symbol%3D1401%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1401.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Boom City</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D0yrIHBblQEgK%2Focr0zJwcdmwSwP7%2FGFK4YhbRT2tP90%3D%26symbol%3D1601%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=0&token=gXop%2BRelfPjfTwcBFevE86npmEKGBRZ9FsIQe%2B52Os4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/hotgames.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Hot Games</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=100&token=gXop%2BRelfPjfTwcBFevE86npmEKGBRZ9FsIQe%2B52Os4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/dragonhall.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">DragonHall</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=106&token=gXop%2BRelfPjfTwcBFevE86npmEKGBRZ9FsIQe%2B52Os4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/quickhall.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">QuickHall</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=102&token=gXop%2BRelfPjfTwcBFevE86npmEKGBRZ9FsIQe%2B52Os4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/multiplay.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">MultiPlay</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=104&token=gXop%2BRelfPjfTwcBFevE86npmEKGBRZ9FsIQe%2B52Os4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/seecardbaccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">SeeCard Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=101&token=gXop%2BRelfPjfTwcBFevE86npmEKGBRZ9FsIQe%2B52Os4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=105&token=gXop%2BRelfPjfTwcBFevE86npmEKGBRZ9FsIQe%2B52Os4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/sexybaccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sexy Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=110&token=gXop%2BRelfPjfTwcBFevE86npmEKGBRZ9FsIQe%2B52Os4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/insurancebaccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Insurance Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=401&token=gXop%2BRelfPjfTwcBFevE86npmEKGBRZ9FsIQe%2B52Os4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=402&token=gXop%2BRelfPjfTwcBFevE86npmEKGBRZ9FsIQe%2B52Os4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/sexyroulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sexy Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=201&token=gXop%2BRelfPjfTwcBFevE86npmEKGBRZ9FsIQe%2B52Os4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">SicBoHiLo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=301&token=gXop%2BRelfPjfTwcBFevE86npmEKGBRZ9FsIQe%2B52Os4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/dragontiger.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=801&token=gXop%2BRelfPjfTwcBFevE86npmEKGBRZ9FsIQe%2B52Os4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/bullbull.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">BullBull</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=901&token=gXop%2BRelfPjfTwcBFevE86npmEKGBRZ9FsIQe%2B52Os4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/win3cards.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Win3Cards</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=501&token=gXop%2BRelfPjfTwcBFevE86npmEKGBRZ9FsIQe%2B52Os4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=CPXZAy%2BqrxCRp%2BJBeV55NoeLTvRuj%2FEVuuLdPkl3gWiyu2li2o%2FdSbuPQ4dq7tm%2FA5DyjywUrTMUJEdyDK27cUh7GBvoP4c6bmvkQONRUSnc%2B7AdrYofXjWmVdiUauYssU7EUCA0vXu%2B7NMBjaIKOA5IaPuWr697sb2JJd2OS6SZkd8zBrOtikErkbYcckvY0kzpkuArd44xOb%2FMF9ekkA%3D%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_baccarat_playboy_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Playboy Club</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=5wXTB%2FzcLPitgUic7qC4rSuKlDajyr162x4FWRAMnsqTcbgM6IV%2FJN5tKP6B6WyDt3ilXDG73ucttROkqm15KMYZCqaMb53QJh%2F2Tf2q%2FwtCI06HoKQO84y7kxSADv8Y67w8BCWgng%2FPE3fEjKCvJk5LvMbCZaLrgcUDSc%2Fo1Qk%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_baccarat_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Bonus Baccarat</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=lgGXBhmRMhKUVeSbp2NSCo9Ja6g%2FJmRefilpMiQPPUl2MgvI0N3X5QQNGmHEFcUesaxxZmI58PInnLA7%2BLd%2FOaKrVLQwaxDe2OR9vjAaggyMB65ilpmrqZXwsVBg963XUCI%2Flg8qcRVIApqJdn2%2F5Snt0rUtClUOQDTwR2Xutok%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_baccaratnc_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">No Com Bonus Baccarat</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=CQgwM3AummoVCTcDc%2BEd16rGBVd0LAaL2U9ZI5CdPGaan6J6YxKUYOFjn8BuXH04UcDN6nHNNo5j57JH7FWJk4qzWAWO%2BvFFDw2dEXu2qWswKRCumBhFeG1i2Bshu3ei2zLNL8wbDu1EyrOhc6nZPQF45hOwmwNGVNNXn2LNpNtfvFu6C5n0LEnutImAYGpudh8w5LCyMtD88wa3cOi0yQ%3D%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_mp_baccarat_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Baccarat</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=224D62X6ujKJjJYfdo3mc3mwCKogEnZnSVeIsh6TJY10yINQui%2Fhffll%2Bn7y3jplDaqA1nfRg6IjxS4kvA%2FBo2VjuZXrmV3AcFp4E9wxcEysTBWvb%2FxzZcnP813OvA1MeRDjSM50i%2FjJdOLb%2BDs4Ml7iDKpHwxOrfiHYRwcp94E%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_roulette_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Roulette </div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=9QyoBy85A0PSCIeffvkJXnCrcBfyo3V%2BmLPHhc%2FuvMLbIL3Bf%2BzPn69aPzHsSMyfKWBQSaWEmeAgvIIh3Hm6%2Bt7sQ6QuVEfTHFNzEMk7tQntJCaZ9wZE5Ed487od6CyncW3RLkgqcbix%2FkarZXXpOooqQOQvFJe92eAVlPTdEOA%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
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
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=1YhilbQ3zJcg5VbX21dPsNXRDXBn8OINsfqDsgDmryI%3D&game=baccarat', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/baccarat.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Baccarat</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=1YhilbQ3zJcg5VbX21dPsNXRDXBn8OINsfqDsgDmryI%3D&game=roulette', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/roulette.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Roulette</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=1YhilbQ3zJcg5VbX21dPsNXRDXBn8OINsfqDsgDmryI%3D&game=sicbo', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/sicbo.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Sicbo</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=1YhilbQ3zJcg5VbX21dPsNXRDXBn8OINsfqDsgDmryI%3D&game=dragontiger', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/dragontiger.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=1YhilbQ3zJcg5VbX21dPsNXRDXBn8OINsfqDsgDmryI%3D&game=12baccarat', '_blank', 'width=1366, height=900, top=0, left=0')">
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
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=IOs6Z5koknOZOXYE9iDrrX5SnZXcBHNInCN29%2F7A6r4%3D&game=baccarat', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/baccaratlobby.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Baccarat Lobby</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=IOs6Z5koknOZOXYE9iDrrX5SnZXcBHNInCN29%2F7A6r4%3D&game=roulette', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/eroulette.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Roulette</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=IOs6Z5koknOZOXYE9iDrrX5SnZXcBHNInCN29%2F7A6r4%3D&game=croulette', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/croulette.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Sexy Roulette</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=IOs6Z5koknOZOXYE9iDrrX5SnZXcBHNInCN29%2F7A6r4%3D&game=sicbo', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/esicbo.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Sicbo</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=IOs6Z5koknOZOXYE9iDrrX5SnZXcBHNInCN29%2F7A6r4%3D&game=dragontiger', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/edragontiger.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=IOs6Z5koknOZOXYE9iDrrX5SnZXcBHNInCN29%2F7A6r4%3D&game=pokdeng', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/epokdeng.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Pok Deng</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=IOs6Z5koknOZOXYE9iDrrX5SnZXcBHNInCN29%2F7A6r4%3D&game=andarbahar', '_blank', 'width=1366, height=900, top=0, left=0')">
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
          <a onClick="window.open('https://ws168.lk-acc-n1.com/ws/launch?token=YoJ9HsQs8N05GjsgsZ%2BsgeTypA5v8SSNUiTJzNUylCI%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
            <img src="https://img.pay4d.info/wslogo.png" style="cursor: pointer;">
            <div>WS168</div>
          </a>
        </div>

        <div style="clear: both;"></div>

      </div>




      <div id="sport_wrap" class="tab-pane fade in">
        <hr style="margin-top: 5px">
        <div style="margin: 10px 0px 10px 10px; text-align: center; width: 200px; float: left">
          <a onClick="window.open('https://saba.lk-acc-n1.com/?p=d&token=gh0%2FEBs9g3uPhSnex8vkPz1FJ%2FZpMvuTGVxFxbnJUPI%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
            <img src="https://img.pay4d.info/sabalogo.png" style="cursor: pointer;">
            <div>Saba Sports<BR>[Rasio Credit 1:1000]</div>
          </a>
        </div>

        <div style="margin: 10px 0px 10px 10px; text-align: center; width: 200px; float: left">
          <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=1YhilbQ3zJcg5VbX21dPsNXRDXBn8OINsfqDsgDmryI%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
            <img src="https://img.pay4d.info/sbologo.png" style="cursor: pointer;">
            <div>SBO Sports<BR>[Rasio Credit 1:1000]</div>
          </a>
        </div>

        <div style="margin: 10px 0px 10px 10px; text-align: center; width: 200px; float: left">
          <a onClick="window.open('https://tfsport.lk-acc-n1.com/tf/launch?token=UciTqHgvgj4rPcJABn8KREKhlENFsMfBNYXDorF6r5A%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
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
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=E%2BHbzdtBwN0qVbliMW%2FkYIvCBm7zPiTlhaNIgaUTLyM%3D&game=F-SF01&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-SF01.png" style="width:160px;">
                      <div style="text-align:center;">Fishing God<br>[Rasio Credit 1:10]</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=E%2BHbzdtBwN0qVbliMW%2FkYIvCBm7zPiTlhaNIgaUTLyM%3D&game=F-SF02&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-SF02.png" style="width:160px;">
                      <div style="text-align:center;">Fishing War<br>[Rasio Credit 1:10]</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=E%2BHbzdtBwN0qVbliMW%2FkYIvCBm7zPiTlhaNIgaUTLyM%3D&game=F-AH01&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-AH01.png" style="width:160px;">
                      <div style="text-align:center;">Alien Hunter<br>[Rasio Credit 1:10]</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=E%2BHbzdtBwN0qVbliMW%2FkYIvCBm7zPiTlhaNIgaUTLyM%3D&game=F-ZP01&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-ZP01.png" style="width:160px;">
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
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=XVVD2G4HpThNjkGkk4iAFZ7CaKQQl41EIuIA7gm%2Ff%2BU%3D&gameid=212"><img src="https://img.pay4d.info/jl/images/212.png" style="width:160px;">
                      <div style="text-align:center;">Dinosaur Tycoon II</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=XVVD2G4HpThNjkGkk4iAFZ7CaKQQl41EIuIA7gm%2Ff%2BU%3D&gameid=32"><img src="https://img.pay4d.info/jl/images/32.png" style="width:160px;">
                      <div style="text-align:center;">Jackpot Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=XVVD2G4HpThNjkGkk4iAFZ7CaKQQl41EIuIA7gm%2Ff%2BU%3D&gameid=82"><img src="https://img.pay4d.info/jl/images/82.png" style="width:160px;">
                      <div style="text-align:center;">Happy Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=XVVD2G4HpThNjkGkk4iAFZ7CaKQQl41EIuIA7gm%2Ff%2BU%3D&gameid=119"><img src="https://img.pay4d.info/jl/images/119.png" style="width:160px;">
                      <div style="text-align:center;">All-star Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=XVVD2G4HpThNjkGkk4iAFZ7CaKQQl41EIuIA7gm%2Ff%2BU%3D&gameid=1"><img src="https://img.pay4d.info/jl/images/1.png" style="width:160px;">
                      <div style="text-align:center;">Royal Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=XVVD2G4HpThNjkGkk4iAFZ7CaKQQl41EIuIA7gm%2Ff%2BU%3D&gameid=71"><img src="https://img.pay4d.info/jl/images/71.png" style="width:160px;">
                      <div style="text-align:center;">Boom Legend</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=XVVD2G4HpThNjkGkk4iAFZ7CaKQQl41EIuIA7gm%2Ff%2BU%3D&gameid=74"><img src="https://img.pay4d.info/jl/images/74.png" style="width:160px;">
                      <div style="text-align:center;">Mega Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=XVVD2G4HpThNjkGkk4iAFZ7CaKQQl41EIuIA7gm%2Ff%2BU%3D&gameid=42"><img src="https://img.pay4d.info/jl/images/42.png" style="width:160px;">
                      <div style="text-align:center;">Dinosaur Tycoon</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=XVVD2G4HpThNjkGkk4iAFZ7CaKQQl41EIuIA7gm%2Ff%2BU%3D&gameid=20"><img src="https://img.pay4d.info/jl/images/20.png" style="width:160px;">
                      <div style="text-align:center;">Bombing Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=XVVD2G4HpThNjkGkk4iAFZ7CaKQQl41EIuIA7gm%2Ff%2BU%3D&gameid=60"><img src="https://img.pay4d.info/jl/images/60.png" style="width:160px;">
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
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=T2QmOgNEeuo3QzbAwLgY1gWjHQ013ujwH9dAktVdrN8%3D&gameid=PSF-ON-00006"><img src="https://img.pay4d.info/ps/images/PSF-ON-00006.png" style="width:160px;">
                      <div style="text-align:center;">Fishing Fa Fa Fa</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=T2QmOgNEeuo3QzbAwLgY1gWjHQ013ujwH9dAktVdrN8%3D&gameid=PSF-ON-00005"><img src="https://img.pay4d.info/ps/images/PSF-ON-00005.png" style="width:160px;">
                      <div style="text-align:center;">Fishing In Thailand</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=T2QmOgNEeuo3QzbAwLgY1gWjHQ013ujwH9dAktVdrN8%3D&gameid=PSF-ON-00004"><img src="https://img.pay4d.info/ps/images/PSF-ON-00004.png" style="width:160px;">
                      <div style="text-align:center;">Fishing Foodie</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=T2QmOgNEeuo3QzbAwLgY1gWjHQ013ujwH9dAktVdrN8%3D&gameid=PSF-ON-00003"><img src="https://img.pay4d.info/ps/images/PSF-ON-00003.png" style="width:160px;">
                      <div style="text-align:center;">Zombie Bonus</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=T2QmOgNEeuo3QzbAwLgY1gWjHQ013ujwH9dAktVdrN8%3D&gameid=PSF-ON-00002"><img src="https://img.pay4d.info/ps/images/PSF-ON-00002.png" style="width:160px;">
                      <div style="text-align:center;">Spicy Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=T2QmOgNEeuo3QzbAwLgY1gWjHQ013ujwH9dAktVdrN8%3D&gameid=PSF-ON-00001"><img src="https://img.pay4d.info/ps/images/PSF-ON-00001.png" style="width:160px;">
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
                  <div class="gameList_f" style="height:205px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://fastspin.lk-acc-n1.com/fs/launch?token=vVAs5fLWohlom3IvTePtp4%2FglMI81nEdf8s6dSvTh2A%3D&game=F-FT01"><img src="https://img.pay4d.info/fs/images/F-FT01.jpg" style="width:155px;">
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