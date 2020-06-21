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

	public function nombres(){
		$this->sentencia = "SELECT IDVenta FROM venta;";
		$res = $this->obtenerSentencia();
		$nombres = "";
		while($fila = $res->fetch_assoc()){
			$nombres = $nombres."'".$fila["IDVenta"]."',";
		}
		return $nombres;
	}

	public function cantidades(){
		$this->sentencia = "SELECT Total FROM venta;";
		$res = $this->obtenerSentencia();
		$cantidades = "";
		while($fila = $res->fetch_assoc()){
			$cantidades = $cantidades.$fila["Total"].",";
		}
		return $cantidades;
	}

public function eliminar($id){
		$this->sentencia = "DELETE FROM venta WHERE IDVenta=$id";
		$this->ejecutarSentencia();
}
}
?>	