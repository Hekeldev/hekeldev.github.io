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
            var timeSKA = 32093;
            setInterval(function() {
              timeSKA--;
              if (timeSKA < 3600) $('#pidSKA').text(secondtominute(timeSKA));
            }, 1000);
          </script>
          <li style="font-size:14px; width:228px; font-weight:bold; margin-left:0px; opacity:1.0;"><a data-toggle="pill" href="#sakatoto_wrap"><span id="p_sakatoto" class="glyphicon"></span><span class="nama_pasaran_sakatoto"></span>
              <span id="pidSKT" style="float:right; font-weight:normal; font-size:10px;" class="blink_me"></span></a></li>
          <script>
            var timeSKT = 42893;
            setInterval(function() {
              timeSKT--;
              if (timeSKT < 3600) $('#pidSKT').text(secondtominute(timeSKT));
            }, 1000);
          </script>
          <li style="font-size:14px; width:228px; font-weight:bold; margin-left:0px; opacity:1.0;"><a data-toggle="pill" href="#saka4d_wrap"><span id="p_saka4d" class="glyphicon"></span><span class="nama_pasaran_saka4d"></span>
              <span id="pidSKD" style="float:right; font-weight:normal; font-size:10px;" class="blink_me"></span></a></li>
          <script>
            var timeSKD = 50093;
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
          <div style="position:absolute; margin-top:-706px; margin-left:45px; " id="closeButton"><button type="button" class="btn btn-default" onClick="closeGame();" style="background:none; border:none; padding:0px; margin:0px; font-size:20px"><img src="https://img.pay4d.info/home.png" height="25" alt=""></button></div>
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
            <li class="" id="tab_cq9" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a href="?login=89j3vu4unVSW8Bny&games&gid=cq9"><span><img src="https://img.pay4d.info/cq9-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" /></span>
              </a></li>
            <li class="active" id="tab_mg" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a href="?login=89j3vu4unVSW8Bny&games&gid=mg"><span><img src="https://img.pay4d.info/mg-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />Microgaming</span>
              </a></li>
            <li class="" id="tab_ttg" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a href="?login=89j3vu4unVSW8Bny&games&gid=ttg"><span><img src="https://img.pay4d.info/ttg-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />TopTrend Gaming</span>
              </a></li>

          </ul>
          <div style="height:10px; background-color:#FFF" class="grabgtabbottom"></div>

          <div class="tab-content">






            <div id="games_window_mg" class="tab-pane fade in active">

              <div class="row">
                <div class="col-md-9">



                  <ul class="nav nav-pills">
                    <li style="width:120px;" class="active"><a data-toggle="pill" href="#mgslot">&#10024; Slots</a></li>
                    <li style="width:150px"><a data-toggle="pill" href="#mghot">&#128293; Top 20 Games</a></li>
                    <li style="width:180px"><a data-toggle="pill" href="#mgspin">&clubs; Fitur Beli FreeSpin</a></li>
                    <li style="width:190px"><a data-toggle="pill" href="#mginter">&clubs; Interactive Games</a></li>
                  </ul>

                </div>
                <div class="col-md-3" style="padding-top:5px">
                  <form method="GET" style="float:right;">
                    <div class="input-group">
                      <input type="text" class="form-control" name="s" placeholder="Search Game" value="">
                      <input type="hidden" name="gid" value="mg">
                      <input type="hidden" name="games">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-sm btn-danger" style="height:27px; padding-top:4px; margin-top:-1px"><i class="glyphicon glyphicon-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>

              <div style="margin-top:10px; margin-left: 10px; margin-bottom:6px;">


                <span class="text-warning">Catatan:</span> Rasio Credit di dalam Game <span class="text-info">1:1000</span>
              </div>


              <div class="tab-content" style="margin-top:20px">

                <div id="mgslot" style="height:561px; overflow:auto" class="tab-pane fade in active">
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=%2BJxxRkt6FLqx8r6fB%2FcB8YIIqi7rv27OJsIBtG%2Fp6xDET7V%2BwSEHQ0rkKko77SB%2BCYadQn%2FBSCOXauf%2FYpqH8lKaQzUBuChWVAmuhAO0VgiktJNnq9bcCfAInx5tAJVS%2ButtdbiiOxDSrIpGRBII1w%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_tippytavern_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Tippy Tavern</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=81MMGVpvpxMjLP1oeQuo2FIqEEKqXxtlMi32kaibrY7gsndKnDSmwXTYSdqqspK%2F0qKfFHQz8EwTIGKHhAzU1nfFfbg7N5y4cnHAGXevmjpZxkDFxX1iqgoWOfUp%2F2OftYVLWSrkp4hokRCI%2BKUWOW1rCxJmQs6Z0fdhl6%2BiTbU%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_stormtoriches_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Storm To Riches</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=TTbFK0FxHicXrn8Ei1MFIwE5rGnypWVMom6UUerkN2NjQMDYYwRgOZHbQVZrP9GxwXctALPaRUaHCdtb7VVaxQyHa2oSnrB9gJw2LCDd7LKWpEiidgCnn0XJ%2FJP8LaTIVAXbotPYgeRoInqtRzuBAGojxCoxYNAhCvm%2FKT1amH4%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_almightyzeusempire_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Almighty Zeus Empire</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=7aW26Vh%2FIyw%2BsA0WmV6VlfP10i3X6RGffW7P2QIGve%2Fh8mJT%2BKHp833I1ejVyQUVuLeMZS5%2BsWbmR58vI6tOdimHvtnx%2F5QJmCpqhHguQPU38omMz7gAs%2BMvP0rv2whhZuKHpdZhEXBH6Oj7UCnliFgyL%2FdXd2tSoyr23iY0cbg%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_grannyvszombies_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Granny vs Zombies</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=1Ujr9FlGPm%2FtvUzAf5qyaXPqG5WCbtgtVlXWdW3ytRUOK0nNKP3qjlfPPm1LATeq4XycPyk5l6NQ8KGn9WNeKhfPBRfZV6cfkRS%2F4zGrNtMF4YVfIj2zod4JMdud3RpxK%2BJ5ylMqttfkuO%2B8nPHG%2FDIPdnAOdF1TZweW6q8riRg%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_romesupermatch_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Rome Supermatch</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=xG39V5a1aqFbI2PqNaWdc2FsOiz3Pk5X4G2EoJl8VspiNeI2NtOMfhgQnkcwdhH%2FEUQ5AiFdYEcrYJO%2BtdYPg%2BwgxI6%2BhXOrKoE0SBssd5KJyDgR6kh5rYA%2Bgc0JkfmmYaXfetRs6cKWEhZbC00lcw%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_bubblebeez_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Bubble Beez</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=T%2FnH1TRa1tzCIXIgxU682thGhaZzTcByw6gNEoE3WkLSsEc6GDi3zAKEha6rWf7N1TpGApgzK4u2CCYXv4HtGDFtiljQLjsOtVngkmqsVOtHJleAkyD7BYMfTPsXZUSbHEYWnaR2Nx7bKalggdoSlWFocavAiCIDpfOP05N3H%2Bk%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_fortunepikegold_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Fortune Pike Gold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=7LvNP2zSdpaeHL7AWZxNOBA4ATFI5zsTgMhLAwWJ1YbyClMtyZ24kj6zfwFgx2QnTHFTNQ1tPtOmBzCrFk7E8LZ5fJupJNXfVm5R%2ByIg9jMO8czBI2H%2BZPJhiVdFy%2B4vrUZxJDtNBsKxn1IZMdMX%2BCbLvlPAGUj%2Bw66zxBDHI7c%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_monkeybonanza_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Monkey Bonanza</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=Jp1xZ7C0mHBIxPmwJtzxZb4kZgnQFcyo4vURtmnMiwVHcMOgyIT2C3nJPeiqHy5M9yDkzJH9Ay5R3UpI5BhKc7sWJ8zTwgx5xwat5mFeOxqrZnaPuh%2BsbN5ddaWLYG4%2Bu4b4ixSO%2FXoQSm7vzksUYO69F8Be6XpHBVzkJdbUNWU%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_chillipepehotstacks_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Chilli Pepe Hot Stacks</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=E%2BPEBb0mk1V13bwElfYK40kAkoICdLhynEugXA1aRzSuCZE9Wr4VJ4qPX7AsSXcIT9m8jXTpeSt8sv4jSEScPUrK8cLhK3nHe5JYBp8DfFBA5Pu6Ixdl0MphuFPYJS2hogx1GPpDItdFkjCBZJMdmJ2kI61GOHaDHUy4iIeFYzg%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_gallogoldmegaways_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Gallo Gold Bruno's Megaways™</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=1e%2BHNtyicdbkSkOO1GTR0O4Xi3RIMnwujv5F%2FfRPtWSI76H0x%2FMhnyYyXVcMvH7XHU0CcdZJNeSbbIFbHCoj7dE1pPecvOM4DvIMqHaOv3XsEncFb2Ngv4I5QGr6AKG6Bnsu%2BGzBMM28%2FNDUB5RpTw%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_chestsofgold_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Chests of Gold : Power Combo</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=2%2BFuTwx%2BxtSgJGPJPxmFrzhnY5v3DbJwPTVAcz9l6MimWGUxxYFopk6LHOKHHNu4tMAkCZgDRbTyit6q6E73mtB%2FJ%2Bk0l3czwkG7gN7Re3kWhhBB9onwpuYH%2BsU7pH5%2FORFDa6MIVMsw6AIoi6VNa1fHXhzD3e9KpE02dytF62Q%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_wildfirewinsextreme_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Wildfire Wins Extreme</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=lLGxHdTOroXCML3sjpmIxOK%2FqctRMcA8hhdgcHYra0ynu9%2FtlEt2pxDrA%2F8pW7owp3EaBIsO0V4mrVViwmgnJejdmAlUvsTErVntRnML9lzVRqCRKsj3K3HS0M7HReDS5cxn1EfY05uuUlgJSfC3LhndrM9rVFNy%2FI3BQbXiSnc%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_happyluckycats_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Happy Lucky Cats</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=eBhe0IKsH2XXT7VSi4WTnjZ1vr2rRSJb4qprvHwSIVBeVbtrU%2FDI0mqMaPeDgjdh4F1qq5dswhy6ZJqZgnN9uIQhnNe8dDYI5kyv7rKsy7E8XUK87Lg7jzcYIRX2Rd1pGOB%2BlwFRrF2m6Sg%2FSwI%2BlVraQYh8PVI%2BRC38VU%2Bc5Eg%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_trojankingdom_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Trojan Kingdom</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=E%2BO5BWqgpZgd%2BHi3ISkBzSF%2F6x3PY7eLD9ASErF79pK5dl0EX6uEDa0kBFloSCCnX4J8XAIjTWITe6VqZOsQdV2TUY6mFdXUF52lp1j8VTyugMawJBzZpmnGIg3mvNWggEw4m1f8VUzfXo2ahD5r5GErzSqi0wzSAGVNHYclKII%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_wolfblazemegaways_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Wolf Blaze Megaways</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=fKEzRY1Oi4fj6eBLzOfRFc9jsGS1BqmlTPcjAP3st3xjV0wrfufGmU4%2FxTCu1nd6Y6CTcf0R42NfVEcv1XPR1I8fhg32qmCZ357aofpBGK8uawlz%2FfQ3CLrUkjhCJsMp9hjck8teWh4XjsfbYp%2BOQA%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_dragonskeep_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Dragon's Keep</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=hz7a68E5uHuqae8ihAVBOeR5oK%2BwAXA2AYJA5fw0804rsKffTUe7HJw9lfMqwiFge9Q7bfjdBwfY9UyAYULnGJo10yDF%2FR1wX805DhPwDjRLOXVVvDNiOuIc10rHLHR1%2BjIEt6ygplPAuTXxzldVyCCS2if0qZjLi561%2B%2BhT5Dg%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_dokidokifireworks_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Doki Doki Fireworks</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=fDE9H6j9RLw8CwS%2FX5rPPE0T1ngWHf0IPv2awifA5bU7bnMJhHzKwCjwwbn2Pelkt%2BUAOkZR9XINmYgnS%2Fs1GqEGXNbnxcpfhcjlXYU6YO6FZl%2Frexqi05eSaUlFa5a09pTiQVjqGtKQWsOUA7Inu7WxEEfhrQDG8ioD0RtdZAw%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_fortunedragon_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Fortune Dragon</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=KIXTTwmhEuj4E6Q71pk3FxdO3%2BuQfidKv%2BhVjUW8Kr8Ca%2BuPKp46R1oP7OrH1Yp0FopKuuPaYJbZy0whg5asXbgMoiOFry%2FJeFJvZ7n8qChJw5UxKPUPjbgzNELO%2FvazX8y5vDtNKE6LEOw1Tx7vetGTzJSGPePz0AeUKK2wgwc%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_luckytwinswilds_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Lucky Twins Wilds</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=2qXJ63xEGC06dRpRfAerQBpKMhGYilrFvTXIz7KelTSBlGXdIM9OjgvenJ14PMkxR%2FhE%2Bk14bSlHBCjz2vFNTxrJup4X29W2pZwCahP6tBx83%2FaZw%2BAs2%2B0cm6U6OuECBRH5QDVsQUqyLNX9%2FF4iEnzol46Epr0Vch5rk4wrS9s%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_candyrushwilds_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Candy Rush Wilds</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=0XskAqB9N7MB8prTuCS4Zt3dYkcFfMh4kdgrhSkEsBMTSVlciyvogfAHsFxKvBjujpZs3LCVON72jKbiF5UTzh5XdoHIbf%2FjPgSLNMeI51g2wMB%2FtdtQVqCBlVdfGUk%2BfLSaO%2FpM2Exa6IFmebFxUiH2XA3%2FOvioQT96Aejp%2BRA%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_mastersofolympus_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Masters of Olympus</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=bY3KKrtOBrmth4H5ho1fsnrmcB%2Boe%2F8vIcdgfdA%2F7WYg%2F4A6kosLxBvq2PPnqS4f8dRiD%2FOvq6WmiimqUmPgiQAbS4W56X2%2BHgAl1aNz8mHJW5bF5tnTJ9mk3dvXvVATYlrIM9i91UqTTyHqkCRRuA%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_goldblitz_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Gold Blitz</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=5FC5V%2BIrjLhvPbG1jikzlNGPKwlKzKUGEM5q87nuk6vUiVXTFuZjJ1ceg8yoIx4EvRVkZs%2FUd9zHZ4%2F5bbFutC%2FqIfB0HLG9wu3GCpOHZQoEVMDCcsYgA3AAS4FKwfbT9WvnZtryFK4PYEH%2BeeyZEhYQRVVSMZr2l4LWrZFRtMA%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_ancientfortuneszeus_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Ancient Fortunes: Zeus</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=5iDMwDt7B%2BKX21bebBkttVAe%2BQgUIlPdugzpWlIdewau4P41%2Bq%2BArVb2Z%2Bqb9wugvlbWyvtsEjWQ19X%2F1hC2fbwVP5dc6TtphZ7VWHuqXq61kuUWOyizEzTjxiVrDElzvcPAmZCsaTlyyx2nC6aYbdkxuYDCnUMmzKmtzcDVp4o%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_spinspinsugar_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Spin Spin Sugar</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=8YX9LZ7cYNyh49S9TPhmbIalIIyG1fR3GNoiG1Fjf6qiQ4L%2BIljtyc%2BZElKiTrP8gz5pLjQcMPq5fx8CE4ywYOkzW7FFJ0sZdym8LVHYXpcferT6LLhljgf8sLsEzlwkQ0YsOVRTAJTTvLQ5%2FKnrYUQLfS3Eoqj6ubrHvjNJ%2BIg%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_amazinglinkzeus_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Amazing Link Zeus</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=S81hXtraYK08gk1e4GiII2XDWu1f6FRDFcI8y8vsgD95YqDW3MO1mM%2BTSnkGn%2Fd6MeRE97p89CRedXxbOE9u1bE53c1OebhLJJKqFHcVtPb3MpBvXAzMI%2B6LiWYE%2BhCs2BBK6xoVTVgwyV4gaYkyydUcAa57jwOGk9oSMvGzV5c%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_mastersofvalhalla_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Masters of Valhalla</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=UHMhISdTvsd34mfIpuN6SLjGE8REoQXVbH19dGcQ0g7qx220DlGLQn9oM%2BUvOixQ9AFrmZyDbr%2BK2AOP52zDQhT9vEj%2FHVS34tqyJZZB2GaJaT18OO6TKYYRVbbUOtjY0%2F1%2FYLrh8CLL9S6fTfleWBedYrKU7zPQcYrPTZOMSP8ludakb5vmCI7YoF%2FWbFd6kwaLXTuWELFFOxDCZoXqbw%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_ancientfortunesposeidonmegaways_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Ancient Fortunes: Poseidon Megaways™</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=unfEbCZRSgUp9kVhfmH5tTWfj1VHuc1ebwlOvXTQEWdw1dqMRnlYFSX1VvuKyDlTshj8pxGnRynqTzDZcDxbCHY8vWXkmTXXBG7eKVfgofGvWXtBwGkkRCiaslOSahn5ozFmScP2HtgQOLBqKqvfc1vClkJLDnpV6AVlUNs2N48%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_cashnrichesmegaways_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Cash 'N Riches Megaways</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=u%2F2430NBGtYayIsVnpTOPUcpB1CIwDPhqwkiZwNfe2kTMbT1JdfJjpIXu%2B0PtDZ777mvA7Qyn5Y%2FK9w6QIswQkivPVcM7Y6cOmZN6%2Fsi44TjCaEMfQi1q126CSCCkqoxB%2FBP5KhJxlm7WnmOx1sn9Q%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_bisonmoon_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Bison Moon</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=fldY8ZtZObsW96A%2B3Naxx3O2Fgsf03J9KXH6vV4H018N%2BDHE%2F8X84IaE5zHXxuOvWxfXXP2xVxhnVU9RCUK2dci3BehrCJLJT5q4cmlsyQBXGD7mYsaVcL8JxlSNDHxlojXKpSwqrTC0%2BmGp3OwEe1HSfsDGCcGcvTOwvcB1vhk%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_sugarcrazebonanza_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Sugar Craze Bonanza</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=S6aM5ic0jjWYNPvcHgM73kQmZislAtH9vXbRyvL6ulmvBWRMVesrYbWlr1F8d%2BK1CdDI6Gd21%2F%2BXYR76cJdxiYBCcW5mPzVbiDIyD%2FFtUA7VjfHEeqjjOKbZlXveW5gjga1v1cZzHLxrdi2RX2K6kHF5ZAKMR40cbJM3wwoF5sQ%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_breakawaydeluxe_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Break Away Deluxe</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=sAMRRrdquc9ChEEN6wwRD6YkX5QC0x60i5VXAi0KAU7ZZNg%2B7i33vLtDEQ8mZLB7vuQ67%2FJ2oN2PdavWimGGRHrbnpOk%2BgMsY80CFlrJbmzCx%2BNcXYMepw4eX5CjsxzI5avV8i7EhrhPpqQrev14C5N%2BxcPq7FMpZcsz00BSd90%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_fireandrosesjoker_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Fire and Roses : Joker</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=c3AGyr4DuHhLTr56Czo5%2FYXbfnQ7G2pByj3xS%2BNRFunU%2BOWcC4FeuCBY%2BSKVFrDCZDaTZ7xBOLeR1gaofO0mVVHNpyAaWr1jx3UTRQGilutVOic1QvUVbtghiG0t4oJo4tQ9afJ4FRD6hq%2BfUAiNrZyBeGpwsNv50Ooq%2Ff9%2B9Cc%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_basketballstarwilds_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Basketball Star Wilds</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=MdrH3GZW1puW0uEeh5NeDJUqbogY6cACrqXzYtfVtM%2FPWSm1Lp3jvkT7LNBz0KyW2huOBglxBWAAsQCTPR7CJ3NvL%2FHSoSLLSGKQDuWxPLJR0NtrR7%2F8oYmCTfNPdO2APUaf%2B0NX2i3R1%2BxFCbkgIQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_maskofamun_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Mask of Amun</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=riC5%2Be3dMhB32jnaQ2X4JZDHPMcIgxOZ%2FzWdwX4Kj40ARWuVr7HW%2BU99pldZWyWi5V2Nm1FkOrBjwvJHm7n%2FmXvSlhXt7hc6cg7BQd%2B5Xqj2BUEHHdEyqLTJDKOnGJ4Oowg8DYbYqPBUhtacheLjaA%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_wildfirewins_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Wildfire Wins</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=CUphRptBjKBSrW5CNpIIWrXVN6sRtz%2Bxfs2fTLQchWQ3F5gdf%2F46XT66%2FFKK2D36k%2FfbnNHMZmlbiU616EQCZfaBTX3T8PkNEY9e0gGIKwmQoqWdrAlLVqxPDzjHuRe%2FM%2BdJZmnNkgQ1j6PDeiLiTA%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_10000wishes_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">10000 Wishes</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=7dwpdNLeE4xD0QChflEzPINk9JQU%2BXMa6j6%2Fht0R0DiMsnVZjEU2N3PHZFVZec5e3K33FLWXOAdSD5mEVanVADKR7Po7IFasmmOXo0NV8f4HFrq7fYE%2FeDp2eQbEHH0XxcDONWH3f0GGWB0trMCYDz%2FeaeVNnC%2BVmXHtUP9%2Fwpo%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_romefightforgold_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Rome : Fight for Gold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=64Nk25WGsSCz0gwmjzom7LgIiIKToRZucbORUIDSm5hyCyjwK9Z1gaFpv29%2F3%2B5DSm6yhak%2F7dzE6WU1gJHGX6021QAmDVTNyroVYBnnhd2AUNdnmIXCyhqVHGF3g4qiQVkNe58Vs0We5CtboTo7TXO2iM%2Fk1SqANgFzaCgL7B8%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_starlitefruits_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Starlite Fruits</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=BkmdwlwZXoCD1s5jI%2FpW%2B5GbGLkLw%2FZgpkmmJ9s3NY3FcuoMjdOUz2T16M1J7vKa6vBew2i8CLjBdaRfPdiMvcTd7QwOzOLucGPgt8ENSp182syw0DzFbA%2FTOsedRfVOVOoHnXgFYPI6T9rLOgitxQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_tigersice_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Tiger's Ice</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=XuU2CN%2FrahyPULwOy%2BQ%2FaL3V0a65OfGYi%2FJwhogwUb7SpWv%2F3GtQEjgaPSp%2BA5RuMJEBWYmj7pWc1Q8%2BXFVp5jemf%2F6TKqIqQYOEXNr01Eur7%2F%2BVI5jpYjxXbwcnQfXJzieMAmiZB71hCgD9svWJ%2FQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_playboywilds_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Playboy Wilds</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=Ngju3KkIpaAouTYMKeROG8rkYnuXwWDypKd18x36B%2BinHhOtD7d6vWqQ2b55jU21n%2FtWXxi9oCoxa9DYJaLl%2ByZiuFHZOV4C5gRC0zmhDp0EhYyR3S2G9n0FUmOQdAO5RZenc5Gw%2BIVSYTcebHtmlA%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_9madhats_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">9 Mad Hats</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=LQ%2FFbte8f%2FoTdlRxTpo7QtV7F3bZM35d6hspG5B6HAdNdvysQ%2BovA7c43ziM%2BXdvLv2aNyI5UO7dWwFjEx16lwdwCjvenAO8kU4tT5s7%2BLvBpJR0V6TtkfwUldtkMYTVBOfKzKZ5DAURZ2dA4A2Y68qFWfHWWpZravZUhwVkYdc%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_wweclashofthewilds_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">WWE : Clash of the Wilds</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=fVdHqio447pfJztkFMMPoUKAHGrDh2h0POlmz90VbytXLCOwpSyb31BSw14TTu%2FS6dBOri2ILrms2EaVni3PUFm7Lv6zxM8b3GI23Ur3AEGmiFPiO0sycXTsJOLQcdUr9iFgBVkLg3vnl35Sk%2Bd6FvyK6KbhYOTHxhezxo1FJ6c%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_fishinchristmaspotsofgold_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Fishin' Christmas Pots of Gold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=9hswWZzYEfGu2A3yeeW2FO5%2FwzqpK0rOE75bH8GxDzXDKpaSMQ4i3BgkmG9UB6z3MYpecd0ibOM9DdZ7LY8wWwbn4y2Rm1kux5LLk%2BMnmAxrU90csnzfE5UY3DEOsHG7BLHhMZbypq3TSYUyu5NYwkA1NHX3WZkzZ2a2CbTiJI4%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_thunderstruckstormchaser_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Thunderstruck® Stormchaser</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=bKP6kavfYFJCh0BQ2GZC5LQKwZYqTTSwfJtf%2F29VPeImLYLSkC7Z867UonF09dZR0wadrH3WmkfqK5xgBC0WpSjWzxL6Lk4Me%2FBeF2jpi2VEFjBxlYSCnTcyzm8Vb6Q4Ek8SjDgwbalx5K7n5MDZ%2BJCCImy7Cc%2BDkvBr%2Fxcgik0%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_9skullsofgold_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">9 Skulls Of Gold™</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=cq1NCkGpDq79Lk2q6sVqmiVDmWNEtEXzYsxx1wBjwChDMH%2FmC3OySAhVHxvkpsTVue5DWe3zr4%2BT2IkEn%2F671O%2BAuUMGwRzChPL8eKClqs5lnggCJsxlttZTkJE2u4EDMDDA%2F8pqumEH6mqIiuBMlw%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_soniclinks_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Sonic Links</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=a%2BRwnXHCUGaBpVjRpymD%2BzNJZ6kSxrYvXS3awk6YxRBzbsmsWY7ipgPyGVHikLNbqKrXne%2Bk%2FHGVWhJBwEIOXXFg5CGER86DNOoiB54EbtFXeJgvopAiPE0%2Bsi3fy50f089IDuoiVfN%2BdGQrD4SujWOddI%2BfMtqNLrnGbDUtRek%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_fishinbiggerpots_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Fishin' Bigger Pots Of Gold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=zL4MiVInGLO1VWNO0731AT4Cxc%2BTx%2B2r1%2FlgFJ29QB5p8z7Z9344TXlMsrr%2FhY7Nd6Yr0%2Fw3ACqTbQxg1U8dCYMPAc3OwXHlpqw5zcmJSUo7dk7ZFX29laNRjjhPOz34DntBKOgXkR8uEhEaQj4JW4U11Lqn5vodbJghO8LH9ao%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_luckytwinslinkandwin_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Lucky Twins Link & Win</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=YzLnH2QoEtrV6cIhNG285J0TgfBPDest87GTsv56SPv0LG5WBaz%2Flugv%2Fu3WptrYqK6de14X8XtjUPNFApBX%2BaBDeZWKpi25aR59eM5UuFRqMN5yCFywFaSo9k7M%2B2Q9VpoMP8O3YAlMaxUftrHmh0v0J8RyouLeG7M46E%2BlNvk%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_agentjaneblondemaxvolume_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Agent Jane Blonde Max Volume</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=N%2BIYQX%2FlWV%2BAMEykWmHhOelzdGWNim23eWhSMAZ%2Bl3wBQJbFQOSTV0WjzZSOO1caQGs89OCXkgtDwv%2B%2FAPNhDbhLM3ddiK2TI6QxHkM6eWeJ1qq314Sj1Ceiq07T1gsFSlhkPT8hmqswESrZpE7t%2FmOvdTaRzFqrzuBbiLxOX5g%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_arcticenchantress_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Arctic Enchantress</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=D4hQdVBsXA7sdrSM9YRAUKvwYINc0wMRG%2FztSeabKoGAkGteuBdIV3DWTHx4ABvfXiISR13L9JmRWPaimsasPIPeV6%2Barr5DQ0dNQr4GK%2FH%2Fl1oLDTx0S7XhXZmZZFaxET6rPlSqEuLBMdiXcb5SCei627z%2BqHRh%2B0gtIWU7EuI%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_bigboomriches_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Big Boom Riches</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=4QUZ3%2FWPjn8%2FIiMwNKt6p8%2Fko5kIOarV%2BjGSiyPsGVCmGwQkhNYCE%2BJDcuGhqimMsOhb%2BxiM7CwvtWM3uOgWcjdD9f8I1ZBZ3OXp457V1EUJg0pZWNtPwSJwIivQDhvufg7OZe9ts4Y%2FK4qog1tISeoH3BghFQ2ROcnvtUdpPyw%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_dokidokiparfait_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Doki Doki Parfait</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=hgYdCyMY8UMiYbOhIpF98RVZdOlJaR9fdaLrPC%2BiVEOcxpvDFZ1MLNlp%2F%2FS%2FNwgPq74fRwJoKtpygGXSLMny99UhR43Eomu79J0fKwmINnq8MforrQQe5NP1zxHYoxDWZqitAqu48rX9XfEdWLd3kw%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_hyperstar_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Hyper Star</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=NBhIoJFBgoUeapPaRzEnpYrcJtuu%2F4RnpkUcTyXJNzdW2Psy7%2BpppXZ3zA0EiNOPPxVwjlr6EqtGiCuPzgoZWhkjR54yYR2dvH3TwU9Sr7xdeSX14OBksSjVR%2FXCZgoXQhdFcp4agFRWYunmpX7AADJ2XDo1RJhr3otlNqbJrIs%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_kodiakkingdom_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Kodiak Kingdom</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=zwGSv8x5dyvmNadhFz3MOwER8ytC9v1OLbHLwFR%2BKuHHT3AJb7GUT1zEFAp%2FW9ERd1NMBu6cXYlfx6qzeig3viurVA6X2SyBnjhpNuIsvGWU45T%2Fl3x%2BdCqXvccDcO6XfvXbQvP7n%2Fz7eJaEAca9oHdxNYrswoPx7II8Z0srBQk%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_4diamondblues_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">4 Diamond Blues™ Megaways™</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=REmCJniAk7ezGj%2BHMgrf0ACB%2F9wL5QF1h7Fyt1Vw1qXZJ7lPWzRLDkf4FjfgwuiRqxh%2BLpHanko6ZgUERcfXZMOEmWhQoDOb%2BBd0kteEd%2FJyYVKe4vUbvq4EqIA%2F43FfWh%2FC0kXyMWh%2Fe37qjQI0XYHjyzyEHRvxnLYwRRAnCGE%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_9masksoffirehyperspins_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">9 Masks of Fire™ HyperSpins™</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=2%2Fxas7gRMZGXr%2Fze%2B%2BKfc3zud9gSAbPp%2BXzffpNA1GY%2F2mTK9zBs%2B0VUg5KSNM7WH5OPq0X2t5WbGWiGdSReBa3bTMBZ39K6lmfVOB7wayIGMpPH9aB%2FDHGVjhBy06%2FGW5ytXViN%2Fly6LwihtONjvb4EkaG96UU6aka%2FqJV3%2Bjc%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_bookofmrsclaus_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Book Of Mrs Claus</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=G5x6EL99tQzDo9oyDCo0LEum9bf5sQGR0Qv5LGf4K9ZvVPhsiBcMJOq%2BCzYRRHovo9i7rc6DliePXukYwB1NLmjdtDeUkowyk6GkMd4ym9YTc2R0DdZiYc222Gy9Pjv8pVciTW82XQOlULrNmBkFxWqGGXp4Bll%2Fq6Ao4I3GwAw%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_squealinriches_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Squealin Riches</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=ap7DzYMmUnJl1LxZEBh%2B3em4Zf%2Bc1FRCexqYhxrW0F6rfCueZgoWvG07T8nrkASg%2B67x2paHB7FLmYUISlLScLtkJvnfAHQWoGcOYRUFfzpwxa9CeUJIuJuxc580kO%2Bi%2B66ueaj%2B6Qix7TyZ7nrE4g%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_catclans_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Cat Clans</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=0NN0%2B2nUOJpREUjdqnIhUCZ0OeUFb84e6sh8FoBDQV8Cr%2BGVZDhRhw1%2Br8Us25y70ka%2FuANy15mfvozW8Xx6IqDSUS1SLu1sUKKp0HR8yqhH3JoR7RBybR%2F6JMILwfdTfnc3SLSWe3KRENLnT%2FjnYw%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_luckyclucks_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Lucky Clucks</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=88120fyhXAE4h8icNbZUVr4k5u%2B8qJ2KU8krdPSTRNRq%2Fv7dEcj7OwK%2FRhEFRcwZ%2FjCQOxjodH9OKVHlRBt8P3RvGtKAGoj0D9awOwG9xKuz9C8YwQXlKbX5YRnE5PLFnzx3MYfcWgn8XWfJwH1rsqpoVjYO8i%2FlkxwKnwyb4kA%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_chroniclesofolympusxup_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Chronicles of Olympus X UP</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=45dsJ6OesNGgDnSf1evWONplYkQkUnbMnc%2BZ5vkcI00OkrVP%2FLZqbB0Y3QIVFHjDzwBGA%2FE%2FU4xBHJyfrPMKqDD%2BSODJf8i%2FJ1K%2FyvuNtqz0tPzy36xP5FkCSB3fnab1hwsUbyL37KxUlDzlLQLiiFUk2s2lWI98mjI3hpgCLc0%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_cossacksthewildhunt_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Cossacks: The Wild Hunt</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=laZfvcLGUJojsehRENnccFIFzO74e2I7yd%2FozBVCXnv7gyorQ8y9Tpn6XqAv2LUamCGkkHqsUEdHP5MJBnEMcKXNqZxF968ORgDcj%2Fc%2F%2B43OaCc4RdhsejrLeD8uX%2BPH32CVZnfwAcA5kGEejWwQLVn1g%2Fq4Jzt1rKlNFL49ecQ%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_dragonsbreath_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Dragons Breath</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=g15ahcezJQnwXbdVOgZs6C8M0G1Nicp44nebE80lf1JEqaprSaK%2FTG7cm88fXv37DqHB3%2F7SiZEsURCw7Nc%2Bq1azpNL3GxcD6urN90MLnGJ6G4z94b4B03%2BsrpFSWiWTo1RN2UrYnEyTKSY%2Fg84SBTiOPWTIGHJCX9GBQjohcB8%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_wwelegendslinkwin_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">WWE Legends: Link & Win</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=i31U1fj1enMtxk0j1e9rf0GVybPeH2bGRS1rhvKEJ8aW9HQai1eyt3Nyy5fNd3Eb8srCgNHpnvtpga5N8%2BSV4ReUrOF7hNDf9tzz0bjrFsUJDYYFWotYxXJ5bGrOLQTSJaVk%2FOpJtPHuKankVhbgvA%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_fortunerush_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Fortune Rush</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=gl1X19HYg%2FvejYFrX7kdOxYTEa88yUyapPrjSTrQPBWevQpycOko9ES6M5TPuLxGatixurrhG%2FieW3GevFcEOynBM9Vu9oH%2F3JHrwzRhc8%2FnV1C8IQ6AMJYH507sAOqfPZS1W1zJ7pIYMLEZ4cgtUUf5phJZDLWf%2B6peo7Utiuc%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_breakdabankagainmegaways_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Break Da Bank Again™ MEGAWAYS™</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=5q8zgS3UKlQCUNAFcEODBcdH3lehuQOwVr8wk9IEFRy%2BCblXs6DtoSwSFk7uWnJ8oBpJKLJwj1obE9dszLyIlGulgBD%2FYu1i8vFHb82d4Ny%2FPL8XvWFgmJu4bN3ObSg6zohDzYi9oveiDA%2BJiJ82GZwgovzvDgibX9%2BCEM7T87o%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_jurassicworldraptorriches_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Jurassic World Raptor Riches</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=3bJzAsvCzkmV%2BB9A9s1v8BfASeey7kLrT7AmkENzA%2FB7d09PwEjqkAVi5IzkBLhHN642%2Fv83lMIekcp%2FSPGTvSNTJAedWYzWrXJc0e1XnBdlH%2F9UmCUKHf6zWX1PFqq82gcm09LmEgKlfqqd25kjyA%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_africaxup_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Africa X UP™</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=6SPhZkQv8UJjLnMZmHn5V5xGwkdC4r7ETLgKRWBFaMm0sIttrT1vZnY5YD8cDrvszrfVAAqoAoXfC9fSx%2BrQQb39IK8dinqj9Nq5DoBGpPhdmfMDBARa5jPWrTOVP14wKi4ejOGNDsFBaUYJSF79wc%2FEfZ4LurF7WwI46aHU2VU%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_amazinglinkapollo_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Amazing Link™ Apollo</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=Z0ABeFXcle2XZvtUAszg6ONlq9%2Bxm%2BNDrh0bbKNqyDkVMadjNrStgxoSWKJiOFYppZ9y1FRM6FWwp4XgVDz2ytDSaOC4nZjjHPcgHyV7Jh4E804Kbme0PGI85NHVk3rEU9aZQHdws%2B%2BpIv4%2FwOqOtFSi5cjqVsAP5vMiwlRCrmw%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_thunderstruckwildlightning_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Thunderstruck Wild Lightning</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=3GC4Zvd3ZH8ih%2Bgz7oI2mZYC0%2BgK3wiSHRuh31sXRQDGpjcQPJaoOZ4917y9G%2FeUa2mUzOpR6%2Bj7zNz5fWlBa7Gyfey6wcsJGHVExP65d2sQyKN8Ex33AxY3QQemkq2vaJeYH8GbBXhrdN0nX893lA%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_elvengold_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Elven Gold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=T%2FW8pxhc7rFjd0zjVcT5IXZSazBtA2plHEFlfqX1QH4N%2BVqRGq9%2FubLmh%2F3jmiejRmvJGceoO6rubwAARleKmtuvRR2GL%2FmVdsye3MrnLFiUzVaO6k%2F3s44VoXBFAp23qIYZvmXLx0c9a%2BAe23i0tQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_hypergold_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Hyper Gold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=9cmpqnqy7dGakOHnLWqbSDEEUhx%2FTBVkJkWsEF5SBNh0evap7xV%2FE4XrSb1LpfisPKnnn8XSogm72eqXZmBONHuCo85ESN14dctjT5IaG4IVDLex04%2FWMqrCXL4XBtl%2BTveoiLyq6VR13DX%2BJnfxtg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_legacyofoz_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Legacy of Oz™</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=qIwzOJVojent2vsbP2s4V66Wk6zpxuRXik6MMgiAzeWaSmuz1VApAJUjIehkr5uyltBLY8Rrd7HGj4AEHqvMGQS7KJdKjSGy%2B%2FdqT4gLHfZUbQlwEwD6nqc%2F2HuJOxEt9IRu8CkfVxCWE3Hw0vqnSg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_odinsriches_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Odins Riches</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=s5a6o%2Bwub7SXBiasGEuv%2BxqNYpXirQ2INUQDWtSC4TYM6mFTQQNY9Gf95s8Ffq%2FO%2FaMDHVCn21G1cSONBe6YQFwtR7lQy%2FqjUkT1LSGzJfE2L9ot%2BcYepLBkRkC11%2BsPuaXF7xrvH5j1xTxwXAE18K8zjaV3u0ty4NfoacyD6vs%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_onihunterplus_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Oni Hunter Plus</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=UtFf1x7HHHnZ7QokVQP8p%2F4M1yOzTTMM%2BRleQtKOtbrON4jO73alYTFplfznyfPSmPGkGTYwx8BGStiXQqH%2F9VD3cT33djDM8PmAwX%2BPX%2BqaHxDN9UcE4XCQh9Nuw3GUeAhoggVMIoblgnGN1tm6ierRC1mPaVz6gWP5wbPbePE%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_atlantisrising_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Atlantis Rising</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=qrf4GmQmuYsI8W%2BNGIGD8vVgoPLxX%2FArsb6ZGMeJU7PClaYwe4nngFhdjCg0DBOKEDi2tZu8he3XPK1TfZVhlKzmMQ2erybSiedSBWK5qFDI2IxVVd3BUUKiQEGSyC07jvTDYGke%2FIWp86LbBD%2BJYymA1jjACQM0QJMHPMpUvss%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_blazingmammoth_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Blazing Mammoth</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=JbSGdQnOfO5qVTTdTUFuvm9BXG0cgy5VBsWZdlNvz%2B4OaiIkEsWzRUl0H%2FcDiW686ESrugqqfZTn3FBdgzhZGjTGsd4AmaqBlxMw1qTruRKewSl16zJBUECIPpwSnczN6D8M6oW5E09%2F9jvq8mzw7j5cV7VCAI86kyzFKW0ENM0%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_divinediamonds_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Divine Diamonds</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=wZpDOXWOsf6F4YKVdy1hmNqXBQS5CjxWRiSkokxcbVqAsINPGVVtDZBqGEQLojNh8fHUdDIWGemtjbH3GIKi53fNp4kIFJ6nURX5rA1lAMbB1M%2Bdnhu6WFe6iTPNgUDIub4BsG9pNhbpxZBmAnCkPw%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_joyfuljoker_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Joyful Joker Megaways</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=l5OZxdH9gpeI8uSJbQIG1prxR4SyHF%2BU%2BhJ3vYTiVjOySKphw7VChKP8ve2prLoe9LjxRGOY1YZ6EHvoNgfD80yTfJVZuOIWjZ11uuZ%2FpaYneNjbbrpXuO47Dvua5Wh9Z2U8t4qriTkVjtRRCZvOH7cjwPoiQ0bf4hJ5XjjbLjE%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_queenofalexandria_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Queen of Alexandria™</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=ZZpcrAPIEzz1FLheisR4Ac8mWdqtIWpa1IDrlfJrX%2FlCNUGQKbRdue5kY%2BD%2BpzvpI5tXQD%2FnF7rIPOOg3%2F19XW7A38P0k1jNxW23tKh5Ukv4%2B%2BZO%2B9nQMiHcHY9ekJyA9So4ReZaJ9MY2bGstYudEuWmvN1zoqJ2fl5btxPrS8o%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_9blazingdiamonds_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">9 Blazing Diamonds</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=fRSsw60SZgEOnezRptgZSNQqdWP9NLYKZSJS7X9%2FwwP0vcsULqWIywnHTLezFPoNoyu3aDOURWD5Y6fxdHs%2FM5LbTIV8o%2BwhvRp0zR5HW9DuNyMscQrabtL4uyZf%2Bb%2BVaBK5QS%2FdVlZ8szazsSlCMOwhbWzl%2FkVKmBaC2gOQy7I%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_serengetigold_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Serengeti Gold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=tSwxx64dG%2BpuCYNt%2BeV%2FJ%2B5E5EgFyvD4vXxJVE%2BkEGAuO%2FiOKd%2BFDiimrg2GBjwOyBDCi%2FHG4778NlMth19koWobvw5WlkBxJnZttMRzZGSFm2URjX63bXVpCC0BtYe0hRAvPAgBq3DMp5JyM15nXcHM%2BOVbQJ52Q5MSOwV14qE%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_bookofkingarthur_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Book of King Arthur</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=I452IdhJ7hGZ0fWuYuwq835%2FbFPQU4ZzIVKyz15Hsw85PunqgSXdmnNpRJTNg40BpwR5lsumzPJCSCR6SbF4ucWQ5uPUs3O5VJN2kRFtA8DyD0wmxbx3tsbw5VMwyPDLvmR6jSU62UOcgjTTPgU4aAX%2FPt37ERpe7PhH8e846G4%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_egyptiantombs_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Egyptian Tombs</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=QqlFGIW1oWTbWHTKvaLUD%2FZ%2BE4J3A36k6IDrdC1JtlA5axOjyeutbokdn%2BHv%2F4ylhqD92peWOo35VHwY4vsnJjJBCMOY5R4Gkk2vAINR7%2FQvn%2BVG9HTfBzTcqhXXySnBY4InXNEqX8L27I4TEbBt3w%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_emeraldgold_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Emerald Gold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=6sLx%2FX9HuGbBA8RcJmvnW1%2Fv%2Fos%2B7IFICgnUz8KANmpgZ3sWYzCCzb0B6RIRTCsCtAeHxD%2BTgWBF2qbZFFuifjLx3CsDCfZaWpp2QUowV3tgfzHOkDsbBnzwUWTQe9kkHNV06yvtjysbdq7ZOoYRtZHJkJMv9tgoCiZd8TJVPKk%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_8goldenskullsofhollyroger_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">8 Golden Skulls of the Holly Roger Megaways™</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=yXpfxI%2Bc0ZAcida0x9LvardNBUqKONtJV8miResNF%2BQUYiMOx73Aa3ew6jHPTQ59Erje65U4tWsJt92L7T9bixqDlLUkwBcGip6NNaEWo91xVU5a6669%2Bh7Co%2FXwx9r7RFs8Ie%2Fk8i6wDJMdfWRbRg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_fireforge_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Fire Forge</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=rI%2BJssUOUwF%2Bti7tmaMW40izDTxxnL9xr%2BGb3oDcArScdA01W3u1zsfY4uEFYfIhX%2BXSdlrKg%2F%2F8y5ubIKmFnEImTfG5e9k3FvfkMsyoLjO6q552d1BKHLP7YnMNUThP1Iq3%2FbkjoKsqHO3yzKvSOQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_hyperstrike_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Hyper Strike™</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=BLE6lwSpDVHj%2Ff3hf0ezkVclbvtWFSAq2sOreqKs1RSDzJRPuQx5ytM9bJorSRoXN0JPetPNceSGpELx1z5%2BA08sprmy%2BdHYjIZo7NM9rNw4DSeoZ9u%2BzWUN28qWvGrfhkx0iWYDhurNJ4TNeeoe8OU03yNfxinW%2BXKYQt0fQqg%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_777megadeluxe_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">777 Mega Deluxe™</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=LIHTEn0h1%2BUcLdfKSdjLZm5jhmT1%2Bl7DQSHt9qkF9btyykaLZcKrXCxm%2FNaa9LzR6dCXQ10kGQaeXybApcKzEuMVubyRQEAwwi%2FiMoHjmyw7dH%2BYFcFANi0m2vjH6Ox6N1WrapMW%2FdBprPCDzdQOsh1NmfExhkIynjMdbq7KfOM%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_adventuresofdoubloonisland_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Adventures Of Doubloon Island</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=TRm7oOw5zNm7qgHUjdL7wuLVq1CAJkvbw3a0XbejnvhVw4PTPf2c7D7JrNF4s9fZkzOSzQe5aDvje8gUXVkBGMR5lyEK0WboEmajhiBPzVdqwXIqlHooz25oSQquT5m98L%2BzOuI48Z7zjTZO90UgJ9ay14sQuJwS0BZ5CjMNG9s%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_carnavaljackpot_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Carnaval Jackpot </div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=8lVB4ggnJ2c67JlgMe5fXGIiNyCssk07mHsaWPvuX2s2TbK5WAEFtYHqJkBGIFj5S8z9cfi923AnoHkSc8cDpDVYyVB%2BWk6HYyTeFdTagKHDeBN%2BgbFnra4H32d73EKI2NdC7xPekiC3fHFTFBMCyVtlPxq4LFhRqqvvhqjidj4%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_flowerfortunesasia_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Flower Fortunes Asia</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=P%2FW8QwJnAR5e2PX2nghcPZ8hh07rsWcJlLUVovBktNtSX2M7BCFB3gkolFQZKNvU1DJCJs05r%2BAj0%2BAGNpr12nGjKBX3B3Dr9%2BUmX56KxH3u%2FUffTM4dPdFvAtzG2xQ4jd0s%2B0IEPimjcjlBS74Y2jgKQs9147iumahpDqJFP1E%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_forgottenisland_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Forgotten Island</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=yOQNDaQWT2EU51%2F1iYX%2BkUmM%2Bts369melA30d%2BQOkHhZk2brBbFFdvdIumQskmGB6d9t55K92NKfPqrsw5gXe2peUnfhTmV%2FZFZBcNm5wmBFBTfas3sc5yOhkA4kIkLY5C1pnxtt1u9qf0DjO%2BEaZFRG99sUpjxUdV5%2BHBL8ZtQ%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_goldenstallion_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Golden Stallion</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=msSdCPu4%2Be0T4p2xzrVR1weUndGRzHfkQJ8i0gIWkD16PvT3ReIVQf56l3XnW0SB%2BypLQlPZhUXMkRn1fIPeMuZfjUfssVqdtknGi0ixdoqedCZrUeGTVAE4RHqsKGVFR6CpkNxFtK6QGVh2duXT3A%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_assassinmoon_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Assassin Moon</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=qe9Ee1V%2F3U2DJFKUEW71X3NqOwsbW8ztD0%2B3AoBnJ6OGS1UCG%2BFdkevcDBm8w2VUJ%2B6x%2BkPO%2B%2FJnmtxKDj%2FqzDT9HnzPWDNfOkIcAGtq0B0rs70GXJ6Bt7WQqfZq5eLnQOEh%2Fp0W77YTMAlRMoqQJQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_augustus_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Augustus</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=J22pKsO45EdjZGkW4ETDTFvdIZQHIVkfykwG%2BprgOrRmRz9g5NDDTRfFtS%2FJHNwuTwpoRTpV%2BfH3f3WO6IY12FYXuXn8QFaeU8Xe3yushtXLRwi%2BZnvgHQCF8gXBnNXSurdFVs7xlMRHB9EsNycz4GxDhUuFh%2BbKAyMMeLpKHEc%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_shamrockholmes_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Shamrock Holmes Megaways™</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=FtDE%2FqhWVX6Sm5lKODTfIuMxzH5s59YGZjy5L8oPqtwx%2BXlu7SmBoa8FvwxLou4cxpiG78nJzkCwp8bXNnG6mHP4YFSqscfT31IBqpp%2Fr5lKmY6GPyEpaQnAICNUfEZY5mWQNhU5ZQSVQxXQSEN0BroON3OXygJa9XzPgEq5G0k%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_breakawayultra_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Break Away Ultra</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=hqoeXpRMmJSiQT8krqKJY1NXnDqIqp03eF1I1Zr%2F9QE7ST5A19ZrrFB3%2FAiDSk%2F0UhMaFGUpTpKuNm92x5jcSCfEF8mCdY3JXyddnpaw5DCXNoPan%2BXXRKEbfCGGvcP4r%2FdMWjnlryyQWx0ygzYJurBAWftnFfcfSTUOmAoj4PM%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_emperoroftheseadeluxe_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Emperor of the Sea Deluxe</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=9uRIul2cnP4IT2VyqyMzh2GgVTOxqGQXNrAmll7gWV%2Bw8cbtTqrZci4TNoOvyAG4XSUb8eyaSA%2FAzePElIhJVu1TXvXFI2vSoDxdQzC2OWRsOzuPzh4rjjYZjd4OMQc1b0W%2FlC%2FDXLlF1xKor2Ms6RnL09IMnHfDWLKf7MMXewE%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_gemsanddragons_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Gems And Dragons</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=u2ykF3W%2FzblhMR1iKM38tIngySxcu7VznNEGM5t%2BNZhe38wsYGwrq2c41seuz8g%2F9IPv6L%2FiAKpsU4gCwyl%2BeC4DO6dk0cUMxyNfSdYxgquYosHT5westZGx7E2y4N0jE16BRkq46szm04MpWxi0M0AxlnEhmEcBHSMZbEe3uyI%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_ingotsofcaishen_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Ingots of Cai Shen</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=qXzbC8BuZaj4pdo%2BQ6kg3272ywNKaQdGaW4f2Py1ru5QM0YcGnBORl4Ze5AuZblXJHJ4noGeYD0Mg87HU1Uq632EwEC5Y7DBSWpbUCWk9v5eUseO7bzsp0haeN%2B4fZctNqvFQ8MCfvN96sui43Le7keaiGUAD7xKg682qNIfBMY%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_777royalwheel_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">777 Royal Wheel</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=qiyRRIEVZ3ZU%2BBGqAGvPwHNYlNpnFnb%2B%2F41SUtM0rLvN7kY1QQ7WX0DwMx%2Bp%2FctEH%2F7Ucs4Op0a6WSNVag3%2B170gR8SuzcYXEQV1CQLe0PzAd8HryOuI9XS3msXocwKo52TSv4nUOFDyPu3%2FrHjKiJZVhEFmgBezU17w7BfRPLY%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_alchemyfortunes_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Alchemy Fortunes</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=KLg3Dw0KfMiHZ2AREmb%2BZyC42TlGWJbUQltJE0%2FpRELs7uJc8EquDKRjrN7iLAtvuBTAH4pFJUF4CYOLilpiu%2FbZ4PmAMmc8DT9GUGNpdKQMd3Y7e25QnCEVEgk9UaTKO3jP6VLjPpEcCFUF7stjQg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_tikireward_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Tiki Reward</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=dfjk2tAso8AfmERVEdz0AKAg20pQh3d5LQR5xQies%2FbF8p%2BNHzRqjIul6NyNc9pFSk42IPao5B5%2FyGQ4Qk4oReVK8vBQYiN%2F1%2FB%2BCbCKKJhjA3y2lxvIZ7xhMsK4rS8vizi%2FYR0axPBX0ou7IQiHtVsQARh%2BxVFivl%2B7ZuRVlVg%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_diamondkingjackpots_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Diamond King Jackpots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=8ekA8HQGDJg13%2FNzwFovahK1a7RIKD4mdvEH7sqAg3V2hmfgyTFvvCFWi33hQqUZzrAq3yzp1%2F1%2FgyeLPAOSaldE8ry%2BhwS89p1o6Q2snudhghU2OUdKVjczG7R5JJ4uH1ZGvRML3KjxHM%2FjhKqDGYgrzbFsTGRQgXg34qUYEqk%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_goldaurguardians_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Goldaur Guardians</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=6Q7QKxzlKypxJR7Y7j7je8RRLWmnLT9GNoXYWY6cTZnDHcAdpZOB%2BNpjhQXLV3aAQSKs2unpYb220RsiLb75kndj%2BcqsZN9%2FgbjJDgJo%2BksxJbB3ZLyrWCgzVl0%2FBMcAnxco3s8bOs4BuN0MJewOGZC5BHDSYnE8%2BX%2Fu6Y4sI5M%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_basketballstaronfire_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Basketball Star on Fire</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=8JJ%2BMqdvYHtTek8pCCoLLzqrt9%2BXa2So3dGAfmwazcLUyK7zdTQ8fscH3FErztkwWsmmxvW3jf7rkQRIumVcYo27%2FX1wkwAAiUcxddMru4aSqaP2jw0qmRJMy1x1%2By6UE0zIk0%2B8VfMz22INmxos30sGwdaaWh4hrUvIu25xZjo%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_tarzanandthejewelsofopar_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">TARZAN® and the Jewels of Opar</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=RLAP5b98Zo3U9ixYorAJeZRJranCVAuk0bKRjWF7wDkyOnPrRjRsvABch8hCVu%2BEqa%2FxVrROFGy2S6HpR56J7fIusz1LSmmCsi2PCd%2BPI1Rq%2FukdpoQuIEq5pBILPnE0mqzZz7a5WX1%2FcfglTrNoNlmayRft4%2BHpZ8KSXIjea7Q%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_wantedoutlaws_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Wanted Outlaws</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=0qXFS2AUO3pTvhPF6RyZkP90Tqd9xSlrsCOZmOYx1LdS7oVlIVplktk7LyPZ9J5zw1ipX5rUyKFFi9wZAK2ygSDwYK8LZVkyDmdxYc2WxKnDETAH7JjapTZ9YCa7mnYiEdsEMWWrT6y6Yf9EnhLii4C8nQGK7NO260ZIEbippU4%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_reelgemsdeluxe_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Reel Gems Deluxe</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=Xlwc7Ih2JzwVEgCavUGH9yAYMOQCcPu%2BIH6QzRxasZvzlX1a%2FG0QKaIiNWlv1a2Vxv0MZpZMj6vCQSuOLYC2vg7iq8sUmMUxUoP8V6OwYR2Ydv49pe98ExxLxhDuUB08S%2BiD%2ByEtiFUolUgJHA%2BCLw%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_westerngold_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Western Gold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=OqNDSUXlLVddtjAgoR0fB90WMPu4XsF43hYeTjqWLxdroIfR6zmo04TtuZIVx%2BnRyy012SaMCcX5rTnGHuaCG9A1cjw6ryn1kzB7EBTDpY9GH9vesrl5uxHY8907DqzXQIocGVqkfQA54ggD76eN3caaoTbMGB%2Ftif6O7cyfEwU%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_sistersofozjackpots_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Sisters of Oz: Jackpots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=FQiKA83mv4Oh2FVJe54ZW9pmmMFxTu1BMe1gUlg3dIdzKPMDF5qLrjwim4Fkgk1Il%2BCdECmCGDQKOW%2FIaSquKOcV9lpvTYa64282s1hf8SjWATRGPLosQhNquYqvhYcemvxQaJLJ4OaFNvIijlohiw%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_wildcatchnew_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Wild Catch (New)</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=MS5vExlnhxaZn1UV%2FHu%2Bs51IOnt5AJQ80hy1Ep3hvXnOcsnsMx%2BVk0asiWHEkA4nl%2FYF9Qv7%2BcqM0JEGPumR92G353QezqSY5Ynh8zYSjJVJ709zVbxg1cAqa9jTgNhZvDxmCGSYmDIGFSUnUltRow%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_9potsofgold_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">9 Pots of Gold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=CDiu9gd%2FhvNlH2tOhcv4b%2F80FAyY8%2Bl1ZUn%2FidtT29UifVzG1r5YgBa6fxKiI6PG9WzRjpZfxyXyoLdiaP%2BlEB%2BLvKGlWOzaHt%2BXEPo4r4L9Jvh9yC9lET8irVxuueGu%2FGzw%2B69%2BAdb6aPOpEV1%2FvJeKEYg9Fa4PfGJm808MOK0%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_playboyfortunes_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Playboy Fortunes</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=8Lacva1jD7Zcji9oKRD72duDUj0JHiWl%2B4bnexnR6CXofXmYa%2FIkjCDa8c48fo2gwgv%2BQc7Vrhd6a0Ay7WbKpfvmFFjsjLQ5G4wu%2BS16GaTY8AUcdBWRmPXDQ59hK9fSFB%2F5JUWryArYmCfws6cf8LxQ9dk2sEEFBKgcLPUO8ug%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_boatoffortune_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Boat of Fortune</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=P8eqBNXzZhhFAwmNpXlePbTKyOghvJZqMLGL85GTD2gaL50VhzonpfI2zk6ZyEJKO7BZjkogLWhcUzd116wFW7m13E0m0XmeRoan40O4Ud%2FtOQAXReVvfQSp%2FdvauaEjTFUtL%2FSLonqe5dyJ2h7Q8bpUYLfAY%2BpIijwvKa0dUlA%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_footballstardeluxe_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Football Star Deluxe</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=PURQ8wSISACxU5iYDpWPf9%2FtyX5RnruSRvbpxZ3LlD8n6vT4TZADAgVSpul2ThQpCuZt7d%2BxJKjyIuXbsh8Y6kuVJibeiRp21Lhy9cO0n1CZIZqA9jov%2FjHdnXqzYoEukfPF%2Bze3ZdSjgE4oUHOtpg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_9masksoffire_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">9 Masks Of Fire</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=40TXaAaSFxKNjsmN23X0QoRxMfP3%2BwsdR%2Fps4ZpEmQpToO5cSVrtRPAPl%2FwD1uevkIIJKkj4vk9BUWs41WWB5wbvYQOYOdIoTL3HeRnOfqkUEqoIsI8vBOJnlYZxqvcV5T6WFMs1hJf18AWy2wrtQeNdqbQ0%2BhG8Sbj4kfJRxmU%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_breakawayluckywilds_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Break Away Lucky Wilds</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=NW5ujYkptSEiIgkQk3pFBjwVPowHS2WR2c7eEHLx6tMBjB86K2HJC8wkD8e6U5WpME%2Ffwzh6nNZ%2F07co47fwPbMAiTeKmQicxtffR1VlFODKOgnw9gSul4N45xMJWER6GX6rLexzc3C46fipveCi82%2BVvD2d4X9vmr2xXFOcEoA%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_luckytwinsjackpot_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Lucky Twins Jackpot</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=XV6wuihCTJq3IuOW%2FsGM7ghOI8EpCa%2BFliGxAJrAf1%2BiJjYwNM1rS4kVoZACsEZhI0osIrsCjZNnOb9UfL0Y2oi1q1uobZIeXlcsXto9UF5o8g6Kbpe7lliSKImQlAR182uNqDP42tautg9ibpdY4MWwAPz1dEK2Z4xlc8I7%2BwU%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_junglejimandthelostsphinx_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Jungle Jim and the Lost Sphinx</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=hT8an%2BG77SeSq9n387cTXQvwGGNbbSym7oPR4zN%2FGoNExbIYHNycO5IdWaRjrStDSJmK4%2FRvFbqNHTA5YsPAK%2FXXzPun6YsUlqrIqnzP85ttNNaA%2Fag6qDaZYyvAFQsMybuVXZI7YprAbKqWf0fXFzsPJEYiJUa9YzaZ%2BSD2y%2B8%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_luckybachelors_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Lucky Bachelors</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=cwImk3vledsDvOzbKUEBMeCmMoarbOeMZp3rndA%2FUO0TMTW%2BRLzTvTcJYHYtafEQfZs2C4ekbtgYTBhU8IkfC9J%2B1frpgj%2BDZYHMarTudgRwNhzoGVhe4yhnGSzEomdLAmO7ck3p2bfYBjdliNFmvs60vCHx87N%2F9hZBscFzlr8%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_playboygoldjackpots_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Playboy Gold Jackpots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=fbzOlEnLbrRPhztyhH2Ep9PVSypdf9Lbr%2Fl%2BOI7YzRoic25z%2FETB32KO6mG6IsfToS5QQP2eunyGRtckT1D%2F8KOt0oY4ZwnlI4d%2Bm3P4EXKT1XtgczXReA1gUJSusMAkx0QpyuGtP8rtGpbPXup5DQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_aurorawilds_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Aurora Wilds</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=fTk8Trt%2BfyY1s7eAZC9F8Iu8NgoZMxjbc2gbFi4%2F%2BJNLKoFuLQJ3%2B5sA7RIsZ8llPGhVMC4fsDLF9F4JI406Cab%2FMpc1LcKCRqT%2FoKAGVYrSVKQHlt3Ij0Eb4eG2fKUnlYDzMKgz56AWEc8VnNvnrQKNdqlPqJMSp7%2BBKSWoe18%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_bookofozlocknspin_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Book of Oz Lock N Spin</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=Vs3D1VCJmQHNGoCm5MzuYxoW5qvWT1rh0Ki5Rf7rj1chLwiqdL8PVrUo3AF5Z8U8bqPt1ty6GR7s88%2FA71u3pcgE%2BkjB7G99LXWHeLzcvsvkR7Z3Sk26mQViOe3kkx4SHaqxA73iWliXXwRghHXbuID3PBl96BtlEvDEMI%2B%2FSVg%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_treasuresoflioncity_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Treasures of Lion City</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=2ic8zM9uCPkefmAcsEWbCWf2LobJXgCmOjA%2F22O0o6PNk4uVY%2F1f54ODM3%2FREJnl7CK2FsPx6Fx%2BbFy7SiqGFDNkhwWLCiuPtJ0fCKgK11IoESi6lGqhWs1BmZMqETxvHIU%2FiHsVJCh35TKyJsrKbZPSrO5iE3puo4PqoW%2BkTds%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_villagepeople_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Village People Macho Moves</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=d53ZuMGye%2FTiDevo7W2H0Ss1lTpk1KtDOR5elAWLzKdWHqU6UBuWdB8Aevop8EiFFaZ6zndDQ2Ue3d788WhQyWAwKwusQ1vAKqFq16AkbtdGtkgQSYT5Dl9bmZWfnQjQXoxrH4V7l2je%2FJ38rp1dzp%2FeBYybShSSCE%2Bc2O8daIQ%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_basketballstardeluxe_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Basketball Star Deluxe</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=FTJfDrnAMwH9f4UJnHgcs7P24pEhPYGL0W%2FVaBCgWRP98dGU42odrbWh%2FhJqueS5yRaZvC0Kxl116CWdyIYwXPJYx6hxAWZS8m6H%2FVIGmbVYdixtsGhqA7MZgQaKIl09NX3FNCRZIu%2BC%2B%2Bs2dgkq5w%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_dragonshard_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Dragon Shard</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=6uP2bs7ED8AKTYwJTg2DRbB6T6hpVjqstIFAqq98Yi%2Fn%2Fs8oIitIie5O3OsAVYU7jdvlzf1ibUoYCpjqPlWPznftJ4MjG8hpRmJuIv1mdJFOy35wW7f1Fv4C%2BubeyBdkuQfgPt8LPKiDpGsqO2WUqg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_relicseekers_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Relic Seekers</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=mVUABGkbDfpLR%2BqKPZ38NMziOVKwk60Zttwzor%2BwyQz0CvHuJymD8HtcU18YimdkI%2FtHqMN1ATL4lz520yj1YtN%2BdRLtL0Ag0%2B4RRDBigAguF8y4YZ7eexPbEykFAd6B44JNuMBE3ThgnNW6N7H1YKO15KKgmpgPBkPK8i7Njb0%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_laracrofttemplesandtombs_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Lara Croft: Temples and Tombs</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=R09YNLQDNLCYGaOdzFuxQt0p91iLd29Ci7f9Wre0WOChLRRRzUN%2BJs36a1L5cGtyOfS78N3K7v%2B3WCcOW1wh1r%2BzjfDSkfyCbMJzgQGNgDgndNXkt6mGd7c%2BlJi1snxIHqbxhT%2Ba874rbmawxPDddg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_bookieofodds_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Bookie of Odds</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=t5lBflLwJh07I%2BiKis%2Fl6z1gUhiOQQDL9ho9j9rzREfZ6vX%2FhpLPBjcTsg12VFso3eteUbhKJydiMhdUSGspmm74Ux5SCT2r9WlA1B8rfN7xsfTbfC91odgZf9CNIEQM9ER4NgfZyBFLj59Rctl8%2BBEu%2BaRvgDUZ%2BUth%2FCTi1mo%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_agentjaneblondereturns_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Agent Jane Blonde Returns</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=92cl7q6LrC84ugkbf%2BQx9KFvMhtz2aCp7CTKI8KqylgMFdGwTk9br9LlMtQaZm7omagJhKsPh50x%2Fo4YANCc1yXsja%2FoWpnam0I6hvE10KgnEK50DE6SS9xKj8Uu70hId2FU08jpgzj%2FpQzgBy%2FPUw%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_shogunoftime_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Shogun of Time</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=pIDlLoh%2BCZnOfeueRDCVKbuF7OXIrs7HN1qod3aWpDH2VvVzJ8v4c%2BS5kRrv1Rm2j%2BTGJIzor%2BgbW%2FLgBw7Dx7ZLmqCMj%2Fw601xMVcyMsBq7mZEZj%2F1B0OWRU%2B1scAOZ3%2Bo5%2BfwAxSArUL0WJlU56Pcyq3hQMgimnhcesghpil8%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_thegreatalbini_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">The Great Albini</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=hHK2Mc01Sp6sy5US%2FBcmXWC1r9JDx7rx2cXVKiWufR6w%2F9qz28JnkoEMwwrfyjWa2nDhsZ15Xjw4E3%2B8tpDqyD%2FOr934M9dc3%2FmS%2F0jCbfziXgutGzKizjwl%2FzXWvMNghGoNb6hlgHIHOG%2BtOFRNhYixpGQqkaAWBB2IdB9qWIg%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_jurassicparkgold_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Jurassic Park Gold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=dINGlv3T3swFqIFm%2B7XQ6JSI6Cqt%2BaNhYtpPZfdDtRI4YuIA9LS%2F61k8hQOhCN60mBVF3lBh2FSTPZZEnIxKGsuQAuygXrORvIx1bKDdbJCyxUZFnC%2F5yg6QaUFlBoxra%2F81LPjwrrbPjdzfOatJa%2BjJIYNRZRYECQOJY8qbyoM%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_5starknockout_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">5 Star Knockout</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=GwHUrotRaPRSlBWFjmsDJ0%2FLWUWefUzGABN2%2B4xFhBVWBq3vIkYHG%2FK%2Fh%2FIwDJ5mZkwJQpDcpP4PEnIcRoh1TC%2FAJGP%2FvohtLz65ivnEUp1EfScEJDPUmuZ7cydhQPruL3hA%2FbOiX8vzEoq0p5KlTfWw%2FwxwdURPgT5EO3FcFno%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_bustthemansion_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Bust The Mansion</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=vmo8%2BE47I56u0DW5faCj93EeC62SLLSOSe7a6LhwybBOobs2YQlVyF9GfByrPLc5t4YA3PUUa2eOmuQItxv4C%2FeN0YiNAy7V05cwTX9m9NoK0F147he7cGcxtjnfGhZddAm%2FE9l6GNWA0tA0DO1P1jJE%2F9no7FYsRUs%2B8y1Jxpw%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_hyperstrikehyperspins_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Hyper Strike Hyper Spin</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=pxW1O1VL%2Flz8wjldFGcoWZ6UfXTNmE8wVKcWcdrgx%2F4sQav7QO4IqAKS9KRW5Z10Lm%2Bj3b4KJPRVLfU6g4sk0Ga8pxIzV4LXusbj6q14jtasclmfqNPqaXerIcSk6en7z6NXDORLSnd0jaHm%2FtRb8SJVvqCY10r6iazX4I5HRow%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_kingsofcrystals_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Kings of Crystals</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=wRmAF3FrYDUVFTa3GHJ%2BubKakkD60r7rAWVrwBcYkzyuII4J6NzC7t0axxGxpLVX8BhbTCHWdKuryhedxCXLHQD4wjxwpXhdcxuvzBd%2FlmelOMbj04SUbuJsp1%2BoT16yuo84irwWEyymzJ41qH%2BuD%2FSdRR10blJe0hDKP%2FsI3ns%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_fishinpotsofgold_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Fishin' Pots Of Gold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=l%2FbPAjS1gR1EFbsOAKXXR9Rk5W95Cdy4xoJ60ohGnQfCTAg5kaaOdYP3idMmjPrV2d%2BMeG15o%2F7lLrlmIhTywD1Lcn8hL%2FUo794OWYzPfRLyTTIGVu9BQXjHao%2BIHgV340EuiqQ0zUprw02zveCqrfhX%2FIUPjaczEqIfZP4u7bI%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_onihunternightsakura_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Oni Hunter Night Sakura</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=epK%2FpPnH0%2FeSHXZ12GC5yU1PKGKda0adJtHPIo2PccNTLD%2FtmkRms80w%2BbsfWpCURP40vPejcyDT1T%2Bj%2BDd3GhQt09T%2B1bnUHJAv7eFdbPuDYJI9YL9kS6OYM969lopMY3tTd6neK6ZRpkczM71quw%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_25000talons_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">25000 Talons</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=atlZ1F%2FGFbnLTOXSuMdcQjiCbFpGAaF0needWQR3Cfl2Afa6rQr3qEmTD068dbyncfaKts8VNHs3QMDdS%2Bn4ztKFzU526%2BGe62gUhXGuetMw%2FemYO0%2BpeS4WzAVpCuD%2Bn4aa5bowksPNP20gdY2j4w%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_15tridents_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">15 Tridents</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=Be0Z3oI%2FhK3fvZgl8Us%2BHjBBJH3IlwbWQ2FB1lafw%2B7GbK9jkAla3589NvKBpxxU8hHxKFkbYMZRm0eHz39H7kiGvliaP6TqqQ9iePE3u%2FkA3rkATAmbt2dtiv8c4rWN7MDZKhpKdwW9oc5%2BxbIYyVrytHyvAVxvgLOx6Os797Q%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_dungeonsanddiamonds_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Dungeons and Diamonds</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=LhpooxR5iTX2Sq9JafCwRCzRJesw%2BhPwQv%2F5BM22snofFyKq%2BLWDK3In%2FPquhJsd1ns8jJlNaGUx%2BFMSUsee6WT73n2wjVDtI1M%2F2AFoRC5PfzuPv9wQIBf4fqLMrtNUc27jwM3wAmnxcxptjcrhVI2fvzw7I8H2sZhfdo5IvHI%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_thegreatalbini2_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">The Great Albini 2</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=qXa4yUeeYaOK5hlV786kpv6farM2KOe5YX7eApSsCGtEBa6dpPIATQclBv7dxKZ3Y5QV5JhY6eEX%2FT91X1vgPvTgG851GwYHlIGzVvaCMmGFG2wdr7%2BIBOOdMmfqa9BMz3Mkb%2FwqX7J9NKusR%2B9ykg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_aztecfalls_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Aztec Falls</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=5BSpqGoz7p%2FqTz5HxFYtb9n8UXX%2F7CQ1vR7l2KCEC%2F%2BcFTxJQzf05UHMcRNJ3fWEoXSQM7LME2P9Wnu63gVyfhbw30C2CgFqkA1aiIwo3cm7kJfo7M2wqA5IZ9xU4yd17fZbixruy2Loa50NR8oFq8EecJEKdp37UrAj%2B0RJFYo%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_wildwildromance_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Wild Wild Romance</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=6VE%2Bamwpv8K%2Bi9MeoIPfWTlXHX87tgeJqCrE5OWd7gELswhLM7kIGwjullMY3YqWYEdPArdqAEytRIBmkRSt%2BZNoKiN1IgdOVafp1%2FK%2FJh710PzyI%2FKqgJjNAYbe2t2nN9Q9DCNyfxIbMYw6qNxQ3w%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_abracatdabra_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">AbraCatDabra</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=%2Fu3JfAR4PZkMFNlIVE10Nl8u438w2J4zWLzHUHDlrlksVS5LjbF0RC7KfUWR0jX%2B1nczIGgJZ0wZAn6uZtzI3bLWU5Bsxp17PaZyh%2F0JPRuUvyG9nFw%2FSskY2N1ghJ5W2oSJlhZVSRVoL25gva0HAg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_westerngold2_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Western Gold 2 </div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=2O23Xe3IknHDGjMpDR9PxNKH42K5BBI2Zd1MLIN30zBsn1u4GuCBCTm%2BCAgrJFwcgwPUcvGNiNmEvpJg5p04k1NvnLqJA9Vs82vdSIwDC36TjyoUGqSUvMskiPy2Tyf%2BsyZnfCR0s0BcjItal%2Fkho7JGpb5jPcmAPfbRLEVAYws%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_diadelmariachimegaways_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Día del Mariachi Megaway</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=%2FHNJYZlbqDxt36n6HI%2FG8RQggrRNUlGSPbAP5x4w%2B7hsnNRKntHvF6Cbzmrirf4Gs5c01iWpvO85ic9O6V2qbOjB2cjlP4lBkXbEBY8Fdp4E3VsrPkwMpWhqXSnRwUZE92TVvkk3egs8KjuFxxVeSMTnKB5szQrF%2B2JbWMtd%2FpI%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_circusjugglersjackpots_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Circus Jugglers Jackpots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=foggxIqseikSHn%2FUsJ4rtI2RohlwmdWflpev64B9BZc4qFqU2UIUK9upyEaLpoSYSts5DU61kUiQPCm8bPHN%2BJMOO4K2Pj9aLZqIKrFcKDFaZVydT4jtZO9cf3eirCQSV5QG%2BLiZ75XQ5UX%2FhufGXA%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_777surge_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">777 Surge</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=ey4tSa%2BkKekae2%2FwaVFxk0lvVV7c4pbMNJCXFYjN7OlaxTIUvBDbO4NWOrkk23q0m4EdNZi%2FRZ%2BhTzd%2B8BuTJ6W%2B%2ByTPnOrf0rKHewqnivPw8EaY%2F2NEYoiZSSr5iOEUJe%2BJY7sMTCVQJsRaRIf%2BDFPCueUY3IhtSzbsVrgOvCY%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_luckyleprechaunclusters_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Lucky Leprechaun Clusters</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=S0OUs8dmhX2231TLxddb0wbUvW5QltZMUtF7mxYB9TZ65azMKMvoTwB7fhGaCsnDrH6i%2BDYJnfAdwqdyTAJdPgFwcLh3MM8NF%2FQ68G%2B31UAYg2W%2BF6hEFClDN1aAv8xpfAIhl0FRySWDp%2BZOWXJ8ig%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_boltxup_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">boltXUP</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=pfhOX60LyflDY3PErJJw4MQkbB%2FJR3YVmG9W9XloQhTiz%2B5AirfwTItk3ImCM26cgVZVo1gF9b%2BS5SMKo3AXxrwDh6bf%2B2TGHOB87FXSp%2FDnpAbr0uYRIdXVgSLj4Z6gjrXkDCVwyNA7Q0rea3T5Lg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_timelines_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Timelines</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=VcJ59hyAp7vRnPDXWI1kk0%2FwhV2ojc6dTxZzHq80X476vUmRQG9uaq09XxCACeExoRrN%2FtdQTXiTMzbzMHLPwAvj2S2KCN3GluLgyBpD9uWPVU9iGBFzd616GDzf6JaiH%2B3pk1EMgFqgq9byhgrrXg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_arkofra_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Ark of Ra</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=QE%2B4kvn0GALYllkcw7wr6hX4A%2BA3XTxb7s2v7%2BGFT2iPiZiVJOQkB6eUvSv7%2FBuTmGSqKrcTp%2BlYjWlnlHsvjRXObhLrgNCQDACUHtECI7r8LObPsGVnDoDfgmSuV4e5hHqYdDYV72sr09n%2Bii390w%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_pileemup_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Pile 'Em Up</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=qK5pvm0ZBtofEMIcNivBGUwam5D3xPvgOlvgJrUuU6MFlkNsid7FqaudQnKwUT5vqRl7uhPRBef%2FdZThBNvsQPEwtUlLCPfqy3iTCLndYLgchuJ%2BSbyunfbEVnwmxxg8OqIXBJBU7XvHi6GG3OAtZQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_moneymines_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Money Mines</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=zHk0ztCFZBIXSgs8K%2Fp4DpAppopqDm42jiCdlM4lQ%2FlbKHi4%2FXkw3kYra%2FC0J4zITywlSWiMlo8fm%2FLJHPvpNcIYNbaHEQ4JMX7gVCfQiZus8dIiUgTZZoe39U65EgZXsPFu7%2Bf3wv49qcKPrFZ98awXbER%2FhfhmsXiLRCQId9g%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_goldendragons_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Golden Dragons</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=N3mdUKwjHN1Slnk%2Ffi40Qqy3I2PaUQFYwB42JwpZC4qGOoemyjtzh1F87pnuyjFP1JMjmv6HXoGB9RwjpmRJnSCxqrghDvs3XfPrZy3YJHwWhZ2HQp2fjvj05Xri6CSVd6Htqy1%2FlvRb%2FR3fYnxVAA%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_cairolinkwin_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Cairo Link & Win</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=eU6jKRcpisV8Z6mdFBMk03tOaRXTYJ3TSjHvelp5v4WWpsEgBVAt2TU8mnmme6UPT0PTp%2B9jj6mUkKtr7aQvCOKpp7HNVX6b9zCrWY9TuWpWv9AjQ1j4uTURiL4BJN0N%2BQRtesNeqQhYmWxIh2MazLpTfn5dZB7bZxLvMT1FevA%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_kitsuneadventure_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Kitsune Adventure</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=SWdah%2B0L48PzuTktPdGCnmtfwYDOU5Z3gTKx3gN8OHJQvcKwZkT5YKbSOZlF2mYmSMxgmjkfgoFpkFoThFf5I1pJMvN8WfFERkNnpKEPl1mNq04m7yYqF1b4tsEhjpLldzZVAN4eioTiaWQCFSj6nsRKOX0z1gzAt36Az%2FPjC0E%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_amazonkingdom_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Amazon Kingdom</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=1g0oOsK%2F3zvR1FYN4JzTsy%2BTtaFS5eJvYjkw3BGsEqA24kmwcEJpkdT92SpmJxPVHTDxhnzJNS2egCZdgGhb%2FiKMFU2lviV0xITCbA5FpJ0r%2Bcc1z67y0yaw6E0EvR78njCLa7p4Tj2IefD2IGswTuSqzWJIMIUrU4%2FwNf5JQE8%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_6rubiesoftribute_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">6 Rubies of Tribute</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=HBIzlzsmbwBirh8n3ErPz7jVYE4SeZeV0eKEMHm3u7MB5Woxl39eHFBpFQfqwzS4KPFD9gfh4TK1Vt88FrN1vsFwJvy03flU8XgaG9pagehtwXYsa1KqzlB9OwlD8Bs8QkZ%2B00mwPEw5%2BdJdl2m9tg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_jadeshuriken_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Jade Shuriken</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=K%2FcgtNsNgEPQWtPP9iWwz7QZ0GbxlybAMHp6%2FgXjJ5YbwqyAut0jru2FiyaqeYMahJ90Vi0OuzKzZ6mVQHUC%2BCIFV0XEueQJjKngTbblY%2F7%2BdXqZrnOTCrS8z9A%2FUyjIT23dIii5O7StrmZDXQSgvuJj2251GZJJqHP%2B1WYLkFc%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_treasuresofkilauea_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Treasures of Kilauea</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=HGrM4D7TwIn2sgiy4a3dEU3rb6VknfXbCqxyBn0q4wADljxExyCb4Vmw%2FigKbdykug0srR0CnwDV4Xhpr032eGhRHQiQBr8a2tH4N7EsEPevMY2Uk%2FyGsREPv4wli9gKxETcf%2Bv724rYVRnMbj%2Fjay9VvJTvkp6YRSXkJ4eR8RY%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_catsofthecaribbean_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Cats of the Caribbean</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=7jbFLRpbYDgcjHeRlcSJ4cnqB0ut1o5c%2BEjiCRLeKSZGzzRxGYtpnAI5FQeEwqk1EGe1nAXoKmXtEneFSBorrXyxPKSb2z3O6BV%2Bnnbl79p2kw3sdS%2F5aolDILtssX2oVp5ZGlow7591W%2FaAuYTbSA%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_aquanauts_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Aquanauts</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=lbPNa8OWpJZ7STVDLajKmuOW09B7tbww0veyG9mjKDkBSZJOKyNrVGirz02hsJFG0ya9RLXjLQl0ATNqtxQYUwESCOeWpSMxbhvCdkRr%2B1kew0aj34La3W8JMJNvJL7sRTac6BswSNkxWGUlnG9F8WZJD79vt3P7zS%2F2Wa5VY8c%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_robinhoodsheroes_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Robin Hood’s Heroes</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=qh%2FiZogumB1qAnfThS2dQmfU3P0m%2B0iBKwrMWUyWWfcuvMzcV2OkykmVsQcl7PO1QkztP%2BlG0UGJkrPqbajPJlbyhguXWhze2T5s3F%2FvStMIcvaQ%2B88tPvSHqKCIpBFRSTLu0OubofrVJv0XnF9ehlNxtZFiYDVA6d%2FxLcbKUGk%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_rockysgoldultraways_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Rocky's Gold Ultraways</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=vKwEuwLk2JpcqQE%2FP%2F3Ha12mvoP35iQUVV5VFV88bfwMzdBtbdvTy8wVstruijZvUAQaPlZmV0ajIV24sEZVNI92IfyOXgWLUGISE9R8RIhyYSa2Rs%2FbeshZDXa8xrnRYqMGnwsM0ptRHv9kRIHfGGjl4jJPS1yPWzMx9m55M74%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_777superbigbuildupdeluxe_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">777 Super BIG BuildUp™ Deluxe</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=wEu8%2B44P9tENEfhytE5xdUZeOPoco8odHiL3fu7lwQNLN50rCnSfwg7q62ETF7I9ORLrTtgKQRXfz%2Bjg9VT5dv4F6WkPEaY%2FxPbGY%2BhE5pcvQPEiua%2BaAKS5MNs8EZn%2FqO9nLEqd7%2FEwVT7NJhlGCJgeFiZfsuM%2FaK1ld1fWWk4%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_footballfinalsxup_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Football Finals X UP</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=JJtG%2FNr6QN5sMOaZItWgr0QRnUq9px0PmWhncRUyLsfTPvrhyDcAsViXPiBM2wo19IWONrOs74B7cAP78ag57DQeookpleaDkrD4Bx6c3fKZkGpytkxKGser8NioXOels6JEGAWUq549gLvrQhYSsEc2k5O%2F5aN0Bst2DQw27j0%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_fionaschristmasfortune_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Fiona's Christmas Fortune</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=lZpYSHa8AnjgBzgCmgcaALJcHLoqjYzHXE5QrlHz2YhPb%2FQVwp4h29VDAvxQ5%2BrqP4MQL1TCXO%2F6YRgW1L7khUd%2BRP5M71ryBnZJmwkfDYRF1cA0mwsDXlAj1MlWF%2FIc6CYBstcy9ktMsYlJMOkTHRsw9keyhqyL7QKOFJFSUKs%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_treasurepalace_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Treasure Palace</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=X6vyoBVYR8vgisloqMIwpeW3sNiGpmd6i%2FZ5P4U5liAJbVDjm3DFact8OJp2MzklUpJ%2FDbG7Gtd%2FuJfu0S5wFrwKEn3R8Y2Oyn47WtrfyN6Tvxs95SUjQR8HgiMkbaXsr3Ch2ptQezzSgCGiKIGRKA%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_bookofoz_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Book of Oz</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=GuE5%2BIGNBuB3rZiqyw7fYwl38slqMhToqLd4JyL0%2BPqeurmko7YLgT%2FTWFGG6m57y7lehr8zNSGn3H7Ma87P29ddsBdIdD9lPeze%2F7YPl%2FtYfivvphSy%2FHq1%2BwJbZK6hKf003WvTdrgeYZ%2Fh%2B9acoA%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_luchalegends_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Lucha Legends</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=tIMW32kzpW%2BxGGnQoLo39Or0AWZMtMM7wBffnohozTjDElCXyEov%2BlZkBge2R%2F9da72xvncE0%2BbDyMJ3ubF%2BEsMyWLvOB12aByQmKqKSMRMIJhNKRsMaqd1nrEBKbFjgh4BKY2FjtAX6BHg5RYJMgg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_exoticcats_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Exotic Cats</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=enTjNL9fHt%2F16TmGOCEdZsro5YUubQyjbBvkLEhSRAZHJkWOTeUeTu1qSwuhQg%2BLKo64veOhzvZKGt8A%2F%2Fpzl5BW5v743pHAW0Qj3CVBGTapwsXYPUJXnc9H9fydw%2Fyt9xPWHgb5cVnZ%2FQCGtpWXVg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_decodiamonds_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Deco Diamonds</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=KlVj3Nrt96UumIZNoZwUGsMN7Uc50DQplIGZuzrE%2BzfXSinoRajT%2F2034vo37QUVKz5%2FOj3cHYBP0Q88GH99EmMsynrSlcLwmEIkCI835MqHYuzJIhfNfV6b1ZyJfXOxmbs0hXjpPnf4QdkT%2BAgnANaErd95YfTBceT92Jl%2BCv4%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_diamondempire_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Diamond Empire</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=BnGo7UZTiml4m3DRbNdKH4d06Eu3zOEYDoqievj%2BVJ5gj%2FG1W7%2FfTiN8IZdQdjbn43bQGNFrVsv43a2EqgPoRVJw1kL1hOZoLCu%2FoogE5YMNSfypyAlcaNViAyQ%2BkT%2BoORx3Q5C3YNVM4jhqieMKAw%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_wackypanda_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Wacky Panda</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=bCO7eBxKzi0De6KZAgcpMB5ZVZN0SfJfqyyghLiaV4tyBVpdU0p5oZaWQGKDsCrPzjhl6O1%2B8%2FM6zINr9EWdssKoOGyoQl0mHhQZcASP06%2F2hsLRUkalwydLzrj90HOfLo73bBAjDuaxDxytCGUA6eMz0jEubOwtWr1lo%2BT1N6A%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_girlswithgunsjungleheat_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Girls With Guns - Jungle Heat</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=g%2FERooTt5QzRmzykl8AB%2FEaEkpPgPhHeeGv6WVuPzunrhSRffrOGNpUHdvxe2Y5AVGVhkY5OkOTXYWr%2FKhl6KZTRzcNuHgKhh9XQuag9gRepiCy13AhCyLGkmEWaulb649pJvWgrOwks0owGEVxPqg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_playboy_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Playboy</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=1vfyQXMBL9B7QOpvbU8yyM3vCwjMSrnAWQ%2BUyDbge3wbhuE8k%2BfGua0Zgsl41ADluY6EOYaYz6xuDwA7jFUr%2BmtQYhy3TCN5Lgssc3s5LUQfuTgipbby%2F79qZIw8219uqoJUnScvlv2xpZW5QwEHGbEKIpG%2FKMkhbWl%2FBun%2B1tE%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_megamoneymultiplier_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Mega Money Multiplier</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=2lAG1XgN4TeZ4AfHZMbb9J7loll5yZnyNoL9eMZBpXGQFsDrLQrzrLqVwExGaa%2FRjpgr2%2Bs0FOuIiTln1q7EhaxPcmndqkqUdzdmmep%2BIpYk8zqmRtmhDQkxn%2Fg7BgPJnZWrkZYkxy2BylIr6lzDEQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_luckytwins_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Lucky Twins</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=MwjdLCyMJVYTF3PbfZLUtZjHMeddn9%2BXEH%2Bsf8PjLBvTX%2B4ls%2F1x411E%2FagNv35jgqBkjvBzqqUa%2BBIwazvbj5inqx3QExQ%2BFBPg34cCd1OfeSS6GKpEImfNUU0rgcOIR8CPevh7PEv5J%2FqbEPKV7SUVW31%2B7bccqF8YKeVd2j0%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_emperorofthesea_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Emperor Of The Sea</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=68pK6ZZBDGkUfkS9aixJjap7rOi%2BwG6R78AtZ%2FhxO3RTSg%2BZYJRi9pGYUcgHb%2FEu1jt1sWvzoR4zWpgmZsh275N5qcAdNPpPH3py69VO2LxDFShD%2FbxkCVqug4pK3toK2SzA0IOMQGmaAzWHKJcESvB7nmv4KlYTqe2n1GTutOk%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_immortalromance_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Immortal Romance</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=Uz0dmVFST2e7DVtR99sNOiLZEtDZYomg9qOTmRy64Jqle8dU4Feri0Tg7GvFe26Bao9pSAkoZcOezHZBfYvZVDZZhfd0c6seDcQbCWZQkDFPatD2QmZFk2CmSAIpCVggHwvhs3XlIx9YQS%2BbR0zQJE9ZJN2tDtEx2r7DBDqjJrE%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_mermaidsmillions_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Mermaids Millions</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=HFUIewLJXWd4ChgQTQq0%2Bzhf4WLthxUuqNUCIFz9Jkd38bLQ1lDAaDda3iYB5DeK651chNhSZXLPZhMNb6teYR311n9mn00xAFYR2JFL6rhgngzSvSGW%2BRH1wWpBPWQKVl55I0eMcakq7yBuew9n6A%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_5reeldrive_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">5 Reel Drive</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=8FN7YTcmWbskjl27FlOjBQUIvFZivbYRqzNCxALsfQbEflQO8qSGRk2xoBUIlPqwMukJxRJMr7r4GDnDB2rPn8ev1cDhVVLFyWqynT96lO2cHZpn5YhnM860wRCopU8jxL8BBz6XflpNylDDzOJ3KrKDgvRaGdU%2FdkscEzUpYaU%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_adventurepalace_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Adventure Palace</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=32xRMnv8tRnFj78KazCrrhYuRUIwuHbBOumoL4Hc2SBK8U2HpNLTXL0A9bPL5ZlhME2hAQLgB8xfPdl8UXZTMRfQ7VdDY%2BQ5%2FEfnGOfydjYwcOaWgv1mHOMv6kVWfMJxOE3GbHZACtzOVEQwQsXiLFTgCpa4LwXhpCvfx0ONQkY%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_ageofdiscovery_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Age Of Discovery</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=PdRKfPPcK8FhLQtIZ3uIXS4vMhmao2OL05rTRMc7I78m3CXn9CzilGYlBqm6Kw%2F%2FxRPpxMxizzumkH7Ts3asp6KVfEHiXQow%2B9K3LVioCUFpN%2BXBvJ4icmhQzYiPaeorC7Za7CMUYNOtW0lbSrTe6LwEZut7lhQPorHolbwhLPY%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_agentjaneblonde_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Agent Jane Blonde</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=TH%2F1c0IgKMUrSppp6GxdoF2vbG9vArIzLpzYsg3iYouQyqfYE0Uyj0ghGISeXWoBkQekznsLjhAbcVJ4ICaUiy%2B%2FeJfXGbQip3BjD34jJLezJ12iSzvWMqrVU36T8vivsvOCcWTpj046%2BYWQdNlWiQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_pureplatinum_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Pure Platinum</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=6Ve1Awo1DZbx620svyKRVV54qe4edl2UMeSbLZZiOcDhi31sL6EW5Ne9OR%2Bpz2QK4ErCnO9CMwreN3bamAVzblbZdPOde9RA3TYpDXfe9fUuqjBhgSTtkc%2FJmpZioomdJGi2e7V3imnNxxX%2FORRDVg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_reelthunder_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Reel Thunder</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=g5DIFqVxYKJmK5XOOKhgC0LhyC8pvSiEnL6GEALSMuGG5wzBm4s8ARE9gZNYIhd%2F%2BxFP5AhEnSQ1UKytXdCQ%2Bgn%2BPewyuUw40Y3KuPuf1T%2FoUD4TQgUMQB3aaAIR%2BfbWJBF%2Bgn29zSIKbxgjYrEhbg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_rugbystar_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Rugby Star</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=Jy58I6nrWZNF5zKigQcMsV3DC2wWE9XDKpU5d%2FROKharyZkS7u5bJOhooqtBlDz%2FJQq7e6w6TzixN2NgL0uvq8RaVE6%2FRoave%2BHr5q5X%2FlaBfBCfU5cUtWFnR7TcSA3sHbC3Y3NiknX4Q8QWPIYVACq51CvSX7K3VOKRMmUZC3c%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_barsandstripes_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Bars And Stripes</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=lg9iX%2BYz4sOI9mr0sIHBDpphw1n2yRlvAlv%2Fd9BOsDYgOdtKyoVCW4gIRZFO4ivkn%2BAJko0UMpxaznsIXkEzWDkD1jxFikUa8ILgohKGEFRtI0f8eGlg%2FXkiPuASCm%2BHG463QnjZBfA2%2Bpn7GWOSOUIIZLFkBB57KcT0t5aGBts%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_basketballstar_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Basketball Star</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=1O9Pflg%2FHPdX5xWSXh0oabtM52xZ0BxjfbNtZWbuZGIAZp5ExE6qWkEtzOo0U6%2Fb8dGS8Y%2FBsCCz4icjhVJpgCWqkvzfSWgI072qxPSjMjj6zIbl220wfybNcCTV7crbuhPuu%2FXALRwDHgtVm4cO4A%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_bigkahuna_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Big Kahuna</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=TtXCBgHRtYF5dmWAHnxri6tb9hjS6LvJMrxRV0ax4%2FDbH%2B45YXEoM97UyMNShMDK3krFsca4PEDW3r8R9JLQuRdwE1M8pkSfRvaK%2BnZTtS1XGFUDSGEe7HaX0blHhjY1Im3Bl8mjur1LdrRNpb93DBUuW0zPNX2RcUvZyF0Jmds%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_shanghaibeauty_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Shanghai Beauty</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=PUSsGfXVVu7UgzhSCsHsiH4xgxm%2FBtnDzOf%2BXp0HitLWirzMNUJ7flu1k%2BIYp9Mp8nr06Lj5zSqeo8gfRKCHV1yLBBkj6NVZSx1W1jqGE0XnOXFAXEUNea4PvIL2%2BvIxAqo%2Fdy9LpwoO%2Fv9qb1s21w%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_bigtop_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Big Top</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=LPutO71pjqRzt06D4cpKjrOkXf24VvkSkm9uCnZ%2BFpNVp8e%2FZM%2FAjNVE%2F7%2FhZ%2Fu51HGdET4CFYAMh1V16o0cSp%2BG6bXHuE9crM3tfxjwxPgiBLLp6MhDR4khaBbJ2ty1ffC0HhLkiNMn1IVbk8Bcdw%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_bikiniparty_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Bikini Party</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=LXxcylBgHBSisoT9P8yuumJEDJW6NZ5zqre3BXdfYHHpkQsIKppBTPNVjU32fbRLuUc5WRgNhUnbklaKBVudI3E5jmvwJH%2B58yjxfHDMDIj0oMxFGbR0UmZy2%2BD0SAcANkte%2BSBGzUWwLNKXNCtmnQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_breakaway_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Break Away</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=VM%2BP2aETfNXCHLiueQYpeuCetOVBugh1%2F2EXbszLazC5qothG%2FViL6%2FAu4kjPbM%2B1978X1csOpdgb6VTC43bbWf%2FJurAsiUil307rqNoow9YAKWFYk%2BJfubnbrwnjPW7EScBigd50aKeRqPHLw2hQA%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_springbreak_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Spring Break</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=t6ApIkxZkXK3ffTgutcnC4MnKn9ISOh1NKko3VYBm0FsdBafcvlEwfemJ0Q0CtbabdHqrmqnuCF5Vth4xQ%2BZTC2XmLizMBfmCShBFX6X3FKNosWYtcl6%2FsiwqBiOnrzGGWoD%2BrxRfyvEVKCh13qg9w%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_breakdabank_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Break da Bank</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=O%2FvdbUQ9QyLv6JB9MBKHTyA6UjnXZ1Hl4m%2F0nzePqB7xsBb1wCT4QxufVMZYLQ6jYBFrMUrg6lv%2BOGrRFFKuHAfMz8%2BbG9g5gDe8jsfT5kXAkGGFKqcrZ%2F6R8wComt4KK%2BJ3pt4HcZaR47%2Bwd%2FOgIJhqfzFBLw3BVofXvdNwhlM%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_breakdabankagain_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Break da Bank Again</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=eQwB9c8EF2K%2F2R%2Bc6TYMbGWT%2BAK51HSAIJj8wtbk1QnonngQMPgqJs%2BIW7mFeMKuKF7GGwZSLd%2BrId6Gtr2dtKGvsd4CXoFsHb4XPdBCFrbSQiu%2FqJZpphFBpBDJ8YwCULTLnAwhoO%2BgpaShhVTe9Cm3IHEmRUUVhMfIqwxoR4I%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_bushtelegraph_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Bush Telegraph</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=iE%2FBZdS1ZN3kX8aBn%2BthAh%2BzTQlytW%2BPYfD7Mt%2FkTbQj3%2BHt0v3kW2u11tVWBPxIU8jg0n5WJ5ViXWrZOTcefjBC%2BVEciZvD0YnRKcEhMNmOqBD9HO%2Ff7yh9IWloFE5u3nnXBpEGAY7%2FuVkx9a5MzA%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_tallyho_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Tally Ho</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=ZYCfjPdPyZF6FCybL8zUrRvycUOo67CGF%2BFMwSXfTzq16EEluyQ1%2B%2FSQEW5s7r6uEpyor%2BQ2GopCNdEZD6gSthXzMFPFQI61JAYKCNSJA4nZHPnAz3b7GNbF37k%2B28rTJp6TuwYffR1Pmf205RkKjQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_carnaval_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Carnaval</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=ieYHQYGFofSNUSr61hXNOtmSvTEMocXTOd8HiTBXJ9f8v%2BpAW5v9cNpJu943uHxinUHKAh%2FwCx4c4pIvM6Xtl%2Fn%2B5WENfThsrg5jB%2BlUU5i9WyTHWK%2BsAe5jWVecrsHeqciHtZY9F5YFeSWqiKl6qw%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_cashapillar_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Cashapillar</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=tzjTDK3rBGtpfcl073dJ8706VQmylDLIEZQYOBsKXuVay4tuAAw8fms13U8M%2BgO45vx4rh2Wqym%2BKJ0IRvl2DGd1HS9MstrPM3QDDcW%2B4TPYX10k%2B7%2FD1%2BQuAyExXnp7%2F95R5eJXrRUM03JYT5q3hg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_centrecourt_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Centre Court</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=O2TIPayQaZ%2FhfZt1Ex2rnaDg6%2BiTuQeOqYhbfNSmd%2FgvCUrJdHMZ66vhHITknkYaWtDGDFqIbP%2FLon4J8htVqHbEzso5cJc6MNrs1v0C0lqEGSeQQPFKf3HX2M3GDe9qmb%2FWEOcStGzPcyzzTLH2e6IXxuHNeSZbsbYOMwTiKac%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_thunderstruck_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Thunderstruck</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=7HaujjpKxfudNZL8UhVh3ISqsJ26LiXNCzDulePPsErWBM25NtuWaioGxknTU0gzG%2FMLKGsj5EoMCyBr6F%2Fmoj3smfGwqGk8SASS%2BHoIhp2TIM0h4rkl6HHdyNgCKxQDUHWs%2FKuRt8U3RcsAFEC8UlJxBU%2FvKciVLPaMJgaHTDE%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_thunderstruck2_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">ThunderStruck II</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=DDTAT0ZKn7YPVfASt7t%2FuUxH8IfHx%2F6hCLfbOzrxJWu9hVnojzlcj7cUnsajiWoLMzKIuWSomh2jfDAgv8IRICiU5htE2IIYZSWODv1WzZsQNPHCHzwupDICsBPsuAa%2BpvfiVXRfMwNH7Zp7H%2BjXAQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_cricketstar_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Cricket Star</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=02KUvlVf%2FQYZsmZhoxBvkBZQp2wIP4mHnBlFJB8eLKs2hRw%2ByLSmuEqs6Ff7BCDbmSl4VwsxGB8pfHBlg%2FQitjwTKFsMs4KPAFi6eOzz%2BKKuYRdSHfKvEAOPY6MJhPuis2FtemTUkOXJLQkaLSXWMg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_tigerseye_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Tigers Eye</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=N3WuY6BMzuH1buPuVTCI8%2FjsnPPqrmVPNX%2FBcLms31MGA4Fwja9ttrZQQG%2F2S%2Fdtkbb2Jy1Lkb3JzOlIMkluOwfvKjvYm%2Fmi7bM%2Fx5s61RlM5%2FSDJuUWrA9ty%2F1clSFq%2B4E830f0pOY1IPfyBAVvWQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_deckthehalls_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Deck the Halls</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=Tt0GOqaPi0LtPnIMSAMoWCn%2FxvmJrjQ%2BS8niP4bsa9g4ajz%2BrpdyLgFqeILkgeFhg5RuQyZIJk30jN9mlSjX9prCE5hYUtm1phYS%2FKB3ElUj253ZS1qWx1zS%2B9NLzGLo6BuhkNeeXc%2BVXvYKJsxNpQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_dragondance_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Dragon Dance</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=t5FpM0KLLQfjnXugrj0uoVdMnlljPADPI265QN6siss8F9lMOA7N5UxfZCDOuFiS%2F5WRFzxHMnD30MYHwI4O0JETqWxEmwW6pYmF%2FpUy1EjpNc5JeI8zlXdiqIhReY71c4Ts26NWQO%2FRukFofbJsXA%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_eagleswings_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Eagles Wings</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=6kVdYYzK9liIayqAh4wF5ZD0s6dU7Xyb1uoYyC7O2qgHGNMWfGvNUHMmGcbN23c6TUDnqEN0HO1tZ5k0KRT3B5FabH5yzlwfJZG%2FRQWt89uufyQ436g8S%2FDc4Z78JtU%2FXl%2BydSQCGPTW2rKcFNgT3A%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_goldenera_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Golden Era</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=y90br%2FLVUpBJhpjv%2FS3FfGB%2FBKv9%2FOYrZs6RdMWKuo8glgvDjO%2F9YCYgGIauppAehyOyxVLlsDYT9uu7yYlof6FKkVZlTD7%2BgvmLHs4Lqy9UsFab6kWzJAPPZJHkCkXbriygiVLx1iwVBP%2BesOLUmg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_kingsofcash_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Kings Of Cash</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=S9BF9AVm2VRzAwHhuXlIyX2%2Bwg4GJMdXguicflt8hjIVmr%2Fq9TxGC16xNUq%2FCRJH%2BTn%2FXd%2FBuI%2Fdgr5xVNgU%2FPqTsCe7igGqNiuk8%2FSVnGZ%2BosE2CwmUemMsbNYSseeV91Zc6ZwHDggfgkvsWElz3A%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_ladiesnite_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Ladies Nite</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=g3PIRij2ATLxmlidJ1SbRDzKBep0MiNwgCmb559b6VFNitMB7oKoVE8%2BEX%2FDY0g4%2Bt8XYodr6Qh8tJRjaK7dqL0RXQEyAywRRJ%2Fi0PPztoatMrdRUdbKgXw3rvISl3edRam2cZBisSGvxdZfzYwoyg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_luckykoi_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Lucky Koi</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=BaHINh1VbdUsddP5gzmg5bup44QKj3Pp33Sr5yKvxkhLUeLfox7qI%2B9mk8ammsczNnWyJ4P%2Bewg1JQWsjrl3vaTQZyv9%2Bzi5XvOsORmYbMXmC%2BcfnIlR9HRM5QNc1ejUXLgXMFo4OhNJ8FgTIyejgvpchlnP2msD0iysRbHyavY%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_burningdesire_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Burning Desire</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=FNjNkNMrxpwOcS83RLhiSqZ%2Bbx25FOEtQpFuB4m4RcX2FeNd8WZ4nLwbxUCvDK3NG%2FyGOV4xr4ELiCTktSTk4emjhVd1Ax4aJfzDMnnXk7MJ274avtnhFgYJfbzqbo4DYQn%2BQjLU%2FichFqpuYGSJQYwUNwi7mZzlQwsNPgYPC6g%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_thetwistedcircus_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">The Twisted Circus</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=jXAPCls1PMphEAPEAZCUyWilm87ItxMJnW2fQTXJBYKaU7sycA9vfiIppQyKo1kVX1kxF1MCrc3EPihZxMDk1ReQLCUHc%2F8llGI8DKsE0O7dbV%2BfVMzvrIGZpGW0S19ogpkJZKW4Bhb6tWfLLdCG3MBy%2BMcazEsgPCeii%2BCeOV8%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_bananaodyssey_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Banana Odyssey</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=gsmpEDw5ATHdyvQTaOQPoxrD1yOHg4pp6t%2B4FH%2FYTrPimSLg%2B7jTiShw%2BUYsxQVE%2Fv2%2FBqgGyTrdK4PnkgH9ykrIQRIqkSK83FiaLhN3L9rdkB9Yl0PI8uI5VPeCZlExoHMe4jmD7pnRX%2F%2FyFlmtHLqw9GhPMHGHLMxmegUYx7g%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_breakdabankagainrespin_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Break da Bank Again Respin</div>
                    </a>
                  </div>
                </div>
                <div id="mghot" style="height:561px; overflow:auto" class="tab-pane fade in">
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=z%2F0KQntAmGoDXmnQf53bbLyMRxKJcfwi0L1KMcDMEnnG90MIt9DeU%2B%2FDXzwgxpkuiCSBdah%2Fx0mZM1MD7ihWF7Kz1PZLVxmJtvO4E7Ph1FxKVgPIar3hXYiyuY9JNNP7X5ZqZSYXRfEmw5jzWXnXY5J4uK%2FMKqjj8CqnhOhY4sU%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_luckytwinswilds_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Lucky Twins Wilds</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=zBUVGkQWDwKazmkwygrF%2BYbRqLiGTKZulo0DGSwMpYlBj2MlhWvgDUPWbIOclBqdC%2BrKC2Ixh53ysWyMUEQCiuM9UHURcmOEKa9c621FWqxnPPT4EOcfBAWs1%2FjdElGThbpJz4BhCkL8K49h6lY%2BYQLrvVgwsA2jI3rW6ggwp3k%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_candyrushwilds_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Candy Rush Wilds</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=rOIWxRYAsPq6meu4%2FhxOziUYTv0B0OCcrQCfEWMkIJd5YqBYpJxwES2bSJfANDarc7ObQKZW7dBIKJSnfEsYcaSKmdatNtIGjJmOB7hNSM6z2W91OEvBo%2BMszkhrmPTyJ5rUYIWDpDNKgyLeE5qHPmWMClgy3%2Bznf5nCRUsTuPk%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_mastersofolympus_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Masters of Olympus</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=86udNP65HjmjHoenY%2By7qtfj1m7IpQbcP6kU9yZMqrf14ulDB4BiIquMnLhjIjG%2FIN8GPgSELPRHCvChO27A48K6G1%2BzCIugQSHAp5OwUagBcEg4MPursA0csthRW9DemQHA5m2TjEe0T1jBpnmeJQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_goldblitz_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Gold Blitz</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=3IX0XJBIvlxIBD0PXx6Gt2TEq18g8LxefjglPsYD1n%2FCSn%2Bwf%2FtqDC0Eu%2BDWOAkRsMsXHZjruqVCe98%2B1ep%2FvzLEYPA5hauYVHByen67tEjYqrlM8%2FLuIxMCT0ATgnpsQJ4j8O1sqtcHaHie73s%2FfMRCxXsW2qfqZAT1dw1h2NY%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_ancientfortuneszeus_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Ancient Fortunes: Zeus</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=ct8KJAOEL6Xz5eaWneJZjeum9qWmc8v3TgtkYlTLGuccFlz%2BZBVBTq1cCqPDGbc6tGaI20fO0M3cxiSU%2BBQmqFgjQLfvjCqEdNJhSsVp9OsZYupTb5e%2FfBIZjCxegFHWawKL%2B2EcLlAP9e3WL4xfLeb%2FNMWw8WNZN681YcqV%2Fyc%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_spinspinsugar_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Spin Spin Sugar</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=JxW8WaLbTn7YyE4y1GdLPSLK87k6aM4997tZM3zJG34e8opep0h0lK9ejyZYISaRSgTEA6c7bqyqUug3ybORa%2B34f9PjUyrOmc4LyTS%2FYMD75mU6AM19H3E7ZptCPO6GBwLultt0Ye6jW5J7E%2FDeMEBAO7DQjoCobdHPuJWg1ys%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_amazinglinkzeus_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Amazing Link Zeus</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=StggjbAK0FZm8wjnGj6Y5p9qYO2OAjhrmXTbMWmCIfRFo3EqklNUk3ovHumx5gOOw7ycdbCc16Ja8zUVXZei0Ep9dmR6Ogr8vBY6f%2Furqkubcm8Elwpqhj4IG6I%2FU7tvPUYjQO2x3kWTfbzQOBRqiIQeJTCBkX6K40IdMicDeG0%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_mastersofvalhalla_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Masters of Valhalla</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=4QVk07mKsyvZqFqCQWZ6WHNjCKvjuMNRaB8Bib%2BJoC%2B8KNF5cWlSfnRLdJXfJXg13WAJuN%2FdQ99JIkHwKvhLWWwSt6wleNjdm8P5Tf4aslHmB9VQpvqvdLEGmfy6n6VGmcBNsGn6BoVXy7WzNl8roCmx7rQ6j262lh2mzqvmviSRp%2FxlSAQ8xcSxp1Foc4cGEejlTNnRooXLRvjT%2F1FqMg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_ancientfortunesposeidonmegaways_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Ancient Fortunes: Poseidon Megaways™</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=DYvioancPdUjsSH21nibVAGDhVzb9GBgi9oR9PEATxbaB8juB2pTR990isuLX1XVjQAoR%2BP2vbm8672fJdQzuxoFo5sRF1msjJl6X2NY%2Bp3ajt3vAx5YacCCTxTJej2S4rTzypzh35JxjsyhrdYfqlXoKCF3pzKhJESTGgRmolQ%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_cashnrichesmegaways_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Cash 'N Riches Megaways</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=LNzeg85SoC2nwu%2FRnz6vqBg3xUS9I%2BNvjsvhpcs5HqfLjtB7XVGydoj9I7xUtCWSaYhsqYT93Md6Y2M2klHsKDR8%2FL%2BXdguI%2F1m%2BYVxuPGl8J9YgWrPJf9R3V6Y85dF%2Fz7OriCI2kLXktOKCuPk7wQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_bisonmoon_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Bison Moon</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=nTNOCwZxLIKh2eFzMh6DYKE6MCGtwsz8vn0U2alxISaRcryZuIGJnDHzvDYODmUgFzNdd%2FcJ2%2BGu38JMTCkuWZNj9t0ZTjvs3QR10xUqf8UKmA3%2FeWwb0UGEp17lvX0hb1abvC9NdKiiu6xVIpAwskXhv004r1ueK%2BSFn8Giapc%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_sugarcrazebonanza_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Sugar Craze Bonanza</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=rd1oDUA0vjQtTQiqqi3INrb0kgc4T0kzlSTZWZpyHjTv5CktC9v8KiLwVrS4ahDmLrmbTEaUSBKIyWMfmjNj6pHR7F0Tz7Wc0NoOXdjLO6pwRQ%2BxuWo9WBlmKr6Zmji4lPU7zW7PYX%2FKdX3QVJRZD6uZZdHfq7NJCUGTc8ebIWw%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_breakawaydeluxe_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Break Away Deluxe</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=CbYicQhDCPoD0zvNpe3F%2BhQ12NJan3zaU%2FQrfj%2BFYIy5tXCfVJUgJt1jzouQI8GwwnmrLIYOfdVeUP6GhB02OlwiKI9oxUs%2B%2FIZw7QzSSibATfCuoD5OYWcKjnftdpe1nhErcgakjN2KDqaSJ7pQuuYktIHup5dxtXHvAcRHIW0%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_fireandrosesjoker_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Fire and Roses : Joker</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=SLnaqrAkhz8bRDYgQGHjcqoPQWKZx6%2FLe1f86Cp15JsvIvqZU9XI5hsDBXIUCUYrAWFgBEKCL3FBbEEnytUlGX2At%2FdZnR2kXAnl3f0WqazOCRe2peTDaUiymwQp%2B0KDjmKqHx0NYfB2%2ByqA66cX8ni97sQg1iGcxQQX5AfNj8k%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_basketballstarwilds_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Basketball Star Wilds</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=E1c72g%2BB%2FmTQ2tuRvpdbnpjxsI4dapv3ZjloJzGGFMaTfoV27p%2FB0RtUzH8fSYDk6JLoDStEa2%2FcGCncDlBqurdebz%2BplM0QYKZXgHGI4%2BQAT9U6FwKG%2Fgy2Fjff%2FxGf6Bcnkd0QBDSRy1nxp4UaEw%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_maskofamun_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Mask of Amun</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=w4CaamxDLpEzq5HO2rbxSehVc8idx4T2hPCX7GPSq5jHXoevWnrWi2CXNC9BmqgXYSTagI8j0gR5kJK4qMENugg%2BtwzWyP1EFgjxHRz%2Blj97zEHeptwlrID0aKWBq%2BZiIp55DuZHvdn29PEVM70pQw%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_wildfirewins_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Wildfire Wins</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=W%2BMaeR%2BY3bQsmoaaZ9kIl1X9vwLflbjaXwl9yK0Ol2Mp9dqhAOzRUFi0fNw0zq6VymQ78DktpG6yaL3ZH16iXnmF1E173s2G3umz9Xm7fsGLpkfbH5ztTYxRlP%2BVoZlo6O2lHlom0UfvFhP06dHwfQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_10000wishes_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">10000 Wishes</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=WQ%2Fa%2B7L14TnVSFohHL6agUuQwh%2FW1JSTr2vCBcBj%2BQDOd4uHF92hS%2FDu36c6%2FAEVaiYseQo%2Bb9j6ta9GmMVsejtyMQl5j9GAMb7H13VdE76jc03GAsuEvRWGhuC6Tk%2FnZ33P8FKXULiugEltNS3%2FMSE3Q6XAuo7jPIcMHV4soBc%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_romefightforgold_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Rome : Fight for Gold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=Cqz1wFPm5VYz7nT5GCue9jR6af%2FtaECTybZRurPvN9Sd5edY6wKmiKmvzdoMD%2BrFIiFfx2L9AuKxxzFIIApfurv64b8gbW9NBHgEXTCCcUYZ%2B8FpHAIqM51ImM9yLoeLfoaiMkCf457batWzfPgZSR47a%2F6v0qcNsMEyLeDqnnM%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_starlitefruits_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Starlite Fruits</div>
                    </a>
                  </div>
                </div>
                <div id="mgspin" style="height:561px; overflow:auto" class="tab-pane fade in">
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=jsy0EsIHHAGzNRtcASvnB4eERjs2rRB8hHYFGxZ49iNPSzlqwkgF3EC3iyVOgUaZDT%2FokrNXWFbbbEAY%2FMZwj4Fb8mGjLaGhYQMlk%2FqocVMK5uRg30nhP5Wr3haMNtBgxqKoAHULrTJByvNxFqFJ8ZD3O8U2u7I7O6Jy0%2BlpvpM%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_stormtoriches_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Storm To Riches</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=hW%2FCQ%2BD1jc0yhbAw0XsVdD2Eu9oP7%2BFpBSjqlsuTOtqYL4b%2Frs1Ezr0ZtO7eRjJhfzDuMLYkBmXoJFt3bDrdaCEWom%2FI%2BjJzPcuBZIwrPtirwqFWRfDdk0rTscQZ7qugUdg6o040tWdJDz9jl3JpgG8oUJ4tSbd9BHRzHmrW5Cs%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_grannyvszombies_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Granny vs Zombies</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=pVXG785WLIt1NvymA3f00Q%2F8DcD1mytYeARfhthfk7YGf4GfdVZ69Mf6yK427zZJn%2Bu7pwnHS2p%2F5Bb9QCBtEl%2BfLRmO9kKS8wPhbELHHn5SVRF6DzchwbH15PKdsHHSthssEtO3rfBVuJde4tpUlrx5hv%2B8zNH5zGDONClw7%2BY%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_romesupermatch_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Rome Supermatch</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=I7DSFAt9TRqt9u0hgbYj2eBo0GHeugzeuG04hddYRQzFHPE89CeoZTzlKclKHV41ceRuVDHk3vBsX08u91fg3gyJXqDW5c145k2fH5%2BMlDF7bApOMRTTOvmizMwz0JKt%2BE%2BrY9TScT7rwZQk%2FNCk8TeOxNEyU9bI0s%2FNw7XG1QU%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_monkeybonanza_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Monkey Bonanza</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=NJv4CHdHNGM8thYhCR4z5j81B%2Fm0zIF%2BAdkok3hzgrlVjiju2%2B8fCR9pSSIRk9gl5VIAzZbnLSCAMFBfRSntg75yQzGQOszSCaZngtaO7%2FC9BtUmlkQpITJvCwe1gvtPddH%2FIRjUkZOtj38%2BbuLalmk4L1%2Bq4bJJ1O62ZDB76yI%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_chillipepehotstacks_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Chilli Pepe Hot Stacks</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=3Uef2BME3gqLltUoWh4SONiwXwAzxL8hCpHCzEzn2l2UP8APjqRt7vpZVUkI%2BVFxot5%2BgqRPTnGX5Mcd2DgXx0w63og6LtPvQKgjgd6ifsJxGyCueAQkKmfJxOTDKrsGFbOV6tvuvt4ootwvY4Itmw%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_chestsofgold_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Chests of Gold : Power Combo</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=MpR5gbYx4Nwe3P0TUGY9KBSRN%2Fjx8iguosrwzH%2Fkvec4N8P0yw3OrXTOKqt4L0MHx0XV%2BJRC8qVFDcvqMKkks0D0Qbf8IGL278PYVafh8XV8JN3CAzcbMsylMY%2FPt6bgKMnLoUh6B1ycuiVzZscEUGSg7ZH0fmKH2vZAwFT%2BrnE%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_happyluckycats_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Happy Lucky Cats</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=Si8%2BSfupznrynJgVfrsXajJOZ7mzfjh9N62bFzk5eQkaaHv3tXbLlnbRBKHQvuDpgWy0yvA1VHfc70gATQ1X5d97d%2FyYMgUwbUXNsaRgG8ZuXD1KeRp4EP21t19xr8Nr%2FKbJqW45NcKIFS%2F6ZPM9S%2BoDM7BDfVtenh5241grWCI%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_dokidokifireworks_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Doki Doki Fireworks</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=DEZlGPo22LE6LuK%2FO0UmJlFtbHiUrrvwWKmhQIeS3jTI6P4RSnyVmi7qgVJZTXk8w74oYmumz1j5iuIfnqfwaUY3ypyYJpU6K%2BjIay0IAJhlNBKP67lnO719Yj4ilafYJrO9g%2BxS5M7okjkkY9vUXtFi19gRiRZ7E3XpqS%2Bw%2BFA%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_luckytwinswilds_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Lucky Twins Wilds</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=kPKzQOVt2s1xo%2FS%2BaMXbqG3GgTCUIui1DbO1C3cuE5r2AMsQzJyOStiu8ad90NSSp3r%2B1XtmRDHlAT1MQo2PjvuZYF8lW2QaqDEG1ErU1NTOJktekYq9ZctGsYH9z5Ft4vBgcld0DX%2Fyl8TgZ1IAK29dVviBxT3oh6xBhFaSJd4%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_candyrushwilds_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Candy Rush Wilds</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=8Pdnb2d0uiaNTUu%2B26bJHOLq%2BbzFBQZbejH9%2BYfTgap2FqVcxcUsALTbdEg2hElhnQ8Gc%2FROwKTtWWVTjKHLU2EhFIDeqrXI2ab6axY7k409ltRBaaShg1sh1wPjagkBcV%2Fyqw5oUUoJkZbcV31OIg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_goldblitz_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Gold Blitz</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=kQkpDxcwp6fHMuuhpJ1W5MajiZEPHQegabQZVeHttyxv1ti7w1LgGzIBhMMtZmMNX3SZ1dwqi43hrcR3HlUR0Gz2%2FNrPqtKH7K%2BSMKk4AsQEwxmRRzjsJ0teUbonAE2PXsbuflbL%2F9Y1D60RUU3u%2B5oSXNJQmC9P8fNN2o%2F1uYM%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_spinspinsugar_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Spin Spin Sugar</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=qEhYurVOkaU2YP2OmMqi9UbvV1mqGR%2BIq5BS2fgAdVhn4dPqr0nbi0WXgeKg4UMS2%2FTOJ%2F5rjZB0gVwlZRBYAPqY%2FwEZeZzaQwRH76MPTTQM%2F6Kk5ekT9lc1gbUmnFLvj4qVNYhjZ7Lr0Ad2Cw4U8LrXE7S6TTucsUppiR2ITnY%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_mastersofvalhalla_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Masters of Valhalla</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=HM8t6CbkkGsuQdmHCniJe2oDU0xoBtdDqTc4Dgl%2B3NRpqI3uVDlUbCKES0HgLgRQ4mH01Tv%2Bue%2F78C0KZaV1YB0iOEZd44CWywOQYUEF7aO7NmzHRwTGmAu4JcjpLtWw%2FGA4pIC0DnlkSzFSZ1OjIPV5ApKz8MfHyGNeSKJwA48%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_sugarcrazebonanza_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Sugar Craze Bonanza</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=B4IVGWVF63seBuqx16jXTyk0DOzqD1cnSK7vmHYWi1F4It928qNWHKrW1FmKCzUrEJC7VYvWSPsTH%2B%2FI2VzbQ4L7cn0urZaXB%2BXY4Z8cE6rjwKEcaI17zI7acaqEUZhCnqNFp2QNZni4g0F1c35KFnm%2FX8eIn5%2Fny2a0423Wxqo%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_basketballstarwilds_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Basketball Star Wilds</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=RJhpQZDlK3eA5YsEx4QZFf4UzOHEPoonOIS6gohqMxZJbIK37s7m857dd3DYpCyDAN0rgMPaUfVfgyU2YSDBgMEq2dPo8AoKhJshwRoN33eSJmgrjcuyqwgGreH%2FOb%2Fv%2BdoomlymLBp2%2BbFgOK5Fgg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_maskofamun_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Mask of Amun</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=ppJFxU6rWwwbdN%2Bj8%2FkY72PXBhOBesy7FhKILSCEPy4WBtNYrv08q7R6lIo2DlJ2MOB5iPetxhyQiEZW1qES1YwvjzTTGKVA00lCBsfJLB6YRR5nOVi%2Bk%2BA4%2BlzRBsj9TEs8yonkfoT3x%2BmlBVMPUg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_wildfirewins_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Wildfire Wins</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=gapGtgSycT1kxOFYqGx3BerfYqZ7r0a1RjKM4%2BycwfSL6w9AQKEWbOGYcK5RLMbarltKR%2FthGyRk0vXtg4blJXZxY2YOKZepTu5qT4xf%2BIgieYbVzvVJOW5kN8UA4uIh6cjyA%2BXUAj08Dnocf3dF%2B4KexnjDC0X86v9kKmBIRro%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_fishinbiggerpots_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Fishin' Bigger Pots Of Gold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=rfttcXnBK8K9d1F%2FE4ydun85sz6rj9OjFfdPhkZ982UOtWDFxs2U8CnZFeKj6x18ZZWWbZvJ8YvVIcuD3PuzV%2BaBXCYJ36RSUyFj1QxZMRP%2BkHHNQkCKppbwlRuN1IcVslFY2Skbd%2B8XmXQf%2BdchZm6FYp1R6%2BBKSs%2F2K1S12xc%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_bigboomriches_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Big Boom Riches</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=QcU02hc3baS8qnn56wGnbDtwftnBud1Wt0ItAHp8NQkrF2MLahrk8uES6fq4y0OkjQC0zjNtynNEX0iX8zlyVK4HLYvV9yITxonA1T7PKO%2F6LiDP7frBmnzTkBOBb6oclooq6jB9AQZsL4n961f8xiNdfIk5ojTsDZh%2FhD1Kc24%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_dokidokiparfait_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Doki Doki Parfait</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=5fcsfrVmStpOEm2oVcIvW2bmhVaqJZZbxflpy4OlSkkP%2FqTTQg8DDEgM8qCllGttdAjSoXwpJ7Q%2BtHtzbbp7AcTP4GJObfM8Ad1L%2FgzO8OP95lPkKe6Vx6UvIj%2FgbnB0N2X4F7Z%2BH24yG3ET65DJWOMM3Un1sufnjWdUDuC5p7I%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_kodiakkingdom_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Kodiak Kingdom</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=BeWRP%2F6ZEoDiqzUHXSOZs6HRgDx8eAZ2GFl3q7zv7iIo5xy7h1l2ZBpt%2FR1WsTuL7Npqvv55oxJo38Ry7H16VVuYQTy7m1C%2Fwf4xabv1pK5Gfh0CLwX9P8Mir4I2CVqdz5ci6az%2BKbrhAI7kTQXa0y%2Fnk7BU%2BzfCNAMRpttvJec%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_4diamondblues_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">4 Diamond Blues™ Megaways™</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=go2zBIjNcUnN1zZM84kW68%2FQGyEg%2FXwzDOwbL8JEKMOErPq7iOch%2FKyhM8kzG%2BuYO63HWt%2B9bTIXZGWCGnxu7MNdj2E%2FwtgjwMTRDwzd06GE4t1U8BoaFDF2y%2Bp2nbjo8C85Xtl7Ea124GSykviyC44u1L%2FsRQKAEc%2B%2FZ42%2Fsek%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_squealinriches_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Squealin Riches</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=bnde1PTPIe9HU378hKbGN3JRGKTEDbdK8EQUVoRPoaqMTSDuvt6%2FsOX6HP3knuIUdA2vsTEfcFRL%2B5RsFBldWuZD%2FvphAdE6UTm2W%2BnkiJi0z08s2oSlemzvgAkc8o%2Blj3NBI6x%2F8Uq4ct4f2fXuvph1lRWRv3FyHwHYEdq%2BCUU%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_chroniclesofolympusxup_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Chronicles of Olympus X UP</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=BdhNSWrV6ZTgGXPv0SBx00y3nsBKQSxLNdSAs0OIJpmd61F4F036ZOIvJRkbT0TXp%2BP%2BbFK8l54adruG2j2TbZlOxdSj8RLxbC8906RGHPokTSzD6y5lqixfVsmSXwuKK3QLvNzkkKeQf2rbKu9kEkm42vSVWue4%2BxXERxk7Wsg%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_wwelegendslinkwin_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">WWE Legends: Link & Win</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=Fo3VR4j7%2BD6RI1T7QTqHUYMAMbEFd1sbObrVvNhMiQAAr009xmvyiZ7KbyOZc4VwsuB9pCNnljNpC99l4TrUVnZjZ7WrUaE43RU4Fev1m%2Fndw4DacvueAAmD9QsW%2FwXBOTZ0P2e3fl64F2u9QLsi06wiy10u5UVZOd%2F6CKeF4uQ%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_breakdabankagainmegaways_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Break Da Bank Again™ MEGAWAYS™</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=6T4oTyiaeN8RfOXS6sJ97bFHjhvxs8mMsviSr2wf3MTaKb5%2Ffzo2ks11UqX1ulF70p0kKpuUEpG%2BMScNm0Kl2%2FqyYJronYV45%2Fk4QqSZDELQkYXY3ON7Zl3F5m%2FfxlILQerMYIk4hnfE2H4%2FYEdkuw%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_africaxup_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Africa X UP™</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=YzBXmkYZcfbw1n0QxAEp8XxSWXeF5%2BlW89750hbmhgeUJyBfMP%2FB1l6EdLm%2Fg2%2BvP5wLAwck2OGSLqtew1jpVllTjXJ6fmKbwVRbFLi9nG0V0QlEn4FjaQQ96r978jlZjWqAnI%2BN7xSUKwTh3N8Sjg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_elvengold_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Elven Gold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=BaumYUd1Cawu7zo2%2FmK37pNpGh7UgGUg8CAHaLVQSuR8JgMDOBE7YCeDkPuJVoi%2FrOg7wESh1aNHLM4B9kmgNb0VkReSeSpHTq0zTJPJlBlwjutRbu7KMO99D6lJoRTQozHPA9xgvMJcBKndQyZGTUfx%2BYOmVV%2B6yow%2FVPPa20w%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_onihunterplus_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Oni Hunter Plus</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=arR5Z67Nv0yFSkLXG1Gd5JGb4mD448eAXFzJmE15b00nHbNyEUVs5%2FaicuTg2%2BMwbTR9MISEXOe60W6rwWGi86eCIegI%2FCLeLcw8eQ6OeFTqE4cyKEsE1wWyO7%2BWbvX1UFoAFkXV6ZDdljPu6Y16ZA%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_joyfuljoker_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Joyful Joker Megaways</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=UscHNl1Su%2FWi7TVWaOoUj9okPl3ELdnRBmseciNAngEncf7XnYehGAfMDhWDkCE%2F9DAPrQZz2t5KYto0YjR3Kz%2FE0qG6cVrJuAaaeBfIBDCv%2FGSAr8JKFEGUoKXZSa59pHonmhJfYQYEuFGPaGQ74NyMFrrtpY4WcYxS7Y9FE44%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_bookofkingarthur_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Book of King Arthur</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=gIvDDTn7BgKes0WoEFdyuMh%2BtL88Ja4kMrKBv7sC5NvxUb2buqQeO%2F%2B4ttmHR9dqASx%2FN%2BdSzQfb1eFCAbOVHXlLg%2BijB0KstdGS2ahj6kgCFuFiLmdfKwwviJ%2FhGilRijhyrcP8gaPBiYPNSU0mMQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_emeraldgold_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Emerald Gold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=rTHy8LBmLaItMJwqkejj6N%2FLgLFjSahxWtoSvmUVtouNM%2B8mWTqj7K4eVTe3%2FK2BWC5cmwfQ%2Bn9poJ6BJo%2BSAbl64siL5x6BUAkSG6OYIJ13YK1yUY0nQaR4luy3lt4glG1TE7uLW7otg6G2FhWNxldMlTMObxTEmswPpV5ojmQ%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_diamondkingjackpots_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Diamond King Jackpots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=ZsDkHhOyKiECwvNflcLBahAzZSTQ2IZNv8l0EEzntfld7CVegta7nl6zAOKGuwbewznmS1ZvN2GZ7VXoatJaLy57OTZTfB9fkrtmuvPvRblsv5jRJNCqdDkJ3PVYkkZq9xK4DKzRRkrwWxKdJuQqN8iOeqEU3ZBQFUpmVEN3dJc%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_thegreatalbini_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">The Great Albini</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=o5%2FscjksjBsZ2e%2F21i0Ddy4ChIP2A91jJ3xU%2F1IdmIrNfQdUWNVqYO0T3eEnnTgQGB%2F3h31JGf3VK8QYCIrK5bIDe2m4JLGpL2uYEjI9hidKBABx7BQAeqsed0H667EuP4Sh1gTdwRPG9fq9QOmVxfGRTZJvLXecfIt4OMxtPqw%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_kingsofcrystals_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Kings of Crystals</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=cbMg8Q9%2FBZxG2A8rvzU6x41FHuDNwhow%2BVayOBTXciaB2Wiqq43ARFDwv82LbBXu%2F5slnFF3WVVTzeI9pMUWf1RnLQlSCry1V%2B7uxUqEMAk0qMRCUVtzlc%2BvygMpL189oHCKOp%2FTtUjjthysQIylqWsSD%2BEfMHzfVr221h%2F%2B2x0%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_fishinpotsofgold_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Fishin' Pots Of Gold</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=OAlWYpeiQqSSwZ%2F1e8bmT1vN8UmLKRDYklqHEQPDmde%2F5QqXGxF%2B%2BCtSHlNoZWumyOl0zTT2zyGlKLFcV0Lx6in0Fd8OD2eF0Md%2Fx1XTGId4yzobq%2FR62C%2FhgBNUfJIef6ngDLF3tBo03QQ60Qzn66qdQh%2FD6RuNxNEki%2Bbt%2F50%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_onihunternightsakura_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Oni Hunter Night Sakura</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=EWYcES4Tusp7F4jVg8U2jR7z5TIkAMhP%2BKq7%2FLqAUzGtKnMCPojKLIzkJHpYrTqmBlql7s3oTLAw%2BhKEYPoCNtWWvZlIXg1NPBB4WbV8%2FEXRWMLF9PMFHB%2BXDKIDN4Gya2ZiAzn1E3e%2FpGZc0cGwZk5FQH9RTZPvfWRi4aXMoxg%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_thegreatalbini2_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">The Great Albini 2</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=m4YSi3WqbmN7W6iw35AnCai3o%2FMzAJOaxIr%2FvgiFOxrgjuZwEZ5it3OlH6zwN9oRndtJ2N889kMrlgUNfeMl9K9ruTiCDgjWnxrX9%2FkVhJAQi6WX3JoWhsRUq0tkLVDJsf%2BtPfLoRFMfdWhlxZUVXqL5GdQtSZKWO3dctjwIfQs%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_lightningfortunes_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Lightning Fortunes</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=9xHBw3Q7sejEB3phih%2B32bUE3DyVjdWuWOraJ7Yq%2F0aCIj2NvO0a1UPvHUjp0DT2waNCTk7I2FP0aI1Pl6TyqkuNwqifxafMcDqfxhladf9V5nSEzJYFDubrKu86WfBNTdhZF6UAI935VjzPpka6mBW7AQuM8pxj%2F0MNNGB7nPk%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_wildwildromance_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Wild Wild Romance</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=EdTcbNzLqhhWb2ZsqV7xSEoyR8QlujI%2FBBVKSCeh5bDmQOqdhoFEFZUTVFEhurSu4mzSS4flZVbUv%2F9kwQtI4LDFghGXZHwIgW60I0Q4EW%2BbpQ42uXwGhfymQcHXXFxmW%2F0qMir%2BDQQG56jKZ6xdAA%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_abracatdabra_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">AbraCatDabra</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=wlVw9EOaF9W9Syqk87o%2Bh3B1wkeG3dtbxqHIQvJWF%2B1kZV3Uk0QGXtezrbOS66uwAxL8U3LCGB6LdXm3WgTaxyiYEVeRviUL3DSJ1P6aLtN7dFEGz6%2FMZSnm7Z3tOngK9CaemQzrH17qlKsrou5d3w%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_westerngold2_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Western Gold 2 </div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=3C55mGokKHXfjF0KzhLfKVI%2BVSQEWuvk%2BuEGsGBivlCfZIyQ%2BDIAo4EaJUtfZHR%2FDoJTwGg234myO1jDikeuVW1Cg2nOqbd9WiT%2BqokD5PKqEbmq37fphcZs%2B6VyomcO0AL3jCeQwaz%2FdiNsg5lWmCoPgBywCEl7gDzXVf1vFfs%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_diadelmariachimegaways_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Día del Mariachi Megaway</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=Fq1jddA0%2BzfJ1w5T9oH064DKG11bH9Cz0eS%2FloAUbfbCbHC6yxU541z75X%2FCXhFKgg3xQ%2FfsFrXpg5YVbSWuCbQG2%2FrdUcyO%2FRREwXjTL4rSURla0aRaFKCgtkdSDIL141YsrJJoMz6KKREyDZPYsC6zvdoWQydrE6qp%2F%2Fas8aY%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_circusjugglersjackpots_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Circus Jugglers Jackpots</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=J2hZUVKq7dvZuN%2Bi7geTmh0KrOkc3xE4vGUwMrxqwnH2G8cZlieK6bJVbTkMuSwwsSuICLzORy6m122RHgtpBudCMf05dZ7DLaObqdp1W8TNEja03v3RHJxx96MX9q9LerG6EBDI1doJNTuLoBPALQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_boltxup_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">boltXUP</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=n9R9qK0UTlvBom3kx7MFJYSkrNsyUhqEM0J%2BfjJEMbA9EnfJ%2BVX9QIiY7wBHJ1w3Z8cYyFkQOFdlLvIfxGMOrj%2FNX1LOQsgBhD6z%2BWDuLble3Ii%2FifTcU03EKZEyJJAmXlKw6nCJQ6YarUtRip6ytg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_timelines_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Timelines</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=lC%2BWBo7AiOUTc5e2sfNJyx6jYq0gyG%2FLanK%2BWGvvxK7SWQTDLHxpT9wWyvuXy3H0Mk6VA6nA6zN313js3R3pDYYPoT0FmUTBjzaPnHa6w72bPsg2SiIFHEj4Fu2kVXqnhly1WkXAkywadahWE3OWhw%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_arkofra_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Ark of Ra</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=Jn08NOcNneB93FiWyOP%2BEjm%2FTnvKcHP3085XOZCPXW84T670iIXGbO1Ays2bWPKdk5ZFhLYTMRf4YW123fPSMfl151giXB0cvolQeTBByPeEqlTsoTlzhdZHQ233oA7Y6NzGyz2AJXqgmzhqTsKk%2Fw%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_pileemup_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Pile 'Em Up</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=QJe8b3E%2FMjxWJZ51psEdEJJz9SZZnX0cnqvmFDfNyFcXzWb%2BfP87a0cLzCFRLaRiFkC1A%2BtrmuHkZtvQzm6GqxlJugiPkIlPFzfCRJIIIb6nkxmsBm%2FJsW3kCPvOkFZIQCOEDWLYQo3%2BOepPCBWRFg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_moneymines_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Money Mines</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=KvRagrPBxENPhBASLepzt9hP9v7VI788OxmhT%2Fj7LUF3QKB4acwfLVIA%2FSDaoZ5G7t1qYhSAKLaJDHAclooCUOlrKRI3KLy6ZmKZFriP0%2FDRKHnV2bLTTakvQDvAKwyhwNPMWIW2tsoW4wOHaJj13xbjs6abvN0ykazUuG2wkGs%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_goldendragons_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Golden Dragons</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=wQy%2BqOHJTl8VjJrRPBXAKZcMEUFDkVWMJyh9GwBtsZI3ZK5ewy251s56jMuwXSqVoPHdxqZMF%2BpBIw9u4Vk3RC677lltz%2BmVCsXKKWoTod4Ys5HlXY6oIXuY3lNzphSOOInCbAwzsoGOHHVHXkA1GQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_cairolinkwin_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Cairo Link & Win</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=46dzZOVmpTyD2%2B0kxWGJ8iz3QICSjXNEdPxIKJY4hNy9aEoBEIvk0v0GWaDIXPho5joGkQW18Nrkoszlzv3F6jPUyXM31xQfkdZFNUH83QL16iZ1Sv3OVt%2Bpf%2FFgvhCrNihbzaopzoY5xQFyTbbXgmQCQBSjPFYiCnZjO5xAfjE%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_catsofthecaribbean_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Cats of the Caribbean</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=FeWYdALwAZ0KmvfNFhze8WIeAxFVAWw%2BhrE21nvFejJBk%2FLyEU6%2BHuAMkPEgOBPIrh3R9uc4GmCwc9LgGUs7jk5LSNh60t89psScnvTGBpvnn6lOuS21cY1nftqk0FaiCQQ4%2BHJhXryyiECyosvMUbIHQvpD6fj5O%2FnBYQ8m6eQ%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_footballfinalsxup_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Football Finals X UP</div>
                    </a>
                  </div>
                </div>
                <div id="mginter" style="height:561px; overflow:auto" class="tab-pane fade in">
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=LdR7VL6UukqRyUjzvq378BYOTwfEI6sLggVIciHq%2BoVPgT0jqAGOCE7GQGUPn7y%2BTNJUkc%2FioOpokhKy%2BTQwmeuSSciIp%2FfbVPrpRQ1V45D0mvkT2BIo65Ym2du7vMX6eltcxGBYlBIhvV575D5Fdw%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_flyx_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Fly X</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=TKylD37PkyoR%2FW%2FFbKR9eKZTzspHg7E1t5cysBeNeRP%2FQMceNn1KxueahXKOeDn%2F0yhrDEcMzhjK4hMRYqTUYybD1QYqvaL9LpEXnEOEHpAxGhF041Mp09eiFywrQ0OIMzFD2Kkwx4VxRgAoug0hJiPxiC7Mk4Ik%2FMLxrkT8buQ%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_leprechaunstrike_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Leprechaun Strike</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=GIneez0y1S2yBpiH9JkYLv1bUhL%2F14RDeVDpLR%2BVQM4pjFtYM%2BexV6QcvZWEHfaj0x90BbGZxZwOjsRwoSsLF2zHqd5y7ULgrqjplyO6rj%2F6HifB7UL5hGpNKcWVtkCBDGHwptLfNXsoNtBk91nG7WAjADQN3cciH2rpiLSYb58%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_soccerstriker_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Soccer Striker</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=PHyBoGP2wea5jhCM2wryU00E%2BNcLEd6FBr%2BAQ%2FUckloMCqU1YTtKEh9kmOap4ClS%2BetgczLOcgPHfNs1gdMDsa%2Fr3NaVJT3QqyRsJRgS8HDdscJlRgOPJizcoTMme5oRsyQXIzxbEsorckLUscQKDA%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_hippiedays_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Hippie Days</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=fK5XDXLai9B2kw%2BO2H99SyzJfVSs7Sa3nXJjF%2B%2BQQ0y3yUxYBJ0iKGZYD0%2FyfBe0VykSZ3O%2BBo%2FObNRMMTA3rBxMN2Dox0PypVXKAwz8hVxnJVKfg2wOXknq83v7dms3iynF9t05To%2Fvmn5%2B5Lb5zwrErUdivpCBpAIGTA21qrE%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_luckytwinscatcher_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Lucky Twins Catcher</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=U8pj3E6zhEBBqbRvMiFgoyezO5998YkJa9jgJTqKJCYNN%2Bs8lwWGsAmwjYDDJDz2xkDHhJFFbYrlcDq%2BwuAWH3r%2Fo32sC1Iepun36Jm2wmXrN8l5YE46RfViYDY3ir0FT848VEBYUBkKp9coefvps51X9e2WMZ%2FAP2PHku7uVzI%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_incanadventure_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Incan Adventure</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=bTrobuYeCgrOVoWNFNrXoxGl86ZNkaxGpV6jErTSzMC4RabDIqop5v1MGET8v4QL9%2BlRPgQ7qHBMmNcgVVnCZVM2bAdzzGRWZq60LJ7bJ4KWzNQD%2Fu2uCnSKCbur1eWoCufJJ1o30%2BkHEGVaClNwJlQ4sV6U5FaiDwqy5lsyRmo%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_theincredibleballoonmachine_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">The Incredible Balloon Machine</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=RTiPAcpUGFts%2BVBhKvnbm5IGwzKBJNY%2FFcZ6KV6g6jHrwszAznh0yH%2BH4aLHgTF%2BoA7w91yB%2FcYqzLBXtaKBd2vaFob9e6fSQwqkEBkvZpOA1GqPNR9UyL8T8CoTZQ9n7vuhAvfStr8Mdrt6iaXaOg%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_petsgowild_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Pets Go Wild</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=Jq4tNWnzpWcpUU7M41R7gQ821X2lfu1%2BKLkOFATk%2BsPBVJo1YJMbtiiZdaMBw1K%2B%2Baoe6mvwHYlH0uWFH7wnxlJJ2bTp56SiRnel6F7rzmWlz16NHc5crDOv2xQDaeAPThfw3v1KgxDwas7nMtf0lv7IUDEhUidq%2Biwy8TiZOwU%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_breakawayshootout_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Break Away Shootout</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=hfOt1sz9qZaUtPAti5%2FdvWkevI5Vhkd3pNXfasukCbYPVEsAiTd5oCjtihBSC2oldBBf6uiaskD3T0CcuTpRhPUS3U%2Fd98PkIP%2FU0cqqmEUrZTDb%2B%2BwWSkNd6A29RMNx2bYTsPL3H%2FfZ7pPK%2Ff1OmdGARRzGeolsf7hVQOQdoNA%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_switchwheelofwinners_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Wheel of Winners</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=XhGOQouZlLTMlQs1AVVE05cI%2BRXtiqPZpZCmUn7mneqQKtYymbgFsZyY85hxQpYB%2FvmOzkmwLD0hbXiJDTNA%2BPG%2Bxd4DzDhCBXwz0w3u3zllmmOkdUBF4AEvPBkXFzEe2fcFOuGL0VMtB%2B2pnILqoBui%2BB4QbjzNudQ%2Fzs0IM74%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_megamoneywheel_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Mega Money Wheel</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=zhuiBbyQdnoF3OVPD09E2BxqIfOuwIa%2FLRY4eWFC5lYUzxTRsOBBTA0vPJHov7cFnhIAety71Y%2FxTjXRXI7j9rR%2FVAQ2fHdJNOOTiKJ5gEht8zTNXwTKaziBz6r5exlozTlJx553jKTKSaapylwQB1IRbqbTqfsQmrPghNrgn04%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_lightningfortunes_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Lightning Fortunes</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=i9fDqwmnCAPqd4twcq6KIuiJwa6LX3Nhp9Ps3QORN2E0WuSU1gAubCMN7Dulh8%2BpyncIek%2B2jHDGnFbBVjiBjghpqJlRLI%2BnwxaiIWLlaTiwmwUzUDsjtiOFMyIB11TD5jhP4RR3CsVeGF9FlC5hWQ%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_gemsodyssey_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Gems Odyssey</div>
                    </a>
                  </div>
                  <div class="gameList" style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                    <a target="embedgameIframe" href="https://mg.lk-acc-n1.com?token=srS3jSneyHzVIHTSNftHxEfRiZXhJYUpfyrltNQGazXphw3RLGNYJFh2qvg2kJwGzgDE70%2F0IDam5ZYPr808kLIpHN0BeTtHaF7oWOR9dxgJEoYwhkZna5mAAKXmCzdTkiL3JWLXciiovcTC2J3WrA%3D%3D&language=id&mobile=no&redirectUrl=">
                      <img src="https://img.pay4d.info/mg/images/smg_fruitblast_icon_square_250x250_en.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                      <div style="text-align:center; margin-top:5px;cursor:pointer">Fruit Blast</div>
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
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=etIKWx07aJMEUpjYAYl0IDM9Lfz%2BJLDNdxnByR6Au7s%3D&token=GKBEUxerGa6xGSR9B4Z5Z9BoGR76AjEKRrMt8r6%2BJr4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ion/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=CnRM6CUiUOnaAsGMxjTH0NQylNYjMnJ63aNLu%2BENDsQ%3D&token=GKBEUxerGa6xGSR9B4Z5Z9BoGR76AjEKRrMt8r6%2BJr4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ion/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=tp4e5SNK2sYsn16Xmgv%2BwFO99UOHnm%2Fel%2FSbcthQ1nM%3D&token=GKBEUxerGa6xGSR9B4Z5Z9BoGR76AjEKRrMt8r6%2BJr4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ion/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sicbo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=f8QbvbqlcdCAT4CVc37S5jro9mq3gf6rgWwi6H50kqY%3D&token=GKBEUxerGa6xGSR9B4Z5Z9BoGR76AjEKRrMt8r6%2BJr4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://opus-api.lk-acc-n1.com/opus/launch?cookie=4UkT%2BBOZiUTSzi6aPvcrLKmSkuSm%2Bj6DSDI3PXPRapg%3D&gameType=BA', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/og/images/BA.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://opus-api.lk-acc-n1.com/opus/launch?cookie=4UkT%2BBOZiUTSzi6aPvcrLKmSkuSm%2Bj6DSDI3PXPRapg%3D&gameType=RO', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/og/images/RO.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://opus-api.lk-acc-n1.com/opus/launch?cookie=4UkT%2BBOZiUTSzi6aPvcrLKmSkuSm%2Bj6DSDI3PXPRapg%3D&gameType=DC', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=tM7yiDYV%2BitRD2TfOUqHFORsgnbmM3JaqnlGAv%2B8Mb4%3D&category=top_games', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/top_games.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Top Games</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=tM7yiDYV%2BitRD2TfOUqHFORsgnbmM3JaqnlGAv%2B8Mb4%3D&category=game_shows', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/game_shows.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Game Shows</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=tM7yiDYV%2BitRD2TfOUqHFORsgnbmM3JaqnlGAv%2B8Mb4%3D&category=baccarat', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=tM7yiDYV%2BitRD2TfOUqHFORsgnbmM3JaqnlGAv%2B8Mb4%3D&category=roulette', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=tM7yiDYV%2BitRD2TfOUqHFORsgnbmM3JaqnlGAv%2B8Mb4%3D&category=sicbo', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sicbo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=tM7yiDYV%2BitRD2TfOUqHFORsgnbmM3JaqnlGAv%2B8Mb4%3D&category=dragontiger', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/dragontiger.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=tM7yiDYV%2BitRD2TfOUqHFORsgnbmM3JaqnlGAv%2B8Mb4%3D&category=blackjack', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/blackjack.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Blackjack</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=tM7yiDYV%2BitRD2TfOUqHFORsgnbmM3JaqnlGAv%2B8Mb4%3D&category=poker', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/poker.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Poker</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=tM7yiDYV%2BitRD2TfOUqHFORsgnbmM3JaqnlGAv%2B8Mb4%3D&category=bacbo', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/bacbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Bac Bo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=tM7yiDYV%2BitRD2TfOUqHFORsgnbmM3JaqnlGAv%2B8Mb4%3D&category=fantan', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/fantan.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Fan Tan</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=tM7yiDYV%2BitRD2TfOUqHFORsgnbmM3JaqnlGAv%2B8Mb4%3D&category=andarbahar', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/andarbahar.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Andar Bahar</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=tM7yiDYV%2BitRD2TfOUqHFORsgnbmM3JaqnlGAv%2B8Mb4%3D&category=craps', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/craps.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Craps</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=tM7yiDYV%2BitRD2TfOUqHFORsgnbmM3JaqnlGAv%2B8Mb4%3D&category=teenpatti', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=MDO4SXsaKpX137kvshrQGrh7CcwMHQYHdD6HwxRKYZU%3D&token=l9yNC8PrxXDUGlclZz0A6IVwdYKvvuXo7pqpMYfKSDY%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/sx/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=fqOEZCS%2FSWUEo%2FIyIqOxjAQpkscd%2BP720iu4qEonNT0%3D&token=l9yNC8PrxXDUGlclZz0A6IVwdYKvvuXo7pqpMYfKSDY%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/sx/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=27a%2BT4aLljwPfBJ5hTK%2BVewA0G6CIakN2lRUTiYM1Gw%3D&token=l9yNC8PrxXDUGlclZz0A6IVwdYKvvuXo7pqpMYfKSDY%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/sx/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">SicBo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=RNB87VHYaeu0qKJPpP5bcSB8JmqijFZiZqxzEByYv7c%3D&token=l9yNC8PrxXDUGlclZz0A6IVwdYKvvuXo7pqpMYfKSDY%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D2cYXQSmjm5ur5AbCDc1XjaYTFb0sLAzzZhYzBDxcCik%3D%26symbol%3D101%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/101.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Top Games</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D2cYXQSmjm5ur5AbCDc1XjaYTFb0sLAzzZhYzBDxcCik%3D%26symbol%3D104%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/104.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat Lobby</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D2cYXQSmjm5ur5AbCDc1XjaYTFb0sLAzzZhYzBDxcCik%3D%26symbol%3D102%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/102.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette Lobby</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D2cYXQSmjm5ur5AbCDc1XjaYTFb0sLAzzZhYzBDxcCik%3D%26symbol%3D103%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/103.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Blackjack Lobby</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D2cYXQSmjm5ur5AbCDc1XjaYTFb0sLAzzZhYzBDxcCik%3D%26symbol%3D1001%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1001.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D2cYXQSmjm5ur5AbCDc1XjaYTFb0sLAzzZhYzBDxcCik%3D%26symbol%3D1024%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1024.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Andar Bahar</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D2cYXQSmjm5ur5AbCDc1XjaYTFb0sLAzzZhYzBDxcCik%3D%26symbol%3D204%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/204.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Mega Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D2cYXQSmjm5ur5AbCDc1XjaYTFb0sLAzzZhYzBDxcCik%3D%26symbol%3D701%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/701.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Mega Sicbo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D2cYXQSmjm5ur5AbCDc1XjaYTFb0sLAzzZhYzBDxcCik%3D%26symbol%3D801%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/801.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Mega Wheel</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D2cYXQSmjm5ur5AbCDc1XjaYTFb0sLAzzZhYzBDxcCik%3D%26symbol%3D240%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/240.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Power Up Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D2cYXQSmjm5ur5AbCDc1XjaYTFb0sLAzzZhYzBDxcCik%3D%26symbol%3D1101%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1101.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sweet Bonanza Candyland</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D2cYXQSmjm5ur5AbCDc1XjaYTFb0sLAzzZhYzBDxcCik%3D%26symbol%3D1302%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1302.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Spaceman</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D2cYXQSmjm5ur5AbCDc1XjaYTFb0sLAzzZhYzBDxcCik%3D%26symbol%3D1401%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1401.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Boom City</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3D2cYXQSmjm5ur5AbCDc1XjaYTFb0sLAzzZhYzBDxcCik%3D%26symbol%3D1601%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=0&token=NnlvzcW5FjiPNm4SX02djIsdacNZawO%2Bz3Gm%2FBfBvr4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/hotgames.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Hot Games</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=100&token=NnlvzcW5FjiPNm4SX02djIsdacNZawO%2Bz3Gm%2FBfBvr4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/dragonhall.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">DragonHall</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=106&token=NnlvzcW5FjiPNm4SX02djIsdacNZawO%2Bz3Gm%2FBfBvr4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/quickhall.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">QuickHall</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=102&token=NnlvzcW5FjiPNm4SX02djIsdacNZawO%2Bz3Gm%2FBfBvr4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/multiplay.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">MultiPlay</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=104&token=NnlvzcW5FjiPNm4SX02djIsdacNZawO%2Bz3Gm%2FBfBvr4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/seecardbaccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">SeeCard Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=101&token=NnlvzcW5FjiPNm4SX02djIsdacNZawO%2Bz3Gm%2FBfBvr4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=105&token=NnlvzcW5FjiPNm4SX02djIsdacNZawO%2Bz3Gm%2FBfBvr4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/sexybaccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sexy Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=110&token=NnlvzcW5FjiPNm4SX02djIsdacNZawO%2Bz3Gm%2FBfBvr4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/insurancebaccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Insurance Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=401&token=NnlvzcW5FjiPNm4SX02djIsdacNZawO%2Bz3Gm%2FBfBvr4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=402&token=NnlvzcW5FjiPNm4SX02djIsdacNZawO%2Bz3Gm%2FBfBvr4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/sexyroulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sexy Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=201&token=NnlvzcW5FjiPNm4SX02djIsdacNZawO%2Bz3Gm%2FBfBvr4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">SicBoHiLo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=301&token=NnlvzcW5FjiPNm4SX02djIsdacNZawO%2Bz3Gm%2FBfBvr4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/dragontiger.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=801&token=NnlvzcW5FjiPNm4SX02djIsdacNZawO%2Bz3Gm%2FBfBvr4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/bullbull.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">BullBull</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=901&token=NnlvzcW5FjiPNm4SX02djIsdacNZawO%2Bz3Gm%2FBfBvr4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/win3cards.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Win3Cards</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=501&token=NnlvzcW5FjiPNm4SX02djIsdacNZawO%2Bz3Gm%2FBfBvr4%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=gm28RijqyTqZ79CsOycJ683PR0yhn6ZULzPclLqC63Qw0mo1O%2BY4amsNkhezTtsJ%2FmdFJUOdpxDNDeNNWZlqfwIFSZfiSinoZwK00ssnUF1Gc5%2BSEiRPOduIikYkFvMqUgC%2BX5w3z4pZ9SyFxGr3527WLr7LJRp5TbZhqRv9ywqf%2BkPOddmoIgsmg38q58H4580jou9LmZY4ejwvqPlDRA%3D%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_baccarat_playboy_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Playboy Club</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=TkGsjb0%2F0HYW5azbS7sLniptS6QtwHoO%2F94a0UtEmZCeqimPjESEyBMwRxXrO68PCacFkFsVd%2BuhQ55COkSm9xGgnjaT3hAW3acVo8tGQURu87PvH%2FgybLsACCjoWbKC1TPPn2B2YFSt5v22xTJHBdkLZt4x4f%2F16fkFtwGW6EY%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_baccarat_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Bonus Baccarat</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=4GRH%2BRYGTIdHDbXQ9s8kGtFcuv4FzJxgK9%2BPrkM%2Bl8v3b4JeC8FzRxE1wluLi6x5yQaL3AY%2FmcYSFtsCK%2F%2BTe%2BQsZlFh8MY09n7xwB1wLYIFQzwsGSCRjXrhbyOMke50QB%2F1fJNfty3z3dYbjwjjgtYTLqBKgEUUyv3ofZR4A7U%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_baccaratnc_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">No Com Bonus Baccarat</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=yIpNB6nov67SuGFKcVOTn%2BrYSBjptH5KPtBRswxdgIgL0CqH19XjNcYBOqGcWSNC%2FmpJklMPjrpT5sBZVW1yf38n2NPU4jKL%2B%2Fv2zX3YB5gGI1adP3DZLpSV16dQlq%2FL8zOsx4jj4PHzIKDveSc9kVYRdDpiCP0XSm5%2B0xDSbluPhjEo%2Bgh57QpKjL6i%2BB6LBy9BXRQMk3iBOBQhHS5YAQ%3D%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_mp_baccarat_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Baccarat</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=%2B8p3IwHs1PlC6zmTGX8xzdgmg8HR%2BgfVWGxzwX%2Fyh7zCI9l9WxzJzfj3JAu14PnZQvb18bs8hpjX9EzhJHbbyUeoCHde7CbupvADiZmvrbtTwkGs1RtoYm16GEACytKN%2Faludmk%2B4XgWnobuWaDIiP60LTube6u%2BJwJl7lic%2FCE%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_roulette_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Roulette </div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=L9V95dmybbWxgOC3PfN9qTdCcrV%2FlwjumKysgtAEMAP%2Fubt%2FQ2Y7tL8EJ3TKrqzhBqYRIRIERboJZ6c0uqlzFogq2xdS%2F97PKQIFgw0LX%2BCy3KknY5L0fgv0yo8X%2FYWrclZgFsM22UYn%2FWJaens8ZKEcxLLcMllpfEwY5Ev%2FIK4%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
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
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=vVGlK3fdFDW0cJgYw7MSAQCmUNjc27z0eks%2FX9Hfyz0%3D&game=baccarat', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/baccarat.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Baccarat</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=vVGlK3fdFDW0cJgYw7MSAQCmUNjc27z0eks%2FX9Hfyz0%3D&game=roulette', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/roulette.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Roulette</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=vVGlK3fdFDW0cJgYw7MSAQCmUNjc27z0eks%2FX9Hfyz0%3D&game=sicbo', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/sicbo.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Sicbo</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=vVGlK3fdFDW0cJgYw7MSAQCmUNjc27z0eks%2FX9Hfyz0%3D&game=dragontiger', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/dragontiger.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=vVGlK3fdFDW0cJgYw7MSAQCmUNjc27z0eks%2FX9Hfyz0%3D&game=12baccarat', '_blank', 'width=1366, height=900, top=0, left=0')">
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
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=TymYO0dOJ006jMP0ufPGHnl3fihJrWQ7FuQJPhr8Q3c%3D&game=baccarat', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/baccaratlobby.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Baccarat Lobby</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=TymYO0dOJ006jMP0ufPGHnl3fihJrWQ7FuQJPhr8Q3c%3D&game=roulette', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/eroulette.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Roulette</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=TymYO0dOJ006jMP0ufPGHnl3fihJrWQ7FuQJPhr8Q3c%3D&game=croulette', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/croulette.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Sexy Roulette</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=TymYO0dOJ006jMP0ufPGHnl3fihJrWQ7FuQJPhr8Q3c%3D&game=sicbo', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/esicbo.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Sicbo</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=TymYO0dOJ006jMP0ufPGHnl3fihJrWQ7FuQJPhr8Q3c%3D&game=dragontiger', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/edragontiger.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=TymYO0dOJ006jMP0ufPGHnl3fihJrWQ7FuQJPhr8Q3c%3D&game=pokdeng', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/epokdeng.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Pok Deng</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=TymYO0dOJ006jMP0ufPGHnl3fihJrWQ7FuQJPhr8Q3c%3D&game=andarbahar', '_blank', 'width=1366, height=900, top=0, left=0')">
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
          <a onClick="window.open('https://ws168.lk-acc-n1.com/ws/launch?token=UPUxkMgh%2BhLrxZ4U5%2BwvXNPSyB1V03gxWH8Tqt3xBD0%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
            <img src="https://img.pay4d.info/wslogo.png" style="cursor: pointer;">
            <div>WS168</div>
          </a>
        </div>

        <div style="clear: both;"></div>

      </div>




      <div id="sport_wrap" class="tab-pane fade in">
        <hr style="margin-top: 5px">
        <div style="margin: 10px 0px 10px 10px; text-align: center; width: 200px; float: left">
          <a onClick="window.open('https://saba.lk-acc-n1.com/?p=d&token=pUOoGGoQyifZAeUJNlzBkY%2FNVQVSqHkXiBJYg9H%2F%2FiA%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
            <img src="https://img.pay4d.info/sabalogo.png" style="cursor: pointer;">
            <div>Saba Sports<BR>[Rasio Credit 1:1000]</div>
          </a>
        </div>

        <div style="margin: 10px 0px 10px 10px; text-align: center; width: 200px; float: left">
          <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=vVGlK3fdFDW0cJgYw7MSAQCmUNjc27z0eks%2FX9Hfyz0%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
            <img src="https://img.pay4d.info/sbologo.png" style="cursor: pointer;">
            <div>SBO Sports<BR>[Rasio Credit 1:1000]</div>
          </a>
        </div>

        <div style="margin: 10px 0px 10px 10px; text-align: center; width: 200px; float: left">
          <a onClick="window.open('https://tfsport.lk-acc-n1.com/tf/launch?token=JRXFgwzYE3wj3bo9JnKAv4uIzM2%2FY2JSd4ZYWvMF9Xw%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
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
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=nXKljPa1lejXN2t%2B9L1AlcO4ObvDGSKkjOuboDwAOFc%3D&game=F-SF01&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-SF01.png" style="width:160px;">
                      <div style="text-align:center;">Fishing God<br>[Rasio Credit 1:10]</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=nXKljPa1lejXN2t%2B9L1AlcO4ObvDGSKkjOuboDwAOFc%3D&game=F-SF02&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-SF02.png" style="width:160px;">
                      <div style="text-align:center;">Fishing War<br>[Rasio Credit 1:10]</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=nXKljPa1lejXN2t%2B9L1AlcO4ObvDGSKkjOuboDwAOFc%3D&game=F-AH01&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-AH01.png" style="width:160px;">
                      <div style="text-align:center;">Alien Hunter<br>[Rasio Credit 1:10]</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=nXKljPa1lejXN2t%2B9L1AlcO4ObvDGSKkjOuboDwAOFc%3D&game=F-ZP01&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-ZP01.png" style="width:160px;">
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
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=2l9CXVfB8VHny%2FQnD6gwekEd0ZPT8Qgjm3LHU7%2FAMsU%3D&gameid=212"><img src="https://img.pay4d.info/jl/images/212.png" style="width:160px;">
                      <div style="text-align:center;">Dinosaur Tycoon II</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=2l9CXVfB8VHny%2FQnD6gwekEd0ZPT8Qgjm3LHU7%2FAMsU%3D&gameid=32"><img src="https://img.pay4d.info/jl/images/32.png" style="width:160px;">
                      <div style="text-align:center;">Jackpot Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=2l9CXVfB8VHny%2FQnD6gwekEd0ZPT8Qgjm3LHU7%2FAMsU%3D&gameid=82"><img src="https://img.pay4d.info/jl/images/82.png" style="width:160px;">
                      <div style="text-align:center;">Happy Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=2l9CXVfB8VHny%2FQnD6gwekEd0ZPT8Qgjm3LHU7%2FAMsU%3D&gameid=119"><img src="https://img.pay4d.info/jl/images/119.png" style="width:160px;">
                      <div style="text-align:center;">All-star Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=2l9CXVfB8VHny%2FQnD6gwekEd0ZPT8Qgjm3LHU7%2FAMsU%3D&gameid=1"><img src="https://img.pay4d.info/jl/images/1.png" style="width:160px;">
                      <div style="text-align:center;">Royal Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=2l9CXVfB8VHny%2FQnD6gwekEd0ZPT8Qgjm3LHU7%2FAMsU%3D&gameid=71"><img src="https://img.pay4d.info/jl/images/71.png" style="width:160px;">
                      <div style="text-align:center;">Boom Legend</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=2l9CXVfB8VHny%2FQnD6gwekEd0ZPT8Qgjm3LHU7%2FAMsU%3D&gameid=74"><img src="https://img.pay4d.info/jl/images/74.png" style="width:160px;">
                      <div style="text-align:center;">Mega Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=2l9CXVfB8VHny%2FQnD6gwekEd0ZPT8Qgjm3LHU7%2FAMsU%3D&gameid=42"><img src="https://img.pay4d.info/jl/images/42.png" style="width:160px;">
                      <div style="text-align:center;">Dinosaur Tycoon</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=2l9CXVfB8VHny%2FQnD6gwekEd0ZPT8Qgjm3LHU7%2FAMsU%3D&gameid=20"><img src="https://img.pay4d.info/jl/images/20.png" style="width:160px;">
                      <div style="text-align:center;">Bombing Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=2l9CXVfB8VHny%2FQnD6gwekEd0ZPT8Qgjm3LHU7%2FAMsU%3D&gameid=60"><img src="https://img.pay4d.info/jl/images/60.png" style="width:160px;">
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
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=CexwjrQ0weW3R7tmRHAqduvIzpzJ1JgQcBvRLINBLi0%3D&gameid=PSF-ON-00006"><img src="https://img.pay4d.info/ps/images/PSF-ON-00006.png" style="width:160px;">
                      <div style="text-align:center;">Fishing Fa Fa Fa</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=CexwjrQ0weW3R7tmRHAqduvIzpzJ1JgQcBvRLINBLi0%3D&gameid=PSF-ON-00005"><img src="https://img.pay4d.info/ps/images/PSF-ON-00005.png" style="width:160px;">
                      <div style="text-align:center;">Fishing In Thailand</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=CexwjrQ0weW3R7tmRHAqduvIzpzJ1JgQcBvRLINBLi0%3D&gameid=PSF-ON-00004"><img src="https://img.pay4d.info/ps/images/PSF-ON-00004.png" style="width:160px;">
                      <div style="text-align:center;">Fishing Foodie</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=CexwjrQ0weW3R7tmRHAqduvIzpzJ1JgQcBvRLINBLi0%3D&gameid=PSF-ON-00003"><img src="https://img.pay4d.info/ps/images/PSF-ON-00003.png" style="width:160px;">
                      <div style="text-align:center;">Zombie Bonus</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=CexwjrQ0weW3R7tmRHAqduvIzpzJ1JgQcBvRLINBLi0%3D&gameid=PSF-ON-00002"><img src="https://img.pay4d.info/ps/images/PSF-ON-00002.png" style="width:160px;">
                      <div style="text-align:center;">Spicy Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=CexwjrQ0weW3R7tmRHAqduvIzpzJ1JgQcBvRLINBLi0%3D&gameid=PSF-ON-00001"><img src="https://img.pay4d.info/ps/images/PSF-ON-00001.png" style="width:160px;">
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
                  <div class="gameList_f" style="height:205px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://fastspin.lk-acc-n1.com/fs/launch?token=LRCUtTU1c9bcsOSLxxmVoEVL7NZGV8pXbxG6lSHEooI%3D&game=F-FT01"><img src="https://img.pay4d.info/fs/images/F-FT01.jpg" style="width:155px;">
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