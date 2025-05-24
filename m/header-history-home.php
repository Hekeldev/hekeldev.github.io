<?php


// Periksa apakah pengguna telah login
if (!isset($_SESSION['username'])) {
    // Jika pengguna belum login, redirect ke halaman login
    header('Location: ../index.php');
    exit;
}

// Ambil informasi pengguna dari database
$username = $_SESSION['username'];
$queryUser = "SELECT * FROM users WHERE username='$username'";
$resultUser = mysqli_query($conn, $queryUser);
$user = mysqli_fetch_assoc($resultUser);

// Ambil saldo pengguna dari database
$userId = $user['id'];
$queryBalance = "SELECT SUM(amount) AS balance FROM deposits WHERE user_id='$userId' AND status='Approved'";
$resultBalance = mysqli_query($conn, $queryBalance);
$balance = mysqli_fetch_assoc($resultBalance)['balance'];

// Mengubah format saldo menjadi IDR
$formattedBalance = '' . number_format($balance, 0, ',', ',');

// Mengambil data deposit yang sedang pending dan approved dengan urutan terbalik
// Modify your SQL query to include a LIMIT clause
$queryDeposits = "SELECT * FROM deposits WHERE user_id='$userId' AND (status='Pending' OR status='Approved') ORDER BY created_at DESC LIMIT 10";

$resultDeposits = mysqli_query($conn, $queryDeposits);

$queryBankOptions = "SELECT * FROM bank_options";
$resultBankOptions = mysqli_query($conn, $queryBankOptions);
// Inisialisasi array untuk menyimpan data opsi bank
$bankOptionsData = [];

// Loop melalui hasil query dan simpan data opsi bank dalam array
while ($bankOption = mysqli_fetch_assoc($resultBankOptions)) {
    $bankOptionsData[] = $bankOption;
}

