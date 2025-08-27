<?php
$besarpinjaman = 1000000;
$besarbunga = 10;
$lamaangsuran = 5;
$keterlambatanangsuran = 40;

$totalpinjaman = $besarpinjaman + ($besarpinjaman * $besarbunga / 100);

$angsuran = $totalpinjaman / $lamaangsuran;

$dendaperhari = 0.0015 * $angsuran;
$totaldenda = $dendaperhari * $keterlambatanangsuran;

$besaranpembayaran = $angsuran + $totaldenda;

//Output
echo "TOKO PEGADAIAN SYARIAH<br>";
echo "Besaran Pinjaman: Rp." . number_format($besarpinjaman, 0, ',', '.') . "<br>\n";
echo "Besar Bunga: " . $besarbunga . "<br>\n";
echo "Total Pinjaman: Rp. " . number_format($totalpinjaman, 0, ',', '.') . "<br>\n";
echo "Lama Angsuran: " . $lamaangsuran . "<br>\n";
echo "Angsuran: Rp. " . number_format($angsuran, 0, ',', '.') . "<br>\n";
echo "Keterlambatan Angsuran: " . $keterlambatanangsuran . "<br>\n";
echo "Denda Per Hari: Rp. " . number_format($dendaperhari, 0, ',', '.') . "<br>\n";
echo "Total Denda: Rp. " . number_format($totaldenda, 0, ',', '.') . "<br>\n";
echo "Besaran Pembayaran: Rp. " . number_format($besaranpembayaran, 0, ',', '.') . "<br>\n";


