<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

include 'koneksi.php';

$Nama = $_POST['Nama'];
$Alamat = $_POST['Alamat'];
$Pekerjaan = $_POST['Pekerjaan'];

mysqli_query($koneksi, "INSERT INTO user (Nama, Alamat, Pekerjaan) VALUES ('$Nama', '$Alamat', '$Pekerjaan')");

header("location:index.php?pesan=input");
?>