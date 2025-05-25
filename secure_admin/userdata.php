<div class="content-page">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Daftar Semua Pengguna</h4>
                </div>
            </div>
        </div>


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
                                                <form id="searchForm" class="mb-3">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="searchInput" placeholder="Cari username...">
                                                        <button type="submit" class="btn btn-primary">Cari</button>
                                                    </div>
                                                </form>

                                                <form id="searchFormIP" class="mb-3">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="searchInputIP" placeholder="Cari IP...">
                                                        <button type="submit" class="btn btn-primary">Cari</button>
                                                    </div>
                                                </form>

                                                <table id="datatablePengguna" class="table table-centered table-bordered table-hover dt-responsive nowrap" role="grid" aria-describedby="datatable_info">
                                                    <thead class="table-light">
                                                        <tr role="row">
                                                            <th width="20px" class="sorting_disabled sorting_asc" rowspan="1" colspan="1" style="width: 19px;" aria-label="ID">ID</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatablePengguna" rowspan="1" colspan="1" style="width: 107.8px;" aria-label="Username: activate to sort column ascending">Username</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatablePengguna" rowspan="1" colspan="1" style="width: 91.8px;" aria-label="Level: activate to sort column ascending">Level</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatablePengguna" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Saldo: activate to sort column ascending">Saldo</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatablePengguna" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Nama Lengkap: activate to sort column ascending">Nama Lengkap</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatablePengguna" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Nomor Rekening: activate to sort column ascending">Nomor Rekening</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatablePengguna" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Nama Bank: activate to sort column ascending">Nama Bank</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatablePengguna" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Email: activate to sort column ascending">Email</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatablePengguna" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="No HP: activate to sort column ascending">No HP</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatablePengguna" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Last Login: activate to sort column ascending">Last Login</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatablePengguna" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Last IP Login: activate to sort column ascending">Last IP Login</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatablePengguna" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Aksi: activate to sort column ascending">Aksi</th>
                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        <?php while ($user = mysqli_fetch_assoc($resultPengguna)) : ?>
                                                            <tr>
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
                                                                // Query untuk mengambil informasi last login dan last IP
                                                                $userId = $user['id'];
                                                                $query = "SELECT username, last_login, last_ip, device FROM users WHERE id='$userId'";
                                                                $result = mysqli_query($conn, $query);

                                                                // Loop untuk menampilkan data
                                                                while ($row = mysqli_fetch_assoc($result)) {

                                                                    $lastLogin = $row['last_login'];
                                                                    $lastIP = $row['last_ip'];
                                                                }
                                                                // Mengubah format balance menjadi IDR
                                                                $formattedBalance = '' . number_format($balance, 0, ',', ',');
                                                                ?>
                                                                <td>(<?php echo $formattedBalance; ?>)</td>
                                                                <td><?php echo $user['fullname']; ?></td>
                                                                <td><?php echo $user['acc_no']; ?></td>
                                                                <td><?php echo $user['bank_name']; ?></td>
                                                                <td><?php echo $user['email']; ?></td>
                                                                <td><?php echo $user['telp_no']; ?></td>
                                                                <td><?php echo $lastLogin; ?></td>
                                                                <td><?php echo $lastIP; ?></td>
                                                                <td>
                                                                    <a href="#" class="edit-balance" data-balance="<?php echo $balance; ?>" data-balance_value="<?php echo $balance; ?>" data-username="<?php echo $user['username']; ?>" data-level="<?php echo $user['level']; ?>" data-fullname="<?php echo $user['fullname']; ?>" data-acc_no="<?php echo $user['acc_no']; ?>" data-bank_name="<?php echo $user['bank_name']; ?>" data-email="<?php echo $user['email']; ?>" data-telp_no="<?php echo $user['telp_no']; ?>" data-user-id="<?php echo $user['id']; ?>">Edit</a>
                                                                    /
                                                                    <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                                        <a href="delete_user.php?deleteUser=<?php echo $user['id']; ?>">Hapus</a>
                                                                    <?php else : ?>
                                                                        <a href="#" onclick="levelFunction()">Hapus</a>
                                                                    <?php endif; ?>
                                                                </td>

                                                            </tr>
                                                            </tr>
                                                        <?php endwhile; ?>
                                                    </tbody>
                                                </table>

                                                <script>
                                                    document.getElementById('searchFormIP').addEventListener('submit', function(event) {
                                                        event.preventDefault(); // Prevent form submission

                                                        // Get the search input value and convert to lowercase
                                                        const searchValue = document.getElementById('searchInputIP').value.trim().toLowerCase();
                                                        console.log("Search value:", searchValue);

                                                        // Get all table rows
                                                        const tableRows = document.querySelectorAll('#datatablePengguna tbody tr');

                                                        // Reset the display style of all table rows
                                                        for (const row of tableRows) {
                                                            row.style.display = 'table-row';
                                                        }

                                                        // Loop through table rows and hide/show based on the search value
                                                        for (const row of tableRows) {
                                                            const last_ipCell = row.querySelector('td:nth-child(11)');
                                                            if (last_ipCell) {
                                                                const last_ip = last_ipCell.textContent.trim().toLowerCase();
                                                                console.log("Row last_ip:", last_ip);
                                                                if (!last_ip.includes(searchValue)) {
                                                                    row.style.display = 'none';
                                                                }
                                                            }
                                                        }
                                                    });
                                                </script>



                                                <script>
                                                    document.getElementById('searchForm').addEventListener('submit', function(event) {
                                                        event.preventDefault(); // Prevent form submission

                                                        // Get the search input value and convert to lowercase
                                                        const searchValue = document.getElementById('searchInput').value.trim().toLowerCase();
                                                        console.log("Search value:", searchValue);

                                                        // Get all table rows
                                                        const tableRows = document.querySelectorAll('#datatablePengguna tbody tr');

                                                        // Reset the display style of all table rows
                                                        for (const row of tableRows) {
                                                            row.style.display = 'table-row';
                                                        }

                                                        // Loop through table rows and hide/show based on the search value
                                                        for (const row of tableRows) {
                                                            const usernameCell = row.querySelector('td:nth-child(2)');
                                                            if (usernameCell) {
                                                                const username = usernameCell.textContent.trim().toLowerCase();
                                                                console.log("Row username:", username);
                                                                if (!username.includes(searchValue)) {
                                                                    row.style.display = 'none';
                                                                }
                                                            }
                                                        }
                                                    });
                                                </script>














                                                <div id="paginationButtonsPengguna" class="text-center mt-3">
                                                    <button class="btn btn-primary mr-2" onclick="previousPagePengguna()">Previous</button>
                                                    <button class="btn btn-primary" onclick="nextPagePengguna()">Next</button>
                                                </div>

                                                <!-- Modal Edit Pengguna -->
                                                <div class="modal fade" id="editSaldoModal" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editSaldoModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header modal-colored-header bg-info">
                                                                <h4 class="modal-title" id="success-header-modalLabel">Edit Data Pengguna</h4>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>

                                                            </div>
                                                            <div class="modal-body">
                                                                <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                                    <form id="editSaldoForm">
                                                                    <?php else : ?>
                                                                    <?php endif; ?>

                                                                    <div class="form-group">
                                                                        <label for="editUsernameInput">Username</label>
                                                                        <input type="text" class="form-control" id="editUsernameInput" data-username="<?php echo $user['username']; ?>" value="<?php echo $user['username']; ?>" name="username">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="editLevelInput">Level</label>
                                                                        <select class="custom-select form-control kecamatan-tujuan select2-accessible" data-level="<?php echo $user['level']; ?>" name="level" id="editLevelInput">
                                                                            <option value="superadmin" <?php echo ($level == 'superadmin') ? 'selected' : ''; ?>>Super Admin</option>
                                                                            <option value="admin" <?php echo ($level == 'admin') ? 'selected' : ''; ?>>Admin</option>
                                                                            <option value="user" <?php echo ($level == 'user') ? 'selected' : ''; ?>>User</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="editNamaLengkapInput">Nama Lengkap</label>
                                                                        <input type="text" class="form-control" id="editNamaLengkapInput" data-fullname="<?php echo $user['fullname']; ?>" value="<?php echo $user['fullname']; ?>" name="fullname">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="editNomorRekeningInput">Nomor Rekening</label>
                                                                        <input type="text" class="form-control" id="editNomorRekeningInput" data-acc_no="<?php echo $user['acc_no']; ?>" value="<?php echo $user['acc_no']; ?>" name="acc_no">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="editNamaBankInput">Nama Bank</label>
                                                                        <select class="custom-select form-control kecamatan-tujuan select2-accessible" data-bank_name="<?php echo $user['bank_name']; ?>" name="bank_name" id="editNamaBankInput">
                                                                            <option value="BCA" <?php echo ('BCA') ? 'selected' : ''; ?>>BCA</option>
                                                                            <option value="MANDIRI" <?php echo ('MANDIRI') ? 'selected' : ''; ?>>MANDIRI</option>
                                                                            <option value="BNI" <?php echo ('BNI') ? 'selected' : ''; ?>>BNI</option>
                                                                            <option value="BRI" <?php echo ('BRI') ? 'selected' : ''; ?>>BRI</option>
                                                                            <option value="CIMB" <?php echo ('CIMB') ? 'selected' : ''; ?>>CIMB</option>
                                                                            <option value="Danamon" <?php echo ('Danamon') ? 'selected' : ''; ?>>Danamon</option>
                                                                            <option value="Permata" <?php echo ('Permata') ? 'selected' : ''; ?>>Permata</option>
                                                                            <option value="BJB" <?php echo ('BJB') ? 'selected' : ''; ?>>BJB</option>
                                                                            <option value="PANIN" <?php echo ('PANIN') ? 'selected' : ''; ?>>PANIN</option>
                                                                            <option value="OCBC" <?php echo ('OCBC') ? 'selected' : ''; ?>>OCBC</option>
                                                                            <option value="SUMUT" <?php echo ('SUMUT') ? 'selected' : ''; ?>>SUMUT</option>
                                                                            <option value="BSI" <?php echo ('BSI') ? 'selected' : ''; ?>>BSI</option>
                                                                            <option value="NEO" <?php echo ('NEO') ? 'selected' : ''; ?>>NEO</option>
                                                                            <option value="JAGO" <?php echo ('JAGO') ? 'selected' : ''; ?>>JAGO</option>
                                                                            <option value="Jenius" <?php echo ('Jenius') ? 'selected' : ''; ?>>Jenius</option>
                                                                            <option value="DANA" <?php echo ('DANA') ? 'selected' : ''; ?>>DANA</option>
                                                                            <option value="OVO" <?php echo ('OVO') ? 'selected' : ''; ?>>OVO</option>
                                                                            <option value="ShoopePay" <?php echo ('ShoopePay') ? 'selected' : ''; ?>>ShoopePay</option>
                                                                            <option value="GOPAY" <?php echo ('GOPAY') ? 'selected' : ''; ?>>GOPAY</option>
                                                                            <option value="LinkAja" <?php echo ('LinkAja') ? 'selected' : ''; ?>>LinkAja</option>
                                                                            <option value="Lain-lain" <?php echo ('Lain-lain') ? 'selected' : ''; ?>>Lain-lain</option>
                                                                        </select>

                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="editEmailInput">Email</label>
                                                                        <input type="text" class="form-control" id="editEmailInput" data-email="<?php echo $user['email']; ?>" value="<?php echo $user['email']; ?>" name="email">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="editNoHPInput">No HP</label>
                                                                        <input type="text" class="form-control" id="editNoHPInput" data-telp_no="<?php echo $user['telp_no']; ?>" value="<?php echo $user['telp_no']; ?>" name="telp_no">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="editSaldoInput">Saldo ( 1000 -> 1.000 Rupiah )</label>
                                                                        <input type="number" class="form-control" id="editSaldoInput" data-balance="<?php echo $balance; ?>" value="<?php echo $balance; ?>" name="saldo" data-balance-raw="<?php echo $balance; ?>" onchange="updateRawInput()">
                                                                    </div>
                                                                    <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                                        <input type="hidden" id="userIdInput" name="userId">
                                                                    <?php else : ?>
                                                                    <?php endif; ?>

                                                                    <?php if ($_SESSION['level'] === 'superadmin') : ?>
                                                                    </form>
                                                                <?php else : ?>
                                                                <?php endif; ?>

                                                            </div>
                                                            <div class="modal-footer">


                                                                <?php if ($_SESSION['level'] === 'superadmin') : ?>

                                                                    <button type="button" class="btn btn-white" data-bs-dismiss="modal">Batal</button>
                                                                    <button type="button" class="btn btn-primary" id="submitEditSaldo">Simpan</button>
                                                                <?php else : ?>

                                                                    <span><strong>
                                                                            <h4>Hanya akses level SuperAdmin yang dapat mengedit data ini.
                                                                        </strong></h4></span>
                                                                <?php endif; ?>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>




                                                <script>
                                                    $(document).ready(function() {

                                                        $(".edit-balance").click(function() {
                                                            var userId = $(this).data("user-id");
                                                            var level = $(this).data("level");
                                                            var username = $(this).data("username");
                                                            var fullname = $(this).data("fullname");
                                                            var acc_no = $(this).data("acc_no");
                                                            var bank_name = $(this).data("bank_name");
                                                            var email = $(this).data("email");
                                                            var telp_no = $(this).data("telp_no");
                                                            var balance = $(this).data("balance");
                                                            $("#userIdInput").val(userId);
                                                            $("#editLevelInput").val(level);
                                                            $("#editUsernameInput").val(username);
                                                            $("#editNamaLengkapInput").val(fullname);
                                                            $("#editNomorRekeningInput").val(acc_no);
                                                            $("#editNamaBankInput").val(bank_name);
                                                            $("#editEmailInput").val(email);
                                                            $("#editNoHPInput").val(telp_no);
                                                            $("#editSaldoInput2").val(balance);
                                                            $("#editSaldoModal").modal("show");
                                                        });



                                                        $("#submitEditSaldo").click(function() {
                                                            var userId = $("#userIdInput").val();
                                                            var newBalance = $("#editSaldoInput").val();
                                                            var username = $("#editUsernameInput").val();
                                                            var fullname = $("#editNamaLengkapInput").val();
                                                            var level = $("#editLevelInput").val();
                                                            var acc_no = $("#editNomorRekeningInput").val();
                                                            var bank_name = $("#editNamaBankInput").val();
                                                            var email = $("#editEmailInput").val();
                                                            var telp_no = $("#editNoHPInput").val();



                                                            $.ajax({
                                                                type: "POST",
                                                                url: "edit_balance.php",
                                                                data: {
                                                                    userId: userId,
                                                                    newBalance: newBalance,
                                                                    username: username,
                                                                    fullname: fullname,
                                                                    level: level,
                                                                    acc_no: acc_no,
                                                                    bank_name: bank_name,
                                                                    email: email,
                                                                    telp_no: telp_no
                                                                },
                                                                success: function(response) {
                                                                    alert(response);
                                                                    $("#editSaldoModal").modal("hide");
                                                                    location.reload();
                                                                },
                                                                error: function(xhr, status, error) {
                                                                    alert("Error: " + error);
                                                                }

                                                            });
                                                        });
                                                    });
                                                </script>


                                                <script>
                                                    // JavaScript untuk mengatur pagination
                                                    let currentPagePengguna = 0;
                                                    const itemsPerPagePengguna = 10;
                                                    const dataTablePengguna = document.getElementById("datatablePengguna").getElementsByTagName("tbody")[0].children;
                                                    const totalItemsPengguna = dataTablePengguna.length;
                                                    const totalPagesPengguna = Math.ceil(totalItemsPengguna / itemsPerPagePengguna);

                                                    function showPagePengguna(page) {
                                                        for (let i = 0; i < totalItemsPengguna; i++) {
                                                            dataTablePengguna[i].style.display = i >= page * itemsPerPagePengguna && i < (page + 1) * itemsPerPagePengguna ? "" : "none";
                                                        }
                                                    }

                                                    function previousPagePengguna() {
                                                        if (currentPagePengguna > 0) {
                                                            currentPagePengguna--;
                                                            showPagePengguna(currentPagePengguna);
                                                        }
                                                    }

                                                    function nextPagePengguna() {
                                                        if (currentPagePengguna < totalPagesPengguna - 1) {
                                                            currentPagePengguna++;
                                                            showPagePengguna(currentPagePengguna);
                                                        }
                                                    }

                                                    showPagePengguna(currentPagePengguna); // Menampilkan halaman pertama saat halaman dibuka
                                                </script>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="page-title-box">
                    <h4 class="page-title">Riwayat Edit Saldo Pengguna</h4>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="state-saving-preview">
                                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                            <form id="searchFormRiwayatPenguna" class="mb-3">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="searchInputRiwayatPenguna" placeholder="Cari username...">
                                                    <button type="submit" class="btn btn-primary">Cari</button>
                                                </div>
                                            </form>

                                            <br>
                                            <div id="dataTableWrapper">
                                                <table id="datatableDeleted" class="table table-centered table-bordered table-hover dt-responsive nowrap" role="grid" aria-describedby="datatable_info">
                                                    <thead class="table-light">
                                                        <?php


                                                        // Kueri dengan LIMIT untuk menampilkan hanya 10 baris data per halaman
                                                        $queryHistory = "SELECT * FROM balance_change_log ORDER BY change_date";
                                                        $resultHistory = mysqli_query($conn, $queryHistory);
                                                        ?>

                                                        <tr role="row">
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 10.8px;" aria-label="No: activate to sort column ascending">No</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 10.8px;" aria-label="Username Pengguna: activate to sort column ascending">Username Pengguna</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Admin Username: activate to sort column ascending">Admin Username</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Saldo Sebelumnya: activate to sort column ascending">Saldo Sebelumnya</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Saldo Baru: activate to sort column ascending">Saldo Baru</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Tanggal Perubahan: activate to sort column ascending">Tanggal Perubahan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $counter = 1;
                                                        while ($row = mysqli_fetch_assoc($resultHistory)) {
                                                            $username = $row['username_pengguna'];
                                                            $adminUsername = $row['admin_username'];
                                                            $oldBalance = $row['old_balance'];
                                                            $newBalance = $row['new_balance'];
                                                            $changeDate = $row['change_date'];
                                                            // Mengubah format balance menjadi IDR
                                                            $formattedOldBalance = '' . number_format($oldBalance, 0, ',', ',');
                                                            $formattedNewBalance = '' . number_format($newBalance, 0, ',', ',');
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $counter; ?></td>
                                                                <td><?php echo $username; ?></td>
                                                                <td><?php echo $adminUsername; ?></td>
                                                                <td>(<?php echo $formattedOldBalance; ?>)</td>
                                                                <td>(<?php echo $formattedNewBalance; ?>)</td>
                                                                <td><?php echo $changeDate; ?></td>
                                                            </tr>
                                                        <?php
                                                            $counter++;
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div id="paginationButtons" class="text-center mt-3">
                                            <button class="btn btn-primary mr-2" onclick="previousPage()">Previous</button>
                                            <button class="btn btn-primary" onclick="nextPage()">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('searchFormRiwayatPenguna').addEventListener('submit', function(event) {
                        event.preventDefault(); // Prevent form submission

                        // Get the search input value and convert to lowercase
                        const searchValue = document.getElementById('searchInputRiwayatPenguna').value.trim().toLowerCase();
                        console.log("Search value:", searchValue);

                        // Get all table rows
                        const tableRows = document.querySelectorAll('#datatableDeleted tbody tr');

                        // Reset the display style of all table rows
                        for (const row of tableRows) {
                            row.style.display = 'table-row';
                        }

                        // Loop through table rows and hide/show based on the search value
                        for (const row of tableRows) {
                            const username_penggunaCell = row.querySelector('td:nth-child(2)');
                            if (username_penggunaCell) {
                                const username_pengguna = username_penggunaCell.textContent.trim().toLowerCase();
                                console.log("Row username_pengguna:", username_pengguna);
                                if (!username_pengguna.includes(searchValue)) {
                                    row.style.display = 'none';
                                }
                            }
                        }
                    });
                </script>


                <div class="page-title-box">
                    <h4 class="page-title">Riwayat Hapus Pengguna</h4>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane show active" id="state-saving-preview">
                                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                        <form id="searchFormPenggunaDihapus" class="mb-3">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="searchInputPenggunaDihapus" placeholder="Cari username...">
                                                    <button type="submit" class="btn btn-primary">Cari</button>
                                                </div>
                                            </form>

                                            <br>
                                            <div id="dataTableWrapper">
                                                <table id="datatablePenggunaDihapus" class="table table-centered table-bordered table-hover dt-responsive nowrap" role="grid" aria-describedby="datatable_info">
                                                    <thead class="table-light">
                                                        <?php
                                                        // Ambil data riwayat pengguna yang dihapus dari tabel deleted_users
                                                        $queryDeletedUsersHistory = "SELECT * FROM deleted_users ORDER BY deleted_at DESC";
                                                        $resultDeletedUsersHistory = mysqli_query($conn, $queryDeletedUsersHistory);
                                                        ?>

                                                        <tr role="row">
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 10.8px;" aria-label="ID: activate to sort column ascending">ID</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 10.8px;" aria-label="Username Pengguna: activate to sort column ascending">Username Pengguna</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Level: activate to sort column ascending">Level</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Admin Username: activate to sort column ascending">Admin Username</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Tanggal Penghapusan: activate to sort column ascending">Tanggal Penghapusan</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        while ($row = mysqli_fetch_assoc($resultDeletedUsersHistory)) {
                                                            echo '<tr>';
                                                            echo '<td>' . $row['id'] . '</td>';
                                                            echo '<td>' . $row['username'] . '</td>';
                                                            echo '<td>' . $row['level'] . '</td>';
                                                            echo '<td>' . $row['admin_username'] . '</td>';
                                                            echo '<td>' . $row['deleted_at'] . '</td>';
                                                            echo '</tr>';
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div id="paginationButtonsPenggunaDihapus" class="text-center mt-3">
                                            <button class="btn btn-primary mr-2" onclick="previousPagePenggunaDihapus()">Previous</button>
                                            <button class="btn btn-primary" onclick="nextPagePenggunaDihapus()">Next</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('searchFormPenggunaDihapus').addEventListener('submit', function(event) {
                        event.preventDefault(); // Prevent form submission

                        // Get the search input value and convert to lowercase
                        const searchValue = document.getElementById('searchInputPenggunaDihapus').value.trim().toLowerCase();
                        console.log("Search value:", searchValue);

                        // Get all table rows
                        const tableRows = document.querySelectorAll('#datatablePenggunaDihapus tbody tr');

                        // Reset the display style of all table rows
                        for (const row of tableRows) {
                            row.style.display = 'table-row';
                        }

                        // Loop through table rows and hide/show based on the search value
                        for (const row of tableRows) {
                            const usernameCell = row.querySelector('td:nth-child(2)');
                            if (usernameCell) {
                                const username = usernameCell.textContent.trim().toLowerCase();
                                console.log("Row username:", username);
                                if (!username.includes(searchValue)) {
                                    row.style.display = 'none';
                                }
                            }
                        }
                    });
                </script>

                <script>
                    // JavaScript untuk mengatur pagination
                    let currentPagePenggunaDihapus = 0;
                    const itemsPerPagePenggunaDihapus = 5;
                    const dataTablePenggunaDihapus = document.getElementById("datatablePenggunaDihapus").getElementsByTagName("tbody")[0].children;
                    const totalItemsPenggunaDihapus = dataTablePenggunaDihapus.length;
                    const totalPagesPenggunaDihapus = Math.ceil(totalItemsPenggunaDihapus / itemsPerPagePenggunaDihapus);

                    function showPagePenggunaDihapus(page) {
                        for (let i = 0; i < totalItemsPenggunaDihapus; i++) {
                            dataTablePenggunaDihapus[i].style.display = i >= page * itemsPerPagePenggunaDihapus && i < (page + 1) * itemsPerPagePenggunaDihapus ? "" : "none";
                        }
                    }

                    function previousPagePenggunaDihapus() {
                        if (currentPagePenggunaDihapus > 0) {
                            currentPagePenggunaDihapus--;
                            showPagePenggunaDihapus(currentPagePenggunaDihapus);
                        }
                    }

                    function nextPagePenggunaDihapus() {
                        if (currentPagePenggunaDihapus < totalPagesPenggunaDihapus - 1) {
                            currentPagePenggunaDihapus++;
                            showPagePenggunaDihapus(currentPagePenggunaDihapus);
                        }
                    }

                    showPagePenggunaDihapus(currentPagePenggunaDihapus); // Menampilkan halaman pertama saat halaman dibuka
                </script>


                <script>
                    // JavaScript to handle pagination
                    let currentPage = 0;
                    const itemsPerPage = 10;
                    const dataTable = document.getElementById("datatableDeleted").getElementsByTagName("tbody")[0].children;
                    const totalItems = dataTable.length;
                    const totalPages = Math.ceil(totalItems / itemsPerPage);

                    function showPage(page) {
                        for (let i = 0; i < totalItems; i++) {
                            dataTable[i].style.display = i >= page * itemsPerPage && i < (page + 1) * itemsPerPage ? "" : "none";
                        }
                    }

                    function previousPage() {
                        if (currentPage > 0) {
                            currentPage--;
                            showPage(currentPage);
                        }
                    }

                    function nextPage() {
                        if (currentPage < totalPages - 1) {
                            currentPage++;
                            showPage(currentPage);
                        }
                    }

                    showPage(currentPage); // Show the first page initially
                </script>







                <script>
                    function showPleaseWait(event) {
                        event.preventDefault();

                        Swal.fire({
                            title: 'Please Wait',
                            html: 'Loading...',
                            icon: 'info',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            timer: 500,
                            timerProgressBar: false,
                            onBeforeOpen: () => {
                                Swal.showLoading();
                            },
                            onClose: () => {
                                showConfirmation(event.target.getAttribute('href'));
                            }
                        });
                    }

                    function showConfirmation(url) {
                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: 'Data pengguna akan dihapus.',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Ya, Hapus',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect atau lakukan aksi hapus data di sini
                                window.location.href = url;
                                Swal.fire({
                                    title: 'Sukses!',
                                    text: 'Pengguna berhasil dihapus!',
                                    icon: 'success'
                                });
                            }
                        });
                    }
                </script>

                <script>
                    function showEditUser(event) {
                        event.preventDefault();

                        Swal.fire({
                            title: 'Please Wait',
                            html: 'Loading...',
                            icon: 'info',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            timer: 500,
                            timerProgressBar: false,
                            onBeforeOpen: () => {
                                Swal.showLoading();
                            },
                            onClose: () => {
                                showConfirmation(event.target.getAttribute('href'));
                            }
                        });
                    }

                    function showConfirmation(url) {
                        Swal.fire({
                            title: 'Apakah Anda yakin?',
                            text: 'Data pengguna akan di edit.',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Ya, Lanjut',
                            cancelButtonText: 'Batal'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Redirect atau lakukan aksi hapus data di sini
                                window.location.href = url;
                                Swal.fire({
                                    title: 'Sukses!',
                                    text: 'Pengguna berhasil diedit!',
                                    icon: 'success'
                                });
                            }
                        });
                    }
                </script>

                <?php if (isset($_SESSION['usernameExists'])) : ?>
                    <script>
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Gagal!',
                                text: 'Pengguna sudah tersedia di database, silakan tambah dengan username lain!',
                                icon: 'error'
                            });
                        }, 1000); // 5000 milidetik = 5 detik
                    </script>
                <?php
                    unset($_SESSION['usernameExists']);
                endif; ?>

                <script>
                    // Ambil referensi input dan tabel
                    const searchInput = document.getElementById('searchInput');
                    const datatable = document.getElementById('datatable');

                    // Tambahkan event listener saat input pencarian berubah
                    searchInput.addEventListener('input', function() {
                        const searchTerm = searchInput.value.toLowerCase();
                        const rows = datatable.getElementsByTagName('tr');

                        // Iterasi melalui setiap baris tabel
                        for (let i = 1; i < rows.length; i++) {
                            const username = rows[i].getElementsByTagName('td')[1].innerText.toLowerCase();

                            // Tampilkan atau sembunyikan baris berdasarkan pencarian
                            if (username.includes(searchTerm)) {
                                rows[i].style.display = '';
                            } else {
                                rows[i].style.display = 'none';
                            }
                        }
                    });
                </script>



                <script>
                    // Ambil referensi input dan tabel
                    const searchInputDeleted = document.getElementById('searchInputDeleted');
                    const datatableDeleted = document.getElementById('datatableDeleted');

                    // Tambahkan event listener saat input pencarian berubah
                    searchInputDeleted.addEventListener('input', function() {
                        const searchTerm = searchInputDeleted.value.toLowerCase();
                        const rows = datatableDeleted.getElementsByTagName('tr');

                        // Iterasi melalui setiap baris tabel
                        for (let i = 1; i < rows.length; i++) {
                            const username_pengguna = rows[i].getElementsByTagName('td')[1].innerText.toLowerCase();

                            // Tampilkan atau sembunyikan baris berdasarkan pencarian
                            if (username_pengguna.includes(searchTerm)) {
                                rows[i].style.display = '';
                            } else {
                                rows[i].style.display = 'none';
                            }
                        }
                    });
                </script>