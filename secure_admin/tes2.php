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

                                                <div class="search-container">
                                                    <input type="text" id="searchInput" placeholder="Cari username...">
                                                    <span class="search-icon">
                                                        <i class="fas fa-search"></i>
                                                    </span>
                                                </div>
                                                <br>

                                                <table id="datatable" class="table table-centered table-bordered table-hover dt-responsive nowrap" role="grid" aria-describedby="datatable_info">
                                                    <thead class="table-light">
                                                        <tr role="row">
                                                            <th width="20px" class="sorting_disabled sorting_asc" rowspan="1" colspan="1" style="width: 19px;" aria-label="ID">ID</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 107.8px;" aria-label="Username: activate to sort column ascending">Username</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 91.8px;" aria-label="Level: activate to sort column ascending">Level</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Saldo: activate to sort column ascending">Saldo</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Aksi: activate to sort column ascending">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($user = mysqli_fetch_assoc($resultPengguna)) : ?>
                                                            <tr>
                                                                <td><?php echo $user['id']; ?></td>
                                                                <td><?php echo $user['username']; ?></td>
                                                                <td><?php echo $user['level']; ?></td>
                                                                <?php
                                                                // Ambil saldo pengguna dari database
                                                                $userId = $user['id'];
                                                                $queryBalance = "SELECT SUM(balance) AS balance FROM users WHERE id='$userId'";
                                                                $resultBalance = mysqli_query($conn, $queryBalance);
                                                                $balance = mysqli_fetch_assoc($resultBalance)['balance'];

                                                                // Mengubah format balance menjadi IDR
                                                                $formattedBalance = '' . number_format($balance, 0, ',', ',');
                                                                ?>
                                                                <td>(<?php echo $formattedBalance; ?>)</td>
                                                                <td>
                                                                    <a href="#" class="edit-balance" data-user-id="<?php echo $user['id']; ?>">Edit Saldo</a>
                                                                    /
                                                                    <a href="delete_user.php?deleteUser=<?php echo $user['id']; ?>">Hapus</a>
                                                                </td>

                                                            </tr>
                                                        <?php endwhile; ?>
                                                    </tbody>
                                                </table>