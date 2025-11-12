<?php 

include('koneksi.php'); 

$db = new database(); 

?> 

<!DOCTYPE html> 
<html> 
<head> 
    <title></title> 
    <style type="text/css"> 
        form background_border { 
            margin: 0px 23px; 
            color: white; 
        } 
        @media print{
            .no-print {
                display: none;
            }
        }
    </style> 
</head> 
<body> 
<div class="no-print" style="margin-bottom :15px;">
    <button onclick="window.close()">Tutup</button>
    </div>
<h2>LAPORAN DATA BARANG CV JAYA</h2> 

<table width="667" border="1"> 
    <tr> 
        <th width="21">No</th> 
        <th width="122">Kode Barang</th> 
        <th width="155">Barang</th> 
        <th width="47">Stok</th> 
        <th width="93">Harga Beli</th> 
        <th width="93">Harga Jual</th> 
        <th width="114">Keuntungan</th> 
    </tr> 

    <?php 
    $data_barang = $db->tampil_data_barang(); 
    $no = 1; 
    foreach ($data_barang as $row) { 
    ?> 
    <tr> 
        <td><?php echo $no++; ?></td> 
        <td><?php echo $row['kd_barang']; ?></td> 
        <td><?php echo $row['nama_barang']; ?></td> 
        <td><?php echo $row['stok']; ?></td> 
        <td><?php echo $row['harga_beli']; ?></td> 
        <td><?php echo $row['harga_jual']; ?></td> 
        <td><?php echo $row['harga_jual'] - $row['harga_beli']; ?></td> 
    </tr> 
    <?php 
    } 
    ?> 
</table> 

<script> 
    window.print(); 
</script> 

</body> 
</html> 
