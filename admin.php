<?php
session_start();

include 'config.php';

$queryUsers = "SELECT * FROM users";
$resultUsers = mysqli_query($conn, $queryUsers);

// Ambil daftar pengguna
$queryUsers = "SELECT * FROM users";
$resultPengguna = mysqli_query($conn, $queryUsers);

// Mengambil data withdraws
$queryWithdraws = "SELECT * FROM withdraws";
$resultWithdraws = mysqli_query($conn, $queryWithdraws);


// Periksa apakah pengguna telah login dan memiliki level admin
if (!isset($_SESSION['username']) || $_SESSION['level'] != 'admin') {
    header('Location: index.php');
    exit;
}


// Ambil daftar banner dari database
$queryBanners = "SELECT * FROM banners";
$resultBanners = mysqli_query($conn, $queryBanners);


// Menghitung jumlah pengguna terdaftar
$queryCountUsers = "SELECT COUNT(*) as total FROM users";
$resultCountUsers = mysqli_query($conn, $queryCountUsers);
$rowCountUsers = mysqli_fetch_assoc($resultCountUsers);
$totalUsers = $rowCountUsers['total'];

// Mengambil jumlah saldo pengguna
$queryTotalBalance = "SELECT SUM(amount) as total_balance FROM deposits";
$resultTotalBalance = mysqli_query($conn, $queryTotalBalance);
$rowTotalBalance = mysqli_fetch_assoc($resultTotalBalance);
$totalBalance = $rowTotalBalance['total_balance'];

// Mengubah format totalBalance menjadi IDR
$formattedTotalBalance = 'IDR ' . number_format($totalBalance, 0, ',', '.');


// Mengambil jumlah total deposit pending pengguna
$queryTotalPendingDeposit = "SELECT SUM(amount) as total_pending_deposit FROM deposits WHERE status='Pending'";
$resultTotalPendingDeposit = mysqli_query($conn, $queryTotalPendingDeposit);
$rowTotalPendingDeposit = mysqli_fetch_assoc($resultTotalPendingDeposit);
$totalPendingDeposit = $rowTotalPendingDeposit['total_pending_deposit'];

// Mengubah format totalPendingDeposit menjadi IDR
$formattedTotalPendingDeposit = 'IDR ' . number_format($totalPendingDeposit, 0, ',', '.');

// Mengubah status withdraw pengguna
if (isset($_GET['changeWithdrawStatus']) && is_numeric($_GET['changeWithdrawStatus'])) {
    $withdrawId = $_GET['changeWithdrawStatus'];

    // Periksa apakah withdraw dengan ID yang diberikan ada dalam database
    $queryCheckWithdraw = "SELECT * FROM withdraws WHERE id=$withdrawId";
    $resultCheckWithdraw = mysqli_query($conn, $queryCheckWithdraw);

    if (mysqli_num_rows($resultCheckWithdraw) > 0) {
        // Dapatkan status withdraw saat ini
        $queryGetWithdrawStatus = "SELECT status FROM withdraws WHERE id=$withdrawId";
        $resultGetWithdrawStatus = mysqli_query($conn, $queryGetWithdrawStatus);
        $rowGetWithdrawStatus = mysqli_fetch_assoc($resultGetWithdrawStatus);
        $currentStatus = $rowGetWithdrawStatus['status'];

        // Ubah status withdraw menjadi kebalikannya (Pending menjadi Approved, Approved menjadi Pending)
        $newStatus = ($currentStatus == 'Pending') ? 'Approved' : 'Pending';

        // Perbarui status withdraw di database
        $queryUpdateWithdrawStatus = "UPDATE withdraws SET status='$newStatus' WHERE id=$withdrawId";
        mysqli_query($conn, $queryUpdateWithdrawStatus);

        // Redirect kembali ke halaman admin.php setelah mengubah status withdraw
        header('Location: admin.php');
        exit;
    } else {
        // Jika withdraw tidak ditemukan dalam database, tampilkan pesan error
        echo "Withdraw tidak ditemukan.";
    }
}

// Tambahkan banner baru
if (isset($_POST['submitAddBanner'])) {
    $imagePath = $_FILES['bannerImage']['tmp_name'];
    $altText = $_POST['bannerAltText'];

    // Simpan gambar ke direktori yang ditentukan (misalnya 'banner/')
    $newImagePath = 'banner/' . basename($_FILES['bannerImage']['name']);
    move_uploaded_file($imagePath, $newImagePath);

    // Tambahkan entri baru ke dalam tabel banners
    $queryAddBanner = "INSERT INTO banners (image_path, alt_text) VALUES ('$newImagePath', '$altText')";
    mysqli_query($conn, $queryAddBanner);

    // Redirect kembali ke halaman admin.php setelah menambahkan banner
    header('Location: admin.php');
    exit;
}

// Hapus banner
if (isset($_GET['deleteBanner']) && is_numeric($_GET['deleteBanner'])) {
    $bannerId = $_GET['deleteBanner'];

    // Periksa apakah banner dengan ID yang diberikan ada dalam database
    $queryCheckBanner = "SELECT * FROM banners WHERE id=$bannerId";
    $resultCheckBanner = mysqli_query($conn, $queryCheckBanner);

    if (mysqli_num_rows($resultCheckBanner) > 0) {
        // Hapus entri banner dari tabel banners
        $queryDeleteBanner = "DELETE FROM banners WHERE id=$bannerId";
        mysqli_query($conn, $queryDeleteBanner);

        // Hapus file gambar terkait jika diperlukan
        // (misalnya menggunakan fungsi unlink() untuk menghapus file dari direktori)

        // Redirect kembali ke halaman admin.php setelah menghapus banner
        header('Location: admin.php');
        exit;
    } else {
        // Jika banner tidak ditemukan dalam database, tampilkan pesan error
        echo "Banner tidak ditemukan.";
    }
}

