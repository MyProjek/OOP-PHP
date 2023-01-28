<?php

class Produk {
    // Ini adalah Property
    public  $judul,
            $penulis,
            $penerbit,
            $harga,
            $jmlHalaman,
            $waktuMain,
            $tipe;
    
    // Ini adalah bagian dari Constructor
    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0,
                                 $jmlHalaman=0, $waktuMain=0, $tipe){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
        $this->jmlHalaman = $jmlHalaman;
        $this->waktuMain = $waktuMain;
        $this->tipe = $tipe;
    }

    // ini adalah Method
    public function getLabel() {
        return "$this->penulis, $this->penerbit";
    }

    // Ini bagian method inheritance-problem
    public function getInfoLengkap() {
        // Komik : Naruto | Mashashi Kishimoto, Shonen Jump (Rp. 30000) - 100 halaman.
        $str = "{$this->tipe} : {$this->judul}, {$this->getLabel()} (Rp. {$this->harga})";
        if( $this->tipe == "Komik" ){
            $str .= " - {$this->jmlHalaman} Halaman.";
        }else if( $this->tipe == "Game" ){
            $str .= " - {$this->waktuMain} Jam.";
        }

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
$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shounen Jump", 3000, 100, 0, "Komik");
$produk2 = new Produk("Uncharted", "Nei Druckman", "Sony Computer", 25000, 0, 50, "Game");


echo $produk1->getInfoLengkap();
echo "<br>";
echo $produk2->getInfoLengkap();



