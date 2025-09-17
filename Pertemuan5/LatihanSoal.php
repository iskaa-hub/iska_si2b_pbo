<?php
class kendaraan
{
    var $jumlahRoda;
    var $warna;
    var $bahanBakar;
    var $harga;
    var $merek;

    function statusHarga()
    {
        if ($this->harga > 50000000) $status = 'Mahal';
        else $status = 'Murah';
        return $status;
    }
}
class Pesawat extends kendaraan{
    private $tinggimaks;
    private $kecepatanmaks;

    public function setTinggiMaks($tinggimaks){
        $this->tinggimaks = $tinggimaks;
    }
    public function setKecepatanMaks($kecepatanmaks){
        $this->kecepatanmaks = $kecepatanmaks;
    }

    public function bacaTinggiMaks(){
        return $this->tinggimaks;
    }
    public function bacaKecepatanMaks()
    {
        return $this->kecepatanmaks;
    }
function biayaOperasional(){
 $biaya = $this->harga;

        if ($this->tinggimaks > 5000 && $this->kecepatanmaks > 800) {
            $biaya *= 0.7; // 30% diskon
        } elseif ($this->tinggimaks >= 3000 && $this->tinggimaks <= 5000 && $this->kecepatanmaks >= 500 && $this->kecepatanmaks <= 800) {
            $biaya *= 0.8; // 20% diskon
        } elseif ($this->tinggimaks < 3000 && $this->kecepatanmaks < 500) {
            $biaya *= 0.9; // 10% diskon
        }

        // Biaya tambahan 5%
        $biaya += $this->harga * 0.05;

        return $biaya;
    }
}

// Contoh penggunaan:

$boeing737 = new pesawat();
$boeing737->merek = "Boeing 737";
$boeing737->harga = 2000000000;
$boeing737->setTinggiMaks(7500);
$boeing737->setKecepatanMaks(650);

echo "Biaya operasional pesawat ".$boeing737->merek." dengan harga Rp ".$boeing737->harga." yang memiliki tinggi maksimum ".$boeing737->bacaTinggiMaks().
     " feet dan kecepatan maksimum ".$boeing737->bacaKecepatanMaks()." km/jam adalah Rp ".number_format($boeing737->biayaOperasional(), 0, ',', '.');
?>
