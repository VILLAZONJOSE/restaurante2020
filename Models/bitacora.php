<?php
/**
 * 
 */
include_once("conexion.php");
class bitacora extends conexion
{
	private $id;
	private $fecha;
	private $hora;
	private $tabla;
    private $transaccion;
    private $idUsuario;
	
	public function bitacora()
	{
		parent::conexion();
		$this->id=0;
        $this->fecha="";
        $this->hora="";
        $this->tabla="";
        $this->transaccion="";
        $this->idUsuario=0;
		# code...
	}
	public function setId($valor)
	{$this->id=$valor;
	}
     public function setFecha($valor)
     {$this->fecha=$valor;
     }

	 public function setHora($valor)
	 {$this->hora=$valor;		 
	 }
	 
	 public function setTabla($valor)
	 {
		 $this->tabla=$valor;
	 }
	 public function setTransaccion($valor)
	 {
		 $this->transaccion=$valor;
	 }
	 public function setIdUsuario($valor)
	 {
		 $this->idUsuario=$valor;
	 }


	

	public function mostrar(){
		$sql="select*from bitacora";
		return parent::ejecutar($sql);
	}
	
	public function mostrarBuscar($criterioBusqueda,$valor){
		$sql="select tabla,transaccion,fecha,hora,concat_ws('',usuario.nombre,' ',usuario.apellidos) as Usuario
		from bitacora ,usuario
		where usuario.id=bitacora.idUsusario and bitacora.$criterioBusqueda like '%$valor%'";//esta conulta busca depende del valor que tiene cada opcion del select 
		return parent::ejecutar($sql);
	}
	public function guardarBitacoras(){
		$sql="insert into bitacora (fecha,hora,tabla,transaccion,idUsusario) values('$this->fecha','$this->hora','$this->tabla','$this->transaccion','$this->idUsuario')";
		if(parent::ejecutar($sql)){
			return true;
		}
		else{
			return false;
		}
		
	}
	public function modificarBitacora($id){
		$sql="update bitacora SET tabla = '$this->tabla' WHERE bitacora.id = '$id'";
		return parent::ejecutar($sql);
	} 
	public function eliminarBitacora($id){
		//$sql="update bitacora SET tabla = 'inactivo' WHERE bitacora.id = '$id'";
		$sql = "DELETE FROM bitacora WHERE id=1";
		return parent::ejecutar($sql);
	}
	//public function activarbitacora($id){
	//	$sql="update bitacora SET tabla = 'activo' WHERE bitacora.id = '$id'";
	//	return parent::ejecutar($sql);
	//}
	public function contarBitacora(){
		$sql="select count(id) as contar from bitacora ";
		$resultado=parent::ejecutar($sql);
		$ejecutar=mysqli_fetch_object($resultado);
		$imprimir=$ejecutar->contar;
		return $imprimir;

	}
}

?>