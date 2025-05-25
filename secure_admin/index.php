<?php
session_start();
include '../config.php';

$level = $_SESSION['level'];


$queryUsers = "SELECT * FROM users";
$resultUsers = mysqli_query($conn, $queryUsers);

// Ambil daftar pengguna
$queryUsers = "SELECT * FROM users";
$resultPengguna = mysqli_query($conn, $queryUsers);

// Mengambil data withdraws
$queryWithdraws = "SELECT * FROM withdraws";
$resultWithdraws = mysqli_query($conn, $queryWithdraws);

/// Periksa apakah tombol "Simpan" telah ditekan
if (isset($_POST['saveMaintenance'])) {
    // Periksa apakah checkbox maintenance diaktifkan
    $maintenanceStatus = isset($_POST['maintenance']) ? true : false;

    // Atur status maintenance sesuai dengan pilihan pengguna
    setMaintenanceMode($maintenanceStatus);

    // Tampilkan alert
    echo "<script>alert('Status maintenance telah diubah.'); window.location.href = '?PAY4D=status_website';</script>";
}

// Fungsi untuk mengatur status maintenance
function setMaintenanceMode($status)
{
    // Jika status true, simpan "true" di file maintenance.txt
    // Jika status false, simpan "false" di file maintenance.txt
    file_put_contents('maintenance.txt', ($status ? 'true' : 'false'));
}

// Fungsi untuk mendapatkan status maintenance
function isMaintenanceMode()
{
    // Baca isi file maintenance.txt
    $status = file_get_contents('maintenance.txt');

    // Jika file kosong atau berisi "true", kembalikan nilai true
    // Jika berisi "false", kembalikan nilai false
    return (trim($status) === 'true');
}

// Default status maintenance (false: non-maintenance, true: maintenance)
if (!file_exists('maintenance.txt')) {
    setMaintenanceMode(false);
}


// Periksa apakah pengguna telah login dan memiliki level admin atau superadmin
if (!isset($_SESSION['username']) || ($_SESSION['level'] != 'admin' && $_SESSION['level'] != 'superadmin')) {
    header('Location: logout.php');
    exit;
}


// Periksa apakah pengguna telah login dan token-nya valid
if (!isset($_SESSION['username']) || !isset($_SESSION['token'])) {
    // Jika pengguna belum login atau token tidak ada, tampilkan pesan alert
    echo '<script>alert("Invalid token (Kamu belum melakukan login), silahkan login");</script>';
    echo '<script>window.location.href = "logout.php";</script>';
    exit;
}

// Periksa apakah token sesuai dengan yang ada di database untuk menghindari multiple login
$username = $_SESSION['username'];
$token = $_SESSION['token'];

// Periksa apakah token sesuai dengan yang ada di database untuk menghindari multiple login
$queryToken = "SELECT * FROM users WHERE username='$username' AND token='$token'";
$resultToken = mysqli_query($conn, $queryToken);
$userToken = mysqli_fetch_assoc($resultToken);

if (!$userToken) {
    // Jika token tidak sesuai, berarti pengguna telah login di perangkat lain
    // Tampilkan pesan alert dan hapus session untuk logout
    echo '<script>alert("Invalid token, silahkan login ulang");</script>';
    session_unset();
    session_destroy();
    echo '<script>window.location.href = "logout.php";</script>';
    exit;
}

// Ambil informasi pengguna dari database
$username = $_SESSION['username'];
$queryUser = "SELECT * FROM users WHERE username='$username'";
$resultUser = mysqli_query($conn, $queryUser);
$user = mysqli_fetch_assoc($resultUser);


// Ambil daftar banner dari database
$queryBanners = "SELECT * FROM banners";
$resultBanners = mysqli_query($conn, $queryBanners);

// Menghitung jumlah admin terdaftar
$queryCountAdmin = "SELECT COUNT(*) as total FROM users WHERE level='admin'";
$resultCountAdmin = mysqli_query($conn, $queryCountAdmin);
$rowCountAdmin = mysqli_fetch_assoc($resultCountAdmin);
$totalAdmin = $rowCountAdmin['total'];


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

// Mengambil jumlah total deposit masuk hari ini dari database
$queryTotalDeposit = "SELECT SUM(amount) as total_deposit FROM deposits WHERE status='Approved' AND DATE(created_at) = CURDATE()";
$resultTotalDeposit = mysqli_query($conn, $queryTotalDeposit);
$rowTotalDeposit = mysqli_fetch_assoc($resultTotalDeposit);
$totalDeposit = $rowTotalDeposit['total_deposit'];

// Mengubah format total deposit menjadi IDR
$formattedTotalDeposit = 'IDR ' . number_format($totalDeposit, 0, ',', '.');


// Mengambil jumlah total deposit pending pengguna
$queryTotalPendingDeposit = "SELECT SUM(amount) as total_pending_deposit FROM deposits WHERE status='Pending'";
$resultTotalPendingDeposit = mysqli_query($conn, $queryTotalPendingDeposit);
$rowTotalPendingDeposit = mysqli_fetch_assoc($resultTotalPendingDeposit);
$totalPendingDeposit = $rowTotalPendingDeposit['total_pending_deposit'];

