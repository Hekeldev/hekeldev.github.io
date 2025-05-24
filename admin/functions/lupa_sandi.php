<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 
date_default_timezone_set('Asia/Jakarta');
include("database.php");
$mysqli = new databases();

function generateRandomString($length) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
 
	
	$kontak = $_GET['kontak'];
	$email = $_GET['email'];
	$token = $_GET['token']; 
	$length = 8;
	$sandi =  generateRandomString($length);
	$password = md5($sandi);
		
		$mysqli->reset_password($kontak, $email, $token, $password, $sandi); 
				
		

?>