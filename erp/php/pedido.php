<?php 

require_once("conexion.php");
class pedido extends conexion{
public 	function alta($fecha,$IDcliente,$precio,$cantidad,$direccion,$IDproducto){
$this->sentencia = "INSERT INTO pedido VALUES (null,'$fecha','$IDcliente','$precio','$cantidad','$direccion'.'$IDproducto')";
$this->ejecutarSentencia();
}
	
public function consulta(){
$this->sentencia = "SELECT * FROM pedido";
return $this->obtenerSentencia();
}

public function eliminar($id){
		$this->sentencia = "DELETE FROM pedido WHERE IDpedido=$id";
		$this->ejecutarSentencia();
}
?>	