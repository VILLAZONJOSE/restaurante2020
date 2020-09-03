<?php
class usuarioControler
{
    
    static function guardarUsuario()
    {
        if(isset($_POST["btnGuardarUsuario"]))
        {
            $usuario= new usuario();

            $nombre=$_POST["txtNombre"];
            $apellidos=$_POST["txtApellidos"];
            $login=$_POST["txtUsuario"];
            $password=$_POST["txtPassword"];
            $estado="Activo";
            $idTipo=$_POST["nuevoPerfil"];

            $usuario->setnombre($nombre);
            $usuario->setapellidos($apellidos);
            $usuario->setlogin($login);
            $usuario->setpassword($password);
            $usuario->setestado($estado);
            $usuario->setidTipo($_POST["nuevoPerfil"]);
            $datos=$nombre."||".$apellidos."||".$login."||".$password."||".$estado."||".$idTipo;
            print_r($datos);
            if($usuario->guardarusuario())
            {
                echo "<script>
                                alertify.success('Se inserto un nuevo registro');
                                </script>";
                                $bitacora=new bitacoraControler();
                $respuesta=$bitacora->guardarBitacora("Usuario","Se inserto un registro");
            }
            else
            {
                echo "<script>
                                swal({
                                    title:'ERROR',
                                    text:'Error del servidor',
                                    type:'error',
                                    confirmButtonText:'cerrar',
                                    
                                    allowOutsideClick:false,
                                }).then((result)=>{
                                    if(result.value){
                                        window.location='frmUsuario';
                                    };
                                    });
                                </script>";
            }
        }
    }

    static function eliminarUsuario()
    {
        if(isset($_POST["btnEliminar"]))
        {
                $usuario= new usuario();
                if($usuario->eliminarUsuario($_POST["txtId"]))
                {
                    echo "<script>
                                swal({
                                    title:'OK',
                                    text:'Se elimino un registro',
                                    type:'success',
                                    confirmButtonText:'cerrar',
                                    
                                    allowOutsideClick:false,
                                }).then((result)=>{
                                    if(result.value){
                                        window.location='frmUsuario';
                                    };
                                    });
                                </script>";
                                $bitacora=new bitacoraControler();
                $respuesta=$bitacora->guardarBitacora("Usuario","Se elimino un registro");
                }
                else
                {
                    echo "<script>
                                swal({
                                    title:'ERROR',
                                    text:'No se puede eliminar este registro',
                                    type:'error',
                                    confirmButtonText:'cerrar',
                                    
                                    allowOutsideClick:false,
                                }).then((result)=>{
                                    if(result.value){
                                        window.location='frmUsuario';
                                    };
                                    });
                                </script>";
                }
        }
    }
    static public function activarUsuario()
    {
        if(isset($_POST["btnActivar"]))
        {
                $usuario= new usuario();
                if($usuario->activarUsuario($_POST["txtId"]))
                {
                    echo "<script>
                                swal({
                                    title:'OK',
                                    text:'Se activo un registro',
                                    type:'success',
                                    confirmButtonText:'cerrar',
                                    
                                    allowOutsideClick:false,
                                }).then((result)=>{
                                    if(result.value){
                                        window.location='frmUsuario';
                                    };
                                    });
                                </script>";
                                $bitacora=new bitacoraControler();
                $respuesta=$bitacora->guardarBitacora("Usuario","Se activo un registro");
                }
                else
                {
                    echo "<script>
                                swal({
                                    title:'ERROR',
                                    text:'Error del servidor',
                                    type:'error',
                                    confirmButtonText:'cerrar',
                                    
                                    allowOutsideClick:false,
                                }).then((result)=>{
                                    if(result.value){
                                        window.location='frmUsuario';
                                    };
                                    });
                                </script>";
                }
        }
    }
    static public function desactivarUsuario()
    {
        if(isset($_POST["btnDesactivar"]))
        {
                $usuario= new usuario();
                if($usuario->desactivarUsuario($_POST["txtId"]))
                {
                    echo "<script>
                                swal({
                                    title:'OK',
                                    text:'Se desactivo un registro',
                                    type:'success',
                                    confirmButtonText:'cerrar',
                                    
                                    allowOutsideClick:false,
                                }).then((result)=>{
                                    if(result.value){
                                        window.location='frmUsuario';
                                    };
                                    });
                                </script>";
                                $bitacora=new bitacoraControler();
                $respuesta=$bitacora->guardarBitacora("Usuario","Se desactivo un registro");
                }
                else
                {
                    echo "<script>
                                swal({
                                    title:'ERROR',
                                    text:'Error del servidor',
                                    type:'error',
                                    confirmButtonText:'cerrar',
                                    
                                    allowOutsideClick:false,
                                }).then((result)=>{
                                    if(result.value){
                                        window.location='frmUsuario';
                                    };
                                    });
                                </script>";
                }
        }
    }
    static function modificar()
    {
        if(isset($_POST["btnModificarUsuario"]))
        {
            $usuario=new usuario();

                $id=$_POST["idUsuarioActualizar"];
                $nombre=$_POST["txtNombreActualizar"];
                $apellidos=$_POST["txtApellidosActualizar"];
                $login=$_POST["txtUsuarioActualizar"];
                $password=$_POST["txtPasswordActualizar"];
                $estado="Activo";
                $idTipo=$_POST["nuevoPerfilActualizar"];
                // $datos=$id."||".
                // $nombre."||".
                // $apellidos."||".
                // $login."||".
                // $password."||".
                // $idTipo;
                // print_r($datos);

                $usuario->setnombre($nombre);
                $usuario->setapellidos($apellidos);
                $usuario->setlogin($login);
                $usuario->setpassword($password);
                $usuario->setlogin($login);
                $usuario->setidTipo($idTipo);
                if($usuario->modificarusuario($id))
                {
                    echo "<script>
                    swal({
                        title:'OK',
                        text:'Se actualizo el registro',
                        type:'success',
                        confirmButtonText:'cerrar',
                        
                        allowOutsideClick:false,
                    }).then((result)=>{
                        if(result.value){
                            window.location='frmUsuario';
                        };
                        });
                    </script>";
                    $bitacora=new bitacoraControler();
                $respuesta=$bitacora->guardarBitacora("Usuario","Se modifico un registro");
                }
                else
                {
                    echo "<script>
                    swal({
                        title:'ERROR',
                        text:'Error del servisor',
                        type:'error',
                        confirmButtonText:'cerrar',
                        
                        allowOutsideClick:false,
                    }).then((result)=>{
                        if(result.value){
                            window.location='frmUsuario';
                        };
                        });
                    </script>";

                }
        }
    }
    static function mostrarusuarios()
    {
        $usuario= new usuario();
        $resultado=$usuario->mostrar();
        return $resultado;
    }
    
}
