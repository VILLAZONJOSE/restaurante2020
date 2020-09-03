<?php
$_SESSION["criterioBusquedaUsuario"]="nombre";//esto es para el que el valor del select inicie con un criterio para hacer la busqueda
$_SESSION["numerodepagina"]=1;
$usuario= new usuarioControler();
?>
<!-- Contenido Principal -->
<main class="main">
          <!-- Breadcrumb -->
          <!-- <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
          </ol> -->
        <br>
    <div class="container-fluid">
      <!-- Ejemplo de tabla Listado -->
      <div class="card">
          <div class="card-header">
              <i class="fa fa-align-justify"></i> Usuario &nbsp;
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAgregarUsuario">
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
                          <input type="text" id="texto_buscar" name="texto_buscar" class="form-control" placeholder="Texto a buscar">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                      </div>
                  </div>
              </div><!--fin del div para buscar-->

              <div class="responsive" id="tabla">
                <!--aqui se carga el listado de los usuarios-->
                   
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

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">         

          <h4 class="modal-title">Agregar usuario</h4>
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
              
                
              <label class="col-md-3 form-control-label" for="text-input">Nombre</label>

                <input type="text" id="txtNombre" name="txtNombre" required class="form-control" placeholder="ingresar el nombre" >

              </div>

            </div>
            <!-- ENTRADA PARA EL apellidos -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                
              <label class="col-md-3 form-control-label" for="text-input">Apellidos</label>

                <input type="text" id="txtApellidos" name="txtApellidos" required class="form-control" placeholder="ingresar apellidos " >
              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
              
              <div class="input-group">
              
              <label class="col-md-3 form-control-label" for="text-input">Login</label>

                <input type="text" id="txtUsuario" name="txtUsuario" required class="form-control" placeholder="ingresar login" >

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
              <label class="col-md-3 form-control-label" for="text-input">Password</label>


                <input type="password" id="txtPassword" name="txtPassword" required class="form-control" placeholder="ingresar contraseña" >

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">
              
              <div class="input-group">
              
              <label class="col-md-3 form-control-label" for="text-input">Tipo</label>


                <select class="form-control input-lg" name="nuevoPerfil">
                <option value="0">Seleccione un registro</option>
                  <?php
                    $tipo= new tipo();
                    $resultado=$tipo->mostrar();
                    while($fila=mysqli_fetch_object($resultado))
                    { 
                      echo '<option  value="'.$fila->id.'">'.$fila->nombre.'</option>';
                    }
                  ?>                  

                </select>

              </div>

            </div>

           

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary" name="btnGuardarUsuario">Guardar </button>
        <?php
        
        $usuario->guardarUsuario();
        ?>
        </div>

      </form>

    </div>

  </div>

</div>



<!--=====================================
MODAL Actualizar USUARIO
======================================-->

<div id="modalActualizarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">
          <h4 class="modal-title">Actualizar usuario</h4>
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
              
                
                <input type="hidden" name="idUsuarioActualizar" id="idUsuarioActualizar">
                <label class="col-md-3 form-control-label" for="text-input">Nombre</label>

                <input type="text" id="txtNombreActualizar" name="txtNombreActualizar" required class="form-control" placeholder="ingresar el nombre" >

              </div>

            </div>
            <!-- ENTRADA PARA EL apellidos -->
            
            <div class="form-group">
              
              <div class="input-group">
              
              <label class="col-md-3 form-control-label" for="text-input">Apellidos</label>
                <input type="text" id="txtApellidosActualizar" name="txtApellidosActualizar" required class="form-control" placeholder="ingresar apellidos " >
              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
              
              <div class="input-group">
              
              <label class="col-md-3 form-control-label" for="text-input">Login</label>

                <input type="text" id="txtUsuarioActualizar" name="txtUsuarioActualizar" required class="form-control" placeholder="ingresar login" >

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
              <label class="col-md-3 form-control-label" for="text-input">Password</label>

                <input type="password" id="txtPasswordActualizar" name="txtPasswordActualizar" required class="form-control" placeholder="ingresar contraseña" >

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">
              
              <div class="input-group">
              
              <label class="col-md-3 form-control-label" for="text-input">Tipo</label>
                <select class="form-control input-lg" id="nuevoPerfilActualizar" name="nuevoPerfilActualizar">
                  
                  <option value="0">Selecionar perfil</option>

                  <?php
                    $tipo= new tipo();
                    $resultado=$tipo->mostrar();
                    while($fila=mysqli_fetch_object($resultado))
                    { 
                      echo '<option  value="'.$fila->id.'">'.$fila->nombre.'</option>';
                    }
                  ?>          

                </select>

              </div>

            </div>

           

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" name="btnModificarUsuario" class="btn btn-primary">Modificar </button>
        <?php
        
        $usuario->modificar();
        ?>
        </div>

      </form>

    </div>

  </div>

