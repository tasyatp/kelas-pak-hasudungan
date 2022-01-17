<?php

class User
{
    public $nama;
    public $umur;

    public function __construct($nama, $umur)
    {
        $this->nama =$nama;
        $this->umur =$umur;
    
    }
}

$user1 = new User("Asep", 17);
echo $user1->nama = "tasya <br>";
echo $user1->umur = 24;