<?php
session_start();
$categoria=$_POST["categoria"];
$producto=$_POST["producto"];
$idProducto=$_POST["idProducto"];
$precio=$_POST["precio"];
if(empty($_SESSION["DatosCarritoVenta"]))
{
    $_SESSION["DatosCarritoVenta"]=array(array("idProducto"=>$idProducto,"producto"=>$producto,"precio"=>$precio,"categoria"=>$categoria,"cantidad"=>1));
}
else
{
    foreach ($_SESSION["DatosCarritoVenta"] as $copia) {
        # code...
        if($copia["idProducto"]==$idProducto)
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
        array_push($_SESSION["DatosCarritoVenta"],array("idProducto"=>$idProducto,"producto"=>$producto,"precio"=>$precio,"categoria"=>$categoria,"cantidad"=>1));
    }
}
?>