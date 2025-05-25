<div class="content-page">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Ubah Status Akun Pengguna</h4>
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
                                                <table id="datatable" class="table table-centered table-bordered table-hover dt-responsive nowrap" role="grid" aria-describedby="datatable_info">
                                                    <thead class="table-light">
                                                        <tr role="row">
                                                            <th width="20px" class="sorting_disabled sorting_asc" rowspan="1" colspan="1" style="width: 19px;" aria-label="ID">ID</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 107.8px;" aria-label="Username: activate to sort column ascending">Username</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 91.8px;" aria-label="Status: activate to sort column ascending">Status</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Aksi: activate to sort column ascending">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($user = mysqli_fetch_assoc($resultUsers)) : ?>
                                                            <?php
                                                            $status = $user['status'];
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $user['id']; ?></td>
                                                                <td><?php echo $user['username']; ?></td>
                                                                <td><?php echo $status; ?></td>
                                                                <td>
                                                                    <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                                        <a href="?changeStatus=<?php echo $user['id']; ?>">
                                                                        <?php else : ?>
                                                                            <a href="#" onclick="levelFunction()">
                                                                            <?php endif; ?>


                                                                            <?php echo ($status == 'Aktif') ? 'Banned' : 'Aktif'; ?>
                                                                            </a>
                                                                </td>
                                                            </tr>
                                                        <?php endwhile; ?>
                                                    </tbody>
                                                </table>
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