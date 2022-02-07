<?php

class LatihanMencari
{
    public $names = ["khelmy","steven","adventy","stenly","ricardo","kelvin","Alvina","angel"];
    public bool $search = true;


    public function getAllName ():LatihanMencari
    {
        $index = 1;
        echo "nama seluruh siswa:<br>";

        foreach($this->names as $name)
        {
           echo $index++ . ".".$name. "<br>";
        }  
        return $this; 
    }

    public function searchname(string $searchname):void 
    {
        echo "Nama yang dicari : [" . $searchname . "] . <br>";
        for($i = 0; $i < count($this->names); $i++)
        {
            if ($searchname == $this->names[$i])
            {
                $this->search = true;
                echo "Nama [".$this->names [$i]."]  ada di index :" . ($i+1); 
            }
        }
        if ($this->search == false)
        {
            echo "Nama [". $searchname . "] tidak ada di dalam array <br>"; 
        }
    }
}

 $array = new LatihanMencari();
echo $array->getAllName()->searchname(searchname: "angel");