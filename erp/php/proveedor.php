<?php 

require_once("conexion.php");
class proveedor extends conexion{
public 	function alta($nombre,$telefono,$direccion,$correo,$rfc){
$this->sentencia = "INSERT INTO proveedor VALUES (null,'$nombre','$telefono','$direccion','$correo','$rfc')";
$this->ejecutarSentencia();
}
	
public function consulta(){
$this->sentencia = "SELECT * FROM proveedor";
return $this->obtenerSentencia();
}

public function eliminar($id){
		$this->sentencia = "DELETE FROM proveedor WHERE IDproveedor=$id";
		$this->ejecutarSentencia();
}
?>	