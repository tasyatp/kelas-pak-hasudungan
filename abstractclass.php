<?php
abstract class Product
{
   public $nama ;
    //syarat
    //1.memilik atribut dan fungsi yg abstract
    //tidk memliki contain body pd function
    // harus sama dngn class implementasinya

    abstract public function judul(String $nama):String;
    
}

class Buku extends Product
{
    public $nama;
    public function __construct(String $nama = "tasya")
    {
        $this->nama = $nama;
    }

    public function getNama():string
    {
        return $this->nama;
    }
    public function judul(String $nama):String
    {
        return $this->nama;
    }
    public function getjudul()
    {
        return $this->nama;
    }
}


$buku = new Buku();
echo $buku->getJudul();