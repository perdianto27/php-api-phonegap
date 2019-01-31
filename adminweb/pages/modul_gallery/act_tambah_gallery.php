<?php
	include_once ("../../class/Crud.php");
	$crud = new Crud();

	$ekstensi_diperbolehkan = array('png', 'jpg');
    $nama = $_FILES['file']['name'];
    $str = "_";
    $x = explode('.', $nama);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $acak           = rand(1,999);
    $nama_file_unik = "foto_galery_".$acak.$nama;
    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran < 5000000) {
        	move_uploaded_file($file_tmp, '../../../img_gallery/'.$nama_file_unik);
        	$sqlQuery="INSERT INTO gallery (nama_gallery, gallery_seo, keterangan, gbr_gallery) 
	           VALUES ('$_POST[nama]',
	           		   '$_POST[seo]',
	           		   '$_POST[keterangan]',	           		   
	           		   '$nama_file_unik')";
	
			$result = $crud->execute($sqlQuery);
			header('location:../utama.php?module=gallery');
		} else {
            echo 'UKURAN FILE TERLALU BESAR';
        }
    } else {
        echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    }	
?>