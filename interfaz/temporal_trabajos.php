<?php
session_start();
require_once "../procesos/conexion.php"; $conexion=conexion();
$sql="SELECT SUM(pagos_ventas.valor)
FROM pagos_ventas
INNER JOIN elementos_pagos AS elementos_pagos ON elementos_pagos.id_elemento = pagos_ventas.id_elemento
WHERE date(pagos_ventas.fecha)>date(date_sub(NOW(), INTERVAL '30' DAY)) AND elementos_pagos.tipo_ing_egr = 1";
$result=mysqli_query($conexion,$sql);
 ?>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered" style="color:white;">
      <?php
       $de=0; $da=0; $totalda=0; $totalde=0; $u=0; $totalu=0;
      if (isset($_SESSION['tabla_trabajos'])):
        foreach (@$_SESSION['tabla_trabajos'] as $key) {
        $dat=explode("||", $key);
       ?>
       <tr>
         <th><?php echo $dat[0] ?></th>
         <th><?php echo $dat[1] ?></th>
         <th><?php echo $dat[2] ?></th>
         <th><?php echo $dat[3] ?></th>
         <th><?php echo $dat[4] ?></th>
         <?php if($dat[5]=='Deyanira'){
           echo "<th class='table-success text-dark'>$dat[5]</th>";
           $de=$de+$dat[2];
           }else if($dat[5]=='Uñas'){
           echo "<th class='table-warning text-dark'>$dat[5]</th>";
           $u=$u+$dat[2];
         }else{
           echo "<th class='table-danger text-dark'>$dat[5]</th>";
           $da=$da+$dat[2];
         } ?>
       </tr>

<?php } ?>
<?php endif; $totalda=($da*60)/100; $totalunas=($u*60)/100;  $totalde=(($da*40)/100); $totalu=(($u*40)/100); $du=$totalu+$totalde; ?>
        <tr>
          <th colspan="3" class="table-success text-dark">Ganancias Deyanira: $ <?php echo $de; ?></th>
          <th colspan="3" class="table-danger text-dark">Ganancias Daniela: $ <?php echo $da; ?></th>
        </tr>
        <tr>
          <th colspan="6" class="table-danger text-dark">Ganancias Daniela: -40%$ <?php echo $totalda; ?></th>
        </tr>
        <tr>
          <th colspan="6" class="table-warning text-dark">Ganancias Uñas: -40%$ <?php echo $totalunas ?></th>
        </tr>
        <tr>
          <th colspan="6" class="table-success text-dark">Ganancias Peluqueria, Uñas + Daniela: $ <?php echo $du; ?></th>
        </tr>
        <?php while ($ver=mysqli_fetch_row($result)): ?>
          <tr>
            <th colspan="6" class="table-danger text-dark">Ingresos Ventas Ultimos 30 dias: $ <?php echo $ver[0]; ?></th>
          </tr>
       <?php endwhile; ?>
   </table>
  </body>
</html>
