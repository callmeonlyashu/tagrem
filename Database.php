<?php

class Database {

	private $servername = 'localhost';
	private $username = 'root';
	private $password = '';
	private $database = 'tagrem';

	private $connection;
	public $isConnected = false;

	public function connect() {


		// Return true if it is already connected.
		if( $this->isConnected ) {
			return true;
		}
		// Create connection
		$this->connection = new mysqli( $this->servername, $this->username, $this->password, $this->database );

		// Check connection
		if ( $this->connection->connect_error ) {  		
		  	return false;
		} else {
			$this->isConnected = true;
			return true;
		}
		
	}

	public function getConnectedDb() {
		return $this->connection;
	}

	public function close() {

		// Close existing connection.
		$this->isConnected = false;
		$this->connection->close();
	}


}

?>