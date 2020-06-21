<?php 
	require_once("bala.php");
	$obj = new Bala();
 ?>

	<form action="" method="post">
		fechainicio: <input type="date" name="fechainicio"> <br>
		fechafin: <input type="date" name="fechafin"> <br>
		total: <input type="text" name="total"> <br>
		
		
        <input type="submit" value="Agregar balance" name="alta">
		<br>
		<?php 
		if(isset($_GET["e"])){
			echo "<h2>balance eliminado</h2>";
		}
		if(isset($_GET["i"])){
			echo "<h2>balance agregada</h2>";
		}

		 ?>
		
	</form>
	<?php 
		if(isset($_POST["alta"])){
			$fechainicio = $_POST["fechainicio"];
			$fechafin = $_POST["fechafin"];
			$total = $_POST["total"];
			
			
			
			$obj->alta($fechainicio,$fechafin,$total);
			header("Location: ?sec=bal&i=1 ");
			
		}

		$resultado = $obj->consulta();
	 ?>

	<table>
		<tr>
			<th>Fechainicio</th>
			<th>Fechafin</th>
			<th>Total</th>
			<th>Eliminar</th>
		</tr>
		<?php 
			while($fila = $resultado->fetch_assoc()){
				echo "<tr>";
				echo "<td>".$fila["fechainicio"]."</td>";
				echo "<td>".$fila["fechafin"]."</td>";
				echo "<td>".$fila["total"]."</td>";
				
			
				?>
				<td>
				<form action="" method="post" class="eliminar">
					<input type="hidden" value="<?php echo $fila['IDbalance']; ?>" name="id">
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
			header("Location: ?sec=bal&e=1");
		}

	 ?>
</section>