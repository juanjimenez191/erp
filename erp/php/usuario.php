<?php 

require_once("conexion.php");
class usuario extends conexion{
public 	function alta($nombre,$tipo,$password){
$this->sentencia = "INSERT INTO usuario VALUES (null,'$nombre','$tipo','$password')";
$this->ejecutarSentencia();
}
	
public function consulta(){
$this->sentencia = "SELECT * FROM usuario";
return $this->obtenerSentencia();
}
public function eliminar($id){
$this->sentencia = "DELETE FROM usuario WHERE IDusuario=$id";
$this->ejecutarSentencia();
}
}
?>	