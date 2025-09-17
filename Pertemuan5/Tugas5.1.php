<?php
class Employee {
    public $namaKaryawan;
    public $gajiKaryawan;
    public $masaKerjaKaryawan; 

    public function __construct($namaKaryawan, $gajiKaryawan, $masaKerjaKaryawan){
        $this->namaKaryawan = $namaKaryawan;
        $this->gajiKaryawan = $gajiKaryawan;
        $this->masaKerjaKaryawan = $masaKerjaKaryawan;
    }

    public function kenaikanGaji(){
        $bonus = 0.01 * $this->masaKerjaKaryawan * $this->gajiKaryawan;
        return $this->gajiKaryawan + $bonus;
    }
}
class Programmer extends Employee {
    public function kenaikanGaji(){
        if ($this->masaKerjaKaryawan < 1) {
            return parent::kenaikanGaji() - (0.01 * $this->masaKerjaKaryawan * $this->gajiKaryawan);
        } elseif ($this->masaKerjaKaryawan <= 10) {
            $bonus = 0.01 * $this->masaKerjaKaryawan * $this->gajiKaryawan;
            return $this->gajiKaryawan + $bonus;
        } else {
            $bonus = 0.02 * $this->masaKerjaKaryawan * $this->gajiKaryawan;
            return $this->gajiKaryawan + $bonus;
        }
    }
}
class Direktur extends Employee {
    public function kenaikanGaji(){
        $bonus = 0.5 * $this->masaKerjaKaryawan * $this->gajiKaryawan;
        $tunjangan = 0.1 * $this->masaKerjaKaryawan * $this->gajiKaryawan;
        return $this->gajiKaryawan + $bonus + $tunjangan;
    }
}
    class PegawaiMingguan extends Employee{
        public $hargaBarang;
        public $stockBarang;
        public $totalTerjual;

        public function __construct($namaKaryawan, $gajiKaryawan, $masaKerjaKaryawan, $hargaBarang, $stockBarang, $totalTerjual){
            parent::__construct($namaKaryawan, $gajiKaryawan, $masaKerjaKaryawan);
            $this->hargaBarang = $hargaBarang;
            $this->stockBarang = $stockBarang;
            $this->totalTerjual = $totalTerjual;
           
        }
        public function kenaikanGaji(){
            if ($this->totalTerjual > 70){
                return $this->gajiKaryawan + (0.1 * $this->totalTerjual * $this->hargaBarang);
            } else {
                return $this->gajiKaryawan + (0.03 * $this->totalTerjual * $this->hargaBarang);
            }
        }
    }

$programmer = new Programmer("Andi", 7000000, 5);
echo "Nama Programmer: " .$programmer->namaKaryawan. "<br>";
echo "Masa Kerja: " .$programmer->masaKerjaKaryawan. " tahun<br>";
echo "Gaji Programmer Sebelum Kenaikan: Rp " .number_format($programmer->gajiKaryawan, 0, ',', '.') . "<br>";
echo "Gaji Programmer: Rp " . number_format($programmer->kenaikanGaji(), 0, ',', '.') . "<br>";

$direktur = new Direktur("Rifqo", 13000000, 3);
echo"<br> Nama Direktur: " .$direktur->namaKaryawan. "<br>";
echo "Masa Kerja: " .$direktur->masaKerjaKaryawan. " tahun<br>";
echo "Gaji Direktur Sebelum Kenaikan: Rp " .number_format($direktur->gajiKaryawan, 0, ',', '.') . "<br>";
echo "Gaji Direktur: Rp " . number_format($direktur->kenaikanGaji(), 0, ',', '.') . "<br>";

$pegawai1 = new PegawaiMingguan("Iska", 1000000, 1, 10000, 100, 80);
echo "<br>Nama Pegawai: " .$pegawai1->namaKaryawan. "<br>";
echo "Stock Barang: " .$pegawai1->stockBarang. "<br>";
echo "Harga Barang: " .number_format($pegawai1->hargaBarang, 0, ',', '.') . "<br>";
echo "Total Terjual: " .$pegawai1->totalTerjual. "<br>";
echo "Gaji Pegawai Mingguan: Rp " . number_format($pegawai1->kenaikanGaji(), 0, ',', '.') . "<br>";

$pegawai2 = new PegawaiMingguan("Salsa", 1000000, 1, 10000, 100, 50);
echo "<br>Nama Pegawai: " .$pegawai2->namaKaryawan. "<br>";
echo "Stock Barang: " .$pegawai2->stockBarang. "<br>";
echo "Harga Barang: " .number_format($pegawai2->hargaBarang, 0, ',', '.') . "<br>";
echo "Total Terjual: " .$pegawai2->totalTerjual. "<br>";
echo "Gaji Pegawai Mingguan: Rp " . number_format($pegawai2->kenaikanGaji(), 0, ',', '.') . "<br>";
