<?php

class SchemeView
{
    private $days;
    public function generateScheme()
    {
        // width="600"
        return'
                <form method="post">
                    <fieldset>
                         <table style="width: 600px">
                            <tr>
                                ' . $this->getDay() . '
                            </tr>
                            <tr>
                                <th>'. $this->getWeek() .'</th>
                                ' . $this->dayArray() . '
                            </tr>
                          </table>
                    </fieldset>
                </form>
        ';
    }
    
    private function getWeek()
    {
		date_default_timezone_set('Europe/Stockholm');

		$timeString = date("W");
		return '<p>' . $timeString . '</p>';
    }
    
    public function getDayArray()
    {
        return array('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday','sunday');
    }
    
    public function dayArray()
    {
        $dayArray = $this->getDayArray();
        $dayToHtml = "";
        
        foreach($dayArray as $day) 
        {
            if($this->isAlreadyIsBooked($day))
            {
                $dayToHtml .= '<th><a href="?notification&day=' . $day . '">Notification</a></th>';
            }
            else
            {
                $dayToHtml .= '<th><a href="?day=' . $day . '">Book</a></th>';
            }
        }
        return $dayToHtml;
    }
    
    public function getCurrentDay()
    {
        return $_GET["day"];
    }
    
    public function setDays($days)
    {
        $this->days = $days;
    }
    
    private function getDay()
    {
        $arrayOfDays = array('Week','Måndag', 'Tisdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lördag','Söndag');
        $ret = "";
        
        foreach($arrayOfDays as $svDay)
        {
            $ret .= '<th>'. $svDay .'</th>';
        }
        return $ret;
    }
    
    private function isAlreadyIsBooked($day)
    {
        foreach ($this->days as $book)
        {
            if ($book->getBookDay() == $day)
                return true;
        }
        return false;
    }
}