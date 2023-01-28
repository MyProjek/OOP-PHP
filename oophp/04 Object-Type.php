<?php

class Produk {
    // Ini adalah Property
    public  $judul,
            $penulis,
            $penerbit,
            $harga;
    
    // Ini adalah bagian dari Constructor
    public function __construct( $judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0){
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    // ini adalah Method
    public function getLabel() {
        return "$this->penulis, $this->penerbit";
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
$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shounen Jump", 3000);

$produk2 = new Produk("Uncharted", "Nei Druckman", "Sony Computer", 25000);


echo "Komik : " . $produk1->getLabel();
echo "<br>";
echo "Game : " . $produk2->getLabel();
echo "<br>";

$infoProduk1 = new CetakInfoProduk();
echo $infoProduk1->cetak($produk1);
echo "<br>";
echo $infoProduk1->cetak($produk2);

