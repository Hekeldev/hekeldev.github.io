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
                <a class="btn btn-default btn-block " href="userarea.php?page=memo&head=home"><span class="glyphicon glyphicon-edit"></span>Memo<span class="badge badgeTotal" style="margin-left:5px; margin-right:10px; font-size:9px; font-weight:bold"></span></a>
            </div>
            <div class="col-xs-3" style="padding-left:2px">
                <a class="btn btn-default btn-block " href="userarea.php?page=referal&head=home"><span class="glyphicon glyphicon-user"></span>Referal</a>
            </div>
        </div>
        <div class="row" style="margin-bottom:10px">
            <div class="col-xs-3" style="padding-right:2px">
                <a class="btn btn-default btn-block active" href="userarea.php?page=deposit&head=home"><span class="glyphicon glyphicon-import"></span>Deposit</a>
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

        <div id="loading" style="display: none;">
            <img src="loading.gif" width="36px" alt="Loading...">
        </div>

        <div id="content" style="display: none;">
            <!-- Isi konten di sini -->
            <?php
            // Periksa apakah ada deposit Pending untuk pengguna yang sedang login
            $queryPendingDeposit = "SELECT * FROM deposits WHERE status='Pending' AND user_id = '$userId'";
            $resultPendingDeposit = mysqli_query($conn, $queryPendingDeposit);
            if (mysqli_num_rows($resultPendingDeposit) > 0) {
                // Jika deposit sedang pending, tampilkan form dengan status depositnya
                $depositData = mysqli_fetch_assoc($resultPendingDeposit);
            ?>
                <div id="statusDeposit"></div>
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <strong><span class="glyphicon glyphicon-import"></span>DEPOSIT</strong>
                    </div>
                    <div class="panel-body">
                        <p>Deposit sedang dalam proses. Mohon tunggu hingga deposit selesai diproses.</p>
                        <!-- Tampilkan status deposit atau detail deposit lainnya -->
                        <p>Status Deposit: <?php echo $depositData['status']; ?></p>
                        <!-- Tampilkan informasi lain yang relevan mengenai deposit -->
                    </div>
                </div>
            <?php
            } else {
                // Jika tidak ada deposit Pending, tampilkan form
            ?>
                <div id="statusDeposit"></div>
                <div id="deposit_form">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <strong><span class="glyphicon glyphicon-import"></span>DEPOSIT</strong>
                        </div>
                        <div class="panel-body">
                            <?php

                            ?>
                            <form action="userarea.php?submitDeposit" class="form-group-sm deposit_form" method="post">
                                <div class="form-group">
                                    <label>Rekening Asal</label>
                                    <select class="form-control rekasal" name="bankasal">
                                        <option value="339497" selected="" att="5"><?php echo $user['bank_name']; ?> <?php echo $user['acc_no']; ?> <?php echo $user['fullname']; ?></option>
                                    </select>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        $('#jumlah_deposit').focus();


                                        $(document).on("change", ".rektujuan", function() {
                                            var bank = $(this).val()
                                            var nr = $('.rektujuan option[value=' + bank + ']').attr('rek');
                                            if (nr != '') $('#norek').val(nr);

                                            $('.qrimg').each(function() {
                                                var id = $(this).attr('att');
                                                $('.qrimg' + id).hide();
                                            });

                                            $('.qrimg' + bank).show();


                                        });

                                        $(document).on("change", ".rekasal", function() {
                                            var ra = $('.rekasal').val();
                                            var oa = $('.rekasal option[value=' + ra + ']').attr('att');
                                            if (oa != '') $('.rektujuan').val(oa);

                                            var nr = $('.rektujuan option[value=' + oa + ']').attr('rek');
                                            if (nr != '') $('#norek').val(nr);

                                            $('#notesalin').hide();

                                            $('.qrimg').each(function() {
                                                var id = $(this).attr('att');
                                                $('.qrimg' + id).hide();
                                            });

                                            $('.qrimg' + oa).show();

                                        });
                                    });
                                </script>
                                <div class="form-group">
                                    <label>Rekening Tujuan Deposit</label><a title="Salin No Rekening" href="javascript:salinnorek();" style="text-decoration: underline;"><span style="float: right;"><span class="glyphicon glyphicon-duplicate" style="margin-left: 20px"></span><u>Salin</u></span></a><span id="notesalin" style="float: right; display: none;" class="text-success">Berhasil disalin!</span>
                                    <select class="form-control rektujuan" name="destination">
                                        <?php foreach ($bankOptionsData as $bankOption) : ?>

                                            <option value="<?php echo $bankOption['value']; ?>" att="" rek="<?php echo $bankOption['att']; ?>"><?php echo $bankOption['value']; ?> <?php echo $bankOption['att']; ?> A/N <?php echo $bankOption['rek']; ?></option>

                                        <?php endforeach; ?>
                                    </select>
