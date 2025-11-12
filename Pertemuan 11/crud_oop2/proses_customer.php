<?php
$koneksi = mysqli_connect("localhost", "root", "", "belajar_oop2");

$action = $_GET['action'];

if($action == "tambah"){
    $id = $_POST['id'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "INSERT INTO tb_customer VALUES('$id','$nik','$nama','$jenis','$alamat','$telp','$email','$pass')";
    mysqli_query($koneksi, $query);
    header("location:tampil_customer.php");

} elseif($action == "update"){
    $id = $_POST['id'];
    $nik = $_POST['nik'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $query = "UPDATE tb_customer SET 
                nik_customer='$nik',
                nama_customer='$nama',
                jenis_kelamin='$jenis',
                alamat_customer='$alamat',
                telepon_customer='$telp',
                email_customer='$email',
                pass_customer='$pass'
              WHERE id_customer='$id'";
    mysqli_query($koneksi, $query);
    header("location:tampil_customer.php");

} elseif($action == "delete"){
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM tb_customer WHERE id_customer='$id'");
    header("location:tampil_customer.php");
}
?>


