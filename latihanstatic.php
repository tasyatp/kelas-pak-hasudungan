<?php

class Bapak 
{
    public static string $judul = "ini dari class Bapak Sefry";

    public static function getJudul():string
    {
        return static::$judul;
    }
    public static function showClass() :static
    {
        return new static;
    }

}
class Anak extends Bapak 
{
    public static string $judul = "ini dari class Anak Angel";
    
}

echo Bapak::getJudul();
echo "<br>";
echo var_dump(Bapak::showClass());
echo "<hr>";
echo "<hr>";
echo "<hr>";
echo "<hr>";
echo Anak::getJudul();
echo "<br>";
echo var_dump(Anak::showClass());