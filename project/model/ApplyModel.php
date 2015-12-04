<?php

class ApplyModel
{
   private static $applyDAL;
    
    public function __construct($aDAL)
    {
        self::$applyDAL = $aDAL;
    }
    
    public function ApplyRegister($applyName, $applyInfo)
    {
        self::$applyDAL -> addApply($applyName, $applyInfo);
    }
    
    public function GetApplys()
    {
        return self::$bookDAL->getUnserializedApplys();
    }
}

class ApplyModelException extends Exception
{}