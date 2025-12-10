<?php

class Rumah {

    // Properti
    public $warna = "Merah";
    public $jumlahKamar = "2";
    public $alamat = "Jln. Raya No.1";

    // Konstruktor
    public function __construct($warnaBaru, $kamarBaru) 
    {
        $this->warna = $warnaBaru;
        $this->jumlahKamar = $kamarBaru;
    }

    // Method
    public function kunciPintu() {
        return "Pintu sudah dikunci!";
    }

    public function gantiWarna($warnaBaru) {
        $this->warna = $warnaBaru;
        return "Warna rumah berhasil diubah menjadi " . $this->warna;
    }

}

function pasangListrik($rumah) 
{
    return "rumah yang berwarna " . $rumah->warna . " ini dipasang listrik";
}

// rumah 1
$rumahSaya = new Rumah('Kuning', 3);
echo pasangListrik($rumahSaya);
// $rumahSaya->gantiWarna("Kuning");
// echo "Rumah saya berwarna $rumahSaya->warna";
// echo "<br>";
// echo "Rumah saya $rumahSaya->jumlahKamar";
// echo "<br>";
// echo "Rumah saya ". $rumahSaya->kunciPintu();
// echo "<br>";

// rumah 2
// $rumahAde = new Rumah('Biru', 8);
// // $rumahAde->gantiWarna("Biru");
// // echo "Rumah saya berwarna $rumahAde->warna";
// // echo "<br>";
// // echo "Rumah saya $rumahAde->jumlahKamar";
// // echo "<br>";
// // echo "Rumah saya ". $rumahAde->kunciPintu();
// // echo "<br>";

?>