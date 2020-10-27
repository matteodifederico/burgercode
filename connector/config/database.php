<?php

class Database
	{
	// credenziali
	private $host = 'localhost';
	//private $db_name = 'example_dbName';
	//private $username = 'example_userName';
	//private $password = 'example_userPassword';
	private $db_name = 'example_dbName';
	private $username = 'root';
	private $password = '';
	public $conn;
	// connessione al database
	public function getConnection()
		{
		$this->conn = null;
		try
			{
			$this->conn = new PDO( 'mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password );
			$this->conn->exec( 'set names utf8' );
			}
		catch(PDOException $exception)
			{
			echo 'Connection error: ' . $exception->getMessage();
			}
		return $this->conn;
		}
	}

?>
