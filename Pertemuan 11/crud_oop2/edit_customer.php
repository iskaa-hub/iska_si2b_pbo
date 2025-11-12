<?php
$koneksi = mysqli_connect("localhost", "root", "", "belajar_oop2");
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM tb_customer WHERE id_customer='$id'");
$row = mysqli_fetch_assoc($data);
?>

<h3>Edit Data Customer</h3>
<form method="POST" action="proses_customer.php?action=update">
    <input type="hidden" name="id" value="<?= $row['id_customer']; ?>">
    <input type="text" name="nik" value="<?= $row['nik_customer']; ?>"><br>
    <input type="text" name="nama" value="<?= $row['nama_customer']; ?>"><br>
    <input type="text" name="jenis" value="<?= $row['jenis_kelamin']; ?>"><br>
    <input type="text" name="alamat" value="<?= $row['alamat_customer']; ?>"><br>
    <input type="text" name="telp" value="<?= $row['telepon_customer']; ?>"><br>
    <input type="text" name="email" value="<?= $row['email_customer']; ?>"><br>
    <input type="password" name="pass" value="<?= $row['pass_customer']; ?>"><br>
    <input type="submit" value="Update">
</form>