// Menghitung jumlah pengguna aktif
$queryCountActiveUsers = "SELECT COUNT(*) as total_active_users FROM users WHERE status='Aktif'";
$resultCountActiveUsers = mysqli_query($conn, $queryCountActiveUsers);
$rowCountActiveUsers = mysqli_fetch_assoc($resultCountActiveUsers);
$totalActiveUsers = $rowCountActiveUsers['total_active_users'];

// Menghitung jumlah pengguna banned
$queryCountBannedUsers = "SELECT COUNT(*) as total_banned_users FROM users WHERE status='Banned'";
$resultCountBannedUsers = mysqli_query($conn, $queryCountBannedUsers);
$rowCountBannedUsers = mysqli_fetch_assoc($resultCountBannedUsers);
$totalBannedUsers = $rowCountBannedUsers['total_banned_users'];

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

        // Redirect kembali ke halaman ?PAY4D=dashboard setelah mengubah status withdraw
        header('Location: ?PAY4D=dashboard');
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
    $newImagePath = '../banner/' . basename($_FILES['bannerImage']['name']);
    move_uploaded_file($imagePath, $newImagePath);

    // Tambahkan entri baru ke dalam tabel banners
    $queryAddBanner = "INSERT INTO banners (image_path, alt_text) VALUES ('$newImagePath', '$altText')";
    mysqli_query($conn, $queryAddBanner);

    // Redirect kembali ke halaman ?PAY4D=banner_mobile setelah menambahkan banner
    header('Location: ?PAY4D=banner_mobile');
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

        // Redirect kembali ke halaman ?PAY4D=dashboard setelah menghapus banner
        header('Location: ?PAY4D=banner_mobile');
        exit;
    } else {
        // Jika banner tidak ditemukan dalam database, tampilkan pesan error
        echo "Banner tidak ditemukan.";
    }
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

        // Redirect kembali ke halaman ?PAY4D=dashboard setelah mengubah status pengguna
        header('Location: ?PAY4D=banned_akun');
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
    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('MINIMAL_DEPOSIT', (.*)\);/", "define('MINIMAL_DEPOSIT', $newMinimalDeposit);", $configContent);
    file_put_contents($configFile, $updatedConfig);
}


