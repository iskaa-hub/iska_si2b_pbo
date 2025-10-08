<?php
class Tabungan {
private $saldo;

public function __construct($saldo_awal) {
$this->saldo = $saldo_awal;
}

protected function setSaldo($jumlah) {
$this->saldo = $jumlah;
}

protected function getSaldo() {
return $this->saldo;
}

// Tambah saldo dengan bunga 5%
public function tambahSaldo($nominal) {
$bunga = $nominal * 0.05; // bunga 5%
$total = $this->getSaldo() + $nominal + $bunga;
$this->setSaldo($total);
echo "Saldo berhasil ditambah Rp." . number_format($nominal, 0, ',', '.') .
" + bunga Rp." . number_format($bunga, 0, ',', '.') . "\n";
}

// Tarik saldo
public function ambilSaldo($nominal) {
if ($nominal > $this->getSaldo()) {
echo "Jumlah uang kurang!\n";
} else {
$this->setSaldo($this->getSaldo() - $nominal);
echo "Penarikkan berhasil sejumlah Rp." . number_format($nominal, 0, ',', '.') . "\n";
}
}

public function tampilkanSaldo() {
return $this->getSaldo();
}
}

class Nasabah extends Tabungan {
private $nama;
private $pin;

public function __construct($nama, $saldo_awal, $pin) {
parent::__construct($saldo_awal);
$this->nama = $nama;
$this->pin = $pin;
}

public function getNama() {
return $this->nama;
}

public function verifikasiPin($inputPin) {
return $this->pin === $inputPin;
}

public function tampilkanInfo() {
echo "Nasabah: {$this->nama} | Saldo: Rp." . number_format($this->tampilkanSaldo(), 0, ',', '.') . "\n";
}
}

$nasabah = [
new Nasabah("Aditya Hafidz", 500000, "123"),
new Nasabah("Eko Nugroho", 1200000, "234"),
new Nasabah("Dani Abdul", 750000, "456")
];

echo "Aplikasi Tabungan Mahasiswa\n";
echo "Jumlah Nasabah: " . count($nasabah) . "\n";

// Menampilkan daftar nasabah
foreach ($nasabah as $i => $n) {
echo ($i+1) . ". " . $n->getNama() . " | Saldo: Rp." . number_format($n->tampilkanSaldo(), 0, ',', '.') . "\n";
}

// Memilih nasabah
echo "Pilih no nasabah: ";
$pilih = trim(fgets(STDIN));
$index = $pilih - 1;

$nasabahTerpilih = $nasabah[$index];
echo "\nNasabah ke-: " . ($index+1) . " " . $nasabahTerpilih->getNama() .
" | Saldo: Rp." . number_format($nasabahTerpilih->tampilkanSaldo(), 0, ',', '.') . "\n";

$maxPercobaan = 3;
$berhasilLogin = false;

for ($i = 0; $i < $maxPercobaan; $i++) {
echo "Masukkan PIN Anda: ";
$inputPin = trim(fgets(STDIN));

if ($nasabahTerpilih->verifikasiPin($inputPin)) {
$berhasilLogin = true;
break;
} else {
echo "Username atau Password Salah!\n";
}
}

if (!$berhasilLogin) {
echo "Kesempatan Habis. Program keluar.\n";
exit;
}

do {
echo "\nPilihan Menu\n";
echo "1. Isi Saldo\n";
echo "2. Tarik Tunai\n";
echo "3. Tampilkan Saldo\n";
echo "4. Keluar\n";
echo "Masukkan pilihan: ";
$menu = trim(fgets(STDIN));

switch ($menu){
case 2:
echo "Masukkan nominal uang yang akan : ";
$nominal = (int) trim(fgets(STDIN));
$nasabahTerpilih->ambilSaldo($nominal);
break;

case 3:
$nasabahTerpilih->tampilkanInfo();
break;

case 4:
echo "Terima kasih telah menggunakan layanan kami.\n";
exit;
}
echo "Menu tidak valid!\n";

echo "Kembali ke menu awal? (y/n): ";
$ulang = trim(fgets(STDIN));
while (strtolower($ulang) == 'y');
}
?>