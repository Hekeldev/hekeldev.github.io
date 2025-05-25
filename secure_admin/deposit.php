<div class="content-page">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Pengajuan Deposit Pengguna</h4>
                </div>
            </div>
        </div>

        <?php
        $no = isset($_GET['no']) ? $_GET['no'] : 1;
        ?>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane show active" id="state-saving-preview">
                                <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="table-responsive">
                                                <?php if (mysqli_num_rows($resultPendingDeposits) > 0) : ?>
                                                    <table id="datatable" class="table table-centered table-bordered table-hover dt-responsive nowrap" role="grid" aria-describedby="datatable_info">
                                                        <thead class="table-light">
                                                            <tr role="row">
                                                                <th width="20px" class="sorting_disabled sorting_asc" rowspan="1" colspan="1" style="width: 19px;" aria-label="No">ID Deposit</th>
                                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 107.8px;" aria-label="Username: activate to sort column ascending">Username</th>
                                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 157.8px;" aria-label="Nominal: activate to sort column ascending">Nominal</th>
                                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 91.8px;" aria-label="Tgl Pengajuan: activate to sort column ascending">Tgl Pengajuan</th>
                                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Dari: activate to sort column ascending">Dari</th>
                                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Tujuan Deposit: activate to sort column ascending">Tujuan Deposit</th>
                                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Action: activate to sort column ascending">Action</th>

                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php while ($deposit = mysqli_fetch_assoc($resultPendingDeposits)) : ?>
                                                                <tr>
                                                                    <td><?php echo $deposit['id']; ?></td>
                                                                    <?php
                                                                    // Ambil informasi pengguna yang mengajukan deposit
                                                                    $queryUser = "SELECT u.username FROM deposits d INNER JOIN users u ON d.user_id = u.id WHERE d.id = " . $deposit['id'];
                                                                    $resultUser = mysqli_query($conn, $queryUser);
                                                                    $username = mysqli_fetch_assoc($resultUser)['username'];
                                                                    ?>
                                                                    <td><?php echo $username; ?></td>
                                                                    <td>(<?php echo number_format($deposit['amount'], 0, ',', '.'); ?>)</td>
                                                                    <td><?php echo $deposit['created_at']; ?></td>
                                                                    <td><?php echo $deposit['bank_name'] . ' - ' . $deposit['acc_no'] . ' - ' . $deposit['fullname']; ?></td>
                                                                    <td><?php echo $deposit['destination']; ?></td>
                                                                    <td>
                                                                        <a class="action-button" href="?approveDeposit=<?php echo $deposit['id']; ?>">Approve</a>
                                                                        <a class="action-button" href="?rejectDeposit=<?php echo $deposit['id']; ?>">Reject</a>
                                                                    </td>
                                                                </tr>
                                                            <?php endwhile; ?>
                                                        </tbody>
                                                    </table>
                                                <?php else : ?>
                                                    <p>Tidak ada deposit pending saat ini.</p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>