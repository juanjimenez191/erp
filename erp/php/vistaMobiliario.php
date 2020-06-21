<?php 
	require_once("mobiliario.php");
	$obj = new Mobiliario();
 ?>

 <section id="principal">
	<div>
		<a href="?sec=gmob"><input type="button" value="Generar Gráfica"></a>
	</div>


	<form action="" method="post">
		nombre: <input type="text" name="nombre"> <br>
		descripcion: <input type="text" name="descripcion"> <br>
		cantidad: <input type="text" name="cantidad"> <br>
		nic: <input type="text" name="nic"> <br>
		tipo: <input type="text" name="tipo"> <br>
		

		<input type="submit" value="Agregar mobiliario" name="alta">
		<br>
		<?php 
		if(isset($_GET["e"])){
			echo "<h2>mobiliario eliminada</h2>";
		}
		if(isset($_GET["i"])){
			echo "<h2>mobiliario agregada</h2>";
		}

		 ?>
		
	</form>
	<?php 
		if(isset($_POST["alta"])){
			$nombre = $_POST["nombre"];
			$descripcion = $_POST["descripcion"];
			$cantidad = $_POST["cantidad"];
			$nic = $_POST["nic"];
			$tipo = $_POST["tipo"];
			
			$obj->alta($nombre,$descripcion,$cantidad,$nic,$tipo);
			header("Location: ?sec=mob&i=1 ");
			
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>nombre</th>
			<th>descripcion</th>
			<th>cantidad</th>
			<th>nic</th>
			<th>tipo</th>
			<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["nombre"]."</td>";
				echo "<td>".$fila["descripcion"]."</td>";
				echo "<td>".$fila["cantidad"]."</td>";
				echo "<td>".$fila["nic"]."</td>";
				echo "<td>".$fila["tipo"]."</td>";
				
				?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDmobiliario']; ?>" name="id">
					<input type="submit" value="Eliminar" name="eliminar">
				</form>
				</td>
				<?php
				echo "</tr>";
			}
		 ?>
	</table>
	<?php 
		if(isset($_POST["eliminar"])){
			$id = $_POST["id"];
			$obj->eliminar($id);
			header("Location: ?sec=mob&e=1");
		}

	 ?>
</section>