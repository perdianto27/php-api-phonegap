<?php
class dbConfig
{
	private $_host = 'localhost';
	private $_username = 'root';
	private $_password = '';
	private $_database = 'db_wrk_pg';
	protected $connection;

	public function __construct()
	{
		if(!isset($this->connection)){
			$this->connection = mysqli_connect($this->_host, $this->_username, $this->_password, $this->_database);
			if(!$this->connection){
				echo 'Cannot connect to database server';
				exit;
			}
		}
		return $this->connection;
	}
}

?>