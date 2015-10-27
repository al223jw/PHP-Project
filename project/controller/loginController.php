<?php

class LoginController
{
    private $v;
    private $lm;
    
    public function __construct(LoginView $v, LoginModel $lm)
    {
        $this->v = $v;
        $this->lm = $lm;
    }
    
    public function initLogin()
    {
        try
        {
            if($this-> v ->UserHasPressedLogin())
            {
                self::LogIn();
            }
            else if($this-> v ->UserHasPressedLogout())
            {
                self::logOut();
            }
        }
        catch(LoginModelException $e)
        {
            $this-> v -> setStatusMessage($e);
        }
        catch(Exception $e)
        {
            echo "An unhandeld exception was thrown . Please infrom...";
        }
    }
    
    public function logIn()
    {
        $this -> lm -> tryLoginInfo($this -> v -> getRequestUserName(), $this -> v -> getRequestUserPassword());
    
        $this -> v -> loginMessage();
    }
    
    public function logOut()
    {
        $this -> lm -> logOut();
        
        $this -> v -> logoutMessage();
    }
}
 
 

