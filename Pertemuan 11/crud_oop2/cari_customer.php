<?php 
include('koneksi.php'); 

if (isset($_GET['nama'])) { 
    $nama = $_GET['nama']; 
    $query = "SELECT * FROM tb_customer WHERE nama_customer LIKE '%$nama%'"; 
    $data = mysqli_query($koneksi, $query); 
} else { 
    $data = []; 
} 
?> 

<!DOCTYPE html> 
<html> 
<head> 
    <title>Cari Customer</title> 
</head> 
<body> 

<h2>Cari Data Customer</h2> 

<form method="GET" action=""> 
    <input type="text" name="nama" placeholder="Masukkan Nama Customer"> 
    <input type="submit" value="Cari"> 
</form> 

<a href="tampil_customer.php">Kembali</a> 
<br><br> 

<?php if (isset($_GET['nama'])) { ?> 
    <h4>Hasil pencarian untuk: <b><?= $_GET['nama']; ?></b></h4> 
    <table border="1" cellpadding="5" cellspacing="0"> 
        <tr> 
            <th>ID</th> 
            <th>NIK</th> 
            <th>Nama</th> 
            <th>Jenis Kelamin</th> 
            <th>Alamat</th> 
            <th>Telepon</th> 
            <th>Email</th> 
            <th>Password</th> 
        </tr> 

        <?php while ($row = mysqli_fetch_assoc($data)) { ?> 
        <tr> 
            <td><?= $row['id_customer']; ?></td> 
            <td><?= $row['nik_customer']; ?></td> 
            <td><?= $row['nama_customer']; ?></td> 
            <td><?= $row['jenis_kelamin']; ?></td> 
            <td><?= $row['alamat_customer']; ?></td> 
            <td><?= $row['telepon_customer']; ?></td> 
            <td><?= $row['email_customer']; ?></td> 
            <td><?= str_repeat('*', strlen($row['pass_customer'])); ?></td> 
        </tr> 
        <?php } ?> 
    </table> 
<?php } ?> 

</body> 
</html>
