<?php
session_start();
require_once "../procesos/conexion.php";
require_once "../procesos/procesos_facturacion.php";
  $id_cita=$_POST['id_cita'];
$conexion=conexion();

    $obj= new facturacion();
    echo $obj->desactivar_cita($id_cita);
 ?>
