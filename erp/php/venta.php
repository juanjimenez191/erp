<?php 

require_once("conexion.php");
class venta extends conexion{
public 	function alta($fecha,$IDCliente,$Total,$tipo_pago){
$this->sentencia = "INSERT INTO venta VALUES (null,'$fecha','$IDCliente','$Total','$tipo_pago')";
$this->ejecutarSentencia();
}
	
public function consulta(){
$this->sentencia = "SELECT * FROM venta";
return $this->obtenerSentencia();
}

public function eliminar($id){
		$this->sentencia = "DELETE FROM venta WHERE IDVenta=$id";
		$this->ejecutarSentencia();
}
?>	