$selectedCSS = ''; // Inisialisasi variabel dengan nilai kosong

// Periksa apakah ada session yang menyimpan pilihan CSS sebelumnya
if (isset($_SESSION['selectedCSS'])) {
    $selectedCSS = $_SESSION['selectedCSS'];
}

// Kemudian lanjutkan dengan skrip lainnya

// Periksa apakah ada permintaan untuk mengubah pilihan CSS
if (isset($_POST['updateCSS'])) {
    $selectedCSS = $_POST['cssOption'];
    $_SESSION['selectedCSS'] = $selectedCSS;
    // Lakukan validasi atau pemrosesan lainnya jika diperlukan

    echo '<script>alert("Pilihan CSS berhasil diperbarui!"); window.location.href = "admin.php";</script>';
}


// Mengubah status pengguna (Aktif atau Banned)
if (isset($_GET['changeStatus']) && is_numeric($_GET['changeStatus'])) {
    $userId = $_GET['changeStatus'];

    // Periksa apakah pengguna dengan ID yang diberikan ada dalam database
    $queryCheckUser = "SELECT * FROM users WHERE id=$userId";
    $resultCheckUser = mysqli_query($conn, $queryCheckUser);

    if (mysqli_num_rows($resultCheckUser) > 0) {
        // Dapatkan status pengguna saat ini
        $queryGetUserStatus = "SELECT status FROM users WHERE id=$userId";
        $resultGetUserStatus = mysqli_query($conn, $queryGetUserStatus);
        $rowGetUserStatus = mysqli_fetch_assoc($resultGetUserStatus);
        $currentStatus = $rowGetUserStatus['status'];

        // Ubah status pengguna menjadi kebalikannya (Aktif menjadi Banned, Banned menjadi Aktif)
        $newStatus = ($currentStatus == 'Aktif') ? 'Banned' : 'Aktif';

        // Perbarui status pengguna di database
        $queryUpdateUserStatus = "UPDATE users SET status='$newStatus' WHERE id=$userId";
        mysqli_query($conn, $queryUpdateUserStatus);

        // Redirect kembali ke halaman admin.php setelah mengubah status pengguna
        header('Location: admin.php');
        exit;
    } else {
        // Jika pengguna tidak ditemukan dalam database, tampilkan pesan error
        echo "Pengguna tidak ditemukan.";
    }
}

// Fungsi untuk mengubah nilai MINIMAL_DEPOSIT
function updateMinimalDeposit($newMinimalDeposit)
{
    // Simpan nilai MINIMAL_DEPOSIT baru ke dalam file konfigurasi
    $configFile = 'config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('MINIMAL_DEPOSIT', (.*)\);/", "define('MINIMAL_DEPOSIT', $newMinimalDeposit);", $configContent);
    file_put_contents($configFile, $updatedConfig);
}


