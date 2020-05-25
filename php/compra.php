<?php 

require_once("conexion.php");
class compra extends conexion{
public 	function alta($fecha,$total,$tipo_pago,$id_cliente){
$this->sentencia = "INSERT INTO compra VALUES (null,'$fecha','$total','$tipo_pago','$id_cliente')";
$this->ejecutarSentencia();
}
	
public function consulta(){
$this->sentencia = "SELECT * FROM compra";
return $this->obtenerSentencia();
}
}
?>	