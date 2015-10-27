<?php

class MasterController
{
    
    private $lc;
    private $rc;
    private $bc;
    
    public function __construct($lc, $rc, $bc)
    {
        $this->lc = $lc;
        $this->rc = $rc;
        $this->bc = $bc;
    }
    
    public function init()
    {
        $this->lc->initLogin();
        $this->rc->initRegister();
        $this->bc->initBook();
    }
}