// Fungsi untuk mengubah nama website
function updateWebsitelinkName($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('WEBSITE_LINK', '(.*)'\);/", "define('WEBSITE_LINK', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}

// Fungsi untuk mengubah nama website
function updateWebsiteName($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('WEBSITE_NAME', '(.*)'\);/", "define('WEBSITE_NAME', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}

// Fungsi untuk mengubah nama website
function updateMARQName($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('MARQ', '(.*)'\);/", "define('MARQ', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}

// Fungsi untuk mengubah nama website
function updateWaLinkName($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('WA_LINK_ADMIN', '(.*)'\);/", "define('WA_LINK_ADMIN', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}

// Fungsi untuk mengubah nama website
function updateWaName($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('WA_ADMIN', '(.*)'\);/", "define('WA_ADMIN', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}

// Fungsi untuk mengubah nama website
function updateLineName($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('LINE_ADMIN', '(.*)'\);/", "define('LINE_ADMIN', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}

// Fungsi untuk mengubah nama website
function updateWechatName($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('WECHAT_ADMIN', '(.*)'\);/", "define('WECHAT_ADMIN', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}

// Fungsi untuk mengubah nama website
function updateTelegrameName($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('TELEGRAM_ADMIN', '(.*)'\);/", "define('TELEGRAM_ADMIN', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}

// Fungsi untuk mengubah nama website
function updateTelegramLinkName($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('TELEGRAMLINK_ADMIN', '(.*)'\);/", "define('TELEGRAMLINK_ADMIN', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}

// Fungsi untuk mengubah nama website
function updateFbName($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('FB_ADMIN', '(.*)'\);/", "define('FB_ADMIN', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}


function updateLivechatName($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('LIVECHAT_ADMIN', '(.*)'\);/", "define('LIVECHAT_ADMIN', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}

function updateLivechatlinkName($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('LIVECHATLINK_ADMIN', '(.*)'\);/", "define('LIVECHATLINK_ADMIN', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}

function updateJenisCSS($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('JENIS_CSS', '(.*)'\);/", "define('JENIS_CSS', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}

function updateWarnaCSS($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('WARNA_CSS', '(.*)'\);/", "define('WARNA_CSS', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}


function updateWebsiteLogo($newLogo)
{

    $logoDir = 'logo/';
    if (!is_dir($logoDir)) {
        mkdir($logoDir);
    }

    $logoPath = $logoDir . basename($newLogo['name']);
    move_uploaded_file($newLogo['tmp_name'], $logoPath);

    // Simpan nama file logo baru ke dalam file konfigurasi
    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('WEBSITE_LOGO', '(.*)'\);/", "define('WEBSITE_LOGO', '$logoPath');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}


function updateWebsiteFavicon($newFavicon)
{

    $faviconDir = '../favicon/';
    if (!is_dir($faviconDir)) {
        mkdir($faviconDir);
    }

    $faviconPath = $faviconDir . basename($newFavicon['name']);
    move_uploaded_file($newFavicon['tmp_name'], $faviconPath);


    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('WEBSITE_FAVICON', '(.*)'\);/", "define('WEBSITE_FAVICON', '$faviconPath');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}

function updateBannerMobileHome($newBanner)
{

    $bannerDir = '../banner/';
    if (!is_dir($bannerDir)) {
        mkdir($bannerDir);
    }

    $bannerPath = $bannerDir . basename($newBanner['name']);
    move_uploaded_file($newBanner['tmp_name'], $bannerPath);


    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('BANNER_MOBILE_HOME', '(.*)'\);/", "define('BANNER_MOBILE_HOME', '$bannerPath');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}
function togelSingaporeName($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('TOGEL_SINGAPORE', '(.*)'\);/", "define('TOGEL_SINGAPORE', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}
function togelSakapoolsName($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('TOGEL_SAKAPOOLS', '(.*)'\);/", "define('TOGEL_SAKAPOOLS', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}

function togelSakatotoName($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('TOGEL_SAKATOTO', '(.*)'\);/", "define('TOGEL_SAKATOTO', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}
function togelSaka4dName($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('TOGEL_SAKA4D', '(.*)'\);/", "define('TOGEL_SAKA4D', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}
function togelMalaysiaName($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('TOGEL_MALAYSIA', '(.*)'\);/", "define('TOGEL_MALAYSIA', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}
function togelTotowuhanName($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('TOGEL_TOTOWUHAN', '(.*)'\);/", "define('TOGEL_TOTOWUHAN', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}
function togelHksiangName($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('TOGEL_HKSIANG', '(.*)'\);/", "define('TOGEL_HKSIANG', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}

function mobilecssName($newName)
{

    $configFile = '../config.php';
    $configContent = file_get_contents($configFile);
    $updatedConfig = preg_replace("/define\('MOBILE_CSS', '(.*)'\);/", "define('MOBILE_CSS', '$newName');", $configContent);
    file_put_contents($configFile, $updatedConfig);
}

if (isset($_POST['updateMinimalDeposit'])) {
    $newMinimalDeposit = $_POST['minimalDeposit'];
    updateMinimalDeposit($newMinimalDeposit);


    echo "<script>alert('Nilai Minimal Deposit berhasil diperbarui!');</script>";
}

if (isset($_POST['mobilecssName'])) {
    $newName = $_POST['mobileCss'];
    mobilecssName($newName);
}

if (isset($_POST['togelSingaporeName'])) {
    $newName = $_POST['togelSingapore'];
    togelSingaporeName($newName);
}

if (isset($_POST['togelSakapoolsName'])) {
    $newName = $_POST['togelSakapools'];
    togelSakapoolsName($newName);
}
if (isset($_POST['togelSakatotoName'])) {
    $newName = $_POST['togelSakatoto'];
    togelSakatotoName($newName);
}
if (isset($_POST['togelSaka4dName'])) {
    $newName = $_POST['togelSaka4d'];
    togelSaka4dName($newName);
}
if (isset($_POST['togelMalaysiaName'])) {
    $newName = $_POST['togelMalaysia'];
    togelMalaysiaName($newName);
}
if (isset($_POST['togelTotowuhanName'])) {
    $newName = $_POST['togelTotowuhan'];
    togelTotowuhanName($newName);
}
if (isset($_POST['togelHksiangName'])) {
    $newName = $_POST['togelHksiang'];
    togelHksiangName($newName);
}


if (isset($_POST['updateMARQName'])) {
    $newName = $_POST['marqName'];
    updateMARQName($newName);
}

if (isset($_POST['updateWaLinkName'])) {
    $newName = $_POST['walinkName'];
    updateWaLinkName($newName);
}

if (isset($_POST['updateWaName'])) {
    $newName = $_POST['waName'];
    updateWaName($newName);
}

if (isset($_POST['updateLineName'])) {
    $newName = $_POST['lineName'];
    updateLineName($newName);
}

if (isset($_POST['updateWechatName'])) {
    $newName = $_POST['wechatName'];
    updateWechatName($newName);
}

if (isset($_POST['updateTelegrameName'])) {
    $newName = $_POST['telegramName'];
    updateTelegrameName($newName);
}

if (isset($_POST['updateTelegramLinkName'])) {
    $newName = $_POST['telegramlinkName'];
    updateTelegramLinkName($newName);
}

if (isset($_POST['updateFbName'])) {
    $newName = $_POST['fbName'];
    updateFbName($newName);
}
if (isset($_POST['updateLivechatName'])) {
    $newName = $_POST['livechatName'];
    updateLivechatName($newName);
}
if (isset($_POST['updateLivechatlinkName'])) {
    $newName = $_POST['livechatlinkName'];
    updateLivechatlinkName($newName);
}





if (isset($_POST['updateWebsiteName'])) {
    $newName = $_POST['websiteName'];
    updateWebsiteName($newName);
}

if (isset($_POST['updateWebsitelinkName'])) {
    $newName = $_POST['websitelinkName'];
    updateWebsitelinkName($newName);
}


if (isset($_POST['updateJenisCSS'])) {
    $newName = $_POST['jenisCSS'];
    updateJenisCSS($newName);
}


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

// Periksa apakah ada permintaan untuk mengubah favicon website
if (isset($_FILES['updateBannerMobileHome'])) {
    $newBanner = $_FILES['updateBannerMobileHome'];
    updateBannerMobileHome($newBanner);
}


// Tambah pengguna
if (isset($_POST['addUser'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $telp_no = $_POST['telp_no'];
    $bank_name = $_POST['bank_name'];
    $fullname = $_POST['fullname'];
    $acc_no = $_POST['acc_no'];
    $level = $_POST['level'];

    // Periksa apakah username sudah ada di database
    $queryCheckUsername = "SELECT * FROM users WHERE username='$username'";
    $resultCheckUsername = mysqli_query($conn, $queryCheckUsername);

    // Periksa apakah pengguna telah login dan memiliki level admin atau superadmin
    if (!isset($_SESSION['username']) || ($_SESSION['level'] != 'admin' && $_SESSION['level'] != 'superadmin')) {
        header('Location: index.php');
        exit;
    }

    if (mysqli_num_rows($resultCheckUsername) > 0) {
        // Set session untuk menandai username sudah ada
        $_SESSION['usernameExists'] = true;
        header('Location: ?PAY4D=dashboard');
        exit;
    } else {
        // Jika username belum ada, lanjutkan penambahan pengguna
        // Enkripsi password sebelum menyimpan ke database
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $queryAddUser = "INSERT INTO users (username, password, email, telp_no, bank_name, fullname, acc_no, level) VALUES ('$username', '$hashedPassword', '$email', '$telp_no', '$bank_name', '$fullname', '$acc_no',  '$level')"; // Simpan level ke dalam database
        mysqli_query($conn, $queryAddUser);

        // Masukkan aktivitas admin ke dalam tabel user_activity
        $adminUsername = $_SESSION['username'];
        $activityType = 'Tambah Pengguna';
        $activityDetails = "Username: $username, Level: $level"; // Tampilkan level pengguna yang ditambahkan
        insertActivity($adminUsername, $activityType, $activityDetails);

        // Tampilkan pesan SweetAlert
        echo '<script>alert("Pengguna ' . $username . ' dengan Level : ' . $level . ' telah berhasil ditambahkan!"); window.location.href = "?PAY4D=daftarkan_akun";</script>';
    }
}









// Periksa apakah tombol "Approve" telah diklik
if (isset($_GET['approveDeposit']) && is_numeric($_GET['approveDeposit'])) {
    $depositId = $_GET['approveDeposit'];

    // Periksa apakah deposit dengan ID yang diberikan ada dalam status Progress
    $queryCheckDeposit = "SELECT * FROM deposits WHERE id=$depositId";
    $resultCheckDeposit = mysqli_query($conn, $queryCheckDeposit);

    if (mysqli_num_rows($resultCheckDeposit) > 0) {
        // Salin data dari tabel deposits ke deposits_approved
        $queryCopyToApproved = "INSERT INTO deposits_approved SELECT * FROM deposits WHERE id=$depositId";
        mysqli_query($conn, $queryCopyToApproved);

        // Ubah status deposit menjadi Approved di tabel deposits
        $queryUpdateProgress = "UPDATE deposits SET status='Approved' WHERE id=$depositId";
        mysqli_query($conn, $queryUpdateProgress);

        // Masukkan aktivitas admin ke dalam tabel user_activity
        $adminUsername = $_SESSION['username'];
        $activityType = 'Deposit';
        $activityDetails = "Approved Deposit with ID: $depositId";
        insertActivity($adminUsername, $activityType, $activityDetails);

        // Redirect kembali ke halaman ?PAY4D=deposit setelah mengubah status deposit
        header('Location: ?PAY4D=deposit');
        exit;
    } else {
        // Jika deposit tidak dalam status Progress, tampilkan pesan error
        echo "Deposit tidak ditemukan atau sudah diubah statusnya.";
    }
}


/// Periksa apakah tombol "Reject" telah diklik
if (isset($_GET['rejectDeposit'])) {
    $depositId = $_GET['rejectDeposit'];

    // Lakukan query untuk mengubah status deposit menjadi "Rejected"
    $queryRejectDeposit = "UPDATE deposits SET status='Rejected' WHERE id='$depositId'";
    $resultRejectDeposit = mysqli_query($conn, $queryRejectDeposit);

    // Periksa apakah query berhasil
    if ($resultRejectDeposit) {
        // Catat aktivitas "Rejected" dalam tabel user_activity
        $username = $_SESSION['username'];
        $activityType = 'Deposit';
        $activityDetails = "Rejected Deposit with ID: $depositId";
        insertActivity($username, $activityType, $activityDetails);

        echo "Deposit dengan ID $depositId telah ditolak.";
    } else {
        echo "Gagal menolak deposit. Error: " . mysqli_error($conn);
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

    header('Location: ?PAY4D=rekening_deposit');
}

// Hapus konfigurasi opsi bank
if (isset($_GET['deleteBankOption']) && is_numeric($_GET['deleteBankOption'])) {
    $bankOptionId = $_GET['deleteBankOption'];

    $queryDeleteBankOption = "DELETE FROM bank_options WHERE id=$bankOptionId";
    mysqli_query($conn, $queryDeleteBankOption);

    header('Location: ?PAY4D=rekening_deposit');
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



if (isset($_POST['savePromoOptions'])) {
    $listOptions = $_POST['promo_options'];

    foreach ($listOptions as $promoId => $promoData) {
        $listpromo = $promoData['list_promo'];

        if ($promoId == 'new') {
            $queryInsertPromoOption = "INSERT INTO promo_options (list_promo) VALUES ('$listpromo')";
            mysqli_query($conn, $queryInsertPromoOption);
        } else {
            $queryUpdatePromoOption = "UPDATE promo_options SET list_promo='$listpromo' WHERE id=$promoId";
            mysqli_query($conn, $queryUpdatePromoOption);
        }
    }

    header('Location: ?PAY4D=rekening_deposit');
}


if (isset($_GET['deletePromoOption']) && is_numeric($_GET['deletePromoOption'])) {
    $promoOptionId = $_GET['deletePromoOption'];

    $queryDeletePromoOption = "DELETE FROM promo_options WHERE id=$promoOptionId";
    mysqli_query($conn, $queryDeletePromoOption);

    header('Location: ?PAY4D=rekening_deposit');
    exit;
}

$queryListPromoOptions = "SELECT * FROM promo_options";
$resultListPromoOptions = mysqli_query($conn, $queryListPromoOptions);

$listPromoOptionsData = [];

while ($listOption = mysqli_fetch_assoc($resultListPromoOptions)) {
    $listPromoOptionsData[] = $listOption;
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
    $newImagePath = '../bannerdesktop/' . basename($_FILES['bannerImage']['name']);
    move_uploaded_file($imagePath, $newImagePath);

    // Tambahkan entri baru ke dalam tabel banners
    $queryAddBanner = "INSERT INTO bannersdesktop (image_path, alt_text) VALUES ('$newImagePath', '$altText')";
    mysqli_query($conn, $queryAddBanner);

    // Redirect kembali ke halaman ?PAY4D=banner_desktop setelah menambahkan banner
    header('Location: ?PAY4D=banner_desktop');
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

        // Redirect kembali ke halaman ?PAY4D=dashboard setelah menghapus banner
        header('Location: ?PAY4D=banner_desktop');
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

        // Redirect kembali ke halaman ?PAY4D=dashboard setelah menghapus accordion
        header('Location: ?PAY4D=daftar_promosi');
        exit;
    } else {
        // Jika accordion tidak ditemukan dalam database, tampilkan pesan error
        echo "Accordion tidak ditemukan.";
    }
}



if (isset($_GET['changeStatusPromosi']) && isset($_GET['statuspromosi'])) {
    $accordionId = $_GET['changeStatusPromosi'];
    $statuspromosi = $_GET['statuspromosi'];

    // Lakukan query update status promosi di database sesuai dengan $accordionId dan $statuspromosi
    $queryUpdateStatus = "UPDATE accordions SET statuspromosi = '$statuspromosi' WHERE id = $accordionId";
    mysqli_query($conn, $queryUpdateStatus);

    // Redirect ke halaman index.php?PAY4D=daftar_promosi setelah mengubah status
    header("Location: index.php?PAY4D=daftar_promosi");
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Admin <?php echo WEBSITE_NAME ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Admin Panel Pay4D" name="description" />
    <meta content="Dimas Wahyu S" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo WEBSITE_FAVICON ?>">
    <meta name="csrf-token" content="4bTdODzsNyjZUINykHmljzA5S3GxnetEg6J2xFP0">
    <!-- App css -->
    <!-- third party css -->
    <link href="hy_assets/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link href="hy_assets/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link href="hy_assets/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css" />
    <link href="hy_assets/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css" />
    <!-- third party css end -->

    <link href="hy_assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="hy_assets/css/app-modern.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="hy_assets/css/app-modern-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

    <!-- Sweet Alert -->
    <link href="css/sweetalert/sweetalert.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css">

    <!-- Skrip Anda dan tag HTML lainnya -->
    <!-- JavaScript Bootstrap -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.min.js"></script>



    <style>
        .swal-wide {
            width: 800px;
            /* Atur lebar sesuai kebutuhan */
        }
    </style>

    <style>
        #datatable td:nth-child(5) {
            white-space: normal;
            word-wrap: break-word;
            max-width: 400px;
            /* Atur lebar maksimum yang diinginkan */
        }

        #datatable td:nth-child(5) textarea {
            width: 100%;
            height: 100px;
            /* Atur tinggi textarea sesuai kebutuhan */
        }
    </style>


    <style>
        table.dataTable td {
            padding: 10px;
        }

        #loading {
            border: 16px solid #f3f3f3;
            /* Light grey */
            border-top: 16px solid #3498db;
            /* Blue */
            border-radius: 50%;
            width: 100px;
            height: 100px;
            animation: spin 2s linear infinite;
            margin: auto;
        }

        #preloading {
            position: fixed;
            left: 50%;
            top: 40%;
            transform: translate(-50%, -50%);
            width: 140px;
            height: 140px;
            text-align: center;
        }

        #canvasloading {
            width: 100%;
            background-color: rgba(255, 255, 255, 0.7);
            height: 100%;
            z-index: 999999;
            position: absolute;
            display: none;
        }

        #txt {
            font-weight: 700;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        body {
            font-family: 'sans-serif';
            font-size: 14px;
        }

        .select2-selection__clear {
            margin-right: 18px;
            font-size: 20px;
        }

        .table td,
        .table th {
            padding: 4px;
            font-size: 13px;
        }
    </style>
    <script>
        $(document).ready(function() {
            //ajax setup
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });
    </script>
</head>

<body class="loading" data-layout="detached" data-layout-config='{"leftSidebarCondensed":false,"darkMode":false, "showRightSidebarOnStart": false}'>
    <div id="preloader">
        <div id="status">
            <div class="bouncing-loader">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <div id="canvasloading">

        <div id="preloading">
            <div id="loading"></div>
            <p id="txt">Mohon Tunggu Sebentar...</p>
        </div>
    </div>
    <!-- Topbar Start -->
    <div class="navbar-custom topnav-navbar topnav-navbar-dark">
        <div class="container-fluid">

            <!-- LOGO -->
            <a href="?PAY4D=dashboard" class="topnav-logo">
                <span class="topnav-logo-lg">
                    <img src="image/website/pay4d.png" alt="<?php echo WEBSITE_NAME ?>" height="30">
                </span>
                <span class="topnav-logo-lg" style="vertical-align: middle; color: #ced4da; font-size:20px; margin-left: 10px;"><?php echo WEBSITE_NAME ?></span>
                <span class="topnav-logo-sm">
                    <img src="image/website/pay4d.png" alt="" height="16">
                </span>
            </a>
            <ul class="list-unstyled topbar-menu float-end mb-0">

                <li class="dropdown notification-list d-xl-none">
                    <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <i class="dripicons-search noti-icon"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                        <form class="p-3">
                            <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                        </form>
                    </div>
                </li>



                <!--
                <li class="notification-list">
                    <a class="nav-link end-bar-toggle" href="javascript: void(0);">
                        <i class="dripicons-gear noti-icon"></i>
                    </a>
                </li> -->

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" id="topbar-notifydrop" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="dripicons-bell noti-icon"></i>
                        <span class="noti-icon-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated dropdown-lg" aria-labelledby="topbar-notifydrop">

                        <!-- item-->
                        <div class="dropdown-item noti-title">
                            <h5 class="m-0">
                                <span class="float-end">

                                </span>Notification
                            </h5>
                        </div>

                        <div id="body-notifikasi" style="max-height: 230px;" data-simplebar>
                            <div id="data-notifikasi"></div>
                            <div class="auto-load-notifikasi text-center">
                                <div class="spinner-border text-success" role="status"></div>
                            </div>

                        </div>

                        <!-- All-->


                    </div>
                </li>

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="account-user-avatar">
                            <img src="userFoto/1688263760.png" alt="<?php echo $level ?>" class="rounded-circle">
                        </span>
                        <span>
                            <span class="account-user-name"><?php echo $username ?></span>
                            <span class="account-position"><?php echo $level ?></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                        <!-- item-->
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome <?php echo $username ?> !</h6>
                        </div>

                        <!-- item-->
                        <a href="?PAY4D=konfigurasi_cms" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-circle me-1"></i>
                            <span>Profil Website</span>
                        </a>

                        <!-- item-->
                        <a href="logout.php" class="dropdown-item notify-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                            <i class="mdi mdi-logout me-1"></i>
                            <span>Logout</span>
                        </a>


                        <form id="logout-form" action="../logout.php" method="POST" class="d-none">
                            <input type="hidden" name="_token" value="4bTdODzsNyjZUINykHmljzA5S3GxnetEg6J2xFP0">
                        </form>

                    </div>
                </li>

            </ul>

            <a class="button-menu-mobile disable-btn">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>

        </div>
    </div>
    <!-- end Topbar -->

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- Begin page -->
        <div class="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="leftside-menu leftside-menu-detached">

                <div class="leftbar-user">
                    <a href="javascript: void(0);">
                        <img src="userFoto/1688263760.png" alt="<?php echo $level ?>" height="42" class="rounded-circle shadow-sm">
                        <span class="leftbar-user-name"><?php echo $level ?></span>
                    </a>
                </div>

                <!--- Sidemenu -->
                <ul class="side-nav">

                    <li class="side-nav-title side-nav-item">Navigation</li>

                    <li class="side-nav-item">
                        <a href="?PAY4D=dashboard" class="side-nav-link">
                            <i class="uil-home-alt"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>

                    <li class="side-nav-title side-nav-item">Transaksi</li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebar-penjualan" aria-expanded="false" aria-controls="sidebar-penjualan" class="side-nav-link">
                            <i class="mdi mdi-cash-check"></i>
                            <span>Deposit / Withdraw</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebar-penjualan">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="?PAY4D=deposit">
                                        <i class="uil-circle"></i>
                                        <span>Deposit</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="?PAY4D=withdraw">
                                        <i class="uil-circle"></i>
                                        <span>Withdraw</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="side-nav-item">
                        <a href="?PAY4D=rekening_deposit" class="side-nav-link">
                            <i class="mdi mdi-cash-minus"></i>
                            <span> Rekening Deposit </span>
                        </a>
                    </li>




                    <li class="side-nav-title side-nav-item">Pengaturan Lainnya</li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebar-akun" aria-expanded="false" aria-controls="sidebar-akun" class="side-nav-link">
                            <i class="mdi mdi-table"></i>
                            <span> Akun</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebar-akun">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="?PAY4D=banned_akun">
                                        <i class="uil-circle"></i>
                                        <span> Banned Akun</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="?PAY4D=daftarkan_akun">
                                        <i class="uil-circle"></i>
                                        <span> Daftarkan Akun</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="side-nav-item">
                        <a data-bs-toggle="collapse" href="#sidebar-kas" aria-expanded="false" aria-controls="sidebar-kas" class="side-nav-link">
                            <i class="mdi mdi-cash-usd"></i>
                            <span>Tambah/Hapus Banner</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <div class="collapse" id="sidebar-kas">
                            <ul class="side-nav-second-level">
                                <li>
                                    <a href="?PAY4D=banner_mobile">
                                        <i class="uil-circle"></i>
                                        <span>Banner Slider Mobile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="?PAY4D=banner_desktop">
                                        <i class="uil-circle"></i>
                                        <span>Banner Slider Desktop</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="side-nav-item">
                        <a href="?PAY4D=tambah_promosi" class="side-nav-link">
                            <i class="mdi mdi-cash-minus"></i>
                            <span>Tambah Promosi</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="?PAY4D=daftar_promosi" class="side-nav-link">
                            <i class="mdi mdi-cash-check"></i>
                            <span>Daftar Promosi</span>
                        </a>
                    </li>


                    <li class="side-nav-title side-nav-item">Pengaturan Website</li>


                    <li class="side-nav-item">
                        <a href="?PAY4D=togel" class="side-nav-link">
                            <i class="mdi mdi-cog"></i>
                            <span>Setting Togel</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="?PAY4D=konfigurasi_cms" class="side-nav-link">
                            <i class="mdi mdi-cog"></i>
                            <span>Konfigurasi CMS Web</span>
                        </a>
                    </li>


                    <li class="side-nav-title side-nav-item">Pengguna</li>
                    <li class="side-nav-item">
                        <a href="?PAY4D=userdata" class="side-nav-link">
                            <i class="uil uil-users-alt"></i>
                            <span>Data Pengguna</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="?PAY4D=roles" class="side-nav-link">
                            <i class="uil-lock-access"></i>
                            <span>Riwayat Aktivitas Admin / SuperAdmin</span>
                        </a>
                    </li>

                    <li class="side-nav-item">
                        <a href="?PAY4D=status_website" class="side-nav-link">
                            <i class="uil-shield-check"></i>
                            <span>Ubah Status Website</span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="logout.php" class="side-nav-link">
                            <i class="uil-user"></i>
                            <span>Logout</span>
                        </a>
                    </li>



                    <div class="clearfix"></div>
                    <!-- Sidebar -left -->

                </ul>
            </div>
            <!-- Left Sidebar End -->

            <div class="content-page">
                <div class="content">


                    <?php
                    // Include header
                    include 'header.php';

                    $content = isset($_GET['PAY4D']) ? $_GET['PAY4D'] : '';

                    if ($content === '') {
                        // Tampilkan konten default
                        include 'default.php';
                    } elseif ($content === 'dashboard') {

                        include 'dashboard.php';
                    } elseif ($content === 'user') {

                        include 'user.php';
                    } elseif ($content === 'edit_user') {

                        include 'edit_user.php';
                    } elseif ($content === 'edit_detail_user') {

                        include 'edit_detail_user.php';
                    } elseif ($content === 'profile_website') {

                        include 'profile_website.php';
                    } elseif ($content === 'tambah_promosi') {

                        include 'tambah_promosi.php';
                    } elseif ($content === 'daftar_promosi') {

                        include 'daftar_promosi.php';
                    } elseif ($content === 'rekening_deposit') {

                        include 'rekening_deposit.php';
                    } elseif ($content === 'banner_mobile') {

                        include 'banner_mobile.php';
                    } elseif ($content === 'banner_desktop') {

                        include 'banner_desktop.php';
                    } elseif ($content === 'konfigurasi_cms') {

                        include 'konfigurasi_cms.php';
                    } elseif ($content === 'withdraw') {

                        include 'withdraw.php';
                    } elseif ($content === 'deposit') {

                        include 'deposit.php';
                    } elseif ($content === 'banned_akun') {

                        include 'banned_akun.php';
                    } elseif ($content === 'daftarkan_akun') {

                        include 'daftarkan_akun.php';
                    } elseif ($content === 'status_website') {

                        include 'status_website.php';
                    } elseif ($content === 'togel') {

                        include 'togel.php';
                    } elseif ($content === 'userdata') {

                        include 'userdata.php';
                    } elseif ($content === 'roles') {

                        include 'roles.php';
                    }

                    // Include footer
                    include 'footer.php';
                    ?>



                </div>

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                © Admin <?php echo WEBSITE_NAME ?> - 2023 All Right Reserved.
                            </div>




                            <div class="col-md-6">
                                <div class="text-md-end footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>


                </footer>


                <div class="rightbar-overlay"></div>
                <!-- /End-bar -->



                <script>
                    // index.php

                    // Fungsi untuk menampilkan SweetAlert dengan form edit
                    function showEditAccordionForm(id) {
                        // Mengambil data accordion dari server menggunakan AJAX
                        $.ajax({
                            url: 'get_accordion.php',
                            method: 'GET',
                            data: {
                                id: id
                            },
                            success: function(response) {
                                var accordion = JSON.parse(response);

                                // Menampilkan SweetAlert dengan form edit
                                Swal.fire({
                                    title: 'Edit Promosi',
                                    html: `
          <form id="editForm">
            <input type="hidden" name="accordionId" value="${accordion.id}">
            <div class="form-group">
              <label for="title">Judul</label>
              <input type="text" class="form-control" id="title" name="title" value="${accordion.title}">
            </div>
            <div class="form-group">
              <label for="alt_text">ALT TEXT</label>
              <input type="text" class="form-control" id="alt_text" name="alt_text" value="${accordion.alt_text}">
            </div>
            
            <div class="form-group">
              <label for="description">Deskripsi</label>
              <textarea class="form-control" id="description" name="description">${accordion.description}</textarea>
            </div>
          </form>
        `,
                                    showCancelButton: true,
                                    confirmButtonText: 'Update',
                                    preConfirm: function() {
                                        // Mengambil data form yang diisi oleh pengguna
                                        var formData = $('#editForm').serialize();

                                        // Mengirim data update ke server menggunakan AJAX
                                        $.ajax({
                                            url: 'update_accordion.php',
                                            method: 'POST',
                                            data: formData,
                                            success: function(response) {
                                                // Menampilkan pesan sukses jika update berhasil
                                                Swal.fire({
                                                    icon: 'success',
                                                    title: 'Accordion berhasil diupdate',
                                                    showConfirmButton: false,
                                                    timer: 1500
                                                }).then(function() {
                                                    // Refresh halaman setelah pesan ditutup
                                                    location.reload();
                                                });
                                            },
                                            error: function() {
                                                // Menampilkan pesan error jika terjadi kesalahan
                                                Swal.fire({
                                                    icon: 'error',
                                                    title: 'Oops...',
                                                    text: 'Terjadi kesalahan saat mengupdate accordion.'
                                                });
                                            }
                                        });
                                    }
                                });
                            },
                            error: function() {
                                // Menampilkan pesan error jika terjadi kesalahan
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Terjadi kesalahan saat memuat data accordion.'
                                });
                            }
                        });
                    }
                </script>

                <script>
                    function levelFunction() {
                        alert("Hanya akses level SuperAdmin yang dapat melakukan ini.");
                    }
                </script>

                <!-- bundle -->
                <script src="hy_assets/js/vendor.min.js"></script>
                <script src="hy_assets/js/app.min.js"></script>

                <!-- third party js -->
                <script src="hy_assets/js/vendor/jquery.dataTables.min.js"></script>
                <script src="hy_assets/js/vendor/dataTables.bootstrap5.js"></script>
                <script src="hy_assets/js/vendor/dataTables.responsive.min.js"></script>
                <script src="hy_assets/js/vendor/responsive.bootstrap5.min.js"></script>
                <script src="hy_assets/js/vendor/dataTables.buttons.min.js"></script>
                <script src="hy_assets/js/vendor/buttons.bootstrap5.min.js"></script>
                <script src="hy_assets/js/vendor/buttons.html5.min.js"></script>
                <script src="hy_assets/js/vendor/buttons.flash.min.js"></script>
                <script src="hy_assets/js/vendor/buttons.print.min.js"></script>
                <script src="hy_assets/js/vendor/dataTables.keyTable.min.js"></script>
                <script src="hy_assets/js/vendor/dataTables.select.min.js"></script>
                <!-- third party js ends -->

                <!-- demo app -->
                <script src="hy_assets/js/pages/demo.datatable-init.js"></script>
                <!-- end demo js-->



                <!-- Todo js -->
                <script src="hy_assets/js/ui/component.todo.js"></script>


                <script src="js/sweetalert/sweetalert.min.js"></script>
                <script src="/js/jquery.mask.min.js"></script>
                <!-- demo app -->
                <script src="hy_assets/js/pages/demo.form-wizard.js"></script>
                <!-- end demo js-->


</body>

</html>