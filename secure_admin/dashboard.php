<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">

            </div>
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">

    </div>
    <div class="col-6 col-sm-6 col-lg-3">
        <div class="card tilebox-one">
            <div class="card-body">
                <i class="uil uil-users-alt float-end"></i>
                <h3 class="text-uppercase mt-0 font-14">Total Pengguna</h3>
                <h2 class="my-2" id="active-users-count"><?php echo $totalUsers; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-6 col-lg-3">
        <div class="card tilebox-one">
            <div class="card-body">
                <i class="uil uil-users-alt float-end"></i>
                <h3 class="text-uppercase mt-0 font-14">Admin</h3>
                <h2 class="my-2" id="active-users-count"><?php echo $totalAdmin; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-6 col-lg-3">
        <div class="card tilebox-one">
            <div class="card-body">
                <i class="uil uil-users-alt float-end"></i>
                <h3 class="text-uppercase mt-0 font-14">Total Aktif Pengguna</h3>
                <h2 class="my-2" id="active-users-count"><?php echo $totalActiveUsers; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-6 col-lg-3">
        <div class="card tilebox-one">
            <div class="card-body">
                <i class="uil uil-users-alt float-end"></i>
                <h3 class="text-uppercase mt-0 font-14">Total Banned Pengguna</h3>
                <h2 class="my-2" id="active-users-count"><?php echo $totalBannedUsers; ?></h2>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-4 col-lg-4">
        <div class="card widget-flat">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-cash-check widget-icon bg-primary-lighten text-primary"></i>
                </div>
                <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Total Balance Member</h5>
                <h3 class="mt-3 mb-3"><?php echo $formattedTotalBalance; ?></h3>
                <p class="mb-0 text-muted">
                    <!-- <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 7.00%</span> -->
                    <span class="text-nowrap">Hari ini</span>
                </p>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <div class="col-6 col-sm-4 col-lg-4">
        <div class="card widget-flat">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-cash-lock-open widget-icon bg-primary-lighten text-primary"></i>
                </div>
                <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Total Pending Deposit</h5>
                <h3 class="mt-3 mb-3"><?php echo $formattedTotalPendingDeposit; ?></h3>
                <p class="mb-0 text-muted">
                    <!-- <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 7.00%</span> -->
                    <span class="text-nowrap">Hari ini</span>
                </p>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <div class="col-6 col-sm-4 col-lg-4">
        <div class="card widget-flat">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-cash-lock widget-icon bg-primary-lighten text-primary"></i>
                </div>
                <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Total Deposit Masuk Hari Ini</h5>
                <h3 class="mt-3 mb-3"><?php echo $formattedTotalDeposit; ?></h3>
                <p class="mb-0 text-muted">
                    <!-- <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 7.00%</span> -->
                    <span class="text-nowrap">Hari ini</span>
                </p>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>

    <div class="col-6 col-sm-4 col-lg-4">
        <div class="card widget-flat">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-cash widget-icon bg-info-lighten text-info"></i>
                </div>
                <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Total Withdraw Pending</h5>
                <h3 class="mt-3 mb-3">Rp. 0</h3>
                <p class="mb-0 text-muted">
                    <!-- <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 7.00%</span> -->
                    <span class="text-nowrap">Hari ini</span>
                </p>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    <div class="col-6 col-sm-4 col-lg-4">
        <div class="card widget-flat">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-cash-minus widget-icon bg-info-lighten text-info"></i>
                </div>
                <h5 class="text-muted fw-normal mt-0" title="Average Revenue">Total Withdraw Masuk Hari Ini</h5>
                <h3 class="mt-3 mb-3">Rp. 0</h3>
                <p class="mb-0 text-muted">
                    <!-- <span class="text-danger me-2"><i class="mdi mdi-arrow-down-bold"></i> 7.00%</span> -->
                    <span class="text-nowrap">Hari ini</span>
                </p>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
    
    </div>
</div>

<div class="row">
    <div class="col-xl-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="header-title">LAST 10 DEPOSIT USER</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-centered table-nowrap table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Deposit ID</th>
                                <th>User ID</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Ambil 10 deposit terbaru dari database
                            $queryRecentDeposits = "SELECT * FROM deposits ORDER BY created_at DESC LIMIT 10";
                            $resultRecentDeposits = mysqli_query($conn, $queryRecentDeposits);

                            // Periksa apakah ada deposit yang ditemukan
                            if (mysqli_num_rows($resultRecentDeposits) > 0) {
                                // Tampilkan data deposit
                                while ($row = mysqli_fetch_assoc($resultRecentDeposits)) {
                                    $depositId = $row['id'];
                                    $userId = $row['user_id'];
                                    $amount = $row['amount'];
                                    $status = $row['status'];
                                    $createdAt = $row['created_at'];

                                    // Tampilkan baris deposit dalam tabel
                                    echo "<tr>";
                                    echo "<td>$depositId</td>";
                                    echo "<td>$userId</td>";
                                    echo "<td>$amount</td>";
                                    echo "<td>$status</td>";
                                    echo "<td>$createdAt</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='5'>Tidak ada deposit yang ditemukan.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div> <!-- end table-responsive-->
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col-->
</div> <!-- end row-->

<div class="col-xl-6 col-lg-6">
    <div class="card">
        <div class="card-header">
            <h4 class="header-title">LAST 10 ADMIN LOGIN</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-centered table-nowrap table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Username</th>
                            <th>Last Login</th>
                            <th>Last IP</th>
                            <th>Device</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        

                        // Query untuk mengambil informasi last login dan last IP
                        $query = "SELECT username, last_login, last_ip, device FROM users WHERE level='admin' OR level='superadmin' ORDER BY last_login DESC LIMIT 10";
                        $result = mysqli_query($conn, $query);

                        // Loop untuk menampilkan data
                        while ($row = mysqli_fetch_assoc($result)) {
                            $username = $row['username'];
                            $lastLogin = $row['last_login'];
                            $lastIP = $row['last_ip'];
                            $device = $row['device'];

                            echo "<tr>";
                            echo "<td>$username</td>";
                            echo "<td>$lastLogin</td>";
                            echo "<td>$lastIP</td>";
                            echo "<td>$device</td>";
                            echo "</tr>";
                        }

                        // Bebaskan memori hasil query
                        mysqli_free_result($result);

                        // Tutup koneksi ke database
                        mysqli_close($conn);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- <div class="col-6 col-sm-6 col-lg-3">
        <div class="card tilebox-one">
            <div class="card-body">
                <h3 class="text-uppercase mt-0 font-14">Total Produk</h3>
                <h2 class="my-2" id="active-users-count">8</h2>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-6 col-lg-3">
        <div class="card tilebox-one">
            <div class="card-body">
                <h3 class="text-uppercase mt-0 font-14">Total Stock</h3>
                <h2 class="my-2" id="active-users-count">1799</h2>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-6 col-lg-3">
        <div class="card tilebox-one">
            <div class="card-body">
                <h3 class="text-uppercase mt-0 font-14">Total Terjual</h3>
                <h2 class="my-2" id="active-users-count">242</h2>
            </div>
        </div>
    </div>
    <div class="col-6 col-sm-6 col-lg-3">
        <div class="card tilebox-one">
            <div class="card-body">
                <h3 class="text-uppercase mt-0 font-14">Total Pengurangan Stock</h3>
                <h2 class="my-2" id="active-users-count">0</h2>
            </div>
        </div>
    </div> -->
</div>
<!-- end row-->



</div> <!-- End Content -->