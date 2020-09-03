<?php
/**
 * 
 
 */
include_once("conexion.php");
class producto extends conexion
{
	private $id;
	private $nombre;
	private $descripcion;
	private $foto;
	private $precio;
	private $estado;
	private $idCategoria;
	public function producto()
	{
		parent::conexion();
		$this->id=0;
		$this->nombre="";
		$this->descripcion="";
		$this->foto="";		
        $this->precio="";
        $this->estado="";
        $this->idCategoria=0;
	}
	
	public function setId($valor)
	{$this->id=$valor;
	}
   
     public function setNombre($valor)
     {$this->nombre=$valor;
     }
     public function setDescripcion($valor){
     	$this->descripcion=$valor;
     }
     public function setFoto($valor){
     	$this->foto=$valor;
	 }
	 public function setPrecio($valor){
		$this->precio=$valor;
	}
	
	 public function setIdCategoria($valor){
		$this->idCategoria=$valor;
	 }
     public function setEstado($valor)
     {$this->estado=$valor;

     }
	public function mostrar(){
		$sql="select*from producto";
		return parent::ejecutar($sql);
    }
   
	public function guardarProducto(){
		$sql="insert into producto (nombre,descripcion,foto,precio,estado,idCategoria) 
		values('$this->nombre','$this->descripcion','$this->foto','$this->precio','Activo',$this->idCategoria)";
		if(parent::ejecutar($sql)){
			return true;

		}
		else{
			return false;
		}
	}
	public function modificarProducto($id){
		$sql="update producto SET nombre = '$this->nombre',descripcion='$this->descripcion',foto='$this->foto',precio='$this->precio',idCategoria=$this->idCategoria WHERE producto.id = '$id'";
		if(parent::ejecutar($sql))
		{
			return true;
		}
		else
		{
			return false;
		}
		
    } 
    

    /**categoria minus */
	public function mostrarBuscar($criterio_busqueda,$valor){
		$sql="select producto.id,producto.nombre,descripcion,precio,producto.estado,(categoria.nombre) as categoria, (categoria.id) as idCategoria,foto
		
		from producto,categoria 
		where categoria.id=producto.idCategoria and producto.$criterio_busqueda like '%$valor%'";//esta conulta busca depende del valor que tiene cada opcion del select 
		return parent::ejecutar($sql);
	}
	
	
	public function desactivarProducto($id){
		$sql="update producto SET estado = 'Inactivo' WHERE producto.id = '$id'";
		if(parent::ejecutar($sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function activarProducto($id){
		$sql="update producto SET estado = 'Activo' WHERE producto.id = '$id'";
		if(parent::ejecutar($sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function contarProducto(){
		$sql="select count(id) as contar from producto ";
		$resultado=parent::ejecutar($sql);
		$ejecutar=mysqli_fetch_object($resultado);
		$imprimir=$ejecutar->contar;
		return $imprimir;

	}
	public function eliminarProducto($id){
		$sql="delete from producto WHERE producto.id = '$id'";
		if(parent::ejecutar($sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function obtenerNombreProducto($id)
	{
		$sql="select nombre from producto where producto.id=$id";
		$resultado=parent::ejecutar($sql);
		$ejecutar=mysqli_fetch_object($resultado);
		$imprimir=$ejecutar->nombre;
		return $imprimir;

	}
	public function obtenerPrecio($id)
	{
		$sql="select precio from producto where producto.id=$id";
		$resultado=parent::ejecutar($sql);
		$ejecutar=mysqli_fetch_object($resultado);
		$imprimir=$ejecutar->precio;
		return $imprimir;
	}
}

?>