<?php
// Class induk
class Tabungan {
    private $saldo;

    public function __construct($saldoAwal) {
        $this->saldo = $saldoAwal;
    }

    // Getter saldo (protected agar hanya anak bisa akses)
    protected function getSaldo() {
        return $this->saldo;
    }

    // Fungsi setor tunai
    protected function setorTunai($jumlah) {
        if ($jumlah > 0) {
            $this->saldo += $jumlah;
            return true;
        }
        return false;
    }

    // Fungsi tarik tunai
    protected function tarikTunai($jumlah) {
        if ($jumlah > 0 && $jumlah <= $this->saldo) {
            $this->saldo -= $jumlah;
            return true;
        }
        return false;
    }
}

// Class anak
class Siswa extends Tabungan {
    private $nama;

    public function __construct($nama, $saldoAwal) {
        parent::__construct($saldoAwal);
        $this->nama = $nama;
    }

    // Tampilkan saldo milik siswa ini
    public function tampilSaldo() {
        echo "Saldo " . $this->nama . ": Rp " . $this->getSaldo() . "\n";
    }

    // Siswa setor tunai
    public function setor($jumlah) {
        if ($this->setorTunai($jumlah)) {
            echo $this->nama . " setor tunai Rp $jumlah berhasil.\n";
        } else {
            echo $this->nama . " gagal setor tunai.\n";
        }
    }

    // Siswa tarik tunai
    public function tarik($jumlah) {
        if ($this->tarikTunai($jumlah)) {
            echo $this->nama . " tarik tunai Rp $jumlah berhasil.\n";
        } else {
            echo $this->nama . " gagal tarik tunai (saldo tidak cukup atau jumlah tidak valid).\n";
        }
    }

    // Mendapatkan nama siswa
    public function getNama() {
        return $this->nama;
    }
}

// Program utama
// Membuat array siswa
$siswaList = [
    new Siswa("Siswa 1", 100000),
    new Siswa("Siswa 2", 150000),
    new Siswa("Siswa 3", 200000)
];

// Menampilkan saldo awal masing-masing siswa
echo "\nSaldo Awal Masing-masing Siswa:";
foreach ($siswaList as $siswa) {
    $siswa->tampilSaldo();
}

// Fungsi untuk input dari command line menggunakan fgets dan fopen
$input = fopen("php://stdin", "r");

// Menu interaktif sederhana
while(true) {
    echo "\nMenu:\n";
    echo "1. Setor Tunai\n";
    echo "2. Tarik Tunai\n";
    echo "3. Tampilkan Saldo\n";
    echo "4. Keluar\n";
    echo "Pilih menu (1-4): ";

    $pilihan = trim(fgets($input));

    if ($pilihan == '4') {
        echo "Terima kasih sudah menggunakan program ini.\n";
        break;
    }

    if (!in_array($pilihan, ['1','2','3'])) {
        echo "Pilihan tidak valid.\n";
        continue;
    }

    // Pilih siswa
    echo "Pilih siswa (1, 2, atau 3): ";
    $noSiswa = trim(fgets($input));

    if (!in_array($noSiswa, ['1','2','3'])) {
        echo "Siswa tidak valid.\n";
        continue;
    }

    $siswa = $siswaList[$noSiswa - 1];

    if ($pilihan == '3') {
        $siswa->tampilSaldo();
        continue;
    }

    echo "Masukkan jumlah uang: ";
    $jumlah = trim(fgets($input));
    if (!is_numeric($jumlah) || $jumlah <= 0) {
        echo "Jumlah tidak valid.\n";
        continue;
    }
    $jumlah = (int)$jumlah;

    if ($pilihan == '1') {
        $siswa->setor($jumlah);
    } elseif ($pilihan == '2') {
        $siswa->tarik($jumlah);
    }
}
fclose($input);
?>
