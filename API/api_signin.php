<?php
	include "../config/koneksi.php";
	$k = new db();
	$con = mysqli_connect($k->server, $k->username, $k->password, $k->database);
	$user = $_GET["username"];
	$pass = $_GET["password"];
		
	$sql = "SELECT * FROM tb_users WHERE username = '$user' AND password = '$pass' ";
	$result = mysqli_query($con, $sql);
	$cek = mysqli_num_rows($result);
	
	$array = array();
	$subArray=array();
		
	if ($cek>0)
	{
		$subArray['status'] = "OK";
		$array[] =  $subArray ;
	} else {
		$subArray['status'] = "FAILED";
		$array[] =  $subArray ;
	}
	echo'{"fields":{"records":'.json_encode($array).'}}';
	mysqli_close($con);
?>
