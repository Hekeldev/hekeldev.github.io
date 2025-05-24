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
            var timeSKA = 32160;
            setInterval(function() {
              timeSKA--;
              if (timeSKA < 3600) $('#pidSKA').text(secondtominute(timeSKA));
            }, 1000);
          </script>
          <li style="font-size:14px; width:228px; font-weight:bold; margin-left:0px; opacity:1.0;"><a data-toggle="pill" href="#sakatoto_wrap"><span id="p_sakatoto" class="glyphicon"></span><span class="nama_pasaran_sakatoto"></span>
              <span id="pidSKT" style="float:right; font-weight:normal; font-size:10px;" class="blink_me"></span></a></li>
          <script>
            var timeSKT = 42960;
            setInterval(function() {
              timeSKT--;
              if (timeSKT < 3600) $('#pidSKT').text(secondtominute(timeSKT));
            }, 1000);
          </script>
          <li style="font-size:14px; width:228px; font-weight:bold; margin-left:0px; opacity:1.0;"><a data-toggle="pill" href="#saka4d_wrap"><span id="p_saka4d" class="glyphicon"></span><span class="nama_pasaran_saka4d"></span>
              <span id="pidSKD" style="float:right; font-weight:normal; font-size:10px;" class="blink_me"></span></a></li>
          <script>
            var timeSKD = 50160;
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
        <div id="launch_window" style="width:100%; height:642px; display:none">
          <iframe id="embedgameIframe" name="embedgameIframe" scrolling="no" width="100%" height="100%" src="pleaseWait.html" frameBorder="0" style="margin: 0; padding: 0; white-space: nowrap; border: 0; background-color:#272b30">
          </iframe>
          <div style="position:absolute; margin-top:-642px; margin-left:5px; " id="closeButton"><button type="button" class="btn btn-default" onClick="closeGame();" style="background:none; border:none; padding:0px; margin:0px; font-size:20px"><img src="https://img.pay4d.info/home.png" height="35" alt=""></button></div>
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
            <li class="active" id="tab_sg" style="width:24.8%; margin-left:2px; margin-bottom: 2px"><a href="?login=89j3vu4unVSW8Bny&games&gid=sg"><span><img src="https://img.pay4d.info/sg-w.png" height="25" alt="" style="vertical-align:bottom; margin-right:5px" />Spadegaming</span>
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

            <div id="games_window_sg" class="tab-pane fade in active">


              <div id="sgall" class="tab-pane fade in active">
                <div class="row">
                  <div class="col-md-9">
                    <div style="margin-top:10px; padding-left:10px"><span class="text-warning">Catatan:</span> Rasio Credit di dalam Game <span class="text-info">1:1000</span></div>
                  </div>
                  <div class="col-md-3" style="padding-top:5px">
                    <form method="GET" style="float:right;">
                      <div class="input-group">
                        <input type="text" class="form-control" name="s" placeholder="Search Game" value="">
                        <input type="hidden" name="gid" value="sg">
                        <input type="hidden" name="games">
                        <div class="input-group-btn">
                          <button type="submit" class="btn btn-sm btn-danger" style="height:27px; padding-top:4px; margin-top:-1px"><i class="glyphicon glyphicon-search"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div style="height:600px; overflow:auto; margin-top:15px;">

                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-LK03&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-LK03.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Legacy of Kong Maxways</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-RH02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-RH02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Royale House</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-RK02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-RK02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Royal Katt</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-GK01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-GK01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Brothers Kingdom</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-PW03&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-PW03.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Poker Ways</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-HT02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-HT02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Hammer of Thunder</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-WW02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-WW02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Wild Wet Win</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-CS03&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-CS03.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Caishen Deluxe Megaways</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-BA01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-BA01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">888</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-CS02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-CS02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Caishen</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-GP03&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-GP03.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Gold Panther Maxways</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-FD01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-FD01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">5 Fortune Dragons</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-FM03&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-FM03.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Fruits Mania</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-CP03&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-CP03.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Candy Pop 2</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-RM01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-RM01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Roma</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-DF02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-DF02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Dancing Fever</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-GL02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-GL02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Golden Lotus SE</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-SP04&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-SP04.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Sugar Party</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-ZE01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-ZE01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">ZEUS</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-FF01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-FF01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Farmland Frenzy Maxways</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-CG01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-CG01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Captain Golds Fortune</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-PO02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-PO02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Panda Opera</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-CM02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-CM02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Christmas Miracles</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-RR01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-RR01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Rabbit Riches</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-JW01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-JW01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Journey to the Wild</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-FS01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-FS01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Fiery Sevens</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-SC01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-SC01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Space Conquest</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-LK01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-LK01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Lucky Koi</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-TD01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-TD01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Tiger Dance</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-MT01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-MT01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Muay Thai Fighter</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-LK02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-LK02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Lucky Koi Exclusive</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-LB01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-LB01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Legendary Beasts Saga</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-FS02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-FS02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Fiery Sevens Exclusive</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-RC01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-RC01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Rich Caishen</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-GR01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-GR01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Gold Rush Cowboy</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-CB02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-CB02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Sugar Bonanza</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-VB01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-VB01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Sexy Vegas</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-PW02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-PW02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Princess Wang</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-DE01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-DE01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Dragon Empire</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-GP01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-GP01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Gold Panther</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-FL02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-FL02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">First Love</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-JT02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-JT02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Jokers Treasure </div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-CS01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-CS01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Cai Shen 888</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-MG02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-MG02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Mayan Gems</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-JT03&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-JT03.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Joker's Treasure Exclusive</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-MG01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-MG01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Mega 7</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-BM01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-BM01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Book of Myth</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-CP02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-CP02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Candy Candy</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-MK01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-MK01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Magic Kitty</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-PH02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-PH02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">King Pharaoh</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-FM02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-FM02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Golden Monkey</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-HQ01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-HQ01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Hugon Quest</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-DX01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-DX01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Da Fu Xiao Fu</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-ML01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-ML01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Magical Lamp</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-HE01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-HE01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Heroes</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-LS02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-LS02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Three Lucky Stars</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-MM01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-MM01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Money Mouse</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-DF03&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-DF03.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Double Flame</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-CB01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-CB01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Crazy Bomber</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-RW01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-RW01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Rise of Werewolves</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-KF01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-KF01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Kungfu Dragon</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-LI03&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-LI03.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Love Idol</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-RH01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-RH01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Ruby Hood</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-TP02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-TP02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Triple Panda</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-CH01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-CH01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Mr Chu Tycoon</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-PG01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-PG01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Prosperity Gods</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-LY01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-LY01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">FaFaFa</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-HY01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-HY01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Ho Yeah Monkey</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-LY02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-LY02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">FaFaFa2</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-FO01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-FO01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">168 Fortunes</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-BC01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-BC01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Baby Cai Shen</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-PO01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-PO01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Pocket Mon Go</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-TZ01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-TZ01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Jungle King</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-LC01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-LC01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Lucky Cai Shen</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-CY01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-CY01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Cai Yuan Guang Jin</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-HF01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-HF01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Highway Fortune</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-GC03&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-GC03.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Golden Chicken</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-GF01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-GF01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Golden Fist</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-CP01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-CP01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Candy Pop</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-WP02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-WP02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Wow Prosperity</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-FG01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-FG01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Fist of Gold</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-TW01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-TW01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Tiger Warrior</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-NT01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-NT01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Sea Emperor</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-SG02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-SG02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Santa Gifts</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-PK01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-PK01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Pirate King</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-MR01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-MR01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Mermaid</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-LM01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-LM01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Lucky Meow</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-LF01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-LF01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Lucky Feng Shui</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-WC02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-WC02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Wong Choy</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-WC03&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-WC03.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Wong Choy SA</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-WM02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-WM02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">5 Fortune</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-WM03&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-WM03.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">5 Fortune SA</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-WP01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-WP01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Wong Po</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-EG02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-EG02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Emperor Gate</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-EG03&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-EG03.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Emperor Gate SA</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-FC02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-FC02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Big Prosperity</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-FC03&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-FC03.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Big Prosperity SA</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-GS03&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-GS03.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Great Stars</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-GS04&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-GS04.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Great Stars SA</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-GW01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-GW01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Golden Whale</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-IL02&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-IL02.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Adventure Iceland</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-IL03&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-IL03.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Iceland SA</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-DF01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-DF01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Double Fortune</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-DG03&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-DG03.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Dragon Gold</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-DG04&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-DG04.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Dragon Gold SA</div>
                    </a></div>
                  <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer"><a onClick="window.open('https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=id_ID&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=S-BB01&mobile=false&menumode=off', '_blank', 'width=1080, height=700, top=0, left=0')"><img src="https://img.pay4d.info/sg/images/S-BB01.jpg" style="width:200px; border-radius: 10px;">
                      <div style="text-align:center; margin-top:5px">Festive Lion</div>
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
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=BPjIOK1hMrGVbbt%2BdxNjxxsOCHpty8vc5BTcoWepTr0%3D&token=c7m4hYBsWhZdhI0IOvDX8Jlb6ALNyAVXPV3xe2NCdVM%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ion/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=CVHJQBzxOhB1jgQsEsTDiXpptNsbS48VdDKU%2BAe6s7s%3D&token=c7m4hYBsWhZdhI0IOvDX8Jlb6ALNyAVXPV3xe2NCdVM%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ion/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=9l57bFmBoyHTQe0hq4BkLdkRADRjSsdqnOOjbtCoHIo%3D&token=c7m4hYBsWhZdhI0IOvDX8Jlb6ALNyAVXPV3xe2NCdVM%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ion/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sicbo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ion.lk-acc-n1.com/ion/launch/?platform=TABLET&game=zB2nnhRV1NM44ZgoawkjP83Y20eA5HcM4IoeVsuHF8U%3D&token=c7m4hYBsWhZdhI0IOvDX8Jlb6ALNyAVXPV3xe2NCdVM%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://opus-api.lk-acc-n1.com/opus/launch?cookie=WloBMi7K4PJ%2BncjzfVjET8iyEdao9byqJLAedfHCurI%3D&gameType=BA', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/og/images/BA.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://opus-api.lk-acc-n1.com/opus/launch?cookie=WloBMi7K4PJ%2BncjzfVjET8iyEdao9byqJLAedfHCurI%3D&gameType=RO', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/og/images/RO.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://opus-api.lk-acc-n1.com/opus/launch?cookie=WloBMi7K4PJ%2BncjzfVjET8iyEdao9byqJLAedfHCurI%3D&gameType=DC', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=S2YG%2BsvD9Bf1qBqu3YvBKFo3y4U6BUX%2BhNPzX3dmMrM%3D&category=top_games', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/top_games.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Top Games</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=S2YG%2BsvD9Bf1qBqu3YvBKFo3y4U6BUX%2BhNPzX3dmMrM%3D&category=game_shows', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/game_shows.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Game Shows</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=S2YG%2BsvD9Bf1qBqu3YvBKFo3y4U6BUX%2BhNPzX3dmMrM%3D&category=baccarat', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=S2YG%2BsvD9Bf1qBqu3YvBKFo3y4U6BUX%2BhNPzX3dmMrM%3D&category=roulette', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=S2YG%2BsvD9Bf1qBqu3YvBKFo3y4U6BUX%2BhNPzX3dmMrM%3D&category=sicbo', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sicbo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=S2YG%2BsvD9Bf1qBqu3YvBKFo3y4U6BUX%2BhNPzX3dmMrM%3D&category=dragontiger', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/dragontiger.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=S2YG%2BsvD9Bf1qBqu3YvBKFo3y4U6BUX%2BhNPzX3dmMrM%3D&category=blackjack', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/blackjack.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Blackjack</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=S2YG%2BsvD9Bf1qBqu3YvBKFo3y4U6BUX%2BhNPzX3dmMrM%3D&category=poker', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/poker.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Poker</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=S2YG%2BsvD9Bf1qBqu3YvBKFo3y4U6BUX%2BhNPzX3dmMrM%3D&category=bacbo', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/bacbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Bac Bo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=S2YG%2BsvD9Bf1qBqu3YvBKFo3y4U6BUX%2BhNPzX3dmMrM%3D&category=fantan', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/fantan.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Fan Tan</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=S2YG%2BsvD9Bf1qBqu3YvBKFo3y4U6BUX%2BhNPzX3dmMrM%3D&category=andarbahar', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/andarbahar.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Andar Bahar</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=S2YG%2BsvD9Bf1qBqu3YvBKFo3y4U6BUX%2BhNPzX3dmMrM%3D&category=craps', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/evo/images/craps.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Craps</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://evo.lk-acc-n1.com/evo/launch?token=S2YG%2BsvD9Bf1qBqu3YvBKFo3y4U6BUX%2BhNPzX3dmMrM%3D&category=teenpatti', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=QMJmAcsIhF6tA7qMLnidDXV2h%2BRDLVKrjpa2EhtDb30%3D&token=mkEGtM1L%2B0fKjuu0MGcnKJcHBHS7mIi5r1Ioh0ZNjGI%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/sx/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=99Bs6gROQ2Q67I9ms6zMimSuZh0NvBYuFO6MNYZlOXo%3D&token=mkEGtM1L%2B0fKjuu0MGcnKJcHBHS7mIi5r1Ioh0ZNjGI%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/sx/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=QfLytbEwTq9jRioFlydKCzDh2UtW0RwRi5iHkkPxun8%3D&token=mkEGtM1L%2B0fKjuu0MGcnKJcHBHS7mIi5r1Ioh0ZNjGI%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/sx/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">SicBo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://sexy.lk-acc-n1.com/sx/launch.php?game=KQtqHROZsCeUYeMvJ%2FWfwKQh%2BoIX%2FMhUtqSEiUXILHI%3D&token=mkEGtM1L%2B0fKjuu0MGcnKJcHBHS7mIi5r1Ioh0ZNjGI%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DnDIO1iN70Xa2XwpMg3efYuPllrJbs8Vvk%2Bm%2Fdgup3wE%3D%26symbol%3D101%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/101.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Top Games</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DnDIO1iN70Xa2XwpMg3efYuPllrJbs8Vvk%2Bm%2Fdgup3wE%3D%26symbol%3D104%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/104.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat Lobby</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DnDIO1iN70Xa2XwpMg3efYuPllrJbs8Vvk%2Bm%2Fdgup3wE%3D%26symbol%3D102%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/102.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette Lobby</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DnDIO1iN70Xa2XwpMg3efYuPllrJbs8Vvk%2Bm%2Fdgup3wE%3D%26symbol%3D103%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/103.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Blackjack Lobby</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DnDIO1iN70Xa2XwpMg3efYuPllrJbs8Vvk%2Bm%2Fdgup3wE%3D%26symbol%3D1001%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1001.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DnDIO1iN70Xa2XwpMg3efYuPllrJbs8Vvk%2Bm%2Fdgup3wE%3D%26symbol%3D1024%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1024.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Andar Bahar</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DnDIO1iN70Xa2XwpMg3efYuPllrJbs8Vvk%2Bm%2Fdgup3wE%3D%26symbol%3D204%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/204.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Mega Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DnDIO1iN70Xa2XwpMg3efYuPllrJbs8Vvk%2Bm%2Fdgup3wE%3D%26symbol%3D701%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/701.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Mega Sicbo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DnDIO1iN70Xa2XwpMg3efYuPllrJbs8Vvk%2Bm%2Fdgup3wE%3D%26symbol%3D801%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/801.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Mega Wheel</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DnDIO1iN70Xa2XwpMg3efYuPllrJbs8Vvk%2Bm%2Fdgup3wE%3D%26symbol%3D240%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/240.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Power Up Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DnDIO1iN70Xa2XwpMg3efYuPllrJbs8Vvk%2Bm%2Fdgup3wE%3D%26symbol%3D1101%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1101.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sweet Bonanza Candyland</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DnDIO1iN70Xa2XwpMg3efYuPllrJbs8Vvk%2Bm%2Fdgup3wE%3D%26symbol%3D1302%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1302.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Spaceman</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DnDIO1iN70Xa2XwpMg3efYuPllrJbs8Vvk%2Bm%2Fdgup3wE%3D%26symbol%3D1401%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/pp/images/1401.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Boom City</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://pragmaticplay.nahbisa.com/gs2c/playGame.do?key=token%3DnDIO1iN70Xa2XwpMg3efYuPllrJbs8Vvk%2Bm%2Fdgup3wE%3D%26symbol%3D1601%26technologyID%3DH5%26platform%3DWEB%26language%3Den%26cashierUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php%26lobbyUrl%3Dhttps%3A%2F%2Fdavo88imba.com%2Fuserarea.php&stylename=pay4d9_pay4d9', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=0&token=LDVQOkxCKokgby8tvYJJ5EPSpcVInOVd3Rd%2B63sm1dQ%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/hotgames.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Hot Games</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=100&token=LDVQOkxCKokgby8tvYJJ5EPSpcVInOVd3Rd%2B63sm1dQ%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/dragonhall.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">DragonHall</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=106&token=LDVQOkxCKokgby8tvYJJ5EPSpcVInOVd3Rd%2B63sm1dQ%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/quickhall.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">QuickHall</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=102&token=LDVQOkxCKokgby8tvYJJ5EPSpcVInOVd3Rd%2B63sm1dQ%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/multiplay.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">MultiPlay</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=104&token=LDVQOkxCKokgby8tvYJJ5EPSpcVInOVd3Rd%2B63sm1dQ%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/seecardbaccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">SeeCard Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=101&token=LDVQOkxCKokgby8tvYJJ5EPSpcVInOVd3Rd%2B63sm1dQ%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/baccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=105&token=LDVQOkxCKokgby8tvYJJ5EPSpcVInOVd3Rd%2B63sm1dQ%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/sexybaccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sexy Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=110&token=LDVQOkxCKokgby8tvYJJ5EPSpcVInOVd3Rd%2B63sm1dQ%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/insurancebaccarat.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Insurance Baccarat</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=401&token=LDVQOkxCKokgby8tvYJJ5EPSpcVInOVd3Rd%2B63sm1dQ%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/roulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=402&token=LDVQOkxCKokgby8tvYJJ5EPSpcVInOVd3Rd%2B63sm1dQ%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/sexyroulette.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Sexy Roulette</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=201&token=LDVQOkxCKokgby8tvYJJ5EPSpcVInOVd3Rd%2B63sm1dQ%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/sicbo.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">SicBoHiLo</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=301&token=LDVQOkxCKokgby8tvYJJ5EPSpcVInOVd3Rd%2B63sm1dQ%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/dragontiger.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=801&token=LDVQOkxCKokgby8tvYJJ5EPSpcVInOVd3Rd%2B63sm1dQ%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/bullbull.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">BullBull</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=901&token=LDVQOkxCKokgby8tvYJJ5EPSpcVInOVd3Rd%2B63sm1dQ%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
                  <img src="https://img.pay4d.info/ab/images/win3cards.jpg" style="width:200px;border-radius: 10px;border: 1px solid #000; box-shadow:rgba(0,0,0,.1) 0px 2px 5px 5px">
                  <div style="text-align:center; margin-top:5px;">Win3Cards</div>
                </a>
              </div>
              <div style="height:175px; width:222px; float:left; text-align:center; vertical-align:top; cursor:pointer">
                <a onClick="window.open('https://ab.lk-acc-n1.com/ab/launch?game=501&token=LDVQOkxCKokgby8tvYJJ5EPSpcVInOVd3Rd%2B63sm1dQ%3D', '_blank', 'width=1180, height=750, top=0, left=0')">
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
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=1IdwHl5kskBRGY4qhC1GVKJvPmqfgywlH9UEvsGcrzHnhYrMKCLa8%2BeS6dnc2IBtjb01v9a%2BJNq3GRGTYdQ6g9qCYxHWMKVuqynOoxfleu1bEtzGmS7hd9SbwUi7tNydDWwjaMghLPyTCpmdvnMRxN0nsocaPEyF%2B7svdLoOG4gShD8IWC3lFlAYAv5Ta%2FBXTUJqxQjQu1UKdra0R%2FILeg%3D%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_baccarat_playboy_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Playboy Club</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=RCEvn0ymLy1IyXkId2B4Tc3yNirQi2yjLesUEfhXlEk%2BK68ge0ORQ32bj33QUtMIV8A7yALXiNuVNXakGeVQkwNGQWoOEV%2Fv8BN8YmBrP9UXUuh4bIIQJ89SUlBPgnWuTqV%2Bx8hv7JdszEa0Rbst5stsRojA8SDh24dF5nsqlg4%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_baccarat_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Bonus Baccarat</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=DdQIk5DlZO%2BZvMBrdPbxbHxWj9H5G7WeJmmGRcEt4P5bD2wfuxxkFKjnayqqdBPhjHag3tl6gdQyAr5U78BO7M1Ac1nuyZIzY%2BgN1fBdQW6MwrXbKa5wdimbOsNywl3M%2B0LyqDBF6%2FXsWF%2B88XinTlswQCpwv5f8C4KbN0o1mls%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_baccaratnc_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">No Com Bonus Baccarat</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=jsI207VhyyHP5LvfS%2F0e3oo4CBGey8hUEkM%2Br62vG79Gi3iipLCRHLyeE9C52zWdPB52yjwW8B3bi4LhfGvWcGRckSlLxCUlv%2BQQghcQZfsW5e%2FzYgbdal5%2FZxC2%2BclFgtSuEHCl0Q18%2BoJdsuGW34CzsuidLhzswDPTpudK66%2BC5CKCwZT6muNJ%2BhpeM6iiEvHzN7%2Fnp82xj0XQbFlxFg%3D%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_mp_baccarat_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Baccarat</div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=6ftTlGyPXZjZ%2B8u4K%2Bb7S7PDhb0LG6Fo07KKr5hdeccsbfVmEAkfN%2FyENJ3IpeGnLeu8x2jUjctbX7JxS6nJhM%2BWb2%2BntbR0NMyRKZhIKDie54f%2FVOAPVu%2BxMpIvqZTiZbhZyHpQ8tryCZijzJ%2B%2FFyARcCiQhuhKW7dn%2FtxDikA%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
                  <img src="https://img.pay4d.info/mg/images/smg_titaniumlivegames_roulette_200x200.png" style="width:160px; height:160px; border-radius: 10px; border: 3px solid #EEE; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Roulette </div>
                </a>
              </div>
              <div style="height:210px; width:185px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://mg.lk-acc-n1.com?token=%2FLoHDs8LuTudKtwFT985lofNWqu1ER1vI4X53tGKzCjMvnNn4buKJwnlVrmRVwS0s4QHzobBBrsz2BYXXMbaQ%2BLYG4VY4Jj%2FJDfoQD9OaffjRL%2BOVyAE7XzSMPVQO3uq9Isc3ulErPlLPmAWj6vjiH7%2FC19BHmgwauFDKEvJN%2FM%3D&language=id&mobile=no&redirectUrl=', '_blank', 'width=1080, height=700, top=0, left=0')">
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
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=oNTwoTe9k2CaF44jYC4ZFE84uTpeO%2FWEHy%2BeX%2FpIJeU%3D&game=baccarat', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/baccarat.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Baccarat</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=oNTwoTe9k2CaF44jYC4ZFE84uTpeO%2FWEHy%2BeX%2FpIJeU%3D&game=roulette', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/roulette.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Roulette</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=oNTwoTe9k2CaF44jYC4ZFE84uTpeO%2FWEHy%2BeX%2FpIJeU%3D&game=sicbo', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/sicbo.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Sicbo</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=oNTwoTe9k2CaF44jYC4ZFE84uTpeO%2FWEHy%2BeX%2FpIJeU%3D&game=dragontiger', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sbo/images/dragontiger.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=oNTwoTe9k2CaF44jYC4ZFE84uTpeO%2FWEHy%2BeX%2FpIJeU%3D&game=12baccarat', '_blank', 'width=1366, height=900, top=0, left=0')">
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
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=NdYGDHuqC0l8P2iIv8m%2FynvbVmT4TPIfiMpT%2FniiHJg%3D&game=baccarat', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/baccaratlobby.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Baccarat Lobby</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=NdYGDHuqC0l8P2iIv8m%2FynvbVmT4TPIfiMpT%2FniiHJg%3D&game=roulette', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/eroulette.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Roulette</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=NdYGDHuqC0l8P2iIv8m%2FynvbVmT4TPIfiMpT%2FniiHJg%3D&game=croulette', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/croulette.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Sexy Roulette</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=NdYGDHuqC0l8P2iIv8m%2FynvbVmT4TPIfiMpT%2FniiHJg%3D&game=sicbo', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/esicbo.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Sicbo</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=NdYGDHuqC0l8P2iIv8m%2FynvbVmT4TPIfiMpT%2FniiHJg%3D&game=dragontiger', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/edragontiger.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Dragon Tiger</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=NdYGDHuqC0l8P2iIv8m%2FynvbVmT4TPIfiMpT%2FniiHJg%3D&game=pokdeng', '_blank', 'width=1366, height=900, top=0, left=0')">
                  <img src="https://img.pay4d.info/sa/images/epokdeng.jpg" style="width:200px; border-radius: 10px; border: 1px solid #000; box-shadow: 0px 2px 5px 5px rgba(0, 0, 0, 0.1); cursor:pointer">
                  <div style="text-align:center; margin-top:5px;cursor:pointer">Pok Deng</div>
                </a>
              </div>
              <div style="height:170px; width:220px; float:left; text-align:center; vertical-align:top; margin-top:10px">
                <a onClick="window.open('https://sa.lk-acc-n1.com/sa/launch?token=NdYGDHuqC0l8P2iIv8m%2FynvbVmT4TPIfiMpT%2FniiHJg%3D&game=andarbahar', '_blank', 'width=1366, height=900, top=0, left=0')">
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
          <a onClick="window.open('https://ws168.lk-acc-n1.com/ws/launch?token=6A0QwSK6WvGxq%2BPXDo8s7RDCzM%2Fo3wkUGPEQ4rPquyc%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
            <img src="https://img.pay4d.info/wslogo.png" style="cursor: pointer;">
            <div>WS168</div>
          </a>
        </div>

        <div style="clear: both;"></div>

      </div>




      <div id="sport_wrap" class="tab-pane fade in">
        <hr style="margin-top: 5px">
        <div style="margin: 10px 0px 10px 10px; text-align: center; width: 200px; float: left">
          <a onClick="window.open('https://saba.lk-acc-n1.com/?p=d&token=qqFzRzgu2QlNpS9jUxlO%2FbO9QHt05j5005BtnEq2kMs%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
            <img src="https://img.pay4d.info/sabalogo.png" style="cursor: pointer;">
            <div>Saba Sports<BR>[Rasio Credit 1:1000]</div>
          </a>
        </div>

        <div style="margin: 10px 0px 10px 10px; text-align: center; width: 200px; float: left">
          <a onClick="window.open('https://sbo.lk-acc-n1.com/sbo/launch?token=oNTwoTe9k2CaF44jYC4ZFE84uTpeO%2FWEHy%2BeX%2FpIJeU%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
            <img src="https://img.pay4d.info/sbologo.png" style="cursor: pointer;">
            <div>SBO Sports<BR>[Rasio Credit 1:1000]</div>
          </a>
        </div>

        <div style="margin: 10px 0px 10px 10px; text-align: center; width: 200px; float: left">
          <a onClick="window.open('https://tfsport.lk-acc-n1.com/tf/launch?token=OUsrag7Vh1VJnDBICMngJ0%2FFDeav122hP6DfC5M5RwM%3D', '_blank', 'width=1366, height=900, top=0, left=0')">
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
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=F-SF01&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-SF01.png" style="width:160px;">
                      <div style="text-align:center;">Fishing God<br>[Rasio Credit 1:10]</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=F-SF02&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-SF02.png" style="width:160px;">
                      <div style="text-align:center;">Fishing War<br>[Rasio Credit 1:10]</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=F-AH01&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-AH01.png" style="width:160px;">
                      <div style="text-align:center;">Alien Hunter<br>[Rasio Credit 1:10]</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://lobby.silverkirinplay.com/PAY4D/auth/?acctId=Davo88_dimasak&language=en_US&token=DpIFrMNybGrakashDln0Ob2buodc%2BZeKWUPLziGrpdk%3D&game=F-ZP01&mobile=false&menumode=off"><img src="https://img.pay4d.info/sg/images/F-ZP01.png" style="width:160px;">
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
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=S7ciLxC5LHz8y12Homzrg7AOi5ueneQrAVyEOnP5iUQ%3D&gameid=212"><img src="https://img.pay4d.info/jl/images/212.png" style="width:160px;">
                      <div style="text-align:center;">Dinosaur Tycoon II</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=S7ciLxC5LHz8y12Homzrg7AOi5ueneQrAVyEOnP5iUQ%3D&gameid=32"><img src="https://img.pay4d.info/jl/images/32.png" style="width:160px;">
                      <div style="text-align:center;">Jackpot Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=S7ciLxC5LHz8y12Homzrg7AOi5ueneQrAVyEOnP5iUQ%3D&gameid=82"><img src="https://img.pay4d.info/jl/images/82.png" style="width:160px;">
                      <div style="text-align:center;">Happy Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=S7ciLxC5LHz8y12Homzrg7AOi5ueneQrAVyEOnP5iUQ%3D&gameid=119"><img src="https://img.pay4d.info/jl/images/119.png" style="width:160px;">
                      <div style="text-align:center;">All-star Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=S7ciLxC5LHz8y12Homzrg7AOi5ueneQrAVyEOnP5iUQ%3D&gameid=1"><img src="https://img.pay4d.info/jl/images/1.png" style="width:160px;">
                      <div style="text-align:center;">Royal Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=S7ciLxC5LHz8y12Homzrg7AOi5ueneQrAVyEOnP5iUQ%3D&gameid=71"><img src="https://img.pay4d.info/jl/images/71.png" style="width:160px;">
                      <div style="text-align:center;">Boom Legend</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=S7ciLxC5LHz8y12Homzrg7AOi5ueneQrAVyEOnP5iUQ%3D&gameid=74"><img src="https://img.pay4d.info/jl/images/74.png" style="width:160px;">
                      <div style="text-align:center;">Mega Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=S7ciLxC5LHz8y12Homzrg7AOi5ueneQrAVyEOnP5iUQ%3D&gameid=42"><img src="https://img.pay4d.info/jl/images/42.png" style="width:160px;">
                      <div style="text-align:center;">Dinosaur Tycoon</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=S7ciLxC5LHz8y12Homzrg7AOi5ueneQrAVyEOnP5iUQ%3D&gameid=20"><img src="https://img.pay4d.info/jl/images/20.png" style="width:160px;">
                      <div style="text-align:center;">Bombing Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://jili.lk-acc-n1.com/jili/launch?token=S7ciLxC5LHz8y12Homzrg7AOi5ueneQrAVyEOnP5iUQ%3D&gameid=60"><img src="https://img.pay4d.info/jl/images/60.png" style="width:160px;">
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
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=PFXhuIvqJAGUZWff3ou%2FuZZWe4d0jGm8%2B7lGfB5uiGY%3D&gameid=PSF-ON-00006"><img src="https://img.pay4d.info/ps/images/PSF-ON-00006.png" style="width:160px;">
                      <div style="text-align:center;">Fishing Fa Fa Fa</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=PFXhuIvqJAGUZWff3ou%2FuZZWe4d0jGm8%2B7lGfB5uiGY%3D&gameid=PSF-ON-00005"><img src="https://img.pay4d.info/ps/images/PSF-ON-00005.png" style="width:160px;">
                      <div style="text-align:center;">Fishing In Thailand</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=PFXhuIvqJAGUZWff3ou%2FuZZWe4d0jGm8%2B7lGfB5uiGY%3D&gameid=PSF-ON-00004"><img src="https://img.pay4d.info/ps/images/PSF-ON-00004.png" style="width:160px;">
                      <div style="text-align:center;">Fishing Foodie</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=PFXhuIvqJAGUZWff3ou%2FuZZWe4d0jGm8%2B7lGfB5uiGY%3D&gameid=PSF-ON-00003"><img src="https://img.pay4d.info/ps/images/PSF-ON-00003.png" style="width:160px;">
                      <div style="text-align:center;">Zombie Bonus</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=PFXhuIvqJAGUZWff3ou%2FuZZWe4d0jGm8%2B7lGfB5uiGY%3D&gameid=PSF-ON-00002"><img src="https://img.pay4d.info/ps/images/PSF-ON-00002.png" style="width:160px;">
                      <div style="text-align:center;">Spicy Fishing</div>
                    </a></div>
                  <div class="gameList_f" style="height:195px; width:185px; float:left; margin-top:-5px;"><a target="embedgameIframe_f" href="https://ps.lk-acc-n1.com/ps/launch?token=PFXhuIvqJAGUZWff3ou%2FuZZWe4d0jGm8%2B7lGfB5uiGY%3D&gameid=PSF-ON-00001"><img src="https://img.pay4d.info/ps/images/PSF-ON-00001.png" style="width:160px;">
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
                  <div class="gameList_f" style="height:205px; width:185px; float:left; margin-top:-5px; text-align:center; vertical-align:top"><a target="embedgameIframe_f" href="https://fastspin.lk-acc-n1.com/fs/launch?token=6VRmMAmtDtidU6sgVt%2FBzkMBQJSNAD9gKtFb7vpyaMI%3D&game=F-FT01"><img src="https://img.pay4d.info/fs/images/F-FT01.jpg" style="width:155px;">
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