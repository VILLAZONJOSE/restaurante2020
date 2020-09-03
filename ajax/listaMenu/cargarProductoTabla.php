<?php
session_start();
include_once("../../Models/producto.php");
$objProducto= new producto();
$nombreProducto=$objProducto->obtenerNombreProducto($_POST["valor"]);
$precioProducto=$objProducto->obtenerPrecio($_POST["valor"]);
$repetido=false;
if(empty($_SESSION["listaMenu"]))
{
    
    $_SESSION["listaMenu"]=array(array("id"=>$_POST["valor"],"producto"=>$nombreProducto,"precioProducto"=>$precioProducto));

}
else
{
    foreach ($_SESSION["listaMenu"] as $copia) 
    {
        # code...
        if($copia["id"]==$_POST["valor"])
        {
            $repetido=true;
            break;
        }
    }
    if($repetido)
    {
        echo "<script>
                    alertify.error('Producto repetido');
                    </script>";
    }
    else
    {
        array_push($_SESSION["listaMenu"],array("id"=>$_POST["valor"],"producto"=>$nombreProducto,"precioProducto"=>$precioProducto));
    }
}


?>