<?php
class ventaControler
{
    static public function CancelarVenta()
    {
        if(isset($_POST["btnCancelarVenta"]))
        {
            $_SESSION["DatosCarritoVenta"]="";
        
        }
        
        
    }
}
?>