<br>
                                    <div class="form-group">
                                        <label>Bonus Deposit</label>
                                        <select class="form-control rektujuan" name="listOptions"> <!-- Ubah atribut name menjadi "listOptions" -->
                                            <?php foreach ($listPromoOptionsData as $listOption) : ?>
                                                <option value="<?php echo $listOption['id']; ?>"><?php echo $listOption['list_promo']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>



                                    <input type="text" id="norek" value="" style="position: absolute; z-index: -999; opacity: 0;">
                                    <div class="rows">
                                        <div id="nonqr" class="col-xs-8" style="padding: 0px;width:100%">
                                            <div class="well well-sm" style="margin-top: 15px; margin-bottom:10px">
                                                Untuk Deposit ke Rekening atau Emoney Berbeda,<br>Silakan tambahkan akun anda di menu <span class="glyphicon glyphicon-briefcase" style="margin-left: 5px"></span>Rekening
                                            </div>
                                            <div class="form-group">
                                                <label>Jumlah</label><input type="text" inputmode="numeric" class="form-control text-right" name="amount" style="font-weight:bold" id="amount">
                                            </div>
                                            <div class="form-group" id="input_pengirim" style="display:none">
                                                <label>Catatan: Nomor Pengirim / Kode SN / Nominal Unik</label><input type="text" class="form-control" maxlength="24" placeholder="max 24 karakter (harus diisi)" name="pengirim" style="font-weight:bold" id="pengirim">
                                            </div>
                                            <div class="form-group" id="input_catatan">
                                                <label>Catatan: Nomor Rekord / Referensi</label><input type="text" class="form-control" maxlength="24" placeholder="max 24 karakter (bila diperlukan)" name="catatan" style="font-weight:bold" id="catatan">
                                            </div>

                                            <input type="hidden" name="task" value="deposit">
                                            <input type="hidden" id="note" value="b">
                                            <button class="btn btn-info btn-block" type="submit" name="submitDeposit">Konfirmasi Deposit</button>

                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

        <script>
            // Menampilkan animasi loading GIF
            document.getElementById("loading").style.display = "block";

            // Menunggu selama 2 detik sebelum menampilkan konten
            setTimeout(function() {
                // Sembunyikan animasi loading GIF
                document.getElementById("loading").style.display = "none";

                // Tampilkan konten
                document.getElementById("content").style.display = "block";
            }, 1000);
        </script>







        <a class="btn btn-primary btn-block" href="userarea.php?page=login&head=home" role="button" style="font-weight:bold; margin-top:20px"><span class="glyphicon glyphicon-menu-left"></span>Kembali</a>






    </div>





    <div id="games_wrap" class="tab-pane fade in ">

    </div>










    <a class="btn btn-danger btn-block" href="javascript:logout();" role="button" style="font-weight:bold; margin-top:20px"><span class="glyphicon glyphicon-menu-left"></span>Log out</a>



</div>



</div>