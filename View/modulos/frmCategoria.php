<?php
$_SESSION["criterioBusquedaCategoria"]="nombre";//esto es para el que el valor del select inicie con un criterio para hacer la busqueda
$_SESSION["numerodepagina"]=1;
$categoriaControler= new categoriaControler();
?>
<!-- Contenido Principal -->
<main class="main">
          <!-- Breadcrumb -->
          <!-- <ol class="breadcrumb">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        <br>--><br> 
    <div class="container-fluid">
      <!-- Ejemplo de tabla Listado -->
      <div class="card">
          <div class="card-header">
              <i class="fa fa-align-justify"></i> Categoria
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAgregarCategoria">
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

              <div id="tablaCategoria">
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

<div id="modalAgregarCategoria" class="modal fade" role="dialog">
  
    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">                   

                    <h4 class="modal-title">Agregar Categoria</h4>
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

                                <input type="text" id="txtNombreCategoria" name="txtNombreCategoria" required class="form-control" placeholder="ingresar el nombre" >

                            </div>

                        </div>
                        
                        
                        
                        

                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                <button type="submit" class="btn btn-primary" name="btnGuardarCategoria">Guardar </button>
                <?php
                
                $categoriaControler->guardarCategoria();
                ?>
                </div>

            </form>

        </div>

    </div>

</div>


<!--=====================================
MODAL modificar rol
======================================-->

<div id="modalModificarCategoria" class="modal fade" role="dialog">
  
    <div class="modal-dialog">

        <div class="modal-content">

            <form role="form" method="post" enctype="multipart/form-data">

                <!--=====================================
                CABEZA DEL MODAL
                ======================================-->

                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <h4 class="modal-title">Modificar Categoria</h4>
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
                                <input type="hidden" name="txtIdModificar" id="txtIdModificar">
                                <input type="text" id="txtNombreModificar" name="txtNombreModificar"  class="form-control">

                            </div>

                        </div>
                        
                        
                        
                        

                    </div>

                </div>

                <!--=====================================
                PIE DEL MODAL
                ======================================-->

                <div class="modal-footer">

                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                <button type="submit" class="btn btn-primary" name="btnModificarCategoria">Modificar </button>
                <?php
                
                $categoriaControler->modificarCategoria();
                ?>
                </div>

            </form>

        </div>

    </div>

</div>

<!-- Inicio del modal desactivar activar y eliminar Producto -->
<div class="modal fade" id="modalDesactivarActivarEliminarCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
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
                        $categoriaControler->activarCategoria();
                        $categoriaControler->desactivarCategoria();
                        $categoriaControler->eliminarCategoria();
                        
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
        url:"ajax/categoria/buscadorMostrar.php",
        data:{valor:valor},
        success:function(valor){
            $("#tablaCategoria").html(valor);
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
        url:"ajax/categoria/paginacion.php",
        data:{numero:c},
        success:function(data){
            buscadormostrar();
            
        }
    });
}
function cargarDatosModalModificar(datos)
    {
        let dat=datos.split("||");
        $("#txtIdModificar").val(dat[0]);
        $("#txtNombreModificar").val(dat[1]);
      
    }  
    function cargarDatoModalActivarEliminar(datos,accion)
{
    
    let dato=datos.split("||");
    $("#txtId").val(dato[0]);
    let nombreCategoria=dato[1];
    if(accion==="activar")
    {
        
        $("#modalActivar").attr("class","modal-dialog modal-success").add();//cambiamos la clase del modal de acuerdo a la accion(activar,eliminar o desactivar)
        $("#tituloModal").text("Activar Categoria");//agregamo el titulo del modal de acuerdo a la accion(activar,desactivar o eliminar)
        $("#descripcionModal").text("Esta seguro de activar la categoria "+ nombreCategoria +"?");
        $("#botonModal").attr("class","btn btn-success").add();
        $("#botonModal").attr("name","btnActivar").add();//agremao el nombre al boton para
    }
    if(accion==="desactivar")
    {
        
        $("#modalActivar").attr("class","modal-dialog modal-danger").add();//cambiamos la clase del modal de acuerdo a la accion(activar,eliminar o desactivar)
        $("#tituloModal").text("Desactivar Categoria");//agregamo el titulo del modal de acuerdo a la accion(activar,desactivar o eliminar)
        $("#descripcionModal").text("Esta seguro de desactivar la categoria "+ nombreCategoria +"?");
        $("#botonModal").attr("class","btn btn-danger").add();
        $("#botonModal").attr("name","btnDesactivar").add();//agremao el nombre al boton para
    }
    if(accion==="eliminar")
    {
        
        $("#modalActivar").attr("class","modal-dialog modal-danger").add();//cambiamos la clase del modal de acuerdo a la accion(activar,eliminar o desactivar)
        $("#tituloModal").text("Eliminar Categoria");//agregamo el titulo del modal de acuerdo a la accion(activar,desactivar o eliminar)
        $("#descripcionModal").text("Esta seguro de elimar la categoria "+ nombreCategoria +"?");
        $("#botonModal").attr("class","btn btn-danger").add();
        $("#botonModal").attr("name","btnEliminar").add();//agremao el nombre al boton para
    }
    
}    
</script>