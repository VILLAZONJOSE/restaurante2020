<?php
class clienteControler
{
    static public function guardarCliente()
    {
        if(isset($_POST["btnGuardarCliente"]))
        {
            $cliente= new cliente();
            $cliente->setNombres($_POST["txtNombre"]);
            $cliente->setApellidos($_POST["txtApellidos"]);
            $cliente->setLogin($_POST["txtLogin"]);
            $cliente->setPassword($_POST["txtPassword"]);
            $cliente->setEmpresa($_POST["txtempresa"]);
            $cliente->setTelefono($_POST["txtTelefono"]);
            $cliente->setDireccion($_POST["txtDireccion"]);
            $cliente->setEmail($_POST["txtEmail"]);
            $cliente->setEstado("Activo");
            if($cliente->guardarcliente())
            {
                echo "<script>
                    alertify.success('Se inserto un nuevo registro');
                    </script>";
            }
            else
            {
                echo "<script>
                alertify.error('Error del sistema');
                </script>";
            }
        }
    }
    static public function modficarCliente()
    {
        if(isset($_POST["btnModificarCliente"]))
        {
            $cliente= new cliente();
            $cliente->setNombres($_POST["txtNombreModificar"]);
            $cliente->setApellidos($_POST["txtApellidosModificar"]);
            $cliente->setLogin($_POST["txtLoginModificar"]);
            $cliente->setPassword($_POST["txtPasswordModificar"]);
            $cliente->setEmpresa($_POST["txtEmpresaModificar"]);
            $cliente->setTelefono($_POST["txtTelefonoModificar"]);
            $cliente->setDireccion($_POST["txtDireccionModificar"]);
            $cliente->setEmail($_POST["txtEmailModificar"]);
            
            if($cliente->modificarcliente($_POST["txtIdModificar"]))
            {
                echo "<script>
                    alertify.success('Se modifico un  registro');
                    </script>";
            }
            else
            {
                echo "<script>
                    alertify.error('Error del sistema');
                    </script>";
            }
        }
        
    }
    static public function activarCliente()
    {
        if(isset($_POST["btnActivar"]))
        {
            $cliente= new cliente();
            if($cliente->activarCliente($_POST["txtId"]))
            {
                echo "<script>
                alertify.success('Se modifico un  registro');
                </script>";
            }
            else
            {
                echo "<script>
                    alertify.error('Error del sistema');
                    </script>";
            }
        }
    }
    static public function desactivarCliente()
    {
        if(isset($_POST["btnDesactivar"]))
        {
            $cliente= new cliente();
            if($cliente->desactivarCliente($_POST["txtId"]))
            {
                echo "<script>
                alertify.success('Se modifico un  registro');
                </script>";
            }
            else
            {
                echo "<script>
                    alertify.error('Error del sistema');
                    </script>";
            }
        }
    }
    static public function eliminarCliente()
    {
        if(isset($_POST["btnEliminar"]))
        {
            $cliente= new cliente();
            if($cliente->eliminarCliente($_POST["txtId"]))
            {
                echo "<script>
                alertify.success('Se modifico un  registro');
                </script>";
            }
            else
            {
                echo "<script>
                    alertify.error('No se puede eliminar restrinccion de foreign key');
                    </script>";
            }
        }
    }
}