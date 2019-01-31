<?php
include_once ("../class/Crud.php");
$crud = new Crud();

// Bagian Dashboard
if ($_GET['module']=='dashboard'){  
  include "modul_dashboard/dashboard.php";
}

// Bagian gallery
if ($_GET['module']=='gallery'){
  include "modul_gallery/gallery.php";
}
if ($_GET['module']=='gallery_tambah'){
  include "modul_gallery/gallery_tambah.php";
}
if ($_GET['module']=='gallery_edit'){
  include "modul_gallery/gallery_edit.php";
}
if ($_GET['module']=='gallery_delete'){
  include "modul_gallery/act_delete_gallery.php";
}

?>