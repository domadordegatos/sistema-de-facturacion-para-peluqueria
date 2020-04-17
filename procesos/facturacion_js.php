<script type="text/javascript">
  $(document).ready(function(){
      $('#servicio').change(function(){
        $.ajax({
          type:"POST",
          data:"id_pre=" +$('#servicio').val(),
          url:"../controlador/ob_precio.php",
          success:function(r){
            dato=jQuery.parseJSON(r);
            $('#precio').val(dato['valor']);
            $('#tipo').val(dato['tipo']);
            vista_tintes();
            document.getElementById('total_pagar').value = $('#precio').val();
            document.getElementById('descuento').value = '';
          }
        });
      });
      $('#elemento').change(function(){
        $.ajax({
          type:"POST",
          data:"id_elem=" +$('#elemento').val(),
          url:"../controlador/ob_tipo.php",
          success:function(r){
            dato=jQuery.parseJSON(r);
            $('#tipo').val(dato['tipo_ing_egr']);
            $('#valor').val(dato['valor']);
          }
        });
      });


      $('#descuento').change(function(){
        var valor = $('#precio').val(); var descuento = $('#descuento').val();
        var total = valor - descuento;
        document.getElementById('total_pagar').value = total;
      });
  });


  function vista_tintes(){
    var tipo = $('#tipo').val();
    if(tipo == 1){
      $('#tinte_especial').show(500);
      document.getElementById("tinte_especial").style.display="flex";
    }else{
      $('#tinte_especial').hide(500);
    }
  }


  function agregar_cliente(){
      if($('#nombre_cliente').val()==""){
        alertify.error("Campos faltantes");
      }else{
        cadena="form1=" + $('#nombre_cliente').val() +
              "&form2=" + $('#telefono_cliente').val();
          $.ajax({
            type:"POST",
            url:"../controlador/ag_cliente.php",
            data:cadena,
            success:function(r){
              if(r==1){
                alertify.success("Registro Exitoso");
                setTimeout ("location.reload();", 500);
              }else if(r==0){
                alertify.error("No se registraron los datos");
              }else{
                alertify.error("Error en el registro");
              }
            }
          });
        }
  }

  function facturar(){
    var valor = $('#precio').val(); var descuento = $('#descuento').val();
    var total = valor - descuento;
    document.getElementById('total_pagar').value = total;
    if($('#tipo').val() == 1){
      cadena="form1=" + $('#cliente').val() + "&form2=" + $('#servicio').val()+
            "&form3=" + $('#descuento').val()+ "&form4=" + $('#total_pagar').val()+
            "&form5=" + $('#numero').val()+ "&form6=" + $('#marca').val()+
            "&form7=" + $('#cantidad').val()+ "&form8=" + $('#estilista').val();
        $.ajax({
          type:"POST",
          url:"../controlador/facturar_t.php",
          data:cadena,
          success:function(r){
            if(r==1){
              alertify.success("Facturacion exitosa");
              // setTimeout ("location.reload();", 500);
            }else if(r==0){
              alertify.error("No se facturo");
            }else{
              alertify.error("Error en la facturacion");
            }
          }
        });
    }else{
      cadena="form1=" + $('#cliente').val() + "&form2=" + $('#servicio').val()+
            "&form3=" + $('#descuento').val()+ "&form4=" + $('#total_pagar').val()+
            "&form8=" + $('#estilista').val();
        $.ajax({
          type:"POST",
          url:"../controlador/facturar.php",
          data:cadena,
          success:function(r){
            if(r==1){
              alertify.success("Facturacion exitosa");
              // setTimeout ("location.reload();", 500);
            }else if(r==0){
              alertify.error("No se facturo");
            }else{
              alertify.error("Error en la facturacion");
            }
          }
        });
      }
  }

  function agregar_pago(){
    cadena="form1=" + $('#elemento').val() + "&form2=" + $('#valor').val()+
          "&form3=" + $('#tipo').val();
          $.ajax({
            type:"POST",
            url:"../controlador/ag_pago.php",
            data:cadena,
            success:function(r){
              if(r==1){
                alertify.success("Pago registrado");
                setTimeout ("location.reload();", 500);
              }else if(r==0){
                alertify.error("No se registro");
              }else{
                alertify.error("Error en el registro");
              }
            }
          });
  }

        $(document).ready(function(){
          $('#cliente_tabla').change(function(){
            cadena="form1=" + $('#cliente_tabla').val();
            $.ajax({
              type:"POST",
              url:"../controlador/consulta_mujer.php", //validacion de datos de registro
              data:cadena,
              success:function(r){
                if(r==1){
                  alertify.success("Registros encontrados");
                  $('#mujeres').load("../interfaz/temporal_mujeres.php");
                  $('#unisex').load("../interfaz/temporal_unisex.php");
                }else if(r==0){
                  alertify.error("No existen registros");
                  $('#mujeres').load("../interfaz/temporal_mujeres.php");
                  $('#unisex').load("../interfaz/temporal_unisex.php");
                  return false;
                }else{
                  alertify.error("nada sirve");
                }
              }
            });
          });

          $('#mes').change(function(){
            cadena="form1=" + $('#mes').val() + "&form2=" + $('#ano').val();
            $.ajax({
              type:"POST",
              url:"../controlador/listar_mes.php", //validacion de datos de registro
              data:cadena,
              success:function(r){
                if(r==1){
                  alertify.success("Registros encontrados");
                  $('#registro_ing_egr').load("../interfaz/temporal_mes.php");
                }else if(r==0){
                  alertify.error("No existen registros");
                  $('#registro_ing_egr').load("../interfaz/temporal_mes.php");
                  return false;
                }else{
                  alertify.error("nada sirve");
                }
              }
            });
          });
        });

    function listar(){
      cadena="form1=" + $('#cantidad').val();
      $.ajax({
        type:"POST",
        url:"../controlador/listar_trabajos.php", //validacion de datos de registro
        data:cadena,
        success:function(r){
          if(r==1){
            alertify.success("Registros encontrados");
            $('#registro_trabajos').load("../interfaz/temporal_trabajos.php");
          }else if(r==0){
            alertify.error("No existen registros");
            $('#registro_trabajos').load("../interfaz/temporal_trabajos.php");
          }else{
            alertify.error("nada sirve");
          }
        }
      });
    }
    function listar_dia(){
      cadena="form1=" + $('#dateofbirthh').val();
      $.ajax({
        type:"POST",
        url:"../controlador/listar_trabajos_dia.php", //validacion de datos de registro
        data:cadena,
        success:function(r){
          if(r==1){
            alertify.success("Registros encontrados");
            $('#registro_trabajos').load("../interfaz/temporal_trabajos.php");
          }else if(r==0){
            alertify.error("No existen registros");
            $('#registro_trabajos').load("../interfaz/temporal_trabajos.php");
          }else{
            alertify.error("nada sirve");
          }
        }
      });
    }
    function listar_tamano(){
      cadena="form1=" + $('#dateofbirth1').val() + "&form2=" + $('#dateofbirth2').val();
      $.ajax({
        type:"POST",
        url:"../controlador/listar_trabajos_tamano.php", //validacion de datos de registro
        data:cadena,
        success:function(r){
          if(r==1){
            alertify.success("Registros encontrados");
            $('#registro_trabajos').load("../interfaz/temporal_trabajos.php");
          }else if(r==0){
            alertify.error("No existen registros");
            $('#registro_trabajos').load("../interfaz/temporal_trabajos.php");
          }else{
            alertify.error("nada sirve");
          }
        }
      });
    }
    function agendar(){
      cadena="form1=" + $('#cliente').val() + "&form2=" + $('#servicio').val()+
             "&form3=" + $('#dateofbirth').val();
      $.ajax({
        type:"POST",
        url:"../controlador/agendar.php", //validacion de datos de registro
        data:cadena,
        success:function(r){
          if(r==1){
            alertify.success("Cita agendada exitosamente");
            $('#registro').load("../interfaz/temporal_citas.php");
          }else if(r==0){
            alertify.error("No se pudo agendar cita");
            $('#registro').load("../interfaz/temporal_citas.php");
          }else{
            alertify.error("nada sirve");
          }
        }
      });
    }


    $(document).ready(function(){
    $('#registro').load("../interfaz/temporal_citas.php");
    });

    function desactivar_cita(id_cita){
	alertify.confirm('¿Desea eliminar esta cita?', function(){
		$.ajax({
			type:"POST",
			data:"id_cita=" + id_cita,
			url:"../controlador/desactivar_cita.php",
			success:function(r){
				if(r==1){
					$('#registro').load("../interfaz/temporal_citas.php");
					alertify.success("Cita eliminada!!");
				}else{
					alertify.error("No se pudo eliminar :(");
				}
			}
		});
	}, function(){
		alertify.error('Cancelo !')
	});
}

    function validar(){
      if($('#user').val()==""){
        alertify.alert("Debes agregar el usuario");
        return false;
      }else if($('#pass').val()==""){
        alertify.alert("Debes agregar la contraseña");
        return false;
      }
      cadena="form1=" + $('#user').val() +
            "&form2=" + $('#pass').val();
          $.ajax({
            type:"POST",
            url:"../controlador/validar.php",
            data:cadena,
            success:function(r){
                   if(r==1){
                window.location="../interfaz/menu.php";
              }	else{
                alertify.error("La contraseña o usuario estan mal escritos, revisa");
              }
            }
          });
    }
</script>
