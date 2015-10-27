<?php

class BookDAL
{
    private static $path = "../data/bookdatabase.bin";
    private static $databaseFile;
    
    public function __construct()
    {
        if(!file_exists(self::$path))
        {
            self::$databaseFile = fopen(self::$path, "w+");
            fclose(self::$databaseFile);
        }
    }
    
    public function clear()
    {
        $Books = array();
        $this->save($Books);
    }
    
    public function save($Books)
    {
        date_default_timezone_set('Europe/Stockholm');

		$timeString = date("W");
        
        $SerializedBooks = serialize(array("Week" => $timeString,"Books" => $Books));
        file_put_contents(self::$path, $SerializedBooks);
    }
    
    public function addBook($bookName, $bookInfo, $day)
    {
        $Books = self::getUnserializedBooks();
        if($Books == false)
        {
            $Books = array();
        }
        array_push($Books, new Book($bookName, $bookInfo, $day));
        
        $this->save($Books);
    }
    
    public function getUnserializedBooks(){
        
        $unserialized = unserialize(file_get_contents(self::$path));
        
        date_default_timezone_set('Europe/Stockholm');
		$timeString = date("W");
		
        if ( !isset($unserialized["Week"]) || $unserialized["Week"] != $timeString)
        {
            $this->clear();
            return array();
        }
        
        return $unserialized["Books"];
    }
    
    public function getSpecificBook($day)
    {
        $books = $this->getUnserializedBooks();
        foreach($books as $b)
        {
            if ($day == $b->getBookDay())
            {
                return $b;
            }
        }
    }
}