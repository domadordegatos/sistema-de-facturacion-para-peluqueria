<?php
    require_once "../procesos/conexion.php";
    $conexion=conexion(); ?>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Facturacion Lits-Ney</title>
    <?php require_once "../procesos/cdn.php" ?>
    <?php require_once "menu.php" ?>
    <?php require_once "../procesos/facturacion_js.php" ?>
    <link rel="stylesheet" href="../diseño/bootstrap.css">
    <link rel="stylesheet" href="../diseño/margenes.css">
    <link rel="stylesheet" href="../diseño/style_calendar.css">
  </head>
  <body style="display:flex;">
    <div class="contenedor">
      <h1 style="color:white; padding-left:10rem; padding-bottom:1rem;">Facturación Lits-Ney</h1>
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
              <input hidden type="number" id="tipo" value="">
            </select>
          </div>
          <div class="form-group" style="padding-left:1rem;">
            <label for="precio">$  Precio</label>
            <input type="number" class="form-control" id="precio" style="width:9rem;">
          </div>
      </form>
      <form id="tinte_especial" style="width:50%;  display:none;" >
          <div class="form-group">
            <label for="numero"># Tinte</label>
            <input type="number" class="form-control" id="numero" style="width:5rem;">
          </div>
          <div class="form-group" style="padding-left:1rem;">
            <label for="marca">Marca</label>
            <select class="form-control" id="marca" style="width:10rem;">
              <?php $sql="SELECT id_marca, descripcion FROM marcas_tintes ORDER BY descripcion ASC"; $result=mysqli_query($conexion,$sql);
				        while ($retorno=mysqli_fetch_row($result)):?>
				      	<option value="<?php echo $retorno[0] ?> "><?php echo $retorno[1] ?></option>
				      <?php endwhile; ?>
            </select>
          </div>
          <div class="form-group" style="padding-left:1rem;">
            <label for="cantidad">Cantidad</label>
            <select class="form-control" id="cantidad" style="width:10rem;">
              <?php $sql="SELECT id_cantidad, descripcion FROM cantidad_tintes ORDER BY descripcion ASC"; $result=mysqli_query($conexion,$sql);
				        while ($retorno=mysqli_fetch_row($result)):?>
				      	<option value="<?php echo $retorno[0] ?> "><?php echo $retorno[1] ?></option>
				      <?php endwhile; ?>
            </select>
          </div>
      </form>
      <form style="width:50%; display:flex;">
          <div class="form-group">
            <label for="descuento">Descuento</label>
            <input type="number" class="form-control" id="descuento" style="width:10rem;">
          </div>
          <div class="form-group" style="padding-left:1rem;">
            <label for="total_pagar">Total a pagar</label>
            <input type="number" class="form-control" id="total_pagar" style="width:10rem;">
          </div>
          <div class="form-group" style="padding-left:1rem; padding-top:1.95rem;">
            <button type="button" id="" onclick="facturar();" class="btn btn-info">Facturar Servicio</button>
          </div>
      </form>
      <div class="form-group">
        <label for="estilista">Estilista</label>
        <select class="form-control" id="estilista" style="width:10rem;">
          <option value="adm_1">Deyanira</option>
          <option value="adm_2">Daniela</option>
          <option value="adm_3">Uñas</option>
        </select>
      </div>

    </div>
    <div class="contenedor2">
      <form style="width:50%; display:flex; padding-top:29rem;">
          <div class="form-group">
            <label for="nombre_cliente">Nombre</label>
            <input type="email" class="form-control" id="nombre_cliente" style="width:10rem;">
          </div>
          <div class="form-group" style="padding-left:1rem;">
            <label for="telefono_cliente">Telefono</label>
            <input type="email" class="form-control" id="telefono_cliente" style="width:10rem;">
          </div>
          <div class="form-group" style="padding-left:1rem; padding-top:1.95rem;">
            <button type="button" onclick="agregar_cliente();" id="" class="btn btn-info">Agregar Cliente</button>
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
