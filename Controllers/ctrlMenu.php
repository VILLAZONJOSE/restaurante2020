<?php

class menuControler
{
    static function guardarMenu()
    {
        if(isset($_POST["btnGuardarMenu"]))
        {
            $menu=new menu();
            $menu->setFecha($_POST["txtFechaMenu"]);
            $menu->guardarMenu();
            $idMenu=$menu->obtenerUltimoIdMenu();
            for ($i=0; $i <count($_SESSION["listaMenu"]) ; $i++) { 
                # code...
                $detalleMenu=new detalleMenuProducto();
            
                $detalleMenu->setIdProducto($_SESSION["listaMenu"][$i]["id"]);
                $detalleMenu->setIdMenu($idMenu);
                $detalleMenu->setEstado("Activo");
                $detalleMenu->guardarDettalleMenu();

            }
            
            $_SESSION["listaMenu"]="";//limpiamos el array con los producto
            
            
        }
    }
    static public function mostrarProductos()
    {
        $producto= new producto(); // creamos un objeto de la clase producto
        $resultado=$producto->mostrar();// llamamos al metodo mostrar para que se cargue el select del modal listar menu
        return $resultado;
        
    }
}