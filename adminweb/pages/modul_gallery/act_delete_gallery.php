<?php
	include_once ("../../class/Crud.php");
	$crud = new Crud();
	
	$sqlQuery = "DELETE FROM gallery WHERE id = '$_GET[id]' ";
	
	$result = $crud->execute($sqlQuery);
	header('location:../utama.php?module=gallery');
?>