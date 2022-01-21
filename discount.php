<?php

class Hitung
{
//  public $harga=0;
//  public $diskon=0;
//  public $jam=0;
 private $harga;
 private $diskon;

 public function __construct( $harga = 5000, $diskon = 5)
 {
    $this->harga = $harga;
    $this->diskon = $diskon;
 }

 public function getTotal( int $jam ) // masukan parameter jumlahjam 
 { 
    //  logic nya pake if else 
    $total = 0; // variable local 
    if($jam<=5) // masukkan harga * jumlahJam , 
    {
       $total += $jam *$this->harga;
       return $total;// rumus perkalian
    }
    elseif($jam >=6 && $jam<=10)
    {
        $total += ($jam * $this->harga)-($this->harga * $this->diskon /100);
        return $total;
    }
    elseif($jam<=11 && $jam<=24)
    {
        $total += ($jam * $this->harga)-($this->harga * $this->diskon+10 /100);
        return $total;
    }
    else{
        return $total;
    }
//   $total += ($this->jam*($this->harga)-($this->harga)*($this->diskon/5));
//   return $total;
 }
}
$objek= new Hitung;
echo $objek->getTotal ($jam = 10);


//     if($objek->jam>=5){
//  echo number_format($objek->Cek_Harga());
//     }elseif($objek->jam>=15){
//  echo number_format($objek->Cek_Harga());
//     }else{
//  echo "Tidak ada nilai yang bisa diperiksa";
// }

