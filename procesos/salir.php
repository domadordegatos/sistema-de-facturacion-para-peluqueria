<?php
   session_start();
   unset($_SESSION['user']);
   header("location:../interfaz/login.php");
 ?>
