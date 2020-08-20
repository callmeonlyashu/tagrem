<?php


require('UserModel.php');
class User{
	
	public $attributes;

	private $name;
	private $username;
	private $password;
	private $confirmPassword;
	private $zip;

	public $error = [];

	public function __construct() {
		return "Object Created";
	}

	private function setAttributes() {
		$this->name 			= $this->attributes['name'];
		$this->username 		= $this->attributes['username'];
		$this->password 		= $this->attributes['password'];
		$this->confirmPassword  = $this->attributes['confirm_password'];
		$this->zip 				= $this->attributes['zip'];
	}

	public function validate() {

		if( isset( $this->attributes ) && count( $this->attributes ) != 0 ) {
			$this->setAttributes();
		} else {
			return "You have not submitted any value";
		}

		if( $this->name == '' ) {
			$this->error[] = 'Name is required';
		}

		if( $this->username == '' ) {
			$this->error[] = 'Username is required';
		}

		if( $this->password == '' ) {
			$this->error[] = 'Password is required';
		}

		if( $this->confirmPassword == '' ) {
			$this->error[] = 'Confirm Password is required';
		}

		if( $this->confirmPassword != $this->password ) {
			$this->error[] = 'Confirm Password and Password should Match';
		}

		if( $this->zip == '' ) {
			$this->error[] = 'Zip is required';
		}

		if( count( $this->error ) != 0 ) {
			return false;
		} 

		return true;
		
	}

	public static function getErrorSummary($objUser) {

		if( count( $objUser->error ) != 0 ) {

			$html = '<p style="color:red"> <u> Please Fix Below Errors </u> </p>';
			foreach( $objUser->error as $err ) {
				$html .= '<p style="color:red"><strong> - ' . $err . ' </strong></p>';
			}
			return $html;

		}

	}

	public function save() {

		$userModel = new UserModel();

		$arrmixData = [

			'name' => $this->name, 
			'username' => $this->username,
			'password' =>  $this->password, 
			'zip' => $this->zip
		];

		$userModel->insert( $arrmixData );

	}


}