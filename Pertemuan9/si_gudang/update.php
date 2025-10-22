<?php
include 'koneksi.php';
$id = $_POST['id'];
$Nama = $_POST['Nama'];
$Alamat = $_POST['Alamat'];
$Pekerjaan = $_POST['Pekerjaan'];

mysqli_query($koneksi, "UPDATE user SET Nama='$Nama', Alamat='$Alamat', Pekerjaan='$Pekerjaan' WHERE id='$id'");

header("location:index.php?pesan=update");
?>