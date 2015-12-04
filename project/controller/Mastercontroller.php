<?php

class MasterController
{
    
    private $lc;
    private $rc;
    private $bc;
    private $ac;
    
    public function __construct($lc, $rc, $bc, $ac)
    {
        $this->lc = $lc;
        $this->rc = $rc;
        $this->bc = $bc;
        $this->ac = $ac;
    }
    
    public function init()
    {
        $this->lc->initLogin();
        $this->rc->initRegister();
        $this->bc->initBook();
        $this->ac->initApply();
    }
}