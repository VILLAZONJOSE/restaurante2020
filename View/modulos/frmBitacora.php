<?php
$_SESSION["criterioBusquedaRol"]="nombre";//esto es para el que el valor del select inicie con un criterio para hacer la busqueda
$_SESSION["numerodepagina"]=1;
$rolControler= new rolController();
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
            <i class="fa fa-align-justify"></i> Bitacora
            
        </div>
        <div class="card-body">
            <div class="form-group row"> <!--inicio del div para buscar-->
                <div class="col-md-6">
                    <div class="input-group">
                        <select class="form-control col-md-3" id="opcion" name="opcion">
                        <option value="tabla">Tabla</option>
                        </select>
                        <input type="text" id="textoBuscar" name="textoBuscar" class="form-control" placeholder="Texto a buscar">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                    </div>
                </div>
            </div><!--fin del div para buscar-->

            <div id="tablaBitacora">
            <!--aqui se carga el listado de las rols-->
                
            </div>
                    
        </div>
    </div>
            <!-- Fin ejemplo de tabla Listado -->
</div>
    

    </main>
    <!-- /Fin del contenido principal -->
    <script>
$(buscadormostrar());

function buscadormostrar(valor){
    
    $.ajax({
        type:"POST",
        url:"ajax/bitacora/buscadorMostrar.php",
        data:{valor:valor},
        success:function(valor){
            $("#tablaBitacora").html(valor);
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
        url:"ajax/bitacora/paginacion.php",
        data:{numero:c},
        success:function(data){
            buscadormostrar();
            
        }
    });
}
</script>