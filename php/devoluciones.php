<?php 

require_once("conexion.php");
class devoluciones extends conexion{
public 	function alta($fecha,$cantidad,$descripcion,$IDproducto){
$this->sentencia = "INSERT INTO devoluciones VALUES (null,'$fecha','$cantidad','$descripcion','$IDproducto')";
$this->ejecutarSentencia();
}
	
public function consulta(){
$this->sentencia = "SELECT * FROM devoluciones";
return $this->obtenerSentencia();
}
}
?>