<?php

class ApplyController
{
    private $av;
    private $am;
    
    public function __construct(ApplyView $av, ApplyModel $am)
    {
        $this->av = $av;
        $this->am = $am;
    }
    
    public function initApply()
    {
        try
        {
            if($this-> av -> hasPressedApply())
            {
                self::ApplyNewUserRecuest();
            }
        }
        catch(ApplyModelException $e)
        {
            $this-> av -> setErrorMessage($e);
        }
        catch(Exception $e)
        {
            echo "An unhandeld exception was thrown. Please infrom...";
        }
    }
    
    public function ApplyNewUserRecuest()
    {
        $applyName = $this-> av -> getApplyName();
        $applyInfo = $this-> av -> getApplyInformation();
        $this-> am -> ApplyRegister($applyName, $applyInfo);
        
        $_SESSION["newApply"] = $registerUserName;
        
        header("Location: ?login");
    }
}