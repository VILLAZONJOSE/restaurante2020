
<?php
session_start();
include_once("../../Models/conexion.php");
include_once("../../Models/bitacora.php");

$objBitacora=new bitacora();
$objconexion=new conexion();

$criteriobusqueda="tabla"; //obtenemos el cirterio de busqueda ya sea por por nombre

$valor=$_POST["valor"];//obtiene el valor al escribir en el campo del buscador

/*paginacion con ajax*/
$cantidadBitacoras=$objBitacora->contarBitacora();
$paginarBitacora=7;//se va paginar de 5 en 5
$paginas=$cantidadBitacoras/$paginarBitacora ;//se divide 
$paginas=ceil($paginas);//se redondea el resiltado de la division
$contador=$_SESSION["numerodepagina"];//obtien el numero de pagina 
$iniciar=($contador-1)*$paginarBitacora;
$contadorpagina=$_SESSION["numerodepagina"];
$resultado=$objBitacora->mostrarbuscar($criteriobusqueda,$valor);//se ejecuta la consulta

if(isset($_POST["valor"])){
    //print_r($resultado);
        if($resultado->num_rows>0){  
    
        ?>
        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    
                    <th>Nro</th>
                    <th>Tabla</th>
                    <th>Transaccion</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Usuario</th>
                   
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                
                    $c=1;
                    while($fila=mysqli_fetch_object($resultado)){
                            
                            

                    
                ?>
                    
                <tr>
                    
                    <td><?php echo  $c;?></td>
                    <td><?php echo  $fila->tabla;?></td>
                    <td><?php echo $fila->transaccion;?></td>
                    <td><?php echo $fila->fecha;?></td>
                    <td><?php echo $fila->hora;?></td>
                    <td><?php echo $fila->Usuario?></td>
                   
                    <td>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalModificarRol" onclick="cargarDatosModalModificar(`<?php echo $datos?>`);">
                            <i class="icon-pencil"></i>
                            </button>
                            <!-- boton de elimiar -->
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarRol" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`eliminar`)">
                            <i class="fa fa-remove"></i>
                            </button>                        
                        
                           

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
    $sql2="select tabla,transaccion,fecha,hora,concat_ws('',usuario.nombre,' ',usuario.apellidos) as Usuario
    from bitacora ,usuario
    where usuario.id=bitacora.idUsusario
    limit $iniciar,$paginarBitacora";
    $resultado2=$objconexion->ejecutar($sql2);

?>
<table class="table table-bordered table-striped table-sm">
    <thead>
        <tr>
            
        <th>Nro</th>
                    <th>Tabla</th>
                    <th>Transaccion</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Usuario</th>
                   
                    <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        
            $contador=1;
            while($fila=mysqli_fetch_object($resultado2))
            {
                  
        ?>
                                        
                <tr>
                    
                <td><?php echo  $contador;?></td>
                    <td><?php echo  $fila->tabla;?></td>
                    <td><?php echo $fila->transaccion;?></td>
                    <td><?php echo $fila->fecha;?></td>
                    <td><?php echo $fila->hora;?></td>
                    <td><?php echo $fila->Usuario?></td>
                   
                    <td>
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalModificarRol" onclick="cargarDatosModalModificar(`<?php echo $datos?>`);">
                            <i class="icon-pencil"></i>
                            </button>
                            <!-- boton de elimiar -->
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarRol" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`eliminar`)">
                            <i class="fa fa-remove"></i>
                            </button>                        
                        
                           

                    </td>
                                                    
                </tr>
        <?php
        $contador++;
        } //fin del while
    ?>
    </tbody>
    
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

