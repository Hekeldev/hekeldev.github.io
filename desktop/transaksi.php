<?php
session_start();
include '../config.php';

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

$queryWithdraws = "SELECT * FROM withdraws WHERE username='$username' ORDER BY created_at DESC";

$resultWithdraws = mysqli_query($conn, $queryWithdraws);

// Mengubah format saldo menjadi IDR
$formattedBalance = 'IDR ' . number_format($balance, 0, ',', '.');

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

<span class="content">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <strong><span class="glyphicon glyphicon-tasks"></span>History Deposit</strong>
            <span style="float:right; margin-top:-4px; width:245px; display:inline">
                <form class="form-group-sm">
                    <label style="float:left; margin-top:3px; margin-right:10px;">Filter</label>
                    <select class="form-control" id="historyfilter" style="width:200px; height:25px; border-radius:3px; float:right">
                        <option value="">Semua</option>
                    </select>
                </form>
            </span>
        </div>
        <div class="panel-body">
            <?php
            $counter = 1;

            $queryApproved = "SELECT * FROM deposits WHERE user_id='$userId' AND status='Approved' ORDER BY created_at DESC";
            $resultApproved = mysqli_query($conn, $queryApproved);

            $queryPending = "SELECT * FROM deposits WHERE user_id='$userId' AND status='Pending' ORDER BY created_at DESC";
            $resultPending = mysqli_query($conn, $queryPending);

            function formatCurrency($amount)
            {
                return  number_format($amount, 0, ',', ',');
            }

            ?>


            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Pasaran / Games</th>
                        <th>Bet ID / Games ID</th>
                        <th>Deskripsi</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th>Balance</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $counter = 1;

                    // Query untuk menggabungkan data dari ketiga tabel berdasarkan tanggal terbaru
                    $queryCombined = "SELECT * FROM (
    SELECT user_id, destination, amount, 'Approved' AS status, created_at FROM deposits WHERE status='Approved'
    UNION ALL
    SELECT user_id, destination, amount, 'Progress' AS status, created_at FROM deposits WHERE status='Pending'
    UNION ALL
    SELECT user_id, destination, amount, 'Rejected' AS status, created_at FROM deposits WHERE status='Rejected'
) AS combined_data
WHERE user_id='" . $user['id'] . "'
ORDER BY created_at DESC";

                    $resultCombined = mysqli_query($conn, $queryCombined);

                    while ($rowData = mysqli_fetch_assoc($resultCombined)) {
                        $amount = $rowData['amount'];
                        $formattedAmount = formatCurrency($amount);
                        $created_at = $rowData['created_at'];
                        $destination = $rowData['destination'];
                        $status = $rowData['status'];
                    ?>
                        <tr>
                            <td class="text-primary" style="vertical-align:middle"><?php echo $counter; ?></td>
                            <td class="text-success" style="vertical-align:middle"><?php echo $created_at; ?></td>
                            <td class="text-info" style="vertical-align:middle"> - </td>
                            <td class="text-warning" style="vertical-align:middle">5</td>
                            <td style="vertical-align:middle"><strong>Deposit: <?php echo strtoupper($status); ?> <?php echo $destination; ?> (<?php echo $formattedAmount; ?>)</strong></td>
                            <td align="right" class="text-success" style="vertical-align:middle">0</td>
                            <td align="right" class="text-danger" style="vertical-align:middle">0</td>
                            <td align="right" class="text-info" style="vertical-align:middle">0</td>
                            <td align="right"></td>
                        </tr>
                    <?php
                        $counter++;
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>


    <script>
        // Tambahkan skrip berikut untuk menangani fungsi pagination
        var currentPage = 1;
        var rowsPerPage = 10;

        // Menghitung jumlah halaman berdasarkan data yang ada
        var totalRows = <?php echo mysqli_num_rows($resultCombined); ?>;
        var totalPages = Math.ceil(totalRows / rowsPerPage);

        // Fungsi untuk menampilkan data pada halaman tertentu
        function showPage(page) {
            var start = (page - 1) * rowsPerPage;
            var end = start + rowsPerPage;

            var tableRows = document.querySelectorAll('#datatableWithdraw tbody tr');
            for (var i = 0; i < tableRows.length; i++) {
                if (i >= start && i < end) {
                    tableRows[i].style.display = 'table-row';
                } else {
                    tableRows[i].style.display = 'none';
                }
            }

            // Update teks halaman saat ini
            document.getElementById('currentPage').textContent = page;
        }

        // Panggil fungsi showPage untuk menampilkan data pada halaman pertama
        showPage(currentPage);

        // Event listener untuk tombol First
        document.getElementById('firstPageBtn').addEventListener('click', function() {
            currentPage = 1;
            showPage(currentPage);
        });

        // Event listener untuk tombol Last
        document.getElementById('lastPageBtn').addEventListener('click', function() {
            currentPage = totalPages;
            showPage(currentPage);
        });

        // Event listener untuk tombol Next
        document.getElementById('nextPageBtn').addEventListener('click', function() {
            if (currentPage < totalPages) {
                currentPage++;
                showPage(currentPage);
            }
        });

        // Event listener untuk tombol Prev
        document.getElementById('prevPageBtn').addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                showPage(currentPage);
            }
        });
    </script>

</span>


<span class="content">
    <div class="panel panel-danger">
        <div class="panel-heading">
            <strong><span class="glyphicon glyphicon-tasks"></span>History Withdraw</strong>
            <span style="float:right; margin-top:-4px; width:245px; display:inline">
                <form class="form-group-sm">
                    <label style="float:left; margin-top:3px; margin-right:10px;">Filter</label>
                    <select class="form-control" id="historyfilter" style="width:200px; height:25px; border-radius:3px; float:right">
                        <option value="">Semua</option>
                        <!-- Opsi lainnya -->
                    </select>
                </form>
            </span>
        </div>

        <div class="panel-body">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tanggal</th>
                        <th>Pasaran / Games</th>
                        <th>Username</th>
                        <th>Deskripsi</th>
                        <th>Debit</th>
                        <th>Kredit</th>
                        <th>Nominal</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($withdraw = mysqli_fetch_assoc($resultWithdraws)) { ?>
                        <tr>
                        <td class="text-primary" style="vertical-align:middle"><?php echo $withdraw['id']; ?></td>
                            <td class="text-success" style="vertical-align:middle"><?php echo $withdraw['created_at']; ?></td>
                            <td class="text-info" style="vertical-align:middle"> - </td>
                            <td class="text-warning" style="vertical-align:middle"><?php echo $withdraw['username']; ?></td>
                            <td style="vertical-align:middle"><strong>Withdraw: <?php echo $withdraw['status']; ?> <?php echo $user['bank_name']; ?> (<?php echo number_format($withdraw['amount'], 0, ',', ','); ?>)</strong></td>
                            <td align="right" class="text-success" style="vertical-align:middle">0</td>
                            <td align="right" class="text-danger" style="vertical-align:middle">0</td>
                            <td align="right" class="text-info" style="vertical-align:middle">0</td>
                            <td align="right"></td>






                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <ul class="pagination">
        <li><a href="javascript:getTransaksi('1')">First</a></li>
        <li class="active"><a href="">1</a></li>
        <li><a href="javascript:getTransaksi('1')">Last ( 1 )</a></li>
    </ul>
    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</span>