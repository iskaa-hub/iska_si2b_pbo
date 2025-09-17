<?php
class Kendaraan {
    public $harga;
    public $bahanBakar;
    public $tahun;
    public $plat;

    // Cek status harga
    public function statusHarga() {
        if ($this->harga > 50000000) {
            return "Mahal";
        } else {
            return "Murah";
        }
    }

    // Cek subsidi
    public function dapatSubsidi() {
        if ($this->bahanBakar == "Premium" && $this->tahun < 2005) {
            return "Mendapat Subsidi";
        } else {
            return "Tidak Mendapat Subsidi";
        }
    }

    // Hitung harga bekas
    public function hargaBekas() {
        if ($this->tahun > 2005) {
            return $this->harga * 0.8; // turun 20%
        } elseif ($this->tahun >= 2000 && $this->tahun <= 2005) {
            return $this->harga * 0.7; // turun 30%
        } else {
            return $this->harga * 0.6; // turun 40%
        }
    }

    // Hitung pajak
    public function pajak() {
        if ($this->tahun <= 2017) {
            return $this->harga * 0.025;
        } else {
            return 0;
        }
    }

    // Tentukan hari operasi berdasarkan plat nomor
    public function hariOperasi() {
        if ($this->plat % 2 == 0) {
            return "Selasa, Kamis, Sabtu";
        } else {
            return "Senin, Rabu, Jumat, Minggu";
        }
    }
}

// Contoh objek kendaraan
$mobil = new Kendaraan();
$mobil->harga = 50000000;
$mobil->bahanBakar = "Premium";
$mobil->tahun = 2004;
$mobil->plat = 2468; // plat genap

echo "Status Harga : " . $mobil->statusHarga() . "<br>";
echo "Status BBM : " . $mobil->dapatSubsidi() . "<br>";
echo "Harga Bekas : " . $mobil->hargaBekas() . "<br>";
echo "Jumlah Pajak : " . $mobil->pajak() . "<br>";
echo "Hari Operasi : " . $mobil->hariOperasi();
?>
