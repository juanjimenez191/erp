<?php 
	require_once("mantenimiento.php");
	$obj = new Mantenimiento();
 ?>

	<form action="" method="post">
		fecha_man: <input type="date" name="fecha_man"> <br>
		area: <input type="text" name="area"> <br>
		IDmob: <input type="text" name="IDmob"> <br>
		costo_man: <input type="text" name="costo_man"> <br>
		IDempleado: <input type="text" name="IDempleado"> <br>
		
		<input type="submit" value="Agregar mantenimiento" name="alta">
		<br>
		<?php 
		if(isset($_GET["e"])){
			echo "<h2>mantenimiento eliminada</h2>";
		}
		if(isset($_GET["i"])){
			echo "<h2>mantenimiento agregada</h2>";
		}

		 ?>
		
	</form>
	<?php 
		if(isset($_POST["alta"])){
			$fecha_man = $_POST["fecha_man"];
			$area = $_POST["area"];
			$IDmob = $_POST["IDmob"];
			$costo_man = $_POST["costo_man"];
			$IDempleado = $_POST["IDempleado"];
			
			
			$obj->alta($fecha_man,$area,$IDmob,$costo_man,$IDempleado);
			header("Location: ?sec=man&i=1 ");
			
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>fecha_man</th>
			<th>area</th>
			<th>IDmob</th>
			<th>costo_man</th>
			<th>IDempleado</th>
			<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["fecha_man"]."</td>";
				echo "<td>".$fila["area"]."</td>";
				echo "<td>".$fila["IDmob"]."</td>";
				echo "<td>".$fila["costo_man"]."</td>";
				echo "<td>".$fila["IDempleado"]."</td>";
			
				
				?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDmantenimiento']; ?>" name="id">
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
			header("Location: ?sec=man&e=1");
		}

	 ?>
</section>