<?php
/**
 * 
 */
include_once("conexion.php");
class categoria extends conexion
{
	private $id;
	private $nombre;
	private $estado;
	
	public function categoria()
	{
		parent::conexion();
		$this->id=0;
		$this->nombre="";
		# code...
	}
     public function setnombre($valor)
     {$this->nombre=$valor;
     }

	
	public function mostrar(){
		$sql="select*from categoria";
		return parent::ejecutar($sql);
	}
	
	public function mostrarbuscar($criterio_busqueda,$valor){
		$sql="select *from categoria where  categoria.$criterio_busqueda like '%$valor%'"; //esta conulta busca depende del valor que tiene cada opcion del select 
		return parent::ejecutar($sql);
	}
	public function guardarcategoria(){
		$sql="insert into categoria (nombre,estado) values('$this->nombre','Activo')";
		if(parent::ejecutar($sql)){
			return true;

		}
		else{
			return false;
		}
		
	}
	public function modificarcategorias($id){
		$sql="update categoria SET nombre = '$this->nombre' WHERE categoria.id = '$id'";
		return parent::ejecutar($sql);
	} 
	public function desactivarCategoria($id){
		$sql="update categoria SET estado = 'Inactivo' WHERE categoria.id = '$id'";
		return parent::ejecutar($sql);
	}
	public function eliminarCategoriafisico($id){
		$sql="delete from categoria where categoria.id=$id";
		return parent::ejecutar($sql);
	}

	public function activarCategoria($id){
		$sql="update categoria SET estado = 'Activo' WHERE categoria.id = '$id'";
		return parent::ejecutar($sql);
	}
	public function contarcategoria(){
		$sql="select count(id) as contar from categoria ";
		$resultado=parent::ejecutar($sql);
		$ejecutar=mysqli_fetch_object($resultado);
		$imprimir=$ejecutar->contar;
		return $imprimir;

	}
}

?>