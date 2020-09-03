<!-- cliente -->
<?php
session_start();
include_once("../../Models/conexion.php");
include_once("../../Models/cliente.php");

$objcliente=new cliente();
$objconexion=new conexion();

$criteriobusqueda="nombres"; //obtenemos el cirterio de busqueda ya sea por por nombre

$valor=$_POST["valor"];//obtiene el valor al escribir en el campo del buscador

/*paginacion con ajax*/
$contidaddecliente=$objcliente->contarcliente();
$paginarcliente=7;//se va paginar de 5 en 5
$paginas=$contidaddecliente/$paginarcliente ;//se divide 
$paginas=ceil($paginas);//se redondea el resiltado de la division
$contador=$_SESSION["numerodepagina"];//obtien el numero de pagina 
$iniciar=($contador-1)*$paginarcliente;
$contadorpagina=$_SESSION["numerodepagina"];
$resultado=$objcliente->mostrarbuscar($criteriobusqueda,$valor);//se ejecuta la consulta

if(isset($_POST["valor"])){
    //print_r($resultado);
        if($resultado->num_rows>0){  
    
        ?>
        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>Opciones</th>
                    <th>Nro</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Login</th>
                    <th>Password</th>
                    <th>Empresa</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Email</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                
            
                    while($fila=mysqli_fetch_object($resultado)){
                            $datos= $fila->id."||".
                            $fila->nombres."||".
                            $fila->apellidos."||".
                            $fila->login."||".
                            $fila->password."||".
                            $fila->empresa."||".
                            $fila->telefono."||".
                            $fila->direccion."||".
                            $fila->email."||".
                            $fila->estado;

                    
                ?>
                    
                <tr>
                    
                    <td><?php echo  $fila->id?></td>
                    <td><?php echo  $fila->nombres?></td>
                    <td><?php echo  $fila->apellidos?></td>
                    <td><?php echo  $fila->login?></td>
                    <td><?php echo  $fila->password?></td>
                    <td><?php echo  $fila->empresa?></td>
                    <td><?php echo  $fila->telefono?></td>
                    <td><?php echo  $fila->direccion?></td>
                    <td><?php echo  $fila->email?></td>
                    <?php
                    if($fila->estado=="activo"){
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
                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizar" onclick="CargarDatosModalModificarcliente('<?php echo $datos?>');">
                            <i class="icon-pencil"></i>
                            </button>&nbsp;
                            <!-- boton de elimiar -->
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarCliente" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`eliminar`)">
                            <i class="fa fa-remove"></i>
                            </button>&nbsp;
                            <?php
                            if($fila->estado=='Activo'){
                            ?>
                            <!-- boton de desactivar -->
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarCliente" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`desactivar`);" >
                            <i class="icon-minus"></i> 
                            </button>&nbsp;
                            <?php
                            }else{
                                ?>
                                <!-- boton de activar -->
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarCliente" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`activar`);" >
                            <i class="icon-check"></i>
                            </button>
                                <?php   
                            }
                            ?>
                            

                    </td>

                </tr>
                    
                    
                
            </tbody>
                                    <?php
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
    $sql2="select*from cliente limit $iniciar,$paginarcliente";
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
            <th>Empresa</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Email</th>
            <th>Estado</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        
    
            while($fila=mysqli_fetch_object($resultado2)){
                    $datos= $fila->id."||".
                    $fila->nombres."||".
                    $fila->apellidos."||".
                    $fila->login."||".
                    $fila->password."||".
                    $fila->empresa."||".
                    $fila->telefono."||".
                    $fila->direccion."||".
                    $fila->email."||".
                    $fila->estado;

            
        ?>
                                        
        <tr>
            
            <td><?php echo  $fila->id?></td>
            <td><?php echo  $fila->nombres?></td>
            <td><?php echo  $fila->apellidos?></td>
            <td><?php echo  $fila->login?></td>
            <td><?php echo  $fila->password?></td>
            <td><?php echo  $fila->empresa?></td>
            <td><?php echo  $fila->telefono?></td>
            <td><?php echo  $fila->direccion?></td>
            <td><?php echo  $fila->email?></td>
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
            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizar" onclick="CargarDatosModalModificarcliente('<?php echo $datos?>');">
                            <i class="icon-pencil"></i>
                            </button>&nbsp;
                            <!-- boton de elimiar -->
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarCliente" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`eliminar`)">
                            <i class="fa fa-remove"></i>
                            </button>&nbsp;
                            <?php
                            if($fila->estado=='Activo'){
                            ?>
                            <!-- boton de desactivar -->
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarCliente" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`desactivar`);" >
                            <i class="icon-minus"></i> 
                            </button>&nbsp;
                            <?php
                            }else{
                                ?>
                                <!-- boton de activar -->
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modalDesactivarActivarEliminarCliente" onclick="cargarDatoModalActivarEliminar(`<?php echo $datos?>`,`activar`);" >
                            <i class="icon-check"></i>
                            </button>
                                <?php   
                            }
                            ?>
                    

                </td>
                                            
        </tr>
    </tbody>
    <?php
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

