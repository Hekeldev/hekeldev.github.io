<?php
date_default_timezone_set('Asia/Jakarta');

$host = 'localhost'; // GAK PERLU DIUBAH

// YANG PERLU DIUBAH
$username = 'root';
$password = '';
$database = 'cms';


define('MAINTENANCE_MODE', 'false');
define('WA_ADMIN', '082257561165');
define('MOBILE_CSS', 'YELLOW-LIGHT');
define('WEBSITE_LINK', 'kosonggggg');
define('LIVECHAT_ADMIN', 'DEMO');
define('LIVECHATLINK_ADMIN', '');
define('WA_LINK_ADMIN', 'https://wa.me/6282257561165');
define('LINE_ADMIN', 'DEMO');
define('WECHAT_ADMIN', 'DEMO');
define('TELEGRAM_ADMIN', 'DEMO');
define('TELEGRAMLINK_ADMIN', 'DEMO');
define('FB_ADMIN', 'Tyan');
define('WEBSITE_NAME', 'Pay4D Slot');
define('JENIS_CSS', 'BY');
define('WARNA_CSS', '');
define('MARQ', 'WA ASLI OWNER 082257561165 | TERIMA PEMBUATAN WEBSITE');
define('WEBSITE_LOGO', 'logo/pay4d.png');
define('BANNER_MOBILE_HOME', '../banner/OWNER-Dimas.png');
define('WEBSITE_FAVICON', '../favicon/favicon.png');
define('MINIMAL_DEPOSIT', 10000);

define('TOGEL_SINGAPORE', '3213');
define('TOGEL_SAKAPOOLS', '4124');
define('TOGEL_SAKATOTO', '1231');
define('TOGEL_SAKA4D', '5235');
define('TOGEL_MALAYSIA', '2342');
define('TOGEL_TOTOWUHAN', '4523');
define('TOGEL_HKSIANG', '1323');


$conn = mysqli_connect($host, $username, $password, $database);


if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
