<?php
class DBConnect {
	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "db_film";
	var $connect;

	function __construct(){
		$this->connect = mysqli_connect($this->host, $this->username, $this->password, $this->database);
	}
}
?>