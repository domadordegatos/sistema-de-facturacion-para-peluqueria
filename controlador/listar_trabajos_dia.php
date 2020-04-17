<?php
session_start();
require_once "../procesos/conexion.php";
require_once "../procesos/procesos_facturacion.php";
$conexion=conexion();

    $obj= new facturacion();

    $result=$obj->lis_tra_dia();
    echo $result;
 ?>
