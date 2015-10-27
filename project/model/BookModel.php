<?php

class BookModel
{
   private static $bookDAL;
    
    public function __construct($bDAL)
    {
        self::$bookDAL = $bDAL;
    }
    
    public function BookRegister($bookName, $bookInfo, $day)
    {
        self::$bookDAL -> addBook($bookName, $bookInfo, $day);
    }
    
    public function GetCurrentBook($day)
    {
        return self::$bookDAL->getSpecificBook($day);
    }
    
    public function GetBooks()
    {
        return self::$bookDAL->getUnserializedBooks();
    }
}

class BookModelException extends Exception
{}