</div>
<!-- Inicio del modal desactivar activar y eliminar Producto -->
<div class="modal fade" id="modalDesactivarActivarEliminarProductos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
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
                        $usuario->activarUsuario();
                        $usuario->desactivarUsuario();
                        $usuario->eliminarUsuario();
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
        url:"ajax/usuario/buscadorMostrar.php",
        data:{valor:valor},
        success:function(valor){
            $("#tabla").html(valor);
        }
    });
}

$(document).on("keyup", "#texto_buscar" ,function(){
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
        url:"ajax/usuario/paginacion.php",
        data:{numero:c},
        success:function(data){
            buscadormostrar();
            console.log(data);
        }
    });
}
    function cargarDatosModalModificar(datos)
    {
        let dat=datos.split("||");
        $("#idUsuarioActualizar").val(dat[0]);
        $("#txtNombreActualizar").val(dat[1]);
        $("#txtApellidosActualizar").val(dat[2]);
        $("#txtUsuarioActualizar").val(dat[3]);
        $("#txtPasswordActualizar").val(dat[4]);
        $("#nuevoPerfilActualizar").val(dat[6]);
    }
    function cargarDatoModalActivarEliminar(datos,accion)
{
    
    let dato=datos.split("||");
    $("#txtId").val(dato[0]);
    let nombreUsuario=dato[1];
    if(accion==="activar")
    {
        
        $("#modalActivar").attr("class","modal-dialog modal-success").add();//cambiamos la clase del modal de acuerdo a la accion(activar,eliminar o desactivar)
        $("#tituloModal").text("Activar Usuario");//agregamo el titulo del modal de acuerdo a la accion(activar,desactivar o eliminar)
        $("#descripcionModal").text("Esta seguro de activar el usuario "+ nombreUsuario +"?");
        $("#botonModal").attr("class","btn btn-success").add();
        $("#botonModal").attr("name","btnActivar").add();//agremao el nombre al boton para
    }
    if(accion==="desactivar")
    {
        
        $("#modalActivar").attr("class","modal-dialog modal-danger").add();//cambiamos la clase del modal de acuerdo a la accion(activar,eliminar o desactivar)
        $("#tituloModal").text("Desactivar Usuario");//agregamo el titulo del modal de acuerdo a la accion(activar,desactivar o eliminar)
        $("#descripcionModal").text("Esta seguro de dactivar el usuario "+ nombreUsuario +"?");
        $("#botonModal").attr("class","btn btn-danger").add();
        $("#botonModal").attr("name","btnDesactivar").add();//agremao el nombre al boton para
    }
    if(accion==="eliminar")
    {
        
        $("#modalActivar").attr("class","modal-dialog modal-danger").add();//cambiamos la clase del modal de acuerdo a la accion(activar,eliminar o desactivar)
        $("#tituloModal").text("Eliminar Usuario");//agregamo el titulo del modal de acuerdo a la accion(activar,desactivar o eliminar)
        $("#descripcionModal").text("Esta seguro de elimar el usuario "+ nombreUsuario +"?");
        $("#botonModal").attr("class","btn btn-danger").add();
        $("#botonModal").attr("name","btnEliminar").add();//agremao el nombre al boton para
    }
    
}    
</script>