<?php

function tentukanKeteranganNilai($nilai) {
    if ($nilai % 2 == 0) {
        return "Nilai Angka Genap";
    } else {
        return "Nilai Angka Ganjil";
    }
}

$dataMahasiswa = [
    ["nama" => "Mahasiswa 1", "nilai" => 55],
    ["nama" => "Mahasiswa 2", "nilai" => 76],
    ["nama" => "Mahasiswa 3", "nilai" => 65],
    ["nama" => "Mahasiswa 4", "nilai" => 95],
    ["nama" => "Mahasiswa 5", "nilai" => 59],
    ["nama" => "Mahasiswa 6", "nilai" => 65],
    ["nama" => "Mahasiswa 7", "nilai" => 70],
    ["nama" => "Mahasiswa 8", "nilai" => 66],
    ["nama" => "Mahasiswa 9", "nilai" => 62],
    ["nama" => "Mahasiswa 10", "nilai" => 85]
];

echo "<h2>Data Nilai Mahasiswa</h2>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr style='background-color: yellow;'><th>No</th><th>Nama</th><th>Nilai</th><th>Keterangan</th></tr>";

$no = 1;
foreach ($dataMahasiswa as $mahasiswa) {
    $keterangan = tentukanKeteranganNilai($mahasiswa['nilai']);
    echo "<tr>";
    echo "<td>" . $no . "</td>";
    echo "<td>" . $mahasiswa['nama'] . "</td>";
    echo "<td>" . $mahasiswa['nilai'] . "</td>";
    echo "<td>" . $keterangan . "</td>";
    echo "</tr>";
    $no++;
}

echo "</table>";

?>