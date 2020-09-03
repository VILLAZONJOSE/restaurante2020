
<?php
session_start();
include_once("../../Models/conexion.php");
include_once("../../Models/venta.php");

$objVenta=new venta();
$objconexion=new conexion();

$criteriobusqueda="nombre"; //obtenemos el cirterio de busqueda ya sea por por nombre

$valor=$_POST["valor"];//obtiene el valor al escribir en el campo del buscador
$id_Ub= strtotime('now').(substr((string)microtime(),2.6));
ini_set('date.timezone','America/La_Paz'); 
$fechaActual=date("Y-m-d");
/*paginacion con ajax*/
$cantidadProductos=$objVenta->contarListaMenu($fechaActual);
$paginarVenta=7;//se va paginar de 5 en 5
$paginas=$cantidadProductos/$paginarVenta ;//se divide 
$paginas=ceil($paginas);//se redondea el resiltado de la division
$contador=$_SESSION["numerodepagina"];//obtien el numero de pagina 
$iniciar=($contador-1)*$paginarVenta;
$contadorpagina=$_SESSION["numerodepagina"];
$resultado=$objVenta->mostarListaMenu($criteriobusqueda,$valor,$fechaActual);//se ejecuta la consulta

if(isset($_POST["valor"])){
    //print_r($resultado);
        if($resultado->num_rows>0){  
    
        ?>
        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    
                    <th>Nro</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th>Fecha</th>    
                    <th>Estado</th>                
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                
                    $c=1;
                    while($fila=mysqli_fetch_object($resultado)){
                            $datos= $fila->idProducto."||".
                            $fila->idMenu."||".
                            $fila->producto."||".
                            $fila->precio."||".
                            $fila->fecha."||".
                            $fila->precio."||".
                            $fila->categoria."||".
                            $fila->foto."||".
                            $fila->estado;

                    
                ?>
                    
                <tr>
                    
                    <td><?php echo  $c;?></td>
                    <td> <img src="<?php echo $fila->foto;?>" alt="" width="70px"></td>
                    <td><?php echo  $fila->producto; ?></td>
                    <td><?php echo  $fila->categoria?></td>
                    <td><?php echo  $fila->precio?></td>
                    
                    <td><?php echo  $fila->fecha?></td>
                    
                    
                    <?php
                    if($fila->estado=="Activo"){
                        ?>
                                <td><span class="badge badge-success"> <?php echo  $fila->estado?>  </span></td>
                        <?php
                    }else{
                        ?>
                                    <td><span class="badge badge-danger"> <?php echo  $fila->estado?>  </span></td>
                        <?php
                    }
                    ?>
                    <td>
                    
                    <?php
                            if($fila->estado=='Activo'){
                            ?>
                            <!-- boton de desactivar -->
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarRol" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`desactivar`);" >
                            <i class="icon-minus"></i> 
                            </button>&nbsp;
                            <button type="button" class="btn btn-info btn-sm" onclick="cargarProductoParaLaVenta(`<?php echo $fila->idProducto?>`,`<?php echo $fila->producto?>`,`<?php echo $fila->precio?>`,`<?php echo $fila->categoria?>`);"><i class="icon-check"></i></button> 
                            <?php
                            }else{
                                ?>
                                <!-- boton de activar -->
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarRol" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`activar`);" >
                            <i class="icon-minus"></i>
                            </button>&nbsp;
                            <button type="button" class="btn btn-info btn-sm" disabled><i class="icon-check"></i></button> 
                                <?php   
                            }
                            ?>
                                  

                    </td>

                </tr>
                    
                    
                
            </tbody>
        <?php
        $c++;
        }
        ?>
    </table>

    <?php
    }//fin del if
    else{
        echo "<h1>No hay registro para su busqueda :( </h1>";
    }
}
else
{
    $sql2="SELECT producto.id as idProducto,menu.id as idMenu,producto.foto,producto.nombre as producto,producto.precio,menu.fecha,categoria.nombre as categoria,listamenu.estado
    from producto,menu,listamenu,categoria
    WHERE categoria.id=producto.idcategoria and producto.id=listamenu.idProducto and menu.id=listamenu.idMenu 
    AND menu.fecha='$fechaActual'
    limit $iniciar,$paginarVenta";

    $resultado2=$objconexion->ejecutar($sql2);

?>
<table class="table table-bordered table-striped table-sm">
<thead>
                <tr>
                    
                    <th>Nro</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Precio</th>
                    <th>Fecha</th>   
                    <th>Estado</th>                 
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                
                    $c=1;
                    while($fila=mysqli_fetch_object($resultado2)){
                            $datos= $fila->idProducto."||".
                            $fila->idMenu."||".
                            $fila->producto."||".
                            $fila->precio."||".
                            $fila->fecha."||".
                            $fila->categoria."||".
                            $fila->foto."||".
                            $fila->estado;

                    
                ?>
                    
                <tr>
                    
                    <td><?php echo  $c;?></td>
                    <td> <img src="<?php echo $fila->foto;?>" alt="" width="70px"></td>
                    <td><?php echo  $fila->producto; ?></td>
                    <td><?php echo  $fila->categoria?></td>
                    <td><?php echo  $fila->precio?></td>
                    
                    <td><?php echo  $fila->fecha?></td>
                    <?php
                    if($fila->estado=="Activo"){
                        ?>
                                <td><span class="badge badge-success"> <?php echo  $fila->estado?>  </span></td>
                        <?php
                    }else{
                        ?>
                                    <td><span class="badge badge-danger"> <?php echo  $fila->estado?>  </span></td>
                        <?php
                    }
                    ?>
                    <td>
                        
                    
                    <?php
                            if($fila->estado=='Activo'){
                            ?>
                            <!-- boton de desactivar -->
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarRol" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`desactivar`);" >
                            <i class="icon-minus"></i> 
                            </button>&nbsp;

                            <button type="button" class="btn btn-info btn-sm" onclick="cargarProductoParaLaVenta(`<?php echo $fila->idProducto?>`,`<?php echo $fila->producto?>`,`<?php echo $fila->precio?>`,`<?php echo $fila->categoria?>`);"><i class="icon-check"></i></button> 
                            <?php
                            }else{
                                ?>
                                <!-- boton de activar -->
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarRol" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`activar`);" >
                            <i class="icon-minus"></i>
                            </button>&nbsp;
                            <button type="button" class="btn btn-info btn-sm" disabled ><i class="icon-check"></i></button> 
                                <?php   
                            }
                            ?>       
                              
                    

                    </td>

                </tr>
                    
                    
                
            </tbody>
        <?php
        $c++;
        }
        ?>
</table>
    <nav>
        <ul class="pagination">
            <li class="page-item
                <?php echo $contadorpagina<=1? 'disabled' : '' //preguntamos si la pagina actual es mayor o igual que el resultado del total de pagina  ?>"
            > <a class="page-link" onclick="numerodepagina(<?php echo $contadorpagina-1; ?>)">Anterior</a>
            </li>
            <?php
            for ($i=0; $i <$paginas ; $i++) { 
                # code...
            
            ?>
            <li class="page-item <?php echo $contadorpagina==$i+1 ? 'active' : ''?>">
                <a class="page-link"  onclick="numerodepagina(<?php echo $i+1; ?>)"> <?php echo $i+1; ?> </a>
            </li>
            <?php
            }
            ?>
            <li class="page-item
                <?php $contadorpagina>=$paginas? 'disabled' : '' //preguntamos si la pagina actual es mayor o igual que el resultado del total de pagina  ?> 
            "><a class="page-link" onclick="numerodepagina(<?php echo $contadorpagina+1; ?>)">Siguiente</a></li>
        </ul>
    </nav>

<?php
}
?>

