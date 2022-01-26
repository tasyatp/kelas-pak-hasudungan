<?php

class ContohStatic
{
    public static $nama =["rendi","retno","rezi"];
    public static $index = 1;

    public static function all()
    {
       $index = 1;
        foreach (self::$nama as $na)
        {
            echo $index++ .".".$na . "<br>";
        }
    }

    public function display()
    {
        echo self::all();
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