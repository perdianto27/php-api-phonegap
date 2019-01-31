<?php
  session_start();
  session_destroy();
  header('location:../index.html');
  //echo "<center>Anda telah sukses keluar sistem <b>[LOGOUT]<b>";
?>
