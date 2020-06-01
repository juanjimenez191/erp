<?php 

require_once("conexion.php");
class producto extends conexion{
public 	function alta($nombre,$descripcion,$preciov,$precioc,$cantidad,$cantmin,$cantmax,$categoria){
$this->sentencia = "INSERT INTO producto VALUES (null,'$nombre','$descripcion','$preciov','$precioc','$cantidad'.'$cantmin','$cantmax','$categoria')";
$this->ejecutarSentencia();
}
	
public function consulta(){
$this->sentencia = "SELECT * FROM producto";
return $this->obtenerSentencia();
}

public function eliminar($id){
		$this->sentencia = "DELETE FROM producto WHERE IDproducto=$id";
		$this->ejecutarSentencia();
}
}
?>	