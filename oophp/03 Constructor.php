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


// Memanggil Instace pada class
$produk1 = new Produk("Naruto", "Masashi Kishimoto", "Shounen Jump", 3000);

$produk2 = new Produk("Uncharted", "Nei Druckman", "Sony Computer", 25000);

$produk3 = new Produk("Dragon Ball");


echo "Komik : " . $produk1->getLabel();
echo "<br>";
echo "Game : " . $produk2->getLabel();
echo "<br>";
var_dump($produk3);