<?php
class Karyawan {
public $nama;
public $golongan;
public $jamLembur;
public $gajiPokok;
public $totalGaji;

public static $gajiGolongan = [
"Ib" => 1250000, "Ic" => 1300000, "Id" => 1350000,
"IIa" => 2000000, "IIb" => 2100000, "IIc" => 2200000, "IId" => 2300000,
"IIIa" => 2400000, "IIIb" => 2500000, "IIIc" => 2600000, "IIId" => 2700000,
"IVa" => 2800000, "IVb" => 2900000, "IVc" => 3000000, "IVd" => 3100000
];

const BesaranLemburPerJam = 15000;

public function __construct($nama, $golongan, $jamLembur) {
$this->nama = $nama;
$this->golongan = $golongan;
$this->jamLembur = $jamLembur;
$this->hitungGaji();
echo "Constructor: Data Karyawan '$this->nama' dibuat.\n";
}

public function __destruct() {
echo "Destructor: Data Karyawan '$this->nama' telah dihapus.\n";
}

public function hitungGaji() {
$this->gajiPokok = Karyawan::$gajiGolongan[$this->golongan] ?? 0;
$this->totalGaji = $this->gajiPokok + ($this->jamLembur * Karyawan::BesaranLemburPerJam);
}

public function getGajiPokok() { return $this->gajiPokok; }
public function getTotalGaji() { return $this->totalGaji; }
}

$dataKaryawan = [
["Winny", "IIb", 30],
["Sandy", "IIIc", 32],
["Alfred", "IVb", 30],
["Ferdinand", "IIIc", 40]
];

$karyawan = [];
foreach ($dataKaryawan as $data) {
$karyawan[] = new Karyawan($data[0], $data[1], $data[2]);
}

echo "----------------------------------------------------------\n";
echo str_pad("Nama Karyawan", 15) . str_pad("Golongan", 10) . str_pad("Jam Lembur", 12) . "Total Gaji\n";
echo "----------------------------------------------------------\n";

foreach ($karyawan as $k) {
echo str_pad($k->nama, 15)
. str_pad($k->golongan, 10)
. str_pad($k->jamLembur, 12)
. number_format($k->getTotalGaji(), 0, ',', '.') . "\n";
}

echo "----------------------------------------------------------\n";
?>