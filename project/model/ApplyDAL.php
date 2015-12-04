<?php

class ApplyDAL
{
    private static $path = "../data/applydatabase.bin";
    private static $databaseFile;
    
    public function __construct()
    {
        if(file_exists(self::$path))
        {
            self::$databaseFile = fopen(self::$path, "a+");
            fclose(self::$databaseFile);
        }
    }
    
    public function addApply($applyName, $applyInfo)
    {
        $Applys = self::getUnserializedApplys();
        if($Applys == false)
        {
            $Applys = array();
        }
        array_push($Applys, new Apply($applyName, $applyInfo));
        
        $SerializedUsers = serialize($Applys);
        file_put_contents(self::$path, $SerializedUsers);
    }
    
    public function getUnserializedApplys(){
        return unserialize(file_get_contents(self::$path));
    }
}