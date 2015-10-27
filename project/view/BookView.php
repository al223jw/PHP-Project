<?php

class BookView
{
    private static $bookNameID = "BookView::BookName";
    private static $bookInfoID = "BookView::BookInfo";
    private static $bookID = "BookView::Book";
    
    private static $saveBookInfo = "";
    private static $saveBookName = "";
    
    public function BookLayout()
    {
        return'
                <form method="post">
                    <fieldset>
                        <legend>Book - enter the fields below</legend>

                        <label for="' . self::$bookNameID . '">Book name: </label>
                        <input type="text" id="' . self::$bookNameID . '" name="' . self::$bookNameID . '" value="' . self::$saveBookName . '"/><br/>
                        
                        <label for="' . self::$bookInfoID . '">Booking info: </label>
                        <input type="text" id="' . self::$bookInfoID . '" name="' . self::$bookInfoID . '" value="' . self::$saveBookInfo . '"/><br/>
                        
                        <input type="submit" name="' . self::$bookID . '" value="Book" />
                    </fieldset>
                </form>
        ';
    }
    
    public function getBookName()
    {
        if(isset($_POST[self::$bookNameID]))
        {
            self::$saveBookName = trim($_POST[self::$bookNameID]);
            return self::$saveBookName;
        }
        return null;
    }
    
    public function getBookInformation()
    {
        if(isset($_POST[self::$bookInfoID]))
        {
            self::$saveBookInfo = trim($_POST[self::$bookInfoID]);
            return self::$saveBookInfo;
        }
        return null;
    }
    
    public function hasPressedBook()
    {
       if(isset($_POST[self::$bookID]))
        {
            return trim($_POST[self::$bookID]);
        }
        return null; 
    }
    
    public function setMessageError($e)
    {
        if(strpos($e -> getMessage(), "Error while registrating"))
        {
            self::$saveBookName = strip_tags(self::$saveBookName);
        }
        self::$bookNameID = $e -> getMessage();
    }
}