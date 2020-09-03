<?php
class rolController
{
    static public function guardarRol()
    {
        if(isset($_POST["btnGuardarRol"]))
        {
            $rol=new tipo();
            $rol->setNombreTipo($_POST["txtNombrerol"]);
            $rol->setEstadoTipo("Activo");
            if($rol->guardartipo())
            {
                echo "<script>
                                swal({
                                    title:'OK',
                                    text:'Se inserto un nuevo registro',
                                    type:'success',
                                    confirmButtonText:'cerrar',
                                    
                                    allowOutsideClick:false,
                                }).then((result)=>{
                                    if(result.value){
                                        window.location='frmRol';
                                    };
                                    });
                                </script>";
                                $bitacora=new bitacoraControler();
                $respuesta=$bitacora->guardarBitacora("Rol","Se inserto un registro");
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
                                        window.location='frmRol';
                                    };
                                    });
                                </script>";
            }
        }
    }

    static public function modificarRol()
    {
        if(isset($_POST["btnModificarRol"]))
        {
            $rol=new tipo();
        //     print_r($_POST["txtNombrerolModificar"]);
            $rol->setNombreTipo($_POST["txtNombrerolModificar"]);
            
            
            if($rol->modificartipo($_POST["txtIdMoficar"]))
            {
                echo "<script>
                                swal({
                                    title:'OK',
                                    text:'Se inserto un nuevo registro',
                                    type:'success',
                                    confirmButtonText:'cerrar',
                                    
                                    allowOutsideClick:false,
                                }).then((result)=>{
                                    if(result.value){
                                        window.location='frmRol';
                                    };
                                    });
                                </script>";
                                $bitacora=new bitacoraControler();
                $respuesta=$bitacora->guardarBitacora("Rol","Se modifico un registro");
                               
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
                                        window.location='frmRol';
                                    };
                                    });
                                </script>";
            }
        
                    
        }
    }
    static public function activarRol()
    {
        if(isset($_POST["btnActivar"]))
        {
            $rol= new tipo();
            if($rol->activarTipo($_POST["txtId"]))
            {
                echo "<script>
                                swal({
                                    title:'OK',
                                    text:'Se activo un  registro',
                                    type:'success',
                                    confirmButtonText:'cerrar',
                                    
                                    allowOutsideClick:false,
                                }).then((result)=>{
                                    if(result.value){
                                        window.location='frmRol';
                                    };
                                    });
                                </script>";
                                $bitacora=new bitacoraControler();
                $respuesta=$bitacora->guardarBitacora("Rol","Se activo un registro");
                               
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
                                        window.location='frmRol';
                                    };
                                    });
                                </script>";
            }
        }
    }
    static public function desactivarRol()
    {
        if(isset($_POST["btnDesactivar"]))
        {
            $rol= new tipo();
            if($rol->desactivarTipo($_POST["txtId"]))
            {
                echo "<script>
                                swal({
                                    title:'OK',
                                    text:'Se desactivo un  registro',
                                    type:'success',
                                    confirmButtonText:'cerrar',
                                    
                                    allowOutsideClick:false,
                                }).then((result)=>{
                                    if(result.value){
                                        window.location='frmRol';
                                    };
                                    });
                                </script>";
                                $bitacora=new bitacoraControler();
                                $respuesta=$bitacora->guardarBitacora("Rol","Se desactivo un registro");
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
                                        window.location='frmRol';
                                    };
                                    });
                                </script>";
            }
        }
    }
    static public function eliminarRol()
    {
            $rol= new tipo();
            if(isset($_POST["btnEliminar"]))
            {
                if($rol->eliminarTipo($_POST["txtId"]))
                {
                    echo "<script>
                                    swal({
                                        title:'OK',
                                        text:'Se elimino un  registro',
                                        type:'success',
                                        confirmButtonText:'cerrar',
                                        
                                        allowOutsideClick:false,
                                    }).then((result)=>{
                                        if(result.value){
                                            window.location='frmRol';
                                        };
                                        });
                                    </script>";
                                    $bitacora=new bitacoraControler();
                                    $respuesta=$bitacora->guardarBitacora("Rol","Se elimino un registro");
                }
                else
                {
                    echo "<script>
                                    swal({
                                        title:'ERROR',
                                        text:'No se puede eliminar el registro',
                                        type:'error',
                                        confirmButtonText:'cerrar',
                                        
                                        allowOutsideClick:false,
                                    }).then((result)=>{
                                        if(result.value){
                                            window.location='frmRol';
                                        };
                                        });
                                    </script>";
                }
            }
    }
}
?>