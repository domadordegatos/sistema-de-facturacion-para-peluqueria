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
      if (isset($_SESSION['tabla_unisex'])):
        foreach (@$_SESSION['tabla_unisex'] as $key) {
        $dat1=explode("||", $key);
       ?>
       <tr>
         <th><?php echo $dat1[0] ?></th>
         <th><?php echo $dat1[1] ?></th>
         <th><?php echo $dat1[2] ?></th>
         <th><?php echo $dat1[3] ?></th>
         <th><?php echo $dat1[4] ?></th>
         <th>deya</th>
       </tr>

<?php } ?>
<?php endif;?>
   </table>
  </body>
</html>
