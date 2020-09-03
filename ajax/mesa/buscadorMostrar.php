<?php
session_start();
include_once("../../Models/conexion.php");
include_once("../../Models/mesa.php");

$objMesa=new mesa();
$objConexion=new conexion();

$criterioBus="descripcion"; //obtenemos el cirterio de busqueda ya sea por por nombre

$valor=$_POST["valor"];//obtiene el valor al escribir en el campo del buscador

/*paginacion con ajax*/
$cantidadMesa=$objMesa->contarMesa();
$paginarMesa=7;//se va paginar de 5 en 5
$paginas=$cantidadMesa/$paginarMesa ;//se divide 
$paginas=ceil($paginas);//se redondea el resiltado de la division
$contador=$_SESSION["numeroPagina"];//obtien el numero de pagina 
$iniciar=($contador-1)*$paginarMesa;
$contadorPagina=$_SESSION["numeroPagina"];
$resultado=$objMesa->mostrarBuscar($criterioBus,$valor);//se ejecuta la consulta

if(isset($_POST["valor"])){
    //print_r($resultado);
        if($resultado->num_rows>0){  
    
        ?>
        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    
                    <th>Nro</th>
                    <th>Descripcion</th>
                    <th>Capacidad</th>
                    <th>Ubicacion</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                
                    $c=1;
                    while($fila=mysqli_fetch_object($resultado)){
                            $datos= $fila->id."||".
                            $fila->descripcion."||".
                            $fila->capacidad."||".
                            $fila->ubicacion."||".                            
                            $fila->estado;                    
                ?>
                    
                <tr>                    
                    <td><?php echo  $c;?></td>
                    <td><?php echo  $fila->descripcion?></td>
                    <td><?php echo  $fila->capacidad?></td>
                    <td><?php echo  $fila->ubicacion?></td>
                    <?php
                    if($fila->estado=="Libre"){
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
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizar" onclick="modificarMesa('<?php echo $datos?>');">
                            <i class="icon-pencil"></i>
                            </button>
                            <?php
                            if($fila->estado=='Libre'){
                            ?>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarMesa" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`desactivar`);" >
                            <i class="icon-minus"></i>
                            </button>
                            <?php
                            }else{
                                ?>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarMesa" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`activar`);" >
                                <i class="icon-check"></i> 
                            </button>
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
    $sql2="select*from mesa limit $iniciar,$paginarMesa";
    $resultado2=$objConexion->ejecutar($sql2);
?>
<table class="table table-bordered table-striped table-sm">
    <thead>
        <tr>            
                     <th>Nro</th>
                    <th>descripcion</th>
                    <th>Capacidad</th>
                    <th>Ubicacion</th>
                    <th>Estado</th>
                    <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        
            $contador=1;
            while($fila=mysqli_fetch_object($resultado2)){
                    $datos= $fila->id."||".
                    $fila->descripcion."||".
                    $fila->capacidad."||".
                    $fila->ubicacion."||".
                    $fila->estado;            
        ?>                                        
        <tr>            
            <td><?php echo  $contador?></td>
            <td><?php echo  $fila->descripcion;?></td>
            <td><?php echo  $fila->capacidad;?></td>
            <td><?php echo  $fila->ubicacion;?></td>            
            <?php
            if($fila->estado=="Libre"){
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
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizar" onclick="modificarMesa('<?php echo $datos?>')">
                    <i class="icon-pencil"></i>
                    </button>
                    <?php
                    if($fila->estado=='Libre'){
                    ?>
                    <button type="button" class="btn btn-info btn-danger btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarMesa" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`desactivar`);" >
                    <i class="icon-minus"></i>
                    </button>
                    <?php
                    }else{
                        ?>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarMesa" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`activar`);" >
                        <i class="icon-check"></i> 
                    </button>
                        <?php   
                    }
                    ?>
                    

                </td>
                                            
        </tr>
    </tbody>
    <?php
    $contador++;
    } //fin del while
    ?>
</table>
    <nav>
        <ul class="pagination">
            <li class="page-item
                <?php echo $contadorPagina<=1? 'disabled' : '' //preguntamos si la pagina actual es mayor o igual que el resultado del total de pagina  ?>"
            > <a class="page-link" onclick="numeroPagina(<?php echo $contadorPagina-1; ?>)">Anterior</a>
            </li>
            <?php
            for ($i=0; $i <$paginas ; $i++) { 
                # code...
            
            ?>
            <li class="page-item <?php echo $contadorPagina==$i+1 ? 'active' : ''?>">
                <a class="page-link"  onclick="numeroPagina(<?php echo $i+1; ?>)"> <?php echo $i+1; ?> </a>
            </li>
            <?php
            }
            ?>
            <li class="page-item
                <?php $contadorPagina>=$paginas? 'disabled' : '' //preguntamos si la pagina actual es mayor o igual que el resultado del total de pagina  ?> 
            "><a class="page-link" onclick="numeroPagina(<?php echo $contadorPagina+1; ?>)">Siguiente</a></li>
        </ul>
    </nav>

<?php
}
?>

