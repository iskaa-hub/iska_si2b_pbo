<?php
class manusia {
    public $nama_saya;
    function berinama($saya){
        $this->nama_saya=$saya;
    }
}

class teman extends manusia{
    public $nama_teman;
    function berinama($teman){
        $this->nama_teman=$teman;
}
}

$objectmanusia = new manusia;
$objectmanusia->berinama("Iska");

$objectteman = new teman;
$objectteman->berinama("Dika");
$objectteman->berinama("Andra");

echo "Nama Saya: " .$objectmanusia->nama_saya."<br/>";
echo "Nama Teman Saya: " .$objectteman->nama_teman."<br/>";
?>