<?php
//controlador

require_once("Controllers/controladorPlantilla.php");
require_once("Controllers/ctrlLogin.php");
require_once("Controllers/ctrlUsuario.php");
require_once("Controllers/ctrlCategoria.php");
require_once("Controllers/ctrlProducto.php");
require_once("Controllers/ctrlRol.php");
require_once("Controllers/ctrlBitacora.php");
require_once("Controllers/ctrlCliente.php");
require_once("Controllers/ctrlMesa.php");
require_once("Controllers/ctrlMenu.php");
require_once("Controllers/ctrlVenta.php");



//*/fin de los controlador


//modelos
require_once("Models/usuario.php");
require_once("Models/categoria.php");
require_once("Models/tipo.php");
require_once("Models/producto.php");
require_once("Models/bitacora.php");
require_once("Models/cliente.php");
require_once("Models/mesa.php");
require_once("Models/menu.php");
require_once("Models/detalleMenuProducto.php");
// fin de los modelos

$objPlantillaControler=new controladorPlantilla();
$objPlantillaControler->ctrPlantilla();