<?php

class ContohStatic
{
    public static $nama ="nama varibel";

    public static function all()
    {
        echo "ini contoh fucntion static";
    }
}
class SubStatic extends ContohStatic
{
    
}

//inisalissi object
echo ContohStatic:: $nama;
echo ContohStatic:: $nama;
echo "<br>";
echo ContohStatic::all();