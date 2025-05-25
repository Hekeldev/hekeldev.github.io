<?php
// adminarea.php (Halaman Admin)
// Pertama, pastikan Anda telah melakukan koneksi ke database dan mendapatkan data permintaan withdraw dari tabel "withdraws".
// Jika admin mengubah status permintaan withdraw menjadi "Approved" atau "Rejected"
if (isset($_POST['updateStatus'])) {
    $withdrawId = $_POST['withdrawId'];
    $newStatus = $_POST['status'];

    // Update status permintaan withdraw
    $queryUpdateStatus = "UPDATE withdraws SET status='$newStatus' WHERE id=$withdrawId";
    mysqli_query($conn, $queryUpdateStatus);

    // Ambil data permintaan withdraw yang telah diubah statusnya
    $queryWithdraw = "SELECT * FROM withdraws WHERE id=$withdrawId AND status='$newStatus'";
    $resultWithdraw = mysqli_query($conn, $queryWithdraw);
    $withdraw = mysqli_fetch_assoc($resultWithdraw);

    if ($withdraw) {
        $username = $withdraw['username'];
        $nominal = $withdraw['amount'];
        $statusText = ($newStatus === "Approved") ? "Approved" : "Rejected";

        // Tampilkan alert dengan informasi status permintaan withdraw
        echo '<script type="text/javascript">
            alert("Withdraw dengan username ' . $username . ' nominal ' . $nominal . ' berhasil di ' . $statusText . '");
            window.location.href = "./?PAY4D=withdraw";
        </script>';

        // Jika status adalah "Rejected", kembalikan saldo pengguna
        if ($newStatus === "Rejected") {
            // Ambil saldo pengguna terbaru dari tabel users
            $queryGetLatestBalance = "SELECT balance FROM users WHERE username='$username'";
            $resultLatestBalance = mysqli_query($conn, $queryGetLatestBalance);
            $row = mysqli_fetch_assoc($resultLatestBalance);
            $latestBalance = $row['balance'];

            // Kembalikan saldo pengguna
            $amountToRefund = $withdraw['amount'];
            $newBalance = $latestBalance + $amountToRefund;
            $queryUpdateBalance = "UPDATE users SET balance=$newBalance WHERE username='$username'";
            mysqli_query($conn, $queryUpdateBalance);
        }
    }
}

// Ambil data permintaan withdraw dengan status "Pending" untuk ditampilkan di halaman admin
$queryWithdraws = "SELECT * FROM withdraws WHERE status='Pending' ORDER BY created_at ASC";
$resultWithdraws = mysqli_query($conn, $queryWithdraws);
?>

<style>
    /* Styling untuk tombol pagination */
    #pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }

    #pagination button {
        font-size: 16px;
        padding: 8px 12px;
        margin: 0 4px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: #fff;
        color: #333;
        cursor: pointer;
        transition: background-color 0.2s, color 0.2s, border-color 0.2s;
    }

    #pagination button:hover {
        background-color: #f5f5f5;
    }

    #pagination button.active {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    #pagination button:first-child,
    #pagination button:last-child {
        margin: 0;
    }

    /* CSS untuk tombol pagination */
    .pagination-container {
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination-button {
        padding: 10px 15px;
        margin: 0 5px;
        border: 1px solid #ccc;
        background-color: #f9f9f9;
        color: #333;
        cursor: pointer;
        transition: background-color 0.3s ease;
        border-radius: 5px;
        font-size: 14px;
    }

    .pagination-button:hover {
        background-color: #e6e6e6;
    }

    #currentPage {
        padding: 10px 15px;
        margin: 0 5px;
        background-color: #007bff;
        color: #fff;
        border-radius: 5px;
        font-size: 14px;
    }

    /* Tambahkan style untuk tombol First dan Last */
    #firstPageBtn,
    #lastPageBtn {
        background-color: #007bff;
        color: #fff;
    }

    /* Style untuk tombol Next dan Prev */
    #prevPageBtn,
    #nextPageBtn {
        background-color: #f9f9f9;
        color: #333;
    }

    /* Style saat tombol Next dan Prev di-hover */
    #prevPageBtn:hover,
    #nextPageBtn:hover {
        background-color: #e6e6e6;
    }
