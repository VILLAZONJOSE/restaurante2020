<?php
/**
 * 
 */
class conexion 
{
	private $servidor;
	private $usuario;
	private $password;
	private $bd;
	 public function conexion()
	{
		# code...
		$this->servidor='localhost';
		$this->usuario='root';
		$this->password='';
		$this->bd='nacho';
		//$this->bd='nuevoparqueo';
	}
	public function conectar(){
		$bd=mysqli_connect($this->servidor,$this->usuario,$this->password,$this->bd);
		if($bd){
			return $bd;
		}
		else{
			echo "error en la conexion";
		}
	}
	public function desconectar($bd){
		mysqli_close($bd);
	}
	public function ejecutar($sql){
		$bd=$this->conectar();
		$registro=mysqli_query($bd,$sql);
		$this->desconectar($bd);
		return $registro;
		//return $registro->fetch_all(MYSQLI_ASSOC);
		
	}
	public function ejecutar2($sql){
		$bd=$this->conectar();
		$registro=mysqli_query($bd,$sql);
		$this->desconectar($bd);
		//return $registro;
		return $registro->fetch_all(MYSQLI_ASSOC);
	}
	
	
}

?>