<?php

class Produk {
    // Ini adalah Property
    public  $judul, // public dapat digunakan dimana saja, bahkan di luar kelas
            $penulis,
            $penerbit;
    
    // protected 
    protected $diskon = 0; // hanya dapat digunakan di dalam sebuah kelas beserta turunannya

    // private
    private $harga; // hanya dapat digunakan di dalam sebuah kelas tertentu saja

    
    // Ini adalah bagian dari Constructor
    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getHarga() {
        return $this->harga - ( $this->harga * $this->diskon / 100);
    }

    // ini adalah Method
    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    // Ini bagian method inheritance Parents
    public function getInfoProduk() {
        $str = "{$this->judul}, {$this->getLabel()} (Rp. {$this->harga})";
        
        return $str;
    }
}

// Child Parent Inheritance dgn Overriding
class Komik extends Produk {
    public $jmlHalaman;

    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0,
                        $jmlHalaman=0){
                            
        parent::__construct( $judul, $penulis, $penerbit, $harga);
        $this->jmlHalaman = $jmlHalaman;
    }

    public function getInfoProduk() {
        $str = "Komik : ". parent::getInfoProduk(). "- {$this->jmlHalaman} Halaman.";
        
        return $str;
    }
}

// Child Parent Inheritance dgn Overriding
class Game extends Produk {
    public $waktuMain;

    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0,
                        $waktuMain=0){
                            
        parent::__construct( $judul, $penulis, $penerbit, $harga);
        $this->waktuMain = $waktuMain;
    }


    // fitur protected
    public function setDiskon( $diskon ){
        $this->diskon = $diskon;
    }

    public function getInfoProduk() {
        $str = "Game : ". parent::getInfoProduk(). " ~ {$this->waktuMain} Jam.";
        
        return $str;
    }
}

// Ini adalah Object Type
class CetakInfoProduk {
    public function cetak( Produk $produk ){
        $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
        return $str;
    }
}


// Memanggil Instace pada class
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shounen Jump", 3000, 100);
$produk2 = new Game("Uncharted", "Nei Druckman", "Sony Computer", 25000, 50);


echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();
echo "<hr>";

// $produk2->harga = 5000;
// echo $produk2->harga;


$produk2->setDiskon(50);
echo $produk2->getHarga();