</style>


<div class="content-page">
    <div class="content">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Pengajuan Withdraw Pengguna</h4>
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
                                                <form id="searchFormStatus" class="mb-3">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" id="searchInputStatus" placeholder="Cari username...">
                                                        <button type="submit" class="btn btn-primary">Cari</button>
                                                    </div>
                                                </form>
                                                <table id="datatableStatus" class="table table-centered table-bordered table-hover dt-responsive nowrap" role="grid" aria-describedby="datatable_info">
                                                    <thead class="table-light">
                                                        <tr role="row">
                                                            <th width="20px" class="sorting_disabled sorting_asc" rowspan="1" colspan="1" style="width: 19px;" aria-label="Withdraw ID">Withdraw ID</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 107.8px;" aria-label="Username: activate to sort column ascending">Username</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 157.8px;" aria-label="Amount: activate to sort column ascending">Amount</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 91.8px;" aria-label="Status: activate to sort column ascending">Status</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 91.8px;" aria-label="Submission Date: activate to sort column ascending">Submission Date</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 69.8px;" aria-label="Action: activate to sort column ascending">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($withdraw = mysqli_fetch_assoc($resultWithdraws)) {
                                                            // Hanya tampilkan data jika statusnya adalah "Pending"
                                                            if ($withdraw['status'] === 'Pending') {
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $withdraw['id']; ?></td>
                                                                    <td><?php echo $withdraw['username']; ?></td>
                                                                    <td>(<?php echo number_format($withdraw['amount'], 0, ',', ','); ?>)</td>
                                                                    <td><?php echo $withdraw['status']; ?></td>
                                                                    <td><?php echo $withdraw['created_at']; ?></td>
                                                                    <td>
                                                                        <form method="post" action="">
                                                                            <input type="hidden" name="withdrawId" value="<?php echo $withdraw['id']; ?>">
                                                                            <select name="status">
                                                                                <option value="Pending" <?php echo ($withdraw['status'] === 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                                                                <option value="Approved" <?php echo ($withdraw['status'] === 'Approved') ? 'selected' : ''; ?>>Approved</option>
                                                                                <option value="Rejected" <?php echo ($withdraw['status'] === 'Rejected') ? 'selected' : ''; ?>>Rejected</option>
                                                                            </select>
                                                                            <button type="submit" name="updateStatus">Update</button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        } ?>
                                                    </tbody>
                                                </table>
                                                <p id="noDataMessageStatus" style="display: none; color: red;">Data yang anda cari tidak ada</p>
                                                <div class="pagination-container">
                                                    <button id="firstPageBtn" class="pagination-button">First</button>
                                                    <button id="prevPageBtn" class="pagination-button">Prev</button>
                                                    <span id="currentPage">1</span>
                                                    <button id="nextPageBtn" class="pagination-button">Next</button>
                                                    <button id="lastPageBtn" class="pagination-button">Last</button>
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

        <script>
            // ... (Skrip sebelumnya) ...

            // Pagination skrip JavaScript
            const itemsPerPage = 10;
            let currentPage = 1;

            function updateTableVisibility() {
                const tableRows = document.querySelectorAll('#datatableStatus tbody tr');
                const startIndex = (currentPage - 1) * itemsPerPage;
                const endIndex = startIndex + itemsPerPage;

                for (let i = 0; i < tableRows.length; i++) {
                    if (i >= startIndex && i < endIndex) {
                        tableRows[i].style.display = 'table-row';
                    } else {
                        tableRows[i].style.display = 'none';
                    }
                }
            }

            document.getElementById('firstPageBtn').addEventListener('click', function() {
                currentPage = 1;
                updateTableVisibility();
                document.getElementById('currentPage').innerText = currentPage;
            });

            document.getElementById('lastPageBtn').addEventListener('click', function() {
                const tableRows = document.querySelectorAll('#datatableStatus tbody tr');
                const totalRows = tableRows.length;
                currentPage = Math.ceil(totalRows / itemsPerPage);
                updateTableVisibility();
                document.getElementById('currentPage').innerText = currentPage;
            });

            document.getElementById('prevPageBtn').addEventListener('click', function() {
                if (currentPage > 1) {
                    currentPage--;
                    updateTableVisibility();
                    document.getElementById('currentPage').innerText = currentPage;
                }
            });

            document.getElementById('nextPageBtn').addEventListener('click', function() {
                const tableRows = document.querySelectorAll('#datatableStatus tbody tr');
                const totalRows = tableRows.length;
                const totalPages = Math.ceil(totalRows / itemsPerPage);
                if (currentPage < totalPages) {
                    currentPage++;
                    updateTableVisibility();
                    document.getElementById('currentPage').innerText = currentPage;
                }
            });

            // ... (Skrip sebelumnya) ...
        </script>

        <script>
            document.getElementById('searchFormStatus').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent form submission

                // Get the search input value and convert to lowercase
                const searchValue = document.getElementById('searchInputStatus').value.trim().toLowerCase();
                console.log("Search value:", searchValue);

                // Get all table rows
                const tableRows = document.querySelectorAll('#datatableStatus tbody tr');

                // Reset the display style of all table rows
                for (const row of tableRows) {
                    row.style.display = 'none'; // Hide all rows first
                }

                // Loop through table rows and show the matching ones based on the search value
                let displayedRows = 0;
                for (const row of tableRows) {
                    const usernameCell = row.querySelector('td:nth-child(2)');
                    if (usernameCell) {
                        const username = usernameCell.textContent.trim().toLowerCase();
                        console.log("Row username:", username);
                        if (username.includes(searchValue)) {
                            row.style.display = 'table-row';
                            displayedRows++;

                            // If displayedRows is already 10, break the loop to limit the displayed items
                            if (displayedRows >= 10) {
                                break;
                            }
                        }
                    }
                }

                // Tampilkan pesan "Data yang anda cari tidak ada" jika tidak ada data yang sesuai
                const noDataMessageStatus = document.getElementById('noDataMessageStatus');
                if (displayedRows === 0) {
                    noDataMessageStatus.style.display = 'block';
                } else {
                    noDataMessageStatus.style.display = 'none';
                }
            });
        </script>








        <?php
        $queryWithdraws = "SELECT * FROM withdraws ORDER BY created_at DESC";
        $resultWithdraws = mysqli_query($conn, $queryWithdraws);
        ?>

        <div class="page-title-box">
            <h4 class="page-title">Semua Riwayat Withdraw Pengguna</h4>
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
                                                <table id="datatableWithdraw" class="table table-centered table-bordered table-hover dt-responsive nowrap" role="grid" aria-describedby="datatable_info">
                                                    <thead class="table-light">
                                                        <tr role="row">
                                                            <th width="20px" class="sorting_disabled sorting_asc" rowspan="1" colspan="1" style="width: 19px;" aria-label="Withdraw ID">Withdraw ID</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 107.8px;" aria-label="Username: activate to sort column ascending">Username</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 157.8px;" aria-label="Amount: activate to sort column ascending">Amount</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 91.8px;" aria-label="Status: activate to sort column ascending">Status</th>
                                                            <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 91.8px;" aria-label="Created At: activate to sort column ascending">Created At</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php while ($withdraw = mysqli_fetch_assoc($resultWithdraws)) { ?>
                                                            <tr>
                                                                <td><?php echo $withdraw['id']; ?></td>
                                                                <td><?php echo $withdraw['username']; ?></td>
                                                                <td>(<?php echo number_format($withdraw['amount'], 0, ',', ','); ?>)</td>
                                                                <td><?php echo $withdraw['status']; ?></td>
                                                                <td><?php echo $withdraw['created_at']; ?></td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>

                                                </table>
                                                <p id="noDataMessage" style="display: none; color: red;">Data yang anda cari tidak ada</p>
                                                <div id="pagination"></div>
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

        <script>
            document.getElementById('searchForm').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent form submission

                // Get the search input value and convert to lowercase
                const searchValue = document.getElementById('searchInput').value.trim().toLowerCase();
                console.log("Search value:", searchValue);

                // Get all table rows
                const tableRows = document.querySelectorAll('#datatableWithdraw tbody tr');

                // Reset the display style of all table rows
                for (const row of tableRows) {
                    row.style.display = 'none'; // Hide all rows first
                }

                // Loop through table rows and show the matching ones based on the search value
                let displayedRows = 0;
                for (const row of tableRows) {
                    const usernameCell = row.querySelector('td:nth-child(2)');
                    if (usernameCell) {
                        const username = usernameCell.textContent.trim().toLowerCase();
                        console.log("Row username:", username);
                        if (username.includes(searchValue)) {
                            row.style.display = 'table-row';
                            displayedRows++;

                            // If displayedRows is already 10, break the loop to limit the displayed items
                            if (displayedRows >= 10) {
                                break;
                            }
                        }
                    }
                }

                // Tampilkan pesan "Data yang anda cari tidak ada" jika tidak ada data yang sesuai
                const noDataMessage = document.getElementById('noDataMessage');
                if (displayedRows === 0) {
                    noDataMessage.style.display = 'block';
                } else {
                    noDataMessage.style.display = 'none';
                }
            });
        </script>


        <script>
            // Dapatkan tabel dan baris dari tabel
            const table = document.getElementById('datatableWithdraw');
            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');

            // Tentukan berapa banyak data yang akan ditampilkan per halaman
            const dataPerHalaman = 10;
            let halamanSekarang = 1;

            // Fungsi untuk menampilkan data pada halaman tertentu
            function tampilkanData(halaman) {
                let mulai = (halaman - 1) * dataPerHalaman;
                let akhir = halaman * dataPerHalaman;

                for (let i = 0; i < rows.length; i++) {
                    if (i >= mulai && i < akhir) {
                        rows[i].style.display = 'table-row';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            }

            // Fungsi untuk membuat tombol pagination
            function buatTombolHalaman(jumlahHalaman) {
                let tombolPagination = '';

                for (let i = 1; i <= jumlahHalaman; i++) {
                    tombolPagination += `<button onclick="tampilkanData(${i})">${i}</button>`;
                }

                return tombolPagination;
            }

            // Fungsi untuk membuat tombol pagination termasuk tombol "First" dan "Last"
            function buatTombolHalaman(jumlahHalaman) {
                let tombolPagination = '';

                // Tombol "First"
                tombolPagination += `<button onclick="tampilkanData(1)">First</button>`;

                for (let i = 1; i <= jumlahHalaman; i++) {
                    tombolPagination += `<button onclick="tampilkanData(${i})">${i}</button>`;
                }

                // Tombol "Last"
                tombolPagination += `<button onclick="tampilkanData(${jumlahHalaman})">Last</button>`;

                return tombolPagination;
            }

            // Inisialisasi pagination
            function inisialisasiPagination() {
                const jumlahData = rows.length;
                const jumlahHalaman = Math.ceil(jumlahData / dataPerHalaman);

                // Tampilkan data halaman pertama saat halaman dimuat
                tampilkanData(halamanSekarang);

                // Buat tombol pagination dan tambahkan ke elemen dengan id "pagination"
                document.getElementById('pagination').innerHTML = buatTombolHalaman(jumlahHalaman);
            }

            // Panggil fungsi inisialisasiPagination untuk memulai pagination
            inisialisasiPagination();
        </script>