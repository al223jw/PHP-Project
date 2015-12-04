<?php

class Apply
{
    private $applyName;
    private $applyInfo;
    
    public function __construct($applyN, $applyI)
    {
        $this->applyName = $applyN;
        $this->applyInfo = $applyI;
    }
    
    public function getApplyName()
    {
        return $this->applyName;
    }
    
    public function getApplyInfo()
    {
        return $this->applyInfo;
    }
}