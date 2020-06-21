<?php 
	require_once("remplazo.php");
	$obj = new remplazo();
 ?>

	<form action="" method="post">
		IDmobiliario: <input type="text" name="IDmobiliario"> <br>
		fecha: <input type="date" name="fecha"> <br>
		costo: <input type="text" name="costo"> <br>
		descripcion: <input type="text" name="descripcion"> <br>
		
		<input type="submit" value="Agregar remplazo" name="alta">
		<br>
		<?php 
		if(isset($_GET["e"])){
			echo "<h2>remplazo eliminada</h2>";
		}
		if(isset($_GET["i"])){
			echo "<h2>remplazo agregada</h2>";
		}

		 ?>
		
	</form>
	<?php 
		if(isset($_POST["alta"])){
			$IDmobiliario = $_POST["IDmobiliario"];
			$fecha = $_POST["fecha"];
			$costo = $_POST["costo"];
			$descripcion = $_POST["descripcion"];


			
			$obj->alta($IDmobiliario,$fecha,$costo,$descripcion);
			header("Location: ?sec=rem&i=1 ");
			
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>IDmobiliario</th>
			<th>fecha</th>
			<th>costo</th>
			<th>descripcion</th>
			<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["IDmobiliario"]."</td>";
				echo "<td>".$fila["fecha"]."</td>";
				echo "<td>".$fila["costo"]."</td>";
				echo "<td>".$fila["descripcion"]."</td>";
				
				
				?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDremplazo']; ?>" name="id">
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
			header("Location: ?rem=act&e=1");
		}

	 ?>
</section>