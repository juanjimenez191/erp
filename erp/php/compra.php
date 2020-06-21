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

	public function nombres(){
		$this->sentencia = "SELECT tipo_pago FROM compra;";
		$res = $this->obtenerSentencia();
		$nombres = "";
		while($fila = $res->fetch_assoc()){
			$nombres = $nombres."'".$fila["tipo_pago"]."',";
		}
		return $nombres;
	}

	public function cantidades(){
		$this->sentencia = "SELECT IDcompra FROM compra;";
		$res = $this->obtenerSentencia();
		$cantidades = "";
		while($fila = $res->fetch_assoc()){
			$cantidades = $cantidades.$fila["IDcompra"].",";
		}
		return $cantidades;
	}


public function eliminar($id){
$this->sentencia = "DELETE FROM compra WHERE IDcompra=$id";
$this->ejecutarSentencia();
	}
}
?>	