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
                <a class="btn btn-default btn-block active" href="userarea.php?page=withdraw&head=home"><span class="glyphicon glyphicon-export"></span>Withdraw</a>
            </div>
            <div class="col-xs-3" style="padding-left:2px; padding-right:1px">
                <a class="btn btn-default btn-block " href="userarea.php?page=rekening&head=home"><span class="glyphicon glyphicon-briefcase"></span>Rekening<span style="position:absolute; font-size: 10px; margin-top: -8px; margin-left:-85px">⭐</span></a>
            </div>
            <div class="col-xs-3" style="padding-left:2px">
                <a class="btn btn-default btn-block " href="userarea.php?page=myaccount&head=home"><span class="glyphicon glyphicon-user"></span>Password</a>
            </div>
        </div>


    <div id="statusWithdraw"></div>
    <div id="withdraw_form">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <strong><span class="glyphicon glyphicon-export"></span>WITHDRAW</strong>
            </div>
            <div class="panel-body">
                <form class="form-group-sm withdraw_form" method="post">

                    <div class="form-group">
                        <label>Rekening Withdraw</label>
                        <input type="text" class="form-control" readonly="" value="<?php echo $user['bank_name']; ?> <?php echo $user['acc_no']; ?> <?php echo $user['fullname']; ?>">

                    </div>
                    <div class="form-group">
                        <label for="withdrawAmount">Jumlah</label><input type="number" class="form-control text-right" name="withdrawAmount" id="withdrawAmount" min="10000" style="font-weight:bold" required>
                    </div>
                    <div class="form-group" id="input_catatan">
                        <label>Catatan: </label><input type="text" class="form-control" placeholder="max 24 karakter (bila diperlukan)" maxlength="24" name="catatan" style="font-weight:bold" id="catatan">
                    </div>
                    <button type="submit" class="btn btn-info btn-block" name="submitWithdraw">Request Withdraw</button>
                </form>

            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#jumlah_withdraw').focus();
        });
    </script>

    <a class="btn btn-primary btn-block" href="?withdraw&amp;head=home" role="button" style="font-weight:bold; margin-top:20px"><span class="glyphicon glyphicon-menu-left"></span>Kembali</a>