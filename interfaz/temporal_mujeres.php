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
      if (isset($_SESSION['tabla_mujeres'])):
        foreach (@$_SESSION['tabla_mujeres'] as $key) {
        $dat=explode("||", $key);
       ?>
       <tr>
         <th><?php echo $dat[0] ?></th>
         <th><?php echo $dat[1] ?></th>
         <th><?php echo $dat[2] ?></th>
         <th style="text-align:center;"><?php echo $dat[3] ?></th>
         <th><?php echo $dat[4] ?></th>
         <th><?php echo $dat[5] ?></th>
         <th><?php echo $dat[6] ?></th>
         <th><?php echo $dat[7] ?></th>
       </tr>

<?php } ?>
<?php endif;?>
   </table>
  </body>
</html>
