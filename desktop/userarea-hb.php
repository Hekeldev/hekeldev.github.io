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
            var timeSKA = 32200;
            setInterval(function() {
              timeSKA--;
              if (timeSKA < 3600) $('#pidSKA').text(secondtominute(timeSKA));
            }, 1000);
          </script>
          <li style="font-size:14px; width:228px; font-weight:bold; margin-left:0px; opacity:1.0;"><a data-toggle="pill" href="#sakatoto_wrap"><span id="p_sakatoto" class="glyphicon"></span><span class="nama_pasaran_sakatoto"></span>
              <span id="pidSKT" style="float:right; font-weight:normal; font-size:10px;" class="blink_me"></span></a></li>
          <script>
            var timeSKT = 43000;
            setInterval(function() {
              timeSKT--;
              if (timeSKT < 3600) $('#pidSKT').text(secondtominute(timeSKT));
            }, 1000);
          </script>
          <li style="font-size:14px; width:228px; font-weight:bold; margin-left:0px; opacity:1.0;"><a data-toggle="pill" href="#saka4d_wrap"><span id="p_saka4d" class="glyphicon"></span><span class="nama_pasaran_saka4d"></span>
              <span id="pidSKD" style="float:right; font-weight:normal; font-size:10px;" class="blink_me"></span></a></li>
          <script>
            var timeSKD = 50200;
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
            <li class="active" id="tab_hb" style="width:33.1%; margin-left:2px; margin-bottom: 2px"><a href="?login=89j3vu4unVSW8Bny&games&gid=hb"><span><img src="https://img.pay4d.info/hb-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />Habanero</span>
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
            <li class="" id="tab_ttg" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a href="?login=89j3vu4unVSW8Bny&games&gid=ttg"><span><img src="https://img.pay4d.info/ttg-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />TopTrend Gaming</span>
              </a></li>

          </ul>
          <div style="height:10px; background-color:#FFF" class="grabgtabbottom"></div>

          <div class="tab-content">

            <div id="games_window_hb" class="tab-pane fade in active">
              <div class="row">
                <div class="col-md-9">
                  <ul class="nav nav-pills">
                    <li style="width:120px" class="active"><a data-toggle="pill" href="#slot">&#10024; Slots</a></li>
                    <li style="width:150px"><a data-toggle="pill" href="#hbhot">&#128293; Top 20 Games</a></li>
                    <li style="width:160px"><a data-toggle="pill" href="#poker">&clubs; Card &amp; Table Games</a></li>
                    <li style="width:180px"><a data-toggle="pill" href="#other">&oplus; Video Poker Classic</a></li>
                  </ul>
                </div>
                <div class="col-md-3" style="padding-top:5px">
                  <form method="GET" style="float:right;">
                    <div class="input-group">
                      <input type="text" class="form-control" name="s" placeholder="Search Game" value="">
                      <input type="hidden" name="gid" value="hb">
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
                <div id="slot" style="height:589px; overflow:auto" class="tab-pane fade in active">
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGNaughtyWukong&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGNaughtyWukong.png" style="width:160px">
                      <div style="text-align:center">Naughty Wukong</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGRainbowmania&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGRainbowmania.png" style="width:160px">
                      <div style="text-align:center">Rainbowmania</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGDragonTigerGate&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGDragonTigerGate.png" style="width:160px">
                      <div style="text-align:center">Dragon Tiger Gate</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGTaikoBeats&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGTaikoBeats.png" style="width:160px">
                      <div style="text-align:center">Taiko Beats</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGSpaceGoonz&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGSpaceGoonz.png" style="width:160px">
                      <div style="text-align:center">Space Goonz</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGGoldenUnicornDeluxe&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGGoldenUnicornDeluxe.png" style="width:160px">
                      <div style="text-align:center">Golden Unicorn Deluxe</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGBombRunner&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGBombRunner.png" style="width:160px">
                      <div style="text-align:center">Bomb Runner</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGMightyMedusa&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGMightyMedusa.png" style="width:160px">
                      <div style="text-align:center">Mighty Medusa</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGLuckyDurian&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGLuckyDurian.png" style="width:160px">
                      <div style="text-align:center">Lucky Durian</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGNewYearsBash&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGNewYearsBash.png" style="width:160px">
                      <div style="text-align:center">New Years Bash</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGProst&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGProst.png" style="width:160px">
                      <div style="text-align:center">Prost!</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGNineTails&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGNineTails.png" style="width:160px">
                      <div style="text-align:center">Nine Tails</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGFly&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGFly.png" style="width:160px">
                      <div style="text-align:center">Fly!</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGCalaverasExplosivas&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGCalaverasExplosivas.png" style="width:160px">
                      <div style="text-align:center">Calaveras Explosivas</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGMarvelousFurlongs&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGMarvelousFurlongs.png" style="width:160px">
                      <div style="text-align:center">Marvelous Furlongs</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGCandyTower&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGCandyTower.png" style="width:160px">
                      <div style="text-align:center">Candy Tower</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGReturnToTheFeature&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGReturnToTheFeature.png" style="width:160px">
                      <div style="text-align:center">Return To The Feature</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGBeforeTimeRunsOut&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGBeforeTimeRunsOut.png" style="width:160px">
                      <div style="text-align:center">Before Time Runs Out</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGHotHotFruit&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGHotHotFruit.png" style="width:160px">
                      <div style="text-align:center">Hot Hot Fruit</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGTheKoiGate&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGTheKoiGate.png" style="width:160px">
                      <div style="text-align:center">Koi Gate</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGWealthInn&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGWealthInn.png" style="width:160px">
                      <div style="text-align:center">Wealth Inn</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGMysticFortuneDeluxe&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGMysticFortuneDeluxe.png" style="width:160px">
                      <div style="text-align:center">Mystic Fortune Deluxe</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGWildTrucks&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGWildTrucks.png" style="width:160px">
                      <div style="text-align:center">Wild Trucks</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGCrystopia&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGCrystopia.png" style="width:160px">
                      <div style="text-align:center">Crystopia</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SG5LuckyLions&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SG5LuckyLions.png" style="width:160px">
                      <div style="text-align:center">5 Lucky Lions</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGLaughingBuddha&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGLaughingBuddha.png" style="width:160px">
                      <div style="text-align:center">Laughing Buddha</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGSirensSpell&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGSirensSpell.png" style="width:160px">
                      <div style="text-align:center">Siren's Spell</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGHappiestChristmasTree&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGHappiestChristmasTree.png" style="width:160px">
                      <div style="text-align:center">Happiest Christmas Tree</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGLegendaryBeasts&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGLegendaryBeasts.png" style="width:160px">
                      <div style="text-align:center">Legendary Beasts</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGLanternLuck&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGLanternLuck.png" style="width:160px">
                      <div style="text-align:center">Lantern Luck</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGFaCaiShen&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGFaCaiShen.png" style="width:160px">
                      <div style="text-align:center">Fa Cai Shen</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGFaCaiShenDeluxe&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGFaCaiShenDeluxe.png" style="width:160px">
                      <div style="text-align:center">Fa Cai Shen Deluxe</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGHotHotHalloween&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGHotHotHalloween.png" style="width:160px">
                      <div style="text-align:center">Hot Hot Halloween</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGTheBigDealDeluxe&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGTheBigDealDeluxe.png" style="width:160px">
                      <div style="text-align:center">The Big Deal Deluxe</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGFourDivineBeasts&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGFourDivineBeasts.png" style="width:160px">
                      <div style="text-align:center">Four Divine Beasts</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGSojuBomb&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGSojuBomb.png" style="width:160px">
                      <div style="text-align:center">Soju Bomb</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGTukTukThailand&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGTukTukThailand.png" style="width:160px">
                      <div style="text-align:center">Tuk Tuk Thailand</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGDiscoBeats&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGDiscoBeats.png" style="width:160px">
                      <div style="text-align:center">Disco Beats</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGMountMazuma&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGMountMazuma.png" style="width:160px">
                      <div style="text-align:center">Mount Mazuma</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGFortuneDogs&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGFortuneDogs.png" style="width:160px">
                      <div style="text-align:center">Fortune Dogs</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGJump&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGJump.png" style="width:160px">
                      <div style="text-align:center">Jump!</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGPumpkinPatch&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGPumpkinPatch.png" style="width:160px">
                      <div style="text-align:center">Pumpkin Patch</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGEgyptianDreams&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGEgyptianDreams.png" style="width:160px">
                      <div style="text-align:center">Egyptian Dreams</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGZeus&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGZeus.png" style="width:160px">
                      <div style="text-align:center">Zeus</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGLondonHunter&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGLondonHunter.png" style="width:160px">
                      <div style="text-align:center">London Hunter</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGTreasureTomb&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGTreasureTomb.png" style="width:160px">
                      <div style="text-align:center">Treasure Tomb</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGQueenOfQueens1024&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGQueenOfQueens1024.png" style="width:160px">
                      <div style="text-align:center">Queen of Queens II</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGTheBigDeal&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGTheBigDeal.png" style="width:160px">
                      <div style="text-align:center">The Big Deal</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGPresto&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGPresto.png" style="width:160px">
                      <div style="text-align:center">Presto!</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGKnockoutFootball&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGKnockoutFootball.png" style="width:160px">
                      <div style="text-align:center">Knockout Football</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGEgyptianDreamsDeluxe&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGEgyptianDreamsDeluxe.png" style="width:160px">
                      <div style="text-align:center">Egyptian Dreams Deluxe</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGZeus2&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGZeus2.png" style="width:160px">
                      <div style="text-align:center">Zeus 2</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGPandaPanda&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGPandaPanda.png" style="width:160px">
                      <div style="text-align:center">Panda Panda</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGGlamRock&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGGlamRock.png" style="width:160px">
                      <div style="text-align:center">Glam Rock</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGBombsAway&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGBombsAway.png" style="width:160px">
                      <div style="text-align:center">Bombs Away</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGRollingRoger&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGRollingRoger.png" style="width:160px">
                      <div style="text-align:center">Rolling Roger</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGFireRooster&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGFireRooster.png" style="width:160px">
                      <div style="text-align:center">Fire Rooster</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SG12Zodiacs&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SG12Zodiacs.png" style="width:160px">
                      <div style="text-align:center">12 Zodiacs</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGWaysOfFortune&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGWaysOfFortune.png" style="width:160px">
                      <div style="text-align:center">Ways Of Fortune</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGScruffyScallywags&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGScruffyScallywags.png" style="width:160px">
                      <div style="text-align:center">Scruffy Scallywags</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SG5Mariachis&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SG5Mariachis.png" style="width:160px">
                      <div style="text-align:center">5 Mariachis</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGCakeValley&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGCakeValley.png" style="width:160px">
                      <div style="text-align:center">Cake Valley</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGFenghuang&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGFenghuang.png" style="width:160px">
                      <div style="text-align:center">Fenghuang</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGBirdOfThunder&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGBirdOfThunder.png" style="width:160px">
                      <div style="text-align:center">Bird of Thunder</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGTheDeadEscape&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGTheDeadEscape.png" style="width:160px">
                      <div style="text-align:center">The Dead Escape</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGGoldRush&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGGoldRush.png" style="width:160px">
                      <div style="text-align:center">Gold Rush</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGSparta&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGSparta.png" style="width:160px">
                      <div style="text-align:center">Sparta</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGGangsters&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGGangsters.png" style="width:160px">
                      <div style="text-align:center">Gangsters</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGRuffledUp&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGRuffledUp.png" style="width:160px">
                      <div style="text-align:center">Ruffled Up</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGSuperTwister&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGSuperTwister.png" style="width:160px">
                      <div style="text-align:center">Super Twister</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGCoyoteCrash&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGCoyoteCrash.png" style="width:160px">
                      <div style="text-align:center">Coyote Crash</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGWickedWitch&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGWickedWitch.png" style="width:160px">
                      <div style="text-align:center">Wicked Witch</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGArcaneElements&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGArcaneElements.png" style="width:160px">
                      <div style="text-align:center">Arcane Elements</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGJugglenaut&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGJugglenaut.png" style="width:160px">
                      <div style="text-align:center">Jugglenaut</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGGalacticCash&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGGalacticCash.png" style="width:160px">
                      <div style="text-align:center">Galactic Cash</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGBuggyBonus&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGBuggyBonus.png" style="width:160px">
                      <div style="text-align:center">Buggy Bonus</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGTheDragonCastle&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGTheDragonCastle.png" style="width:160px">
                      <div style="text-align:center">Dragon Castle</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGCarnivalCash&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGCarnivalCash.png" style="width:160px">
                      <div style="text-align:center">Carnival Cash</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGTreasureDiver&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGTreasureDiver.png" style="width:160px">
                      <div style="text-align:center">Treasure Diver</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGDrFeelgood&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGDrFeelgood.png" style="width:160px">
                      <div style="text-align:center">Dr Feelgood</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGDoubleODollars&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGDoubleODollars.png" style="width:160px">
                      <div style="text-align:center">Double O Dollars</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGLittleGreenMoney&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGLittleGreenMoney.png" style="width:160px">
                      <div style="text-align:center">Little Green Money</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGMonsterMashCash&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGMonsterMashCash.png" style="width:160px">
                      <div style="text-align:center">Monster Mash Cash</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGShaolinFortunes100&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGShaolinFortunes100.png" style="width:160px">
                      <div style="text-align:center">Shaolin Fortunes 100</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGShaolinFortunes243&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGShaolinFortunes243.png" style="width:160px">
                      <div style="text-align:center">Shaolin Fortunes</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGPamperMe&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGPamperMe.png" style="width:160px">
                      <div style="text-align:center">Pamper Me</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGSOS&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGSOS.png" style="width:160px">
                      <div style="text-align:center">S.O.S!</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGPoolShark&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGPoolShark.png" style="width:160px">
                      <div style="text-align:center">Pool Shark</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGWeirdScience&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGWeirdScience.png" style="width:160px">
                      <div style="text-align:center">Weird Science</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGBikiniIsland&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGBikiniIsland.png" style="width:160px">
                      <div style="text-align:center">Bikini Island</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGBarnstormerBucks&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGBarnstormerBucks.png" style="width:160px">
                      <div style="text-align:center">Barnstormer Bucks</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGSuperStrike&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGSuperStrike.png" style="width:160px">
                      <div style="text-align:center">Super Strike</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGJungleRumble&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGJungleRumble.png" style="width:160px">
                      <div style="text-align:center">Jungle Rumble</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGSpaceFortune&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGSpaceFortune.png" style="width:160px">
                      <div style="text-align:center">Space Fortune</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGFlyingHigh&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGFlyingHigh.png" style="width:160px">
                      <div style="text-align:center">Flying High</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGMrBling&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGMrBling.png" style="width:160px">
                      <div style="text-align:center">Mr Bling</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGMysticFortune&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGMysticFortune.png" style="width:160px">
                      <div style="text-align:center">Mystic Fortune</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGArcticWonders&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGArcticWonders.png" style="width:160px">
                      <div style="text-align:center">Arctic Wonders</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGTowerOfPizza&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGTowerOfPizza.png" style="width:160px">
                      <div style="text-align:center">Tower Of Pizza</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGMummyMoney&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGMummyMoney.png" style="width:160px">
                      <div style="text-align:center">Mummy Money</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGPuckerUpPrince&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGPuckerUpPrince.png" style="width:160px">
                      <div style="text-align:center">Pucker Up Prince</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGSirBlingalot&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGSirBlingalot.png" style="width:160px">
                      <div style="text-align:center">Sir Blingalot</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGCashReef&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGCashReef.png" style="width:160px">
                      <div style="text-align:center">Cash Reef</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGQueenOfQueens243&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGQueenOfQueens243.png" style="width:160px">
                      <div style="text-align:center">Queen of Queens</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGAllForOne&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGAllForOne.png" style="width:160px">
                      <div style="text-align:center">All For One</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGIndianCashCatcher&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGIndianCashCatcher.png" style="width:160px">
                      <div style="text-align:center">Indian Cash Catcher</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGGrapeEscape&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGGrapeEscape.png" style="width:160px">
                      <div style="text-align:center">Grape Escape</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGGoldenUnicorn&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGGoldenUnicorn.png" style="width:160px">
                      <div style="text-align:center">Golden Unicorn</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGFrontierFortunes&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGFrontierFortunes.png" style="width:160px">
                      <div style="text-align:center">Frontier Fortunes</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGRodeoDrive&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGRodeoDrive.png" style="width:160px">
                      <div style="text-align:center">Rodeo Drive</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGCashosaurus&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGCashosaurus.png" style="width:160px">
                      <div style="text-align:center">Cashosaurus</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGDiscoFunk&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGDiscoFunk.png" style="width:160px">
                      <div style="text-align:center">Disco Funk</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGHauntedHouse&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGHauntedHouse.png" style="width:160px">
                      <div style="text-align:center">Haunted House</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGMagicOak&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGMagicOak.png" style="width:160px">
                      <div style="text-align:center">Magic Oak</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGLuckyLucky&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGLuckyLucky.png" style="width:160px">
                      <div style="text-align:center">Lucky Lucky</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGNuwa&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGNuwa.png" style="width:160px">
                      <div style="text-align:center">Nuwa</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGColossalGems&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGColossalGems.png" style="width:160px">
                      <div style="text-align:center">Colossal Gems</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGWizardsWantWar&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGWizardsWantWar.png" style="width:160px">
                      <div style="text-align:center">Wizards Want War</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGNaughtySanta&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGNaughtySanta.png" style="width:160px">
                      <div style="text-align:center">Naughty Santa</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGLoonyBlox&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGLoonyBlox.png" style="width:160px">
                      <div style="text-align:center">Loony Blox</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGKnockoutFootballRush&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGKnockoutFootballRush.png" style="width:160px">
                      <div style="text-align:center">Knockout Football Rush</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGLuckyFortuneCat&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGLuckyFortuneCat.png" style="width:160px">
                      <div style="text-align:center">Lucky Fortune Cat</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGTechnoTumble&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGTechnoTumble.png" style="width:160px">
                      <div style="text-align:center">Techno Tumble</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGScopa&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGScopa.png" style="width:160px">
                      <div style="text-align:center">Scopa</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGHeySushi&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGHeySushi.png" style="width:160px">
                      <div style="text-align:center">Hey Sushi</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGJellyFishFlow&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGJellyFishFlow.png" style="width:160px">
                      <div style="text-align:center">JellyFish Flow</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGJellyFishFlowUltra&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGJellyFishFlowUltra.png" style="width:160px">
                      <div style="text-align:center">JellyFish Flow Ultra</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGHappyApe&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGHappyApe.png" style="width:160px">
                      <div style="text-align:center">Happy Ape</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGTabernaDeLosMuertos&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGTabernaDeLosMuertos.png" style="width:160px">
                      <div style="text-align:center">Taberna De Los Muertos</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGChristmasGiftRush&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGChristmasGiftRush.png" style="width:160px">
                      <div style="text-align:center">Christmas Gift Rush</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGOrbsOfAtlantis&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGOrbsOfAtlantis.png" style="width:160px">
                      <div style="text-align:center">Orbs Of Atlantis</div>
                    </a></div>
                </div>
                <div id="hbhot" class="tab-pane fade">
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGHotHotFruit&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGHotHotFruit.png" style="width:160px">
                      <div style="text-align:center">Hot Hot Fruit</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGTheKoiGate&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGTheKoiGate.png" style="width:160px">
                      <div style="text-align:center">Koi Gate</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGWealthInn&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGWealthInn.png" style="width:160px">
                      <div style="text-align:center">Wealth Inn</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGMysticFortuneDeluxe&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGMysticFortuneDeluxe.png" style="width:160px">
                      <div style="text-align:center">Mystic Fortune Deluxe</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGWildTrucks&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGWildTrucks.png" style="width:160px">
                      <div style="text-align:center">Wild Trucks</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGCrystopia&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGCrystopia.png" style="width:160px">
                      <div style="text-align:center">Crystopia</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SG5LuckyLions&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SG5LuckyLions.png" style="width:160px">
                      <div style="text-align:center">5 Lucky Lions</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGLaughingBuddha&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGLaughingBuddha.png" style="width:160px">
                      <div style="text-align:center">Laughing Buddha</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGSirensSpell&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGSirensSpell.png" style="width:160px">
                      <div style="text-align:center">Siren's Spell</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGHappiestChristmasTree&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGHappiestChristmasTree.png" style="width:160px">
                      <div style="text-align:center">Happiest Christmas Tree</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGLegendaryBeasts&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGLegendaryBeasts.png" style="width:160px">
                      <div style="text-align:center">Legendary Beasts</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGLanternLuck&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGLanternLuck.png" style="width:160px">
                      <div style="text-align:center">Lantern Luck</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGFaCaiShen&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGFaCaiShen.png" style="width:160px">
                      <div style="text-align:center">Fa Cai Shen</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGFaCaiShenDeluxe&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGFaCaiShenDeluxe.png" style="width:160px">
                      <div style="text-align:center">Fa Cai Shen Deluxe</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGHotHotHalloween&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGHotHotHalloween.png" style="width:160px">
                      <div style="text-align:center">Hot Hot Halloween</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGTheBigDealDeluxe&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGTheBigDealDeluxe.png" style="width:160px">
                      <div style="text-align:center">The Big Deal Deluxe</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGFourDivineBeasts&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGFourDivineBeasts.png" style="width:160px">
                      <div style="text-align:center">Four Divine Beasts</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGSojuBomb&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGSojuBomb.png" style="width:160px">
                      <div style="text-align:center">Soju Bomb</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGTukTukThailand&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGTukTukThailand.png" style="width:160px">
                      <div style="text-align:center">Tuk Tuk Thailand</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SGDiscoBeats&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SGDiscoBeats.png" style="width:160px">
                      <div style="text-align:center">Disco Beats</div>
                    </a></div>
                </div>
                <div id="poker" class="tab-pane fade">
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=EURoulette&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/EURoulette.png" style="width:160px">
                      <div style="text-align:center">Roulette</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=SicBo&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/SicBo.png" style="width:160px">
                      <div style="text-align:center">Sic Bo</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=AmericanBaccarat&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/AmericanBaccarat.png" style="width:160px">
                      <div style="text-align:center">Baccarat</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=Baccarat3HZC&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/Baccarat3HZC.png" style="width:160px">
                      <div style="text-align:center">Baccarat Zero Commission</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=CaribbeanStud&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/CaribbeanStud.png" style="width:160px">
                      <div style="text-align:center">Caribbean Stud</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=TGThreeCardPoker&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/TGThreeCardPoker.png" style="width:160px">
                      <div style="text-align:center">Three Card Poker</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=TGThreeCardPokerDeluxe&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/TGThreeCardPokerDeluxe.png" style="width:160px">
                      <div style="text-align:center">Three Card Poker Deluxe</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=TGWar&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/TGWar.png" style="width:160px">
                      <div style="text-align:center">War</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=TGDragonTiger&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/TGDragonTiger.png" style="width:160px">
                      <div style="text-align:center">Dragon Tiger</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=TGBlackjackAmerican&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/TGBlackjackAmerican.png" style="width:160px">
                      <div style="text-align:center">American Blackjack</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=BlackJack3H&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/BlackJack3H.png" style="width:160px">
                      <div style="text-align:center">Blackjack (3 Hand)</div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=BlackJack3HDoubleExposure&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/BlackJack3HDoubleExposure.png" style="width:160px">
                      <div style="text-align:center">Double Exposure (3 Hand)</div>
                    </a></div>
                </div>
                <div id="other" class="tab-pane fade">
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=JokerPoker1Hand&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/JokerPoker.png" style="width:160px">
                      <div style="text-align:center">Joker Poker </div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=TensorBetter1Hand&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/TensorBetter.png" style="width:160px">
                      <div style="text-align:center">Tens or Better </div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=DoubleDoubleBonusPoker1Hand&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/DoubleDoubleBonusPoker.png" style="width:160px">
                      <div style="text-align:center">Double Double Bonus Poker </div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=DoubleBonusPoker1Hand&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/DoubleBonusPoker.png" style="width:160px">
                      <div style="text-align:center">Double Bonus Poker </div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=BonusPoker1Hand&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/BonusPoker.png" style="width:160px">
                      <div style="text-align:center">Bonus Poker </div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=AllAmericanPoker1Hand&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/AllAmericanPoker.png" style="width:160px">
                      <div style="text-align:center">All American Poker </div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=BonusDuecesWild1Hand&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/BonusDuecesWild.png" style="width:160px">
                      <div style="text-align:center">Bonus Deuces Wild </div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=AcesandEights1Hand&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/AcesandEights.png" style="width:160px">
                      <div style="text-align:center">Aces and Eights </div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=DuecesWild1Hand&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/DuecesWild.png" style="width:160px">
                      <div style="text-align:center">Deuces Wild </div>
                    </a></div>
                  <div class="gameList" style="height:190px; width:185px; float:left; text-align:center; vertical-align:top;"><a target="embedgameIframe" href="https://app-a.hbsecure.com/go.ashx?brandid=c818b39a-59eb-ed11-800f-0050f2d4759c&keyname=JacksorBetter1Hand&token=0ljX7k4Zrtk29CN1K0m81jcf8LPGiVUCHLoXzAiq2Q0%3D&mode=real&locale=id&lobbyurl=pm-closed&ifrm=1&hideCS=1"><img src="https://img.pay4d.info/hb/images/circle/JacksorBetter.png" style="width:160px">
                      <div style="text-align:center">Jacks or Better </div>
                    </a></div>
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
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=uslsxObHtxCT5aNan0l%2BsbuBVjxYq5IWElhxP3eVnjA%3D&token=r1meMXIBY2b1l10TwIJ7MpYnU1BDaOmgtGYR3ea4Fbw%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ion/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=OVpVhstYy8F4qWFkg1RH8B9l%2BFZJxmdbD4CIsov9Qc0%3D&token=r1meMXIBY2b1l10TwIJ7MpYnU1BDaOmgtGYR3ea4Fbw%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ion/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=6PcK9z0%2Fi3dYwr9IL9mj06%2FZ3zi8XKuZ2XNiPQtEziU%3D&token=r1meMXIBY2b1l10TwIJ7MpYnU1BDaOmgtGYR3ea4Fbw%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ion/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sicbo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=sKWY3Gs%2Bh%2BNxLxevtm1NUf%2Bzd%2B%2BAJC%2B%2Fp4D4SDdC8d4%3D&token=r1meMXIBY2b1l10TwIJ7MpYnU1BDaOmgtGYR3ea4Fbw%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://opus-api.lk-acc-n1.com/opus/launch?cookie=HJipy%2FtS9ZFzng6imt%2FnC9mPYu81jSCkS45KxuGGUbg%3D&gameType=BA', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/og/images/BA.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://opus-api.lk-acc-n1.com/opus/launch?cookie=HJipy%2FtS9ZFzng6imt%2FnC9mPYu81jSCkS45KxuGGUbg%3D&gameType=RO', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/og/images/RO.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://opus-api.lk-acc-n1.com/opus/launch?cookie=HJipy%2FtS9ZFzng6imt%2FnC9mPYu81jSCkS45KxuGGUbg%3D&gameType=DC', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=4qMN1jTQazhGWtvsuoH2gy%2BKDUMO29tL4EIMY%2FbnZAw%3D&category=top_games', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/top_games.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Top Games</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=4qMN1jTQazhGWtvsuoH2gy%2BKDUMO29tL4EIMY%2FbnZAw%3D&category=game_shows', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/game_shows.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Game Shows</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=4qMN1jTQazhGWtvsuoH2gy%2BKDUMO29tL4EIMY%2FbnZAw%3D&category=baccarat', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=4qMN1jTQazhGWtvsuoH2gy%2BKDUMO29tL4EIMY%2FbnZAw%3D&category=roulette', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=4qMN1jTQazhGWtvsuoH2gy%2BKDUMO29tL4EIMY%2FbnZAw%3D&category=sicbo', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sicbo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=4qMN1jTQazhGWtvsuoH2gy%2BKDUMO29tL4EIMY%2FbnZAw%3D&category=dragontiger', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/dragontiger.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=4qMN1jTQazhGWtvsuoH2gy%2BKDUMO29tL4EIMY%2FbnZAw%3D&category=blackjack', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/blackjack.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Blackjack</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=4qMN1jTQazhGWtvsuoH2gy%2BKDUMO29tL4EIMY%2FbnZAw%3D&category=poker', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/poker.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Poker</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=4qMN1jTQazhGWtvsuoH2gy%2BKDUMO29tL4EIMY%2FbnZAw%3D&category=bacbo', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/bacbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Bac Bo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=4qMN1jTQazhGWtvsuoH2gy%2BKDUMO29tL4EIMY%2FbnZAw%3D&category=fantan', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/fantan.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Fan Tan</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=4qMN1jTQazhGWtvsuoH2gy%2BKDUMO29tL4EIMY%2FbnZAw%3D&category=andarbahar', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/andarbahar.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Andar Bahar</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=4qMN1jTQazhGWtvsuoH2gy%2BKDUMO29tL4EIMY%2FbnZAw%3D&category=craps', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/craps.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Craps</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=4qMN1jTQazhGWtvsuoH2gy%2BKDUMO29tL4EIMY%2FbnZAw%3D&category=teenpatti', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=exLtKSn0HzC33qM%2Fht9%2FPY1kextb3Z7Ebul5CMx%2FLnI%3D&token=bztq%2BooRW1meWvQ3ZF3ZUPlLGGoLG0WPD5stwbp5Rfw%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/sx/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=cniONcbnm%2Bl8XWGY6jKAOzNYyJ4x%2BihQZXHzWccj1NA%3D&token=bztq%2BooRW1meWvQ3ZF3ZUPlLGGoLG0WPD5stwbp5Rfw%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/sx/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=JJ1q6CJX%2BvcuBdj9TfhZDvX6n4H0ouTn4lWYAVx2xtg%3D&token=bztq%2BooRW1meWvQ3ZF3ZUPlLGGoLG0WPD5stwbp5Rfw%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/sx/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">SicBo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=h7FbeD%2Fi6QkbAW0xhBDP6ritlqpkc5P2hsVDmUANXV0%3D&token=bztq%2BooRW1meWvQ3ZF3ZUPlLGGoLG0WPD5stwbp5Rfw%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DRCQrortWvSodALH7rlPt%2Fqh9VHKeZINjwp%2Bk%2BHtiv5k%3D%26symbol%3D101%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/101.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Top Games</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DRCQrortWvSodALH7rlPt%2Fqh9VHKeZINjwp%2Bk%2BHtiv5k%3D%26symbol%3D104%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/104.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat Lobby</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DRCQrortWvSodALH7rlPt%2Fqh9VHKeZINjwp%2Bk%2BHtiv5k%3D%26symbol%3D102%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/102.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette Lobby</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DRCQrortWvSodALH7rlPt%2Fqh9VHKeZINjwp%2Bk%2BHtiv5k%3D%26symbol%3D103%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/103.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Blackjack Lobby</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DRCQrortWvSodALH7rlPt%2Fqh9VHKeZINjwp%2Bk%2BHtiv5k%3D%26symbol%3D1001%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1001.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DRCQrortWvSodALH7rlPt%2Fqh9VHKeZINjwp%2Bk%2BHtiv5k%3D%26symbol%3D1024%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1024.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Andar Bahar</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DRCQrortWvSodALH7rlPt%2Fqh9VHKeZINjwp%2Bk%2BHtiv5k%3D%26symbol%3D204%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/204.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Mega Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DRCQrortWvSodALH7rlPt%2Fqh9VHKeZINjwp%2Bk%2BHtiv5k%3D%26symbol%3D701%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/701.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Mega Sicbo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DRCQrortWvSodALH7rlPt%2Fqh9VHKeZINjwp%2Bk%2BHtiv5k%3D%26symbol%3D801%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/801.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Mega Wheel</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DRCQrortWvSodALH7rlPt%2Fqh9VHKeZINjwp%2Bk%2BHtiv5k%3D%26symbol%3D240%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/240.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Power Up Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DRCQrortWvSodALH7rlPt%2Fqh9VHKeZINjwp%2Bk%2BHtiv5k%3D%26symbol%3D1101%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1101.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sweet Bonanza Candyland</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DRCQrortWvSodALH7rlPt%2Fqh9VHKeZINjwp%2Bk%2BHtiv5k%3D%26symbol%3D1302%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1302.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Spaceman</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DRCQrortWvSodALH7rlPt%2Fqh9VHKeZINjwp%2Bk%2BHtiv5k%3D%26symbol%3D1401%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1401.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Boom City</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DRCQrortWvSodALH7rlPt%2Fqh9VHKeZINjwp%2Bk%2BHtiv5k%3D%26symbol%3D1601%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=0&token=nFbUad5Wg88ELrmOcKygc5ToDf8vYPu46yjAGU%2BpEok%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/hotgames.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Hot Games</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=100&token=nFbUad5Wg88ELrmOcKygc5ToDf8vYPu46yjAGU%2BpEok%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/dragonhall.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">DragonHall</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=106&token=nFbUad5Wg88ELrmOcKygc5ToDf8vYPu46yjAGU%2BpEok%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/quickhall.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">QuickHall</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=102&token=nFbUad5Wg88ELrmOcKygc5ToDf8vYPu46yjAGU%2BpEok%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/multiplay.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">MultiPlay</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=104&token=nFbUad5Wg88ELrmOcKygc5ToDf8vYPu46yjAGU%2BpEok%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/seecardbaccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">SeeCard Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=101&token=nFbUad5Wg88ELrmOcKygc5ToDf8vYPu46yjAGU%2BpEok%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=105&token=nFbUad5Wg88ELrmOcKygc5ToDf8vYPu46yjAGU%2BpEok%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/sexybaccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sexy Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=110&token=nFbUad5Wg88ELrmOcKygc5ToDf8vYPu46yjAGU%2BpEok%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/insurancebaccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Insurance Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=401&token=nFbUad5Wg88ELrmOcKygc5ToDf8vYPu46yjAGU%2BpEok%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=402&token=nFbUad5Wg88ELrmOcKygc5ToDf8vYPu46yjAGU%2BpEok%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/sexyroulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sexy Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=201&token=nFbUad5Wg88ELrmOcKygc5ToDf8vYPu46yjAGU%2BpEok%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">SicBoHiLo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=301&token=nFbUad5Wg88ELrmOcKygc5ToDf8vYPu46yjAGU%2BpEok%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/dragontiger.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=801&token=nFbUad5Wg88ELrmOcKygc5ToDf8vYPu46yjAGU%2BpEok%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/bullbull.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">BullBull</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=901&token=nFbUad5Wg88ELrmOcKygc5ToDf8vYPu46yjAGU%2BpEok%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/win3cards.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Win3Cards</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=501&token=nFbUad5Wg88ELrmOcKygc5ToDf8vYPu46yjAGU%2BpEok%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=UANemnusPgJtWxdjPxX0DRKDTWKrJVseabflZGxoeKTSIYPf6xE7zh%2BF2%2FDqZ4zfMF9pELitnCBMZITSgPiE6RVfsk0IS2hVmb%2FXy9FvPbwkCGnIOgjvIKaThY0YS17ZyXL%2BpPAiMyHCNbmaLGoTTvOMHVSHc2jp4xj0u17TPkdQ0TwrsTPUH%2FPWejaoDW8tbXgos4X1L8OH8Q6%2Fcm8UBg%3D%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_baccarat_playboy_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Playboy Club</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=Dr4EAm0Bo9KF9ZSDiDhrJdoo5OSoCtXN2ae8Uf13Az8Mnm7sBjM6gMnF%2FyBnXm%2FhPzcaP8hpptR1t3X9wKxBtKaI7BFmNgKdWkdNWYWRXjOPVxZIUNRLLqYTjmodUxNPm%2BDaIODgLk5qVOe7KExhp9C45OUDVp3zwjz%2Fd4PxkaI%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_baccarat_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Bonus Baccarat</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=QPINYuRNXuHeXD4M1kd3UtnETF%2Fp7zi%2FkonLSSKBF3mKiGzR0w9PEff66a0JzPvCi6aKRVdgvOFPddOgBFOsF8pmnyFb8XeQ4wzXCyJDCUGAfHILlKwgJiyRR6R5L6f8yt8Xjjv1wMBzzgmNs7NVHFLXCLmv6T9nfsplKXfdfbA%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_baccaratnc_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">No Com Bonus Baccarat</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=qkXx2gX%2BzaEZf0M2n%2BX3k5jsDvnzmgRWruIRDZyoeOFtVnC2PZf7ddXT7joU3zDBKUiEMf7eP9V09kMWry1iVlWhdhFD71AKxjzhVqVkWvDGcWtr99NWmKc8BJzA0a5kWxYuCaavKES6YOF5ku8g5KzBRpHIT%2FT4VcJ695H4Hz8Y1PB7e2%2FRZdk%2BOVyWgm2x1ZUvIiGD7%2FyO61SksBdjTQ%3D%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_mp_baccarat_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Baccarat</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=wlshPq%2FaS9TVTAc0Mofw%2Bt6KAfqUiQvrDAYe0WTUSpx8S0rzBF%2BSX%2BUiKGuOFNYvvsk%2FhuDJqOC2iqXTz6yU2Eb%2FmwJldk09hKYRYbPwWP8ohGZqBDre2oXUJrczfteUy7f4lcLbPKtptOcaqfbCjLb5X4eNA6nCUlFAR4XZDSc%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_roulette_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Roulette </div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=ZMLEKQBpCMG4LHXjVSnbIVzAhTL%2FhwTSkXmXkIkrrQZLyoruqMIz8mvFkFHQzV9yKObnlxkwNBUWCcU3Oip130%2FOnuQxUs9oXsVmWxQ5vH6TPdDkEgO53HLdkvgRY5YfRMJ6HK02AMMPuy0PB2bESg3L2PYtgBUjd%2BAhq3V5zAs%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
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
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=di2lLeeAAUXEqoeajIfoj98lFBzrUZtZsfBqKcrV8HY%3D&game=baccarat', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/baccarat.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Baccarat</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=di2lLeeAAUXEqoeajIfoj98lFBzrUZtZsfBqKcrV8HY%3D&game=roulette', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/roulette.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Roulette</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=di2lLeeAAUXEqoeajIfoj98lFBzrUZtZsfBqKcrV8HY%3D&game=sicbo', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/sicbo.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Sicbo</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=di2lLeeAAUXEqoeajIfoj98lFBzrUZtZsfBqKcrV8HY%3D&game=dragontiger', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/dragontiger.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=di2lLeeAAUXEqoeajIfoj98lFBzrUZtZsfBqKcrV8HY%3D&game=12baccarat', '_blank', 'width=1366, height=900, top=0, left=0')">
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
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=jfu6Ct4hXxMlDR2SmH2D9YffEsrcL0WzTqpFGlK2xA0%3D&game=baccarat', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/baccaratlobby.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Baccarat Lobby</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=jfu6Ct4hXxMlDR2SmH2D9YffEsrcL0WzTqpFGlK2xA0%3D&game=roulette', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/eroulette.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Roulette</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=jfu6Ct4hXxMlDR2SmH2D9YffEsrcL0WzTqpFGlK2xA0%3D&game=croulette', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/croulette.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Sexy Roulette</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=jfu6Ct4hXxMlDR2SmH2D9YffEsrcL0WzTqpFGlK2xA0%3D&game=sicbo', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/esicbo.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Sicbo</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=jfu6Ct4hXxMlDR2SmH2D9YffEsrcL0WzTqpFGlK2xA0%3D&game=dragontiger', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/edragontiger.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=jfu6Ct4hXxMlDR2SmH2D9YffEsrcL0WzTqpFGlK2xA0%3D&game=pokdeng', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/epokdeng.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Pok Deng</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=jfu6Ct4hXxMlDR2SmH2D9YffEsrcL0WzTqpFGlK2xA0%3D&game=andarbahar', '_blank', 'width=1366, height=900, top=0, left=0')">
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
          <a onClick="window.open('https://ws168.lk-acc-n1.com/ws/launch?token=d33lDlJUFnW9De37%2B0bTfozJIy%2FANHWu1g2DKgIQ0lA%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
            <img src="https://img.pay4d.info/wslogo.png" style="cursor: pointer;">
            <div>WS168</div>
          </a>
        </div>

        <div style="clear: both;"></div>

      </div>




      <div id="sport_wrap" class="tab-pane fade in">
        <hr style="margin-top: 5px">
        <div style="margin: 10px 0px 10px 10px; text-align: center; width: 200px; float: left">
          <a onClick="window.open('https://saba.lk-acc-n1.com/?p=d&token=15Wg2FekFBZ8qKxDi124Sai4NYsyw22g6bTLgcWQwvs%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
            <img src="https://img.pay4d.info/sabalogo.png" style="cursor: pointer;">
            <div>Saba Sports<BR>[Rasio Credit 1:1000]</div>
          </a>
        </div>

        <div style="margin: 10px 0px 10px 10px; text-align: center; width: 200px; float: left">
          <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=di2lLeeAAUXEqoeajIfoj98lFBzrUZtZsfBqKcrV8HY%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
            <img src="https://img.pay4d.info/sbologo.png" style="cursor: pointer;">
            <div>SBO Sports<BR>[Rasio Credit 1:1000]</div>
          </a>
        </div>

        <div style="margin: 10px 0px 10px 10px; text-align: center; width: 200px; float: left">
          <a onClick="window.open('https://tfsport.lk-acc-n1.com/tf/launch?token=5Z3NCwvLCeHV2peNCvxMaTWRJUmdXcJTZFmdEwINelE%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
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
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=aNPkkDi9eCFQXg2uFPE6%2FFML4vBInnviYxPqibcok%2BA%3D&game=F-SF01&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-SF01.png" style="width:160px;">
                      <div style="text-align:center;">Fishing God<br>[Rasio Credit 1:10]</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=aNPkkDi9eCFQXg2uFPE6%2FFML4vBInnviYxPqibcok%2BA%3D&game=F-SF02&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-SF02.png" style="width:160px;">
                      <div style="text-align:center;">Fishing War<br>[Rasio Credit 1:10]</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=aNPkkDi9eCFQXg2uFPE6%2FFML4vBInnviYxPqibcok%2BA%3D&game=F-AH01&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-AH01.png" style="width:160px;">
                      <div style="text-align:center;">Alien Hunter<br>[Rasio Credit 1:10]</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=aNPkkDi9eCFQXg2uFPE6%2FFML4vBInnviYxPqibcok%2BA%3D&game=F-ZP01&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-ZP01.png" style="width:160px;">
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
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=%2Be1U1PfgmJFG8cyEoq3Xae0DhGgY66D0XeACBR3ZkbA%3D&gameid=212"><img src="https://img.pay4d.info/jl/images/212.png" style="width:160px;">
                      <div style="text-align:center;">Dinosaur Tycoon II</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=%2Be1U1PfgmJFG8cyEoq3Xae0DhGgY66D0XeACBR3ZkbA%3D&gameid=32"><img src="https://img.pay4d.info/jl/images/32.png" style="width:160px;">
                      <div style="text-align:center;">Jackpot Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=%2Be1U1PfgmJFG8cyEoq3Xae0DhGgY66D0XeACBR3ZkbA%3D&gameid=82"><img src="https://img.pay4d.info/jl/images/82.png" style="width:160px;">
                      <div style="text-align:center;">Happy Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=%2Be1U1PfgmJFG8cyEoq3Xae0DhGgY66D0XeACBR3ZkbA%3D&gameid=119"><img src="https://img.pay4d.info/jl/images/119.png" style="width:160px;">
                      <div style="text-align:center;">All-star Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=%2Be1U1PfgmJFG8cyEoq3Xae0DhGgY66D0XeACBR3ZkbA%3D&gameid=1"><img src="https://img.pay4d.info/jl/images/1.png" style="width:160px;">
                      <div style="text-align:center;">Royal Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=%2Be1U1PfgmJFG8cyEoq3Xae0DhGgY66D0XeACBR3ZkbA%3D&gameid=71"><img src="https://img.pay4d.info/jl/images/71.png" style="width:160px;">
                      <div style="text-align:center;">Boom Legend</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=%2Be1U1PfgmJFG8cyEoq3Xae0DhGgY66D0XeACBR3ZkbA%3D&gameid=74"><img src="https://img.pay4d.info/jl/images/74.png" style="width:160px;">
                      <div style="text-align:center;">Mega Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=%2Be1U1PfgmJFG8cyEoq3Xae0DhGgY66D0XeACBR3ZkbA%3D&gameid=42"><img src="https://img.pay4d.info/jl/images/42.png" style="width:160px;">
                      <div style="text-align:center;">Dinosaur Tycoon</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=%2Be1U1PfgmJFG8cyEoq3Xae0DhGgY66D0XeACBR3ZkbA%3D&gameid=20"><img src="https://img.pay4d.info/jl/images/20.png" style="width:160px;">
                      <div style="text-align:center;">Bombing Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=%2Be1U1PfgmJFG8cyEoq3Xae0DhGgY66D0XeACBR3ZkbA%3D&gameid=60"><img src="https://img.pay4d.info/jl/images/60.png" style="width:160px;">
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
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=kgECKPQtSkjPmUCf0bpxT%2Bo%2BbezEpoP%2F5uuCndDluHg%3D&gameid=PSF-ON-00006"><img src="https://img.pay4d.info/ps/images/PSF-ON-00006.png" style="width:160px;">
                      <div style="text-align:center;">Fishing Fa Fa Fa</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=kgECKPQtSkjPmUCf0bpxT%2Bo%2BbezEpoP%2F5uuCndDluHg%3D&gameid=PSF-ON-00005"><img src="https://img.pay4d.info/ps/images/PSF-ON-00005.png" style="width:160px;">
                      <div style="text-align:center;">Fishing In Thailand</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=kgECKPQtSkjPmUCf0bpxT%2Bo%2BbezEpoP%2F5uuCndDluHg%3D&gameid=PSF-ON-00004"><img src="https://img.pay4d.info/ps/images/PSF-ON-00004.png" style="width:160px;">
                      <div style="text-align:center;">Fishing Foodie</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=kgECKPQtSkjPmUCf0bpxT%2Bo%2BbezEpoP%2F5uuCndDluHg%3D&gameid=PSF-ON-00003"><img src="https://img.pay4d.info/ps/images/PSF-ON-00003.png" style="width:160px;">
                      <div style="text-align:center;">Zombie Bonus</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=kgECKPQtSkjPmUCf0bpxT%2Bo%2BbezEpoP%2F5uuCndDluHg%3D&gameid=PSF-ON-00002"><img src="https://img.pay4d.info/ps/images/PSF-ON-00002.png" style="width:160px;">
                      <div style="text-align:center;">Spicy Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=kgECKPQtSkjPmUCf0bpxT%2Bo%2BbezEpoP%2F5uuCndDluHg%3D&gameid=PSF-ON-00001"><img src="https://img.pay4d.info/ps/images/PSF-ON-00001.png" style="width:160px;">
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
                  <div class="gameList_f" style="height:205px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://fastspin.lk-acc-n1.com/fs/launch?token=K5D225YIh8AQpih9XzWv2nX8j6iEAbdoGf9WnFTHD6U%3D&game=F-FT01"><img src="https://img.pay4d.info/fs/images/F-FT01.jpg" style="width:155px;">
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