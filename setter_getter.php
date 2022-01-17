<?php

class Contoh2
{
    // variabel global
    // public $nama;
    // private $harga;
    // contruktor
  
    public function __construct(public $nama ="kopi", public $harga = 1000)
    {
        $this->nama = $nama;
        $this->harga = $harga;
    }

    //function setter dgn parameter
    public function setNama( $nama)
    {
        $this->nama = $nama;
    }

    public function getNama()
    {
        return $this->nama;
    }

    public function display():void
    {
        echo "Nama : " .$this->getNama()."<br>";
        echo "Harga : " .$this->getHarga();
    }
    
    public function setHarga( $harga)
    {
        $this->harga = $harga;
    }

    public function getHarga()
    {
        return $this->harga;
    }
    

}

$contoh1 = new Contoh2();

$contoh1->setNama(nama: "buku");
$contoh1->setHarga(harga: 2000);
echo $contoh1->display();