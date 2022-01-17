<?php

class Binatang
{
    // public $nama; //variabel global
    // public $jenis; //this

    // public function __construct($nama = "Milo", $jenis = "cua-cua")
    // {
    //     $this->nama = $nama;
    //     $this->jenis = $jenis;
    // }
    
    // attributes promotions

    public function __construct(public $nama = "Milo",public $jenis = "cua-cua")
    {}
   
    public function display():void
    {
      $nama = "black";
       
        echo "Nama : " .$this->nama . "<br>";
        echo "Jenis : " .$this->jenis;
    }
}

// inisialisasi objek

$binatang1 = new Binatang("Black","Herder");

echo $binatang1->display();