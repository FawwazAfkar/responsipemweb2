<?php
//error_reporting(E_ALL ^ E_NOTICE AND E_DEPRECATED);
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'mancity';
$conn = mysqli_connect($host,$user,$pass,$db) or die('Not Connect');
date_default_timezone_set('Asia/Jakarta');
?>