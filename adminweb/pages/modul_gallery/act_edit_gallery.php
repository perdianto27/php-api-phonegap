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
    $nama_file_unik = "foto_gallery".$acak.$nama;

    if ($nama !="")
    {
    	if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
    		if ($ukuran < 5000000) {
    			unlink("../../../img_gallery/$_POST[nmFile]");

                move_uploaded_file($file_tmp, '../../../img_gallery/'.$nama_file_unik);
                $sqlQuery = "UPDATE gallery SET nama_gallery = '$_POST[nama]',
									  keterangan = '$_POST[keterangan]', 
									  gallery_seo = '$_POST[seo]',									  
									  foto = '$nama_file_unik'
				            WHERE id = '$_POST[id]' ";
	
				$result = $crud->execute($sqlQuery);
				header('location:../utama.php?module=gallery');
    		}
    		else {
            	echo 'UKURAN FILE TERLALU BESAR';
        	}
    	}
    	else {
        	echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    	}	
    } 
    else 
    {
    	$sqlQuery = "UPDATE gallery SET nama_gallery = '$_POST[nama]',
                                      keterangan = '$_POST[keterangan]', 
                                      gallery_seo = '$_POST[seo]'
                    WHERE id = '$_POST[id]' ";
	
		$result = $crud->execute($sqlQuery);
		header('location:../utama.php?module=gallery');
    }	
?>