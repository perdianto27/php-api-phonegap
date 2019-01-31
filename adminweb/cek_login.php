<?php
	include_once("class/Crud.php");
	include_once("class/Validation.php");
	$crud = new Crud();
	$validation = new Validation();

	$user = $crud->escape_string($_POST['username']);
	$pass = md5($crud->escape_string($_POST['password']));

	$msg = $validation->check_empty($_POST, array('username','password'));
	if($msg != null)
	{
		echo $msg;
		echo "<br> <a href='javascript:self.history.back();'> Go Back</a>";		
	}
	else
	{
		$query="SELECT * FROM tb_users WHERE username = '$user' AND password = '$pass' ";
		$result = $crud->getRows($query);		
		if ($result > 0)
		{
			session_start();			
			$_SESSION[namauser] = $user;
			header('location:pages/utama.php?module=dashboard');
		}
		else
		{
			echo "Username dan Password Salah";
		}
	}
?>