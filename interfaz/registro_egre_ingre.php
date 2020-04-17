<?php
    require_once "../procesos/conexion.php";
    $conexion=conexion();?>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Pagos y Ganancias</title>
    <?php require_once "../procesos/cdn.php" ?>
    <?php require_once "menu.php" ?>
    <?php require_once "../procesos/facturacion_js.php" ?>
    <link rel="stylesheet" href="../diseño/bootstrap.css">
    <link rel="stylesheet" href="../diseño/margenes.css">
  </head>
  <body style="display:flex;">
    <div class="contenedor" style="width:51%;">
      <h2 class="text-white" style="float:right; margin-bottom:1rem;">Ingresos y Egresos Lits-Ney</h2>
        <table class="table table-sm table-bordered text-white">
          <tr class="text-dark table-info">
            <th>Insumo</th>
            <th>Valor</th>
            <th>Tipo</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Usuario</th>
          </tr>
          <tbody id="registro_ing_egr">

          </tbody>
        </table>
    </div>
    <div class="contenedor2" style="width:40%; padding-top:18rem;">
      <div class="form-group row" style="float:right; padding:0;">
        <select class="form-control-sm" id="ano" style="width:5rem; margin-left:2rem;">
          <option value="2019">2019</option><option value="2020">2020</option>
        </select>
      </div>
      <div class="form-group row" style="float:right; padding:0;">
        <label for="mes">Selecciona Mes</label>
        <select class="form-control-sm" id="mes" style="width:8rem; margin-left:2rem;">
          <option value="1">Enero</option><option value="2">Febrero</option><option value="3">Marzo</option><option value="4">Abril</option><option value="5">Mayo</option><option value="6">Junio</option><option value="7">Julio</option>
          <option value="8">Agosto</option><option value="9">Septiembre</option><option value="10">Octubre</option><option value="11">Noviembre</option><option value="12">Diciembre</option>
        </select>
      </div>
      <form style="display:flex; margin-top:3rem; margin-left:1rem;">
        <div class="form-group" style="padding-left:1rem;">
          <label for="elemento">Elemento</label>
          <select class="form-control" id="elemento" style="width:10rem;">
            <?php $sql="SELECT id_elemento, descripcion FROM elementos_pagos ORDER BY descripcion ASC"; $result=mysqli_query($conexion,$sql);
              while ($retorno=mysqli_fetch_row($result)):?>
              <option value="<?php echo $retorno[0] ?> "><?php echo $retorno[1] ?></option>
            <?php endwhile; ?>
          </select>
        </div>
        <div class="form-group" style="padding-left:1rem;">
          <label for="valor">Ganancia</label>
          <input type="number" class="form-control" id="valor" style="width:10rem;">
        </div>
        <div class="form-group" style="padding-left:1rem;">
          <label for="tipo">Tipo</label>
          <select class="form-control" id="tipo" style="width:10rem;">
            <option value="1">Ingreso</option>
            <option value="2">Egreso</option>
          </select>
        </div>
      </form>
      <div class="form-group" style="padding-left:1rem; padding-top:0.5rem;">
        <button style="margin-left:1rem;" type="button" onclick="agregar_pago();" id="" class="btn btn-info">Agregar Pago</button>
      </div>
      <br>
    </div>
  </body>
</html>
