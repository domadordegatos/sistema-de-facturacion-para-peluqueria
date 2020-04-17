<?php
require_once "../procesos/conexion.php";
$conexion=conexion();
session_start();
date_default_timezone_set('America/Bogota');
$f= date('Y-m-d');
    $sql="SELECT agendamiento.id_agenda,
       clientes.nombre,
       servicios.descripcion,
       agendamiento.fecha
       FROM agendamiento AS agendamiento
       INNER JOIN clientes AS clientes ON clientes.id_cliente = agendamiento.id_cliente
       INNER JOIN servicios AS servicios ON servicios.id_servicio = agendamiento.id_servicio
       WHERE agendamiento.estado = '1' ORDER BY agendamiento.fecha DESC";
        $result=mysqli_query($conexion,$sql);
 ?>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered" style="color:white;">
        <?php while ($ver=mysqli_fetch_row($result)): ?>
       <tr>
         <th><?php echo $ver[0] ?></th>
         <th><?php echo $ver[1] ?></th>
         <th><?php echo $ver[2] ?></th>
         <?php if($f>$ver[3]){
           echo "<th class='table-success text-dark'>$ver[3]</th>";
         }else{
           echo "<th class='table-danger text-dark'>$ver[3]</th>";
         } ?>
         <td style="text-align:center;"> <span class="btn btn-danger btn-sm" onclick="desactivar_cita('<?php echo $ver[0]; ?>')" >Eliminar Cita</span> </td>
       </tr>
       <?php endwhile; ?>
   </table>
  </body>
</html>
