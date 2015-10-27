<?php

class RegisterController
{
    private $rv;
    private $rm;
    
    public function __construct(RegisterView $rv, RegisterModel $rm)
    {
        $this->rv = $rv;
        $this->rm = $rm;
    }
    
    public function initRegister()
    {
        try
        {
            if($this-> rv -> hasPressedRegister())
            {
                self::RegisterNewUser();
            }
        }
        catch(RegisterModelException $e)
        {
            $this-> rv -> setErrorMessage($e);
        }
        catch(Exception $e)
        {
            echo "An unhandeld exception was thrown. Please infrom...";
        }
    }
    
    public function RegisterNewUser()
    {
        $registerUserName = $this-> rv -> getRequestUserName();
        $this-> rm -> Register($registerUserName, $this -> rv -> getRequestPassword(), $this-> rv -> getRequestPasswordCheck());
        
        $_SESSION["newUser"] = $registerUserName;
        
        header("Location: ?login");
    }
}