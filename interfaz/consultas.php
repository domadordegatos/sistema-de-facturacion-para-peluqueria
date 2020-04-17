<?php
    require_once "../procesos/conexion.php";
    $conexion=conexion(); ?>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Consultas Lits-Ney</title>
    <?php require_once "../procesos/cdn.php" ?>
    <?php require_once "menu.php" ?>
    <?php require_once "../procesos/facturacion_js.php" ?>
    <link rel="stylesheet" href="../diseño/bootstrap.css">
    <link rel="stylesheet" href="../diseño/margenes.css">
  </head>
  <body style="display:flex">
    <div class="contenedor" style="width:52%; padding-left:2rem;">
      <h1 style="color:white; padding-left:10rem; padding-bottom:0.5rem;">Consultas Lits-Ney</h1>
      <div class="form-group row" style="float:right; padding:0;">
        <label for="cliente_tabla">Cliente</label>
        <select class="form-control" id="cliente_tabla" style="width:10rem; margin-left:2rem;">
          <?php $sql="SELECT id_cliente, nombre FROM clientes ORDER BY nombre ASC"; $result=mysqli_query($conexion,$sql);
            while ($retorno=mysqli_fetch_row($result)):?>
            <option value="<?php echo $retorno[0] ?> "><?php echo $retorno[1] ?></option>
          <?php endwhile; ?>
        </select>
      </div>
      <table class="table table-bordered text-white table-sm" >
        <tr> <th class="table-danger text-dark" colspan="8" style="text-align:center;">Mujeres</th> </tr>
        <tr>
          <th>Servicio</th><th>Descuento</th><th>Pago</th><th># Tinte</th><th>Marca</th><th>Cantidad</th><th>Fecha</th><th>Hora</th>
        </tr>
        <tbody id="mujeres">

        </tbody>
      </table>
    </div>
    <div class="contendor2" style="width: 45%; padding-left:2rem; padding-top:18rem;">
      <table class="table table-bordered table-sm text-white">
        <tr> <th class="table-info text-dark" colspan="6" style="text-align:center;">Uni-sex</th> </tr>
        <tr>
          <th>Servicio</th> <th>Descuento</th> <th>Pago</th> <th>Fecha</th> <th>Hora</th> <th>Estilista</th>
        </tr>
        <tbody id="unisex">

        </tbody>
      </table>
    </div>

  </body>
</html>
