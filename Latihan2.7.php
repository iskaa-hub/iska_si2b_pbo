<?php
class Kendaraan
{
    var $jumlahRoda = 4;
    var $warna;
    var $bahanBakar = "Premium";
    var $harga = 100000000;
    var $merek;
    var $tahunPembuatan = 2004;

    // Method untuk cek status harga
    function statusHarga()
    {
        if ($this->harga > 50000000) {
            $status = "Harga Kendaraan Mahal";
        } else {
            $status = "Harga Kendaraan Murah";
        }
        return $status;
    }

    // Method untuk cek subsidi
    function dapatSubsidi()
    {
        if ($this->tahunPembuatan < 2005 && $this->bahanBakar == "Premium") {
            $status = "DAPAT SUBSIDI";
        } else {
            $status = "TIDAK DAPAT SUBSIDI";
        }
        return $status;
    }

    // Method untuk hitung harga bekas
    function hargaSecondKendaraan()
    {
        if ($this->tahunPembuatan < 2000) {
            $hargaBaru = $this->harga * 0.3;
        } elseif ($this->tahunPembuatan < 2005) {
            $hargaBaru = $this->harga * 0.4;
        } elseif ($this->tahunPembuatan < 2010) {
            $hargaBaru = $this->harga * 0.5;
        } else {
            $hargaBaru = $this->harga * 0.6;
        }
        return $hargaBaru;
    }
}

// Objek 1
$ObjekKendaraan1 = new Kendaraan(); 
$ObjekKendaraan1->harga = 10000000;
$ObjekKendaraan1->tahunPembuatan = 1999;

echo "Jumlah Roda : " . $ObjekKendaraan1->jumlahRoda . "<br/>";
echo "Status Harga : " . $ObjekKendaraan1->statusHarga() . "<br/>";
echo "Status Subsidi : " . $ObjekKendaraan1->dapatSubsidi() . "<br/>";
echo "Harga Bekas : " . $ObjekKendaraan1->hargaSecondKendaraan() . "<br/><br/>";

// Objek 2
$ObjekKendaraan2 = new Kendaraan(); 
$ObjekKendaraan2->bahanBakar = "Pertamax";
$ObjekKendaraan2->tahunPembuatan = 1999;

echo "Jumlah Roda : " . $ObjekKendaraan2->jumlahRoda . "<br/>";
echo "Status Harga : " . $ObjekKendaraan2->statusHarga() . "<br/>";
echo "Status Subsidi : " . $ObjekKendaraan2->dapatSubsidi() . "<br/>";
echo "Harga Bekas : " . $ObjekKendaraan2->hargaSecondKendaraan() . "<br/>";
?>
