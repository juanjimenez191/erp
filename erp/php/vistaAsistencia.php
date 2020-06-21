<?php 
	require_once("asistencia.php");
	$obj = new Asistencia();
 ?>

	<form action="" method="post">
		fecha: <input type="date" name="fecha"> <br>
		IDempleado: <input type="text" name="IDempleado"> <br>
		hora: <input type="time" name="hora"> <br>
		
		
        <input type="submit" value="Agregar asistencia" name="alta">
		<br>
		<?php 
		if(isset($_GET["e"])){
			echo "<h2>asistencia eliminada</h2>";
		}
		if(isset($_GET["i"])){
			echo "<h2>asistencia agregada</h2>";
		}

		 ?>
		
	</form>
	<?php 
		if(isset($_POST["alta"])){
			$fecha = $_POST["fecha"];
			$IDempleado = $_POST["IDempleado"];
			$hora = $_POST["hora"];
			
			
			
			$obj->alta($fecha,$IDempleado,$hora);
			header("Location: ?sec=asi&i=1 ");
			
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Fecha</th>
			<th>IDempleado</th>
			<th>Hora</th>
			<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["fecha"]."</td>";
				echo "<td>".$fila["IDempleado"]."</td>";
				echo "<td>".$fila["hora"]."</td>";
				
			
				?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDasistencia']; ?>" name="id">
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
			header("Location: ?sec=asi&e=1");
		}

	 ?>
</section>