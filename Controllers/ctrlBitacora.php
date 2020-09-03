<?php
class bitacoraControler
{
    static public function guardarBitacora($tabla,$transaccion)
    {
        $id_Ub= strtotime('now').(substr((string)microtime(),2.6));
        ini_set('date.timezone','America/La_Paz'); 
        $fechaActual=date("Y/m/d");
        $bitacora=new bitacora();
        $bitacora->setFecha($fechaActual);
        $bitacora->setHora(date("g:i:s A"));
        $bitacora->setTabla($tabla);
        $bitacora->setTransaccion($transaccion);
        $bitacora->setIdUsuario($_SESSION["id"]);//idusuario
        if($bitacora->guardarBitacoras())
        {
            return "entro";
        }
        else
        {
            return "no entro";
        }
    }
}