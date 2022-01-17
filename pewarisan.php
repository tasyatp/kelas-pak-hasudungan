<?php

class Babeh
{
//    data member
    public $nama;
    public $harga;

    //constructor
    public function __construct(string $marga = "Huang",string $nama = "Tasya")
    {
        $this->nama = $nama;
        $this->marga = $marga;
    }

    public function setNama(string $nama)
{
    $this->nama = $nama;
}
public function getNama()
{
    return $this->nama;
}

public function display(): void
{
    echo "Nama : ".$this->getNama()."<br>";
    echo "Marga :".$this->getMarga();
}

public function getMarga()
{
    return $this->marga;
}
}
class Bocil extends Babeh
{

}
$bocil1 =new Bocil;
echo $bocil1->display();