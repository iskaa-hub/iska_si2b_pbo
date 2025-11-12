<?php 

include('koneksi.php'); 

$db = new database(); 
$koneksi = $db->koneksi; 

// Jika ada pencarian 
if (isset($_GET['cari']) && $_GET['cari'] != '') { 
    $keyword = $_GET['cari']; 
    $query = "SELECT * FROM tb_customer WHERE nama_customer LIKE '%$keyword%'"; 
} else { 
    $query = "SELECT * FROM tb_customer"; 
} 

$data = mysqli_query($koneksi, $query); 

?> 

<!DOCTYPE html> 
<html> 
<head> 
    <title>Data Customer</title> 
</head> 
<body> 

<!-- Menu navigasi --> 
<h2>Menu</h2> 
<p> 
    <a href="index.php">Beranda</a> | 
    <a href="tampil_barang.php">Data Barang</a> | 
    <a href="tampil_customer.php">Data Customer</a> | 
    <a href="tampil_supplier.php">Data Supplier</a> 
</p> 
<hr> 

<h2>Data Customer</h2> 

<!-- Form pencarian --> 
<form method="GET" action=""> 
    <label>Cari Nama Customer:</label> 
    <input type="text" name="cari" placeholder="Masukkan nama..." 
           value="<?php if (isset($_GET['cari'])) echo $_GET['cari']; ?>"> 
    <input type="submit" value="Cari"> 
</form> 
<br> 

<!-- Tombol Tambah dan Print --> 
<a href="tambah_customer.php"><button>Tambah Data</button></a> 
<a href="cetak_customer.php" target="_blank"><button>Print Semua Customer</button></a> 
<br><br> 

<!-- Tabel data customer --> 
<table border="1" cellspacing="0" cellpadding="5" width="100%"> 
    <tr style="background-color: #f2f2f2;"> 
        <th>No</th> 
        <th>ID Customer</th> 
        <th>NIK</th> 
        <th>Nama</th> 
        <th>Jenis Kelamin</th> 
        <th>Alamat</th> 
        <th>Telepon</th> 
        <th>Email</th> 
        <th>Password</th> 
        <th>Aksi</th> 
    </tr> 

    <?php 
    $no = 1; 
    if (mysqli_num_rows($data) > 0) { 
        while ($row = mysqli_fetch_assoc($data)) { 
    ?> 
    <tr> 
        <td><?= $no++; ?></td> 
        <td><?= $row['id_customer']; ?></td> 
        <td><?= $row['nik_customer']; ?></td> 
        <td><?= $row['nama_customer']; ?></td> 
        <td><?= $row['jenis_kelamin']; ?></td> 
        <td><?= $row['alamat_customer']; ?></td> 
        <td><?= $row['telepon_customer']; ?></td> 
        <td><?= $row['email_customer']; ?></td> 
        <td><?= str_repeat('*', strlen($row['pass_customer'])); ?></td> 
        <td> 
            <a href="edit_customer.php?id=<?= $row['id_customer']; ?>">Edit</a> | 
            <a href="hapus_customer.php?id=<?= $row['id_customer']; ?>" onclick="return confirm('Hapus data ini?')">Hapus</a> | 
            <a href="cetak_customer_satuan.php?id=<?= $row['id_customer']; ?>" target="_blank">Print</a> 
        </td> 
    </tr> 
    <?php  
        } 
    } else { 
        echo "<tr><td colspan='10' align='center'>Tidak ada data ditemukan.</td></tr>"; 
    } 
    ?> 
</table> 

<br> 

<!-- Print data satuan manual --> 
<form method="GET" action="cetak_customer_satuan.php" target="_blank"> 
    <label>Print Data Customer Berdasarkan ID:</label> 
    <input type="text" name="id" placeholder="Masukkan ID Customer (contoh: CUST0001)" required> 
    <input type="submit" value="Print"> 
</form> 

<?php 
if (isset($_GET['cari']) && $_GET['cari'] != '') { 
    echo "<br><p>Hasil pencarian untuk: <b>" . $_GET['cari'] . "</b></p>"; 
} 
?> 

</body> 
</html> 
