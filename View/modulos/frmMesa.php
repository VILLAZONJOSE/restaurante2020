<?php
$_SESSION["criterioBusquedaMesa"]="descripcion";//esto es para el que el valor del select inicie con un criterio para hacer la busqueda
$_SESSION["numeroPagina"]=1;
$mesaControler= new mesaControler();
?>
<!-- Contenido Principal -->
<main class="main">
          <!-- Breadcrumb -->
          <!-- <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
          </ol> -->
        <br><br>
    <div class="container-fluid">
      <!-- Ejemplo de tabla Listado -->
      <div class="card">
          <div class="card-header">
              <i class="fa fa-align-justify"></i> Mesa &nbsp;
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAgregarMesa">
                  <i class="icon-plus"></i>&nbsp;Nuevo
              </button>
          </div>
          <div class="card-body">
              <div class="form-group row"> <!--inicio del div para buscar-->
                  <div class="col-md-6">
                      <div class="input-group">
                          <select class="form-control col-md-3" id="opcion" name="opcion">
                            <option value="Descripcion">Descripcion</option>
                          </select>
                          <input type="text" id="textoBuscar" name="textoBuscar" class="form-control" placeholder="Texto a buscar">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                      </div>
                  </div>
              </div><!--fin del div para buscar-->

              <div id="tablaMesa">
                <!--aqui se carga el listado de las categorias-->
                   
              </div>
                      
            </div>
      </div>
              <!-- Fin ejemplo de tabla Listado -->
    </div>
      

      </main>
      <!-- /Fin del contenido principal -->

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalAgregarMesa" class="modal fade" role="dialog">
  
    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">
                       <h4 class="modal-title">Registrar Mesa</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>                  

                </div>

                <!--=====================================
                CUERPO DEL MODAL
                ======================================-->

                <div class="modal-body">

                    <div class="box-body">

                        <!-- ENTRADA PARA EL NOMBRE -->
                        
                        <div class="form-group">
                        
                            <div class="input-group">                            
                                <!-- <span class="input-group-addon"><i class="fa fa-user"></i></span>  -->
                                <label class="col-md-3 form-control-label" for="text-input">Descripcion</label>
                                <input type="text" id="txtDescripcionMesa" name="txtDescripcionMesa" required class="form-control" placeholder="ingresar el Descripcion" >

                                
                            </div>
                            </br>
                            <div class="input-group">                            
                                <!-- <span class="input-group-addon"><i class="fa fa-user"></i></span>  -->
                                
                                <label class="col-md-3 form-control-label" for="text-input">Capacidad</label>
                                <input type="text" id="txtCapacidadMesa" name="txtCapacidadMesa" required class="form-control" placeholder="ingresar el Capacidad" >

                                
                            </div>
                            </br>
                            <div class="input-group">                            
                                <!-- <span class="input-group-addon"><i class="fa fa-user"></i></span>  -->
                                <label class="col-md-3 form-control-label" for="text-input">Ubicacion</label>
                                <input type="text" id="txtUbicacionMesa" name="txtUbicacionMesa" required class="form-control" placeholder="ingresar Ubicacion" >

                            </div>

                        </div>
                        
                        
                        
                        

                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                <button type="submit" class="btn btn-primary" name="btnGuardarMesa">Guardar </button>
                <?php
                
                $mesaControler->guardarMesa();
                ?>
                </div>

            </form>

        </div>

    </div>

</div>

<!-- Inicio del modal desactivar activar mesa -->
<div class="modal fade" id="modalDesactivarActivarEliminarMesa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-danger" id="modalActivar" role="document">
        <div class="modal-content">
            <form method="post">
                <div class="modal-header">
                    <h4 class="modal-title" id="tituloModal"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <input type="hidden" name="txtId" id="txtId">
                <div class="modal-body">
                    <p id="descripcionModal"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="botonModal" class="btn btn-danger" >Aceptar</button>
                    <?php
                        $mesaControler->activarMesass();
                        $mesaControler->desactivarMesass();
                    
                    ?>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- Fin del modal Eliminar -->




<script>
$(buscadorMostrar());

function buscadorMostrar(valor){
    
    $.ajax({
        type:"POST",
        url:"ajax/mesa/buscadorMostrar.php",
        data:{valor:valor},
        success:function(valor){
            $("#tablaMesa").html(valor);
        }
    });
}

$(document).on("keyup", "#textoBuscar" ,function(){
      var valor =$(this).val();
      if(valor!=""){
         buscadorMostrar(valor);
      }
      else{
        buscadorMostrar();
      }
      
});
function numeroPagina(c){
    $.ajax({
        type:"POST",
        url:"ajax/mesa/paginacion.php",
        data:{numero:c},
        success:function(data){
            buscadorMostrar();
            
        }
    });
}
function cargarDatoModalActivarEliminar(datos,accion)
{
    
    let dato=datos.split("||");
    $("#txtId").val(dato[0]);
    let nombreMesa=dato[2];
    if(accion==="activar")
    {
        
        $("#modalActivar").attr("class","modal-dialog modal-success").add();//cambiamos la clase del modal de acuerdo a la accion(activar,eliminar o desactivar)
        $("#tituloModal").text("Activar Mesa");//agregamo el titulo del modal de acuerdo a la accion(activar,desactivar o eliminar)
        $("#descripcionModal").text("Esta seguro de activar la mesa "+ nombreMesa +"?");
        $("#botonModal").attr("class","btn btn-success").add();
        $("#botonModal").attr("name","btnActivar").add();//agremao el nombre al boton para
    }
    if(accion==="desactivar")
    {
        
        $("#modalActivar").attr("class","modal-dialog modal-danger").add();//cambiamos la clase del modal de acuerdo a la accion(activar,eliminar o desactivar)
        $("#tituloModal").text("Desactivar Mesa");//agregamo el titulo del modal de acuerdo a la accion(activar,desactivar o eliminar)
        $("#descripcionModal").text("Esta seguro de dactivar la mesa "+ nombreMesa +"?");
        $("#botonModal").attr("class","btn btn-danger").add();
        $("#botonModal").attr("name","btnDesactivar").add();//agremao el nombre al boton para
    }
    
    
}    
</script>