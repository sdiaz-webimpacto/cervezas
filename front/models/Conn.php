<?php

class Conn{

	public function connect(){
		$link = new PDO("mysql:host=localhost;dbname=cervezas",
						"root",
						"",
						array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		                      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
						);
		return $link;
	}
}
