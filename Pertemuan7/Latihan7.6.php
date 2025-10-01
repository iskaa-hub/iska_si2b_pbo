<?php
interface Hewan {
    public function Makan();
    public function Bergerak();
    public function Beranak();
}

class Burung implements Hewan {
    public function Makan() {
        return "Burung makan biji-bijian<br/>";
    }

    public function Bergerak() {
        return "Burung bergerak dengan terbang dan melompat<br/>";
    }

    public function Beranak() {
        return "Burung beranak dengan bertelur<br/>";
    }
}

class Kambing implements Hewan {
    public function Makan() {
        return "Kambing makan rumput<br/>";
    }

    public function Bergerak() {
        return "Kambing bergerak dengan berjalan dan berlari<br/>";
    }

    public function Beranak() {
        return "Kambing beranak dengan melahirkan<br/>";
    }
}

$hewanList = [
    "Burung" => new Burung(),
    "Kambing" => new Kambing()
];

foreach ($hewanList as $nama => $hewan) {
    echo "<b>Perilaku $nama :</b><br/>";
    echo $hewan->Makan();
    echo $hewan->Bergerak();
    echo $hewan->Beranak();
    echo "<br/>";
}
?>
