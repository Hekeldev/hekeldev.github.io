<?php
date_default_timezone_set("Asia/Jakarta");
$alamat_website = '';
define('DB_HOST','localhost');
define('DB_USER','heavendn_gamepay');
define('DB_PASSWORD','Dimasws2004@'); //Sesuaikan password database
define('DB_DATABASE','heavendn_slots'); //Sesuaikan nama database

class DatabaseConnection
{
    public function __construct()
    {
        $conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

        if($conn->connect_error)
        {
            die ("<h1>Database Connection Failed</h1>");
        }
        //echo "Database Connected Successfully";
        return $this->conn = $conn;
    }
}
?>