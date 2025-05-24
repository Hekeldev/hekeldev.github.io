<ul class="nav nav-tabs grabgtab" style="margin-bottom:0px; font-size:15px; font-weight:bold; margin-top:0px;">

    <li class=" text-center active " style="width:8%; text-align:center;" onClick="location.href='userarea.php?page=statement&head=home'"><a data-toggle="tab" href="#dashboard_wrap" style="padding-left: 0px; padding-right:0px"><span><img src="https://img.pay4d.info/tab-home-w.png" width="25" alt="" style="padding:3px" /><BR>&nbsp;</span></a></li>

    <li class="" style="width:15%; text-align:center;" onClick="location.href='userarea.php?page=login&head=home'"><a data-toggle="tab" href="#toto_wrap"><span><img src="https://img.pay4d.info/tab-toto-w.png" width="25" alt="" /><br>Togel</span></a>


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

    <div id="dashboard_wrap" class="tab-pane fade in active">
        <div class="row" style="margin-bottom:0px">
            <div class="col-xs-3" style="padding-right:2px">
                <a class="btn btn-default btn-block " href="userarea.php?page=statement&head=home"><span class="glyphicon glyphicon-calendar"></span>Statement</a>
            </div>
            <div class="col-xs-3" style="padding-right:1px; padding-left: 1px;">
                <a class="btn btn-default btn-block " href="userarea.php?page=history&head=home"><span class="glyphicon glyphicon-calendar"></span>History</a>
            </div>
            <div class="col-xs-3" style="padding-right:1px; padding-left: 2px;">
                <a class="btn btn-default btn-block " active href="userarea.php?page=memo&head=home"><span class="glyphicon glyphicon-edit"></span>Memo<span class="badge badgeTotal" style="margin-left:5px; margin-right:10px; font-size:9px; font-weight:bold"></span></a>
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
                <a class="btn btn-default btn-block " href="userarea.php?page=myaccount&head=home"><span class="glyphicon glyphicon-user"></span>Password</a>
            </div>
        </div>


        <ul class="nav nav-tabs">
            <li><a data-toggle="tab" href="#memo-tulis"><span class="glyphicon glyphicon-edit"></span>Tulis Memo</a></li>
            <li class="active" id="nav-memo"><a data-toggle="tab" href="#memo-inbox"><span class="glyphicon glyphicon-import"></span>Inbox</a></li>
            <li><a data-toggle="tab" href="#memo-sent"><span class="glyphicon glyphicon-export"></span>Sent</a></li>
        </ul>

        <div class="tab-content">
            <div id="" class="tab-pane fade">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong><span class="glyphicon glyphicon-tasks"></span>Tulis</strong></div>
                    <div class="panel-body">
                        <form class="form-group-sm tulis_form" method="post">
                            <table class="table table-striped form-group-sm" style="margin-bottom:0px">
                                <tbody>
                                    <tr>
                                        <td style="width:150px">Subject</td>
                                        <td>
                                            <select class="form-control tulis_subject" name="subject">
                                                <option value="">Pilih Subject</option>
                                                <option value="Perihal Member Baru">Perihal Member Baru</option>
                                                <option value="Perihal Deposit">Perihal Deposit</option>
                                                <option value="Perihal Withdraw">Perihal Withdraw</option>
                                                <option value="Masalah Umum">Masalah Umum</option>
                                                <option value="Perubahan Data">Perubahan Data</option>
                                                <option value="Pengaduan Layanan">Pengaduan Layanan</option>
                                                <option value="Lain-lain">Lain-lain</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Memo</td>
                                        <td><textarea class="tulis_memo" style="height:100px" name="memo"></textarea></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td><input type="button" class="form-control btn btn-info kirim" value="Kirim" style="width:200px">
                                            <input type="hidden" name="task" value="tulis">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div id="" class="tab-pane fade in active">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong><span class="glyphicon glyphicon-tasks"></span>Memo</strong></div>
                    <div class="panel-body">

                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Subject</th>

                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <ul class="pagination"></ul>
                <script>
                    $(document).ready(function() {
                        $('[data-toggle="tooltip"]').tooltip();
                    });
                </script>
            </div>
            <div id="" class="tab-pane fade">
                <div class="panel panel-default">
                    <div class="panel-heading"><strong><span class="glyphicon glyphicon-tasks"></span>Memo</strong></div>
                    <div class="panel-body">

                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Subject</th>

                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <ul class="pagination"></ul>
                <script>
                    $(document).ready(function() {
                        $('[data-toggle="tooltip"]').tooltip();
                    });
                </script>
            </div>
        </div>
        <a class="btn btn-primary btn-block" href="userarea.php?page=login&head=home" role="button" style="font-weight:bold; margin-top:20px"><span class="glyphicon glyphicon-menu-left"></span>Kembali</a>
        <script>
            $(document).ready(function() {
                getMemo();
            });
        </script>


        

        <a class="btn btn-danger btn-block" href="../logout.php" role="button" style="font-weight:bold; margin-top:20px"><span class="glyphicon glyphicon-menu-left"></span>Log out</a>

    </div>





    <div id="games_wrap" class="tab-pane fade in ">

    














</div>