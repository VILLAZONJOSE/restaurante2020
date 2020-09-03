<?php
session_start();
error_reporting(E_ERROR);
?>
                                

<table class="table table-bordered">
    <tr>
        <td>#</td>
        <td>Producto</td>
        <td>Precio</td>
        <td>Quitar</td>
    </tr>
    <?php 
        $contador=0;
            foreach($_SESSION["listaMenu"] as $copia) 
            {
                $contador++;
        ?>
    <tr>
        
        <td><?php echo $contador;?></td>
        <td> <?php echo $copia["producto"] ?></td>
        <td> <?php echo $copia["precioProducto"] ?></td>
        <td>
            <button class="bn btn-danger"><i class="fa fa-remove"></i></button>
        </td>
        
    </tr>
    <?php
            }
        ?>
</table>