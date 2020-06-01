<?php

require_once("php/bala.php");

$obj = new bala();
$obj->alta("2019-05-20","2020-05-25","138");
$res =$obj->bala();
while ($fila = $res->fetch_assoc()){
echo $fila["IDbalance"]."".$fila["fechainicio"]."".$fila["fechafin"]."".$fila["total"]."<br>";
}

?>