<?php

class ShowApplicationView
{
    private $newApplys = array();
    
    public function ShowApplications(ApplyDAL $aDAL)
    {
        foreach($aDAL->getUnserializedApplys() as $applys)
        {
            array_push($this->newApplys, $applys);
        }  
        return $this->newApplys;
    }
}