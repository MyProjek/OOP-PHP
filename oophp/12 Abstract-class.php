<?php

abstract class Produk {
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
    abstract public function getInfoProduk();

    public function getInfo(){
        $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";
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
        $str = "Komik : ". $this->getInfo(). "- {$this->jmlHalaman} Halaman.";
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
        $str = "Game : ". $this->getInfo(). " ~ {$this->waktuMain} Jam.";
        
        return $str;
    }
}

// Ini adalah Object Type
class CetakInfoProduk {
    public $daftarProduk = array();

    public function tambahProduk( Produk $produk ) {
        $this->daftarProduk[] = $produk;
    }

    public function cetak( ){
        $str = "DAFTAR PRODUK : <br>";

        foreach( $this->daftarProduk as $p ) {
            $str .= "- {$p->getInfoProduk()} <br>";
        }
        return $str;
    }
}


// Memanggil Instace pada class
$produk1 = new Komik("Naruto", "Masashi Kishimoto", "Shounen Jump", 3000, 100);
$produk2 = new Game("Uncharted", "Nei Druckman", "Sony Computer", 25000, 50);


$cetakProduk = new CetakInfoProduk();
$cetakProduk->tambahProduk( $produk1 );
$cetakProduk->tambahProduk( $produk2);
echo $cetakProduk->cetak();


// Pengertian Konsep Abstract
// Sebuah kelas yang tidak dapat di-instansiasikan
// Mendefinisikan interface untuk kelas lain menjadi turunan
// Berperan sebagai 'Kerangka Dasar' untuk kelas turunannya

