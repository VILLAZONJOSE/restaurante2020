<?php
class productoControler
{
    
    static public function guardarProductos()
    {
        if(isset($_POST["btnGuardarProductos"]))
        {
            $nombreFoto=$_FILES["txtFoto"]["name"];
            
            $rutaParaLaFoto="Recursos/img/productos/$nombreFoto";
            
            $producto=new producto();
            $producto->setNombre($_POST["txtNombre"]);
            $producto->setDescripcion($_POST["txtCaracteristica"]);
            $fotoProducto=$_FILES["txtFoto"]["tmp_name"];
            move_uploaded_file($fotoProducto,$rutaParaLaFoto);
            $producto->setFoto($rutaParaLaFoto);
            $producto->setPrecio($_POST["txtPrecio"]);
            $producto->setIdCategoria($_POST["selectCategoria"]);
            $producto->setEstado("Activo");
            if($producto->guardarProducto())
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
                        window.location='frmProductos';
                    };
                    });
                </script>";
                
                $bitacora=new bitacoraControler();
                $respuesta=$bitacora->guardarBitacora("Producto","Se inserto un registro");
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
                                        window.location='frmProductos';
                                    };
                                    });
                                </script>";
            }
        }
    }
    static public function modificarProductos()
    {
        if(isset($_POST["btnModificarProductos"]))
        {   
            $producto=new producto();

            $producto->setNombre($_POST["txtNombreActualizar"]);

            $producto->setDescripcion($_POST["txtCaracteristicaActualizar"]);

            $fotoProducto=$_FILES["txtFotoActualizar"]["tmp_name"];          
            
            $producto->setPrecio($_POST["txtPrecioActualizar"]);

            $producto->setIdCategoria($_POST["selectCategoriaActualizar"]);

           
            
            
            if(!empty($fotoProducto))
            {       // si esque se cargo una nueva imagen para actualizar
                $nombreFoto=$_FILES["txtFotoActualizar"]["name"];
                $rutaParaLaFoto="Recursos/img/productos/$nombreFoto";
                move_uploaded_file($fotoProducto,$rutaParaLaFoto);
                $producto->setFoto($rutaParaLaFoto);
            
                
            }
            else
            { //no se actulizara la foto
                $ruta=($_POST["rutaFoto"]);
                $producto->setFoto($ruta);
                
                
            }
            if($producto->modificarProducto($_POST["txtidActualizar"]))
            {
                echo "<script>
                swal({
                    title:'OK',
                    text:'Se modifico un nuevo registro',
                    type:'success',
                    confirmButtonText:'cerrar',
                    
                    allowOutsideClick:false,
                }).then((result)=>{
                    if(result.value){
                        window.location='frmProductos';
                    };
                    });
                </script>";
                $bitacora=new bitacoraControler();
                $respuesta=$bitacora->guardarBitacora("Producto","Se modifico un registro");
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
                                        window.location='frmProductos';
                                    };
                                    });
                                </script>";
            }
        }
    }
    static public function activarProducto()
    {
        if(isset($_POST["btnActivar"]))
        {
            $producto=new producto();
        
            if($producto->activarProducto($_POST["txtId"]))
            {
                echo "<script>
                swal({
                    title:'OK',
                    text:'Se Activo un  registro',
                    type:'success',
                    confirmButtonText:'cerrar',
                    
                    allowOutsideClick:false,
                }).then((result)=>{
                    if(result.value){
                        window.location='frmProductos';
                    };
                    });
                </script>";
                $bitacora=new bitacoraControler();
                $respuesta=$bitacora->guardarBitacora("Producto","Se activo un registro");
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
                                        window.location='frmProductos';
                                    };
                                    });
                                </script>";
            }
        }
    }
    static public function desactivarProducto()
    {
        if(isset($_POST["btnDesactivar"]))
        {
            $producto=new producto();
            
            if($producto->desactivarProducto($_POST["txtId"]))
            {
                echo "<script>
                swal({
                    title:'OK',
                    text:'Se Desactivo un  registro',
                    type:'success',
                    confirmButtonText:'cerrar',
                    
                    allowOutsideClick:false,
                }).then((result)=>{
                    if(result.value){
                        window.location='frmProductos';
                    };
                    });
                </script>";
                $bitacora=new bitacoraControler();
                $respuesta=$bitacora->guardarBitacora("Producto","Se desactivo un registro");
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
                                        window.location='frmProductos';
                                    };
                                    });
                                </script>";
            }
        }
    }
    static public function eliminarProducto()
    {
        if(isset($_POST["btnEliminar"]))
        {
            $producto=new producto();
            if($producto->eliminarProducto($_POST["txtId"]))
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
                        window.location='frmProductos';
                    };
                    });
                </script>";
                $bitacora=new bitacoraControler();
                $respuesta=$bitacora->guardarBitacora("Producto","Se elimino un registro");
            }
            else
            {
                echo "<script>
                                swal({
                                    title:'ERROR',
                                    text:'No se puede eliminar el producto',
                                    type:'error',
                                    confirmButtonText:'cerrar',
                                    
                                    allowOutsideClick:false,
                                }).then((result)=>{
                                    if(result.value){
                                        window.location='frmProductos';
                                    };
                                    });
                                </script>";
            }
            
        }
    }
    
    
} 