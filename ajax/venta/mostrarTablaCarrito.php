<?php
session_start();

?>

<table class="table table-bordered">
    <tr>
        <td>Nro</td>
        <td>Producto</td>
        <td>Categoria</td>
        <td>Cantidad</td>
        <td>Precio</td>
        <td>Subtotal</td>

        <td>Quitar</td>
    </tr>
    <?php 
        $contador=0;
            foreach($_SESSION["DatosCarritoVenta"] as $copia) 
            {
                $contador++;
        ?>
    <tr>
        
        <td class="contador" data-id=<?php echo $contador;?>><?php echo $contador;?></td>
        <td> <?php echo $copia["producto"] ?></td>
        <td> <?php echo $copia["categoria"]?></td>
        <td><input type="number" class="form-control" name="txtCantidadProducto" min="1" onkeydown="javascript: return event.keyCode === 8 || event.keyCode === 46 ? true : !isNaN(Number(event.key))" id="txtCantidadProducto" onchange="subtotal(event)" value="<?php echo $copia["cantidad"]?>"></td>
        <td class="precio" data-precio="<?php echo $copia["precio"]?>"> <?php echo $copia["precio"] ?></td>
        <?php
        $subtotal=$copia["precio"]*$copia["cantidad"];
        $total=$total+$subtotal;
        ?>
        <td class="subtotal"><?php echo $subtotal; ?></td>
        <td>
            <button class="bn btn-danger"><i class="fa fa-remove"></i></button>
        </td>
        
    </tr>
    <?php
            }
        ?>
        <tfoot style="background: 0 0; border-bottom: none; white-space: nowrap; text-align: right;
                padding: 10px 20px; font-size: 1.2em; border-top: 1px solid #aaa;" >
                <tr >
                    <td colspan="6" style="color: #3989c6; font-size: 1.4em;">TOTAL A CANCELAR</td>
                    <td style="color: #3989c6; font-size: 1.4em;" id="total" name="total"><?php echo $total; ?></td>
                </tr>
        </tfoot>
</table>

