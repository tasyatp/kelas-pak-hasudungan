<?php

class Bapak
{
    public $nama;
    public $marga;
    public $status;

    public function __construct(string $nama ="Arief", string $marga="Lim", string $status="Bapak")
    {
        $this->nama = $nama;
        $this->marga = $marga;
        $this->status = $status;
    }

    public function getNama() : string
    {
        return $this->nama;
    }

    public function getMarga() : string
    {
        return $this->marga;
    }

    public function getStatus() : string
    {
        return $this->status;
    }

    public function display():void
    {
        echo  $this->Judul()."<br>";
        echo "Nama : " .$this->getNama()."<br>";
        echo "Marga : ".$this->getMarga()."<br>";
        echo "Status : ".$this->getStatus()."<br>";  
    }

    public function judul()
    {
        echo "ini dari class ".$this->getStatus();
    }
}

class Anak extends Bapak
{
    public $role;
    
    public function __construct(string $nama ="Arief", string $marga="Lim", string $status="Anak", string $role = "Murid")
    {
            parent::__construct($nama, $marga, $status); //overiding
            $this->role = $role;
    }

    public function displayChild():void
    {
        echo $this->display();
        echo "Role : ".$this->getRole();
    }

    public function getRole() : string
    {
        return $this->role;
    }
}

$obji = new Bapak();
$obje = new Anak();
echo $obji->display();
echo "<hr>";
echo $obje->displayChild();