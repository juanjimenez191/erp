<?php 
	require_once("evaluacion.php");
	$obj = new Evaluacion();
 ?>

	<form action="" method="post">
		tipo: <input type="text" name="tipo"> <br>
		pregunta1: <input type="text" name="pregunta1"> <br>
		pregunta2: <input type="text" name="pregunta2"> <br>
		pregunta3: <input type="text" name="pregunta3"> <br>
		pregunta4: <input type="text" name="pregunta4"> <br>
		pregunta5: <input type="text" name="pregunta5"> <br>
		pregunta6: <input type="text" name="pregunta6"> <br>
		pregunta7: <input type="text" name="pregunta7"> <br>
		pregunta8: <input type="text" name="pregunta8"> <br>
		pregunta9: <input type="text" name="pregunta9"> <br>
		pregunta10: <input type="text" name="pregunta10"> <br>
		
		
		
		
        <input type="submit" value="Agregar evaluacion" name="alta">
		<br>
		<?php 
		if(isset($_GET["e"])){
			echo "<h2>evaluacion eliminada</h2>";
		}
		if(isset($_GET["i"])){
			echo "<h2>evaluacion agregada</h2>";
		}

		 ?>
		
	</form>
	<?php 
		if(isset($_POST["alta"])){
			$tipo = $_POST["tipo"];
			$pregunta1 = $_POST["pregunta1"];
			$pregunta2 = $_POST["pregunta2"];
			$pregunta3 = $_POST["pregunta3"];
			$pregunta4 = $_POST["pregunta4"];
			$pregunta5 = $_POST["pregunta5"];
			$pregunta6 = $_POST["pregunta6"];
			$pregunta7 = $_POST["pregunta7"];
			$pregunta8 = $_POST["pregunta8"];
			$pregunta9 = $_POST["pregunta9"];
			$pregunta10 = $_POST["pregunta10"];
			
			
			
			$obj->alta($tipo,$pregunta1,$pregunta2,$pregunta3,$pregunta4,$pregunta5,$pregunta6,$pregunta7,$pregunta8,$pregunta9,$pregunta10);
			header("Location: ?sec=eva&i=1 ");
			
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Tipo</th>
			<th>Pregunta1</th>
			<th>Pregunta2</th>
			<th>Pregunta3</th>
			<th>Pregunta4</th>
			<th>Pregunta5</th>
			<th>Pregunta6</th>
			<th>Pregunta7</th>
			<th>Pregunta8</th>
			<th>Pregunta9</th>
			<th>Pregunta10</th>
			<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["tipo"]."</td>";
				echo "<td>".$fila["pregunta1"]."</td>";
				echo "<td>".$fila["pregunta2"]."</td>";
				echo "<td>".$fila["pregunta3"]."</td>";
				echo "<td>".$fila["pregunta4"]."</td>";
				echo "<td>".$fila["pregunta5"]."</td>";
				echo "<td>".$fila["pregunta6"]."</td>";
				echo "<td>".$fila["pregunta7"]."</td>";
				echo "<td>".$fila["pregunta8"]."</td>";
				echo "<td>".$fila["pregunta9"]."</td>";
				echo "<td>".$fila["pregunta10"]."</td>";
				
			
				?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDevaluacion']; ?>" name="id">
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
			header("Location: ?sec=eva&e=1");
		}

	 ?>
</section>