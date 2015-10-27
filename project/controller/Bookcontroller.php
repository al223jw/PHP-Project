<?php

class BookController
{
    private $sv;
    private $bv;
    private $bm;
    private $nv;
    
    public function __construct(SchemeView $sv, BookView $bv, BookModel $bm, NotificationView $nv)
    {
        $this->sv = $sv;
        $this->bv = $bv;
        $this->bm = $bm;
        $this->nv = $nv;
    }
    
    public function initBook()
    {
        $this->nv->setBooks($this->bm->GetCurrentBook($this->nv->getDay()));
        $this->sv->setDays($this->bm->GetBooks());
        
        try
        {
            if($this-> bv -> hasPressedBook())
            {
                self::RegisterNewBook();
            }
        }
        catch(BookModelException $e)
        {
            $this-> bv -> setErrorMessage($e);
        }
        catch(Exception $e)
        {
            echo "An unhandeld exception was thrown. Please infrom...";
        }
        
    }
    
    public function RegisterNewBook()
    { 
        $bookRegisterUsername = $this -> bv -> getBookName();
        
        $this-> bm -> BookRegister($bookRegisterUsername, $this-> bv -> getBookInformation(), $this->sv->getCurrentDay()); 
        
        header("Location: ?scheme");
    }
    
    
}