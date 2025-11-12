<?php
$koneksi = mysqli_connect("localhost","root","","belajar_oop2");
$id = $_GET['id'];
$data = mysqli_query($koneksi, "SELECT * FROM tb_supplier WHERE id_supplier='$id'");
$row = mysqli_fetch_assoc($data);
?>

<h3>Edit Data Supplier</h3>
<form method="POST" action="proses_supplier.php?action=update">
    <input type="hidden" name="id" value="<?= $row['id_supplier']; ?>">
    <input type="text" name="nama" value="<?= $row['nama_supplier']; ?>"><br>
    <input type="text" name="alamat" value="<?= $row['alamat_supplier']; ?>"><br>
    <input type="text" name="telp" value="<?= $row['telepon_supplier']; ?>"><br>
    <input type="text" name="email" value="<?= $row['email_supplier']; ?>"><br>
    <input type="password" name="pass" value="<?= $row['pass_supplier']; ?>"><br>
    <input type="submit" value="Update">
</form>


