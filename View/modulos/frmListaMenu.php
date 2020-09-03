<?php
$_SESSION["criterioBusquedaMenu"]="fecha";//esto es para el que el valor del select inicie con un criterio para hacer la busqueda
$_SESSION["numerodepagina"]=1;
$listaMenuControler=new menuControler();
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
              <i class="fa fa-align-justify"></i> Menu
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalAgregarMenu">
                  <i class="icon-plus"></i>&nbsp;Nuevo
              </button>
          </div>
          <div class="card-body">
              <div class="form-group row"> <!--inicio del div para buscar-->
                  <div class="col-md-6">
                      <div class="input-group">
                          <select class="form-control col-md-3" id="opcion" name="opcion">
                            <option value="fecha">Fecha</option>
                          </select>
                          <input type="text" id="textoBuscar" name="textoBuscar" class="form-control" placeholder="Texto a buscar">
                          <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                      </div>
                  </div>
              </div><!--fin del div para buscar-->

              <div id="tablaMenu">
                <!--aqui se carga el listado de las menu-->
                   
              </div>
                      
            </div>
      </div>
              <!-- Fin ejemplo de tabla Listado -->
    </div>
      

      </main>
      <!-- /Fin del contenido principal -->
      <!--=====================================
MODAL AGREGAR rol
======================================-->

<div id="modalAgregarMenu" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

      <div class="modal-content">

        <form method="post" enctype="multipart/form-data">

            <!--=====================================
            CABEZA DEL MODAL
            ======================================-->

            <div class="modal-header" style="background:#3c8dbc; color:white">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <h4 class="modal-title">Agregar Menu del dia</h4>

            </div>

              <!--=====================================
              CUERPO DEL MODAL
              ======================================-->

            <div class="modal-body">

                <div class="box-body">
                    <div class="form-group">
                        <div class="input-group">
                            <label class="col-md-3 form-control-label" for="text-input">Fecha</label>
                            <input type="date" class="form-control" name="txtFechaMenu">
                        </div>
                        </br>
                        <div class="input-group" id="selectProductos">
                            <label class="col-md-3 form-control-label" for="text-input">Productos</label>
                            <select class="form-control"   name="selectProductosMenu" id="selectProductosMenu" style="width:'100%'">
                                <option value="">Seleccione un registro</option>
                                <?php
                                $listaMenu= new menuControler();
                                $resultado=$listaMenu->mostrarProductos();
                                while($fila=mysqli_fetch_object($resultado))
                                {
                                    echo '<option value="'.$fila->id.'">'.$fila->nombre.'</option>';
                                }
                                ?>

                            </select>
                        </div>
                        </br>
                        <div class="input-group">
                                <div class="responsive" id="tablaListMenu">
                                    <!-- aqui se mostrara la tabla con los productos en la lista de menu -->
                                </div>
                        </div>
                        
                    </div>

                </div>

            </div>

            <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">

            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

            <button type="submit" class="btn btn-primary" name="btnGuardarMenu">Guardar</button>
            <?php
            
            $listaMenuControler->guardarMenu();
            ?>
            </div>

        </form>

    </div>

</div>

</div>
<script>

$(buscadormostrar());

function buscadormostrar(valor){
    
    $.ajax({
        type:"POST",
        url:"ajax/listaMenu/buscadorMostrar.php",
        data:{valor:valor},
        success:function(valor){
            $("#tablaMenu").html(valor);
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
        url:"ajax/listaMenu/paginacion.php",
        data:{numero:c},
        success:function(data){
            buscadormostrar();
            
        }
    });
}
// $("#selectProductosMenu").select2({ width: 'resolve' });
$("#selectProductosMenu").select2({ width: '100%' });    
$("#selectProductosMenu").change(function(){
    let producto=$(this).val();
    $.ajax({
        type:"post",
        data:"valor="+ producto,
        url:"ajax/listaMenu/cargarProductoTabla.php",
        success:function(resultado)
        {
            $("#tablaListMenu").load("ajax/listaMenu/mostarTablaProducto.php");
        }
    })
})
$("#tablaListMenu").load("ajax/listaMenu/mostarTablaProducto.php");
</script>