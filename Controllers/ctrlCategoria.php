<?php
class categoriaControler
{
    static function guardarCategoria()
    {
        if(isset($_POST["btnGuardarCategoria"]))
        {
            $categoria=new categoria();
            $categoria->setnombre($_POST["txtNombreCategoria"]);
            
            if($categoria->guardarcategoria())
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
                                        window.location='frmCategoria';
                                    };
                                    });
                                </script>";
                                $bitacora=new bitacoraControler();
                                $respuesta=$bitacora->guardarBitacora("Categoria","Se inserto un registro");
                
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
                                        window.location='frmCategoria';
                                    };
                                    });
                                </script>";
            }
        }
    }

    static public function modificarCategoria()
    {
        if(isset($_POST["btnModificarCategoria"]))
        {
            $categoria=new categoria();
            $categoria->setnombre($_POST["txtNombreModificar"]);
            if($categoria->modificarcategorias($_POST["txtIdModificar"]))
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
                                        window.location='frmCategoria';
                                    };
                                    });
                                </script>";
                $bitacora=new bitacoraControler();
                $respuesta=$bitacora->guardarBitacora("Categoria","Se modifico un registro");
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
                                        window.location='frmCategoria';
                                    };
                                    });
                                </script>";
            }
        }
    }

    static public function activarCategoria()
    {
        if(isset($_POST["btnActivar"]))
        {
            $categoria=new categoria();
            if($categoria->activarCategoria($_POST["txtId"]))
            {
                echo "<script>
                                swal({
                                    title:'OK',
                                    text:'Se activo el registro',
                                    type:'success',
                                    confirmButtonText:'cerrar',
                                    
                                    allowOutsideClick:false,
                                }).then((result)=>{
                                    if(result.value){
                                        window.location='frmCategoria';
                                    };
                                    });
                             </script>";
                             $bitacora=new bitacoraControler();
                             $respuesta=$bitacora->guardarBitacora("Categoria","Se activo un registro");
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
                                        window.location='frmCategoria';
                                    };
                                    });
                                </script>";
            }
        }
    }

    static public function desactivarCategoria()
    {
        if(isset($_POST["btnDesactivar"]))
        {
            $categoria=new categoria();
            if($categoria->desactivarCategoria($_POST["txtId"]))
            {
                echo "<script>
                                swal({
                                    title:'OK',
                                    text:'Se desactivo el registro',
                                    type:'success',
                                    confirmButtonText:'cerrar',
                                    
                                    allowOutsideClick:false,
                                }).then((result)=>{
                                    if(result.value){
                                        window.location='frmCategoria';
                                    };
                                    });
                                </script>";
                                $bitacora=new bitacoraControler();
                $respuesta=$bitacora->guardarBitacora("Categoria","Se desactivo un registro");
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
                                        window.location='frmCategoria';
                                    };
                                    });
                                </script>";
            }
        }
    }
    static public function eliminarCategoria()
    {
        if(isset($_POST["btnEliminar"]))
        {
            $categoria=new categoria();
            if($categoria->eliminarCategoriafisico($_POST["txtId"]))
            {
                echo "<script>
                                swal({
                                    title:'OK',
                                    text:'Se elimino el registro',
                                    type:'success',
                                    confirmButtonText:'cerrar',
                                    
                                    allowOutsideClick:false,
                                }).then((result)=>{
                                    if(result.value){
                                        window.location='frmCategoria';
                                    };
                                    });
                                </script>";
                                $bitacora=new bitacoraControler();
                $respuesta=$bitacora->guardarBitacora("Categoria","Se elimino un registro");
            }
            else
            {
                echo "<script>
                                swal({
                                    title:'ERROR',
                                    text:'No se puede eliminar el registro, restrinccion de foreign key',
                                    type:'error',
                                    confirmButtonText:'cerrar',
                                    
                                    allowOutsideClick:false,
                                }).then((result)=>{
                                    if(result.value){
                                        window.location='frmCategoria';
                                    };
                                    });
                                </script>";
            }
        }
    }
}