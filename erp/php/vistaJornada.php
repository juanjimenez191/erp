<?php 
	require_once("jornada.php");
	$obj = new jornada();
 ?>

	<form action="" method="post">
		hrs_trabajadas: <input type="text" name="hrs_trabajadas"> <br>
		dias_trabajados: <input type="text" name="dias_trabajados"> <br>
		pago_hora: <input type="text" name="pago_hora"> <br>
		horas_extra: <input type="text" name="horas_extra"> <br>
		bonos: <input type="text" name="bonos"> <br>
		IDempleado: <input type="text" name="IDempleado"> <br>

		<input type="submit" value="Agregar jornada" name="alta">
		<br>
		<?php 
		if(isset($_GET["e"])){
			echo "<h2>jornada eliminada</h2>";
		}
		if(isset($_GET["i"])){
			echo "<h2>jornada agregada</h2>";
		}

		 ?>
		
	</form>
	<?php 
		if(isset($_POST["alta"])){
			$hrs_trabajadas = $_POST["hrs_trabajadas"];
			$dias_trabajados = $_POST["dias_trabajados"];
			$pago_hora = $_POST["pago_hora"];
			$horas_extra = $_POST["horas_extra"];
			$bonos = $_POST["bonos"];
			$IDempleado = $_POST["IDempleado"];

			
			$obj->alta($hrs_trabajadas,$dias_trabajados,$pago_hora,$horas_extra,$bonos,$IDempleado);
			header("Location: ?sec=jor&i=1 ");
			
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>hrs_trabajadas</th>
			<th>dias_trabajados</th>
			<th>pago_hora</th>
			<th>horas_extra</th>
			<th>bonos</th>
			<th>IDempleado</th>
			<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["hrs_trabajadas"]."</td>";
				echo "<td>".$fila["dias_trabajados"]."</td>";
				echo "<td>".$fila["pago_hora"]."</td>";
				echo "<td>".$fila["horas_extra"]."</td>";
				echo "<td>".$fila["bonos"]."</td>";
				echo "<td>".$fila["IDempleado"]."</td>";
				
				?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDjornada']; ?>" name="id">
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
			header("Location: ?sec=jor&e=1");
		}

	 ?>
</section>