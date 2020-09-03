<?php
$_SESSION["criteriobusquedacliente"]="nombres";//esto es para el que el valor del select inicie con un criterio para hacer la busqueda

$_SESSION["numerodepagina"]=1;
$clienteControler=new clienteControler();
?>
<!-- Contenido Principal -->
<main class="main">
          <!-- Breadcrumb -->
          <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        <br><br>
    <div class="container-fluid">
      <!-- Ejemplo de tabla Listado -->
      <div class="card">
          <div class="card-header">
              <i class="fa fa-align-justify"></i> Cliente
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalNuevo">
                  <i class="icon-plus"></i>&nbsp;Nuevo
              </button>
          </div>
          <div class="card-body">
              <div class="form-group row"> <!--inicio del div para buscar-->
                  <div class="col-md-6">
                      <div class="input-group">
                          <select class="form-control col-md-3" id="opcion" name="opcion">
                            <option value="nombres">Nombre</option>
                          </select>
                          <input type="text" id="textoBuscar" name="textoBuscar" class="form-control" placeholder="Texto a buscar">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                      </div>
                  </div>
              </div><!--fin del div para buscar-->

              <div id="tabla">
                <!--aqui se carga el listado del cliente-->
                   
              </div>
                      
            </div>
      </div>
              <!-- Fin ejemplo de tabla Listado -->
    </div>
      

      </main>
<!-- /Fin del contenido principal -->
    <!--Inicio del modal agregar/-->
    <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="modal-body">
                        
                            
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">nombres</label>
                                <div class="col-md-9">
                                    <input type="text" id="txtNombre" name="txtNombre" required class="form-control" placeholder="ingresar sus nombres del cliente" >
                                    <span class="help-block">(*) Ingresar Nombres</span>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">apellidos</label>
                                <div class="col-md-9">
                                    <input type="text" id="txtApellidos" name="txtApellidos" required class="form-control" placeholder="Ingresar apellidos del cliente )">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">login</label>
                                <div class="col-md-9">
                                    <input type="text" id="txtLogin" name="txtLogin" required class="form-control" placeholder="Login">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">password</label>
                                <div class="col-md-9">
                                    <input type="password" id="txtPassword" name="txtPassword" required class="form-control" placeholder="contraseña">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">empresa</label>
                                <div class="col-md-9">
                                    <input type="text" id="txtempresa" name="txtempresa" required class="form-control" placeholder="ejemplo(coopaguap.srl)">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">telefono</label>
                                <div class="col-md-9">
                                    <input type="text" id="txtTelefono" name="txtTelefono" required class="form-control" placeholder="inserte su numero telefonico">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">direccion</label>
                                <div class="col-md-9">
                                    <input type="text" id="txtDireccion" name="txtDireccion" required class="form-control" placeholder="/barrio-calle/N° de casa">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">email</label>
                                <div class="col-md-9">
                                    <input type="email" id="txtEmail" name="txtEmail" required class="form-control" placeholder="empl-jose@gmail.com">
                                </div>
                            </div>

                        
                    </div>
           
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="btnGuardarCliente" >Guardar</button>
                        <?php
                            
                            $clienteControler->guardarCliente();
                        ?>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->
    <!--Inicio del modal actualizar/-->
    <div class="modal fade" id="modalActualizar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modificar cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="modal-body">
                        
                            
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">nombres</label>
                                <div class="col-md-9">
                                    <input type="text" name="txtIdModificar" id="txtIdModificar">
                                    <input type="text" id="txtNombreModificar" name="txtNombreModificar" required class="form-control" placeholder="ingresar sus nombres del cliente" >
                                    
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">apellidos</label>
                                <div class="col-md-9">
                                    <input type="text" id="txtApellidosModificar" name="txtApellidosModificar" required class="form-control" placeholder="Ingresar apellidos del cliente )">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">login</label>
                                <div class="col-md-9">
                                    <input type="text" id="txtLoginModificar" name="txtLoginModificar" required class="form-control" placeholder="Login">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">password</label>
                                <div class="col-md-9">
                                    <input type="password" id="txtPasswordModificar" name="txtPasswordModificar" required class="form-control" placeholder="contraseña">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">empresa</label>
                                <div class="col-md-9">
                                    <input type="text" id="txtEmpresaModificar" name="txtEmpresaModificar" required class="form-control" placeholder="ejemplo(coopaguap.srl)">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">telefono</label>
                                <div class="col-md-9">
                                    <input type="text" id="txtTelefonoModificar" name="txtTelefonoModificar" required class="form-control" placeholder="inserte su numero telefonico">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">direccion</label>
                                <div class="col-md-9">
                                    <input type="text" id="txtDireccionModificar" name="txtDireccionModificar" required class="form-control" placeholder="/barrio-calle/N° de casa">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">email</label>
                                <div class="col-md-9">
                                    <input type="email" id="txtEmailModificar" name="txtEmailModificar" required class="form-control" placeholder="empl-jose@gmail.com">
                                </div>
                            </div>

                        
                    </div>
           
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="btnModificarCliente" >Modificar</button>
                        <?php
                            
                            $clienteControler->modficarCliente();
                        ?>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->

    <!-- Inicio del modal desactivar activar y eliminar Producto -->
