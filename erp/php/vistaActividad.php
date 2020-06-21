<?php 
	require_once("actividad.php");
	$obj = new Actividad();
 ?>

	<form action="" method="post">
		registro: <input type="text" name="registro"> <br>
		IDusuario: <input type="text" name="IDusuario"> <br>
		movimiento_act: <input type="text" name="movimiento_act"> <br>
		movimiento_tabla: <input type="text" name="movimiento_tabla"> <br>
		

		<input type="submit" value="Agregar actividad" name="alta">
		<br>
		<?php 
		if(isset($_GET["e"])){
			echo "<h2>actividad eliminada</h2>";
		}
		if(isset($_GET["i"])){
			echo "<h2>actividad agregada</h2>";
		}

		 ?>
		
	</form>
	<?php 
		if(isset($_POST["alta"])){
			$registro = $_POST["registro"];
			$IDusuario = $_POST["IDusuario"];
			$movimiento_act = $_POST["movimiento_act"];
			$movimiento_tabla = $_POST["movimiento_tabla"];
			
			
			$obj->alta($registro,$IDusuario,$movimiento_act,$movimiento_tabla);
			header("Location: ?sec=act&i=1 ");
			
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Registro</th>
			<th>IDusuario</th>
			<th>movimiento_act</th>
			<th>movimiento_tabla</th>
			<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["registro"]."</td>";
				echo "<td>".$fila["IDusuario"]."</td>";
				echo "<td>".$fila["movimiento_act"]."</td>";
				echo "<td>".$fila["movimiento_tabla"]."</td>";
				
				?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDactividad']; ?>" name="id">
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
			header("Location: ?sec=act&e=1");
		}

	 ?>
</section>