<?php

class ApplyView
{
    private static $applyNameID = "ApplyView::ApplyName";
    private static $applyInfoID = "ApplyView::ApplyInfo";
    private static $applyID = "ApplyView::Apply";
    
    private static $saveApplyInfo = "";
    private static $saveApplyName = "";
    
    public function ApplyLayout()
    {
        return'
                <form method="post">
                    <fieldset>
                        <legend>Apply - enter the fields below</legend>

                        <label for="' . self::$applyNameID . '"> Name&Lastname: </label>
                        <input type="text" id="' . self::$applyNameID . '" name="' . self::$applyNameID . '" value="' . self::$saveApplyName . '"/><br/>
                        
                        <label for="' . self::$applyInfoID . '">Preferd Username and Password : </label>
                        <input type="text" id="' . self::$applyInfoID . '" name="' . self::$applyInfoID . '" value="' . self::$saveApplyInfo . '"/><br/>
                        
                        <input type="submit" name="' . self::$applyID . '" value="Apply" />
                    </fieldset>
                </form>
        ';
    }
    
    public function getApplyName()
    {
        if(isset($_POST[self::$applyNameID]))
        {
            self::$saveApplyName = trim($_POST[self::$applyNameID]);
            return self::$saveApplyName;
        }
        return null;
    }
    
    public function getApplyInformation()
    {
        if(isset($_POST[self::$applyInfoID]))
        {
            self::$saveApplyInfo = trim($_POST[self::$applyInfoID]);
            return self::$saveApplyInfo;
        }
        return null;
    }
    
    public function hasPressedApply()
    {
       if(isset($_POST[self::$applyID]))
        {
            return trim($_POST[self::$applyID]);
        }
        return null; 
    }
    
    public function setMessageError($e)
    {
        if(strpos($e -> getMessage(), "Error while applying to application"))
        {
            self::$saveApplyName = strip_tags(self::$saveApplyName);
        }
        self::$applyNameID = $e -> getMessage();
    }
}