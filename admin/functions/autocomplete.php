<?php
session_start();
$sesi_id = $_SESSION['user_id'];
include "database.php";
$mysqli = new databases();

$id = $_GET['id'];
foreach($mysqli->alamat_id($id) as $d);
$kota = explode('~', $d['kota']);
$provinsi = explode('~', $d['provinsi']); 

if($sesi_id==$d['id_user']){
$data = array('nama'      =>  $d['nama_penerima'],   
            'alamat'      =>  $d['alamat'],
            'kontak'      =>  $d['kontak_alamat'], 
            'prov_a'      =>  $provinsi[0],    
            'prov'        =>  $provinsi[1],    
            'kota_a'      =>  $kota[0],    
            'kota'        =>  $kota[1],    
			 );

echo json_encode($data);
}
