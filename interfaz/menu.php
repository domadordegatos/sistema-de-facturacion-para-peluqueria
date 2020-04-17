<?php
	session_start();
	if(isset($_SESSION['user'])){
 ?>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Menu Lits-Ney</title>
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'><link rel="stylesheet" href="../diseño/style.css">
  <link rel="icon" type="image/png" href="../images/ico.png" />
</head>
<body>
<!-- partial:index.partial.html -->
<section class="menu menu--circle">
  <input type="checkbox" id="menu__active"/>
  <label for="menu__active" class="menu__active">
    <div class="menu__toggle">
      <div class="icon">
        <div class="hamburger"></div>
      </div>
    </div>
    <input type="radio" name="arrow--up" id="degree--up-0"/>
    <input type="radio" name="arrow--up" id="degree--up-1" />
    <input type="radio" name="arrow--up" id="degree--up-2" />
    <div class="menu__listings">
      <ul class="circle">
        <li>
          <div class="placeholder">
            <div class="upside">
              <a title="Facturacion" href="./facturacion.php" class="button"><i class="fa fa-address-book-o"></i></a>
            </div>
          </div>
        </li>
        <li>
          <div class="placeholder">
            <div class="upside">
              <a title="Consultar informacion de trabajos" href="./consultas.php" class="button"><i class="fa fa-search-plus"></i></a>
            </div>
          </div>
        </li>
        <li hidden>
          <div class="placeholder">
            <div class="upside">
              <a href="#">&nbsp</a>
            </div>
          </div>
        </li>
        <li hidden>
          <div class="placeholder">
            <div class="upside">
              <a href="#" class="button"><i class="fa fa-usd"></i></a>
            </div>
          </div>
        </li>
        <li hidden>
          <div class="placeholder">
            <div class="upside">
              <a href="#" class="button"><i class="fa fa-trash"></i></a>
            </div>
          </div>
        </li>
        <li hidden>
          <div class="placeholder">
            <div class="upside">
              <a href="#" class="button"><i class="fa fa-battery-4"></i></a>
            </div>
          </div>
        </li>
        <li>
          <div class="placeholder">
            <div class="upside">
              <a title="Cerrar mi sesion" href="../procesos/salir.php" class="button"><i class="fa fa-power-off"></i></a>
            </div>
          </div>
        </li>
        <li>
          <div class="placeholder">
            <div class="upside">
              <a title="Agendar Citas" href="./agendamiento.php" class="button"><i class="fa fa-calendar-check-o"></i></a>
            </div>
          </div>
        </li>
        <li>
          <div class="placeholder">
            <div class="upside">
              <a title="Ventas y Pagos" href="./registro_egre_ingre.php" class="button"><i class="fa fa-usd"></i></a>            </div>
          </div>
        </li>
        <li>
          <div class="placeholder">
            <div class="upside">
							<a title="Registro de dinero" href="./registro_diario.php" class="button"><i class="fa fa-calculator"></i></a>
            </div>
          </div>
        </li>
      </ul>
    </div>
    <div class="menu__arrow menu__arrow--top">
      <ul>
        <li>
          <label for="degree--up-0"><div class="arrow"></div></label>
          <label for="degree--up-1"><div class="arrow"></div></label>
          <label for="degree--up-2"><div class="arrow"></div></label>
        </li>
      </ul>
    </div>
  </label>
</section>

</body>
</html>
<?php
} else {
	header("location:../peluqueria/interfaz/login.php");
	}
 ?>
