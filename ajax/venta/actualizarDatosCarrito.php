<?php
session_start();
$contador=$_POST["id"]-1;
$cantidad=$_POST["valor"];
$total=0;
$_SESSION["DatosCarritoVenta"][$contador]["cantidad"]=$cantidad;
$array=$_SESSION["DatosCarritoVenta"];

for ($i=0; $i <count($array) ; $i++) { 
    # code...
    $subtotal=$array[$i]["precio"] * $array[$i]["cantidad"];
    $total=$total + $subtotal;
}
echo $total;