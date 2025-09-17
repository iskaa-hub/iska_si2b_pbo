<?php
// membuat class Pembelian
class Pembelian{
    var $member;
    var $totalBelanja;

    function setMember($x)
    {
        $this->member = $x;
    }
    function setTotalBelanja($x)
    {
        $this->totalBelanja = $x;
    }

    function getDiskon()
    {
        $diskon = 0;
        switch ($this->member) {
            case "ya":
                if ($this->totalBelanja > 500000) {
                    $diskon = 50000;
                } elseif ($this->totalBelanja > 100000) {
                    $diskon = 15000;
                } else {
                    $diskon = 5000;
                }
                break;
            case "tidak":
                if ($this->totalBelanja > 100000) {
                    $diskon = 5000;
                } else {
                    $diskon = 0;
                }
                break;
        }
        return $diskon;
    }
}

// Data pembeli berdasarkan tabel
$pembelian1 = new Pembelian();
$pembelian1->setMember("ya");
$pembelian1->setTotalBelanja(200000);

$pembelian2 = new Pembelian();
$pembelian2->setMember("ya");
$pembelian2->setTotalBelanja(570000);

$pembelian3 = new Pembelian();
$pembelian3->setMember("tidak");
$pembelian3->setTotalBelanja(120000);

$pembelian4 = new Pembelian();
$pembelian4->setMember("tidak");
$pembelian4->setTotalBelanja(90000);

// Menampilkan output
echo "<h2>Tabel Diskon Belanja</h2>";
echo "<table border='1' cellpadding='10' cellspacing='0'>";
echo "<tr style='background-color: #f0f0f0;'><th>Pembeli</th><th>Kartu Member</th><th>Total Belanja</th><th>Diskon</th><th>Biaya yang dikeluarkan</th></tr>";

function tampilkanDataPembelian($no, $pembelian) {
    $diskon = $pembelian->getDiskon();
    $biaya = $pembelian->totalBelanja - $diskon;
    echo "<tr>";
    echo "<td>Pembeli " . $no . "</td>";
    echo "<td>" . ($pembelian->member == "ya" ? "Memiliki" : "Tidak Memiliki") . "</td>";
    echo "<td>" . number_format($pembelian->totalBelanja, 0, ',', '.') . "</td>";
    echo "<td>" . number_format($diskon, 0, ',', '.') . "</td>";
    echo "<td>" . number_format($biaya, 0, ',', '.') . "</td>";
    echo "</tr>";
}

tampilkanDataPembelian(1, $pembelian1);
tampilkanDataPembelian(2, $pembelian2);
tampilkanDataPembelian(3, $pembelian3);
tampilkanDataPembelian(4, $pembelian4);

echo "</table>";
?>