?>



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
                <a class="btn btn-default btn-block active" href="userarea.php?page=history&head=home"><span class="glyphicon glyphicon-calendar"></span>History</a>
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
                <a class="btn btn-default btn-block " href="userarea.php?page=myaccount&head=home"><span class="glyphicon glyphicon-user"></span>Password</a>
            </div>
        </div>

        <div id="transaksi">
            <div class="content" style="margin:0px !important; width:100% !important">
                <div class="panel panel-danger">
                    <div class="panel-heading"><strong><span class="glyphicon glyphicon-tasks"></span>History Deposit</strong>
                        <span style="float:right; margin-top:-4px; width:245px; display:inline">
                            <form class="form-group-sm">
                                <label style="float:left; margin-top:5px; margin-right:10px;">Filter</label>
                                <select class="form-control" id="historyfilter" style="width:200px; float:right">
                                    <option value="">Semua</option>



                                </select>
                            </form>
                        </span>
                    </div>
                    <div class="panel-body" style="font-size:11px">

                        <table class="table table-striped table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th style="width:25px">No</th>
                                    <th style="width:70px">Tanggal</th>
                                    <th style="width:70px">Pasaran</th>
                                    <th>Deskripsi</th>
                                    <th style="width:70px; text-align:right">+/-</th>
                                    <th style="width:70px; text-align:right">Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 1;
                                $approvedCounter = 1; // Menambahkan counter untuk baris dengan status Approved
                                while ($row = mysqli_fetch_assoc($resultDeposits)) {
                                    $amount = $row['amount'];
                                    $formattedAmount = number_format($amount, 0, ',', ','); // Menggunakan titik sebagai pemisah ribuan
                                    $status = $row['status'];
                                    $created_at = $row['created_at'];
                                    $destination = $row['destination'];

                                    echo '<tr>';
                                    echo '<td>' . $counter . '</td>';
                                    echo '<td class="text-success" style="vertical-align:middle">' . $created_at . '</td>';
                                    echo '<td class="text-info" style="vertical-align:middle"></td>';

                                    // Tambahkan kondisi untuk menampilkan status deposit yang sesuai
                                    if ($status == 'Approved') {
                                        echo '<td style="vertical-align:middle"><strong>Deposit: APPROVED ' . $destination . ' (' . $formattedAmount . ')</strong></td>';
                                    } elseif ($status == 'Rejected') {
                                        echo '<td style="vertical-align:middle"><strong>Deposit: REJECTED ' . $destination . ' (' . $formattedAmount . ')</strong></td>';
                                    } else {
                                        echo '<td style="vertical-align:middle"><strong>Deposit: PROGRESS ' . $destination . ' (' . $formattedAmount . ')</strong></td>';
                                    }

                                    echo '<td align="right" class="text-default" style="vertical-align:middle">0</td>';
                                    echo '<td align="right" class="text-warning" style="vertical-align:middle">0</td>';
                                    echo '</tr>';

                                    // Tampilkan informasi histori deposit jika status adalah "REJECTED"
                                    if ($status == 'Rejected') {
                                        $depositId = $row['id'];
                                        $queryHistory = "SELECT * FROM user_activity WHERE activity_type='Deposit' AND activity_details LIKE '%$depositId%'";
                                        $resultHistory = mysqli_query($conn, $queryHistory);

                                        echo '<tr>';
                                        echo '<td></td>';
                                        echo '<td colspan="5">';
                                        echo '<strong>Histori Deposit:</strong><br>';
                                        if (mysqli_num_rows($resultHistory) > 0) {
                                            while ($history = mysqli_fetch_assoc($resultHistory)) {
                                                echo $history['activity_details'] . '<br>';
                                            }
                                        } else {
                                            echo 'Tidak ada histori untuk deposit ini.';
                                        }
                                        echo '</td>';
                                        echo '</tr>';
                                    }

                                    $counter++;
                                }
                                ?>
                            </tbody>




                        </table>



                    </div>
                </div>

                <ul class="pagination">
                    <li class="active"><a href="javascript:getTransaksi(1)">1</a></li>
                </ul>
                <script>
                    $(document).ready(function() {
                        $('[data-toggle="tooltip"]').tooltip();
                    });
                </script>
            </div>
        </div>





        <div id="transaksi">
            <div class="content" style="margin:0px !important; width:100% !important">
                <div class="panel panel-danger">
                    <div class="panel-heading"><strong><span class="glyphicon glyphicon-tasks"></span>History Withdraw</strong>
                        <span style="float:right; margin-top:-4px; width:245px; display:inline">
                            <form class="form-group-sm">
                                <label style="float:left; margin-top:5px; margin-right:10px;">Filter</label>
                                <select class="form-control" id="historyfilter" style="width:200px; float:right">
                                    <option value="">Semua</option>



                                </select>
                            </form>
                        </span>
                    </div>
                    <div class="panel-body" style="font-size:11px">

                        <table class="table table-striped table-hover" width="100%">
                            <thead>
                            
                                <tr>
                                    <th style="width:25px">ID</th>
                                    <th style="width:70px">Tanggal</th>
                                    <th style="width:70px">Pasaran</th>
                                    <th>Deskripsi</th>
                                    <th style="width:70px; text-align:right">+/-</th>
                                    <th style="width:70px; text-align:right">Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while ($withdraw = mysqli_fetch_assoc($resultWithdraws)) { ?>
                               
                                
                                <tr>
                                <td><?php echo $withdraw['id']; ?></td>
                                <td class="text-success" style="vertical-align:middle"><?php echo $withdraw['created_at']; ?></td>
                                <td class="text-info" style="vertical-align:middle"></td>
                                <td class="text-info" style="vertical-align:middle"><strong>Withdraw: <?php echo $withdraw['status']; ?> <?php echo $user['bank_name']; ?> (<?php echo number_format($withdraw['amount'], 0, ',', ','); ?>)</strong></td>
                                <td align="right" class="text-default" style="vertical-align:middle">0</td>
                                <td align="right" class="text-warning" style="vertical-align:middle">0</td>
                                
                                </tr>
                                <?php } ?>
                                
                              
                            </tbody>




                        </table>



                    </div>
                </div>

                <ul class="pagination">
                    <li class="active"><a href="javascript:getTransaksi(1)">1</a></li>
                </ul>
                <script>
                    $(document).ready(function() {
                        $('[data-toggle="tooltip"]').tooltip();
                    });
                </script>
            </div>
        </div>




        <a class="btn btn-danger btn-block" href="../logout.php" role="button" style="font-weight:bold; margin-top:20px"><span class="glyphicon glyphicon-menu-left"></span>Log out</a>

    </div>





    <div id="games_wrap" class="tab-pane fade in ">
















    </div>