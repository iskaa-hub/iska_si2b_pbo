<?php
class Suhu {
    public $celcius;
    public $konversi = [];

    public function __construct($celcius) {
        $this->celcius = $celcius;
        $this->konversiSuhu();
    }

    private function konversiSuhu() {
        $this->konversi = [
            "reamur" => (4/5) * $this->celcius,
            "fahrenheit" => (9/5) * $this->celcius + 32,
            "kelvin" => $this->celcius + 273.15
        ];
    }

    public function tampilkanHasil() {
        echo "<h2>Konversi Suhu dari Celcius</h2>";
        echo "Suhu dalam celcius = " . $this->celcius . " derajat<br>";

        foreach ($this->konversi as $satuan => $nilai) {
            echo "Suhu dalam $satuan = " . round($nilai, 2) . " derajat<br>";
        }

        echo "<br> <i>Sekian konversi suhu yang bisa dilakukan.</i>";
    }
}

// Ambil data langsung tanpa isset
$input = $_GET['celcius'] ?? null;

if ($input !== null) {
    if (is_numeric($input)) {
        $suhu = new Suhu($input);
        $suhu->tampilkanHasil();
    } else {
        echo "Input harus berupa angka!";
    }
} else {
    echo "Tidak ada input suhu. Tambahkan di URL, contoh: ?celcius=36";
}
?>
