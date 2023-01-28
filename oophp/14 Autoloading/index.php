<?php

require_once 'App/init.php';

// Memanggil Instace pada class
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shounen Jump", 3000, 100);
$produk2 = new Game("Uncharted", "Nei Druckman", "Sony Computer", 25000, 50);


$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk( $produk1 );
$cetakProduk->tambahProduk( $produk2);
echo $cetakProduk->cetak();

echo "<hr>";

new Coba();