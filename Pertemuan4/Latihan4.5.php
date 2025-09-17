<?php
class Kendaraan
{
    var $merek;
    var $jmlroda;
    var $harga;
    var $warna;
    var $bhnbakar;
    var $tahun;

    // Tambahkan method setter dan getter supaya bisa dipanggil
    function setMerek($m) { $this->merek = $m; }
    function setJmlroda($j) { $this->jmlroda = $j; }
    function setHarga($h) { $this->harga = $h; }
    function setWarna($w) { $this->warna = $w; }
    function setBhnbakar($b) { $this->bhnbakar = $b; }
    function setTahun($t) { $this->tahun = $t; }

    function getMerek() { return $this->merek; }
    function getJmlroda() { return $this->jmlroda; }
    function getHarga() { return $this->harga; }
    function getWarna() { return $this->warna; }
    function getBhnBakar() { return $this->bhnbakar; }
    function getTahun() { return $this->tahun; }

    // Contoh method tambahan
    function statusHarga() {
        return ($this->harga > 50000000) ? "Mahal" : "Murah";
    }

    function dapatSubsidi() {
        return ($this->tahun < 2010) ? "Ya" : "Tidak";
    }

    function hargaSecondKendaraan() {
        return $this->harga * 0.5;
    }
}

$Data1 = array('Toyota Yaris','4','160000000','Merah','Pertamax','2014');
$Data2 = array('Honda Scoopy','2','13000000','Putih','Premium','2005');
$Data3 = array('Isuzu Panther','14','40000000','Hitam','Solar','1994');

for ($i = 1; $i <= 3; $i++) {
    ${"Kendaraan$i"} = new Kendaraan();
    ${"Kendaraan$i"}->setMerek(${"Data$i"}[0]);
    ${"Kendaraan$i"}->setJmlroda(${"Data$i"}[1]);
    ${"Kendaraan$i"}->setHarga(${"Data$i"}[2]);
    ${"Kendaraan$i"}->setWarna(${"Data$i"}[3]);
    ${"Kendaraan$i"}->setBhnbakar(${"Data$i"}[4]);
    ${"Kendaraan$i"}->setTahun(${"Data$i"}[5]);
}

for ($i = 1; $i <= 3; $i++) {
    echo "Kendaraan$i<br>"
        .${"Kendaraan$i"}->getMerek()."<br>"
        .${"Kendaraan$i"}->getJmlroda()."<br>"
        .${"Kendaraan$i"}->getHarga()."<br>"
        .${"Kendaraan$i"}->getWarna()."<br>"
        .${"Kendaraan$i"}->getBhnBakar()."<br>"
        .${"Kendaraan$i"}->getTahun()."<br>"
        .${"Kendaraan$i"}->statusHarga()."<br>"
        .${"Kendaraan$i"}->dapatSubsidi()."<br>"
        .${"Kendaraan$i"}->hargaSecondKendaraan()."<br><br>";
}
?>
