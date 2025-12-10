<?php
class Produk {
    // Properti umum
    public $judul,
           $penulis,
           $penerbit,
           $harga;

    // Constructor milik Parent
    public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0) 
    {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // Method milik Parent
    public function getLabel() 
    {
        return "$this->penulis, $this->penerbit";
    }
}

class komik extends Produk{
    public $jmlHalaman;

    public function __construct($judul, $penulis, $penerbit, $harga, $jmlHalaman) 
    {
        parent::__construct($judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduk()
    {
        $info = "Komik:" . parent::getLabel(). " | Harga: Rp{$this->harga} | Halaman: {$this->jmlHalaman}";
        return $info;
    }
}

$komik = new komik('Naruto', 'Masashi Kishimoto', 'Shueisha', 10000, 10);
echo $komik->getInfoProduk();
?>