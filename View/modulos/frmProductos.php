<?php
$_SESSION["criterioBusquedaProductos"]="nombre";//esto es para el que el valor del select inicie con un criterio para hacer la busqueda
$_SESSION["numerodepagina"]=1;
$productoControler= new productoControler();
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
              <i class="fa fa-align-justify"></i> Productos &nbsp;&nbsp;
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
                          <input type="text" id="texto_buscar" name="texto_buscar" class="form-control" placeholder="Texto a buscar">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                      </div>
                  </div>
              </div><!--fin del div para buscar-->

              <div id="tablaProductos">
                <!--aqui se carga el listado de las categorias-->
                   
              </div>
                      
            </div>
      </div>
              <!-- Fin ejemplo de tabla Listado -->
    </div>
      

      </main>
      <!-- /Fin del contenido principal -->

<!--=====================================
MODAL AGREGAR productos
======================================-->

 <!--Inicio del modal agregar/-->
<div class="modal fade" id="modalNuevo"  role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-primary modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                <div class="modal-header">
                    <h4 class="modal-title">Agregar Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                    
                        <div class="form-group row">
                                                                
                            <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                            <div class="col-md-9">
                                <input type="text" id="txtNombre" name="txtNombre" required class="form-control" placeholder="registrar nombre" >
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Caracteristica</label>
                            <div class="col-md-9">
                                <input type="text" id="txtCaracteristica" name="txtCaracteristica" required class="form-control" placeholder="caracteristica " >
                            </div>
                        </div>
                                
                                    
                        <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Agregar una foto</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="txtFoto" id="txtFoto" style="margin:20px 0px; border:2px dotted #ccc; overflow:hidden; padding:40px; cursor:pointer;">
                                <img class="img-thumbnail" src="" alt="" id="previsualizar" width="40%" style="display:none;">    
                            </div> 
                        </div>

                        <div class="form-group row">
                            
                            <label class="col-md-3 form-control-label" for="text-input">Precio</label>
                            <div class="col-md-9">
                                <input type="text" id="txtPrecio" name="txtPrecio" required class="form-control" placeholder="insertar precio " >
                                
                            </div>
                        </div>

                        <div class="form-group row">                                   

                            <label class="col-md-3 form-control-label" for="text-input">Categoria</label>
                        
                            <div class="col-md-9">
                                <select name="selectCategoria" id="" class="form-control">
                                    <option value="0">
                                        Seleccione un registro
                                    </option>
                                    <?php
                                    $categoria= new categoria();
                                    $resultado=$categoria->mostrar();
                                    while($fila=mysqli_fetch_object($resultado))
                                    {
                                        echo '<option value="'.$fila->id.'">'.$fila->nombre.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>                        
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="btnGuardarProductos" >Guardar</button>
                    <?php
                    $productoControler->guardarProductos();
                    ?>
                </div>
            </form>
        </div>
                    
    </div>
                <!-- /.modal-content -->
</div>
            <!-- /.modal-dialog -->



<!--=====================================
MODAL Actualizar Productos
======================================-->

<div class="modal fade" id="modalActualizarProductos"  role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-primary modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                <div class="modal-header">
                    <h4 class="modal-title">Actualizar Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                    
                        <div class="form-group row">
                                                                
                            <label class="col-md-3 form-control-label" for="text-input">Nombre</label>
                            <div class="col-md-9">
                            <input type="hidden" id="txtidActualizar" name="txtidActualizar" required class="form-control" placeholder="registrar nombre" >
                                <input type="text" id="txtNombreActualizar" name="txtNombreActualizar" required class="form-control" placeholder="registrar nombre" >
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 form-control-label" for="text-input">Caracteristica</label>
                            <div class="col-md-9">
                                <input type="text" id="txtCaracteristicaActualizar" name="txtCaracteristicaActualizar" required class="form-control" placeholder="caracteristica " >
                            </div>
                        </div>
                                
                                    
                        <div class="form-group row">
                                <label class="col-md-3 form-control-label" for="text-input">Cambiar  foto</label>
                            <div class="col-md-9">
                                <input type="file" class="form-control" name="txtFotoActualizar" id="txtFotoActualizar" style="margin:20px 0px; border:2px dotted #ccc; overflow:hidden; padding:40px; cursor:pointer;">
                                    <input type="hidden" name="rutaFoto" id="rutaFoto">
                                <img class="img-thumbnail" src="" alt="" id="previsualizarActualizar" name="previsualizarActualizar"  width="40%">
                               
                            </div> 
                        </div>

                        <div class="form-group row">
                            
                            <label class="col-md-3 form-control-label" for="text-input">Precio</label>
                            <div class="col-md-9">
                                <input type="text" id="txtPrecioActualizar" name="txtPrecioActualizar" required class="form-control" placeholder="insertar precio " >
                                
                            </div>
                        </div>

                        <div class="form-group row">                                   

                            <label class="col-md-3 form-control-label" for="text-input">Categoria</label>
                        
                            <div class="col-md-9">
                                <select name="selectCategoriaActualizar" id="selectCategoriaActualizar" class="form-control">
                                    <option value="0">
                                        Seleccione un registro
                                    </option>
                                    <?php
                                    $categoria= new categoria();
                                    $resultado=$categoria->mostrar();
                                    while($fila=mysqli_fetch_object($resultado))
                                    {
                                        echo '<option value="'.$fila->id.'">'.$fila->nombre.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>                        
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" name="btnModificarProductos" >Modificar</button>
                    <?php
                    $productoControler->modificarProductos();
                    ?>
                </div>
            </form>
        </div>
                    
    </div>
                <!-- /.modal-content -->
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
                        $productoControler->activarProducto();
                        $productoControler->desactivarProducto();
                        $productoControler->eliminarProducto();
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
//  funcion que previsualiaz la foto del producto en el modal de agregar nuevo
$("#txtFoto").change(function(){
    var fotoPerfil=$("#txtFoto").val();
    if(fotoPerfil=="")
    {
        
        $("#txtFoto").val(fotoPerfil);
        $("#previsualizar").attr("src","");
        $("#previsualizar").hide();
    }
    else
    {
       
        var imagen=this.files[0];
        if((imagen["type"]!="image/jpeg") && (imagen["type"]!="image/png"))
        {
            
            $("#txtFoto").val("");
            swal({
                title:"Error al subir la imagen",
                text:"La imagen debe ser en formato jpg o png",
                type:"error",
                confirmButtonText:"¡Cerrar!",
                closeOnConfirm:false
            });
            
        }
        else
        {
            // si   la imagen viene en formato jpj o png
            let datoImagen=new FileReader;
            datoImagen.readAsDataURL(imagen);
        
            $(datoImagen).on("load",function(e){
                var ruta=e.target.result;
                $("#previsualizar").attr("src",ruta);
                $("#previsualizar").show();
                
            })

        
        

       }

    }
})

// funcion que previsualiza la nueva foto en el modal de actulizar producto
$("#txtFotoActualizar").change(function(){
    let fotoPerfil=$("#txtFotoActualizar").val();
    if(fotoPerfil=="")
    {
        
        $("#txtFotoActualizar").val(fotoPerfil);
        $("#previsualizarActualizar").attr("src","");
        
    }
    else
    {
       
        let imagen=this.files[0];
        if((imagen["type"]!="image/jpeg") && (imagen["type"]!="image/png"))
        {
            
            $("#txtFotoActualizar").val("");
            swal({
                title:"Error al subir la imagen",
                text:"La imagen debe ser en formato jpg o png",
                type:"error",
                confirmButtonText:"¡Cerrar!",
                closeOnConfirm:false
            });
            
        }
        else
        {
            // si   la imagen viene en formato jpj o png
            let datoImagen=new FileReader;
            datoImagen.readAsDataURL(imagen);
        
            $(datoImagen).on("load",function(e){
                let ruta=e.target.result;
                $("#previsualizarActualizar").attr("src",ruta);// cargamos la foto
                $("#previsualizarActualizar").show(); // lo ponemos visible
                
                
            })

        
        

       }

    }
})
$(buscadormostrar());

function buscadormostrar(valor){
    
    $.ajax({
        type:"POST",
        url:"ajax/producto/buscadorMostrar.php",
        data:{valor:valor},
        success:function(valor){
            $("#tablaProductos").html(valor);
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
        url:"ajax/producto/paginacion.php",
        data:{numero:c},
        success:function(data){
            buscadormostrar();
            
        }
    });
}
function cargarDatoModalActualizar(datos)
{
    let dat=datos.split("||");
    $("#txtidActualizar").val(dat[0]); 
    $("#txtNombreActualizar").val(dat[1]); 
    $("#txtCaracteristicaActualizar").val(dat[2]); 
    $("#previsualizarActualizar").attr("src",dat[3])
    $("#rutaFoto").val(dat[3]);
    $("#txtPrecioActualizar").val(dat[4]); 
    $("#selectCategoriaActualizar").val(dat[5]);
}
function cargarDatoModalActualizarEliminar(datos,accion)
{
    
    let dato=datos.split("||");
    $("#txtId").val(dato[0]);
    let nombreProducto=dato[1];
    if(accion==="activar")
    {
        
        $("#modalActivar").attr("class","modal-dialog modal-success").add();//cambiamos la clase del modal de acuerdo a la accion(activar,eliminar o desactivar)
        $("#tituloModal").text("Activar Producto");//agregamo el titulo del modal de acuerdo a la accion(activar,desactivar o eliminar)
        $("#descripcionModal").text("Esta seguro de activar el producto "+ nombreProducto +"?");
        $("#botonModal").attr("class","btn btn-success").add();
        $("#botonModal").attr("name","btnActivar").add();//agremao el nombre al boton para
    }
    if(accion==="desactivar")
    {
        
        $("#modalActivar").attr("class","modal-dialog modal-danger").add();//cambiamos la clase del modal de acuerdo a la accion(activar,eliminar o desactivar)
        $("#tituloModal").text("Desactivar Producto");//agregamo el titulo del modal de acuerdo a la accion(activar,desactivar o eliminar)
        $("#descripcionModal").text("Esta seguro de dactivar el producto "+ nombreProducto +"?");
        $("#botonModal").attr("class","btn btn-danger").add();
        $("#botonModal").attr("name","btnDesactivar").add();//agremao el nombre al boton para
    }
    if(accion==="eliminar")
    {
        
        $("#modalActivar").attr("class","modal-dialog modal-danger").add();//cambiamos la clase del modal de acuerdo a la accion(activar,eliminar o desactivar)
        $("#tituloModal").text("Eliminar Producto");//agregamo el titulo del modal de acuerdo a la accion(activar,desactivar o eliminar)
        $("#descripcionModal").text("Esta seguro de elimar el producto "+ nombreProducto +"?");
        $("#botonModal").attr("class","btn btn-danger").add();
        $("#botonModal").attr("name","btnEliminar").add();//agremao el nombre al boton para
    }
    
}    
</script>