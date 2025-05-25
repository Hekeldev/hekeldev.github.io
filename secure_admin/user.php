<div class="content-page">
    <div class="content">
        <style>
            .modal {
                display: none;
                overflow: hidden;
                position: fixed;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                z-index: 1050;
                outline: 0;
            }

            .modal.fade .modal-dialog {
                transform: translate(0, -50%);
                transition: transform 0.3s ease-out;
            }

            .modal-header {
                padding: 15px;
                border-bottom: none;
            }

            .modal-title {
                margin: 0;
            }

            .modal-content {
                position: relative;
                display: flex;
                flex-direction: column;
                width: 100%;
                pointer-events: auto;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid rgba(0, 0, 0, 0.2);
                border-radius: 0.3rem;
                outline: 0;
            }

            .modal-lg {
                max-width: 800px;
            }

            .modal-colored-header {
                color: #fff;
            }

            .modal-colored-header.bg-info {
                background-color: #17a2b8;
            }

            .modal-body {
                flex: 1 1 auto;
                padding: 15px;
            }

            .modal-footer {
                display: flex;
                align-items: center;
                justify-content: flex-end;
                padding: 15px;
                border-top: 1px solid rgba(0, 0, 0, 0.2);
            }

            .btn {
                display: inline-block;
                font-weight: 400;
                color: #212529;
                text-align: center;
                vertical-align: middle;
                user-select: none;
                background-color: transparent;
                border: 1px solid transparent;
                padding: 0.375rem 0.75rem;
                font-size: 1rem;
                line-height: 1.5;
                border-radius: 0.25rem;
                transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out,
                    border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
            }

            .btn-primary {
                color: #fff;
                background-color: #007bff;
                border-color: #007bff;
            }

            .btn-white {
                color: #212529;
                background-color: #fff;
                border-color: #fff;
            }

            .btn-primary:hover {
                color: #fff;
                background-color: #0069d9;
                border-color: #0062cc;
            }

            .btn-white:hover {
                color: #212529;
                background-color: #e6e6e6;
                border-color: #adadad;
            }

            .control-label {
                display: inline-block;
                margin-bottom: 0.5rem;
            }

            .form-control {
                display: block;
                width: 100%;
                padding: 0.375rem 0.75rem;
                font-size: 1rem;
                line-height: 1.5;
                color: #495057;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #ced4da;
                border-radius: 0.25rem;
                transition: border-color 0.15s ease-in-out,
                    box-shadow 0.15s ease-in-out;
            }

            .form-control:focus {
                color: #495057;
                background-color: #fff;
                border-color: #80bdff;
                outline: 0;
                box-shadow: 0 0 0 0.25rem rgba(0, 123, 255, 0.25);
            }

            /* Add any additional styling as needed */
        </style>


        <style>
            /* Gaya khusus untuk SweetAlert */
            .swal2-popup {
                font-size: 1.6rem;
            }

            .swal2-title {
                font-size: 2.2rem;
                margin-bottom: 1.6rem;
            }

            .swal2-content {
                font-size: 1.8rem;
                margin-bottom: 2.4rem;
            }

            .swal2-confirm {
                font-size: 1.8rem;
                padding: 0.8rem 2.4rem;
            }

            /* Gaya khusus untuk input form dalam SweetAlert */
            .swal2-input {
                display: block;
                width: 100%;
                padding: 0.8rem;
                font-size: 1.6rem;
                margin-bottom: 1.2rem;
            }

            /* Gaya khusus untuk tombol dalam SweetAlert */
            .swal2-actions .swal2-styled:not([type='file']) {
                font-size: 1.8rem;
                padding: 0.8rem 2.4rem;
                margin: 0.4rem;
                border-radius: 4px;
            }
        </style>

        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">Pengguna</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-primary mb-2" onclick="showModal()"><i class="mdi mdi-plus-circle me-2"></i>Tambah Pengguna</button>


                        <div class="tab-content">
                            <div class="tab-pane show active" id="state-saving-preview">
                                <table id="datatable" class="table table-centered table-bordered table-hover w-100 dt-responsive nowrap dataTable no-footer dtr-inline">
                                    <thead class="table-light">
                                        <tr>
                                            <th width="20px">ID</th>
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>Saldo</th>
                                            <th>Aksi</th>
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
                                                $queryBalance = "SELECT SUM(amount) AS balance FROM deposits WHERE user_id='$userId' AND status='Approved'";
                                                $resultBalance = mysqli_query($conn, $queryBalance);
                                                $balance = mysqli_fetch_assoc($resultBalance)['balance'];

                                                // Mengubah format balance menjadi IDR
                                                $formattedBalance = number_format($balance, 0, ',', '.');
                                                ?>
                                                <td><?php echo $formattedBalance; ?></td>
                                                <td>
                                                    <a href="edit_user.php?id=<?php echo $user['id']; ?>">Edit</a>
                                                    <!-- Tambahkan link untuk mengedit saldo pengguna -->
                                                    <a href="edit_balance.php?id=<?php echo $user['id']; ?>" class="edit-balance">Edit Saldo</a>
                                                    <a href="?deleteUser=<?php echo $user['id']; ?>" onclick="showPleaseWait(event)">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <div id="modalPengguna" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="success-header-modalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header modal-colored-header bg-info">
                                        <h4 class="modal-title" id="success-header-modalLabel">Pengguna</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                                    </div>
                                    <form id="penggunaForm" name="penggunaForm" class="form-horizontal" enctype="multipart/form-data">

                                    </form>
                                </div>
                                < </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->


                            <script>
                                // Menampilkan modal pengguna
                                function showUserModal() {
                                    var modal = document.getElementById('modalPengguna');
                                    modal.style.display = 'block';
                                }

                                // Tambahkan event listener ke tombol "Tambah"
                                document.getElementById('btnTambah').addEventListener('click', showUserModal);
                            </script>


                            <!-- Tombol untuk memunculkan modal -->

                            <!-- Modal pop-up -->
                            <div id="myModal" style="display: none;">
                                <form method="POST" action="" class="gradient-border">
                                    <label for="username">Username:</label>
                                    <input type="text" name="username" id="username" required><br>

                                    <label for="password">Password:</label>
                                    <input type="password" name="password" id="password" required><br>

                                    <label for="level">Level:</label>
                                    <select name="level" id="level">
                                        <option value="user">User</option>
                                        <option value="admin">Admin</option>
                                        <option value="superadmin">SuperAdmin</option>
                                    </select><br>
                                    <br>
                                    <input type="submit" name="addUser" value="Tambah Pengguna">
                                </form>
                            </div>

                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
                            <script>
                                function showModal() {
                                    Swal.fire({
                                        title: 'Tambah Pengguna',
                                        html: document.getElementById('myModal').innerHTML,
                                        showCancelButton: true,
                                        showConfirmButton: false
                                    });
                                }
                            </script>



                            <script>
    // Tangkap klik pada tombol "Edit"
    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('edit-user')) {
            event.preventDefault();

            // Dapatkan ID pengguna dari atribut data-id
            var userId = event.target.getAttribute('data-id');

            // Tampilkan popup SweetAlert dengan formulir pengeditan
            Swal.fire({
                title: 'Edit User',
                html: `
                    <form id="edit-user-form">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="">
                        <label for="level">Level</label>
                        <input type="text" id="level" name="level" value="">
                    </form>
                `,
                showCancelButton: true,
                confirmButtonText: 'Update',
                cancelButtonText: 'Cancel',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    // Lakukan permintaan AJAX untuk mengambil data pengguna
                    return fetch('get_user.php?userId=' + userId)
                        .then(function(response) {
                            if (!response.ok) {
                                throw new Error(response.statusText);
                            }
                            return response.json();
                        })
                        .catch(function(error) {
                            Swal.showValidationMessage(
                                'Failed to fetch user data: ' + error
                            );
                        });
                },
                onOpen: function() {
                    // Dapatkan elemen formulir pada SweetAlert popup
                    var form = Swal.getContent().querySelector('#edit-user-form');

                    // Tangkap submit formulir
                    form.addEventListener('submit', function(event) {
                        event.preventDefault();

                        // Dapatkan nilai username dan level dari formulir
                        var username = form.querySelector('#username').value;
                        var level = form.querySelector('#level').value;

                        // Lakukan permintaan AJAX untuk mengirim data pengeditan ke server
                        var data = new FormData();
                        data.append('userId', userId);
                        data.append('username', username);
                        data.append('level', level);

                        fetch('update_user.php', {
                            method: 'POST',
                            body: data
                        })
                            .then(function(response) {
                                if (!response.ok) {
                                    throw new Error(response.statusText);
                                }
                                return response.json();
                            })
                            .then(function(result) {
                                // Tampilkan pesan sukses jika berhasil mengedit pengguna
                                Swal.fire('Success!', result.message, 'success')
                                    .then(function() {
                                        // Reload halaman setelah menutup popup SweetAlert
                                        location.reload();
                                    });
                            })
                            .catch(function(error) {
                                Swal.showValidationMessage(
                                    'Update failed: ' + error
                                );
                            });
                    });
                },
                allowOutsideClick: false
            });
        }
    });
</script>



                        </div> <!-- End Content -->



                    </div> <!-- content-page -->