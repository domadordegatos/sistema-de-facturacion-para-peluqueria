<?php
    require_once "../procesos/conexion.php";
    $conexion=conexion();?>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registro Diario</title>
    <?php require_once "../procesos/cdn.php" ?>
    <?php require_once "menu.php" ?>
    <?php require_once "../procesos/facturacion_js.php" ?>
    <link rel="stylesheet" href="../diseño/bootstrap.css">
    <link rel="stylesheet" href="../diseño/margenes.css">
    <link rel="stylesheet" href="../diseño/style_calendar.css">
  </head>
  <body style="display:flex;">
    <div class="contenedor" style="width:51%;">
      <h2 class="text-white" style="float:right; margin-bottom:1rem;">Registro de Servicios<i style="margin-left:1rem;" class="fa fa-cog fa-spin"></i></h2>
        <table class="table table-sm table-bordered text-white">
          <tr class="text-dark table-info">
            <th>Cliente</th>
            <th>Servicio</th>
            <th>Valor</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Estilista</th>
          </tr>
          <tbody id="registro_trabajos">

          </tbody>
        </table>
    </div>
    <div class="contenedor2" style="width:40%; padding-top:18rem;">
      <form style="display:flex;">
        <div class="form-group" style="margin-left:2rem;">
          <label for="cantidad">Cantidad de dias</label>
          <input type="number" class="form-control" id="cantidad" style="width:7rem;" placeholder="Numero">
        </div>
        <div class="form-group" style="padding-left:1rem; padding-top:1.95rem;">
          <button type="button" id="" onclick="listar();" class="btn btn-info">Listar por dias</button>
        </div>
      </form>
      <form style="display:flex;">
        <input type="date" name="dateofbirth" id="dateofbirthh" style="margin-left:2rem;">
        <div class="form-group" style="padding-left:1rem;">
          <button type="button" id="" onclick="listar_dia();" class="btn btn-info btn-lg">Listar por Fecha</button>
        </div>
      </form>
      <form style="display:flex;">
        <input type="date" name="dateofbirth" id="dateofbirth1" style="margin-left:2rem;">
        <input type="date" name="dateofbirth" id="dateofbirth2" style="margin-left:1rem;">
        <div class="form-group" style="padding-left:1rem;">
          <button type="button" id="" onclick="listar_tamano();" class="btn btn-info btn-lg">Listar por rango</button>
        </div>
      </form>
    </div>
  </body>
</html>
