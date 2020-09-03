<?php
$_SESSION["criterioBusquedaVentas"]="nombre";//esto es para el que el valor del select inicie con un criterio para hacer la busqueda
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
        </ol>
    <br><br> --><br>
<div class="container-fluid">
    <!-- Ejemplo de tabla Listado -->
    <div class="card">
        <div class="card-header">
            <i class="fa fa-align-justify"></i> Ventas
            <button class="btn btn-success" onclick="nuevaVenta();">Nuevo</button>
            <button type="button" class="btn btn-secondary" onclick="volver();">
                            <i class="fa fa-reply"></i>&nbsp;
            </button>
        </div>
        <div class="card-body">
            <div id="mostrarMenu" style="display:none">
                <div class="form-group row"> <!--inicio del div para buscar-->
                    <div class="col-md-6">
                        <div class="input-group">
                            <select class="form-control col-md-3" id="opcion" name="opcion">
                            <option value="nombres">Productos</option>
                            <option value="Categorias">Categorias</option>
                            </select>
                            <input type="text" id="texto_buscar" name="texto_buscar" class="form-control" placeholder="Texto a buscar">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </div><!--fin del div para buscar-->

                <div id="tablaVentas">
                <!--aqui se carga el listado de las categorias-->
                    
                </div>
                <form action="" method="post">
                    <div id="carritoVenta">
                    <!-- aqui se cargara la tabla del carrito venta -->
                    </div>
                    <div id="botonGuardarCancelar" style="display:none">
                        <button class="btn btn-success">Guarda  Venta</button>
                        <button class="btn btn-danger" type="submit" name ="btnCancelarVenta">Cancelar</button>
                        <?php
                        $venta= new ventaControler();
                        $venta->CancelarVenta();
                        ?>
                    </div>
                </form>
            </div>

            <!-- vista de las ventas realizadas       -->
            <div id="formularioVentasRealizadas">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                        <td>#</td>
                        <td>IdVenta</td>
                        <td>Fecha</td>
                        <td>Monto Total</td>
                        <td>Detalle</td>
                        </tr>

                        <tr>
                        <td>#</td>
                        <td>1</td>
                        <td>2020-09-02</td>
                        <td> 150</td>
                        <td>
                        <button class="btn btn-info"><i class="fa fa-plus"></i></button>
                        </td>
                        </tr>

                        <tr>
                        <td>#</td>
                        <td>2</td>
                        <td>2020-09-02</td>
                        <td>150</td>
                        <td>
                        <button class="btn btn-info"><i class="fa fa-plus"></i></button>
                        </td>
                        </tr>
                    </table>
                </div>
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
        url:"ajax/venta/buscadorMostrar.php",
        data:{valor:valor},
        success:function(valor){
            $("#tablaVentas").html(valor);
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
        url:"ajax/venta/paginacion.php",
        data:{numero:c},
        success:function(data){
            buscadormostrar();
            
        }
    });
}
function cargarProductoParaLaVenta(idProductos,producto,precio,categoria)
{
    $.ajax({
        type:"POST",        
        
        url:"ajax/venta/ventaCargarDatoAlCarrito.php",
        data:{idProducto:idProductos,producto:producto,precio:precio,categoria:categoria},
        success:function(resultado)
        {
            $("#carritoVenta").load("ajax/venta/mostrarTablaCarrito.php");
            $("#botonGuardarCancelar").show();
        }
    });
}
function subtotal(event)
{
    const filaTr=event.target.parentElement.parentNode;
    const idTd=filaTr.querySelector('.contador');

    const id=parseInt(idTd.dataset.id);

    const precioTd=filaTr.querySelector('.precio');
    const subtotalTd=filaTr.querySelector('.subtotal')

    const valor=parseInt(event.target.value);//cantidad
    const precio=parseInt(precioTd.dataset.precio);//obtenemos el precio

    const subTotal=(valor*precio);

    subtotalTd.innerHTML=subTotal;

        $.ajax({
        type:"post",
        data:{valor:valor,id:id},
        url:"ajax/venta/actualizarDatosCarrito.php",
        success:function(resultado)
        {
            $("#total").text(resultado);
        },
        error:function(problemas)
        {
            console.log(problemas);
        }
    })
}
function nuevaVenta()
{
    $("#mostrarMenu").show();//mostramos la otra vista
    $("#formularioVentasRealizadas").hide();// ocultamos la otra vista
    
}
function volver()
{
    $("#mostrarMenu").hide();//mostramos la otra vista
    $("#formularioVentasRealizadas").show();// ocultamos la otra vista
}

</script>