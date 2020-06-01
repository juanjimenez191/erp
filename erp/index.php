<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>ERP</title>
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<nav>
		<ul>
			<a href="index.php"><li>Inicio</li></a>
			<a href="?sec=usu"><li>Usuario</li></a>
			<a href="?sec=ven"><li>Ventas</li></a>
			<a href="?sec=emp"><li>Empleados</li></a>
		</ul>
	</nav>
	<?php 

		if(isset($_GET["sec"])){
			$sec = $_GET["sec"];
			switch ($sec) {
				case 'usu':
					require_once("php/vistaUsuario.php");
					break;
			}
		}
	 ?>
</body>
</html>