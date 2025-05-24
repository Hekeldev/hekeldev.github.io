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
            var timeSKA = 32172;
            setInterval(function() {
              timeSKA--;
              if (timeSKA < 3600) $('#pidSKA').text(secondtominute(timeSKA));
            }, 1000);
          </script>
          <li style="font-size:14px; width:228px; font-weight:bold; margin-left:0px; opacity:1.0;"><a data-toggle="pill" href="#sakatoto_wrap"><span id="p_sakatoto" class="glyphicon"></span><span class="nama_pasaran_sakatoto"></span>
              <span id="pidSKT" style="float:right; font-weight:normal; font-size:10px;" class="blink_me"></span></a></li>
          <script>
            var timeSKT = 42972;
            setInterval(function() {
              timeSKT--;
              if (timeSKT < 3600) $('#pidSKT').text(secondtominute(timeSKT));
            }, 1000);
          </script>
          <li style="font-size:14px; width:228px; font-weight:bold; margin-left:0px; opacity:1.0;"><a data-toggle="pill" href="#saka4d_wrap"><span id="p_saka4d" class="glyphicon"></span><span class="nama_pasaran_saka4d"></span>
              <span id="pidSKD" style="float:right; font-weight:normal; font-size:10px;" class="blink_me"></span></a></li>
          <script>
            var timeSKD = 50172;
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
            <li class="active" id="tab_jg" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a href="?login=89j3vu4unVSW8Bny&games&gid=jg"><span><img src="https://img.pay4d.info/jg-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />Joker Gaming</span>
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






            <div id="games_window_jg" class="tab-pane fade in active">


              <div class="row">
                <div class="col-md-9">


                  <ul class="nav nav-pills">
                    <li style="width:120px;" class="active"><a data-toggle="pill" href="#jgslot">&#10024; Slots</a></li>
                    <li style="width:150px"><a data-toggle="pill" href="#jghot">&#128293; Top 20 Games</a></li>
                    <li style="width:200px"><a data-toggle="pill" href="#jgpoker">&clubs; Card &amp Table Games</a></li>
                  </ul>
                </div>
                <div class="col-md-3" style="padding-top:5px">
                  <form method="GET" style="float:right;">
                    <div class="input-group">
                      <input type="text" class="form-control" name="s" placeholder="Search Game" value="">
                      <input type="hidden" name="gid" value="jg">
                      <input type="hidden" name="games">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-sm btn-danger" style="height:27px; padding-top:4px; margin-top:-1px"><i class="glyphicon glyphicon-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div style="margin-top:5px; margin-bottom:6px;">
                <span class="text-warning">Catatan:</span> Rasio Credit di dalam Game <span class="text-info">1:1000</span>
              </div>


              <div class="tab-content" style="margin-top:20px">

                <div id="jgslot" style="height:568px; overflow:auto" class="tab-pane fade in active">
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=zezjtt6ras7ms&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/zezjtt6ras7ms.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Leprechaun</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=4py9dmfpwkt4y&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/4py9dmfpwkt4y.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Date With Miyo</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=ooekf9x16xaxn&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/ooekf9x16xaxn.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Kraken Hunter</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=uh4amsg355x7a&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/uh4amsg355x7a.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Fruit Paradise</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=67s75yrbo4dae&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/67s75yrbo4dae.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Majapahit</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=ape6dxf7sk35y&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/ape6dxf7sk35y.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Roma Legacy</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=3jxqtp7wssiks&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/3jxqtp7wssiks.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">The Legend of White Snake</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=c53raraonrmbq&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/c53raraonrmbq.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Pan Jian Lian 2</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=e9qs4cbtga5ue&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/e9qs4cbtga5ue.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Wealth God</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=orm4x9z99u69r&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/orm4x9z99u69r.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">League of Legends</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=texkt79w6ziqs&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/texkt79w6ziqs.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Wukong</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=b4pde45epfzg6&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/b4pde45epfzg6.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Genie 2</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=y4jnah5oqf58q&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/y4jnah5oqf58q.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Yakuza</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=h33c3rho1gmjq&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/h33c3rho1gmjq.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Street of Chicago</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=rg5oqz19mtqir&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/rg5oqz19mtqir.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Bali</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=ww3a8wsu4de7c&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/ww3a8wsu4de7c.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Sizzling Hot</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=soojfuqnaxycn&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/soojfuqnaxycn.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Hot Fruits</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=3yfmucpss64mk&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/3yfmucpss64mk.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Dragon Power Flame</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=86burqb38a9ua&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/86burqb38a9ua.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Bushido Blade</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=mur8wje4dccb1&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/mur8wje4dccb1.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Scheherazade</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=5m6k9j7rwspjs&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/5m6k9j7rwspjs.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Roma</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=j9nzkkbjfaz1a&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/j9nzkkbjfaz1a.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Horus Eye</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=wcaadzg74mj7y&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/wcaadzg74mj7y.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Lady Hawk</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=zygj7oqga9nck&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/zygj7oqga9nck.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Caishen Riches</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=satj3o6ya8dcq&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/satj3o6ya8dcq.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Just Jewels Deluxe</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=byz81hmsq748k&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/byz81hmsq748k.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Supreme Caishen</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=3fx69pizs144w&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/3fx69pizs144w.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Lucky Streak</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=ur8593z8hu17w&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/ur8593z8hu17w.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Burning Pearl</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=b1cnw7mkppwg1&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/b1cnw7mkppwg1.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Thug Life</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=96k1k6d3x39za&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/96k1k6d3x39za.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Big Game Safari</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=qd1fcneqbhgy4&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/qd1fcneqbhgy4.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Immortals</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=6po7ddrpokbay&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/6po7ddrpokbay.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Alice In Wonderland</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=yqe1n9d7qj3zy&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/yqe1n9d7qj3zy.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Three Kingdoms 2</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=5bgx7epgw61kk&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/5bgx7epgw61kk.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Queen 2</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=4jdxbm7cistkg&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/4jdxbm7cistkg.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Talisman</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=abkqpqp6z66m4&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/abkqpqp6z66m4.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Santa Workshop</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=y6q14hdtq35ze&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/y6q14hdtq35ze.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Beach Life</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=ggutqu1xjtgwr&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/ggutqu1xjtgwr.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Oasis</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=e5jgac3ogr5dq&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/e5jgac3ogr5dq.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Ranchers Wealth</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=kxyznmbpret1y&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/kxyznmbpret1y.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Enchanted Forest</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=d4fyes4amfxf6&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/d4fyes4amfxf6.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Feng Huang</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=a7q65cfts455e&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/a7q65cfts455e.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Ong Bak 2</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=cuarr8e1ncebn&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/cuarr8e1ncebn.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Tropical Crush</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=x5ikj69a989x6&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/x5ikj69a989x6.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Gold Trail</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=hb4cpgc6u6qj4&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/hb4cpgc6u6qj4.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Mythological</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=wr5axzs95uq7r&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/wr5axzs95uq7r.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Forest Treasure</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=exesnxb7ge3uy&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/exesnxb7ge3uy.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Haunted House</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=pd6rhresnhkbk&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/pd6rhresnhkbk.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Shaolin</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=nqyun5dpcjtsy&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/nqyun5dpcjtsy.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Cyber Race</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=uafejs6a58xp6&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/uafejs6a58xp6.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Bounty Hunter</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=7b6c7rcs16kjk&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/7b6c7rcs16kjk.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Ocean Spray</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=6o5emdcnoqyen&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/6o5emdcnoqyen.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Aztec Temple</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=5cx47jffukp3o&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/5cx47jffukp3o.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Fabulous Eights</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=gqotnunpejbwy&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/gqotnunpejbwy.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Fortune Festival</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=ipz77igi3mfho&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/ipz77igi3mfho.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Winter Sweets</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=b5ggg45epfzg6&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/b5ggg45epfzg6.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Super Stars</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=r8oiyz19mtqir&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/r8oiyz19mtqir.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Lucky Joker</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=ha1jzrho1gmjq&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/ha1jzrho1gmjq.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Mayan Gems</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=3erm9p7wssiks&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/3erm9p7wssiks.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Flames Of Fortune</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=ofy9b9z99u69r&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/ofy9b9z99u69r.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Fire Reign</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=swt38osdadyhc&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/swt38osdadyhc.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Black Beard Legacy</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=gkubyu4cjibrg&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/gkubyu4cjibrg.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Joker Madness</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=rqaonzn7kjjiy&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/rqaonzn7kjjiy.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">The Four Invention</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=m94wkgy3daxta&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/m94wkgy3daxta.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Mythical Sand</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=fqho1inijjfwo&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/fqho1inijjfwo.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Dragon Of The Eastern Sea</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=8kzbot4rew7ds&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/8kzbot4rew7ds.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Journey To The West</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=gsttgo1debywc&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/gsttgo1debywc.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Octagon Gem 2</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=quofrdenycyyn&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/quofrdenycyyn.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Bagua 2</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=1wt58azdhdo6c&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/1wt58azdhdo6c.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Wild Fairies</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=n1ydr5mncpogn&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/n1ydr5mncpogn.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Chilli Hunter</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=gn1bc1kqj7gr4&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/gn1bc1kqj7gr4.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Bagua</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=dxxsh3dfmjpio&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/dxxsh3dfmjpio.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Tai Shang Lao Jun</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=9ii7s6u5xbhzh&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/9ii7s6u5xbhzh.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Yggdrasil</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=s77hiogba5dhe&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/s77hiogba5dhe.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Peach Banquet</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=oajk3h9o685xq&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/oajk3h9o685xq.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Money Vault</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=1ru5x5zx7us6r&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/1ru5x5zx7us6r.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Lightning God</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=5ii9zgw5unc3h&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/5ii9zgw5unc3h.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Neptune Treasure</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=wykepsq659qp4&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/wykepsq659qp4.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Four Dragons</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=q9gi4yybyadoe&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/q9gi4yybyadoe.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Wild Giant Panda</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=dkzdo35rcipfs&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/dkzdo35rcipfs.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">China</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=ie9eti6w4zfcs&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/ie9eti6w4zfcs.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Ancient Artifact</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=7cz37fritkfao&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/7cz37fritkfao.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Lucky Rooster</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=84igeq3a8r9d6&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/84igeq3a8r9d6.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Nugget Hunter</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=4tyxfmpnwqokn&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/4tyxfmpnwqokn.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Octagon Gem</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=rsjogw1ukbeic&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/rsjogw1ukbeic.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Four Tigers</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=o7f9ih8t6559e&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/o7f9ih8t6559e.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Empress Regnant</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=wtupmzq14xepn&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/wtupmzq14xepn.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Lions Dance</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=d8cso3u8ct1iw&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/d8cso3u8ct1iw.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Phoenix 888</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=7tccifcktqre1&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/7tccifcktqre1.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Chinese Boss</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=4akkze7ywgukq&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/4akkze7ywgukq.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Crypto Mania</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=8u9r4tj48chd1&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/8u9r4tj48chd1.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Dynamite Reels</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=srd3xusx3ughr&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/srd3xusx3ughr.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Enter The KTV</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=5ypkuepgw61kk&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/5ypkuepgw61kk.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Water Reel</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=yxdzc9d7qj3zy&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/yxdzc9d7qj3zy.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Fire Reel</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=d5qfgs4amfxf6&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/d5qfgs4amfxf6.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Respin Mania</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=ahf5icfts455e&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/ahf5icfts455e.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Jin Fu Xing Yun</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=c41bsraonrmbq&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/c41bsraonrmbq.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Xuan Pu Lian Huan</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=99bzr6d3x39za&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/99bzr6d3x39za.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Ni Shu Shen Me</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=x46x869a989x6&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/x46x869a989x6.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Fat Choy Choy Sun</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=hcu3p8r71kj3y&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/hcu3p8r71kj3y.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Power Stars</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=hf5hx8w9u1q3r&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/hf5hx8w9u1q3r.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Book Of Ra Deluxe</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=ateqfxp1sqamn&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/ateqfxp1sqamn.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Dolphin Treasure</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=fk9yoi4wkifrs&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/fk9yoi4wkifrs.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Fifty Lions</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=8nsbhokge7nrk&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/8nsbhokge7nrk.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Queen Of The Nile</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=qxoindypyeboy&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/qxoindypyeboy.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Geisha</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=xmzfobaryz7xs&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/xmzfobaryz7xs.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Lord Of The Ocean</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=7f9h9fwz11kaw&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/7f9h9fwz11kaw.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Lucky Lady Charm</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=ioheiiqk3xrc1&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/ioheiiqk3xrc1.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Book Of Ra</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=k9gz4ebbrau1e&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/k9gz4ebbrau1e.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Fifty Dragons</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=aij68ciusna5c&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/aij68ciusna5c.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Columbus</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=igg7tisz4ukhw&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/igg7tisz4ukhw.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Egypt Queen</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=w4ypzw6o48mpq&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/w4ypzw6o48mpq.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Dragon Phoenix</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=xbxy1yegyhnyk&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/xbxy1yegyhnyk.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Jungle Island</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=foff4ikkjprr1&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/foff4ikkjprr1.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Water Margin</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=ef1uyxt98o6ur&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/ef1uyxt98o6ur.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Lucky God Progressive</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=naagsa5ycfugq&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/naagsa5ycfugq.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Ancient Egypt</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=i4rc816e388c6&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/i4rc816e388c6.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Robin Hood</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=nh9swadbc3use&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/nh9swadbc3use.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">HighwayKings JP</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=tqi9778i7mi6o&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/tqi9778i7mi6o.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Miami</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=ruufkzk1kpefn&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/ruufkzk1kpefn.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">SilverBullet Progressive</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=awn5jciusna5c&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/awn5jciusna5c.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Captains Treasure Progressive</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=3hj4fkfji4z4a&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/3hj4fkfji4z4a.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Lucky God Progressive 2</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=u17q53q45xcp1&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/u17q53q45xcp1.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">White Snake</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=kia1eetdryo1c&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/kia1eetdryo1c.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Alice</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=9xpa7brfxj7zo&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/9xpa7brfxj7zo.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Mammamia</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=pirtanombyroh&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/pirtanombyroh.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Huga</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=ne4gq55cpitgg&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/ne4gq55cpitgg.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Beanstalk</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=k3anse3yrrunq&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/k3anse3yrrunq.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">MoneyBangBang</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=79mafnrjt48aa&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/79mafnrjt48aa.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Pan Jin Lian</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=fwria11mjbrwh&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/fwria11mjbrwh.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Three Kingdoms Quest</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=8rqwot18etnuw&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/8rqwot18etnuw.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Thunder God</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=9upe5bm4xph81&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/9upe5bm4xph81.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Monkey King</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=113qm5xnhxoqn&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/113qm5xnhxoqn.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Aladdin</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=ywozehuuqbazc&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/ywozehuuqbazc.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Golden Island</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=bcizh7dipjiso&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/bcizh7dipjiso.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Mulan</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=55hj8ghaugxj6&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/55hj8ghaugxj6.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Happy Buddha</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=jpiuhpbifei1o&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/jpiuhpbifei1o.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Golden Rooster</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=itzp5iqk3xrc1&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/itzp5iqk3xrc1.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Wild Spirit</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=7rw3tfwz11kaw&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/7rw3tfwz11kaw.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Arctic Treasure</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=aodmmxp1sqamn&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/aodmmxp1sqamn.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Zhao Cai Jin Bao</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=o3nxzh9o685xq&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/o3nxzh9o685xq.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Fei Long Zai Tian</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=ufc6t3z8hu17w&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/ufc6t3z8hu17w.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Santa Surprise</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=j6j1rkbjfaz1a&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/j6j1rkbjfaz1a.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Five Tiger Generals</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=9w6aa6u5xbhzh&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/9w6aa6u5xbhzh.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Golden Dragon</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=wpu7pzg74mj7y&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/wpu7pzg74mj7y.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Lucky Drum</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=tbfxuhxs694xk&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/tbfxuhxs694xk.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Lucky Panda</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=gd3rn1kqj7gr4&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/gd3rn1kqj7gr4.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Queen</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=wfo7bzs95uq7r&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/wfo7bzs95uq7r.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Archer</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=jsguaktmfyw1h&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/jsguaktmfyw1h.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Hercules</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=dhdirsn3m3xia&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/dhdirsn3m3xia.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Lucky God</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=kf41ymtxfos1r&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/kf41ymtxfos1r.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Ocean Paradise</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=ebudnqj68h6d4&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/ebudnqj68h6d4.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Happy Party</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=9mqe9bhroi78s&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/9mqe9bhroi78s.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Golden Monkey King</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=4d5kdkpqi6sk4&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/4d5kdkpqi6sk4.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Safari Heat</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=u6d7fsg355x7a&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/u6d7fsg355x7a.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Panther Moon</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=5864tji8w113w&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/5864tji8w113w.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Thai Paradise</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=1q36p58phmt6y&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/1q36p58phmt6y.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Genie</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=xtpy4bx49xhx1&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/xtpy4bx49xhx1.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Safari Life</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=69xaiyrbo4dae&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/69xaiyrbo4dae.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">A Night Out</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=z1pc5tp4zqhm1&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/z1pc5tp4zqhm1.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Silver Bullet</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=bwwza4umpbwsh&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/bwwza4umpbwsh.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Bonus Bear</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=rh8iwwntk3mie&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/rh8iwwntk3mie.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Dolphin Reef</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=axt5pxf7sk35y&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/axt5pxf7sk35y.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Highway Kings</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=jbzd1cjsgh4dk&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/jbzd1cjsgh4dk.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Sparta</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=oqt9p9876m39y&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/oqt9p9876m39y.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Azteca</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=t656f48j75z6a&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/t656f48j75z6a.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Great Blue</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=s6xhiogba5dhe&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/s6xhiogba5dhe.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Football Rules</div>
                    </a>
                  </div>
                </div>
                <div id="jghot" style="height:568px; overflow:auto" class="tab-pane fade in">
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=ww3a8wsu4de7c&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/ww3a8wsu4de7c.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Sizzling Hot</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=soojfuqnaxycn&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/soojfuqnaxycn.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Hot Fruits</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=3yfmucpss64mk&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/3yfmucpss64mk.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Dragon Power Flame</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=tocki7xk7xwq1&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/tocki7xk7xwq1.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Burning Pearl Bingo</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=86burqb38a9ua&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/86burqb38a9ua.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Bushido Blade</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=z7k6mqf3z495a&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/z7k6mqf3z495a.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Crypto Mania Bingo</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=mur8wje4dccb1&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/mur8wje4dccb1.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Scheherazade</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=cz3wgrounyetc&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/cz3wgrounyetc.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Neptune Treasure Bingo</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=5m6k9j7rwspjs&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/5m6k9j7rwspjs.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Roma</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=j9nzkkbjfaz1a&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/j9nzkkbjfaz1a.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Horus Eye</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=wcaadzg74mj7y&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/wcaadzg74mj7y.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Lady Hawk</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=zygj7oqga9nck&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/zygj7oqga9nck.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Caishen Riches</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=satj3o6ya8dcq&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/satj3o6ya8dcq.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Just Jewels Deluxe</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=byz81hmsq748k&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/byz81hmsq748k.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Supreme Caishen</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=3fx69pizs144w&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/3fx69pizs144w.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Lucky Streak</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=ur8593z8hu17w&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/ur8593z8hu17w.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Burning Pearl</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=ezjsgctugyauc&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/ezjsgctugyauc.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Caishen Riches Bingo</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=b1cnw7mkppwg1&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/b1cnw7mkppwg1.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Thug Life</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=96k1k6d3x39za&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/96k1k6d3x39za.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Big Game Safari</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=qd1fcneqbhgy4&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/qd1fcneqbhgy4.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Immortals</div>
                    </a>
                  </div>
                </div>
                <div id="jgpoker" style="height:568px; overflow:auto" class="tab-pane fade in">
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=856dgq3a8r9d6&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/856dgq3a8r9d6.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Tangkas</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=dc7sh3dfmjpio&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/dc7sh3dfmjpio.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Dragon Tiger</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=3uim5ppkiqwk1&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/3uim5ppkiqwk1.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Belangkai</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=j3wngk3efrzn6&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/j3wngk3efrzn6.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Baccarat</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=yr1zy9u9xt6zr&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/yr1zy9u9xt6zr.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">HuLu</div>
                    </a>
                  </div>
                  <div style="height:200px; width:185px; float:left; text-align:center; vertical-align:top;">
                    <a onClick="window.open('http://www.gwp888.net/PlayGame?appID=F8GG&gameCode=hxb3p8r71kj3y&token=RcsFxJJiOMQeM7%2FoIdvzSibEClWih%2Bb92gZHYvhY3kE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                      <img src="https://img.pay4d.info/jg/images/hxb3p8r71kj3y.png" style="width:170px; height:170px; cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor: pointer;">Sicbo</div>
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
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=GMEJszpWV5dwaW1pjzyvr5QoG3989pNj9%2FIOL0REAPg%3D&token=WH6QGkkaXK03nmwB1mVpobiHWbdpzECx73xI7jSJg4I%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ion/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=%2Fd9JTiQf3uqBs6B1pBZrLV%2BD51JWV%2F378C%2FpglafaXE%3D&token=WH6QGkkaXK03nmwB1mVpobiHWbdpzECx73xI7jSJg4I%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ion/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=YB0fMwRcKlAi0%2FeKYo4c%2BFTS28Ux98qDY4d%2Fm0mI9N8%3D&token=WH6QGkkaXK03nmwB1mVpobiHWbdpzECx73xI7jSJg4I%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ion/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sicbo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=5ufF7Ojko5m%2Fg7nUAgYzi64uH2yhp7gp4vYefp9n%2BbA%3D&token=WH6QGkkaXK03nmwB1mVpobiHWbdpzECx73xI7jSJg4I%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://opus-api.lk-acc-n1.com/opus/launch?cookie=i0PtkRzAAZaLYFOYIXEJ5NodDc8TZ7kmj7XJRTUIwoA%3D&gameType=BA', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/og/images/BA.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://opus-api.lk-acc-n1.com/opus/launch?cookie=i0PtkRzAAZaLYFOYIXEJ5NodDc8TZ7kmj7XJRTUIwoA%3D&gameType=RO', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/og/images/RO.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://opus-api.lk-acc-n1.com/opus/launch?cookie=i0PtkRzAAZaLYFOYIXEJ5NodDc8TZ7kmj7XJRTUIwoA%3D&gameType=DC', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=h7FboeXtKQfZMLjegYZBgY%2F2XpIARn2vsEim6g7E%2Bs0%3D&category=top_games', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/top_games.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Top Games</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=h7FboeXtKQfZMLjegYZBgY%2F2XpIARn2vsEim6g7E%2Bs0%3D&category=game_shows', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/game_shows.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Game Shows</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=h7FboeXtKQfZMLjegYZBgY%2F2XpIARn2vsEim6g7E%2Bs0%3D&category=baccarat', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=h7FboeXtKQfZMLjegYZBgY%2F2XpIARn2vsEim6g7E%2Bs0%3D&category=roulette', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=h7FboeXtKQfZMLjegYZBgY%2F2XpIARn2vsEim6g7E%2Bs0%3D&category=sicbo', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sicbo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=h7FboeXtKQfZMLjegYZBgY%2F2XpIARn2vsEim6g7E%2Bs0%3D&category=dragontiger', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/dragontiger.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=h7FboeXtKQfZMLjegYZBgY%2F2XpIARn2vsEim6g7E%2Bs0%3D&category=blackjack', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/blackjack.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Blackjack</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=h7FboeXtKQfZMLjegYZBgY%2F2XpIARn2vsEim6g7E%2Bs0%3D&category=poker', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/poker.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Poker</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=h7FboeXtKQfZMLjegYZBgY%2F2XpIARn2vsEim6g7E%2Bs0%3D&category=bacbo', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/bacbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Bac Bo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=h7FboeXtKQfZMLjegYZBgY%2F2XpIARn2vsEim6g7E%2Bs0%3D&category=fantan', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/fantan.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Fan Tan</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=h7FboeXtKQfZMLjegYZBgY%2F2XpIARn2vsEim6g7E%2Bs0%3D&category=andarbahar', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/andarbahar.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Andar Bahar</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=h7FboeXtKQfZMLjegYZBgY%2F2XpIARn2vsEim6g7E%2Bs0%3D&category=craps', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/craps.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Craps</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=h7FboeXtKQfZMLjegYZBgY%2F2XpIARn2vsEim6g7E%2Bs0%3D&category=teenpatti', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=md7gDX3D7Em%2Bjx5ubUp24VfMY8gAfCLnEXoCrUCFPNo%3D&token=y2x33hT4TfmuMp0A%2Bf2S%2BDi84IhARJ%2BhEFp6iPL8e2s%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/sx/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=OJkLVbEjj8M6qh%2Bf6ZvkFQsho3XitoUROACIuH3P%2Fqg%3D&token=y2x33hT4TfmuMp0A%2Bf2S%2BDi84IhARJ%2BhEFp6iPL8e2s%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/sx/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=asupVTLKdCRNsDcD8Kbjgl8B3MQWzZ96UyncJNi0Vr0%3D&token=y2x33hT4TfmuMp0A%2Bf2S%2BDi84IhARJ%2BhEFp6iPL8e2s%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/sx/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">SicBo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=HB%2BYmeb9jZBMagCHL1Rnj8jpy2llFQCX4nd13HdbrxM%3D&token=y2x33hT4TfmuMp0A%2Bf2S%2BDi84IhARJ%2BhEFp6iPL8e2s%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DMy7E5%2B2CsMrCiB8cj8msdwfoT8SXt90NWqULO4g1J9s%3D%26symbol%3D101%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/101.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Top Games</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DMy7E5%2B2CsMrCiB8cj8msdwfoT8SXt90NWqULO4g1J9s%3D%26symbol%3D104%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/104.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat Lobby</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DMy7E5%2B2CsMrCiB8cj8msdwfoT8SXt90NWqULO4g1J9s%3D%26symbol%3D102%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/102.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette Lobby</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DMy7E5%2B2CsMrCiB8cj8msdwfoT8SXt90NWqULO4g1J9s%3D%26symbol%3D103%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/103.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Blackjack Lobby</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DMy7E5%2B2CsMrCiB8cj8msdwfoT8SXt90NWqULO4g1J9s%3D%26symbol%3D1001%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1001.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DMy7E5%2B2CsMrCiB8cj8msdwfoT8SXt90NWqULO4g1J9s%3D%26symbol%3D1024%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1024.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Andar Bahar</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DMy7E5%2B2CsMrCiB8cj8msdwfoT8SXt90NWqULO4g1J9s%3D%26symbol%3D204%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/204.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Mega Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DMy7E5%2B2CsMrCiB8cj8msdwfoT8SXt90NWqULO4g1J9s%3D%26symbol%3D701%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/701.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Mega Sicbo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DMy7E5%2B2CsMrCiB8cj8msdwfoT8SXt90NWqULO4g1J9s%3D%26symbol%3D801%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/801.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Mega Wheel</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DMy7E5%2B2CsMrCiB8cj8msdwfoT8SXt90NWqULO4g1J9s%3D%26symbol%3D240%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/240.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Power Up Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DMy7E5%2B2CsMrCiB8cj8msdwfoT8SXt90NWqULO4g1J9s%3D%26symbol%3D1101%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1101.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sweet Bonanza Candyland</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DMy7E5%2B2CsMrCiB8cj8msdwfoT8SXt90NWqULO4g1J9s%3D%26symbol%3D1302%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1302.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Spaceman</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DMy7E5%2B2CsMrCiB8cj8msdwfoT8SXt90NWqULO4g1J9s%3D%26symbol%3D1401%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1401.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Boom City</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DMy7E5%2B2CsMrCiB8cj8msdwfoT8SXt90NWqULO4g1J9s%3D%26symbol%3D1601%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=0&token=JiyPhDWgQ%2FI%2B4I87pZtt7B7KI2ALiGxxvBnT%2BMEZj7o%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/hotgames.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Hot Games</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=100&token=JiyPhDWgQ%2FI%2B4I87pZtt7B7KI2ALiGxxvBnT%2BMEZj7o%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/dragonhall.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">DragonHall</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=106&token=JiyPhDWgQ%2FI%2B4I87pZtt7B7KI2ALiGxxvBnT%2BMEZj7o%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/quickhall.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">QuickHall</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=102&token=JiyPhDWgQ%2FI%2B4I87pZtt7B7KI2ALiGxxvBnT%2BMEZj7o%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/multiplay.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">MultiPlay</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=104&token=JiyPhDWgQ%2FI%2B4I87pZtt7B7KI2ALiGxxvBnT%2BMEZj7o%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/seecardbaccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">SeeCard Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=101&token=JiyPhDWgQ%2FI%2B4I87pZtt7B7KI2ALiGxxvBnT%2BMEZj7o%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=105&token=JiyPhDWgQ%2FI%2B4I87pZtt7B7KI2ALiGxxvBnT%2BMEZj7o%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/sexybaccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sexy Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=110&token=JiyPhDWgQ%2FI%2B4I87pZtt7B7KI2ALiGxxvBnT%2BMEZj7o%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/insurancebaccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Insurance Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=401&token=JiyPhDWgQ%2FI%2B4I87pZtt7B7KI2ALiGxxvBnT%2BMEZj7o%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=402&token=JiyPhDWgQ%2FI%2B4I87pZtt7B7KI2ALiGxxvBnT%2BMEZj7o%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/sexyroulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sexy Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=201&token=JiyPhDWgQ%2FI%2B4I87pZtt7B7KI2ALiGxxvBnT%2BMEZj7o%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">SicBoHiLo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=301&token=JiyPhDWgQ%2FI%2B4I87pZtt7B7KI2ALiGxxvBnT%2BMEZj7o%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/dragontiger.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=801&token=JiyPhDWgQ%2FI%2B4I87pZtt7B7KI2ALiGxxvBnT%2BMEZj7o%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/bullbull.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">BullBull</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=901&token=JiyPhDWgQ%2FI%2B4I87pZtt7B7KI2ALiGxxvBnT%2BMEZj7o%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/win3cards.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Win3Cards</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=501&token=JiyPhDWgQ%2FI%2B4I87pZtt7B7KI2ALiGxxvBnT%2BMEZj7o%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=dLTh9pfBXv3aX29KEgRKikvk3FFrVQaIEpl0vkAWP3qqL1s1KYCB%2BgNBewRUpXFNCZFi3I87WHCp5HtNZ%2Bko14ocQWVe27xRize9ATTcqCBDnuWyUMPPQKjf3sPmrtdoQUvNR5YluQzjJ9Ro%2BhgEWkpgBa9WV2Vz5EE3LbkHU7TMNChQIcHndO571gn1tVc38DIZBdBD1Vp3HYJ462%2B%2FFQ%3D%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_baccarat_playboy_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Playboy Club</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=9Ao4TJWCaZ7qpkDsy%2BB9gGwXDjG6Pj2t2EmnTZMEv00kmNyU6s07w2IiDZqCDG0MHQM%2BMPgkrZN%2F4%2FPqSq%2F2WQJZaPnB5YpsLWRPpGnNV5GQYqgI0xEaA15c6ZLumD47WTeqgKui%2FIO96fCc18fsbk2kaYehsGATXlQ8og%2FyN8k%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_baccarat_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Bonus Baccarat</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=TE78UVjxGAxblKK8qfp7vCO9AjFqw72jLL6TMyZdiR0uJOVjB6oCJs3fcBr1QTDOhXZK26It296PMgmT0e3XX%2BGv2UVWEDJMBW3oqjNFUTzitUvUftg1B0Ibozi6dVDWwWUxdqj7QBjqqszv6tcnMd2pePbx0zqtAuEmxV3akNg%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_baccaratnc_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">No Com Bonus Baccarat</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=yKCoylNZzAIA2ejyfVNQwKWoMQElroQA1jWQEHBHQs0FxUdC5ncmnrNK1qO23AIBya5K69NGIIZtIt78oEHgIPH040JGPN4uVeRDUtEhehGF%2FPIkUueN0AR1Ftteb0i2YsV1TyHiZxd3gsxAy3XZNWMGEGMaKe9LgmwaZ11YViMsROY9NGY%2FHVAK%2BC88n1cZj%2BwdGDfPHdn3bOhyMi%2BYBA%3D%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_mp_baccarat_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Baccarat</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=QTHrrGdLA5z2qc%2F0qPULtJ99nMfyZbcf3TQHrdS%2BcVHGav4OoeNgypWibzi7uqOF6bOBkOwkZV6yXHnx%2FjhsKWitWcILo9sz3CzTgOYIaSsUsN1Q3sVwdN9gVvNLhtDIxCRwR%2Ft5E43YRn3qD5SMeQ4ZyTRs3Fnj8oK1WHRqzXk%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_roulette_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Roulette </div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=nh6RRdtfWC72DStaFoCJIRO2%2B4eg2HuFJgjmVIdWm8nXT4u%2Bv3%2BmkhtO6XUIC1Ff9tMq6vQQLr6ZlmHqPTzUOzwMf09DyASJrMWGcCB9iV8IGqYHa9O7%2B%2BarZLHSabT%2FE6ZAPB0Odj0Bd9pC501mzp7XGFldQz6dah8c16ZqN1g%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
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
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=fIifwlVx%2FGyCeru3tjKXmij8VUxtJS5j6oZS%2FpQgfMo%3D&game=baccarat', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/baccarat.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Baccarat</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=fIifwlVx%2FGyCeru3tjKXmij8VUxtJS5j6oZS%2FpQgfMo%3D&game=roulette', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/roulette.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Roulette</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=fIifwlVx%2FGyCeru3tjKXmij8VUxtJS5j6oZS%2FpQgfMo%3D&game=sicbo', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/sicbo.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Sicbo</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=fIifwlVx%2FGyCeru3tjKXmij8VUxtJS5j6oZS%2FpQgfMo%3D&game=dragontiger', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/dragontiger.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=fIifwlVx%2FGyCeru3tjKXmij8VUxtJS5j6oZS%2FpQgfMo%3D&game=12baccarat', '_blank', 'width=1366, height=900, top=0, left=0')">
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
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=uiluOZ0rSgsPiQl3%2FKgkZHxPcZtbHAi9PO9bx9WqSS0%3D&game=baccarat', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/baccaratlobby.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Baccarat Lobby</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=uiluOZ0rSgsPiQl3%2FKgkZHxPcZtbHAi9PO9bx9WqSS0%3D&game=roulette', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/eroulette.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Roulette</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=uiluOZ0rSgsPiQl3%2FKgkZHxPcZtbHAi9PO9bx9WqSS0%3D&game=croulette', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/croulette.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Sexy Roulette</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=uiluOZ0rSgsPiQl3%2FKgkZHxPcZtbHAi9PO9bx9WqSS0%3D&game=sicbo', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/esicbo.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Sicbo</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=uiluOZ0rSgsPiQl3%2FKgkZHxPcZtbHAi9PO9bx9WqSS0%3D&game=dragontiger', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/edragontiger.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=uiluOZ0rSgsPiQl3%2FKgkZHxPcZtbHAi9PO9bx9WqSS0%3D&game=pokdeng', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/epokdeng.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Pok Deng</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=uiluOZ0rSgsPiQl3%2FKgkZHxPcZtbHAi9PO9bx9WqSS0%3D&game=andarbahar', '_blank', 'width=1366, height=900, top=0, left=0')">
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
          <a onClick="window.open('https://ws168.lk-acc-n1.com/ws/launch?token=9u1AQWFiYgM78s23Q%2B1bPmh4uFLRjoPBricDgvAKync%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
            <img src="https://img.pay4d.info/wslogo.png" style="cursor: pointer;">
            <div>WS168</div>
          </a>
        </div>

        <div style="clear: both;"></div>

      </div>




      <div id="sport_wrap" class="tab-pane fade in">
        <hr style="margin-top: 5px">
        <div style="margin: 10px 0px 10px 10px; text-align: center; width: 200px; float: left">
          <a onClick="window.open('https://saba.lk-acc-n1.com/?p=d&token=ocztKoYhJMCOwIjJolQKuOPlUdRQFjsYlzbjk7AvNPE%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
            <img src="https://img.pay4d.info/sabalogo.png" style="cursor: pointer;">
            <div>Saba Sports<BR>[Rasio Credit 1:1000]</div>
          </a>
        </div>

        <div style="margin: 10px 0px 10px 10px; text-align: center; width: 200px; float: left">
          <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=fIifwlVx%2FGyCeru3tjKXmij8VUxtJS5j6oZS%2FpQgfMo%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
            <img src="https://img.pay4d.info/sbologo.png" style="cursor: pointer;">
            <div>SBO Sports<BR>[Rasio Credit 1:1000]</div>
          </a>
        </div>

        <div style="margin: 10px 0px 10px 10px; text-align: center; width: 200px; float: left">
          <a onClick="window.open('https://tfsport.lk-acc-n1.com/tf/launch?token=NHa8m%2BG8QTbHBpY0bXphtP72j%2FXgyeOBhtjAzlukyNg%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
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
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=P0I3I74nqqb4VW4Yg99xgKALossSjxs4nZNMl7BZ2v4%3D&game=F-SF01&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-SF01.png" style="width:160px;">
                      <div style="text-align:center;">Fishing God<br>[Rasio Credit 1:10]</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=P0I3I74nqqb4VW4Yg99xgKALossSjxs4nZNMl7BZ2v4%3D&game=F-SF02&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-SF02.png" style="width:160px;">
                      <div style="text-align:center;">Fishing War<br>[Rasio Credit 1:10]</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=P0I3I74nqqb4VW4Yg99xgKALossSjxs4nZNMl7BZ2v4%3D&game=F-AH01&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-AH01.png" style="width:160px;">
                      <div style="text-align:center;">Alien Hunter<br>[Rasio Credit 1:10]</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=P0I3I74nqqb4VW4Yg99xgKALossSjxs4nZNMl7BZ2v4%3D&game=F-ZP01&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-ZP01.png" style="width:160px;">
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
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=tm4oor5VJqold4QgT38%2B6DAbGqovrIrzMPgZsRSyCYc%3D&gameid=212"><img src="https://img.pay4d.info/jl/images/212.png" style="width:160px;">
                      <div style="text-align:center;">Dinosaur Tycoon II</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=tm4oor5VJqold4QgT38%2B6DAbGqovrIrzMPgZsRSyCYc%3D&gameid=32"><img src="https://img.pay4d.info/jl/images/32.png" style="width:160px;">
                      <div style="text-align:center;">Jackpot Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=tm4oor5VJqold4QgT38%2B6DAbGqovrIrzMPgZsRSyCYc%3D&gameid=82"><img src="https://img.pay4d.info/jl/images/82.png" style="width:160px;">
                      <div style="text-align:center;">Happy Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=tm4oor5VJqold4QgT38%2B6DAbGqovrIrzMPgZsRSyCYc%3D&gameid=119"><img src="https://img.pay4d.info/jl/images/119.png" style="width:160px;">
                      <div style="text-align:center;">All-star Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=tm4oor5VJqold4QgT38%2B6DAbGqovrIrzMPgZsRSyCYc%3D&gameid=1"><img src="https://img.pay4d.info/jl/images/1.png" style="width:160px;">
                      <div style="text-align:center;">Royal Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=tm4oor5VJqold4QgT38%2B6DAbGqovrIrzMPgZsRSyCYc%3D&gameid=71"><img src="https://img.pay4d.info/jl/images/71.png" style="width:160px;">
                      <div style="text-align:center;">Boom Legend</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=tm4oor5VJqold4QgT38%2B6DAbGqovrIrzMPgZsRSyCYc%3D&gameid=74"><img src="https://img.pay4d.info/jl/images/74.png" style="width:160px;">
                      <div style="text-align:center;">Mega Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=tm4oor5VJqold4QgT38%2B6DAbGqovrIrzMPgZsRSyCYc%3D&gameid=42"><img src="https://img.pay4d.info/jl/images/42.png" style="width:160px;">
                      <div style="text-align:center;">Dinosaur Tycoon</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=tm4oor5VJqold4QgT38%2B6DAbGqovrIrzMPgZsRSyCYc%3D&gameid=20"><img src="https://img.pay4d.info/jl/images/20.png" style="width:160px;">
                      <div style="text-align:center;">Bombing Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=tm4oor5VJqold4QgT38%2B6DAbGqovrIrzMPgZsRSyCYc%3D&gameid=60"><img src="https://img.pay4d.info/jl/images/60.png" style="width:160px;">
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
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=lABZqvM6npOXHNG47YPVLWikxhgDu9G4RLcjnUtAL5s%3D&gameid=PSF-ON-00006"><img src="https://img.pay4d.info/ps/images/PSF-ON-00006.png" style="width:160px;">
                      <div style="text-align:center;">Fishing Fa Fa Fa</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=lABZqvM6npOXHNG47YPVLWikxhgDu9G4RLcjnUtAL5s%3D&gameid=PSF-ON-00005"><img src="https://img.pay4d.info/ps/images/PSF-ON-00005.png" style="width:160px;">
                      <div style="text-align:center;">Fishing In Thailand</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=lABZqvM6npOXHNG47YPVLWikxhgDu9G4RLcjnUtAL5s%3D&gameid=PSF-ON-00004"><img src="https://img.pay4d.info/ps/images/PSF-ON-00004.png" style="width:160px;">
                      <div style="text-align:center;">Fishing Foodie</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=lABZqvM6npOXHNG47YPVLWikxhgDu9G4RLcjnUtAL5s%3D&gameid=PSF-ON-00003"><img src="https://img.pay4d.info/ps/images/PSF-ON-00003.png" style="width:160px;">
                      <div style="text-align:center;">Zombie Bonus</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=lABZqvM6npOXHNG47YPVLWikxhgDu9G4RLcjnUtAL5s%3D&gameid=PSF-ON-00002"><img src="https://img.pay4d.info/ps/images/PSF-ON-00002.png" style="width:160px;">
                      <div style="text-align:center;">Spicy Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=lABZqvM6npOXHNG47YPVLWikxhgDu9G4RLcjnUtAL5s%3D&gameid=PSF-ON-00001"><img src="https://img.pay4d.info/ps/images/PSF-ON-00001.png" style="width:160px;">
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
                  <div class="gameList_f" style="height:205px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://fastspin.lk-acc-n1.com/fs/launch?token=i93eXiZvNYKv3lwFuOOAmOrms3DfPa5u67hdvycr1k4%3D&game=F-FT01"><img src="https://img.pay4d.info/fs/images/F-FT01.jpg" style="width:155px;">
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