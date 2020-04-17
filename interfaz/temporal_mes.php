<?php
session_start();
 ?>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <table class="table table-bordered" style="color:white;">
      <?php
      $ing=0; $egr=0; $gana=$_SESSION['ganancias'];
      if (isset($_SESSION['tabla_pagos'])):
        foreach (@$_SESSION['tabla_pagos'] as $key) {
        $dat=explode("||", $key);
       ?>
       <tr>
         <th><?php echo $dat[0] ?></th>
         <th><?php echo $dat[1] ?></th>
         <?php $val=$dat[2]; if($dat[2]=='Ingreso'){
         echo "<th class='table-success text-dark'>$dat[2]</th>";
         $ing=$ing+$dat[1];
         }else{
         echo "<th class='table-danger text-dark'>$dat[2]</th>";
         $egr=$egr+$dat[1];
         } ?>
         <th><?php echo $dat[3] ?></th>
         <th><?php echo $dat[4] ?></th>
         <th><?php echo $dat[5] ?></th>
       </tr>

<?php } ?>
<?php endif;  $t=($gana+$ing)-$egr?>
    <tr>
      <th colspan="3" class="table-success text-dark">Total Ingresos: $ <?php echo $ing; ?></th>
      <th colspan="3" class="table-danger text-dark">Total Egresos: $ <?php echo $egr; ?></th>
    </tr>
    <!-- <tr>
      <th colspan="6" class="table-success text-dark">Ganancias Peluqueria: $<?php echo $gana ?></th>
    </tr>
    <tr>
      <th colspan="6" class="table-success text-dark">Ganancias Totales: $<?php echo $t ?></th>
    </tr> -->
   </table>
  </body>
</html>
