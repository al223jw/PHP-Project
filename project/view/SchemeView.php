<?php

class SchemeView
{
    public function generateScheme()
    {
        return'
                <form method="post">
                    <fieldset>
                         <table width="600">
                            <tr>
                                <th>Week</th>
                                <th>Måndag</th>
                                <th>Tisdag</th>
                                <th>Onsdag</th>
                                <th>Torsdag</th>
                                <th>Fredag</th>
                                <th>Lördag</th>
                                <th>Söndag</th>
                            </tr>
                            <tr>
                                <th>37</th>
                                <th><a href=?book>Boka</a></th>
                                <th><a href=?book>Boka</a></th>
                                <th><a href=?book>Boka</a></th>
                                <th><a href=?book>Boka</a></th>
                                <th><a href=?book>Boka</a></th>
                                <th><a href=?book>Boka</a></th>
                                <th><a href=?book>Boka</a></th>
                            </tr>
                          </table>
                    </fieldset>
                </form>
        ';
    }
    
    public function getWeek()
    {
		date_default_timezone_set('Europe/Stockholm');

		$week = date("W");
		$timeString = "$week[week]";
		return '<p>' . $timeString . '</p>';
    }
}