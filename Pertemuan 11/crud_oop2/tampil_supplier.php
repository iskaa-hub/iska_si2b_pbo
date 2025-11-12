<?php
include('koneksi.php');
$koneksi = mysqli_connect("localhost","root","","belajar_oop2");

// jika ada pencarian
if (isset($_GET['cari']) && $_GET['cari'] != '') {
    $keyword = $_GET['cari'];
    $data = mysqli_query($koneksi, "SELECT * FROM tb_supplier WHERE nama_supplier LIKE '%$keyword%'");
} else {
    $data = mysqli_query($koneksi, "SELECT * FROM tb_supplier");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Supplier</title>
</head>
<body>

<!-- Navigasi -->
<h2>Menu</h2>
<p>
    <a href="index.php">Beranda</a> |
    <a href="tampil_barang.php">Data Barang</a> |
    <a href="tampil_customer.php">Data Customer</a> |
    <a href="tampil_supplier.php">Data Supplier</a>
</p>
<hr>

<h3>Data Supplier</h3>

<!-- Form Cari -->
<form method="GET" action="">
    <label>Cari Nama Supplier: </label>
    <input type="text" name="cari" placeholder="Masukkan nama..." value="<?php if(isset($_GET['cari'])) echo $_GET['cari']; ?>">
    <input type="submit" value="Cari">
</form>
<br>

<!-- Tombol Tambah dan Print -->
<a href="tambah_supplier.php"><button>Tambah Data</button></a>
<a href="cetak_supplier.php" target="_blank"><button>Print Semua Supplier</button></a>
<br><br>

<!-- Tabel Data -->
<table border="1" cellpadding="5" cellspacing="0">
<tr style="background-color: #f2f2f2;">
    <th>No</th>
    <th>ID Supplier</th>
    <th>Nama Supplier</th>
    <th>Alamat</th>
    <th>Telepon</th>
    <th>Email</th>
    <th>Password</th>
    <th>Action</th>
</tr>

<?php
$no = 1;
if (mysqli_num_rows($data) > 0) {
    while($row = mysqli_fetch_assoc($data)){ ?>
<tr>
    <td><?= $no++; ?></td>
    <td><?= $row['id_supplier']; ?></td>
    <td><?= $row['nama_supplier']; ?></td>
    <td><?= $row['alamat_supplier']; ?></td>
    <td><?= $row['telepon_supplier']; ?></td>
    <td><?= $row['email_supplier']; ?></td>
    <td><?= str_repeat('*', strlen($row['pass_supplier'])); ?></td>
    <td>
        <a href="edit_supplier.php?id=<?= $row['id_supplier']; ?>">Edit</a> | 
        <a href="proses_supplier.php?action=delete&id=<?= $row['id_supplier']; ?>" onclick="return confirm('Yakin ingin hapus data ini?')">Hapus</a> | 
        <a href="cetak_supplier_satuan.php?id_supplier=<?= $row['id_supplier']; ?>" target="_blank">Print</a>
    </td>
</tr>
<?php } 
} else {
    echo "<tr><td colspan='10' align='center'>Data tidak ditemukan.</td></tr>";
}
?>
</table>

<br>

<!-- Print Data Satuan -->
<form method="GET" action="cetak_supplier_satuan.php" target="_blank">
    <label>Print Data Satuan Supplier (berdasarkan ID Supplier): </label>
    <input type="text" name="id_supplier" placeholder="Masukkan ID Supplier" required>
    <input type="submit" value="Print">
</form>

<?php
if (isset($_GET['cari']) && $_GET['cari'] != '') {
    echo "<br>Hasil pencarian untuk: <b>".$_GET['cari']."</b>";
}
?>

</body>
</html>


