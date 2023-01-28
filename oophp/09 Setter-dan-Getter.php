<?php

class Produk {
    // Ini adalah Property
    private  $judul, // public dapat digunakan dimana saja, bahkan di luar kelas
            $penulis,
            $penerbit,
            $harga,
            $diskon = 0;


    // Ini adalah bagian dari Constructor
    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // Ini Setter untu validasi
    public function setJudul( $judul ) {
        $this->judul = $judul;
    }

    // Ini Getter
    public function getJudul() {
        return $this->judul;
    }

    public function setPenulis( $penulis ){
        $this->penulis = $penulis;
    }

    public function getPenulis(){
        return $this->penulis;
    }

    public function setPenerbit( $penerbit ){
        $this->pennerbit = $penerbit;
    }

    public function getPenerbit(){
        return $this->penerbit;
    }

    public function setHarga( $harga ){
        $this->harga = $harga;
    }

    public function setDiskon( $diskon ){
       $this->diskon = $diskon;
    }

    public function getDiskon(){
        return $this->$diskon;
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
echo "<hr>";
$produk1->setPenulis("Moch Toyib");
echo $produk1->getPenulis();