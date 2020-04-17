<?php
    require_once "../procesos/conexion.php";
    $conexion=conexion();?>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Agendamiento</title>
    <?php require_once "../procesos/cdn.php" ?>
    <?php require_once "menu.php" ?>
    <?php require_once "../procesos/facturacion_js.php" ?>
    <link rel="stylesheet" href="../diseño/bootstrap.css">
    <link rel="stylesheet" href="../diseño/margenes.css">
    <link rel="stylesheet" href="../diseño/style_calendar.css">
  </head>
  <body style="display:flex;">
    <div class="contenedor" style="width:51%;">
      <h2 class="text-white" style="float:right; margin-bottom:1rem;">Agendamiento de Citas<i style="margin-left:1rem;" class="fa fa-cog fa-spin"></i></h2>
        <table class="table table-sm table-bordered text-white">
          <tr class="text-dark table-info">
            <th># Cita</th>
            <th>Cliente</th>
            <th>Servicio</th>
            <th>Fecha</th>
            <th>Eliminar</th>
          </tr>
          <tbody id="registro">

          </tbody>
        </table>
    </div>
    <div class="contenedor2" style="width:40%; padding-top:18rem; padding-left:3rem;">
      <form style="width:50%; display:flex;">
          <div class="form-group">
            <label for="cliente">Cliente</label>
            <select class="form-control" id="cliente" style="width:10rem;">
              <?php $sql="SELECT id_cliente, nombre FROM clientes ORDER BY nombre ASC"; $result=mysqli_query($conexion,$sql);
                while ($retorno=mysqli_fetch_row($result)):?>
                <option value="<?php echo $retorno[0] ?> "><?php echo $retorno[1] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
          <div class="form-group" style="padding-left:1rem;">
            <label for="servicio">Servicio</label>
            <select class="form-control" id="servicio" style="width:10rem;">
              <?php $sql="SELECT id_servicio, descripcion, tipo FROM servicios ORDER BY descripcion ASC"; $result=mysqli_query($conexion,$sql);
                while ($retorno=mysqli_fetch_row($result)):?>
                <option value="<?php echo $retorno[0] ?> "><?php echo $retorno[1] ?></option>
              <?php endwhile; ?>
            </select>
          </div>
      </form>
      <form style="display:flex;">
        <input type="date" name="dateofbirth" id="dateofbirth">
        <div class="form-group" style="padding-left:1rem;">
          <button type="button" id="" onclick="agendar();" class="btn btn-info btn-lg">Agendar Cita</button>
        </div>
      </form>
    </div>
  </body>
</html>
