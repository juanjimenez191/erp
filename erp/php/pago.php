<?php 

require_once("conexion.php");
class pago extends conexion{
public 	function alta($IDempleado,$sal,$fecha_dep,$met_pag,$des){
$this->sentencia = "INSERT INTO pago VALUES (null,'$IDempleado','$sal','$fecha_dep','$met_pag','$des')";
$this->ejecutarSentencia();
}
	
public function consulta(){
$this->sentencia = "SELECT * FROM pago";
return $this->obtenerSentencia();
}

public function eliminar($id){
		$this->sentencia = "DELETE FROM pago WHERE IDpago=$id";
		$this->ejecutarSentencia();
}
}
?>	