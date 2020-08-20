<?php
	include('User.php');
	$_POST['userForm'] = $_POST;
	if(isset($_POST['userForm']))
	{
		
		$objUser=new User();
		$objUser->attributes=$_POST['userForm'];
		if($objUser->validate())
		{
			$objUser->save();
		}
		else
		{
			echo User::getErrorSummary($objUser);
		}
	}
?>