<div class="modal fade" id="modalDesactivarActivarEliminarCliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
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
                        $clienteControler->activarCliente();
                        $clienteControler->desactivarCliente();
                        $clienteControler->eliminarCliente();
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

$(buscadormostrar());

function buscadormostrar(valor){
    
    $.ajax({
        type:"POST",
        url:"ajax/cliente/buscadorMostrar.php",
        data:{valor:valor},
        success:function(valor){
            $("#tabla").html(valor);
        }
    });
}

$(document).on("keyup", "#textoBuscar" ,function(){
      var valor =$(this).val();
      if(valor!=""){
         buscadormostrar(valor);
      }
      else{
        buscadormostrar();
      }
      
});
function numerodepagina(c){
    $.ajax({
        type:"POST",
        url:"ajax/cliente/paginacion.php",
        data:{numero:c},
        success:function(data){
            buscadormostrar();
            
        }
    });
}

function CargarDatosModalModificarcliente(datos){
    f=datos.split('||');
    $("#txtIdModificar").val(f[0]);
    $("#txtNombreModificar").val(f[1]);
    $("#txtApellidosModificar").val(f[2]);
    $("#txtLoginModificar").val(f[3]);
    $("#txtPasswordModificar").val(f[4]);
    $("#txtEmpresaModificar").val(f[5]);
    $("#txtTelefonoModificar").val(f[6]);
    $("#txtDireccionModificar").val(f[7]);
    $("#txtEmailModificar").val(f[8]);
}

function cargarDatoModalActivarEliminar(datos,accion)
{
    
    let dato=datos.split("||");
    $("#txtId").val(dato[0]);
    let nombreCliente=dato[1];
    if(accion==="activar")
    {
        
        $("#modalActivar").attr("class","modal-dialog modal-success").add();//cambiamos la clase del modal de acuerdo a la accion(activar,eliminar o desactivar)
        $("#tituloModal").text("Activar Cliente");//agregamo el titulo del modal de acuerdo a la accion(activar,desactivar o eliminar)
        $("#descripcionModal").text("Esta seguro de activar el cliente "+ nombreCliente +"?");
        $("#botonModal").attr("class","btn btn-success").add();
        $("#botonModal").attr("name","btnActivar").add();//agremao el nombre al boton para
    }
    if(accion==="desactivar")
    {
        
        $("#modalActivar").attr("class","modal-dialog modal-danger").add();//cambiamos la clase del modal de acuerdo a la accion(activar,eliminar o desactivar)
        $("#tituloModal").text("Desactivar Cliente");//agregamo el titulo del modal de acuerdo a la accion(activar,desactivar o eliminar)
        $("#descripcionModal").text("Esta seguro de dactivar el cliente "+ nombreCliente +"?");
        $("#botonModal").attr("class","btn btn-danger").add();
        $("#botonModal").attr("name","btnDesactivar").add();//agremao el nombre al boton para
    }
    if(accion==="eliminar")
    {
        
        $("#modalActivar").attr("class","modal-dialog modal-danger").add();//cambiamos la clase del modal de acuerdo a la accion(activar,eliminar o desactivar)
        $("#tituloModal").text("Eliminar Cliente");//agregamo el titulo del modal de acuerdo a la accion(activar,desactivar o eliminar)
        $("#descripcionModal").text("Esta seguro de elimar el cliente "+ nombreCliente +"?");
        $("#botonModal").attr("class","btn btn-danger").add();
        $("#botonModal").attr("name","btnEliminar").add();//agremao el nombre al boton para
    }
    
}
</script>