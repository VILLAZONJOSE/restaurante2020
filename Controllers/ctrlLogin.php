<?php
/**
 * 
 */

class loginControler 
{
	static public function controlarIngreso(){
		if(isset($_POST["btnenviar"])){
			$obj_usuario=new usuario();
			$login=$_POST["txtlogin"];
             $password=$_POST["txtpassword"];
			$resultado=$obj_usuario->controlarIngreso($login,$password);
				if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["txtlogin"]) &&
             preg_match('/^[a-zA-Z0-9]+$/', $_POST["txtpassword"]))
               { 
               	//entra si es que no existe caracteres especiales 
					$encriptar=crypt($_POST["txtpassword"],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
					
					if($resultado->num_rows>0){
						//entra si es que el usuario exite en bd
						if($filas=mysqli_fetch_object($resultado)){

				             $_SESSION['usuario']=$filas->nombre;
				             $_SESSION['id']=$filas->id;
                            $_SESSION['tipo']=$filas->idTipo; 
                             $_SESSION["iniciarSesion"]="ok";
                             echo "<script>
                             swal({
                                 title:'OK',
                                 text:'',
                                 type:'success',
                                 confirmButtonText:'cerrar',
                                 
                                 allowOutsideClick:false,
                             }).then((result)=>{
                                 if(result.value){
                                     window.location='frmInicio';
                                 };
                                 });
							 </script>";
							 $bitacora=new bitacoraControler();
                $respuesta=$bitacora->guardarBitacora("Login","Ingreso al sistema");
						}

					}
					else{
						echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
					}
					
					
				}
				else{
					echo '<br><div class="alert alert-danger">No se permiten caracteres especiales</div>';
				}

		}
	}
}

?>