<?php
session_start();
require_once "../procesos/conexion.php";
require_once "../procesos/procesos_facturacion.php";
$conexion=conexion();

    $obj= new facturacion();

    echo json_encode($obj->obt_tipo($_POST['id_elem']))
 ?>
