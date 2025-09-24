<?php
class BangunRuang {
    private $nama;
    private $sisi;
    private $jari;
    private $tinggi;

    // Constructor
    public function __construct($nama, $sisi, $jari, $tinggi) {
        $this->nama = $nama;
        $this->sisi = $sisi;
        $this->jari = $jari;
        $this->tinggi = $tinggi;
    }

    // Getter
    public function getNama() { return $this->nama; }
    public function getSisi() { return $this->sisi; }
    public function getJari() { return $this->jari; }
    public function getTinggi() { return $this->tinggi; }

    // Hitung volume sesuai jenis bangun
    public function hitungVolume() {
        switch($this->nama) {
            case "Bola":
                return (4/3) * M_PI * pow($this->jari, 3);
            case "Kerucut":
                return (1/3) * M_PI * pow($this->jari, 2) * $this->tinggi;
            case "Limas Segi Empat":
                return (1/3) * pow($this->sisi, 2) * $this->tinggi;
            case "Kubus":
                return pow($this->sisi, 3);
            case "Tabung":
                return M_PI * pow($this->jari, 2) * $this->tinggi;
            default:
                return 0;
        }
    }
}

// Array data bangun ruang
$bangunRuang = [
    new BangunRuang("Bola", 0, 7, 0),
    new BangunRuang("Kerucut", 0, 14, 10),
    new BangunRuang("Limas Segi Empat", 8, 0, 24),
    new BangunRuang("Kubus", 30, 0, 0),
    new BangunRuang("Tabung", 0, 7, 10)
];

// Tampilkan dalam tabel HTML
echo "<table border='1' cellpadding='5' cellspacing='0'>";
echo "<tr bgcolor='lightblue'>
        <th>Jenis Bangun Ruang</th>
        <th>Sisi</th>
        <th>Jari-jari</th>
        <th>Tinggi</th>
        <th>Volume</th>
      </tr>";

foreach($bangunRuang as $b) {
    echo "<tr>
            <td>".$b->getNama()."</td>
            <td>".$b->getSisi()."</td>
            <td>".$b->getJari()."</td>
            <td>".$b->getTinggi()."</td>
            <td>".$b->hitungVolume()."</td>
          </tr>";
}

echo "</table>";
?>
