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

public function nombres(){
		$this->sentencia = "SELECT nombre FROM mobiliario;";
		$res = $this->obtenerSentencia();
		$nombres = "";
		while($fila = $res->fetch_assoc()){
			$nombres = $nombres."'".$fila["nombre"]."',";
		}
		return $nombres;
	}

	public function cantidades(){
		$this->sentencia = "SELECT cantidad FROM mobiliario;";
		$res = $this->obtenerSentencia();
		$cantidades = "";
		while($fila = $res->fetch_assoc()){
			$cantidades = $cantidades.$fila["cantidad"].",";
		}
		return $cantidades;
	}

public function eliminar($id){
		$this->sentencia = "DELETE FROM mobiliario WHERE IDmobiliario=$id";
		$this->ejecutarSentencia();
}
}
?>	