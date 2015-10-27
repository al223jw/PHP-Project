<?php

class Book
{
    private $bookName;
    private $bookInfo;
    private $day;
    
    public function __construct($bookN, $bookI, $day)
    {
        $this->bookName = $bookN;
        $this->bookInfo = $bookI;
        $this->day = $day;
    }
    
    public function getBookName()
    {
        return $this->bookName;
    }
    
    public function getBookInfo()
    {
        return $this->bookInfo;
    }
    
    public function getBookDay()
    {
        return $this->day;
    }
}