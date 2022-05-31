<?php

class Conn{

	public static function connect(){
		$link = new PDO("mysql:host=localhost;dbname=cervezas",
						"root",
						"",
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);
		return $link;
	}

	public static function insert($table, $array)
    {
        $html = 'INSERT INTO '.$table.' (';
        foreach ($array as $key => $item)
        {
            $html .= $key;
            if($item != end($array))
            {
                $html .= ',';
            }
            $values[] = $item;
        }
        $html .= ') VALUES (';
        foreach($values as $value)
        {
            $html .= "'".$value."'";
            if($value != end($values))
            {
                $html .= ',';
            }
        }
        $html .= ')';
        $stmt = Conn::connect()->prepare($html);
        if($stmt->execute())
        {
            return "ok";
        } else {
            return "no";
        }
        $stmt->close();
        $stmt = null;
    }

    public static function update($table, $array, $where)
    {
        $html = 'UPDATE '.$table.' SET ';
        foreach ($array as $key => $item)
        {
            $html .= $key." = ".$item;
            if($item != end($array))
            {
                $html .= ',';
            }
            $values[] = $item;
        }
        $html .= ' WHERE ';
        $html .= $where;
        $stmt = Conn::connect()->prepare($html);
        if($stmt->execute())
        {
            return "ok";
        } else {
            return "no";
        }
        $stmt->close();
        $stmt = null;
    }
}
