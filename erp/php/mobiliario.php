<?php 

require_once("conexion.php");
class mobiliario extends conexion{
public 	function alta($nombre,$descripcion,$cantidad,$nic,$tipo){
$this->sentencia = "INSERT INTO mobiliario VALUES (null,'$nombre','$descripcion','$cantidad','$nic','$tipo')";
$this->ejecutarSentencia();
}
	
public function consulta(){
$this->sentencia = "SELECT * FROM mobiliario";
return $this->obtenerSentencia();
}

public function eliminar($id){
		$this->sentencia = "DELETE FROM mobiliario WHERE IDmobiliario=$id";
		$this->ejecutarSentencia();
}
?>	