<?php
    class facturacion{
      public function obt_pre($id_pre){
        require_once "conexion.php"; $conexion=conexion();
        $sql="SELECT valor, tipo FROM servicios
        WHERE id_servicio='$id_pre'";
        $result=mysqli_query($conexion,$sql); $ver=mysqli_fetch_row($result);
        $datos=array( "valor" => $ver[0],
                       "tipo" => $ver[1]);
                    return $datos;
      }

      public function obt_tipo($id_elem){
        require_once "conexion.php"; $conexion=conexion();
        $sql="SELECT tipo_ing_egr, valor FROM elementos_pagos
        WHERE id_elemento='$id_elem'";
        $result=mysqli_query($conexion,$sql); $ver=mysqli_fetch_row($result);
        $datos=array( "tipo_ing_egr" => $ver[0],
                             "valor" => $ver[1]);
                    return $datos;
      }

      public function ag_cli(){
        $v1=$_POST['form1']; $v2=$_POST['form2'];
        require_once "conexion.php"; $conexion=conexion();
        $sql="SELECT * FROM clientes WHERE nombre = '$v1'";
         $result=mysqli_query($conexion,$sql);
         if(mysqli_num_rows($result)>0){
           echo 0;
         }else{
           $sql="INSERT INTO clientes (id_cliente, nombre, num_tel)
                        values ('', '$v1', '$v2')";
           $result=mysqli_query($conexion,$sql);
           echo 1;
         }
      }
      public function ag_pag(){
        require_once "conexion.php"; $conexion=conexion();
        date_default_timezone_set('America/Bogota');
        $t = time(); $h = date("H:i:s",$t); $f= date('Y-m-d');
        $v1=$_POST['form1']; $v2=$_POST['form2']; $v3=$_POST['form3'];
        require_once "conexion.php"; $conexion=conexion();
           $sql="INSERT INTO pagos_ventas
                        values ('', '$v1', '$v2', '$f', '$h', 'adm_1')";
           $result=mysqli_query($conexion,$sql);
           if($result){ echo 1; }else{ echo 0;} //validacion
      }

      public function facturar(){
        require_once "conexion.php"; $conexion=conexion();
        date_default_timezone_set('America/Bogota');
        $t = time(); $h = date("H:i:s",$t); $f= date('Y-m-d');
        $v1=$_POST['form1']; $v2=$_POST['form2']; $v3=$_POST['form3']; $v4=$_POST['form4']; $v8=$_POST['form8'];
        $sql="INSERT INTO facturacion values ('', '$v1', '$v2', '$v3', '$v4', '1', '$f', '$h', '$v8')";
        $result=mysqli_query($conexion,$sql);
        if($result){ echo 1; }else{ echo 0;} //validacion
      }
      public function agendar(){
        require_once "conexion.php"; $conexion=conexion();
        date_default_timezone_set('America/Bogota');
        $t = time(); $h = date("H:i:s",$t); $f= date('Y-m-d');
        $v1=$_POST['form1']; $v2=$_POST['form2']; $v3=$_POST['form3'];
        $sql="INSERT INTO agendamiento values ('', '$v1', '$v2', '$v3','1')";
        $result=mysqli_query($conexion,$sql);
        if($result){ echo 1; }else{ echo 0;} //validacion
      }
      public function facturar_t(){
        require_once "conexion.php"; $conexion=conexion();
        date_default_timezone_set('America/Bogota');
        $t = time(); $h = date("H:i:s",$t); $f= date('Y-m-d');
        $v1=$_POST['form1']; $v2=$_POST['form2']; $v3=$_POST['form3'];
        $v4=$_POST['form4']; $v5=$_POST['form5']; $v6=$_POST['form6']; $v7=$_POST['form7']; $v8=$_POST['form8'];
        $sql="INSERT INTO facturacion values ('', '$v1', '$v2', '$v3', '$v4', '1', '$f', '$h', '$v8')";
        $result=mysqli_query($conexion,$sql);
        $id_f=self::ultimo_id();
        $sql="INSERT INTO facturacion_ext values ('', '$id_f', '$v5', '$v6', '$v7')";
        $result=mysqli_query($conexion,$sql);
        if($result){ echo 1; }else{ echo 0;} //validacion
      }

      public function ultimo_id(){
        require_once "conexion.php"; $conexion=conexion();
        $sql="SELECT id_facturacion FROM facturacion ORDER BY id_facturacion DESC LIMIT 0,1";
        $result=mysqli_query($conexion,$sql);
        $ver=mysqli_fetch_row($result); $id=$ver[0]; return $id;
      }

      public function con_muj(){
        require_once "conexion.php"; $conexion=conexion();
        $v1=$_POST['form1'];
        unset($_SESSION['tabla_mujeres']);
        unset($_SESSION['tabla_unisex']);
          $sql="SELECT servicios.descripcion,
                       facturacion.descuento,
                       facturacion.pago_final,
                       facturacion_ext.tinte_num,
                       marcas_tintes.descripcion,
                       cantidad_tintes.descripcion,
                       facturacion.fecha,
                       facturacion.hora
          FROM facturacion AS facturacion
          INNER JOIN servicios AS servicios ON facturacion.id_servicio = servicios.id_servicio
          INNER JOIN facturacion_ext AS facturacion_ext ON facturacion_ext.id_fac = facturacion.id_facturacion
          INNER JOIN cantidad_tintes AS cantidad_tintes ON cantidad_tintes.id_cantidad = facturacion_ext.cantidad
          INNER JOIN marcas_tintes AS marcas_tintes ON marcas_tintes.id_marca = facturacion_ext.marca
          WHERE facturacion.id_cliente = '$v1'";
                  $sql1="SELECT servicios.descripcion,
                  facturacion.descuento,
                  facturacion.pago_final,
                  facturacion.fecha,
                  facturacion.hora
           FROM facturacion AS facturacion
           INNER JOIN servicios AS servicios ON facturacion.id_servicio = servicios.id_servicio
           WHERE servicios.tipo = '0' AND facturacion.id_cliente = '$v1'";
          $result=mysqli_query($conexion,$sql);
          $result1=mysqli_query($conexion,$sql1);
              if(mysqli_num_rows($result)>0 OR mysqli_num_rows($result1)>0){
                while ($ver1=mysqli_fetch_row($result)){
                $tabla=$ver1[0]."||".
                       $ver1[1]."||".
                       $ver1[2]."||".
                       $ver1[3]."||".
                       $ver1[4]."||".
                       $ver1[5]."||".
                       $ver1[6]."||".
                       $ver1[7]."||";
                   $_SESSION['tabla_mujeres'][]=$tabla;
                 }
                 while ($ver2=mysqli_fetch_row($result1)){
                $tabla2=$ver2[0]."||".
                        $ver2[1]."||".
                        $ver2[2]."||".
                        $ver2[3]."||".
                        $ver2[4]."||";
                    $_SESSION['tabla_unisex'][]=$tabla2;
                  }
                 echo 1;
              }else{
                echo 0;
      }
    }
    public function lis_mes(){
      require_once "conexion.php"; $conexion=conexion();
      $v1=$_POST['form1']; $v2=$_POST['form2'];
      unset($_SESSION['tabla_pagos']);
      unset($_SESSION['ganancias']);
            $sql="SELECT elementos_pagos.descripcion,
            pagos_ventas.valor,
            ing_egr.descripcion,
            pagos_ventas.fecha,
            pagos_ventas.hora,
            administradores.nombre
            FROM pagos_ventas AS pagos_ventas
            INNER JOIN elementos_pagos AS elementos_pagos ON elementos_pagos.id_elemento = pagos_ventas.id_elemento
            INNER JOIN ing_egr AS ing_egr ON ing_egr.id_tipo = elementos_pagos.tipo_ing_egr
            INNER JOIN administradores AS administradores ON administradores.id_admin = pagos_ventas.usuario
            WHERE fecha >= ('$v2''-''$v1''-''1') or fecha <= ('$v2''-''$v1''-''31')
            ORDER BY fecha DESC, hora DESC ";
        $result=mysqli_query($conexion,$sql);
            if(mysqli_num_rows($result)<=0){
              echo 0;
            }else{
              $sql1="SELECT SUM(pago_final)
                     FROM facturacion
                     WHERE fecha >= ('$v2''-''$v1''-''1') AND fecha <= ('$v2''-''$v1''-''31')";
                     $result1=mysqli_query($conexion,$sql1);
                     $ver2=mysqli_fetch_row($result1);
                     $_SESSION['ganancias']=$ver2[0];
              while ($ver1=mysqli_fetch_row($result)){
              $tabla=$ver1[0]."||".
                     $ver1[1]."||".
                     $ver1[2]."||".
                     $ver1[3]."||".
                     $ver1[4]."||".
                     $ver1[5]."||";
                 $_SESSION['tabla_pagos'][]=$tabla;
               }
               echo 1;
    }
  }
          public function lis_tra(){
            require_once "conexion.php"; $conexion=conexion();
            $v1=$_POST['form1'];
            unset($_SESSION['tabla_trabajos']);
                  $sql="SELECT clientes.nombre,
                  servicios.descripcion,
                  facturacion.pago_final,
                  facturacion.fecha,
                  facturacion.hora,
                  administradores.nombre
                  FROM facturacion AS facturacion
                  INNER JOIN clientes AS clientes ON clientes.id_cliente = facturacion.id_cliente
                  INNER JOIN servicios AS servicios ON servicios.id_servicio = facturacion.id_servicio
                  INNER JOIN administradores AS administradores ON administradores.id_admin = facturacion.usuario
                  WHERE date(fecha)>date(date_sub(NOW(), INTERVAL '$v1' DAY))
                  ORDER BY facturacion.fecha DESC, facturacion.hora DESC ";
                  $result=mysqli_query($conexion,$sql);
                  if(mysqli_num_rows($result)<=0){
                    echo 0;
                  }else{
                    while ($ver1=mysqli_fetch_row($result)){
                    $tabla=$ver1[0]."||".
                           $ver1[1]."||".
                           $ver1[2]."||".
                           $ver1[3]."||".
                           $ver1[4]."||".
                           $ver1[5]."||";
                       $_SESSION['tabla_trabajos'][]=$tabla;
                     }
                     echo 1;
                }
            }
            public function lis_tra_dia(){
              require_once "conexion.php"; $conexion=conexion();
              $v1=$_POST['form1'];
              unset($_SESSION['tabla_trabajos']);
                    $sql="SELECT clientes.nombre,
                    servicios.descripcion,
                    facturacion.pago_final,
                    facturacion.fecha,
                    facturacion.hora,
                    administradores.nombre
                    FROM facturacion AS facturacion
                    INNER JOIN clientes AS clientes ON clientes.id_cliente = facturacion.id_cliente
                    INNER JOIN servicios AS servicios ON servicios.id_servicio = facturacion.id_servicio
                    INNER JOIN administradores AS administradores ON administradores.id_admin = facturacion.usuario
                    WHERE fecha = '$v1'
                    ORDER BY facturacion.fecha DESC, facturacion.hora DESC ";
                    $result=mysqli_query($conexion,$sql);
                    if(mysqli_num_rows($result)<=0){
                      echo 0;
                    }else{
                      while ($ver1=mysqli_fetch_row($result)){
                      $tabla=$ver1[0]."||".
                             $ver1[1]."||".
                             $ver1[2]."||".
                             $ver1[3]."||".
                             $ver1[4]."||".
                             $ver1[5]."||";
                         $_SESSION['tabla_trabajos'][]=$tabla;
                       }
                       echo 1;
                  }
              }
              public function lis_tra_tam(){
                require_once "conexion.php"; $conexion=conexion();
                $v1=$_POST['form1']; $v2=$_POST['form2'];
                unset($_SESSION['tabla_trabajos']);
                      $sql="SELECT clientes.nombre,
                      servicios.descripcion,
                      facturacion.pago_final,
                      facturacion.fecha,
                      facturacion.hora,
                      administradores.nombre
                      FROM facturacion AS facturacion
                      INNER JOIN clientes AS clientes ON clientes.id_cliente = facturacion.id_cliente
                      INNER JOIN servicios AS servicios ON servicios.id_servicio = facturacion.id_servicio
                      INNER JOIN administradores AS administradores ON administradores.id_admin = facturacion.usuario
                      WHERE facturacion.fecha >= '$v1' AND facturacion.fecha <= '$v2'
                      ORDER BY facturacion.fecha DESC, facturacion.hora DESC ";
                      $result=mysqli_query($conexion,$sql);
                      if(mysqli_num_rows($result)<=0){
                        echo 0;
                      }else{
                        while ($ver1=mysqli_fetch_row($result)){
                        $tabla=$ver1[0]."||".
                               $ver1[1]."||".
                               $ver1[2]."||".
                               $ver1[3]."||".
                               $ver1[4]."||".
                               $ver1[5]."||";
                           $_SESSION['tabla_trabajos'][]=$tabla;
                         }
                         echo 1;
                    }
                }
        public function desactivar_cita($id_cita){
          require_once "conexion.php"; $conexion=conexion();
          $sql="UPDATE agendamiento SET estado ='0' WHERE id_agenda= '$id_cita';";
                return mysqli_query($conexion,$sql);
        }

        public function validar(){
          	require_once "conexion.php"; $conexion=conexion();
              $v1=$_POST['form1']; $v2=$_POST['form2'];
          		$sql1="SELECT * from administradores where usuario='$v1' and password='$v2'";
          		$result1=mysqli_query($conexion,$sql1);
          		if(mysqli_num_rows($result1) > 0){
          			$_SESSION['user']=$v1;
          			echo 1;
          		  }else{
          			echo 0;
          		}
          	}

  }
 ?>
