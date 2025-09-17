<?php
class Mahasiswa {
    private $nama;
    private $kelas;
    private $mataKuliah;
    private $nilai;

    // Setter
    public function setNama($nama) {
        $this->nama = $nama;
    }
    public function setKelas($kelas) {
        $this->kelas = $kelas;
    }
    public function setMataKuliah($mataKuliah) {
        $this->mataKuliah = $mataKuliah;
    }
    public function setNilai($nilai) {
        $this->nilai = $nilai;
    }

    // Getter
    public function getNama() {
        return $this->nama;
    }
    public function getKelas() {
        return $this->kelas;
    }
    public function getMataKuliah() {
        return $this->mataKuliah;
    }
    public function getNilai() {
        return $this->nilai;
    }

    // Cek kelulusan
    public function statusKuis() {
        if ($this->nilai >= 60) {
            return "Lulus Kuis";
        } else {
            return "Tidak Lulus Kuis";
        }
    }
}

// Data Mahasiswa dalam array
$dataMahasiswa = [
    ['Aditya', 'SI 2', 'Pemrograman Berorientasi Objek', 80],
    ['Shinta', 'SI 2', 'Pemrograman Berorientasi Objek', 75],
    ['Ineu', 'SI 2', 'Pemrograman Berorientasi Objek', 55],
];

// Looping data dan cetak hasil
foreach ($dataMahasiswa as $data) {
    $mhs = new Mahasiswa();
    $mhs->setNama($data[0]);
    $mhs->setKelas($data[1]);
    $mhs->setMataKuliah($data[2]);
    $mhs->setNilai($data[3]);

    echo "Nama : " . $mhs->getNama() . "<br>";
    echo "Kelas : " . $mhs->getKelas() . "<br>";
    echo "Mata Kuliah : " . $mhs->getMataKuliah() . "<br>";
    echo "Nilai : " . $mhs->getNilai() . "<br>";
    echo $mhs->statusKuis() . "<br>";
    echo "<hr>";
}
?>
