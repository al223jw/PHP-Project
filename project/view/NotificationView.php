<?php

class NotificationView
{
    private $book;
    public function setBooks($book)
    {
        $this->book = $book;
    }
    
    public function getDay()
    {
        return isset($_GET["day"]) ? $_GET["day"] : "";
    }
    
    public function notifications()
    {
        
        if ($this->book != null)
        {
            $html = "";
            $html .= "<div>";
            
            $html .= "<div><div>" . $this->book->getBookName() . "</div>";
            $html .= "<div>" . $this->book->getBookInfo() . "</div><hr>";
            
            $html .= "</div>";
        }
        else{
            $html = "No book found on the specified day";
        }
        return $html;
    }
}