<?php
class Belanja {
    public $nama_barang;
    public $harga_barang;
    public $jumlah_barang;
    public $total_harga;

    public function __destruct() {
        echo "Destructor: Data belanja '$this->nama_barang' dihapus.";
    }

    public function __construct($nama_barang, $harga_barang, $jumlah_barang) {
        $this->nama_barang = $nama_barang;
        $this->harga_barang = $harga_barang;
        $this->jumlah_barang = $jumlah_barang;
        $this->total_harga = $harga_barang * $jumlah_barang;

        echo "Constructor: Data belanja '$this->nama_barang' dibuat.";
    }

    public function getInfo() {
        return "Belanja: " . $this->nama_barang . " (" . $this->harga_barang . " x " . $this->jumlah_barang . ") = " . $this->total_harga;
    }
}
echo "Masukkan jumlah barang belanja yang di beli: ";
$jml = (int) trim(fgets(STDIN));

$barang = [];
$totalbelanja = 0;

for ($i=1; $i<=$jml; $i++) {
    echo "\nBarang ke-$i\n";
    echo "Nama Barang: "; $nama_barang = trim(fgets(STDIN));
    echo "Harga Barang: "; $harga_barang = (int) trim(fgets(STDIN));
    echo "Jumlah Barang: "; $jumlah_barang = (int) trim(fgets(STDIN));

    $mie = new Belanja ($nama_barang, $harga_barang, $jumlah_barang);
    $barang[] = $mie;
    $totalbelanja += $mie->total_harga;
}

echo "\n----------------------------Daftar Belanja-----------------------------\n";
foreach ($barang as $item) {
    echo $item->getInfo() . "\n";
}

echo "--------------------------------------------------------------\n";
echo "Total belanja adalah: " . $totalbelanja . "\n";
?>
