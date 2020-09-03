
<?php
session_start();
include_once("../../Models/conexion.php");
include_once("../../Models/usuario.php");

$objUsuario=new usuario();
$objconexion=new conexion();

$criteriobusqueda="nombre"; //obtenemos el cirterio de busqueda ya sea por por nombre

$valor=$_POST["valor"];//obtiene el valor al escribir en el campo del buscador

/*paginacion con ajax*/
$contidaddecliente=$objUsuario->contarusuario();
$paginarUsuario=7;//se va paginar de 5 en 5
$paginas=$contidaddecliente/$paginarUsuario ;//se divide 
$paginas=ceil($paginas);//se redondea el resiltado de la division
$contador=$_SESSION["numerodepagina"];//obtien el numero de pagina 
$iniciar=($contador-1)*$paginarUsuario;
$contadorpagina=$_SESSION["numerodepagina"];
$resultado=$objUsuario->mostrarbuscar($criteriobusqueda,$valor);//se ejecuta la consulta

if(isset($_POST["valor"])){
    //print_r($resultado);
        if($resultado->num_rows>0){  
    
        ?>
        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    
                    <th>Nro</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Login</th>
                    <th>Password</th>
                    <th>Tipo</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                
                    $c=1;
                    while($fila=mysqli_fetch_object($resultado)){
                            $datos= $fila->id."||".
                            $fila->nombre."||".
                            $fila->apellidos."||".
                            $fila->login."||".
                            $fila->password."||".
                            $fila->tipo."||".
                            $fila->idTipo."||".
                            $fila->estado;

                    
                ?>
                    
                <tr>
                    
                    <td><?php echo  $c;?></td>
                    <td><?php echo  $fila->nombre?></td>
                    <td><?php echo  $fila->apellidos?></td>
                    <td><?php echo  $fila->login?></td>
                    <td><?php echo  $fila->password?></td>
                    <td><?php echo $fila->tipo?></td>
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
                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizarUsuario" onclick="cargarDatosModalModificar('<?php echo $datos?>');">
                            <i class="icon-pencil"></i>
                            </button>&nbsp;
                            <!-- boton de elimiar -->
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarProductos" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`eliminar`)">
                            <i class="fa fa-remove"></i>
                            </button>&nbsp;
                            <?php
                            if($fila->estado=='Activo'){
                            ?>
                            <!-- boton de desactivar -->
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarProductos" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`desactivar`);" >
                            <i class="icon-minus"></i> 
                            </button>&nbsp;
                            <?php
                            }else{
                                ?>
                                <!-- boton de activar -->
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarProductos" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`activar`);" >
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
    $sql2="select usuario.id, concat_ws ('',tipo.nombre)as tipo,usuario.nombre,usuario.apellidos,usuario.login,usuario.password,usuario.estado,usuario.idTipo 
    from usuario,tipo 
    where usuario.idTipo=tipo.id 
    LIMIT $iniciar,$paginarUsuario";
    $resultado2=$objconexion->ejecutar($sql2);

?>
<table class="table table-bordered table-striped table-sm">
    <thead>
        <tr>
            
            <th>Nro</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Login</th>
            <th>Password</th>
            <th>Tipo</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        
            $c1=1;
            while($fila=mysqli_fetch_object($resultado2)){
                $datos= $fila->id."||".
                $fila->nombre."||".
                $fila->apellidos."||".
                $fila->login."||".
                $fila->password."||".
                $fila->tipo."||".
                $fila->idTipo."||".
                $fila->estado;

            
        ?>
                                        
        <tr>
            
            <td><?php echo  $c1;?></td>
            <td><?php echo  $fila->nombre;?></td>
            <td><?php echo  $fila->apellidos?></td>
            <td><?php echo  $fila->login?></td>
            <td><?php echo  $fila->password?></td>
            <td><?php echo $fila->tipo;?></td>
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
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizarUsuario" onclick="cargarDatosModalModificar('<?php echo $datos?>')">
                    <i class="icon-pencil"></i>
                    </button> &nbsp;
                    <!-- boton de elimiar -->
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarProductos" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`eliminar`)">
                    <i class="fa fa-remove"></i>
                    </button>&nbsp;
                    <?php
                    if($fila->estado=='Activo'){
                    ?>
                    <!-- boton de desactivar -->
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarProductos" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`desactivar`);" >
                    <i class="icon-minus"></i> 
                    </button>&nbsp;
                    <?php
                    }else{
                        ?>
                        <!-- boton de activar -->
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarProductos" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`activar`);" >
                    <i class="icon-check"></i>
                    </button>
                    <?php   
                    }
                    ?>
                    

                </td>
                                            
        </tr>
    </tbody>
    <?php
    $c1++;
    } //fin del while
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

