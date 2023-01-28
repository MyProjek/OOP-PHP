<?php

class Produk {
    // Ini adalah Property
    public  $judul,
            $penulis,
            $penerbit,
            $harga,
            $jmlHalaman,
            $waktuMain;
    
    // Ini adalah bagian dari Constructor
    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0,
                                 $jmlHalaman=0, $waktuMain=0){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;
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

// Child Parent Inheritance
class Komik extends Produk {
    public function getInfoProduk() {
        $str = "Komik : {$this->judul}, {$this->getLabel()} (Rp. {$this->harga}) - {$this->jmlHalaman} Halaman.";
        
        return $str;
    }
}

// Child Parent Inheritance
class Game extends Produk {
    public function getInfoProduk() {
        $str = "Game : {$this->judul}, {$this->getLabel()} (Rp. {$this->harga}) ~ {$this->waktuMain} Jam.";
        
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
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shounen Jump", 3000, 100, 0);
$produk2 = new Game("Uncharted", "Nei Druckman", "Sony Computer", 25000, 0, 50);


echo $produk1->getInfoProduk();
echo "<br>";
echo $produk2->getInfoProduk();



