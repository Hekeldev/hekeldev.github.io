<div class="page-title-box">
    <h4 class="page-title">Aktivitas Admin</h4>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane show active" id="state-saving-preview">
                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="table-responsive">
                                <div class="search-container">
                                    <input type="text" id="searchInputUsernameAdmin" placeholder="Cari username admin">
                                    <span class="search-icon">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>

                                <br>
                                <div id="dataTableWrapper">
                                    <table id="datatableAktivitasAdmin" class="table table-centered table-bordered table-hover dt-responsive nowrap" role="grid" aria-describedby="datatable_info">
                                        <thead class="table-light">
                                            <?php
                                            // Kode untuk koneksi ke database dan query select akan tergantung pada metode koneksi database yang digunakan (misalnya mysqli, PDO, dll.)
                                            $query = "SELECT * FROM admin_activity_log ORDER BY login_time DESC";
                                            $result = mysqli_query($conn, $query);
                                            ?>

                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 5.8px;" aria-label="Username Admin: activate to sort column ascending">Username Admin</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 5.8px;" aria-label="Aktivitas: activate to sort column ascending">Aktivitas</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Waktu Login: activate to sort column ascending">Waktu Login</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Waktu Logout: activate to sort column ascending">Waktu Logout</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Device: activate to sort column ascending">Device</th>
                                                <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="IP Addres: activate to sort column ascending">IP Addres</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<tr>";
                                                echo "<td>" . $row['admin_username'] . "</td>";
                                                echo "<td>" . $row['activity_type'] . "</td>";
                                                echo "<td>" . $row['login_time'] . "</td>";
                                                echo "<td>" . $row['logout_time'] . "</td>";
                                                echo "<td>" . $row['device'] . "</td>";
                                                echo "<td>" . $row['ip_address'] . "</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div id="paginationButtonsAktivitasAdmin" class="text-center mt-3">
                                <button class="btn btn-primary mr-2" onclick="previousPageAktivitasAdmin()">Previous</button>
                                <button class="btn btn-primary" onclick="nextPageAktivitasAdmin()">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Ambil referensi input dan tabel
    const searchInputUsernameAdmin = document.getElementById('searchInputUsernameAdmin');
    const datatableAktivitasAdmin = document.getElementById('datatableAktivitasAdmin');

    // Tambahkan event listener saat input pencarian berubah
    searchInputUsernameAdmin.addEventListener('input', function() {
        const searchTerm = searchInputUsernameAdmin.value.toLowerCase();
        const rows = datatableAktivitasAdmin.getElementsByTagName('tr');

        // Iterasi melalui setiap baris tabel
        for (let i = 1; i < rows.length; i++) {
            const admin_username = rows[i].getElementsByTagName('td')[0].innerText.toLowerCase();

            // Tampilkan atau sembunyikan baris berdasarkan pencarian
            if (admin_username.includes(searchTerm)) {
                rows[i].style.display = '';
            } else {
                rows[i].style.display = 'none';
            }
        }
    });
</script>


    <script>
        // JavaScript untuk mengatur pagination
        let currentPageAktivitasAdmin = 0;
        const itemsPerPageAktivitasAdmin = 5;
        const dataTableAktivitasAdmin = document.getElementById("datatableAktivitasAdmin").getElementsByTagName("tbody")[0].children;
        const totalItemsAktivitasAdmin = dataTableAktivitasAdmin.length;
        const totalPagesAktivitasAdmin = Math.ceil(totalItemsAktivitasAdmin / itemsPerPageAktivitasAdmin);

        function showPageAktivitasAdmin(page) {
            for (let i = 0; i < totalItemsAktivitasAdmin; i++) {
                dataTableAktivitasAdmin[i].style.display = i >= page * itemsPerPageAktivitasAdmin && i < (page + 1) * itemsPerPageAktivitasAdmin ? "" : "none";
            }
        }

        function previousPageAktivitasAdmin() {
            if (currentPageAktivitasAdmin > 0) {
                currentPageAktivitasAdmin--;
                showPageAktivitasAdmin(currentPageAktivitasAdmin);
            }
        }

        function nextPageAktivitasAdmin() {
            if (currentPageAktivitasAdmin < totalPagesAktivitasAdmin - 1) {
                currentPageAktivitasAdmin++;
                showPageAktivitasAdmin(currentPageAktivitasAdmin);
            }
        }

        showPageAktivitasAdmin(currentPageAktivitasAdmin); // Menampilkan halaman pertama saat halaman dibuka
    </script>

    