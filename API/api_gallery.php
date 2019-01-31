<?php
	include "../config/koneksi.php";
	$k = new db();
	$con = mysqli_connect($k->server, $k->username, $k->password, $k->database);
	$sql = "SELECT * FROM gallery order by id DESC ";
	$result = mysqli_query($con, $sql);
    $array = array();
	$subArray=array();
    
    while($row =mysqli_fetch_array($result))
    {
        $subArray['id'] = $row['id'];
        $subArray['nama'] = $row['nama_gallery'];
        $subArray['gambar'] = "http://perdiantooct.000webhostapp.com/img_gallery/".$row['gbr_gallery']; //URL your site
        $subArray['seo'] = $row['gallery_seo'];
        
        $array[] =  $subArray ;
    }
    echo'{"fields":{"records":'.json_encode($array).'}}';    
    mysqli_close($con);
?>

