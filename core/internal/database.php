<?php

class Database
{
	private $resx = null;
	public $conn;

	/**
	 * Class initialize
	 * @param Object $resources
	 */
	public function __construct($resources)
	{
		$this->rexs = $resources;
	}
	public function getConnection()
	{
		$this->conn = null;
		try
		{
			$this->conn = new PDO('mysql:host=' . $this->resx->database->host . ';dbname=' . $this->resx->database->dbName, $this->resx->database->userName, $this->resx->database->userPassword);
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
