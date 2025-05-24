<ul class="nav nav-tabs grabgtab" style="margin-bottom:0px; font-size:15px; font-weight:bold; margin-top:0px;">

    <li class=" text-center active" style="width:8%; text-align:center;" onclick="location.href='?statement&amp;head=home'"><a data-toggle="tab" href="#dashboard_wrap" style="padding-left: 0px; padding-right:0px"><span><img src="https://img.pay4d.info/tab-home-w.png" width="25" alt="" style="padding:3px"><br>&nbsp;</span></a></li>

    <li class="" style="width:15%; text-align:center;" onclick="location.href='?toto&amp;head=toto'"><a data-toggle="tab" href="#toto_wrap"><span><img src="https://img.pay4d.info/tab-toto-w.png" width="25" alt=""><br>Togel</span></a>


    </li>
    <li class="" style="width:15%; text-align:center;" onclick="location.href='?games&amp;head=games&amp;gid=pp'"><a data-toggle="tab" href="#games_wrap"><span><img src="https://img.pay4d.info/tab-slot-w.png" width="25" alt=""><br>Slot</span></a>


    </li>


    <li class="" style="width:15%; text-align:center;" onclick="location.href='?livecasino&amp;head=livecasino&amp;lid=pplc'"><a data-toggle="tab" href="#livegames_wrap"><span><img src="https://img.pay4d.info/tab-livegame-w.png" width="25" alt=""><br>Casino</span></a>


    </li>
    <li class="" style="width:15%; text-align:center;" onclick="location.href='?sport&amp;head=sport'"><a data-toggle="tab" href="#sport_wrap"><span><img src="https://img.pay4d.info/tab-sport-w.png" width="25" alt=""><br>Sport</span></a>

        <span style="position:absolute; margin-top:-70px; margin-left:10px;"><img src="https://img.pay4d.info/joy.png" height="16" alt=""></span>

    </li>

    <li class="" style="width:15%; text-align:center;" onclick="location.href='?fishing&amp;head=fishing'"><a data-toggle="tab" href="#fishing_wrap"><span><img src="https://img.pay4d.info/tab-tembakikan-w.png" width="25" alt=""><br>Arcade</span></a>

    </li>

    <li class="" style="width:15%; text-align:center;" onclick="location.href='?sabung&amp;head=sabung'"><a data-toggle="tab" href="#sabung_wrap"><span><img src="https://img.pay4d.info/tab-sabung-w.png" width="25" alt=""><br>Sabung</span></a>

        <span style="position:absolute; margin-top:-85px; margin-left:-20px;"><img src="https://img.pay4d.info/new2.png" width="40" alt=""></span>
    </li>
</ul>
<div style="height:10px; background-color:#FFF" class="grabgtabbottom"></div>

<div class="tab-content">

<div id="dashboard_wrap" class="tab-pane fade in active">
        <div class="row" style="margin-bottom:0px">
            <div class="col-xs-3" style="padding-right:2px">
                <a class="btn btn-default btn-block " href="userarea.php?page=statement&head=home"><span class="glyphicon glyphicon-calendar"></span>Statement</a>
            </div>
            <div class="col-xs-3" style="padding-right:1px; padding-left: 1px;">
                <a class="btn btn-default btn-block " href="userarea.php?page=history&head=home"><span class="glyphicon glyphicon-calendar"></span>History</a>
            </div>
            <div class="col-xs-3" style="padding-right:1px; padding-left: 2px;">
                <a class="btn btn-default btn-block " href="userarea.php?page=memo&head=home"><span class="glyphicon glyphicon-edit"></span>Memo<span class="badge badgeTotal" style="margin-left:5px; margin-right:10px; font-size:9px; font-weight:bold"></span></a>
            </div>
            <div class="col-xs-3" style="padding-left:2px">
                <a class="btn btn-default btn-block " href="userarea.php?page=referal&head=home"><span class="glyphicon glyphicon-user"></span>Referal</a>
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-xs-3" style="padding-right:2px">
                <a class="btn btn-default btn-block " href="userarea.php?page=deposit&head=home"><span class="glyphicon glyphicon-import"></span>Deposit</a>
            </div>
            <div class="col-xs-3" style="padding-left:1px; padding-right:1px;">
                <a class="btn btn-default btn-block " href="userarea.php?page=withdraw&head=home"><span class="glyphicon glyphicon-export"></span>Withdraw</a>
            </div>
            <div class="col-xs-3" style="padding-left:2px; padding-right:1px">
                <a class="btn btn-default btn-block " href="userarea.php?page=rekening&head=home"><span class="glyphicon glyphicon-briefcase"></span>Rekening<span style="position:absolute; font-size: 10px; margin-top: -8px; margin-left:-85px">⭐</span></a>
            </div>
            <div class="col-xs-3" style="padding-left:2px">
                <a class="btn btn-default btn-block active" href="userarea.php?page=myaccount&head=home"><span class="glyphicon glyphicon-user"></span>Password</a>
            </div>
        </div>

        <div id="statusPassword"></div>
        <div id="pass_form">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <strong><span class="glyphicon glyphicon-pencil"></span>UBAH PASSWORD</strong>
                </div>
                <div class="panel-body" style="padding:10px">
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
                        <input type="button" class="btn btn-success btn-block" id="change_password" value="Ganti Password">
                    </form>
                </div>
            </div>
        </div>


        

        <a class="btn btn-danger btn-block" href="../logout.php" role="button" style="font-weight:bold; margin-top:20px"><span class="glyphicon glyphicon-menu-left"></span>Log out</a>

    </div>





    <div id="games_wrap" class="tab-pane fade in ">

    














</div>