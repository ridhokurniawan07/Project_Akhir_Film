<?php
class DBConn {
	var $host = "localhost";
	var $username = "root";
	var $password = "";
	var $database = "db_film";
	var $koneksi;

	function __construct(){
		$this->koneksi = mysqli_connect($this->host, $this->username, $this->password, $this->database);
	}
}
?>