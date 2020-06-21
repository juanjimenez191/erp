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
			<a href="?sec=pro"><li>producto</li></a>
			<a href="?sec=act"><li>actividad</li></a>
			<a href="?sec=asi"><li>asisitencia</li></a>
			<a href="?sec=bal"><li>balance</li></a>
			<a href="?sec=cli"><li>cliente</li></a>
			<a href="?sec=com"><li>compra</li></a>
			<a href="?sec=det"><li>detalle_compra</li></a>
			<a href="?sec=dev"><li>devoluciones</li></a>
			<a href="?sec=emp"><li>empleado</li></a>
			<a href="?sec=eva"><li>evaluacion</li></a>
			<a href="?sec=ven"><li>venta</li></a>
			<a href="?sec=mat"><li>materiaprima</li></a>
			<a href="?sec=mob"><li>mobiliario</li></a>
            <a href="?sec=jor"><li>jornada</li></a>
            <a href="?sec=man"><li>mantenimiento</li></a>
            <a href="?sec=pag"><li>pago</li></a>
            <a href="?sec=ped"><li>pedido</li></a>
            <a href="?sec=prov"><li>proveedor</li></a>
            <a href="?sec=proy"><li>proyecto</li></a>
            <a href="?sec=rem"><li>Remplazo</li></a>
		</ul>
	</nav>
	<?php 

		if(isset($_GET["sec"])){
			$sec = $_GET["sec"];
			switch ($sec) {
				case 'usu':
					require_once("php/vistaUsuario.php");
					break;
				case 'pro':
					require_once("php/vistaProducto.php");
					break;
					case 'act':
					require_once("php/vistaActividad.php");
					break;
				case 'asi':
					require_once("php/vistaAsistencia.php");
					break;
				    case 'bal':
					require_once("php/vistaBalance.php");
					break;
				 case 'cli':
					require_once("php/vistaCliente.php");
					break;
					case 'com':
					require_once("php/vistaCompra.php");
					break;
				case 'det':
					require_once("php/vistaDetallecompra.php");
					break;	

				case 'dev':
					require_once("php/vistaDevoluciones.php");
					break;	

				case 'emp':
					require_once("php/vistaEmpleado.php");
					break;	

				case 'eva':
					require_once("php/vistaEvaluacion.php");
					break;	

					case 'ven':
					require_once("php/vistaVenta.php");
					break;

			    case 'mat':
					require_once("php/vistaMateria.php");
					break;
				
				case 'mob':
					require_once("php/vistaMobiliario.php");
					break;

				case 'jor':
					require_once("php/vistaJornada.php");
					break;

				case 'man':
					require_once("php/vistaMantenimiento.php");
					break;	

				case 'pag':
					require_once("php/vistaPago.php");
					break;

                case 'ped':
					require_once("php/vistaPedido.php");
					break;

				case 'prov':
					require_once("php/vistaProveedor.php");
					break;

				case 'proy':
					require_once("php/vistaProyecto.php");
					break;

				case 'rem':
					require_once("php/vistaRemplazo.php");
					break;





				
					
					
				case 'gpro':
					require_once("php/graficaProducto.php");
					break;	

				case 'gcom':
					require_once("php/graficaCompra.php");
					break;	

				case 'gven':
					require_once("php/graficaVenta.php");
					break;	

				case 'gmat':
					require_once("php/graficaMateria.php");
					break;	

				case 'gmob':
					require_once("php/graficaMobiliario.php");
					break;			


			}
		}
	 ?>
</body>
</html>