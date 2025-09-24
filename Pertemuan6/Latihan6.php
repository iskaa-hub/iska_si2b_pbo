<?php
class Belanja {
    public $nama_barang;
    public $harga_barang;
    public $jumlah_barang;
    public $total_harga;

    public function __destruct() {
        echo "<b>Destructor:</b> Data belanja '<b>$this->nama_barang</b>' dihapus.";
    }

    public function __construct($nama_barang, $harga_barang, $jumlah_barang) {
        $this->nama_barang = $nama_barang;
        $this->harga_barang = $harga_barang;
        $this->jumlah_barang = $jumlah_barang;
        $this->total_harga = $harga_barang * $jumlah_barang;

        echo "<p><b>Constructor:</b> Data belanja '<b>$this->nama_barang</b>' dibuat.</p>";
    }

    public function getInfo() {
        return "<p>Belanja: <b>" . $this->nama_barang . "</b> (" . $this->harga_barang . " x " . $this->jumlah_barang . ") = <b>" . $this->total_harga . "</b></p>";
    }
}

$mie = new Belanja("Indomie", 2000, 10);
echo $mie->getInfo();
?>