// Fungsi untuk mengubah nama website
function updateWebsiteName($newName)
{
    // Simpan nama website baru ke dalam file konfigurasi
    $configFile = 'config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('WEBSITE_NAME', '(.*)'\);/", "define('WEBSITE_NAME', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}

function updateJenisCSS($newName)
{
    // Simpan nama website baru ke dalam file konfigurasi
    $configFile = 'config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('JENIS_CSS', '(.*)'\);/", "define('JENIS_CSS', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}

function updateWarnaCSS($newName)
{
    // Simpan nama website baru ke dalam file konfigurasi
    $configFile = 'config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('WARNA_CSS', '(.*)'\);/", "define('WARNA_CSS', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}

// Fungsi untuk mengubah logo website
function updateWebsiteLogo($newLogo)
{
    // Simpan logo website baru ke dalam direktori logo
    // Pastikan direktori logo sudah ada dan dapat ditulis
    $logoDir = 'logo/';
    if (!is_dir($logoDir)) {
        mkdir($logoDir);
    }

    $logoPath = $logoDir . basename($newLogo['name']);
    move_uploaded_file($newLogo['tmp_name'], $logoPath);

    // Simpan nama file logo baru ke dalam file konfigurasi
    $configFile = 'config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('WEBSITE_LOGO', '(.*)'\);/", "define('WEBSITE_LOGO', '$logoPath');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}

// Fungsi untuk mengubah favicon website
function updateWebsiteFavicon($newFavicon)
{
    // Simpan favicon website baru ke dalam direktori favicon
    // Pastikan direktori favicon sudah ada dan dapat ditulis
    $faviconDir = 'favicon/';
    if (!is_dir($faviconDir)) {
        mkdir($faviconDir);
    }

    $faviconPath = $faviconDir . basename($newFavicon['name']);
    move_uploaded_file($newFavicon['tmp_name'], $faviconPath);

    // Simpan nama file favicon baru ke dalam file konfigurasi
    $configFile = 'config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('WEBSITE_FAVICON', '(.*)'\);/", "define('WEBSITE_FAVICON', '$faviconPath');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}

// Periksa apakah ada permintaan untuk mengubah nilai MINIMAL_DEPOSIT
if (isset($_POST['updateMinimalDeposit'])) {
    $newMinimalDeposit = $_POST['minimalDeposit'];
    updateMinimalDeposit($newMinimalDeposit);

    // Tampilkan pesan sukses jika berhasil mengubah nilai MINIMAL_DEPOSIT
    echo "<script>alert('Nilai Minimal Deposit berhasil diperbarui!');</script>";
}


// Periksa apakah ada permintaan untuk mengubah nama website
if (isset($_POST['updateWebsiteName'])) {
    $newName = $_POST['websiteName'];
    updateWebsiteName($newName);
}

// Periksa apakah ada permintaan untuk mengubah nama website
if (isset($_POST['updateJenisCSS'])) {
    $newName = $_POST['jenisCSS'];
    updateJenisCSS($newName);
}

// Periksa apakah ada permintaan untuk mengubah nama website
if (isset($_POST['updateWarnaCSS'])) {
    $newName = $_POST['warnaCSS'];
    updateWarnaCSS($newName);
}

// Periksa apakah ada permintaan untuk mengubah logo website
if (isset($_FILES['updateWebsiteLogo'])) {
    $newLogo = $_FILES['updateWebsiteLogo'];
    updateWebsiteLogo($newLogo);
}

// Periksa apakah ada permintaan untuk mengubah favicon website
if (isset($_FILES['updateWebsiteFavicon'])) {
    $newFavicon = $_FILES['updateWebsiteFavicon'];
    updateWebsiteFavicon($newFavicon);
}

// Periksa apakah ada deposit Pending
$queryPendingDeposit = "SELECT * FROM deposits WHERE status='Pending'";
$resultPendingDeposit = mysqli_query($conn, $queryPendingDeposit);
if (mysqli_num_rows($resultPendingDeposit) > 0) {
    echo "<script>
        Swal.fire({
            title: 'Gagal!',
            text: 'Sedang ada deposit Pending, silakan coba lagi nanti!',
            icon: 'error'
        });
    </script>";
}

// Tambah pengguna
if (isset($_POST['addUser'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    // Periksa apakah username sudah ada di database
    $queryCheckUsername = "SELECT * FROM users WHERE username='$username'";
    $resultCheckUsername = mysqli_query($conn, $queryCheckUsername);
    if (mysqli_num_rows($resultCheckUsername) > 0) {
        // Set session untuk menandai username sudah ada
        $_SESSION['usernameExists'] = true;
        header('Location: admin.php');
        exit;
    } else {
        // Jika username belum ada, lanjutkan penambahan pengguna
        // Enkripsi password sebelum menyimpan ke database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $queryAddUser = "INSERT INTO users (username, password, level) VALUES ('$username', '$hashedPassword', '$level')";
        mysqli_query($conn, $queryAddUser);

        // Masukkan aktivitas admin ke dalam tabel user_activity
        $adminUsername = $_SESSION['username'];
        $activityType = 'Tambah Pengguna';
        $activityDetails = "Username: $username, Level: $level";
        insertActivity($adminUsername, $activityType, $activityDetails);

        // Tampilkan pesan SweetAlert
        echo "<script>
            Swal.fire({
                title: 'Sukses!',
                text: 'Pengguna berhasil ditambahkan!',
                icon: 'success'
            }).then(function() {
                window.location.href = 'admin.php';
            });
        </script>";
    }
}



// Hapus pengguna
if (isset($_GET['deleteUser']) && is_numeric($_GET['deleteUser'])) {
    $userId = $_GET['deleteUser'];

    // Hapus pengguna dari tabel users
    $queryDeleteUser = "DELETE FROM users WHERE id=$userId";
    mysqli_query($conn, $queryDeleteUser);

    // Hapus entri terkait di tabel user_balance (jika ada)
    $queryDeleteUserBalance = "DELETE FROM user_balance WHERE user_id=$userId";
    mysqli_query($conn, $queryDeleteUserBalance);

    echo '<script>alert("Pengguna berhasil dihapus!"); window.location.href = "admin.php";</script>';
}




// Ubah status deposit dari Pending menjadi Approved
if (isset($_GET['approveDeposit']) && is_numeric($_GET['approveDeposit'])) {
    $depositId = $_GET['approveDeposit'];

    // Periksa apakah deposit dengan ID yang diberikan ada dalam status Pending
    $queryCheckDeposit = "SELECT * FROM deposits WHERE id=$depositId AND status='Pending'";
    $resultCheckDeposit = mysqli_query($conn, $queryCheckDeposit);

    if (mysqli_num_rows($resultCheckDeposit) > 0) {
        // Ubah status deposit menjadi Approved
        $queryUpdateDeposit = "UPDATE deposits SET status='Approved' WHERE id=$depositId";
        mysqli_query($conn, $queryUpdateDeposit);

        // Masukkan aktivitas admin ke dalam tabel user_activity
        $adminUsername = $_SESSION['username'];
        $activityType = 'Deposit';
        $activityDetails = "Username: $username, Level: " . $user['level'];
        insertActivity($adminUsername, $activityType, $activityDetails);


        // Redirect kembali ke halaman admin.php setelah mengubah status deposit
        header('Location: admin.php');
        exit;
    } else {
        // Jika deposit tidak dalam status Pending, tampilkan pesan error
        echo "Deposit tidak ditemukan atau sudah diubah statusnya.";
    }
}




$queryPendingDeposits = "SELECT * FROM deposits WHERE status='Pending'";
$resultPendingDeposits = mysqli_query($conn, $queryPendingDeposits);


if (isset($_POST['submit'])) {
    $amount = $_POST['amount'];

    $queryDeposit = "INSERT INTO deposits (user_id, amount, status) VALUES ('" . $user['id'] . "', '$amount', 'Pending')";
    mysqli_query($conn, $queryDeposit);

    echo "Deposit berhasil diajukan!";
}


$queryActivities = "SELECT * FROM user_activity";
$resultActivities = mysqli_query($conn, $queryActivities);

function insertActivity($adminUsername, $activityType, $activityDetails)
{
    global $conn;


    $queryUser = "SELECT u.username FROM deposits d INNER JOIN users u ON d.user_id = u.id WHERE d.id = " . ['id'];




    $queryInsertActivity = "INSERT INTO user_activity (user_id, admin_username, activity_type, activity_details) VALUES ( '$adminUsername', '$activityType', '$activityDetails')";
    mysqli_query($conn, $queryInsertActivity);
}


function insertActivity2($adminUsername, $activityType, $activityDetails)
{
    global $conn;

    $queryInsertActivity = "INSERT INTO user_activity (admin_username, activity_type, activity_details) VALUES ('$adminUsername', '$activityType', '$activityDetails')";
    mysqli_query($conn, $queryInsertActivity);
}

if (isset($_POST['updateUser'])) {
    $username = $_POST['username'];
    $level = $_POST['level'];

    $adminUsername = $_SESSION['username'];
    $activityDate = date('Y-m-d H:i:s');
    $activityType = 'Update Pengguna';
    $activityDetails = "Username: $username, Level: $level";

    $queryInsertActivity = "INSERT INTO user_activity (user_id, admin_username, activity_date, activity_type, activity_details) VALUES ($userId, '$adminUsername', '$activityDate', '$activityType', '$activityDetails')";
    mysqli_query($conn, $queryInsertActivity);

    $queryUpdateUser = "UPDATE users SET username='$username', level='$level' WHERE id=$userId";
    mysqli_query($conn, $queryUpdateUser);

    echo "Pengguna berhasil diperbarui!";
}

if (isset($_POST['saveBankOptions'])) {
    $bankOptions = $_POST['bank_options'];

    foreach ($bankOptions as $bankId => $bankData) {
        $value = $bankData['value'];
        $att = $bankData['att'];
        $rek = $bankData['rek'];
        $label = $bankData['label'];

        if ($bankId == 'new') {
            $queryInsertBankOption = "INSERT INTO bank_options (value, att, rek, label) VALUES ('$value', '$att', '$rek', '$label')";
            mysqli_query($conn, $queryInsertBankOption);
        } else {
            $queryUpdateBankOption = "UPDATE bank_options SET value='$value', att='$att', rek='$rek', label='$label' WHERE id=$bankId";
            mysqli_query($conn, $queryUpdateBankOption);
        }
    }

    echo "<script>
        Swal.fire({
            title: 'Sukses!',
            text: 'Konfigurasi opsi bank berhasil disimpan.',
            icon: 'success'
        });
    </script>";
}

// Hapus konfigurasi opsi bank
if (isset($_GET['deleteBankOption']) && is_numeric($_GET['deleteBankOption'])) {
    $bankOptionId = $_GET['deleteBankOption'];

    $queryDeleteBankOption = "DELETE FROM bank_options WHERE id=$bankOptionId";
    mysqli_query($conn, $queryDeleteBankOption);

    header('Location: admin.php');
    exit;
}

$queryBankOptions = "SELECT * FROM bank_options";
$resultBankOptions = mysqli_query($conn, $queryBankOptions);

// Inisialisasi array untuk menyimpan data opsi bank
$bankOptionsData = [];

// Loop melalui hasil query dan simpan data opsi bank dalam array
while ($bankOption = mysqli_fetch_assoc($resultBankOptions)) {
    $bankOptionsData[] = $bankOption;
}

function updateBannerCarousel($conn, $newBannerCarousel)
{
    $bannerDir = 'banner/';
    if (!is_dir($bannerDir)) {
        mkdir($bannerDir);
    }

    $bannerPath = $bannerDir . basename($newBannerCarousel['name']);
    move_uploaded_file($newBannerCarousel['tmp_name'], $bannerPath);

    $queryUpdateBannerCarousel = "UPDATE configuration SET value='$bannerPath' WHERE key_name='banner_carousel'";
    mysqli_query($conn, $queryUpdateBannerCarousel);
}

if (isset($_FILES['updateBannerCarousel'])) {
    $newBannerCarousel = $_FILES['updateBannerCarousel'];
    updateBannerCarousel($conn, $newBannerCarousel);
}

if (isset($_POST['submitUpdateBanner'])) {
    $newBannerCarousel = $_FILES['updateBannerCarousel'];

    // Periksa apakah file banner berhasil diunggah
    if ($newBannerCarousel['error'] === UPLOAD_ERR_OK) {
        $bannerDir = 'banner/';
        if (!is_dir($bannerDir)) {
            mkdir($bannerDir);
        }

        $bannerPath = $bannerDir . basename($newBannerCarousel['name']);

        // Pindahkan file banner ke direktori yang ditentukan
        if (move_uploaded_file($newBannerCarousel['tmp_name'], $bannerPath)) {
            // Update nilai banner carousel ke dalam database
            $queryUpdateBannerCarousel = "UPDATE configuration SET value='$bannerPath' WHERE key_name='banner_carousel'";
            mysqli_query($conn, $queryUpdateBannerCarousel);

            echo "<script>alert('Banner berhasil diupdate!');</script>";
        } else {
            echo "<script>alert('Terjadi kesalahan saat mengunggah banner.');</script>";
        }
    } else {
        echo "<script>alert('Terjadi kesalahan saat mengunggah banner.');</script>";
    }
}

// Ambil daftar banner dari database
$queryBannersMobile = "SELECT * FROM banners";
$resultBannersMobile = mysqli_query($conn, $queryBannersMobile);

// Ambil daftar banner dari database
$queryBannersDesktop = "SELECT * FROM bannersdesktop";
$resultBannersDesktop = mysqli_query($conn, $queryBannersDesktop);


// Tambahkan banner baru
if (isset($_POST['submitAddBannerDesktop'])) {
    $imagePath = $_FILES['bannerImage']['tmp_name'];
    $altText = $_POST['bannerAltText'];

    // Simpan gambar ke direktori yang ditentukan (misalnya 'banner/')
    $newImagePath = 'bannerdesktop/' . basename($_FILES['bannerImage']['name']);
    move_uploaded_file($imagePath, $newImagePath);

    // Tambahkan entri baru ke dalam tabel banners
    $queryAddBanner = "INSERT INTO bannersdesktop (image_path, alt_text) VALUES ('$newImagePath', '$altText')";
    mysqli_query($conn, $queryAddBanner);

    // Redirect kembali ke halaman admin.php setelah menambahkan banner
    header('Location: admin.php');
    exit;
}

// Hapus banner
if (isset($_GET['deleteBanner']) && is_numeric($_GET['deleteBanner'])) {
    $bannerId = $_GET['deleteBanner'];

    // Periksa apakah banner dengan ID yang diberikan ada dalam database
    $queryCheckBanner = "SELECT * FROM bannersdesktop WHERE id=$bannerId";
    $resultCheckBanner = mysqli_query($conn, $queryCheckBanner);

    if (mysqli_num_rows($resultCheckBanner) > 0) {
        // Hapus entri banner dari tabel banners
        $queryDeleteBanner = "DELETE FROM bannersdesktop WHERE id=$bannerId";
        mysqli_query($conn, $queryDeleteBanner);

        // Hapus file gambar terkait jika diperlukan
        // (misalnya menggunakan fungsi unlink() untuk menghapus file dari direktori)

        // Redirect kembali ke halaman admin.php setelah menghapus banner
        header('Location: admin.php');
        exit;
    } else {
        // Jika banner tidak ditemukan dalam database, tampilkan pesan error
        echo "Banner tidak ditemukan.";
    }
}

// Hapus accordion
if (isset($_GET['deleteAccordion']) && is_numeric($_GET['deleteAccordion'])) {
    $accordionId = $_GET['deleteAccordion'];

    // Periksa apakah accordion dengan ID yang diberikan ada dalam database
    $queryCheckAccordion = "SELECT * FROM accordions WHERE id=$accordionId";
    $resultCheckAccordion = mysqli_query($conn, $queryCheckAccordion);

    if (mysqli_num_rows($resultCheckAccordion) > 0) {
        // Hapus entri accordion dari tabel accordions
        $queryDeleteAccordion = "DELETE FROM accordions WHERE id=$accordionId";
        mysqli_query($conn, $queryDeleteAccordion);

        // Hapus file gambar terkait jika diperlukan
        // (misalnya menggunakan fungsi unlink() untuk menghapus file dari direktori)

        // Redirect kembali ke halaman admin.php setelah menghapus accordion
        header('Location: admin.php');
        exit;
    } else {
        // Jika accordion tidak ditemukan dalam database, tampilkan pesan error
        echo "Accordion tidak ditemukan.";
    }
}


  


?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin <?php echo WEBSITE_NAME; ?></title>
    <link rel="icon" href="<?php echo WEBSITE_FAVICON; ?>">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/admin.css">



</head>

<body>

    <h2>Tambah Accordion</h2>
    <form action="add_accordion.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="image">Gambar:</label>
            <input type="file" name="image" id="image" required>
        </div>
        <div>
            <label for="alt_text">Teks Alternatif:</label>
            <input type="text" name="alt_text" id="alt_text" required>
        </div>
        <div>
            <label for="alt_text">Judul:</label>
            <input type="text" name="title" id="title" required>
        </div>
        <div>
            <label for="description">Keterangan:</label>
            <textarea name="description" id="description" rows="4" required></textarea>
        </div>
        <button type="submit" name="submit">Tambah Accordion</button>
    </form>

    <?php
    // Mengambil data accordions
    $queryAccordions = "SELECT * FROM accordions";
    $resultAccordions = mysqli_query($conn, $queryAccordions);
    ?>

    <h2>Daftar Accordion</h2>
    <table>
        <thead>
            <tr>
                <th>Judul</th>
                <th>Gambar</th>
                <th>Teks Alternatif</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($accordion = mysqli_fetch_assoc($resultAccordions)) : ?>
                <tr>
                    <td><?php echo $accordion['title']; ?></td>
                    <td><img src="<?php echo $accordion['image_path']; ?>" alt="<?php echo $accordion['alt_text']; ?>" width="100"></td>
                    <td><?php echo $accordion['alt_text']; ?></td>
                    <td>
                        <form action="admin.php" method="post">
                            <textarea name="description"><?php echo $accordion['description']; ?></textarea>
                            <input type="hidden" name="accordionId" value="<?php echo $accordion['id']; ?>">
                            <input type="submit" name="updateAccordion" value="Simpan">
                        </form>
                    </td>
                    <td>
                        <a href="admin.php?deleteAccordion=<?php echo $accordion['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus accordion ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <?php
    // Update keterangan accordion
    if (isset($_POST['updateAccordion'])) {
        $accordionId = $_POST['accordionId'];
        $description = $_POST['description'];

        $queryUpdateAccordion = "UPDATE accordions SET description='$description' WHERE id=$accordionId";
        $resultUpdate = mysqli_query($conn, $queryUpdateAccordion);

        if ($resultUpdate) {
            echo '<script>alert("Keterangan accordion berhasil diperbarui!"); window.location.href = "admin.php";</script>';
        } else {
            echo '<script>alert("Keterangan accordion gagal diperbarui!"); window.location.href = "admin.php";</script>';
        }
    }

    ?>

    <h2>Mobile banner</h2>
    <form method="POST" enctype="multipart/form-data">
        <label for="bannerImage">Pilih gambar banner:</label>
        <input type="file" name="bannerImage" id="bannerImage" accept="image/*" required>
        <label for="bannerAltText">Alt Text:</label>
        <input type="text" name="bannerAltText" id="bannerAltText" required>
        <button type="submit" name="submitAddBanner">Tambah Banner</button>
        <?php
        while ($banner = mysqli_fetch_assoc($resultBannersMobile)) {
            echo '<img src="' . $banner['image_path'] . '" alt="' . $banner['alt_text'] . '">';
            echo '<a href="admin.php?deleteBanner=' . $banner['id'] . '">Hapus</a>';
        }
        ?>
    </form>
    <br>
    <br>

    <h2>Desktop banner</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="bannerImage">Pilih gambar banner:</label>
        <input type="file" name="bannerImage" id="bannerImage" accept="image/*" required>
        <label for="bannerAltText">Alt Text:</label>
        <input type="text" name="bannerAltText" id="bannerAltText" required>
        <button type="submit" name="submitAddBannerDesktop">Tambah Banner</button>
        <?php
        while ($banner = mysqli_fetch_assoc($resultBannersDesktop)) {
            echo '<img src="' . $banner['image_path'] . '" alt="' . $banner['alt_text'] . '">';
            echo '<a href="admin.php?deleteBanner=' . $banner['id'] . '">Hapus</a>';
        }
        ?>
    </form>

    <form action="" method="post">
        <label for="warnaCSS">Warna Template Website:</label>
        <select name="warnaCSS" id="cssOption">
            <option value="light" <?php echo (WARNA_CSS == 'light') ? 'selected' : ''; ?>>(DEFAULT) WHITE</option>
            <option value="dark" <?php echo (WARNA_CSS == 'dark') ? 'selected' : ''; ?>>BLACK</option>

        </select>

        <button type="submit" name="updateWarnaCSS">Ubah</button>
    </form>
    <?php
    if (isset($_POST['updateWarnaCSS'])) {
        // Lakukan pemrosesan atau validasi lainnya jika diperlukan

        echo '<script>alert("Warna CSS berhasil diperbarui!"); window.location.href = "admin.php";</script>';
    }
    ?>

    <form action="" method="post">
        <label for="jenisCSS">Jenis Template Website:</label>
        <select name="jenisCSS" id="cssOption">

            <option value="BW" <?php echo (JENIS_CSS == 'BW') ? 'selected' : ''; ?>>(DEFAULT) BLUE WHITE (for WHITE)</option>
            <option value="BY" <?php echo (JENIS_CSS == 'BY') ? 'selected' : ''; ?>>YELLOW WHITE (for WHITE)</option>
            <option value="GG" <?php echo (JENIS_CSS == 'GG') ? 'selected' : ''; ?>>GREEN BLACK (for BLACK)</option>
            <option value="OD" <?php echo (JENIS_CSS == 'OD') ? 'selected' : ''; ?>>BROWN YELLOW BLACK (for BLACK)</option>
            <option value="PN" <?php echo (JENIS_CSS == 'PN') ? 'selected' : ''; ?>>PURPLE BLACK (for BLACK)</option>
        </select>

        <button type="submit" name="updateJenisCSS">Ubah</button>
    </form>
    <?php
    if (isset($_POST['updateJenisCSS'])) {
        // Lakukan pemrosesan atau validasi lainnya jika diperlukan

        echo '<script>alert("Jenis CSS berhasil diperbarui!"); window.location.href = "admin.php";</script>';
    }
    ?>


    





    <img src="<?php echo WEBSITE_LOGO; ?>" alt="Logo Website">
    <div class="container">
        <h1>Halaman Admin</h1>

        <div class="box">
            <h3>Jumlah Pengguna Terdaftar</h3>
            <p><?php echo $totalUsers; ?></p>
        </div>

        <div class="box">
            <h3>Jumlah Saldo Pengguna</h3>
            <p><?php echo $formattedTotalBalance; ?></p>
        </div>

        <div class="box">
            <h3>Total Deposit Pending</h3>
            <p><?php echo $formattedTotalPendingDeposit; ?>,-</p>
        </div>

        <form method="POST" enctype="multipart/form-data">
            <label for="bannerImage">Pilih gambar banner:</label>
            <input type="file" name="bannerImage" id="bannerImage" accept="image/*" required>
            <label for="bannerAltText">Alt Text:</label>
            <input type="text" name="bannerAltText" id="bannerAltText" required>
            <button type="submit" name="submitAddBanner">Tambah Banner</button>
            <?php
            while ($banner = mysqli_fetch_assoc($resultBanners)) {
                echo '<img src="' . $banner['image_path'] . '" alt="' . $banner['alt_text'] . '">';
                echo '<a href="admin.php?deleteBanner=' . $banner['id'] . '">Hapus</a>';
            }
            ?>
        </form>



        <h3>Daftar Withdraws</h3>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Jumlah</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($withdraw = mysqli_fetch_assoc($resultWithdraws)) { ?>
                    <tr>
                        <td><?php echo $withdraw['id']; ?></td>
                        <td><?php echo $withdraw['username']; ?></td>
                        <td><?php echo $withdraw['amount']; ?></td>
                        <td><?php echo $withdraw['status']; ?></td>
                        <td>
                            <?php if ($withdraw['status'] == 'Pending') { ?>
                                <a href="admin.php?changeWithdrawStatus=<?php echo $withdraw['id']; ?>">Ubah Status</a>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>


        <h2>Status Akun Pengguna</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php while ($user = mysqli_fetch_assoc($resultUsers)) :
                $status = $user['status'];



            ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $status; ?></td>
                    <td>
                        <a href="admin.php?changeStatus=<?php echo $user['id']; ?>">
                            <?php echo ($status == 'Aktif') ? 'Banned' : 'Aktif'; ?>
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>

        <h2>Daftar Pengguna</h2>
        <div class="search-container">
            <input type="text" id="searchInput" placeholder="Cari username...">
            <span class="search-icon">
                <i class="fas fa-search"></i>
            </span>
        </div>
        <table id="userTable">
            <thead>
                <tr>
                    <th>ID</th>
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
                        $formattedBalance = '' . number_format($balance, 0, ',', '.');
                        ?>
                        <td><?php echo $formattedBalance; ?></td>
                        <td>
                            <a href="edit_user.php?id=<?php echo $user['id']; ?>" onclick="showEditUser(event)">Edit</a>
                            <!-- Tambahkan link untuk mengedit saldo pengguna -->
                            <a href="edit_balance.php?id=<?php echo $user['id']; ?>" class="edit-balance">Edit Saldo</a>
                            <a href="?deleteUser=<?php echo $user['id']; ?>" onclick="showPleaseWait(event)">Hapus</a>
                        </td>
                    </tr>
                <?php endwhile; ?>

            </tbody>
        </table>

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

        <h2>History Aktivitas Admin</h2>
        <?php
        // Konfigurasi jumlah baris yang ditampilkan per halaman
        $rowsPerPage = 10;

        // Hitung jumlah total baris aktivitas admin
        $totalRows = mysqli_num_rows($resultActivities);

        // Hitung jumlah halaman
        $totalPages = ceil($totalRows / $rowsPerPage);

        // Tentukan halaman saat ini
        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $currentPage = $_GET['page'];
            if ($currentPage < 1) {
                $currentPage = 1;
            } elseif ($currentPage > $totalPages) {
                $currentPage = $totalPages;
            }
        } else {
            $currentPage = 1;
        }

        // Hitung indeks baris awal dan akhir untuk halaman saat ini
        $startIndex = ($currentPage - 1) * $rowsPerPage;
        $endIndex = $startIndex + $rowsPerPage - 1;
        if ($endIndex >= $totalRows) {
            $endIndex = $totalRows - 1;
        }

        // Ambil data aktivitas admin berdasarkan halaman saat ini (diurutkan berdasarkan tanggal descending)
        $queryActivitiesPage = "SELECT * FROM user_activity ORDER BY activity_date DESC LIMIT $startIndex, $rowsPerPage";
        $resultActivitiesPage = mysqli_query($conn, $queryActivitiesPage);

        // Periksa apakah ada aktivitas admin yang tersedia
        if (mysqli_num_rows($resultActivitiesPage) > 0) :
        ?>
            <table>
                <?php if (mysqli_num_rows($resultActivitiesPage) > 0) : ?>
                    <tr>
                        <th>ID</th>
                        <th>Admin</th>
                        <th>Tanggal</th>
                        <th>Aktivitas</th>
                        <th>Detail</th>
                    </tr>
                    <?php while ($activity = mysqli_fetch_assoc($resultActivitiesPage)) : ?>
                        <tr>
                            <td><?php echo $activity['id']; ?></td>
                            <td><?php echo $activity['admin_username']; ?></td>
                            <td><?php echo $activity['activity_date']; ?></td>
                            <td><?php echo $activity['activity_type']; ?></td>
                            <td><?php echo $activity['activity_details']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="5">Tidak ada aktivitas admin yang tersedia.</td>
                    </tr>
                <?php endif; ?>

                <tr>
                    <td colspan="5" style="text-align: center;">
                        <?php if ($currentPage > 1) : ?>
                            <a href="?page=<?php echo $currentPage - 1; ?>">Sebelumnya</a>
                        <?php endif; ?>

                        <?php
                        $startPage = max(1, $currentPage - 5);
                        $endPage = min($startPage + 9, $totalPages);

                        if ($startPage > 1) :
                        ?>
                            <a href="?page=1">1</a>
                            <span>...</span>
                        <?php endif; ?>

                        <?php for ($i = $startPage; $i <= $endPage; $i++) : ?>
                            <?php if ($i == $currentPage) : ?>
                                <span><?php echo $i; ?></span>
                            <?php else : ?>
                                <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                            <?php endif; ?>
                        <?php endfor; ?>

                        <?php if ($endPage < $totalPages) : ?>
                            <span>...</span>
                            <a href="?page=<?php echo $totalPages; ?>"><?php echo $totalPages; ?></a>
                        <?php endif; ?>

                        <?php if ($currentPage < $totalPages) : ?>
                            <a href="?page=<?php echo $currentPage + 1; ?>">Selanjutnya</a>
                        <?php endif; ?>
                    </td>
                </tr>
            </table>
        <?php else : ?>
            <p>Tidak ada aktivitas admin yang tersedia.</p>
        <?php endif; ?>
        <br>
        <br>



        <h2>Deposit Pending</h2>
        <div id="depositTable">

            <?php if (mysqli_num_rows($resultPendingDeposits) > 0) : ?>
                <table>
                    <tr>
                        <th>ID Deposit</th>
                        <th>Username</th>
                        <th>Nominal</th>
                        <th>Tgl Pengajuan</th>
                        <th>Dari</th>
                        <th>Tujuan Deposit</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
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
                            <td>IDR (<?php echo $deposit['amount']; ?>)</td>
                            <td><?php echo $deposit['created_at']; ?></td>
                            <td><?php echo $deposit['bank_name'] . ' - ' . $deposit['acc_no'] . ' - ' . $deposit['fullname']; ?></td>
                            <td><?php echo $deposit['destination']; ?></td>

                            <td>
                                <a class="action-button" href="admin.php?approveDeposit=<?php echo $deposit['id']; ?>">Approve</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>

                </table>
            <?php else : ?>
                <p>Tidak ada deposit pending saat ini.</p>
            <?php endif; ?>
        </div>
        <audio id="notificationSound">
            <source src="bel.mp3" type="audio/mpeg">
        </audio>

        <h2>Konfigurasi Opsi Bank</h2>
        <form method="POST" action="">
            <table>
                <tr>
                    <th>No.</th>
                    <th>Nama Bank/Ewallet</th>
                    <th>Nomor Rekening</th>
                    <th>Nama Rekening</th>
                    <th>Catatan Tambahan</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach ($bankOptionsData as $index => $bankOption) : ?>
                    <tr>
                        <td><?php echo $index + 1; ?></td>
                        <td><input type="text" name="bank_options[<?php echo $bankOption['id']; ?>][value]" value="<?php echo $bankOption['value']; ?>"></td>
                        <td><input type="text" name="bank_options[<?php echo $bankOption['id']; ?>][att]" value="<?php echo $bankOption['att']; ?>"></td>
                        <td><input type="text" name="bank_options[<?php echo $bankOption['id']; ?>][rek]" value="<?php echo $bankOption['rek']; ?>"></td>
                        <td><input type="text" name="bank_options[<?php echo $bankOption['id']; ?>][label]" value="<?php echo $bankOption['label']; ?>"></td>
                        <td><a href="?deleteBankOption=<?php echo $bankOption['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td><?php echo count($bankOptionsData) + 1; ?></td>
                    <td><input type="text" name="bank_options[new][value]" required></td>
                    <td><input type="text" name="bank_options[new][att]" required></td>
                    <td><input type="text" name="bank_options[new][rek]" required></td>
                    <td><input type="text" name="bank_options[new][label]"></td>
                    <td></td>
                </tr>
            </table>

            <input type="submit" name="saveBankOptions" value="Simpan">
        </form>



        <select name="bank">
            <?php foreach ($bankOptionsData as $bankOption) : ?>
                <option value="<?php echo $bankOption['value']; ?>" att="<?php echo $bankOption['att']; ?>" rek="<?php echo $bankOption['rek']; ?>"><?php echo $bankOption['label']; ?> <?php echo $bankOption['value']; ?>-<?php echo $bankOption['att']; ?>-<?php echo $bankOption['rek']; ?> <?php echo $bankOption['label']; ?></option>
            <?php endforeach; ?>
        </select>

        <br>

        <h2>Tambah Pengguna</h2>
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

        <div class="outer-border">
            <div class="form-box">
                <!-- Form untuk mengubah minimal deposit -->
                <form action="" method="post">
                    <label for="minimalDeposit">Minimal Deposit:</label>
                    <input type="number" name="minimalDeposit" id="minimalDeposit" value="<?php echo MINIMAL_DEPOSIT; ?>" required>
                    <button type="submit" name="updateMinimalDeposit">Ubah</button>
                </form>

                <!-- Form untuk mengubah nama website -->
                <form action="" method="post">
                    <label for="websiteName">Nama Website:</label>
                    <input type="text" name="websiteName" id="websiteName" value="<?php echo WEBSITE_NAME; ?>" required>
                    <button type="submit" name="updateWebsiteName">Ubah</button>
                </form>

                <!-- Form untuk mengubah logo website -->
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="websiteLogo">Logo Website:</label>
                    <input type="file" name="updateWebsiteLogo" id="websiteLogo" required>
                    <?php echo WEBSITE_LOGO; ?>
                    <button type="submit" name="updateLogo">Ubah</button>
                </form>

                <!-- Form untuk mengubah favicon website -->
                <form action="" method="post" enctype="multipart/form-data">
                    <label for="websiteFavicon">Favicon Website:</label>
                    <input type="file" name="updateWebsiteFavicon" id="websiteFavicon" required>
                    <?php echo WEBSITE_FAVICON; ?>
                    <button type="submit" name="updateFavicon">Ubah</button>
                </form>
            </div>
        </div>

        <h1>Edit Banner Carousel</h1>
        <!-- Form untuk mengubah banner carousel -->
        <form action="" method="post" enctype="multipart/form-data">
            <label for="updateBannerCarousel">Update Banner Carousel:</label>
            <input type="file" name="updateBannerCarousel" id="updateBannerCarousel">
            <button type="submit" name="submitUpdateBanner">Update</button>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>



    <script>
        // Periksa apakah ada deposit Pending
        <?php
        $queryPendingDeposit = "SELECT * FROM deposits WHERE status='Pending'";
        $resultPendingDeposit = mysqli_query($conn, $queryPendingDeposit);
        if (mysqli_num_rows($resultPendingDeposit) > 0) {
            echo "Swal.fire({
            title: 'Gagal!',
            text: 'Sedang ada deposit Pending, silakan coba lagi nanti!',
            icon: 'error'
        });";
        }
        ?>
    </script>

    <?php if (isset($_POST['addUser'])) : ?>
        <script>
            // Tampilkan animasi loading
            Swal.fire({
                title: 'Please Wait',
                html: 'Mengirim data...',
                icon: 'info',
                allowOutsideClick: false,
                showConfirmButton: false,
                onBeforeOpen: () => {
                    Swal.showLoading();
                }
            });

            // Penundaan selama 2 detik sebelum menampilkan pesan SweetAlert
            setTimeout(function() {
                Swal.fire({
                    title: 'Sukses!',
                    text: 'Pengguna <?php echo $_POST['username']; ?> berhasil ditambahkan!',
                    icon: 'success'
                }).then(function() {
                    window.location.href = 'admin.php';
                });
            }, 2000);
        </script>
    <?php endif; ?>



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
        const userTable = document.getElementById('userTable');

        // Tambahkan event listener saat input pencarian berubah
        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase();
            const rows = userTable.getElementsByTagName('tr');

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
    <script src="script.js"></script>

</body>

</html>