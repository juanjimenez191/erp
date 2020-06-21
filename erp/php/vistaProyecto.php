<?php 
	require_once("proyecto.php");
	$obj = new proyecto();
 ?>

	<form action="" method="post">
		nombre_pro: <input type="text" name="nombre_pro"> <br>
		tipo_pro: <input type="text" name="tipo_pro"> <br>
		IDempleado: <input type="text" name="IDempleado"> <br>
		fecha_in: <input type="date" name="fecha_in"> <br>
		fecha_fin: <input type="date" name="fecha_fin"> <br>
		descripcion: <input type="text" name="descripcion"> <br>

		<input type="submit" value="Agregar proyecto" name="alta">
		<br>
		<?php 
		if(isset($_GET["e"])){
			echo "<h2>proyecto eliminada</h2>";
		}
		if(isset($_GET["i"])){
			echo "<h2>proyecto agregada</h2>";
		}

		 ?>
		
	</form>
	<?php 
		if(isset($_POST["alta"])){
			$nombre_pro = $_POST["nombre_pro"];
			$tipo_pro = $_POST["tipo_pro"];
			$IDempleado = $_POST["IDempleado"];
			$fecha_in = $_POST["fecha_in"];
			$fecha_fin = $_POST["fecha_fin"];
			$descripcion = $_POST["descripcion"];

			
			$obj->alta($nombre_pro,$tipo_pro,$IDempleado,$fecha_in,$fecha_fin,$descripcion);
			header("Location: ?sec=proy&i=1 ");
			
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>nombre_pro</th>
			<th>tipo_pro</th>
			<th>IDempleado</th>
			<th>fecha_in</th>
			<th>fecha_fin</th>
			<th>descripcion</th>
			<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["nombre_pro"]."</td>";
				echo "<td>".$fila["tipo_pro"]."</td>";
				echo "<td>".$fila["IDempleado"]."</td>";
				echo "<td>".$fila["fecha_in"]."</td>";
				echo "<td>".$fila["fecha_fin"]."</td>";
				echo "<td>".$fila["descripcion"]."</td>";
				
				?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDproyecto']; ?>" name="id">
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
			header("Location: ?sec=proy&e=1");
		}

	 ?>
</section>