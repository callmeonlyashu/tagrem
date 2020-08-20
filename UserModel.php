<?php


include('Database.php');

class UserModel{

	public function insert( $userData ) {

		$db = new Database();

		if( $db->connect() ) {

			$sql = "INSERT INTO users ( name, username, password, zip ) 
				VALUES (
				'" . $userData['name'] . "',
				 '" . $userData['username'] . "',
				  '" . $userData['password'] . "',
				  '" . $userData['zip'] . "'
				);";

			$conn = $db->getConnectedDb();

			if ($conn->query($sql) == true) {
			  echo "Inserted Successfully";
			} else {
			  echo $conn->error;
			}


		}

	}

}


?>