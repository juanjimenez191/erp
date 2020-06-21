<?php 

require_once("conexion.php");
class materiaprima extends conexion{
public 	function alta($Nombre,$Tipo,$Descripcion,$Precio,$Stock,$Existencias	){
$this->sentencia = "INSERT INTO materiaprima VALUES (null,'$Nombre','$Tipo','$Descripcion','$Precio','$Stock','$Existencias')";
$this->ejecutarSentencia();
}
	
public function consulta(){
$this->sentencia = "SELECT * FROM materiaprima";
return $this->obtenerSentencia();
}

public function nombres(){
		$this->sentencia = "SELECT nombre FROM materiaprima;";
		$res = $this->obtenerSentencia();
		$nombres = "";
		while($fila = $res->fetch_assoc()){
			$nombres = $nombres."'".$fila["nombre"]."',";
		}
		return $nombres;
	}

	public function cantidades(){
		$this->sentencia = "SELECT Precio FROM materiaprima;";
		$res = $this->obtenerSentencia();
		$cantidades = "";
		while($fila = $res->fetch_assoc()){
			$cantidades = $cantidades.$fila["Precio"].",";
		}
		return $cantidades;
	}

public function eliminar($id){
		$this->sentencia = "DELETE FROM materiaprima WHERE ID=$id";
		$this->ejecutarSentencia();
}
}
?>	