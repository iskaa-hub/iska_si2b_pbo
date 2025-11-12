<?php
$koneksi = mysqli_connect("localhost","root","","belajar_oop2");

$action = $_GET['action'];

if($action == "tambah"){
    mysqli_query($koneksi, "INSERT INTO tb_supplier VALUES(
        '$_POST[id]',
        '$_POST[nama]',
        '$_POST[alamat]',
        '$_POST[telp]',
        '$_POST[email]',
        '$_POST[pass]'
    )");
    header("location:tampil_supplier.php");

} elseif($action == "update"){
    mysqli_query($koneksi, "UPDATE tb_supplier SET 
        nama_supplier='$_POST[nama]',
        alamat_supplier='$_POST[alamat]',
        telepon_supplier='$_POST[telp]',
        email_supplier='$_POST[email]',
        pass_supplier='$_POST[pass]'
        WHERE id_supplier='$_POST[id]'
    ");
    header("location:tampil_supplier.php");

} elseif($action == "delete"){
    mysqli_query($koneksi, "DELETE FROM tb_supplier WHERE id_supplier='$_GET[id]'");
    header("location:tampil_supplier.php");
}
?>
