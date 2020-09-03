<?php
class mesaControler
{
    static function guardarMesa()
    {
        if(isset($_POST["btnGuardarMesa"]))
        {
            $mesa=new mesa();
            $mesa->setDescripcion($_POST["txtDescripcionMesa"]);
            $mesa->setCapacidad($_POST["txtCapacidadMesa"]);
            $mesa->setUbicacion($_POST["txtUbicacionMesa"]);
            
            
            if($mesa->guardarMesa())
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
                                        window.location='frmMesa';
                                    };
                                    });
                                </script>";
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
                                        window.location='frmMesa';
                                    };
                                    });
                                </script>";
            }
        }
    }

    static public function activarMesass()
    {
        $objMesa=new mesa();
        if(isset($_POST["btnActivar"]))
        {
            if($objMesa->activarMesa($_POST["txtId"]))
            {
                echo "<script>
                                alertify.success('Se activo un nuevo registro');
                                </script>";
                                $bitacora=new bitacoraControler();
                $respuesta=$bitacora->guardarBitacora("Mesa","Se activo registro");
            }
            else
            {
                echo "<script>
                                alertify.error('Error del servidor');
                                </script>";
                             
            }
        }
    }
    static public function desactivarMesass()
    {
        $objMesa=new mesa();
        if(isset($_POST["btnDesactivar"]))
        {
            if($objMesa->desactivarMesa($_POST["txtId"]))
            {
                echo "<script>
                                alertify.success('Se desactivo un registro');
                                </script>";
                                $bitacora=new bitacoraControler();
                $respuesta=$bitacora->guardarBitacora("Mesa","Se desactivo registro");
            }
            else
            {
                echo "<script>
                                alertify.error('Error del servidor');
                                </script>";
                              
            }
        }
    }
    






    
}