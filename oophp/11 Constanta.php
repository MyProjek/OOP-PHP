<?php

// define('NAMA', 'Mochammad Toyib');
// echo NAMA;

// echo "<br>";

// const UMUR = 32; // Ini bisa digunakan didalam class OOP
// echo UMUR;

class  Coba {
    const NAMA = 'Toyibers';
}

echo Coba::NAMA;

echo "<hr>";

echo __LINE__; // Ini adalah Magic Constanta PHP
echo "<br>";
echo __FILE__;
echo "<br>";
echo __DIR__;

echo "<hr>";

function coba() {
    return __FUNCTION__; // Ini adalah Constanta Function
}

echo coba();

echo "<hr>";

class toyib {
    public $kelas = __CLASS__;
}
$obj = new toyib;
echo $obj->kelas;